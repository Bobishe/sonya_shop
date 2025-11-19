<?php

return [
    /**
     * Default theme
     *
     * Set this to 'yourtheme' to use your custom theme as default
     */
    'default' => 'yourtheme',

    /**
     * Available themes configuration
     */
    'themes' => [
        'yourtheme' => [
            /**
             * Theme name
             */
            'name' => 'INCANTO ITALY Theme',

            /**
             * Theme description
             */
            'description' => 'Premium lingerie e-commerce theme for Bagisto',

            /**
             * Theme version
             */
            'version' => '1.0.0',

            /**
             * Parent theme (if this theme extends another)
             * Set to null for standalone theme
             */
            'parent' => null,

            /**
             * Views path namespace
             * This is used to load views with namespace syntax: yourtheme::view.name
             */
            'views_path' => 'yourtheme',

            /**
             * Assets configuration
             */
            'assets' => [
                /**
                 * CSS files to be loaded
                 */
                'css' => [
                    'themes/yourtheme/assets/css/app.css',
                ],

                /**
                 * JavaScript files to be loaded
                 */
                'js' => [
                    'themes/yourtheme/assets/js/app.js',
                ],
            ],

            /**
             * Vite configuration (for development)
             */
            'vite' => [
                'hot_file' => 'yourtheme-vite.hot',
                'build_directory' => 'themes/yourtheme',
                'package_assets_directory' => 'src/Resources/assets',
            ],

            /**
             * Theme options/settings
             */
            'options' => [
                /**
                 * Layout settings
                 */
                'layout' => [
                    'container_max_width' => '1400px',
                    'products_per_row' => 4,
                    'products_per_page' => 12,
                ],

                /**
                 * Header settings
                 */
                'header' => [
                    'sticky' => true,
                    'show_phone' => true,
                    'phone' => '+7 495 011 88 88',
                    'show_search' => true,
                    'show_cart' => true,
                    'show_wishlist' => true,
                    'show_account' => true,
                ],

                /**
                 * Footer settings
                 */
                'footer' => [
                    'show_social' => true,
                    'show_newsletter' => true,
                    'show_payment_methods' => true,
                    'columns' => 4,
                ],

                /**
                 * Product card settings
                 */
                'product_card' => [
                    'show_quick_view' => true,
                    'show_wishlist' => true,
                    'show_rating' => true,
                    'show_badges' => true,
                    'image_ratio' => '3:4',
                ],

                /**
                 * Homepage settings
                 */
                'homepage' => [
                    'hero_slider' => [
                        'enabled' => true,
                        'autoplay' => true,
                        'autoplay_delay' => 5000,
                        'slides_count' => 3,
                    ],
                    'show_categories' => true,
                    'show_featured_products' => true,
                    'featured_products_count' => 8,
                    'show_promo_section' => true,
                    'show_newsletter' => true,
                    'show_advantages' => true,
                ],

                /**
                 * Color scheme
                 */
                'colors' => [
                    'primary' => '#000000',
                    'secondary' => '#666666',
                    'accent' => '#a8d5e2',
                    'success' => '#388e3c',
                    'error' => '#d32f2f',
                    'warning' => '#f57c00',
                    'info' => '#1976d2',
                ],

                /**
                 * Typography
                 */
                'typography' => [
                    'font_primary' => 'Montserrat',
                    'font_display' => 'Playfair Display',
                    'base_font_size' => '16px',
                ],

                /**
                 * Features
                 */
                'features' => [
                    'sticky_header' => true,
                    'mobile_menu' => true,
                    'quick_view' => true,
                    'wishlist' => true,
                    'ajax_cart' => true,
                    'lazy_loading' => true,
                    'smooth_scroll' => true,
                ],
            ],

            /**
             * Supported locales
             */
            'locales' => [
                'ru',
                'en',
            ],

            /**
             * Required Bagisto version
             */
            'bagisto_version' => '^2.0',
        ],
    ],
];
