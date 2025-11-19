{{-- Header Component for Premium Lingerie Store --}}
<header class="header">
    {{-- Top Bar --}}
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-content">
                {{-- Left Section: Contact & Localization --}}
                <div class="top-left">
                    <a href="tel:+74950118888" class="phone">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        +7 495 011 88 88
                    </a>

                    <div class="language-selector">
                        <button class="lang-btn" id="langBtn">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                            RU
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        {{-- Language dropdown (hidden by default) --}}
                        <div class="lang-dropdown" id="langDropdown">
                            <a href="#" class="lang-option active">RU</a>
                            <a href="#" class="lang-option">EN</a>
                        </div>
                    </div>

                    <div class="region-selector">
                        <button class="region-btn" id="regionBtn">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            Регион: Москва
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Center Section: Logo --}}
                <div class="top-center">
                    <a href="{{ route('shop.home.index') }}" class="logo-link">
                        <h1 class="logo">INCANTO ITALY</h1>
                    </a>
                </div>

                {{-- Right Section: User Actions --}}
                <div class="top-right">
                    <button class="icon-link search" id="searchToggle" aria-label="Search">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                    </button>

                    <a href="{{ route('customer.session.index') }}" class="icon-link account" aria-label="Account">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>

                    <a href="#" class="icon-link wishlist" aria-label="Wishlist">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                        <span class="badge" id="wishlistCount">0</span>
                    </a>

                    <a href="{{ route('shop.checkout.cart.index') }}" class="icon-link cart" aria-label="Shopping Cart">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span class="badge" id="cartCount">0</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Search Bar (hidden by default) --}}
    <div class="search-bar" id="searchBar">
        <div class="container">
            <form action="#" method="GET" class="search-form">
                <input
                    type="search"
                    name="q"
                    placeholder="Поиск товаров..."
                    class="search-input"
                    aria-label="Search products"
                >
                <button type="submit" class="search-submit" aria-label="Submit search">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                </button>
                <button type="button" class="search-close" id="searchClose" aria-label="Close search">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    {{-- Main Navigation --}}
    <nav class="main-nav">
        <div class="container">
            {{-- Mobile Menu Toggle --}}
            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            {{-- Navigation Menu --}}
            <ul class="nav-menu" id="navMenu">
                <li><a href="#">НОВИНКИ</a></li>
                <li><a href="#">БЕСТСЕЛЛЕРЫ</a></li>
                <li><a href="#">VERY SEXY</a></li>
                <li><a href="#">CHRISTMAS DREAMS</a></li>
                <li><a href="#">БЮСТГАЛЬТЕРЫ И ТРУСЫ</a></li>
                <li><a href="#">БАЗОВАЯ КОЛЛЕКЦИЯ</a></li>
                <li><a href="#">БОДИ</a></li>
                <li><a href="#">ОДЕЖДА</a></li>
                <li><a href="#">ХЛОПОК</a></li>
                <li><a href="#">ШЕЛК</a></li>
            </ul>
        </div>
    </nav>
</header>
