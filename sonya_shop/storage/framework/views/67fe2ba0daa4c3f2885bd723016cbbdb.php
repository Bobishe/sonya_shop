<?php
    $searchTitle = $suggestion ?? $query;
    $title = $searchTitle ? trans('shop::app.search.title', ['query' => $searchTitle]) : trans('shop::app.search.results');
    $searchInstead = $suggestion ? $query : null;
?>
<!-- SEO Meta Content -->
<?php $__env->startPush('meta'); ?>
    <meta
        name="description"
        content="<?php echo e($title); ?>"
    />

    <meta
        name="keywords"
        content="<?php echo e($title); ?>"
    />
<?php $__env->stopPush(); ?>

<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => ['hasFeature' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['has-feature' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
    <!-- Page Title -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo e($title); ?>

     <?php $__env->endSlot(); ?>

    <div class="container px-[60px] max-lg:px-8 max-sm:px-4">
        <?php if(request()->has('image-search')): ?>
            <?php echo $__env->make('shop::search.images.results', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>

        <div class="mt-8 max-md:mt-5">
            <v-search-categories>
                <div class="flex items-center justify-center gap-5">
                    <span
                        class="shimmer h-6 w-20 rounded"
                        role="presentation"
                    ></span>

                    <span
                        class="shimmer h-6 w-20 rounded"
                        role="presentation"
                    ></span>

                    <span
                        class="shimmer h-6 w-20 rounded"
                        role="presentation"
                    ></span>
                </div>
            </v-search-categories>
        </div>

        <?php if($searchInstead): ?>
            <form
                action="<?php echo e(route('shop.search.index', ['suggest' => false])); ?>"
                class="flex max-w-[445px] items-center"
                role="search"
            >
                <input
                    type="text"
                    name="query"
                    class="hidden"
                    value="<?php echo e($searchInstead); ?>"
                >

                <input
                    type="text"
                    name="suggest"
                    class="hidden"
                    value="0"
                >

                <p class="mt-1 text-sm text-gray-600">
                    <?php echo e(trans('shop::app.search.suggest')); ?>


                    <button
                        type="submit"
                        class="text-blue-600 hover:text-blue-800 hover:underline"
                        aria-label="<?php echo e(trans('shop::app.components.layouts.header.desktop.bottom.submit')); ?>"
                    >
                        <?php echo e($searchInstead); ?>

                    </button>
                </p>
            </form>
        <?php endif; ?>
    </div>

    <!-- Product Listing -->
    <v-search>
        <?php if (isset($component)) { $__componentOriginalaeaf192b2495a2212eb0b0f02a462c7f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaeaf192b2495a2212eb0b0f02a462c7f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.categories.view','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.categories.view'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaeaf192b2495a2212eb0b0f02a462c7f)): ?>
<?php $attributes = $__attributesOriginalaeaf192b2495a2212eb0b0f02a462c7f; ?>
<?php unset($__attributesOriginalaeaf192b2495a2212eb0b0f02a462c7f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaeaf192b2495a2212eb0b0f02a462c7f)): ?>
<?php $component = $__componentOriginalaeaf192b2495a2212eb0b0f02a462c7f; ?>
<?php unset($__componentOriginalaeaf192b2495a2212eb0b0f02a462c7f); ?>
<?php endif; ?>
    </v-search>

    <?php if (! $__env->hasRenderedOnce('cdd44622-6045-432b-9890-36b664ba8072')): $__env->markAsRenderedOnce('cdd44622-6045-432b-9890-36b664ba8072');
$__env->startPush('scripts'); ?>
        <script
            type="text/x-template"
            id="v-search-template"
        >
            <div class="container px-[60px] max-lg:px-8 max-sm:px-4">
                <div class="flex items-start gap-10 max-lg:gap-5 md:mt-10">
                    <!-- Product Listing Filters -->
                    

                    <!-- Product Listing Container -->
                    <div class="flex-1">
                        <!-- Desktop Product Listing Toolbar -->
                        <div class="max-md:hidden">
                            <?php echo $__env->make('shop::categories.toolbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>

                        <!-- Product List Card Container -->
                        <div
                            class="mt-8 grid grid-cols-1 gap-6"
                            v-if="(filters.toolbar.applied.mode ?? filters.toolbar.default.mode) === 'list'"
                        >
                            <!-- Product Card Shimmer Effect -->
                            <template v-if="isLoading">
                                <?php if (isset($component)) { $__componentOriginalf60576d24a4038d681f350c8d30c1046 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf60576d24a4038d681f350c8d30c1046 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.products.cards.list','data' => ['count' => '12']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.products.cards.list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['count' => '12']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf60576d24a4038d681f350c8d30c1046)): ?>
<?php $attributes = $__attributesOriginalf60576d24a4038d681f350c8d30c1046; ?>
<?php unset($__attributesOriginalf60576d24a4038d681f350c8d30c1046); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf60576d24a4038d681f350c8d30c1046)): ?>
<?php $component = $__componentOriginalf60576d24a4038d681f350c8d30c1046; ?>
<?php unset($__componentOriginalf60576d24a4038d681f350c8d30c1046); ?>
<?php endif; ?>
                            </template>

                            <!-- Product Card Listing -->
                            <template v-else>
                                <template v-if="products.length">
                                    <?php if (isset($component)) { $__componentOriginalce4ea8dd577f45125a0fa9f371a55f23 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.products.card','data' => [':mode' => '\'list\'','vFor' => 'product in products']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::products.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':mode' => '\'list\'','v-for' => 'product in products']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23)): ?>
