<!-- SEO Meta Content -->
@push('meta')
<meta name="description"
    content="{{ trim($category->meta_description) != "" ? $category->meta_description : \Illuminate\Support\Str::limit(strip_tags($category->description), 120, '') }}" />

<meta name="keywords" content="{{ $category->meta_keywords }}" />

@if (core()->getConfigData('catalog.rich_snippets.categories.enable'))
    <script type="application/ld+json">
                {!! app('Webkul\Product\Helpers\SEO')->getCategoryJsonLd($category) !!}
            </script>
@endif
@endPush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ trim($category->meta_title) != "" ? $category->meta_title : $category->name }}
        </x-slot>

        {!! view_render_event('bagisto.shop.categories.view.banner_path.before') !!}

        <!-- Hero Image -->
        @if ($category->banner_path)
            <div class="container mt-8 px-[60px] max-lg:px-8 max-md:mt-4 max-md:px-4">
                <x-shop::media.images.lazy class="aspect-[4/1] max-h-full max-w-full rounded-xl"
                    src="{{ $category->banner_url }}" alt="{{ $category->name }}" width="1320" height="300" />
            </div>
        @endif

        {!! view_render_event('bagisto.shop.categories.view.banner_path.after') !!}

        {!! view_render_event('bagisto.shop.categories.view.description.before') !!}

        <!-- @if (in_array($category->display_mode, [null, 'description_only', 'products_and_description']))
            @if ($category->description)
                <div class="container mt-[34px] px-[60px] max-lg:px-8 max-md:mt-4 max-md:px-4 max-md:text-sm max-sm:text-xs">
                    {!! $category->description !!}
                </div>
            @endif
        @endif -->

        {!! view_render_event('bagisto.shop.categories.view.description.after') !!}

        @if (in_array($category->display_mode, [null, 'products_only', 'products_and_description']))
            <!-- Category Vue Component -->
            <v-category>
                <!-- Category Shimmer Effect -->
                <x-shop::shimmer.categories.view />
            </v-category>
        @endif

        @pushOnce('scripts')
            <script type="text/x-template" id="v-category-template">
                <div class="container px-[60px] max-lg:px-8 max-md:px-4">

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
                    <div class="flex items-start gap-10 max-lg:gap-5 md:mt-10">
                        <!-- Product Listing Filters -->
                        {{-- @include('shop::categories.filters') --}}


                        <!-- Product Listing Container -->
                        <div class="flex-1">
                            <!-- Desktop Product Listing Toolbar -->
                            <div class="max-md:hidden">
                                @include('shop::categories.toolbar')
                            </div>

                            <!-- Product List Card Container -->
                            <div
                                class="mt-8 grid grid-cols-1 gap-6"
                                v-if="(filters.toolbar.applied.mode ?? filters.toolbar.default.mode) === 'list'"
                            >
                                <!-- Product Card Shimmer Effect -->
                                <template v-if="isLoading">
                                    <x-shop::shimmer.products.cards.list count="12" />
                                </template>

                                <!-- Product Card Listing -->
                                {!! view_render_event('bagisto.shop.categories.view.list.product_card.before') !!}

                                <template v-else>
                                    <template v-if="products.length">
                                        <x-shop::products.card
                                            ::mode="'list'"
                                            v-for="product in products"
                                        />
                                    </template>

                                    <!-- Empty Products Container -->
                                    <template v-else>
                                        <div class="m-auto grid w-full place-content-center items-center justify-items-center py-32 text-center">
                                            <img
                                                class="max-md:h-[100px] max-md:w-[100px]"
                                                src="{{ bagisto_asset('images/thank-you.png') }}"
                                                alt="@lang('shop::app.categories.view.empty')"
                                                loading="lazy"
                                                decoding="async"
                                            />

                                            <p
                                                class="text-xl max-md:text-sm"
                                                role="heading"
                                            >
                                                @lang('shop::app.categories.view.empty')
                                            </p>
                                        </div>
                                    </template>
                                </template>

                                {!! view_render_event('bagisto.shop.categories.view.list.product_card.after') !!}
                            </div>

                            <!-- Product Grid Card Container -->
                            <div v-else class="mt-8 max-md:mt-5">
                                <!-- Product Card Shimmer Effect -->
                                <template v-if="isLoading">
                                    <div class="grid grid-cols-4 gap-8 max-1060:grid-cols-2 max-md:justify-items-center max-md:gap-x-4">
                                        <x-shop::shimmer.products.cards.grid count="12" />
                                    </div>
                                </template>

                                {!! view_render_event('bagisto.shop.categories.view.grid.product_card.before') !!}

                                <!-- Product Card Listing -->
                                <template v-else>
                                    <template v-if="products.length">
                                        <div class="grid grid-cols-4 gap-8 max-1060:grid-cols-2 max-md:justify-items-center max-md:gap-x-4">
                                            <x-shop::products.card
                                                ::mode="'grid'"
                                                v-for="product in products"
                                            />
                                        </div>
                                    </template>

                                    <!-- Empty Products Container -->
                                    <template v-else>
                                        <div class="m-auto grid w-full place-content-center items-center justify-items-center py-32 text-center">
                                            <img
                                                class="max-md:h-[100px] max-md:w-[100px]"
                                                src="{{ bagisto_asset('images/thank-you.png') }}"
                                                alt="@lang('shop::app.categories.view.empty')"
                                                loading="lazy"
                                                decoding="async"
                                            />

                                            <p
                                                class="text-xl max-md:text-sm"
                                                role="heading"
                                            >
                                                @lang('shop::app.categories.view.empty')
                                            </p>
                                        </div>
                                    </template>
                                </template>

                                {!! view_render_event('bagisto.shop.categories.view.grid.product_card.after') !!}
                            </div>

                            {!! view_render_event('bagisto.shop.categories.view.load_more_button.before') !!}

                            <!-- Load More Button -->
                            <button
                                class="secondary-button mx-auto mt-14 block w-max rounded-2xl px-11 py-3 text-center text-base max-md:rounded-lg max-sm:mt-6 max-sm:px-6 max-sm:py-1.5 max-sm:text-sm"
                                @click="loadMoreProducts"
                                v-if="links.next && ! loader"
                            >
                                @lang('shop::app.categories.view.load-more')
                            </button>

                            <button
                                v-else-if="links.next"
                                class="secondary-button mx-auto mt-14 block w-max rounded-2xl px-[74.5px] py-3.5 text-center text-base max-md:rounded-lg max-md:py-3 max-sm:mt-6 max-sm:px-[50.8px] max-sm:py-1.5"
                            >
                                <!-- Spinner -->
                                <img
                                    class="h-5 w-5 animate-spin text-navyBlue"
                                    src="{{ bagisto_asset('images/spinner.svg') }}"
                                    alt="Loading"
                                />
                            </button>

                            {!! view_render_event('bagisto.shop.categories.view.grid.load_more_button.after') !!}
                        </div>
                    </div>
                </div>
            </script>

            <script type="module">
                app.component('v-category', {
                    template: '#v-category-template',

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

                            loader: false,
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

                            document.body.style.overflow = 'scroll';

                            this.isLoading = true;

                            this.$axios.get("{{ route('shop.api.products.index', ['category_id' => $category->id]) }}", {
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
                            if (!this.links.next) {
                                return;
                            }

                            this.loader = true;

                            this.$axios.get(this.links.next)
                                .then(response => {
                                    this.loader = false;

                                    this.products = [...this.products, ...response.data.data];

                                    this.links = response.data.links;
                                }).catch(error => {
                                    console.log(error);
                                });
                        },

                        removeJsonEmptyValues(params) {
                            Object.keys(params).forEach(function (key) {
                                if ((!params[key] && params[key] !== undefined)) {
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
                                            @{{ category.name }}
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
                                                            @{{ secondLevelCategory.name }}
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
                                                                @{{ thirdLevelCategory.name }}
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
                            this.$axios.get("{{ route('shop.api.categories.tree') }}")
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
        @endPushOnce
</x-shop::layouts>