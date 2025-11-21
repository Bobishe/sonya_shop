<!--
    This code needs to be refactored to reduce the amount of PHP in the Blade
    template as much as possible.
-->
<?php
    $showCompare = (bool) core()->getConfigData('catalog.products.settings.compare_option');

    $showWishlist = (bool) core()->getConfigData('customer.settings.wishlist.wishlist_option');
?>

<div class="flex flex-wrap gap-4 px-4 pb-4 pt-6 shadow-sm lg:hidden">
    <div class="flex w-full items-center justify-between">
        <!-- Left Navigation -->
        <div class="flex items-center gap-x-1.5">
            <?php echo view_render_event('bagisto.shop.components.layouts.header.mobile.drawer.before'); ?>


            <!-- Drawer -->
            <v-mobile-drawer></v-mobile-drawer>

            <?php echo view_render_event('bagisto.shop.components.layouts.header.mobile.drawer.after'); ?>


            <?php echo view_render_event('bagisto.shop.components.layouts.header.mobile.logo.before'); ?>


            <a
                href="<?php echo e(route('shop.home.index')); ?>"
                class="max-h-[30px]"
                aria-label="<?php echo app('translator')->get('shop::app.components.layouts.header.mobile.bagisto'); ?>"
            >
                <img
                    src="<?php echo e(core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg')); ?>"
                    alt="<?php echo e(config('app.name')); ?>"
                    width="131"
                    height="29"
                >
            </a>

            <?php echo view_render_event('bagisto.shop.components.layouts.header.mobile.logo.after'); ?>

        </div>

        <!-- Right Navigation -->
        <div>
            <div class="flex items-center gap-x-5 max-md:gap-x-4">
                <?php echo view_render_event('bagisto.shop.components.layouts.header.mobile.compare.before'); ?>


                
                

                <?php echo view_render_event('bagisto.shop.components.layouts.header.mobile.compare.after'); ?>


                <?php echo view_render_event('bagisto.shop.components.layouts.header.mobile.mini_cart.before'); ?>


                <?php if(core()->getConfigData('sales.checkout.shopping_cart.cart_page')): ?>
                    <?php echo $__env->make('shop::checkout.cart.mini-cart', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endif; ?>

                <?php echo view_render_event('bagisto.shop.components.layouts.header.mobile.mini_cart.after'); ?>


                
                

                
                
            </div>
        </div>
    </div>

    <?php echo view_render_event('bagisto.shop.components.layouts.header.mobile.search.before'); ?>


    <!-- Serach Catalog Form -->
    <form action="<?php echo e(route('shop.search.index')); ?>" class="flex w-full items-center">
        <label
            for="organic-search"
            class="sr-only"
        >
            <?php echo app('translator')->get('shop::app.components.layouts.header.mobile.search'); ?>
        </label>

        <div class="relative w-full">
            <div class="icon-search pointer-events-none absolute top-3 flex items-center text-2xl max-md:text-xl max-sm:top-2.5 ltr:left-3 rtl:right-3"></div>

            <input
                type="text"
                class="block w-full rounded-xl border border-['#E3E3E3'] px-11 py-3.5 text-sm font-medium text-gray-900 max-md:rounded-lg max-md:px-10 max-md:py-3 max-md:font-normal max-sm:text-xs"
                name="query"
                value="<?php echo e(request('query')); ?>"
                placeholder="<?php echo app('translator')->get('shop::app.components.layouts.header.mobile.search-text'); ?>"
                required
            >

            <?php if(core()->getConfigData('catalog.products.settings.image_search')): ?>
                <?php echo $__env->make('shop::search.images.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
        </div>
    </form>

    <?php echo view_render_event('bagisto.shop.components.layouts.header.mobile.search.after'); ?>

</div>

<?php if (! $__env->hasRenderedOnce('5c87be62-7d96-4e22-b04b-053946014a3a')): $__env->markAsRenderedOnce('5c87be62-7d96-4e22-b04b-053946014a3a');
$__env->startPush('scripts'); ?>
    <script type="text/x-template" id="v-mobile-drawer-template">
        <?php if (isset($component)) { $__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.drawer.index','data' => ['position' => 'left','width' => '100%','@close' => 'onDrawerClose']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::drawer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['position' => 'left','width' => '100%','@close' => 'onDrawerClose']); ?>
             <?php $__env->slot('toggle', null, []); ?> 
                <span class="icon-hamburger cursor-pointer text-2xl"></span>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('header', null, []); ?> 
                <div class="flex items-center justify-between">
                    <a href="<?php echo e(route('shop.home.index')); ?>">
                        <img
                            src="<?php echo e(core()->getCurrentChannel()->logo_url ?? bagisto_asset('images/logo.svg')); ?>"
                            alt="<?php echo e(config('app.name')); ?>"
                            width="131"
                            height="29"
                        >
                    </a>
                </div>
             <?php $__env->endSlot(); ?>

             <?php $__env->slot('content', null, ['class' => '!p-0']); ?> 
                
                

                <?php echo view_render_event('bagisto.shop.components.layouts.header.mobile.drawer.categories.before'); ?>


                <!-- Mobile category view -->
                <v-mobile-category ref="mobileCategory"></v-mobile-category>

                <?php echo view_render_event('bagisto.shop.components.layouts.header.mobile.drawer.categories.after'); ?>

             <?php $__env->endSlot(); ?>

             <?php $__env->slot('footer', null, []); ?> 
                <!-- Localization & Currency Section -->
                <?php if(core()->getCurrentChannel()->locales()->count() > 1 || core()->getCurrentChannel()->currencies()->count() > 1 ): ?>
                    <div class="fixed bottom-0 z-10 grid w-full max-w-full grid-cols-[1fr_auto_1fr] items-center justify-items-center border-t border-zinc-200 bg-white px-5 ltr:left-0 rtl:right-0">
                        <!-- Filter Drawer -->
                        <?php if (isset($component)) { $__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.drawer.index','data' => ['position' => 'bottom','width' => '100%']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::drawer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['position' => 'bottom','width' => '100%']); ?>
                            <!-- Drawer Toggler -->
                             <?php $__env->slot('toggle', null, []); ?> 
                                <div
                                    class="flex cursor-pointer items-center gap-x-2.5 px-2.5 py-3.5 text-lg font-medium uppercase max-md:py-3 max-sm:text-base"
                                    role="button"
                                >
                                    <?php echo e(core()->getCurrentCurrency()->symbol . ' ' . core()->getCurrentCurrencyCode()); ?>

                                </div>
                             <?php $__env->endSlot(); ?>

                            <!-- Drawer Header -->
                             <?php $__env->slot('header', null, []); ?> 
                                <div class="flex items-center justify-between">
                                    <p class="text-lg font-semibold">
                                        <?php echo app('translator')->get('shop::app.components.layouts.header.mobile.currencies'); ?>
                                    </p>
                                </div>
                             <?php $__env->endSlot(); ?>

                            <!-- Drawer Content -->
                             <?php $__env->slot('content', null, ['class' => '!px-0']); ?> 
                                <div
                                    class="overflow-auto"
                                    :style="{ height: getCurrentScreenHeight }"
                                >
                                    <v-currency-switcher></v-currency-switcher>
                                </div>
                             <?php $__env->endSlot(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8)): ?>
<?php $attributes = $__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8; ?>
<?php unset($__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8)): ?>
<?php $component = $__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8; ?>
<?php unset($__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8); ?>
<?php endif; ?>

                        <!-- Seperator -->
                        <span class="h-5 w-0.5 bg-zinc-200"></span>

                        <!-- Sort Drawer -->
                        <?php if (isset($component)) { $__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.drawer.index','data' => ['position' => 'bottom','width' => '100%']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::drawer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['position' => 'bottom','width' => '100%']); ?>
                            <!-- Drawer Toggler -->
                             <?php $__env->slot('toggle', null, []); ?> 
                                <div
                                    class="flex cursor-pointer items-center gap-x-2.5 px-2.5 py-3.5 text-lg font-medium uppercase max-md:py-3 max-sm:text-base"
                                    role="button"
                                >
                                    <img
                                        src="<?php echo e(! empty(core()->getCurrentLocale()->logo_url)
                                                ? core()->getCurrentLocale()->logo_url
                                                : bagisto_asset('images/default-language.svg')); ?>"
                                        class="h-full"
                                        alt="Default locale"
                                        width="24"
                                        height="16"
                                    />

                                    <?php echo e(core()->getCurrentChannel()->locales()->orderBy('name')->where('code', app()->getLocale())->value('name')); ?>

                                </div>
                             <?php $__env->endSlot(); ?>

                            <!-- Drawer Header -->
                             <?php $__env->slot('header', null, []); ?> 
                                <div class="flex items-center justify-between">
                                    <p class="text-lg font-semibold">
                                        <?php echo app('translator')->get('shop::app.components.layouts.header.mobile.locales'); ?>
                                    </p>
                                </div>
                             <?php $__env->endSlot(); ?>

                            <!-- Drawer Content -->
                             <?php $__env->slot('content', null, ['class' => '!px-0']); ?> 
                                <div
                                    class="overflow-auto"
                                    :style="{ height: getCurrentScreenHeight }"
                                >
                                    <v-locale-switcher></v-locale-switcher>
                                </div>
                             <?php $__env->endSlot(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8)): ?>
<?php $attributes = $__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8; ?>
<?php unset($__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8)): ?>
<?php $component = $__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8; ?>
<?php unset($__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8); ?>
<?php endif; ?>
                    </div>
                <?php endif; ?>
             <?php $__env->endSlot(); ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8)): ?>