<?php $attributes = $__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23; ?>
<?php unset($__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce4ea8dd577f45125a0fa9f371a55f23)): ?>
<?php $component = $__componentOriginalce4ea8dd577f45125a0fa9f371a55f23; ?>
<?php unset($__componentOriginalce4ea8dd577f45125a0fa9f371a55f23); ?>
<?php endif; ?>
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
                                    <div class="m-auto grid w-full place-content-center items-center justify-items-center py-32 text-center">
                                        <img
                                            class="max-sm:h-[100px] max-sm:w-[100px]"
                                            src="<?php echo e(bagisto_asset('images/thank-you.png')); ?>"
                                            alt="Empty result"
                                            loading="lazy"
                                            decoding="async"
                                        />

                                        <p
                                            class="text-xl max-sm:text-sm"
                                            role="heading"
                                        >
                                            <?php echo app('translator')->get('shop::app.categories.view.empty'); ?>
                                        </p>
                                    </div>
                                </template>
                            </template>
                        </div>

                        <!-- Product Grid Card Container -->
                        <div v-else>
                            <!-- Product Card Shimmer Effect -->
                            <template v-if="isLoading">
                                <div class="mt-8 grid grid-cols-4 gap-8 max-1060:grid-cols-2 max-md:gap-x-4 max-sm:mt-5 max-sm:justify-items-center max-sm:gap-y-5">
                                    <?php if (isset($component)) { $__componentOriginal63d85b8bc2d72394bd433a79cbb59384 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal63d85b8bc2d72394bd433a79cbb59384 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.shimmer.products.cards.grid','data' => ['count' => '12']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::shimmer.products.cards.grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['count' => '12']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal63d85b8bc2d72394bd433a79cbb59384)): ?>
<?php $attributes = $__attributesOriginal63d85b8bc2d72394bd433a79cbb59384; ?>
<?php unset($__attributesOriginal63d85b8bc2d72394bd433a79cbb59384); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal63d85b8bc2d72394bd433a79cbb59384)): ?>
<?php $component = $__componentOriginal63d85b8bc2d72394bd433a79cbb59384; ?>
<?php unset($__componentOriginal63d85b8bc2d72394bd433a79cbb59384); ?>
<?php endif; ?>
                                </div>
                            </template>

                            <!-- Product Card Listing -->
                            <template v-else>
                                <template v-if="products.length">
                                    <div class="mt-8 grid grid-cols-4 gap-8 max-1060:grid-cols-2 max-md:mt-5 max-md:justify-items-center max-md:gap-x-4 max-md:gap-y-5">
                                        <?php if (isset($component)) { $__componentOriginalce4ea8dd577f45125a0fa9f371a55f23 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.products.card','data' => [':mode' => '\'grid\'','vFor' => 'product in products','navigationLink' => route('shop.search.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::products.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([':mode' => '\'grid\'','v-for' => 'product in products','navigation-link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.search.index'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23)): ?>
