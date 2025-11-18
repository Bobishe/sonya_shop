@php
    $channel = core()->getCurrentChannel();
@endphp

<!-- SEO Meta Content -->
@push ('meta')
    <meta
        name="title"
        content="{{ $channel->home_seo['meta_title'] ?? '' }}"
    />

    <meta
        name="description"
        content="{{ $channel->home_seo['meta_description'] ?? '' }}"
    />

    <meta
        name="keywords"
        content="{{ $channel->home_seo['meta_keywords'] ?? '' }}"
    />
@endPush

@push('scripts')
    <script>
        localStorage.setItem('categories', JSON.stringify(@json($categories)));
    </script>
@endpush

@push('styles')
<style>
    :root {
        --primary-black: #000000;
        --primary-green: #659c44;
        --primary-white: #ffffff;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }

    .hero-slider {
        height: 100vh;
        position: relative;
    }

    .hero-slider img {
        width: 100%;
        height: 100vh;
        object-fit: cover;
    }

    .hero-nav-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.7);
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 10;
    }

    .hero-nav-arrow:hover {
        background: rgba(255, 255, 255, 0.9);
    }

    .hero-nav-arrow.left {
        left: 20px;
    }

    .hero-nav-arrow.right {
        right: 20px;
    }

    .hero-pagination {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
        z-index: 10;
    }

    .hero-pagination-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .hero-pagination-dot.active {
        background: var(--primary-green);
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-black);
        margin-bottom: 2rem;
        text-align: center;
    }

    .product-card {
        border: 1px solid #e5e5e5;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .product-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    .promo-block {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: center;
        padding: 4rem 0;
    }

    .category-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
    }

    .category-card {
        position: relative;
        height: 300px;
        border-radius: 8px;
        overflow: hidden;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .category-card:hover {
        transform: scale(1.05);
    }

    .category-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .category-card-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
        padding: 2rem;
        color: white;
    }

    .about-brand {
        text-align: center;
        padding: 4rem 0;
        background: #f9f9f9;
    }

    @media (max-width: 768px) {
        .hero-slider {
            height: 60vh;
        }

        .hero-slider img {
            height: 60vh;
        }

        .promo-block {
            grid-template-columns: 1fr;
        }

        .section-title {
            font-size: 1.8rem;
        }
    }
</style>
@endpush

<x-shop::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{  $channel->home_seo['meta_title'] ?? '' }}
    </x-slot>

    <!-- Hero Slider Section -->
    <section class="hero-slider">
        @php
            $heroImages = $customizations->where('type', 'image_carousel')->first();
        @endphp

        @if($heroImages && !empty($heroImages->options['images']))
            <v-hero-carousel :images="{{ json_encode($heroImages->options['images']) }}">
                <div class="overflow-hidden">
                    <div class="shimmer aspect-[16/9] h-screen w-screen"></div>
                </div>
            </v-hero-carousel>
        @else
            <!-- Default hero slider -->
            <div class="hero-slider">
                <img src="{{ bagisto_asset('images/default-hero.jpg') }}" alt="Hero Image">
            </div>
        @endif
    </section>

    <!-- New Products Section -->
    <section class="container mx-auto px-8 py-16 max-sm:px-4">
        <h2 class="section-title">НОВИНКИ</h2>

        <x-shop::products.carousel
            title=""
            :src="route('shop.api.products.index', ['sort' => 'created_at', 'order' => 'desc', 'limit' => 8])"
            :navigation-link="route('shop.search.index', ['sort' => 'created_at'])"
        />
    </section>

    <!-- Promo Block Section -->
    <section class="container mx-auto px-8 max-sm:px-4">
        <div class="promo-block">
            <div class="promo-image">
                <img src="{{ bagisto_asset('images/promo-image.jpg') }}" alt="Акция" style="width: 100%; border-radius: 8px;">
            </div>
            <div class="promo-content">
                <h2 style="font-size: 2rem; font-weight: 700; color: var(--primary-green); margin-bottom: 1rem;">
                    Специальное предложение
                </h2>
                <p style="font-size: 1.1rem; line-height: 1.8; color: #333;">
                    Воспользуйтесь нашими специальными предложениями и скидками на избранные товары.
                    Качественная продукция по лучшим ценам для вас и вашей семьи.
                </p>
                <a href="{{ route('shop.search.index') }}"
                   style="display: inline-block; margin-top: 1.5rem; padding: 12px 30px; background: var(--primary-green); color: white; text-decoration: none; border-radius: 4px; font-weight: 600;">
                    Узнать больше
                </a>
            </div>
        </div>
    </section>

    <!-- Popular Categories Section -->
    <section class="container mx-auto px-8 py-16 max-sm:px-4">
        <h2 class="section-title">ПОПУЛЯРНЫЕ КАТЕГОРИИ</h2>

        <div class="category-grid">
            @foreach($categories->take(6) as $category)
                <a href="{{ $category['url'] }}" class="category-card">
                    @if($category['logo_path'])
                        <img src="{{ Storage::url($category['logo_path']) }}" alt="{{ $category['name'] }}">
                    @else
                        <img src="{{ bagisto_asset('images/category-placeholder.jpg') }}" alt="{{ $category['name'] }}">
                    @endif
                    <div class="category-card-overlay">
                        <h3 style="font-size: 1.5rem; font-weight: 600;">{{ $category['name'] }}</h3>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- About Brand Section -->
    <section class="about-brand">
        <div class="container mx-auto px-8 max-sm:px-4">
            <h2 class="section-title">О БРЕНДЕ</h2>
            <p style="font-size: 1.1rem; line-height: 1.8; color: #666; max-width: 800px; margin: 0 auto;">
                Мы предлагаем широкий ассортимент качественных товаров для вашего дома и семьи.
                Наша миссия - сделать покупки удобными и приятными, предоставляя только лучшие продукты
                по доступным ценам. Доверие наших клиентов - наш главный приоритет.
            </p>
        </div>
    </section>

    <!-- Additional customizations from admin -->
    @foreach ($customizations as $customization)
        @php ($data = $customization->options) @endphp

        @switch ($customization->type)
            @case ($customization::STATIC_CONTENT)
                @if (! empty($data['css']))
                    @push ('styles')
                        <style>
                            {{ $data['css'] }}
                        </style>
                    @endpush
                @endif

                @if (! empty($data['html']))
                    {!! $data['html'] !!}
                @endif

                @break
            @case ($customization::CATEGORY_CAROUSEL)
                <x-shop::categories.carousel
                    :title="$data['title'] ?? ''"
                    :src="route('shop.api.categories.index', $data['filters'] ?? [])"
                    :navigation-link="route('shop.home.index')"
                />
                @break
            @case ($customization::PRODUCT_CAROUSEL)
                <x-shop::products.carousel
                    :title="$data['title'] ?? ''"
                    :src="route('shop.api.products.index', $data['filters'] ?? [])"
                    :navigation-link="route('shop.search.index', $data['filters'] ?? [])"
                />
                @break
        @endswitch
    @endforeach
