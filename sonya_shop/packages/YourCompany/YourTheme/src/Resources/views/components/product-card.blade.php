{{--
    Product Card Component

    Props:
    - $product (object): Product data
    - $showQuickView (bool): Show quick view button (default: true)
    - $showWishlist (bool): Show wishlist button (default: true)
--}}

@props([
    'product',
    'showQuickView' => true,
    'showWishlist' => true,
])

<div class="product-card">
    <div class="product-image-wrapper">
        <a href="{{ $product->url ?? '#' }}">
            <img
                src="{{ $product->image ?? 'https://placehold.co/400x500/f5f5f5/666666?text=Product' }}"
                alt="{{ $product->name ?? 'Product' }}"
                class="product-image"
            >
        </a>

        {{-- Badges --}}
        @if(isset($product->badges) && count($product->badges) > 0)
        <div class="product-badges">
            @foreach($product->badges as $badge)
                <span class="badge badge-{{ $badge['type'] }}">{{ $badge['label'] }}</span>
            @endforeach
        </div>
        @endif

        {{-- Overlay with actions --}}
        <div class="product-overlay">
            {{-- @if($showWishlist)
            <button
                class="btn-icon btn-wishlist"
                aria-label="Add to wishlist"
                data-product-id="{{ $product->id ?? '' }}"
            >
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                </svg>
            </button>
            @endif --}}

            @if($showQuickView)
            <button
                class="btn-icon btn-quick-view"
                aria-label="Quick view"
                data-product-id="{{ $product->id ?? '' }}"
            >
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
            </button>
            @endif
        </div>
    </div>

    <div class="product-info">
        <a href="{{ $product->url ?? '#' }}">
            <h3 class="product-title">{{ $product->name ?? 'Product Name' }}</h3>
        </a>

        {{-- Rating --}}
        @if(isset($product->rating))
        <div class="product-rating">
            <div class="stars">
                @for($i = 0; $i < 5; $i++)
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="{{ $i < floor($product->rating) ? 'currentColor' : 'none' }}" stroke="currentColor" stroke-width="2">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                    </svg>
                @endfor
            </div>
            <span class="rating-count">({{ $product->reviews_count ?? 0 }})</span>
        </div>
        @endif

        {{-- Price --}}
        <div class="product-price">
            @if(isset($product->special_price) && $product->special_price < $product->price)
                <span class="price-old">{{ $product->price }} ₽</span>
                <span class="price-current">{{ $product->special_price }} ₽</span>
            @else
                <span class="price-current">{{ $product->price ?? '0' }} ₽</span>
            @endif
        </div>

        {{-- Add to Cart Button --}}
        <button
            class="btn-add-to-cart"
            data-product-id="{{ $product->id ?? '' }}"
        >
            В корзину
        </button>
    </div>
</div>
