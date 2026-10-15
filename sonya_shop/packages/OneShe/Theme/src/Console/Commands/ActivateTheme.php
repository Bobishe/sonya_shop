<?php

namespace OneShe\Theme\Console\Commands;

use Illuminate\Console\Command;
use Webkul\Core\Repositories\ChannelRepository;
use Webkul\Core\Repositories\CoreConfigRepository;
use Webkul\Theme\Repositories\SectionRepository;

class ActivateTheme extends Command
{
    /**
     * The code the theme is registered under in config/themes.php.
     */
    public const THEME_CODE = 'oneshe';

    /**
     * The store name every channel on the theme is given.
     */
    public const STORE_NAME = 'OneShe';

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
     * The payment gateways switched off until the store has its own credentials for them.
     */
    public const UNCONFIGURED_PAYMENT_METHODS = [
        'stripe',
        'razorpay',
        'payu',
        'phonepe',
        'paypal_smart_button',
        'paypal_standard',
        'payglocal',
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oneshe-theme:activate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Switch the store to the OneShe theme: channels, their name, home page sections, the storefront features it leaves out and unconfigured payment gateways.';

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

        $this->nameChannels();

        $this->disableUnconfiguredPaymentMethods();

        $this->coreConfigRepository->create(self::DISABLED_FEATURES);

        $this->info("Channels switched: {$channels}, home page sections moved: {$sections}, compare, wishlist, newsletter and unconfigured payment gateways switched off.");

        return self::SUCCESS;
    }

    /**
     * Give every channel on the theme the store name, in each locale and its home page title.
     */
    protected function nameChannels(): void
    {
        $channels = $this->channelRepository->getModel()
            ->with('translations')
            ->where('theme', self::THEME_CODE)
            ->get();

        foreach ($channels as $channel) {
            foreach ($channel->translations as $translation) {
                $translation->update([
                    'name' => self::STORE_NAME,
                    'logo_alt' => self::STORE_NAME,
                    'home_seo' => array_merge((array) $translation->home_seo, ['meta_title' => self::STORE_NAME]),
                ]);
            }
        }
    }

    /**
     * Switch off, on every channel of the theme, the payment gateways that have no credentials yet.
     */
    protected function disableUnconfiguredPaymentMethods(): void
    {
        $paymentMethods = array_fill_keys(self::UNCONFIGURED_PAYMENT_METHODS, ['active' => 0]);

        $channelCodes = $this->channelRepository->getModel()
            ->where('theme', self::THEME_CODE)
            ->pluck('code');

        foreach ($channelCodes as $channelCode) {
            $this->coreConfigRepository->create([
                'sales' => [
                    'payment_methods' => $paymentMethods,
                ],
                'channel' => $channelCode,
            ]);
        }
    }
}
