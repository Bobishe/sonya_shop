@props([
    'title' => 'Фермерское молоко из Горного Алтая',
    'linkText' => 'В каталог',
    'linkUrl' => '/search',
    'images' => []
])

<section class="hero-banner-section">
    <!-- Текстовый блок -->
    <div class="hero-banner-text">
        <div class="hero-banner-text-content">
            <h1 class="hero-banner-title">{{ $title }}</h1>
            <a href="{{ $linkUrl }}" class="hero-banner-link">{{ $linkText }}</a>
            <!-- Декоративный квадрат -->
            <div class="hero-banner-square"></div>
        </div>
    </div>

    <!-- Блок с каруселью изображений -->
    <!-- <div class="hero-banner-carousel">
        <v-hero-carousel :images="{{ json_encode($images) }}">
            <div class="overflow-hidden">
                <div class="shimmer hero-carousel-shimmer"></div>
            </div>
        </v-hero-carousel>
    </div> -->
</section>

@pushOnce('styles')
<style>
    .hero-banner-section {
        display: flex;
        width: 100%;
        position: relative;
    }

    /* Текстовый блок */
    .hero-banner-text {
        display: flex;
        align-items: center;
        background: transparent;
        position: relative;
    }

    .hero-banner-text-content {
        position: relative;
        width: 100%;
    }

    .hero-banner-title {
        font-family: Georgia, 'Times New Roman', Times, serif;
        font-style: italic;
        font-weight: bold;
        color: #6c992f;
        text-align: left;
        margin: 0;
        line-height: 1.2;
    }

    .hero-banner-link {
        display: inline-block;
        color: #6c992f;
        text-decoration: underline;
        font-size: 1rem;
        margin-top: 1.5rem;
        transition: opacity 0.3s ease;
    }

    .hero-banner-link:hover {
        opacity: 0.8;
    }

    .hero-banner-square {
        position: absolute;
        background-color: #6c992f;
        width: 40px;
        height: 40px;
    }

    /* Блок карусели */
    .hero-banner-carousel {
        position: relative;
        overflow: hidden;
    }

    .hero-carousel-shimmer {
        width: 100%;
        height: 100%;
    }

    /* Мобильная версия (до 768px) */
    @media (max-width: 767px) {
        .hero-banner-section {
            flex-direction: column;
        }

        .hero-banner-text {
            width: 100%;
            padding: 3rem 1.5rem 2rem 1.5rem;
        }

        .hero-banner-title {
            font-size: 2rem;
            max-width: calc(100% - 60px);
        }

        .hero-banner-square {
            top: 0;
            right: 0;
        }

        .hero-banner-carousel {
            width: 100%;
            height: 50vh;
            min-height: 300px;
        }

        .hero-carousel-shimmer {
            height: 50vh;
            min-height: 300px;
        }
    }

    /* Десктопная версия (от 1024px) */
    @media (min-width: 1024px) {
        .hero-banner-section {
            flex-direction: row;
            min-height: 500px;
        }

        .hero-banner-text {
            width: 50%;
            padding: 4rem 3rem 4rem 5rem;
        }

        .hero-banner-text-content {
            max-width: 600px;
        }

        .hero-banner-title {
            font-size: 3.5rem;
            max-width: calc(100% - 60px);
        }

        .hero-banner-square {
            top: 0;
            right: 0;
            width: 50px;
            height: 50px;
        }

        .hero-banner-carousel {
            width: 50%;
            height: auto;
            min-height: 500px;
        }

        .hero-carousel-shimmer {
            height: 500px;
        }
    }

    /* Средний размер (768px - 1023px) */
    @media (min-width: 768px) and (max-width: 1023px) {
        .hero-banner-section {
            flex-direction: row;
            min-height: 400px;
        }

        .hero-banner-text {
            width: 50%;
            padding: 3rem 2rem 3rem 3rem;
        }

        .hero-banner-title {
            font-size: 2.5rem;
            max-width: calc(100% - 60px);
        }

        .hero-banner-square {
            top: 0;
            right: 0;
            width: 45px;
            height: 45px;
        }

        .hero-banner-carousel {
            width: 50%;
            height: auto;
            min-height: 400px;
        }

        .hero-carousel-shimmer {
            height: 400px;
        }
    }
