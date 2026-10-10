<?php

return [
    'components' => [
        'carousel' => [
            'hero' => [
                'title'     => 'Lingerie store',
                'link-text' => 'Go to catalog',
                'link-url'  => 'search',
            ],
        ],

        'categories' => [
            'navigation' => [
                'title' => 'Categories',
            ],
        ],

        'promo-popup' => [
            'title'            => 'TAKE CARE OF YOURSELF',
            'subtitle'         => 'Get 10% off for taking care of your health',
            'send-certificate' => 'Send a certificate from a mammologist to:',
            'email'            => 'health@sonyashop.ru',
            'reply'            => 'We will reply with a personal promo code for 10% off any order',
            'button'           => 'Got it',
            'footer'           => 'The offer is valid for all new customers',
            'close'            => 'Close',
        ],

        'layouts' => [
            'header' => [
                'mobile' => [
                    'close-search' => 'Close search',
                ],

                'navigation' => [
                    'title' => 'Main navigation',
                    'links' => [
                        ['url' => 'search', 'title' => 'Catalog'],
                        ['url' => 'page/contacts', 'title' => 'For customers'],
                        ['url' => 'page/about-us', 'title' => 'About the brand'],
                        ['url' => 'page/contacts', 'title' => 'Reviews'],
                        ['url' => 'page/contacts', 'title' => 'Contacts'],
                    ],
                ],
            ],
        ],
    ],

    'products' => [
        'view' => [
            'delivery' => [
                'title'   => 'Delivery and payment',
                'content' => [
                    'Orders are delivered by CDEK and Russian Post anywhere in Russia.',
                    'In Krasnoyarsk orders arrive the day after dispatch; delivery to other regions takes 1 to 8 days. The cost follows the CDEK and Russian Post rates for your address.',
                ],
            ],

            'returns' => [
                'title'   => 'If the set does not fit',
                'content' => [
                    'If the set does not fit, we will gladly alter it to your measurements so it is comfortable to wear, and cover the delivery and alteration costs.',
                    'Once you have tried the set on and found it uncomfortable, message us on Telegram, describe the problem and attach a photo or video of how it fits.',
                    'We will send you a return tracking number to drop the item at a pickup point. When the alterations are done, we will ship the item back to you.',
                ],
            ],
        ],
    ],

    'catalog' => [
        'title'               => 'Catalog',
        'meta-description'    => 'All product categories of the store',
        'meta-keywords'       => 'catalog, categories, products',
        'products-count'      => ':count product|:count products',
        'subcategories-count' => ':count subcategory|:count subcategories',
        'view-category'       => 'View category',
        'empty'               => 'No categories yet',
    ],
];
