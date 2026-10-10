#!/usr/bin/env bash
#
# Выкладка OneShe на сервер: собирает закоммиченный код с production-зависимостями
# локально (с сервера недоступен Packagist) и синхронизирует его в /var/www/oneshe.
#
# Использование: deploy/deploy.sh [ревизия]   (по умолчанию HEAD)
#
set -euo pipefail

SERVER="${ONESHE_SERVER:-deploy@94.103.90.14}"
SSH_KEY="${ONESHE_SSH_KEY:-$HOME/.ssh/id_ed25519_oneshe_vps}"
APP_DIR=/var/www/oneshe
REV="${1:-HEAD}"

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
BUILD="$ROOT/deploy/.build"
SSH="ssh -i $SSH_KEY -o IdentitiesOnly=yes"

echo "==> Сборка ревизии $(git -C "$ROOT" rev-parse --short "$REV")"
rm -rf "$BUILD" && mkdir -p "$BUILD"
git -C "$ROOT" archive "$REV" sonya_shop | tar -x -C "$BUILD" --strip-components=1

docker run --rm --network host -u "$(id -u):$(id -g)" \
    -e HOME=/tmp -e COMPOSER_HOME=/tmp/composer \
    ${HTTPS_PROXY:+-e HTTPS_PROXY="$HTTPS_PROXY" -e HTTP_PROXY="$HTTPS_PROXY"} \
    -v "$BUILD":/app -w /app "${ONESHE_BUILD_IMAGE:-oneshe-php:8.4}" \
    sh -c 'curl -sS https://getcomposer.org/installer | php -- --quiet --install-dir=/tmp \
        && php /tmp/composer.phar install --no-dev --optimize-autoloader --no-interaction --no-progress --no-scripts'

echo "==> Синхронизация на $SERVER"
rsync -az --delete -e "$SSH" \
    --exclude=/.env \
    --exclude=/storage/ \
    --exclude=/public/storage \
    --exclude='/bootstrap/cache/*.php' \
    --rsync-path="sudo rsync" \
    "$BUILD"/ "$SERVER:$APP_DIR/"

echo "==> Миграции и кеши"
$SSH "$SERVER" "cd $APP_DIR && sudo chown -R www-data:www-data storage bootstrap/cache \
    && sudo docker exec -u www-data oneshe-app php artisan package:discover -q \
    && sudo docker exec -u www-data oneshe-app php artisan migrate --force \
    && sudo docker exec -u www-data oneshe-app php artisan optimize \
    && sudo docker exec -u www-data oneshe-app php artisan responsecache:clear \
    && sudo docker restart oneshe-app >/dev/null"

echo "==> Готово"
