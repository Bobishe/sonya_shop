<?php
    $searchTitle = $suggestion ?? $query;
    $title = $searchTitle ? trans('shop::app.search.title', ['query' => $searchTitle]) : trans('shop::app.search.results');
    $searchInstead = $suggestion ? $query : null;
?>
<!-- SEO Meta Content -->
@push('meta')
    <meta
        name="description"
        content="{{ $title }}"
    />

    <meta
        name="keywords"
        content="{{ $title }}"
    />
@endPush

<x-shop::layouts :has-feature="false">
    <!-- Page Title -->
    <x-slot:title>
        {{ $title }}
    </x-slot>

    <div class="container px-[60px] max-lg:px-8 max-sm:px-4">
        @if (request()->has('image-search'))
            @include('shop::search.images.results')
        @endif

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

        @if ($searchInstead)
            <form
                action="{{ route('shop.search.index', ['suggest' => false]) }}"
                class="flex max-w-[445px] items-center"
                role="search"
            >
                <input
                    type="text"
                    name="query"
                    class="hidden"
                    value="{{ $searchInstead }}"
                >

                <input
                    type="text"
                    name="suggest"
                    class="hidden"
                    value="0"
                >

                <p class="mt-1 text-sm text-gray-600">
                    {{ trans('shop::app.search.suggest') }}

                    <button
                        type="submit"
                        class="text-blue-600 hover:text-blue-800 hover:underline"
                        aria-label="{{ trans('shop::app.components.layouts.header.desktop.bottom.submit') }}"
                    >
                        {{ $searchInstead }}
                    </button>
                </p>
            </form>
        @endif
    </div>

    <!-- Product Listing -->
    <v-search>
        <x-shop::shimmer.categories.view />
    </v-search>

    @pushOnce('scripts')
        <script
            type="text/x-template"
            id="v-search-template"
        >
            <div class="container px-[60px] max-lg:px-8 max-sm:px-4">
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
                                            class="max-sm:h-[100px] max-sm:w-[100px]"
                                            src="{{ bagisto_asset('images/thank-you.png') }}"
                                            alt="Empty result"
                                            loading="lazy"
                                            decoding="async"
                                        />

                                        <p
                                            class="text-xl max-sm:text-sm"
                                            role="heading"
                                        >
                                            @lang('shop::app.categories.view.empty')
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
                                    <x-shop::shimmer.products.cards.grid count="12" />
                                </div>
                            </template>

                            <!-- Product Card Listing -->
                            <template v-else>
                                <template v-if="products.length">
                                    <div class="mt-8 grid grid-cols-4 gap-8 max-1060:grid-cols-2 max-md:mt-5 max-md:justify-items-center max-md:gap-x-4 max-md:gap-y-5">
                                        <x-shop::products.card
                                            ::mode="'grid'"
                                            v-for="product in products"
                                            :navigation-link="route('shop.search.index')"
                                        />
                                    </div>
                                </template>

                                <!-- Empty Products Container -->
                                <template v-else>
                                    <div class="m-auto grid w-full place-content-center items-center justify-items-center py-32 text-center">
                                        <img
                                            class="max-sm:h-[100px] max-sm:w-[100px]"
                                            src="{{ bagisto_asset('images/thank-you.png') }}"
                                            alt="Empty result"
                                            loading="lazy"
                                            decoding="async"
                                        />

                                        <p
                                            class="text-xl max-sm:text-sm"
                                            role="heading"
                                        >
                                            @lang('shop::app.categories.view.empty')
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
                            @lang('shop::app.categories.view.load-more')
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

                        this.$axios.get(("{{ route('shop.api.products.index') }}"), {
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
                                        @{{ category.name }}
                                    </a>
                                </span>

                                <div
                                    class="pointer-events-none absolute top-[78px] z-[9999] max-h-[580px] w-max max-w-[1260px] translate-y-1 overflow-auto overflow-x-auto border border-b-0 border-l-0 border-r-0 border-t border-[#F3F3F3] bg-white p-9 opacity-0 shadow-[0_6px_6px_1px_rgba(0,0,0,.3)] transition duration-300 ease-out group-hover:pointer-events-auto group-hover:translate-y-0 group-hover:opacity-100 group-hover:duration-200 group-hover:ease-in ltr:-left-9 rtl:-right-9"
                                    v-if="category.children && category.children.length"
                                >
                                    <div class="flex justify-between gap-x-[70px]">
                                        <div
                                            class="grid w-full min-w-max max-w-[150px] flex-auto grid-cols-[1fr] content-start gap-5"
                                            v-for="pairCategoryChildren in pairCategoryChildren(category)"
                                        >
                                            <template v-for="secondLevelCategory in pairCategoryChildren">
                                                <p class="font-medium text-navyBlue">
                                                    <a :href="secondLevelCategory.url">
                                                        @{{ secondLevelCategory.name }}
                                                    </a>
                                                </p>

                                                <ul
                                                    class="grid grid-cols-[1fr] gap-3"
                                                    v-if="secondLevelCategory.children && secondLevelCategory.children.length"
                                                >
                                                    <li
                                                        class="text-sm font-medium text-zinc-500"
                                                        v-for="thirdLevelCategory in secondLevelCategory.children"
                                                    >
                                                        <a :href="thirdLevelCategory.url">
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