<?php $attributes = $__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23; ?>
<?php unset($__attributesOriginalce4ea8dd577f45125a0fa9f371a55f23); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalce4ea8dd577f45125a0fa9f371a55f23)): ?>
<?php $component = $__componentOriginalce4ea8dd577f45125a0fa9f371a55f23; ?>
<?php unset($__componentOriginalce4ea8dd577f45125a0fa9f371a55f23); ?>
<?php endif; ?>
                                    </div>
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
                                    <div class="m-auto grid w-full place-content-center items-center justify-items-center py-32 text-center">
                                        <img
                                            class="max-sm:h-[100px] max-sm:w-[100px]"
                                            src="<?php echo e(bagisto_asset('images/thank-you.png')); ?>"
                                            alt="Empty result"
                                            loading="lazy"
                                            decoding="async"
                                        />

                                        <p
                                            class="text-xl max-sm:text-sm"
                                            role="heading"
                                        >
                                            <?php echo app('translator')->get('shop::app.categories.view.empty'); ?>
                                        </p>
                                    </div>
                                </template>
                            </template>
                        </div>

                        <!-- Load More Button -->
                        <button
                            class="secondary-button mx-auto mt-[60px] block w-max rounded-2xl px-11 py-3 text-center text-base max-md:rounded-lg max-md:text-sm max-sm:mt-7 max-sm:px-7 max-sm:py-2"
                            @click="loadMoreProducts"
                            v-if="links.next"
                        >
                            <?php echo app('translator')->get('shop::app.categories.view.load-more'); ?>
                        </button>
                    </div>
                </div>
            </div>
    </script>

        <script type="module">
            app.component('v-search', {
                template: '#v-search-template',

                data() {
                    return {
                        isMobile: window.innerWidth <= 767,

                        isLoading: true,

                        isDrawerActive: {
                            toolbar: false,

                            filter: false,
                        },

                        filters: {
                            toolbar: {
                                default: {},

                                applied: {},
                            },

                            filter: {},
                        },

                        products: [],

                        links: {},
                    }
                },

                computed: {
                    queryParams() {
                        let queryParams = Object.assign({}, this.filters.filter, this.filters.toolbar.applied);

                        return this.removeJsonEmptyValues(queryParams);
                    },

                    queryString() {
                        return this.jsonToQueryString(this.queryParams);
                    },
                },

                watch: {
                    queryParams() {
                        this.getProducts();
                    },

                    queryString() {
                        window.history.pushState({}, '', '?' + this.queryString);
                    },
                },

                methods: {
                    setFilters(type, filters) {
                        this.filters[type] = filters;
                    },

                    clearFilters(type, filters) {
                        this.filters[type] = {};
                    },

                    getProducts() {
                        this.isDrawerActive = {
                            toolbar: false,

                            filter: false,
                        };

                        this.$axios.get(("<?php echo e(route('shop.api.products.index')); ?>"), {
                            params: this.queryParams
                        })
                            .then(response => {
                                this.isLoading = false;

                                this.products = response.data.data;

                                this.links = response.data.links;
                            }).catch(error => {
                                console.log(error);
                            });
                    },

                    loadMoreProducts() {
                        if (this.links.next) {
                            this.$axios.get(this.links.next).then(response => {
                                this.products = [...this.products, ...response.data.data];

                                this.links = response.data.links;
                            }).catch(error => {
                                console.log(error);
                            });
                        }
                    },

                    removeJsonEmptyValues(params) {
                        Object.keys(params).forEach(function (key) {
                            if ((! params[key] && params[key] !== undefined)) {
                                delete params[key];
                            }

                            if (Array.isArray(params[key])) {
                                params[key] = params[key].join(',');
                            }
                        });

                        return params;
                    },

                    jsonToQueryString(params) {
                        let parameters = new URLSearchParams();

                        for (const key in params) {
                            parameters.append(key, params[key]);
                        }

                        return parameters.toString();
                    }
                },
            });

            app.component('v-search-categories', {
                template: `
                    <div>
                        <!-- Loading State -->
                        <div
                            class="flex items-center justify-center gap-5"
                            v-if="isLoading"
                        >
                            <span
                                class="shimmer h-6 w-20 rounded"
                                role="presentation"
                            ></span>

                            <span
                                class="shimmer h-6 w-20 rounded"
                                role="presentation"
                            ></span>

                            <span
                                class="shimmer h-6 w-20 rounded"
                                role="presentation"
                            ></span>
                        </div>

                        <!-- Categories Display -->
                        <div
                            class="flex items-center justify-center"
                            v-else-if="categories.length"
                        >
                            <div
                                class="group relative flex h-[77px] items-center border-b-4 border-transparent hover:border-b-4 hover:border-[#659c44]"
                                v-for="category in categories"
                                :key="category.id"
                            >
                                <span>
                                    <a
                                        :href="category.url"
                                        class="inline-block px-5 uppercase font-dmserif text-black"
                                    >
                                        {{ category.name }}
                                    </a>
                                </span>

                                <div
                                    class="ms-1 mt-10 max-sm:mt-5 p-4 pointer-events-none absolute top-full left-0 z-[9999] mt-[10vh] max-h-[580px] w-max max-w-[1260px] overflow-auto overflow-x-auto border border-b-0 border-l-0 border-r-0 border-t-[3px] border-[rgb(108,153,47)] bg-white p-[1.5rem] opacity-0 shadow-[0_4px_10px_rgba(0,0,0,0.1)] transition duration-300 ease-out group-hover:pointer-events-auto group-hover:opacity-100 group-hover:duration-200 group-hover:ease-in"
                                    v-if="category.children && category.children.length"
                                >
                                    <div class="flex flex-wrap gap-x-[70px] gap-y-5">
                                        <div
                                            class="flex gap-3"
                                            v-for="pairCategoryChildren in pairCategoryChildren(category)"
                                        >
                                            <template v-for="secondLevelCategory in pairCategoryChildren">
                                                <p class="text-[14px] font-normal text-black leading-relaxed">
                                                    <a :href="secondLevelCategory.url" class="hover:text-[rgb(108,153,47)] transition-colors duration-200">
                                                        {{ secondLevelCategory.name }}
                                                    </a>
                                                </p>

                                                <ul
                                                    class="flex flex-wrap gap-x-4 gap-y-2"
                                                    v-if="secondLevelCategory.children && secondLevelCategory.children.length"
                                                >
                                                    <li
                                                        class="text-[14px] font-normal text-black leading-relaxed"
                                                        v-for="thirdLevelCategory in secondLevelCategory.children"
                                                    >
                                                        <a :href="thirdLevelCategory.url" class="hover:text-[rgb(108,153,47)] transition-colors duration-200 cursor-pointer">
                                                            {{ thirdLevelCategory.name }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `,

                data() {
                    return {
                        isLoading: true,
                        categories: []
                    }
                },

                mounted() {
                    this.getCategories();
                },

                methods: {
                    getCategories() {
                        this.$axios.get("<?php echo e(route('shop.api.categories.tree')); ?>")
                            .then(response => {
                                this.categories = response.data.data;
                                this.isLoading = false;
                            })
                            .catch(error => {
                                console.log(error);
                                this.isLoading = false;
                            });
                    },

                    pairCategoryChildren(category) {
                        if (!category.children) return [];

                        return category.children.reduce((result, value, index, array) => {
                            if (index % 2 === 0) {
                                result.push(array.slice(index, index + 2));
                            }
                            return result;
                        }, []);
                    }
                }
            });
        </script>
    <?php $__env->stopPush(); endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $attributes = $__attributesOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__attributesOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2643b7d197f48caff2f606750db81304)): ?>
<?php $component = $__componentOriginal2643b7d197f48caff2f606750db81304; ?>
<?php unset($__componentOriginal2643b7d197f48caff2f606750db81304); ?>
<?php endif; ?>
<?php /**PATH D:\Work\sonya_site\sonya_shop\packages\Webkul\Shop\src/resources/views/search/index.blade.php ENDPATH**/ ?>