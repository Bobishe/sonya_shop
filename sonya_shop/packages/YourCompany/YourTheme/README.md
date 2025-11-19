# INCANTO ITALY - Premium Bagisto Theme

Премиальная кастомная тема для интернет-магазина женского белья на платформе Bagisto (Laravel).

## 🎨 Особенности

- **Современный дизайн**: Минималистичный и элегантный дизайн для премиум-сегмента
- **Полностью адаптивный**: Отлично выглядит на всех устройствах
- **Hero Slider**: Красивый слайдер с автоматической прокруткой и touch-поддержкой
- **Готовые компоненты**: Карточки товаров, модальные окна, алерты, хлебные крошки
- **Интерактивность**: JavaScript для корзины, избранного, быстрого просмотра
- **SEO-оптимизация**: Правильная структура HTML, meta-теги
- **Высокая производительность**: Оптимизированный CSS и JS

## 📋 Требования

- PHP ^8.1
- Bagisto ^2.0
- Laravel ^11.0

## 📦 Установка

### Шаг 1: Добавление пакета

Пакет уже находится в директории `packages/YourCompany/YourTheme/`

### Шаг 2: Регистрация в Composer

Добавьте следующую строку в секцию `autoload.psr-4` файла `composer.json`:

```json
"YourCompany\\YourTheme\\": "packages/YourCompany/YourTheme/src"
```

### Шаг 3: Обновление автозагрузки

```bash
composer dump-autoload
```

### Шаг 4: Регистрация Service Provider

Добавьте Service Provider в файл `config/app.php` в секцию `providers`:

```php
YourCompany\YourTheme\Providers\YourThemeServiceProvider::class,
```

### Шаг 5: Публикация ресурсов

Опубликуйте views и assets:

```bash
php artisan vendor:publish --tag=yourtheme-views
php artisan vendor:publish --tag=yourtheme-assets
php artisan vendor:publish --tag=yourtheme-config
```

### Шаг 6: Очистка кеша

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

## 🎯 Использование

### Активация темы

Откройте файл `config/themes.php` и установите тему по умолчанию:

```php
'default' => 'yourtheme',
```

### Структура файлов

```
packages/YourCompany/YourTheme/
├── composer.json
├── README.md
├── config/
│   └── themes.php
└── src/
    ├── Providers/
    │   └── YourThemeServiceProvider.php
    ├── Http/
    │   └── routes.php
    └── Resources/
        ├── views/
        │   ├── layouts/
        │   │   ├── master.blade.php
        │   │   ├── header.blade.php
        │   │   └── footer.blade.php
        │   ├── home/
        │   │   └── index.blade.php
        │   └── components/
        │       ├── product-card.blade.php
        │       ├── button.blade.php
        │       ├── modal.blade.php
        │       ├── breadcrumbs.blade.php
        │       └── alert.blade.php
        └── assets/
            ├── css/
            │   └── app.css
            ├── js/
            │   └── app.js
            └── images/
```

## 🎨 Компоненты

### Product Card

```blade
@include('yourtheme::components.product-card', [
    'product' => $product,
    'showQuickView' => true,
    'showWishlist' => true,
])
```

### Button

```blade
@include('yourtheme::components.button', [
    'variant' => 'primary', // primary, outline, outline-white
    'type' => 'button',     // button, submit, link
    'href' => '#',
])
    Текст кнопки
@endinclude
```

### Modal

```blade
@include('yourtheme::components.modal', [
    'id' => 'myModal',
    'title' => 'Заголовок',
    'size' => 'md', // sm, md, lg, xl
])
    Содержимое модального окна
@endinclude
```

### Breadcrumbs

```blade
@include('yourtheme::components.breadcrumbs', [
    'items' => [
        ['label' => 'Главная', 'url' => '/'],
        ['label' => 'Категория', 'url' => '/category'],
        ['label' => 'Товар'],
    ]
])
```

### Alert

```blade
@include('yourtheme::components.alert', [
    'type' => 'success', // success, error, warning, info
    'dismissible' => true,
    'icon' => true,
])
    Сообщение об успехе!
@endinclude
```

## 🎨 Настройка

### Цветовая схема

Откройте файл `config/themes.php` и измените цвета в секции `options.colors`:

```php
'colors' => [
    'primary' => '#000000',
    'secondary' => '#666666',
    'accent' => '#a8d5e2',
    'success' => '#388e3c',
    'error' => '#d32f2f',
],
```

### Шрифты

Измените шрифты в `config/themes.php`:

```php
'typography' => [
    'font_primary' => 'Montserrat',
    'font_display' => 'Playfair Display',
    'base_font_size' => '16px',
],
```

### Header настройки

```php
'header' => [
    'sticky' => true,
    'show_phone' => true,
    'phone' => '+7 495 011 88 88',
    'show_search' => true,
    'show_cart' => true,
    'show_wishlist' => true,
    'show_account' => true,
],
```

### Hero Slider

```php
'homepage' => [
    'hero_slider' => [
        'enabled' => true,
        'autoplay' => true,
        'autoplay_delay' => 5000,
        'slides_count' => 3,
    ],
],
```

## 📱 Адаптивность

Тема полностью адаптивна и поддерживает следующие breakpoints:

- **Desktop**: 1200px и выше
- **Tablet**: 768px - 1199px
- **Mobile**: до 767px

## 🚀 JavaScript функции

### Hero Slider

Автоматический слайдер с:
- Автопрокруткой каждые 5 секунд
- Навигацией стрелками
- Индикаторами слайдов
- Swipe-поддержкой на мобильных

### Добавление в корзину (AJAX)

```javascript
// Пример использования
document.querySelectorAll('.btn-add-to-cart').forEach(btn => {
    btn.addEventListener('click', function(e) {
        const productId = this.dataset.productId;
        // AJAX запрос к backend
    });
});
```

### Wishlist

```javascript
// Добавление/удаление из избранного
document.querySelectorAll('.btn-wishlist').forEach(btn => {
    btn.addEventListener('click', function(e) {
        const productId = this.dataset.productId;
        // AJAX запрос к backend
    });
});
```

## 📧 Поддержка

Для вопросов и поддержки:
- Email: your@email.com
- Документация: [Bagisto Documentation](https://devdocs.bagisto.com)

## 📝 Лицензия

MIT License

## 👥 Авторы

- Your Name - your@email.com

## 🙏 Благодарности

- [Bagisto](https://bagisto.com) - E-commerce платформа
- [Laravel](https://laravel.com) - PHP Framework
- [Google Fonts](https://fonts.google.com) - Montserrat & Playfair Display

## 📸 Скриншоты

(Здесь можно добавить скриншоты темы)

## 🔄 История изменений

### v1.0.0 (2024)
- Первый релиз
- Hero slider с автопрокруткой
- Адаптивный дизайн
- Компоненты: product card, modal, alert, breadcrumbs
- JavaScript интерактивность
- SEO оптимизация

## 🛠️ Разработка

### Структура CSS

CSS файл организован по следующим секциям:
1. CSS Variables & Reset
2. Typography
3. Layout & Container
4. Header & Navigation
5. Hero Slider
6. Product Grid & Cards
7. Categories
8. Promo Sections
9. Newsletter
10. Advantages
11. Footer
12. Buttons & Forms
13. Utility Classes
14. Responsive Design

### Кастомизация стилей

Все стили находятся в файле `src/Resources/assets/css/app.css`.

Для быстрой кастомизации измените CSS переменные в начале файла:

```css
:root {
    --color-primary: #000000;
    --color-secondary: #666666;
    --color-accent: #a8d5e2;
    --font-primary: 'Montserrat', sans-serif;
    --font-display: 'Playfair Display', serif;
}
```

## 🔗 Интеграция с Bagisto

### Роуты

Тема использует следующие Bagisto роуты:
- `shop.home.index` - Главная страница
- `customer.session.index` - Личный кабинет
- `shop.checkout.cart.index` - Корзина

### Blade директивы

Используйте стандартные Bagisto директивы:
- `@csrf` - CSRF токен
- `{{ route('route.name') }}` - Генерация URL
- `{{ asset('path') }}` - Ссылка на assets

## 💡 Советы

1. **Изображения**: Замените placeholder изображения на реальные в `src/Resources/assets/images/`
2. **Меню**: Обновите пункты меню в `header.blade.php` согласно вашим категориям
3. **Контакты**: Измените контактную информацию в `footer.blade.php`
4. **Интеграция**: Подключите реальные данные товаров из Bagisto в `home/index.blade.php`

## 🎯 Roadmap

- [ ] Страница каталога товаров
- [ ] Страница карточки товара
- [ ] Страница корзины
- [ ] Страница оформления заказа
- [ ] Личный кабинет
- [ ] Wishlist страница
- [ ] Блог
- [ ] Поиск с автодополнением
- [ ] Фильтры товаров
- [ ] Сравнение товаров