</style>
@endpushOnce

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-hero-carousel-template"
    >
        <div class="relative h-full w-full overflow-hidden">
            <!-- Slider -->
            <div
                class="inline-flex h-full translate-x-0 cursor-pointer transition-transform duration-700 ease-out will-change-transform"
                ref="sliderContainer"
            >
                <div
                    class="hero-slide"
                    v-for="(image, index) in images"
                    :key="index"
                    @click="visitLink(image)"
                    ref="slide"
                >
                    <x-shop::media.images.lazy
                        class="hero-carousel-image"
                        ::lazy="index === 0 ? false : true"
                        ::src="image.image"
                        ::alt="image?.title || 'Hero Banner Image ' + (index + 1)"
                        tabindex="0"
                        ::fetchpriority="index === 0 ? 'high' : 'low'"
                        ::decoding="index === 0 ? 'sync' : 'async'"
                    />
                </div>
            </div>

            <!-- Navigation Arrows -->
            <button
                class="hero-nav-button left"
                :class="{
                    'cursor-not-allowed opacity-40': direction == 'ltr' && currentIndex == 0,
                    'cursor-pointer': direction == 'ltr' ? currentIndex > 0 : currentIndex <= 0
                }"
                role="button"
                aria-label="Предыдущий слайд"
                tabindex="0"
                v-if="images?.length >= 2"
                @click="navigate('prev')"
            >
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M15 18l-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <button
                class="hero-nav-button right"
                :class="{
                    'cursor-not-allowed opacity-40': direction == 'rtl' && currentIndex == 0,
                    'cursor-pointer': direction == 'rtl' ? currentIndex < 0 : currentIndex >= 0
                }"
                role="button"
                aria-label="Следующий слайд"
                tabindex="0"
                v-if="images?.length >= 2"
                @click="navigate('next')"
            >
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M9 18l6-6-6-6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
    </script>

    <script type="module">
        app.component("v-hero-carousel", {
            template: '#v-hero-carousel-template',

            props: ['images'],

            data() {
                return {
                    isDragging: false,
                    startPos: 0,
                    currentTranslate: 0,
                    prevTranslate: 0,
                    animationID: 0,
                    currentIndex: 0,
                    slider: null,
                    slides: [],
                    autoPlayInterval: null,
                    direction: 'ltr',
                    startFrom: 1,
                    slideWidth: 0,
                };
            },

            mounted() {
                this.slider = this.$refs.sliderContainer;

                if (
                    this.$refs.slide
                    && typeof this.$refs.slide[Symbol.iterator] === 'function'
                ) {
                    this.slides = Array.from(this.$refs.slide);
                }

                if ('requestIdleCallback' in window) {
                    requestIdleCallback(() => {
                        this.init();
                        setTimeout(() => {
                            this.play();
                        }, 4000);
                    });
                } else {
                    setTimeout(() => {
                        this.init();
                        setTimeout(() => {
                            this.play();
                        }, 4000);
                    });
                }
            },

            beforeUnmount() {
                this.cleanup();
            },

            methods: {
                init() {
                    this.direction = document.dir || 'ltr';

                    if (this.direction == 'rtl') {
                        this.startFrom = -1;
                    }

                    this.updateSlideWidth();

                    this.slides.forEach((slide) => {
                        slide.querySelector('img')?.addEventListener('dragstart', (e) => e.preventDefault());

                        slide.addEventListener('mousedown', this.handleDragStart);
                        slide.addEventListener('touchstart', this.handleDragStart, { passive: true });
                        slide.addEventListener('mouseup', this.handleDragEnd);
                        slide.addEventListener('mouseleave', this.handleDragEnd);
                        slide.addEventListener('touchend', this.handleDragEnd, { passive: true });
                        slide.addEventListener('mousemove', this.handleDrag);
                        slide.addEventListener('touchmove', this.handleDrag, { passive: true });
                    });

                    window.addEventListener('resize', this.handleResize);
                },

                updateSlideWidth() {
                    if (this.slider && this.slider.parentElement) {
                        this.slideWidth = this.slider.parentElement.offsetWidth;
                    }
                },

                handleResize() {
                    this.updateSlideWidth();
                    this.setPositionByIndex();
                },

                handleDragStart(event) {
                    this.startPos = event.type === 'mousedown' ? event.clientX : event.touches[0].clientX;
                    this.isDragging = true;
                    this.animationID = requestAnimationFrame(this.animation);
                },

                handleDrag(event) {
                    if (! this.isDragging) {
                        return;
                    }

                    const currentPosition = event.type === 'mousemove' ? event.clientX : event.touches[0].clientX;
                    this.currentTranslate = this.prevTranslate + currentPosition - this.startPos;
                },

                handleDragEnd(event) {
                    clearInterval(this.autoPlayInterval);
                    cancelAnimationFrame(this.animationID);
                    this.isDragging = false;

                    const movedBy = this.currentTranslate - this.prevTranslate;

                    if (this.direction == 'ltr') {
                        if (
                            movedBy < -100
                            && this.currentIndex < this.slides.length - 1
                        ) {
                            this.currentIndex += 1;
                        }

                        if (
                            movedBy > 100
                            && this.currentIndex > 0
                        ) {
                            this.currentIndex -= 1;
                        }
                    } else {
                        if (
                            movedBy > 100
                            && this.currentIndex < this.slides.length - 1
                        ) {
                            if (Math.abs(this.currentIndex) != this.slides.length - 1) {
                                this.currentIndex -= 1;
                            }
                        }

                        if (
                            movedBy < -100
                            && this.currentIndex < 0
                        ) {
                            this.currentIndex += 1;
                        }
                    }

                    this.setPositionByIndex();
                    this.play();
                },

                animation() {
                    this.setSliderPosition();

                    if (this.isDragging) {
                        requestAnimationFrame(this.animation);
                    }
                },

                setPositionByIndex() {
                    this.currentTranslate = this.currentIndex * -this.slideWidth;
                    this.prevTranslate = this.currentTranslate;
                    this.setSliderPosition();
                },

                setSliderPosition() {
                    if (this.slider) {
                        this.slider.style.transform = `translateX(${this.currentTranslate}px)`;
                    }
                },

                visitLink(image) {
                    if (image.link) {
                        window.location.href = image.link;
                    }
                },

                navigate(type) {
                    clearInterval(this.autoPlayInterval);

                    if (this.direction === 'rtl') {
                        type === 'next' ? this.prev() : this.next();
                    } else {
                        type === 'next' ? this.next() : this.prev();
                    }

                    this.setPositionByIndex();
                    this.play();
                },

                next() {
                    this.currentIndex = (this.currentIndex + this.startFrom) % this.images.length;
                },

                prev() {
                    this.currentIndex = this.direction == 'ltr'
                        ? this.currentIndex > 0 ? this.currentIndex - 1 : 0
                        : this.currentIndex < 0 ? this.currentIndex + 1 : 0;
                },

                play() {
                    clearInterval(this.autoPlayInterval);

                    this.autoPlayInterval = setInterval(() => {
                        this.currentIndex = (this.currentIndex + this.startFrom) % this.images.length;
                        this.setPositionByIndex();
                    }, 5000);
                },

                cleanup() {
                    clearInterval(this.autoPlayInterval);
                    cancelAnimationFrame(this.animationID);

                    if (this.slides) {
                        this.slides.forEach(slide => {
                            slide.removeEventListener('mousedown', this.handleDragStart);
                            slide.removeEventListener('touchstart', this.handleDragStart);
                            slide.removeEventListener('mouseup', this.handleDragEnd);
                            slide.removeEventListener('mouseleave', this.handleDragEnd);
                            slide.removeEventListener('touchend', this.handleDragEnd);
                            slide.removeEventListener('mousemove', this.handleDrag);
                            slide.removeEventListener('touchmove', this.handleDrag);
                        });
                    }

                    window.removeEventListener('resize', this.handleResize);
                },
            },
        });
    </script>

    <style>
        /* Стили для слайдов в hero-баннере */
        .hero-slide {
            min-width: 100%;
            height: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-carousel-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }

        /* Кнопки навигации */
        .hero-nav-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.6);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .hero-nav-button:hover {
            background: rgba(255, 255, 255, 0.9);
        }

        .hero-nav-button.left {
            left: 20px;
        }

        .hero-nav-button.right {
            right: 20px;
        }

        .hero-nav-button svg {
            width: 24px;
            height: 24px;
            stroke: #333;
            stroke-width: 2;
        }

        /* Скрываем стрелки на мобильных */
        @media (max-width: 767px) {
            .hero-nav-button {
                display: none !important;
            }
        }
    </style>
@endpushOnce
