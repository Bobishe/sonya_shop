<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['options']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['options']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<v-carousel :images="<?php echo e(json_encode($options['images'] ?? [])); ?>">
    <div class="overflow-hidden">
        <div class="shimmer aspect-[2.743/1] max-h-screen w-screen"></div>
    </div>
</v-carousel>

<?php if (! $__env->hasRenderedOnce('c71ac5c0-27f2-4de3-939d-33583521b1eb')): $__env->markAsRenderedOnce('c71ac5c0-27f2-4de3-939d-33583521b1eb');
$__env->startPush('styles'); ?>
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

        /* Высота баннера 50% экрана */
        .mobile-carousel-slide {
            max-height: 50vh !important;
        }

        .mobile-carousel-slide img {
            max-height: 50vh !important;
            object-fit: cover;
        }
    }
</style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('75483f73-eedf-4f1a-b070-c7a9a5a5a9b6')): $__env->markAsRenderedOnce('75483f73-eedf-4f1a-b070-c7a9a5a5a9b6');
$__env->startPush('scripts'); ?>
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
                    class="max-h-screen w-screen bg-cover bg-no-repeat mobile-carousel-slide"
                    v-for="(image, index) in images"
                    :key="index"
                    @click="visitLink(image)"
                    ref="slide"
                >
                    <?php if (isset($component)) { $__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.media.images.lazy','data' => ['class' => 'aspect-[2.743/1] max-h-full w-full max-w-full select-none transition-transform duration-300 ease-in-out will-change-transform',':lazy' => 'index === 0 ? false : true',':src' => 'image.image',':srcset' => 'image.image + \' 1920w, \' + image.image.replace(\'storage\', \'cache/large\') + \' 1280w,\' + image.image.replace(\'storage\', \'cache/medium\') + \' 1024w, \' + image.image.replace(\'storage\', \'cache/small\') + \' 525w\'',':sizes' => '
                            \'(max-width: 525px) 525px, \' +
                            \'(max-width: 1024px) 1024px, \' +
                            \'(max-width: 1600px) 1280px, \' +
                            \'1920px\'
                        ',':alt' => 'image?.title || \'Carousel Image \' + (index + 1)','tabindex' => '0',':fetchpriority' => 'index === 0 ? \'high\' : \'low\'',':decoding' => 'index === 0 ? \'sync\' : \'async\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::media.images.lazy'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'aspect-[2.743/1] max-h-full w-full max-w-full select-none transition-transform duration-300 ease-in-out will-change-transform',':lazy' => 'index === 0 ? false : true',':src' => 'image.image',':srcset' => 'image.image + \' 1920w, \' + image.image.replace(\'storage\', \'cache/large\') + \' 1280w,\' + image.image.replace(\'storage\', \'cache/medium\') + \' 1024w, \' + image.image.replace(\'storage\', \'cache/small\') + \' 525w\'',':sizes' => '
                            \'(max-width: 525px) 525px, \' +
                            \'(max-width: 1024px) 1024px, \' +
                            \'(max-width: 1600px) 1280px, \' +
                            \'1920px\'
                        ',':alt' => 'image?.title || \'Carousel Image \' + (index + 1)','tabindex' => '0',':fetchpriority' => 'index === 0 ? \'high\' : \'low\'',':decoding' => 'index === 0 ? \'sync\' : \'async\'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848)): ?>
<?php $attributes = $__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848; ?>
<?php unset($__attributesOriginal3657c70d06ebc8c078f4ecac2ea1a848); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848)): ?>
<?php $component = $__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848; ?>
<?php unset($__componentOriginal3657c70d06ebc8c078f4ecac2ea1a848); ?>
<?php endif; ?>
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
                aria-label="<?php echo app('translator')->get('shop::components.carousel.previous'); ?>"
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
                aria-label="<?php echo app('translator')->get('shop::components.carousel.next'); ?>"
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
<?php $__env->stopPush(); endif; ?><?php /**PATH D:\Work\sonya_site\sonya_shop\packages\Webkul\Shop\src/resources/views/components/carousel/index.blade.php ENDPATH**/ ?>