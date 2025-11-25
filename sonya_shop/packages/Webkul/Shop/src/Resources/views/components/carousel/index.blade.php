@props(['options'])

<v-hero-carousel :images="{{ json_encode($options['images'] ?? []) }}">
    <div class="hero-section">
        <div class="hero-content">
            <div class="shimmer hero-text-placeholder"></div>
        </div>
        <div class="hero-image">
            <div class="shimmer hero-image-placeholder"></div>
        </div>
    </div>
</v-hero-carousel>

@pushOnce('styles')
<style>
    /* ===== HERO SECTION ===== */
    .hero-section {
        display: flex;
        flex-direction: row;
        height: 70vh;
        width: 100%;
        overflow: hidden;
    }

    /* ===== TEXT CONTENT BLOCK ===== */
    .hero-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        padding: 60px 80px;
        background-color: #6d992f0e;
        position: relative;
    }

    .hero-title {
        font-size: clamp(32px, 4vw, 56px);
        font-weight: 700;
        font-style: italic;
        line-height: 1.15;
        color: #6c992f;
        margin: 0 0 30px 0;
        max-width: 500px;
    }

    .hero-link {
        font-family: inherit;
        font-size: 16px;
        color: #6c992f;
        text-decoration: underline;
        text-underline-offset: 4px;
        transition: opacity 0.3s ease;
        cursor: pointer;
    }

    .hero-link:hover {
        opacity: 0.7;
    }

    /* Декоративный квадрат */
    .hero-decorator {
        position: absolute;
        right: -10px;
        top: 50%;
        transform: translateY(-50%);
        width: 20px;
        height: 20px;
        background-color: #6c992f;
        z-index: 5;
    }

    /* ===== IMAGE CAROUSEL BLOCK ===== */
    .hero-image {
        flex: 1;
        position: relative;
        overflow: hidden;
        height: 100%;
        background-color: #6d992f0e;
    }

    .hero-carousel-container {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .hero-carousel-slider {
        display: flex;
        height: 100%;
        transition: transform 700ms ease-out;
        will-change: transform;
    }

    .hero-carousel-slide {
        flex: 0 0 100%;
        width: 100%;
        height: 100%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    /* Стили для изображения и всех возможных оберток */
    .hero-carousel-slide > *,
    .hero-carousel-slide picture,
    .hero-carousel-slide figure {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-carousel-image,
    .hero-carousel-slide img {
        width: 100% !important;
        height: 100% !important;
        max-width: 100%;
        max-height: 100%;
        object-fit: contain !important;
        object-position: center center !important;
        display: block;
        user-select: none;
        -webkit-user-select: none;
    }

    /* ===== NAVIGATION ARROWS ===== */
    .hero-carousel-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.5);
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 10;
    }

    .hero-carousel-nav:hover {
        background: rgba(255, 255, 255, 0.8);
    }

    .hero-carousel-nav.left {
        left: 20px;
    }

    .hero-carousel-nav.right {
        right: 20px;
    }

    .hero-carousel-nav svg {
        width: 28px;
        height: 28px;
        stroke: #333;
        stroke-width: 2;
    }

    /* ===== CAROUSEL INDICATORS ===== */
    .hero-carousel-indicators {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 10px;
        z-index: 10;
    }

    .hero-carousel-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        border: none;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .hero-carousel-dot.active {
        background: #8B2942;
    }

    /* ===== SHIMMER PLACEHOLDERS ===== */
    .hero-text-placeholder {
        width: 80%;
        height: 200px;
    }

    .hero-image-placeholder {
        width: 100%;
        height: 100%;
    }

    /* ===== MOBILE STYLES ===== */
    @media (max-width: 768px) {
        .hero-section {
            flex-direction: column;
            height: 100vh;
        }

        .hero-content {
            order: 1;
            padding: 40px 24px;
            flex: 0 0 auto;
        }

        .hero-title {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .hero-decorator {
            right: 0;
            top: 50%;
            width: 16px;
            height: 16px;
        }

        .hero-image {
            order: 2;
            flex: 1 1 0;
            min-height: 0;
            height: auto;
        }

        .hero-carousel-container,
        .hero-carousel-slider,
        .hero-carousel-slide {
            height: 100%;
        }

        .hero-carousel-image,
        .hero-carousel-slide img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center center;
        }

        /* Скрываем стрелки на мобильных */
        .hero-carousel-nav {
            display: none !important;
        }

        .hero-carousel-indicators {
            bottom: 15px;
        }

        .hero-carousel-dot {
            width: 8px;
            height: 8px;
        }
    }

    /* ===== TABLET STYLES ===== */
    @media (min-width: 769px) and (max-width: 1024px) {
        .hero-content {
            padding: 40px 50px;
        }

        .hero-title {
            font-size: 36px;
        }
    }
</style>
@endpushOnce

@pushOnce('scripts')
<script type="text/x-template" id="v-hero-carousel-template">
    <section class="hero-section">
        <!-- Text Content Block -->
        <div class="hero-content">
            <h1 class="hero-title font-dmserif">
                Магазин нижнего белья
            </h1>
            <a 
                href="/search" 
                class="hero-link"
            >
                В каталог
            </a>
            <div class="hero-decorator"></div>
        </div>

        <!-- Image Carousel Block -->
        <div class="hero-image">
            <div class="hero-carousel-container" v-if="images && images.length">
                <div 
                    class="hero-carousel-slider"
                    ref="sliderContainer"
                    :style="{ transform: `translateX(-${currentIndex * 100}%)` }"
                >
                    <div
                        class="hero-carousel-slide"
                        v-for="(image, index) in images"
                        :key="index"
                        @click="visitLink(image)"
                        @mousedown="handleDragStart"
                        @touchstart="handleDragStart"
                        @mouseup="handleDragEnd"
                        @mouseleave="handleDragEnd"
                        @touchend="handleDragEnd"
                        @mousemove="handleDrag"
                        @touchmove="handleDrag"
                    >
                        <x-shop::media.images.lazy
                            class="hero-carousel-image"
                            ::lazy="index === 0 ? false : true"
                            ::src="image.image"
                            ::srcset="image.image + ' 1920w, ' + image.image.replace('storage', 'cache/large') + ' 1280w,' + image.image.replace('storage', 'cache/medium') + ' 1024w, ' + image.image.replace('storage', 'cache/small') + ' 525w'"
                            sizes="(max-width: 768px) 100vw, 50vw"
                            ::alt="image?.title || 'Hero Image ' + (index + 1)"
                            ::fetchpriority="index === 0 ? 'high' : 'low'"
                            ::decoding="index === 0 ? 'sync' : 'async'"
                        />
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <button
                    v-if="images.length > 1"
                    class="hero-carousel-nav left"
                    @click="navigate('prev')"
                    aria-label="@lang('shop::components.carousel.previous')"
                >
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M15 18l-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

                <button
                    v-if="images.length > 1"
                    class="hero-carousel-nav right"
                    @click="navigate('next')"
                    aria-label="@lang('shop::components.carousel.next')"
                >
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M9 18l6-6-6-6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

                <!-- Indicators -->
                <div class="hero-carousel-indicators" v-if="images.length > 1">
                    <button
                        v-for="(image, index) in images"
                        :key="index"
                        class="hero-carousel-dot"
                        :class="{ active: currentIndex === index }"
                        @click="goToSlide(index)"
                        :aria-label="'Slide ' + (index + 1)"
                    ></button>
                </div>
            </div>
        </div>
    </section>
</script>

<script type="module">
    app.component("v-hero-carousel", {
        template: '#v-hero-carousel-template',

        props: ['images'],

        data() {
            return {
                currentIndex: 0,
                isDragging: false,
                startPos: 0,
                currentTranslate: 0,
                prevTranslate: 0,
                autoPlayInterval: null,
            };
        },

        mounted() {
            if (this.images && this.images.length > 1) {
                this.startAutoPlay();
            }
        },

        beforeUnmount() {
            this.stopAutoPlay();
        },

        methods: {
            getTitle() {
                // Берём title из первого изображения или дефолтный
                if (this.images && this.images[0] && this.images[0].title) {
                    return this.images[0].title;
                }
                return 'НИЖНЕЕ БЕЛЬЁ РУЧНОЙ РАБОТЫ С ИДЕАЛЬНОЙ ПОСАДКОЙ';
            },

            getCatalogLink() {
                // Берём link из первого изображения или дефолтный
                if (this.images && this.images[0] && this.images[0].link) {
                    return this.images[0].link;
                }
                return '/categories';
            },

            visitLink(image) {
                if (!this.isDragging && image.link) {
                    window.location.href = image.link;
                }
            },

            navigate(direction) {
                this.stopAutoPlay();
                
                if (direction === 'next') {
                    this.currentIndex = (this.currentIndex + 1) % this.images.length;
                } else {
                    this.currentIndex = this.currentIndex === 0 
                        ? this.images.length - 1 
                        : this.currentIndex - 1;
                }
                
                this.startAutoPlay();
            },

            goToSlide(index) {
                this.stopAutoPlay();
                this.currentIndex = index;
                this.startAutoPlay();
            },

            handleDragStart(event) {
                this.isDragging = true;
                this.startPos = event.type === 'mousedown' 
                    ? event.clientX 
                    : event.touches[0].clientX;
                this.stopAutoPlay();
            },

            handleDrag(event) {
                if (!this.isDragging) return;
                
                const currentPosition = event.type === 'mousemove' 
                    ? event.clientX 
                    : event.touches[0].clientX;
                this.currentTranslate = currentPosition - this.startPos;
            },

            handleDragEnd() {
                if (!this.isDragging) return;
                
                this.isDragging = false;
                const movedBy = this.currentTranslate;

                if (movedBy < -50 && this.currentIndex < this.images.length - 1) {
                    this.currentIndex++;
                } else if (movedBy > 50 && this.currentIndex > 0) {
                    this.currentIndex--;
                }

                this.currentTranslate = 0;
                this.startAutoPlay();
            },

            startAutoPlay() {
                this.stopAutoPlay();
                this.autoPlayInterval = setInterval(() => {
                    this.currentIndex = (this.currentIndex + 1) % this.images.length;
                }, 5000);
            },

            stopAutoPlay() {
                if (this.autoPlayInterval) {
                    clearInterval(this.autoPlayInterval);
                    this.autoPlayInterval = null;
                }
            },
        },
    });
</script>
@endpushOnce