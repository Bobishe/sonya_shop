<?php

namespace Sonya\Theme\Console\Commands;

use Illuminate\Console\Command;
use Webkul\Core\Repositories\ChannelRepository;
use Webkul\Core\Repositories\CoreConfigRepository;
use Webkul\Theme\Repositories\SectionRepository;

class ActivateTheme extends Command
{
    /**
     * The code the theme is registered under in config/themes.php.
     */
    public const THEME_CODE = 'sonya';

    /**
     * The storefront features the theme leaves out, switched off in the configuration.
     */
    public const DISABLED_FEATURES = [
        'catalog' => [
            'products' => [
                'settings' => [
                    'compare_option' => 0,
                ],
            ],
        ],

        'customer' => [
            'settings' => [
                'wishlist' => [
                    'wishlist_option' => 0,
                ],

                'newsletter' => [
                    'subscription' => 0,
                ],
            ],
        ],
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sonya-theme:activate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Switch the store to the Sonya theme: channels, home page sections and the storefront features it leaves out.';

    /**
     * Create a new command instance.
     */
    public function __construct(
        protected ChannelRepository $channelRepository,
        protected CoreConfigRepository $coreConfigRepository,
        protected SectionRepository $sectionRepository
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $channels = $this->channelRepository->getModel()
            ->where('theme', 'default')
            ->update(['theme' => self::THEME_CODE]);

        $sections = $this->sectionRepository->getModel()
            ->where('theme_code', 'default')
            ->update(['theme_code' => self::THEME_CODE]);

        $this->coreConfigRepository->create(self::DISABLED_FEATURES);

        $this->info("Channels switched: {$channels}, home page sections moved: {$sections}, compare, wishlist and newsletter switched off.");

        return self::SUCCESS;
    }
}
