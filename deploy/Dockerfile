FROM php:8.4-fpm

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions \
    && install-php-extensions calendar intl gd zip pdo_mysql exif bcmath opcache

COPY php.ini /usr/local/etc/php/conf.d/oneshe.ini
COPY fpm-pool.conf /usr/local/etc/php-fpm.d/zz-oneshe.conf

WORKDIR /var/www/oneshe
