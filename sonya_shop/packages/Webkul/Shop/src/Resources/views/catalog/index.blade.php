<!-- SEO Meta Content -->
@push('meta')
    <meta
        name="description"
        content="@lang('shop::app.catalog.meta-description')"
    />

    <meta
        name="keywords"
        content="@lang('shop::app.catalog.meta-keywords')"
    />
@endPush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        @lang('shop::app.catalog.title')
    </x-slot>

    <div class="container mt-8 px-[60px] max-lg:px-8 max-md:mt-5 max-md:px-4">
        <!-- Page Header -->
        <div class="mb-8 flex items-center justify-between max-md:mb-5">
            <h1 class="text-3xl font-medium max-md:text-2xl max-sm:text-xl">
                @lang('shop::app.catalog.title')
            </h1>
        </div>

        @if($categories->count())
            <!-- Categories Grid -->
            <div class="grid grid-cols-3 gap-8 max-1060:grid-cols-2 max-md:grid-cols-1 max-md:gap-5">
                @foreach($categories as $category)
                    <!-- Category Card -->
                    <a
                        href="{{ $category->url }}"
                        class="group block overflow-hidden rounded-xl border border-gray-200 bg-white transition-all duration-300 hover:border-navyBlue hover:shadow-lg"
                    >
                        <!-- Category Image -->
                        <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                            @if($category->logo_url)
                                <x-shop::media.images.lazy
                                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                                    src="{{ $category->logo_url }}"
                                    alt="{{ $category->name }}"
                                    width="400"
                                    height="300"
                                />
                            @else
                                <div class="flex h-full w-full items-center justify-center bg-gray-100">
                                    <svg class="h-20 w-20 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Category Info -->
                        <div class="p-5 max-md:p-4">
                            <h2 class="mb-2 text-xl font-medium text-navyBlue transition-colors group-hover:text-blue-600 max-md:text-lg">
                                {{ $category->name }}
                            </h2>

                            @if($category->description)
                                <p class="line-clamp-2 text-sm text-gray-600 max-md:text-xs">
                                    {!! strip_tags($category->description) !!}
                                </p>
                            @endif

                            <!-- Product Count (if available) -->
                            @if($category->products_count ?? false)
                                <p class="mt-3 text-xs text-gray-500">
                                    {{ trans_choice('shop::app.catalog.products-count', $category->products_count, ['count' => $category->products_count]) }}
                                </p>
                            @endif

                            <!-- Children Categories Count -->
                            @if($category->children && $category->children->count() > 0)
                                <div class="mt-3 flex items-center gap-2 text-xs text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                                    </svg>
                                    <span>
                                        {{ trans_choice('shop::app.catalog.subcategories-count', $category->children->count(), ['count' => $category->children->count()]) }}
                                    </span>
                                </div>
                            @endif

                            <!-- View Category Button -->
                            <div class="mt-4 flex items-center text-sm font-medium text-navyBlue group-hover:text-blue-600">
                                <span>@lang('shop::app.catalog.view-category')</span>
                                <svg class="ml-2 h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="m-auto grid w-full place-content-center items-center justify-items-center py-32 text-center">
                <img
                    class="max-md:h-[100px] max-md:w-[100px]"
                    src="{{ bagisto_asset('images/thank-you.png') }}"
                    alt="@lang('shop::app.catalog.empty')"
                    loading="lazy"
                    decoding="async"
                />

                <p class="mt-5 text-xl text-gray-600 max-md:text-sm">
                    @lang('shop::app.catalog.empty')
                </p>
            </div>
        @endif
    </div>
</x-shop::layouts>
