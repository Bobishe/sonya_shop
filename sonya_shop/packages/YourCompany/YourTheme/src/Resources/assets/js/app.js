/**
 * INCANTO ITALY Theme JavaScript
 * Premium Lingerie E-commerce Theme for Bagisto
 *
 * Table of Contents:
 * 1. Utility Functions
 * 2. Hero Slider
 * 3. Mobile Menu
 * 4. Search Toggle
 * 5. Language & Region Selectors
 * 6. Scroll Effects
 * 7. Product Interactions
 * 8. Cart Functions
 * 9. Wishlist Functions
 * 10. Newsletter Form
 * 11. Initialization
 */

(function() {
    'use strict';

    // ========================================
    // 1. Utility Functions
    // ========================================

    const $ = (selector, context = document) => context.querySelector(selector);
    const $$ = (selector, context = document) => context.querySelectorAll(selector);

    const addClass = (el, className) => el && el.classList.add(className);
    const removeClass = (el, className) => el && el.classList.remove(className);
    const toggleClass = (el, className) => el && el.classList.toggle(className);
    const hasClass = (el, className) => el && el.classList.contains(className);

    // ========================================
    // 2. Hero Slider
    // ========================================

    class HeroSlider {
        constructor(container) {
            this.container = container;
            if (!this.container) return;

            this.slides = $$('.slide', this.container);
            this.indicators = $$('.indicator', this.container);
            this.prevBtn = $('.slider-prev', this.container);
            this.nextBtn = $('.slider-next', this.container);
            this.currentSlide = 0;
            this.autoplayInterval = null;
            this.autoplayDelay = 5000;
            this.touchStartX = 0;
            this.touchEndX = 0;

            this.init();
        }

        init() {
            // Arrow navigation
            if (this.prevBtn) {
                this.prevBtn.addEventListener('click', () => this.prevSlide());
            }
            if (this.nextBtn) {
                this.nextBtn.addEventListener('click', () => this.nextSlide());
            }

            // Indicator navigation
            this.indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => this.goToSlide(index));
            });

            // Touch/Swipe support
            this.container.addEventListener('touchstart', (e) => this.handleTouchStart(e), { passive: true });
            this.container.addEventListener('touchend', (e) => this.handleTouchEnd(e), { passive: true });

            // Mouse drag support
            let isDragging = false;
            let startX = 0;

            this.container.addEventListener('mousedown', (e) => {
                isDragging = true;
                startX = e.clientX;
            });

            this.container.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                e.preventDefault();
            });

            this.container.addEventListener('mouseup', (e) => {
                if (!isDragging) return;
                isDragging = false;
                const endX = e.clientX;
                const diff = startX - endX;

                if (Math.abs(diff) > 50) {
                    if (diff > 0) {
                        this.nextSlide();
                    } else {
                        this.prevSlide();
                    }
                }
            });

            // Pause on hover
            this.container.addEventListener('mouseenter', () => this.stopAutoplay());
            this.container.addEventListener('mouseleave', () => this.startAutoplay());

            // Start autoplay
            this.startAutoplay();
        }

        handleTouchStart(e) {
            this.touchStartX = e.changedTouches[0].screenX;
        }

        handleTouchEnd(e) {
            this.touchEndX = e.changedTouches[0].screenX;
            this.handleSwipe();
        }

        handleSwipe() {
            const diff = this.touchStartX - this.touchEndX;

            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    this.nextSlide();
                } else {
                    this.prevSlide();
                }
            }
        }

        goToSlide(index) {
            // Remove active class from current slide and indicator
            removeClass(this.slides[this.currentSlide], 'active');
            removeClass(this.indicators[this.currentSlide], 'active');

            // Set new current slide
            this.currentSlide = index;

            // Add active class to new slide and indicator
            addClass(this.slides[this.currentSlide], 'active');
            addClass(this.indicators[this.currentSlide], 'active');

            // Restart autoplay
            this.stopAutoplay();
            this.startAutoplay();
        }

        nextSlide() {
            const nextIndex = (this.currentSlide + 1) % this.slides.length;
            this.goToSlide(nextIndex);
        }

        prevSlide() {
            const prevIndex = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
            this.goToSlide(prevIndex);
        }

        startAutoplay() {
            this.autoplayInterval = setInterval(() => {
                this.nextSlide();
            }, this.autoplayDelay);
        }

        stopAutoplay() {
            if (this.autoplayInterval) {
                clearInterval(this.autoplayInterval);
            }
        }
    }

    // ========================================
    // 3. Mobile Menu
    // ========================================

    class MobileMenu {
        constructor() {
            this.toggle = $('#mobileMenuToggle');
            this.menu = $('#navMenu');
            this.isOpen = false;

            this.init();
        }

        init() {
            if (!this.toggle || !this.menu) return;

            this.toggle.addEventListener('click', () => this.toggleMenu());

            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (this.isOpen && !this.menu.contains(e.target) && !this.toggle.contains(e.target)) {
                    this.closeMenu();
                }
            });

            // Close menu on window resize
            window.addEventListener('resize', () => {
                if (window.innerWidth > 768 && this.isOpen) {
                    this.closeMenu();
                }
            });
        }

        toggleMenu() {
            this.isOpen ? this.closeMenu() : this.openMenu();
        }

        openMenu() {
            addClass(this.menu, 'active');
            addClass(this.toggle, 'active');
            this.isOpen = true;
            document.body.style.overflow = 'hidden';
        }

        closeMenu() {
            removeClass(this.menu, 'active');
            removeClass(this.toggle, 'active');
            this.isOpen = false;
            document.body.style.overflow = '';
        }
    }

    // ========================================
    // 4. Search Toggle
    // ========================================

    class SearchToggle {
        constructor() {
            this.toggleBtn = $('#searchToggle');
            this.searchBar = $('#searchBar');
            this.closeBtn = $('#searchClose');
            this.searchInput = $('.search-input');

            this.init();
        }

        init() {
            if (!this.toggleBtn || !this.searchBar) return;

            this.toggleBtn.addEventListener('click', () => this.open());

            if (this.closeBtn) {
                this.closeBtn.addEventListener('click', () => this.close());
            }

            // Close on ESC key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && hasClass(this.searchBar, 'active')) {
                    this.close();
                }
            });
        }

        open() {
            addClass(this.searchBar, 'active');
            if (this.searchInput) {
                setTimeout(() => this.searchInput.focus(), 100);
            }
        }

        close() {
            removeClass(this.searchBar, 'active');
        }
    }

    // ========================================
    // 5. Language & Region Selectors
    // ========================================

    class Dropdown {
        constructor(btnSelector, dropdownSelector) {
            this.btn = $(btnSelector);
            this.dropdown = $(dropdownSelector);
            this.isOpen = false;

            this.init();
        }

        init() {
            if (!this.btn || !this.dropdown) return;

            this.btn.addEventListener('click', (e) => {
                e.stopPropagation();
                this.toggle();
            });

            // Close when clicking outside
            document.addEventListener('click', () => {
                if (this.isOpen) {
                    this.close();
                }
            });
        }

        toggle() {
            this.isOpen ? this.close() : this.open();
        }

        open() {
            addClass(this.dropdown, 'active');
            this.isOpen = true;
        }

        close() {
            removeClass(this.dropdown, 'active');
            this.isOpen = false;
        }
    }

    // ========================================
    // 6. Scroll Effects
    // ========================================

    class ScrollEffects {
        constructor() {
            this.header = $('.header');
            this.lastScrollTop = 0;
            this.scrollThreshold = 100;

            this.init();
        }

        init() {
            if (!this.header) return;

            window.addEventListener('scroll', () => this.handleScroll(), { passive: true });
        }

        handleScroll() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            // Add shadow to header on scroll
            if (scrollTop > 10) {
                this.header.style.boxShadow = '0 2px 8px rgba(0, 0, 0, 0.1)';
            } else {
                this.header.style.boxShadow = '';
            }

            this.lastScrollTop = scrollTop;
        }
    }

    // ========================================
    // 7. Product Interactions
    // ========================================

    class ProductInteractions {
        constructor() {
            this.init();
        }

        init() {
            // Wishlist buttons
            $$('.btn-wishlist').forEach(btn => {
                btn.addEventListener('click', (e) => this.handleWishlist(e));
            });

            // Quick view buttons
            $$('.btn-quick-view').forEach(btn => {
                btn.addEventListener('click', (e) => this.handleQuickView(e));
            });

            // Add to cart buttons
            $$('.btn-add-to-cart').forEach(btn => {
                btn.addEventListener('click', (e) => this.handleAddToCart(e));
            });
        }

        handleWishlist(e) {
            e.preventDefault();
            e.stopPropagation();

            const btn = e.currentTarget;
            const icon = $('svg', btn);

            // Toggle filled state
            if (icon.getAttribute('fill') === 'currentColor') {
                icon.setAttribute('fill', 'none');
                this.showNotification('Удалено из избранного');
                this.updateWishlistCount(-1);
            } else {
                icon.setAttribute('fill', 'currentColor');
                this.showNotification('Добавлено в избранное');
                this.updateWishlistCount(1);
            }

            // Here you would typically make an AJAX call to update the backend
            // Example:
            // fetch('/wishlist/toggle', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            //     },
            //     body: JSON.stringify({ product_id: productId })
            // });
        }

        handleQuickView(e) {
            e.preventDefault();
            e.stopPropagation();

            // This would open a modal with product details
            console.log('Quick view clicked');
            this.showNotification('Быстрый просмотр (в разработке)');
        }

        handleAddToCart(e) {
            e.preventDefault();

            const btn = e.currentTarget;
            const originalText = btn.textContent;

            // Show loading state
            btn.textContent = 'Добавление...';
            btn.disabled = true;

            // Simulate AJAX call
            setTimeout(() => {
                btn.textContent = '✓ Добавлено';
                this.updateCartCount(1);
                this.showNotification('Товар добавлен в корзину');

                setTimeout(() => {
                    btn.textContent = originalText;
                    btn.disabled = false;
                }, 1500);
            }, 500);

            // Here you would typically make an AJAX call
            // Example:
            // fetch('/cart/add', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            //     },
            //     body: JSON.stringify({ product_id: productId, quantity: 1 })
            // })
            // .then(response => response.json())
            // .then(data => {
            //     this.updateCartCount(data.cart_count);
            //     this.showNotification('Товар добавлен в корзину');
            // });
        }

        updateCartCount(delta) {
            const cartBadge = $('#cartCount');
            if (cartBadge) {
                const currentCount = parseInt(cartBadge.textContent) || 0;
                const newCount = Math.max(0, currentCount + delta);
                cartBadge.textContent = newCount;

                // Animate badge
                cartBadge.style.transform = 'scale(1.3)';
                setTimeout(() => {
                    cartBadge.style.transform = 'scale(1)';
                }, 200);
            }
        }

        updateWishlistCount(delta) {
            const wishlistBadge = $('#wishlistCount');
            if (wishlistBadge) {
                const currentCount = parseInt(wishlistBadge.textContent) || 0;
                const newCount = Math.max(0, currentCount + delta);
                wishlistBadge.textContent = newCount;

                // Animate badge
                wishlistBadge.style.transform = 'scale(1.3)';
                setTimeout(() => {
                    wishlistBadge.style.transform = 'scale(1)';
                }, 200);
            }
        }

        showNotification(message) {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = 'notification';
            notification.textContent = message;
            notification.style.cssText = `
                position: fixed;
                bottom: 30px;
                right: 30px;
                background: #1a1a1a;
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                z-index: 10000;
                animation: slideInUp 0.3s ease-out;
            `;

            document.body.appendChild(notification);

            // Auto remove after 3 seconds
            setTimeout(() => {
                notification.style.animation = 'slideOutDown 0.3s ease-out';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }
    }

    // Add animation keyframes
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideInUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        @keyframes slideOutDown {
            from {
                transform: translateY(0);
                opacity: 1;
            }
            to {
                transform: translateY(100%);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);

    // ========================================
    // 8. Newsletter Form
    // ========================================

    class NewsletterForm {
        constructor() {
            this.form = $('.newsletter-form');
            this.init();
        }

        init() {
            if (!this.form) return;

            this.form.addEventListener('submit', (e) => this.handleSubmit(e));
        }

        handleSubmit(e) {
            e.preventDefault();

            const emailInput = $('input[type="email"]', this.form);
            const submitBtn = $('button[type="submit"]', this.form);
            const email = emailInput.value;

            if (!this.validateEmail(email)) {
                this.showMessage('Пожалуйста, введите корректный email', 'error');
                return;
            }

            // Show loading state
            const originalBtnText = submitBtn.textContent;
            submitBtn.textContent = 'Подписываем...';
            submitBtn.disabled = true;

            // Simulate AJAX call
            setTimeout(() => {
                this.showMessage('Спасибо за подписку!', 'success');
                emailInput.value = '';
                submitBtn.textContent = originalBtnText;
                submitBtn.disabled = false;
            }, 1000);

            // Here you would typically make an AJAX call
            // fetch('/newsletter/subscribe', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            //     },
            //     body: JSON.stringify({ email: email })
            // })
            // .then(response => response.json())
            // .then(data => {
            //     this.showMessage(data.message, 'success');
            // })
            // .catch(error => {
            //     this.showMessage('Произошла ошибка. Попробуйте позже.', 'error');
            // });
        }

        validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        showMessage(message, type) {
            const notification = document.createElement('div');
            notification.className = 'notification';
            notification.textContent = message;
            notification.style.cssText = `
                position: fixed;
                bottom: 30px;
                right: 30px;
                background: ${type === 'success' ? '#388e3c' : '#d32f2f'};
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                z-index: 10000;
                animation: slideInUp 0.3s ease-out;
            `;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'slideOutDown 0.3s ease-out';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }
    }

    // ========================================
    // 11. Initialization
    // ========================================

    function init() {
        // Initialize Hero Slider
        const sliderContainer = $('.slider-container');
        if (sliderContainer) {
            new HeroSlider(sliderContainer);
        }

        // Initialize Mobile Menu
        new MobileMenu();

        // Initialize Search Toggle
        new SearchToggle();

        // Initialize Dropdowns
        new Dropdown('#langBtn', '#langDropdown');

        // Initialize Scroll Effects
        new ScrollEffects();

        // Initialize Product Interactions
        new ProductInteractions();

        // Initialize Newsletter Form
        new NewsletterForm();

        console.log('INCANTO ITALY Theme initialized');
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
