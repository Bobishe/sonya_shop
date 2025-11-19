{{-- Footer Component --}}
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            {{-- Column 1: About Company --}}
            <div class="footer-column">
                <h3 class="footer-heading">О компании</h3>
                <p class="footer-description">
                    INCANTO ITALY — премиальный бренд женского белья из Италии.
                    Мы предлагаем изысканные коллекции, созданные из лучших материалов
                    с безупречным вниманием к деталям.
                </p>
                <div class="footer-logo">
                    <h4>INCANTO ITALY</h4>
                </div>
            </div>

            {{-- Column 2: Navigation --}}
            <div class="footer-column">
                <h3 class="footer-heading">Информация</h3>
                <ul class="footer-links">
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Доставка и оплата</a></li>
                    <li><a href="#">Возврат и обмен</a></li>
                    <li><a href="#">Размерная сетка</a></li>
                    <li><a href="#">Уход за изделиями</a></li>
                    <li><a href="#">Программа лояльности</a></li>
                    <li><a href="#">Публичная оферта</a></li>
                    <li><a href="#">Политика конфиденциальности</a></li>
                </ul>
            </div>

            {{-- Column 3: Customer Service --}}
            <div class="footer-column">
                <h3 class="footer-heading">Помощь покупателям</h3>
                <ul class="footer-links">
                    <li><a href="#">Как сделать заказ</a></li>
                    <li><a href="#">Способы оплаты</a></li>
                    <li><a href="#">Статус заказа</a></li>
                    <li><a href="#">Вопросы и ответы</a></li>
                    <li><a href="#">Бонусная программа</a></li>
                    <li><a href="#">Подарочные сертификаты</a></li>
                    <li><a href="#">Отзывы покупателей</a></li>
                    <li><a href="#">Блог</a></li>
                </ul>
            </div>

            {{-- Column 4: Contacts --}}
            <div class="footer-column">
                <h3 class="footer-heading">Контакты</h3>
                <ul class="footer-contacts">
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <a href="tel:+74950118888">+7 495 011 88 88</a>
                    </li>
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <a href="mailto:info@incanto-italy.ru">info@incanto-italy.ru</a>
                    </li>
                    <li>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Москва, ул. Тверская, д. 1</span>
                    </li>
                    <li class="working-hours">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <span>Пн-Вс: 10:00 - 22:00</span>
                    </li>
                </ul>

                {{-- Social Media --}}
                <div class="footer-social">
                    <h4 class="social-heading">Мы в социальных сетях</h4>
                    <div class="social-links">
                        <a href="#" aria-label="Instagram" class="social-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" fill="none" stroke="#1a1a1a" stroke-width="2"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" stroke="#1a1a1a" stroke-width="2"></line>
                            </svg>
                        </a>
                        <a href="#" aria-label="VKontakte" class="social-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.785 16.241s.288-.032.436-.193c.136-.148.132-.427.132-.427s-.02-1.304.574-1.497c.586-.19 1.336 1.26 2.131 1.818.603.422 1.061.329 1.061.329l2.134-.03s1.117-.07.587-.966c-.043-.074-.309-.664-1.589-1.878-1.34-1.27-1.16-1.065.453-3.263.982-1.338 1.375-2.154 1.252-2.503-.117-.333-.84-.245-.84-.245l-2.402.015s-.178-.025-.31.056c-.129.08-.212.267-.212.267s-.379 1.03-.884 1.906c-1.065 1.846-1.491 1.944-1.665 1.829-.405-.267-.304-1.075-.304-1.648 0-1.792.266-2.54-.519-2.733-.261-.064-.453-.107-1.121-.114-.858-.009-1.585.003-1.996.208-.274.137-.485.442-.356.46.159.021.52.099.711.365.247.344.238 1.118.238 1.118s.142 2.11-.331 2.371c-.325.179-.77-.187-1.726-1.865-.489-.859-.859-1.81-.859-1.81s-.071-.178-.198-.274c-.154-.116-.37-.152-.37-.152l-2.281.015s-.343.01-.469.162c-.112.135-.009.413-.009.413s1.781 4.237 3.795 6.373c1.848 1.958 3.944 1.827 3.944 1.827h.952z"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="Telegram" class="social-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69a.2.2 0 0 0-.05-.18c-.06-.05-.14-.03-.21-.02-.09.02-1.49.95-4.22 2.79-.4.27-.76.41-1.08.4-.36-.01-1.04-.2-1.55-.37-.63-.2-1.12-.31-1.08-.66.02-.18.27-.36.74-.55 2.92-1.27 4.86-2.11 5.83-2.51 2.78-1.16 3.35-1.36 3.73-1.36.08 0 .27.02.39.12.1.08.13.19.14.27-.01.06.01.24 0 .38z"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="WhatsApp" class="social-link">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Payment Methods --}}
                <div class="footer-payments">
                    <h4 class="payments-heading">Способы оплаты</h4>
                    <div class="payment-icons">
                        <span class="payment-icon">VISA</span>
                        <span class="payment-icon">MasterCard</span>
                        <span class="payment-icon">МИР</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer Bottom --}}
        <div class="footer-bottom">
            <div class="footer-copyright">
                <p>&copy; {{ date('Y') }} INCANTO ITALY. Все права защищены.</p>
            </div>
            <div class="footer-bottom-links">
                <a href="#">Политика конфиденциальности</a>
                <span class="separator">|</span>
                <a href="#">Пользовательское соглашение</a>
                <span class="separator">|</span>
                <a href="#">Карта сайта</a>
            </div>
        </div>
    </div>
</footer>
