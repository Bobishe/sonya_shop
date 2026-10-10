<v-categories-navigation>
    <div class="flex items-center justify-center gap-5 max-md:gap-3">
        @foreach (range(1, 3) as $index)
            <span
                class="shimmer h-6 w-20 rounded-sm max-sm:h-5 max-sm:w-16"
                role="presentation"
            ></span>
        @endforeach
    </div>
</v-categories-navigation>

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-categories-navigation-template"
    >
        <div>
            <div
                class="flex items-center justify-center gap-5 max-md:gap-3"
                v-if="isLoading"
            >
                <span
                    class="shimmer h-6 w-20 rounded-sm max-sm:h-5 max-sm:w-16"
                    role="presentation"
                    v-for="index in 3"
                ></span>
            </div>

            <nav
                class="flex flex-wrap items-center justify-center gap-y-2 max-md:justify-start max-md:px-2.5"
                aria-label="@lang('shop::app.components.categories.navigation.title')"
                v-else-if="categories.length"
            >
                <div
                    class="group relative flex h-19.25 items-center border-b-4 border-transparent hover:border-[#659c44] max-lg:h-16.25 max-md:h-13.75 max-sm:h-12.5"
                    v-for="category in categories"
                    :key="category.id"
                >
                    <a
                        :href="category.url"
                        class="inline-block whitespace-nowrap px-5 font-dmserif uppercase text-black max-lg:px-4 max-md:px-3 max-md:text-sm max-sm:px-2 max-sm:text-xs"
                    >
                        @{{ category.name }}
                    </a>

                    <div
                        class="absolute left-0 top-full z-50 ms-1 mt-10 hidden max-h-145 w-max max-w-[min(78.75rem,calc(100vw-4rem))] overflow-auto border-x-0 border-b-0 border-t-[3px] border-[#6c992f] bg-white p-6 shadow-[0_4px_10px_rgba(0,0,0,0.1)] group-hover:block max-lg:max-w-225 max-md:hidden!"
                        v-if="category.children && category.children.length"
                    >
                        <div class="flex flex-wrap gap-x-17.5 gap-y-5 max-lg:gap-x-12.5">
                            <div
                                class="flex gap-3"
                                v-for="pairCategoryChildren in pairCategoryChildren(category)"
                            >
                                <template v-for="secondLevelCategory in pairCategoryChildren">
                                    <p class="text-sm font-normal leading-relaxed text-black">
                                        <a
                                            :href="secondLevelCategory.url"
                                            class="transition-colors duration-200 hover:text-[#6c992f]"
                                        >
                                            @{{ secondLevelCategory.name }}
                                        </a>
                                    </p>

                                    <ul
                                        class="flex flex-wrap gap-x-4 gap-y-2"
                                        v-if="secondLevelCategory.children && secondLevelCategory.children.length"
                                    >
                                        <li
                                            class="text-sm font-normal leading-relaxed text-black"
                                            v-for="thirdLevelCategory in secondLevelCategory.children"
                                        >
                                            <a
                                                :href="thirdLevelCategory.url"
                                                class="cursor-pointer transition-colors duration-200 hover:text-[#6c992f]"
                                            >
                                                @{{ thirdLevelCategory.name }}
                                            </a>
                                        </li>
                                    </ul>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </script>

    <script type="module">
        app.component('v-categories-navigation', {
            template: '#v-categories-navigation-template',

            data() {
                return {
                    isLoading: true,

                    categories: [],
                };
            },

            mounted() {
                this.getCategories();
            },

            methods: {
                getCategories() {
                    this.$axios.get("{{ route('shop.api.categories.tree') }}")
                        .then(response => {
                            this.categories = response.data.data;
                        })
                        .finally(() => {
                            this.isLoading = false;
                        });
                },

                pairCategoryChildren(category) {
                    return (category.children ?? []).reduce((result, value, index, array) => {
                        if (index % 2 === 0) {
                            result.push(array.slice(index, index + 2));
                        }

                        return result;
                    }, []);
                },
            },
        });
    </script>
@endPushOnce
