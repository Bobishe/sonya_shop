@extends('yourtheme::layouts.master')

@section('page_title', 'Главная')

@section('meta_description', 'INCANTO ITALY - премиальное итальянское белье. Новые коллекции, эксклюзивные модели, доставка по всей России.')

@section('meta_keywords', 'белье, итальянское белье, премиум белье, incanto, женское белье, бюстгальтеры, трусы, боди')

@section('content-wrapper')
    {{-- Hero Slider Section --}}
    <section class="hero-slider">
        <div class="slider-container">
            {{-- Slide 1 --}}
            <div class="slide active" data-slide="1">
                <img src="https://placehold.co/1920x600/a8d5e2/ffffff?text=НОВИНКИ+2024" alt="Новинки коллекции">
                <div class="slide-content">
                    <h2>НОВИНКИ</h2>
                    <p class="slide-subtitle">Коллекция весна-лето 2024</p>
                    <a href="#" class="btn-outline">СМОТРЕТЬ ВСЕ →</a>
                </div>
            </div>

            {{-- Slide 2 --}}
            <div class="slide" data-slide="2">
                <img src="https://placehold.co/1920x600/ffd4d4/ffffff?text=VERY+SEXY" alt="Very Sexy Collection">
                <div class="slide-content">
                    <h2>VERY SEXY</h2>
                    <p class="slide-subtitle">Соблазнительные образы</p>
                    <a href="#" class="btn-outline">ОТКРЫТЬ КОЛЛЕКЦИЮ →</a>
                </div>
            </div>

            {{-- Slide 3 --}}
            <div class="slide" data-slide="3">
                <img src="https://placehold.co/1920x600/e8f5e9/ffffff?text=ШЕЛК" alt="Silk Collection">
                <div class="slide-content">
                    <h2>ШЕЛК</h2>
                    <p class="slide-subtitle">Роскошь натуральных тканей</p>
                    <a href="#" class="btn-outline">СМОТРЕТЬ →</a>
                </div>
            </div>

            {{-- Navigation Arrows --}}
            <button class="slider-arrow slider-prev" aria-label="Previous slide">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>
            <button class="slider-arrow slider-next" aria-label="Next slide">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>

            {{-- Slide Indicators --}}
            <div class="slider-indicators">
                <button class="indicator active" data-slide="1" aria-label="Go to slide 1"></button>
                <button class="indicator" data-slide="2" aria-label="Go to slide 2"></button>
                <button class="indicator" data-slide="3" aria-label="Go to slide 3"></button>
            </div>
        </div>
    </section>

    {{-- Categories Section --}}
    <section class="categories-section">
        <div class="container">
            <div class="categories-grid">
                <a href="#" class="category-card">
                    <div class="category-image">
                        <img src="https://placehold.co/400x500/f5f5f5/666666?text=Бюстгальтеры" alt="Бюстгальтеры">
                    </div>
                    <h3 class="category-title">Бюстгальтеры</h3>
                </a>

                <a href="#" class="category-card">
                    <div class="category-image">
                        <img src="https://placehold.co/400x500/f5f5f5/666666?text=Трусы" alt="Трусы">
                    </div>
                    <h3 class="category-title">Трусы</h3>
                </a>

                <a href="#" class="category-card">
                    <div class="category-image">
                        <img src="https://placehold.co/400x500/f5f5f5/666666?text=Боди" alt="Боди">
                    </div>
                    <h3 class="category-title">Боди</h3>
                </a>

                <a href="#" class="category-card">
                    <div class="category-image">
                        <img src="https://placehold.co/400x500/f5f5f5/666666?text=Комплекты" alt="Комплекты">
                    </div>
                    <h3 class="category-title">Комплекты</h3>
                </a>
            </div>
        </div>
    </section>

    {{-- Featured Products Section --}}
    <section class="featured-products">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Бестселлеры</h2>
                <a href="#" class="section-link">Смотреть все →</a>
            </div>

            <div class="products-grid">
                {{-- Здесь будет интеграция с Bagisto продуктами --}}
                {{-- Пример Product Card для демонстрации --}}
                @for ($i = 1; $i <= 8; $i++)
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <img src="https://placehold.co/400x500/f5f5f5/666666?text=Product+{{ $i }}" alt="Товар {{ $i }}" class="product-image">
                        <div class="product-badges">
                            @if($i % 3 == 0)
                                <span class="badge badge-new">NEW</span>
                            @endif
                            @if($i % 4 == 0)
                                <span class="badge badge-sale">-30%</span>
                            @endif
                        </div>
                        <div class="product-overlay">
                            <button class="btn-icon btn-wishlist" aria-label="Add to wishlist">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                </svg>
                            </button>
                            <button class="btn-icon btn-quick-view" aria-label="Quick view">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">Бюстгальтер с мягкой чашкой</h3>
                        <div class="product-rating">
                            <div class="stars">
                                @for ($j = 0; $j < 5; $j++)
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="{{ $j < 4 ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2">
                                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                    </svg>
                                @endfor
                            </div>
                            <span class="rating-count">(24)</span>
                        </div>
                        <div class="product-price">
                            @if($i % 4 == 0)
                                <span class="price-old">4 990 ₽</span>
                                <span class="price-current">3 493 ₽</span>
                            @else
                                <span class="price-current">4 990 ₽</span>
                            @endif
                        </div>
                        <button class="btn-add-to-cart">В корзину</button>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>

    {{-- Promo Section --}}
    <section class="promo-section">
        <div class="container">
            <div class="promo-grid">
                <div class="promo-content">
                    <span class="promo-label">Специальное предложение</span>
                    <h2 class="promo-title">Скидка 20% на первый заказ</h2>
                    <p class="promo-description">
                        Зарегистрируйтесь в нашем магазине и получите приветственную скидку 20%
                        на первый заказ. Откройте для себя мир премиального итальянского белья
                        по специальной цене.
                    </p>
                    <a href="#" class="btn-primary">Зарегистрироваться</a>
                </div>
                <div class="promo-image">
                    <img src="https://placehold.co/800x400/e0e0e0/666666?text=Promo" alt="Специальное предложение">
                </div>
            </div>
        </div>
    </section>

    {{-- Collections Banner --}}
    <section class="collections-banner">
        <div class="container">
            <div class="banner-grid">
                <div class="banner-item" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="banner-content">
                        <h3>CHRISTMAS DREAMS</h3>
                        <p>Праздничная коллекция</p>
                        <a href="#" class="btn-outline-white">Смотреть →</a>
                    </div>
                </div>
                <div class="banner-item" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <div class="banner-content">
                        <h3>БАЗОВАЯ КОЛЛЕКЦИЯ</h3>
                        <p>Классика на каждый день</p>
                        <a href="#" class="btn-outline-white">Смотреть →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Advantages Section --}}
    <section class="advantages">
        <div class="container">
            <div class="advantages-grid">
                <div class="advantage-item">
                    <div class="advantage-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                    <h3 class="advantage-title">Доставка по всей России</h3>
                    <p class="advantage-description">Бесплатная доставка от 5000 ₽</p>
                </div>

                <div class="advantage-item">
                    <div class="advantage-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </div>
                    <h3 class="advantage-title">Гарантия качества</h3>
                    <p class="advantage-description">Только оригинальная продукция</p>
                </div>

                <div class="advantage-item">
                    <div class="advantage-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <h3 class="advantage-title">Безопасные платежи</h3>
                    <p class="advantage-description">Защищенные транзакции</p>
                </div>

                <div class="advantage-item">
                    <div class="advantage-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </div>
                    <h3 class="advantage-title">Легкий возврат</h3>
                    <p class="advantage-description">30 дней на возврат</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Additional page-specific scripts
    console.log('Home page loaded');
</script>
@endpush
