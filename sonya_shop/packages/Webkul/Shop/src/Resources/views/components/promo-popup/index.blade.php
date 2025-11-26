<v-promo-popup></v-promo-popup>

@pushOnce('scripts')
    <script type="text/x-template" id="v-promo-popup-template">
        <transition
            tag="div"
            name="promo-overlay"
            enter-active-class="duration-300 ease-out"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="duration-200 ease-in"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div
                v-show="isOpen"
                @click="closePopup"
                class="promo-popup-overlay"
            >
                <transition
                    tag="div"
                    name="promo-content"
                    enter-active-class="duration-300 ease-out"
                    enter-from-class="scale-95 opacity-0"
                    enter-to-class="scale-100 opacity-100"
                    leave-active-class="duration-200 ease-in"
                    leave-from-class="scale-100 opacity-100"
                    leave-to-class="scale-95 opacity-0"
                >
                    <div
                        v-show="isOpen"
                        @click.stop
                        class="promo-popup-container"
                    >
                        <!-- Кнопка закрытия -->
                        <button
                            @click="closePopup"
                            class="promo-popup-close"
                            aria-label="Закрыть"
                        >
                            <span class="icon-cancel text-2xl"></span>
                        </button>

                        <!-- Содержимое попапа -->
                        <div class="promo-popup-content">
                            <!-- Заголовок -->
                            <h2 class="promo-popup-title">
                                ПОЗАБОТЬТЕСЬ О СЕБЕ
                            </h2>

                            <!-- Подзаголовок -->
                            <p class="promo-popup-subtitle">
                                Получите скидку 10% за заботу о своём здоровье
                            </p>

                            <!-- Основной текст -->
                            <div class="promo-popup-text">
                                <p>Пришлите справку от маммолога</p>
                                <p>на почту: <a href="mailto:health@sonyashop.ru" class="promo-popup-email">health@sonyashop.ru</a></p>
                                <p style="margin-top: 15px;">В ответ мы отправим вам персональный</p>
                                <p>промокод на скидку 10% на любой заказ</p>
                            </div>

                            <!-- Кнопка действия -->
                            <button
                                @click="closePopup"
                                class="promo-popup-button"
                            >
                                Понятно
                            </button>

                            <!-- Дополнительная информация -->
                            <p class="promo-popup-footer-text">
                                Акция действует для всех новых клиентов
                            </p>
                        </div>
                    </div>
                </transition>
            </div>
        </transition>
    </script>

    <script type="module">
        app.component('v-promo-popup', {
            template: '#v-promo-popup-template',

            data() {
                return {
                    isOpen: false,
                    localStorageKey: 'promo_popup_shown',
                    delay: 5000, // 5 секунд
                };
            },

            mounted() {
                this.checkAndShowPopup();
                this.setupKeyboardListener();
            },

            beforeUnmount() {
                this.removeKeyboardListener();
            },

            methods: {
                checkAndShowPopup() {
                    // Проверяем, показывался ли попап ранее
                    const wasShown = localStorage.getItem(this.localStorageKey);

                    if (!wasShown) {
                        // Показываем попап через 5 секунд
                        setTimeout(() => {
                            this.openPopup();
                        }, this.delay);
                    }
                },

                openPopup() {
                    this.isOpen = true;
                    document.body.style.overflow = 'hidden';

                    // Сохраняем в localStorage, что попап был показан
                    localStorage.setItem(this.localStorageKey, 'true');
                },

                closePopup() {
                    this.isOpen = false;
                    document.body.style.overflow = 'auto';
                },

                handleEscapeKey(event) {
                    if (event.key === 'Escape' && this.isOpen) {
                        this.closePopup();
                    }
                },

                setupKeyboardListener() {
                    this.escapeHandler = this.handleEscapeKey.bind(this);
                    document.addEventListener('keydown', this.escapeHandler);
                },

                removeKeyboardListener() {
                    if (this.escapeHandler) {
                        document.removeEventListener('keydown', this.escapeHandler);
                    }
                }
            }
        });
    </script>

    <style>
        /* Overlay */
        .promo-popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.55);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Контейнер попапа */
        .promo-popup-container {
            position: relative;
            background-color: #FDF8F5;
            max-width: 550px;
            width: 100%;
            padding: 50px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        /* Кнопка закрытия */
        .promo-popup-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            color: #6c992f;
            cursor: pointer;
            padding: 5px;
            line-height: 1;
            transition: opacity 0.2s;
        }

        .promo-popup-close:hover {
            opacity: 0.7;
        }

        /* Содержимое */
        .promo-popup-content {
            text-align: center;
        }

        /* Заголовок */
        .promo-popup-title {
            font-family: 'DM Serif Display', serif;
            font-size: 36px;
            font-weight: 700;
            font-style: italic;
            color: #6c992f;
            margin: 0 0 15px 0;
            line-height: 1.2;
        }

        /* Подзаголовок */
        .promo-popup-subtitle {
            font-size: 18px;
            color: #6c992f;
            margin: 0 0 30px 0;
            line-height: 1.5;
        }

        /* Основной текст */
        .promo-popup-text {
            font-size: 16px;
            color: #5a5a5a;
            line-height: 1.6;
            margin: 0 0 30px 0;
        }

        .promo-popup-text p {
            margin: 0;
        }

        /* Email */
        .promo-popup-email {
            font-weight: 600;
            color: #6c992f;
            text-decoration: none;
        }

        .promo-popup-email:hover {
            text-decoration: underline;
        }

        /* Кнопка */
        .promo-popup-button {
            width: 100%;
            background-color: #6c992f;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            padding: 16px 20px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .promo-popup-button:hover {
            background-color: #5a8026;
        }

        /* Нижний текст */
        .promo-popup-footer-text {
            font-size: 12px;
            color: #999999;
            margin: 15px 0 0 0;
        }

        /* Адаптивность для мобильных устройств */
        @media (max-width: 768px) {
            .promo-popup-container {
                padding: 30px;
                max-width: 90%;
            }

            .promo-popup-title {
                font-size: 24px;
            }

            .promo-popup-subtitle {
                font-size: 16px;
            }

            .promo-popup-text {
                font-size: 14px;
            }

            .promo-popup-close {
                top: 15px;
                right: 15px;
            }
        }

        /* Анимации */
        .promo-overlay-enter-active,
        .promo-overlay-leave-active {
            transition: opacity 0.3s ease;
        }

        .promo-content-enter-active,
        .promo-content-leave-active {
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
    </style>
@endPushOnce
