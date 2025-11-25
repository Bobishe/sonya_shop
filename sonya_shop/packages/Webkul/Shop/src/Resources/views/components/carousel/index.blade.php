@props(['options'])

<v-carousel :images="{{ json_encode($options['images'] ?? []) }}">
    <div class="overflow-hidden">
        <div class="shimmer h-screen w-screen carousel-height"></div>
    </div>
</v-carousel>

@pushOnce('styles')
<style>
    .hero-carousel-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 70px;
        height: 70px;
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
        left: 30px;
    }

    .hero-carousel-nav.right {
        right: 30px;
    }

    .hero-carousel-nav svg {
        width: 32px;
        height: 32px;
        stroke: white;
        stroke-width: 3;
    }

    /* Мобильная версия */
    @media (max-width: 768px) {
        /* Скрываем стрелки на мобильных */
        .hero-carousel-nav {
            display: none !important;
        }

        /* Высота баннера 70% экрана на мобильных */
        .carousel-height {
            height: 70vh !important;
        }

        .mobile-carousel-slide img {
            height: 70vh !important;
            object-fit: cover;
        }
    }
</style>
@endpushOnce

@pushOnce('scripts')
    <script
        type="text/x-template"
        id="v-carousel-template"
    >
        <div class="relative m-auto flex w-full overflow-hidden">
            <!-- Slider -->
            <div
                class="inline-flex translate-x-0 cursor-pointer transition-transform duration-700 ease-out will-change-transform"
                ref="sliderContainer"
            >
                <div
                    class="h-screen w-screen bg-cover bg-no-repeat mobile-carousel-slide carousel-height"
                    v-for="(image, index) in images"
                    :key="index"
                    @click="visitLink(image)"
                    ref="slide"
                >
                    <x-shop::media.images.lazy
                        class="h-full w-full object-cover select-none transition-transform duration-300 ease-in-out will-change-transform"
                        ::lazy="index === 0 ? false : true"
                        ::src="image.image"
                        ::srcset="image.image + ' 1920w, ' + image.image.replace('storage', 'cache/large') + ' 1280w,' + image.image.replace('storage', 'cache/medium') + ' 1024w, ' + image.image.replace('storage', 'cache/small') + ' 525w'"
                        ::sizes="
                            '(max-width: 525px) 525px, ' +
                            '(max-width: 1024px) 1024px, ' +
                            '(max-width: 1600px) 1280px, ' +
                            '1920px'
                        "
                        ::alt="image?.title || 'Carousel Image ' + (index + 1)"
                        tabindex="0"
                        ::fetchpriority="index === 0 ? 'high' : 'low'"
                        ::decoding="index === 0 ? 'sync' : 'async'"
                    />
                </div>
            </div>

            <!-- Navigation Arrows -->
            <button
                class="hero-carousel-nav left"
                :class="{
                    'cursor-not-allowed opacity-40': direction == 'ltr' && currentIndex == 0,
                    'cursor-pointer': direction == 'ltr' ? currentIndex > 0 : currentIndex <= 0
                }"
                role="button"
                aria-label="@lang('shop::components.carousel.previous')"
                tabindex="0"
                v-if="images?.length >= 2"
                @click="navigate('prev')"
            >
                <svg viewBox="0 0 24 24" fill="none">
                    <path d="M15 18l-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <button
                class="hero-carousel-nav right"
                :class="{
                    'cursor-not-allowed opacity-40': direction == 'rtl' && currentIndex == 0,
                    'cursor-pointer': direction == 'rtl' ? currentIndex < 0 : currentIndex >= 0
                }"
                role="button"
                aria-label="@lang('shop::components.carousel.next')"
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
        app.component("v-carousel", {
            template: '#v-carousel-template',

            props: ['images'],

            data() {
                return {
                    isDragging: false,
                    startPos: 0,
                    currentTranslate: 0,
                    prevTranslate: 0,
                    animationID: 0,
                    currentIndex: 0,
                    slider: '',
                    slides: [],
                    autoPlayInterval: null,
                    direction: 'ltr',
                    startFrom: 1,
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
                    this.direction = document.dir;

                    if (this.direction == 'rtl') {
                        this.startFrom = -1;
                    }

                    this.slides.forEach((slide, index) => {
                        slide.querySelector('img')?.addEventListener('dragstart', (e) => e.preventDefault());

                        slide.addEventListener('mousedown', this.handleDragStart);
                        slide.addEventListener('touchstart', this.handleDragStart, { passive: true });
                        slide.addEventListener('mouseup', this.handleDragEnd);
                        slide.addEventListener('mouseleave', this.handleDragEnd);
                        slide.addEventListener('touchend', this.handleDragEnd, { passive: true });
                        slide.addEventListener('mousemove', this.handleDrag);
                        slide.addEventListener('touchmove', this.handleDrag, { passive: true });
                    });

                    window.addEventListener('resize', this.setPositionByIndex);
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
                    this.currentTranslate = this.currentIndex * -window.innerWidth;
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

                    window.removeEventListener('resize', this.setPositionByIndex);
                },
            },
        });
    </script>
@endpushOnce