<?php
    $channel = core()->getCurrentChannel();
?>

<!-- SEO Meta Content -->
<?php $__env->startPush('meta'); ?>
    <meta name="title" content="<?php echo e($channel->home_seo['meta_title'] ?? ''); ?>" />
    <meta name="description" content="<?php echo e($channel->home_seo['meta_description'] ?? ''); ?>" />
    <meta name="keywords" content="<?php echo e($channel->home_seo['meta_keywords'] ?? ''); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    :root {
        --primary-black: #000000;
        --primary-green: #659c44;
        --primary-white: #ffffff;
        --hero-bg: #a8d5e2;
    }

    body {
        font-family: 'Poppins', sans-serif;
    }

    /* Hero Slider Styles */
    .hero-slider {
        height: 100vh;
        position: relative;
        overflow: hidden;
    }

    .hero-slide {
        width: 100%;
        height: 100vh;
        position: relative;
        background: var(--hero-bg);
        display: none;
    }

    .hero-slide.active {
        display: flex;
        align-items: center;
    }

    .hero-content-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        width: 100%;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 80px;
        align-items: center;
        height: 100%;
    }

    .hero-text-content {
        z-index: 5;
    }

    .hero-title {
        font-size: 5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 2rem;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .hero-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 18px 45px;
        border: 2px solid white;
        color: white;
        text-decoration: none;
        font-weight: 600;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        transition: all 0.3s ease;
        background: transparent;
    }

    .hero-btn:hover {
        background: white;
        color: var(--hero-bg);
    }

    .hero-image-content {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        height: 100%;
    }

    .hero-image-content img {
        height: 90%;
        width: auto;
        object-fit: contain;
        max-width: 100%;
    }

    /* Navigation Arrows */
    .hero-nav-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.6);
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 10;
        border: none;
    }

    .hero-nav-arrow:hover {
        background: rgba(255, 255, 255, 0.9);
    }

    .hero-nav-arrow.left {
        left: 30px;
    }

    .hero-nav-arrow.right {
        right: 30px;
    }

    .hero-nav-arrow svg {
        width: 30px;
        height: 30px;
        fill: rgba(0, 0, 0, 0.7);
    }

    /* Pagination Dots */
    .hero-pagination {
        position: absolute;
        bottom: 40px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 12px;
        z-index: 10;
    }

    .hero-pagination-dot {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .hero-pagination-dot:hover {
        background: rgba(255, 255, 255, 0.7);
    }

    .hero-pagination-dot.active {
        background: white;
        border-color: white;
        transform: scale(1.2);
    }

    /* Section Styles */
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

    /* Responsive */
    @media (max-width: 1024px) {
        .hero-content-wrapper {
            padding: 0 40px;
        }

        .hero-title {
            font-size: 3.5rem;
        }
    }

    @media (max-width: 768px) {
        .hero-slider {
            height: 70vh;
        }

        .hero-slide {
            height: 70vh;
        }

        .hero-content-wrapper {
            grid-template-columns: 1fr;
            padding: 0 30px;
            text-align: center;
        }

        .hero-image-content {
            display: none;
        }

        .hero-title {
            font-size: 2.5rem;
        }

        .hero-nav-arrow {
            width: 50px;
            height: 50px;
        }

        .hero-nav-arrow.left {
            left: 15px;
        }

        .hero-nav-arrow.right {
            right: 15px;
        }

        .promo-block {
            grid-template-columns: 1fr;
        }

        .section-title {
            font-size: 1.8rem;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php if (isset($component)) { $__componentOriginal2643b7d197f48caff2f606750db81304 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2643b7d197f48caff2f606750db81304 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.layouts.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::layouts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Page Title -->
     <?php $__env->slot('title', null, []); ?> 
        <?php echo e($channel->home_seo['meta_title'] ?? ''); ?>

     <?php $__env->endSlot(); ?>

    <!-- Hero Slider Section -->
    <section class="hero-slider">
        <?php
            $heroSlides = [
                [
                    'title' => 'НОВИНКИ',
                    'link' => route('shop.search.index', ['sort' => 'created_at']),
                    'bg_color' => '#a8d5e2',
                    'image' => 'https://images.unsplash.com/photo-1485968579580-b6d095142e6e?w=600&h=900&fit=crop'
                ],
                [
                    'title' => 'БЕСТСЕЛЛЕРЫ',
                    'link' => route('shop.search.index'),
                    'bg_color' => '#e8c4d4',
                    'image' => 'https://images.unsplash.com/photo-1469334031218-e382a71b716b?w=600&h=900&fit=crop'
                ],
                [
                    'title' => 'VERY SEXY',
                    'link' => route('shop.search.index'),
                    'bg_color' => '#d4b5a8',
                    'image' => 'https://images.unsplash.com/photo-1509631179647-0177331693ae?w=600&h=900&fit=crop'
                ]
            ];

            $heroImages = $customizations->where('type', 'image_carousel')->first();
            
            if($heroImages && !empty($heroImages->options['images'])) {
                $heroSlides = collect($heroImages->options['images'])->map(function($img) {
                    return [
                        'title' => $img['title'] ?? 'НОВИНКИ',
                        'link' => $img['link'] ?? '#',
                        'bg_color' => '#a8d5e2',
                        'image' => Storage::url($img['image'])
                    ];
                })->toArray();
            }
        ?>

        <!-- Slides -->
        <?php $__currentLoopData = $heroSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="hero-slide <?php echo e($index === 0 ? 'active' : ''); ?>" 
                 style="background-color: <?php echo e($slide['bg_color'] ?? '#a8d5e2'); ?>;"
                 data-slide="<?php echo e($index); ?>">
                <div class="hero-content-wrapper">
                    <div class="hero-text-content">
                        <h1 class="hero-title"><?php echo e($slide['title']); ?></h1>
                        <a href="<?php echo e($slide['link']); ?>" class="hero-btn">
                            СМОТРЕТЬ ВСЕ
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                    <div class="hero-image-content">
                        <img src="<?php echo e($slide['image']); ?>" alt="<?php echo e($slide['title']); ?>">
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- Navigation Arrows -->
        <?php if(count($heroSlides) > 1): ?>
            <button class="hero-nav-arrow left" onclick="changeSlide(-1)">
                <svg viewBox="0 0 24 24">
                    <path d="M15 18l-6-6 6-6"/>
                </svg>
            </button>

            <button class="hero-nav-arrow right" onclick="changeSlide(1)">
                <svg viewBox="0 0 24 24">
                    <path d="M9 18l6-6-6-6"/>
                </svg>
            </button>

            <!-- Pagination Dots -->
            <div class="hero-pagination">
                <?php $__currentLoopData = $heroSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="hero-pagination-dot <?php echo e($index === 0 ? 'active' : ''); ?>" 
                         onclick="goToSlide(<?php echo e($index); ?>)"
                         data-dot="<?php echo e($index); ?>">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </section>

    <!-- New Products Section -->
    <section class="container mx-auto px-8 py-16 max-sm:px-4">
        <h2 class="section-title">НОВИНКИ</h2>

        <?php if (isset($component)) { $__componentOriginalc7b94830d947988d2b7058066254da2b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7b94830d947988d2b7058066254da2b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.products.carousel','data' => ['title' => '','src' => route('shop.api.products.index', ['sort' => 'created_at', 'order' => 'desc', 'limit' => 8]),'navigationLink' => route('shop.search.index', ['sort' => 'created_at'])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::products.carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => '','src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.api.products.index', ['sort' => 'created_at', 'order' => 'desc', 'limit' => 8])),'navigation-link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.search.index', ['sort' => 'created_at']))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7b94830d947988d2b7058066254da2b)): ?>
<?php $attributes = $__attributesOriginalc7b94830d947988d2b7058066254da2b; ?>
<?php unset($__attributesOriginalc7b94830d947988d2b7058066254da2b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7b94830d947988d2b7058066254da2b)): ?>
<?php $component = $__componentOriginalc7b94830d947988d2b7058066254da2b; ?>
<?php unset($__componentOriginalc7b94830d947988d2b7058066254da2b); ?>
<?php endif; ?>
    </section>

    <!-- Promo Block Section -->
    <section class="container mx-auto px-8 max-sm:px-4">
        <div class="promo-block">
            <div class="promo-image">
                <img src="https://placehold.co/800x600/659c44/ffffff?text=Promo" alt="Акция" style="width: 100%; border-radius: 8px;">
            </div>
            <div class="promo-content">
                <h2 style="font-size: 2rem; font-weight: 700; color: var(--primary-green); margin-bottom: 1rem;">
                    Специальное предложение
                </h2>
                <p style="font-size: 1.1rem; line-height: 1.8; color: #333;">
                    Воспользуйтесь нашими специальными предложениями и скидками на избранные товары.
                    Качественная продукция по лучшим ценам для вас и вашей семьи.
                </p>
                <a href="<?php echo e(route('shop.search.index')); ?>"
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
            <?php $__currentLoopData = $categories->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($category['url']); ?>" class="category-card">
                    <?php if($category['logo_path']): ?>
                        <img src="<?php echo e(Storage::url($category['logo_path'])); ?>" alt="<?php echo e($category['name']); ?>">
                    <?php else: ?>
                        <img src="https://placehold.co/400x300/e5e5e5/666666?text=<?php echo e(urlencode($category['name'])); ?>" alt="<?php echo e($category['name']); ?>">
                    <?php endif; ?>
                    <div class="category-card-overlay">
                        <h3 style="font-size: 1.5rem; font-weight: 600;"><?php echo e($category['name']); ?></h3>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <?php $__currentLoopData = $customizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php ($data = $customization->options) ?>

        <?php switch($customization->type):
            case ($customization::STATIC_CONTENT): ?>
                <?php if(! empty($data['css'])): ?>
                    <?php $__env->startPush('styles'); ?>
                        <style>
                            <?php echo e($data['css']); ?>

                        </style>
                    <?php $__env->stopPush(); ?>
                <?php endif; ?>

                <?php if(! empty($data['html'])): ?>
                    <?php echo $data['html']; ?>

                <?php endif; ?>

                <?php break; ?>
            <?php case ($customization::CATEGORY_CAROUSEL): ?>
                <?php if (isset($component)) { $__componentOriginal55b1251dd0fd6403a4d59156278578f2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal55b1251dd0fd6403a4d59156278578f2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.categories.carousel','data' => ['title' => $data['title'] ?? '','src' => route('shop.api.categories.index', $data['filters'] ?? []),'navigationLink' => route('shop.home.index')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::categories.carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['title'] ?? ''),'src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.api.categories.index', $data['filters'] ?? [])),'navigation-link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.home.index'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal55b1251dd0fd6403a4d59156278578f2)): ?>
<?php $attributes = $__attributesOriginal55b1251dd0fd6403a4d59156278578f2; ?>
<?php unset($__attributesOriginal55b1251dd0fd6403a4d59156278578f2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal55b1251dd0fd6403a4d59156278578f2)): ?>
<?php $component = $__componentOriginal55b1251dd0fd6403a4d59156278578f2; ?>
<?php unset($__componentOriginal55b1251dd0fd6403a4d59156278578f2); ?>
<?php endif; ?>
                <?php break; ?>
            <?php case ($customization::PRODUCT_CAROUSEL): ?>
                <?php if (isset($component)) { $__componentOriginalc7b94830d947988d2b7058066254da2b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc7b94830d947988d2b7058066254da2b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'shop::components.products.carousel','data' => ['title' => $data['title'] ?? '','src' => route('shop.api.products.index', $data['filters'] ?? []),'navigationLink' => route('shop.search.index', $data['filters'] ?? [])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('shop::products.carousel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['title'] ?? ''),'src' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.api.products.index', $data['filters'] ?? [])),'navigation-link' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shop.search.index', $data['filters'] ?? []))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc7b94830d947988d2b7058066254da2b)): ?>
<?php $attributes = $__attributesOriginalc7b94830d947988d2b7058066254da2b; ?>
<?php unset($__attributesOriginalc7b94830d947988d2b7058066254da2b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc7b94830d947988d2b7058066254da2b)): ?>
<?php $component = $__componentOriginalc7b94830d947988d2b7058066254da2b; ?>
<?php unset($__componentOriginalc7b94830d947988d2b7058066254da2b); ?>
<?php endif; ?>
                <?php break; ?>
        <?php endswitch; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->startPush('scripts'); ?>
<script>
    let currentSlide = 0;
    let autoPlayInterval;
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-pagination-dot');
    const totalSlides = slides.length;

    function showSlide(n) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));

        if (n >= totalSlides) currentSlide = 0;
        if (n < 0) currentSlide = totalSlides - 1;

        slides[currentSlide].classList.add('active');
        if (dots[currentSlide]) {
            dots[currentSlide].classList.add('active');
        }
    }

    function changeSlide(direction) {
        currentSlide += direction;
        showSlide(currentSlide);
        resetAutoPlay();
    }

    function goToSlide(index) {
        currentSlide = index;
        showSlide(currentSlide);
        resetAutoPlay();
    }

    function startAutoPlay() {
        if (totalSlides > 1) {
            autoPlayInterval = setInterval(() => {
                currentSlide++;
                showSlide(currentSlide);
            }, 5000);
        }
    }

    function resetAutoPlay() {
        clearInterval(autoPlayInterval);
        startAutoPlay();
    }

    document.addEventListener('DOMContentLoaded', function() {
        startAutoPlay();
    });

    document.querySelector('.hero-slider')?.addEventListener('mouseenter', function() {
        clearInterval(autoPlayInterval);
    });

    document.querySelector('.hero-slider')?.addEventListener('mouseleave', function() {
        startAutoPlay();
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') changeSlide(-1);
        if (e.key === 'ArrowRight') changeSlide(1);
    });

    let touchStartX = 0;
    let touchEndX = 0;

    document.querySelector('.hero-slider')?.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
    });

    document.querySelector('.hero-slider')?.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        if (touchEndX < touchStartX - 50) changeSlide(1);
        if (touchEndX > touchStartX + 50) changeSlide(-1);
    }

    localStorage.setItem('categories', JSON.stringify(<?php echo json_encode($categories, 15, 512) ?>));
</script>
<?php $__env->stopPush(); ?><?php /**PATH D:\Work\sonya_site\sonya_shop\packages\Webkul\Shop\src/resources/views/home/index.blade.php ENDPATH**/ ?>