</x-shop::layouts>

@pushOnce('scripts')
<script type="text/x-template" id="v-hero-carousel-template">
    <div class="hero-slider">
        <div class="relative w-full h-screen overflow-hidden">
            <div class="flex transition-transform duration-700 ease-out h-full"
                 :style="{ transform: `translateX(-${currentSlide * 100}%)` }">
                <div v-for="(image, index) in images"
                     :key="index"
                     class="min-w-full h-full flex-shrink-0"
                     @click="visitLink(image)">
                    <img :src="image.image"
                         :alt="image.title || 'Slide ' + (index + 1)"
                         class="w-full h-full object-cover cursor-pointer">
                </div>
            </div>

            <!-- Navigation Arrows -->
            <div v-if="images.length > 1"
                 class="hero-nav-arrow left"
                 @click="prevSlide">
                <span class="icon-arrow-left text-2xl text-black"></span>
            </div>

            <div v-if="images.length > 1"
                 class="hero-nav-arrow right"
                 @click="nextSlide">
                <span class="icon-arrow-right text-2xl text-black"></span>
            </div>

            <!-- Pagination Dots -->
            <div v-if="images.length > 1" class="hero-pagination">
                <div v-for="(image, index) in images"
                     :key="'dot-' + index"
                     class="hero-pagination-dot"
                     :class="{ active: currentSlide === index }"
                     @click="goToSlide(index)">
                </div>
            </div>
        </div>
    </div>
</script>

<script type="module">
    app.component('v-hero-carousel', {
        template: '#v-hero-carousel-template',

        props: ['images'],

        data() {
            return {
                currentSlide: 0,
                autoPlayInterval: null
            }
        },

        mounted() {
            this.startAutoPlay();
        },

        beforeUnmount() {
            this.stopAutoPlay();
        },

        methods: {
            nextSlide() {
                this.currentSlide = (this.currentSlide + 1) % this.images.length;
                this.resetAutoPlay();
            },

            prevSlide() {
                this.currentSlide = (this.currentSlide - 1 + this.images.length) % this.images.length;
                this.resetAutoPlay();
            },

            goToSlide(index) {
                this.currentSlide = index;
                this.resetAutoPlay();
            },

            visitLink(image) {
                if (image.link) {
                    window.location.href = image.link;
                }
            },

            startAutoPlay() {
                this.autoPlayInterval = setInterval(() => {
                    this.nextSlide();
                }, 5000);
            },

            stopAutoPlay() {
                if (this.autoPlayInterval) {
                    clearInterval(this.autoPlayInterval);
                }
            },

            resetAutoPlay() {
                this.stopAutoPlay();
                this.startAutoPlay();
            }
        }
    });
</script>
@endPushOnce