<?php $attributes = $__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8; ?>
<?php unset($__attributesOriginal2b3e2da8ab003ef79d854b1862e64fc8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8)): ?>
<?php $component = $__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8; ?>
<?php unset($__componentOriginal2b3e2da8ab003ef79d854b1862e64fc8); ?>
<?php endif; ?>
    </script>

    <script
        type="text/x-template"
        id="v-mobile-category-template"
    >
        <!-- Wrapper with transition effects -->
        <div class="relative h-full overflow-hidden">
            <!-- Sliding container -->
            <div
                class="flex h-full transition-transform duration-300"
                :class="{
                    'ltr:translate-x-0 rtl:translate-x-0': currentViewLevel !== 'third',
                    'ltr:-translate-x-full rtl:translate-x-full': currentViewLevel === 'third'
                }"
            >
                <!-- First level view -->
                <div class="h-full w-full flex-shrink-0 overflow-auto px-6">
                    <!-- <div class="py-4">
                        <div
                            v-for="category in categories"
                            :key="category.id"
                            :class="{'mb-2': category.children && category.children.length}"
                        >
                            <div class="flex cursor-pointer items-center justify-between py-2 transition-colors duration-200">
                                <a :href="category.url" class="text-base font-medium text-black">
                                    {{ category.name }}
                                </a>
                            </div>

                            <div v-if="category.children && category.children.length" >
                                <div
                                    v-for="secondLevelCategory in category.children"
                                    :key="secondLevelCategory.id"
                                >
                                    <div
                                        class="flex cursor-pointer items-center justify-between py-2 transition-colors duration-200"
                                        @click="showThirdLevel(secondLevelCategory, category, $event)"
                                    >
                                        <a :href="secondLevelCategory.url" class="text-sm font-normal">
                                            {{ secondLevelCategory.name }}
                                        </a>

                                        <span
                                            v-if="secondLevelCategory.children && secondLevelCategory.children.length"
                                            class="icon-arrow-right rtl:icon-arrow-left"
                                        ></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Static Navigation Links -->
                    <div class="border-zinc-200 py-4">
                        <div class="grid gap-2">
                            <a href="/page/catalog" class="flex items-center py-2 text-base font-medium text-black transition-colors duration-200 hover:bg-gray-100">
                                Каталог
                            </a>

                            <a href="/page/about-us" class="flex items-center py-2 text-base font-medium text-black transition-colors duration-200 hover:bg-gray-100">
                                Покупателям
                            </a>

                            <a href="/page/about-us" class="flex items-center py-2 text-base font-medium text-black transition-colors duration-200 hover:bg-gray-100">
                                О бренде
                            </a>

                            <a href="/page/about-us" class="flex items-center py-2 text-base font-medium text-black transition-colors duration-200 hover:bg-gray-100">
                                Отзывы
                            </a>

                            <a href="/page/contacts" class="flex items-center py-2 text-base font-medium text-black transition-colors duration-200 hover:bg-gray-100">
                                Контакты
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Third level view -->
                <div
                    class="h-full w-full flex-shrink-0"
                    v-if="currentViewLevel === 'third'"
                >
                    <div class="border-b border-gray-200 px-6 py-4">
                        <button
                            @click="goBackToMainView"
                            class="flex items-center justify-center gap-2 focus:outline-none"
                            aria-label="Go back"
                        >
                            <span class="icon-arrow-left rtl:icon-arrow-right text-lg"></span>
                            <div class="text-base font-medium text-black">
                                <?php echo app('translator')->get('shop::app.components.layouts.header.mobile.back-button'); ?>
                            </div>
                        </button>
                    </div>

                    <!-- Third Level Content -->
                    <div class="px-6 py-4">
                        <div
                            v-for="thirdLevelCategory in currentSecondLevelCategory?.children"
                            :key="thirdLevelCategory.id"
                            class="mb-2"
                        >
                            <a
                                :href="thirdLevelCategory.url"
                                class="block py-2 text-sm transition-colors duration-200"
                            >
                                {{ thirdLevelCategory.name }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>

    <script type="module">
        app.component('v-mobile-category', {
            template: '#v-mobile-category-template',

            data() {
                return  {
                    categories: [],
                    currentViewLevel: 'main',
                    currentSecondLevelCategory: null,
                    currentParentCategory: null
                }
            },

            mounted() {
                this.initCategories();
            },

            computed: {
                getCurrentScreenHeight() {
                    return window.innerHeight - (window.innerWidth < 920 ? 61 : 0) + 'px';
                },
            },

            methods: {
                initCategories() {
                    try {
                        const stored = localStorage.getItem('categories');

                        if (stored) {
                            this.categories = JSON.parse(stored);
                            this.isLoading = false;
                            return;
                        }

                    } catch (e) {}

                    this.getCategories();
                },
                getCategories() {
                    this.$axios.get("<?php echo e(route('shop.api.categories.tree')); ?>")
                        .then(response => {
                            this.categories = response.data.data;
                            localStorage.setItem('categories', JSON.stringify(this.categories));
                        })
                        .catch(error => {
                            console.log(error);
                        });
                },

                showThirdLevel(secondLevelCategory, parentCategory, event) {
                    if (secondLevelCategory.children && secondLevelCategory.children.length) {
                        this.currentSecondLevelCategory = secondLevelCategory;
                        this.currentParentCategory = parentCategory;
                        this.currentViewLevel = 'third';

                        if (event) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                    }
                },

                goBackToMainView() {
                    this.currentViewLevel = 'main';
                }
            },
        });

        app.component('v-mobile-drawer', {
            template: '#v-mobile-drawer-template',

            methods: {
                onDrawerClose() {
                    this.$refs.mobileCategory.currentViewLevel = 'main';
                }
            },
        });
    </script>
<?php $__env->stopPush(); endif; ?>
<?php /**PATH D:\Work\sonya_site\sonya_shop\packages\Webkul\Shop\src/resources/views/components/layouts/header/mobile/index.blade.php ENDPATH**/ ?>