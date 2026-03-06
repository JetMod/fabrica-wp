<?php
if (!isset($t)) {
    $t = get_template_directory_uri();
}
?>
   <!-- Header -->
   <header class="header">
        <!-- Верхний хедер -->
        <div class="header__top">
            <div class="container">
                <div class="header__top-inner">
                    <!-- Верхнее меню -->
                    <nav class="header__top-nav">
                        <a href="office.html" class="header__top-link">О нас</a>
                        <a href="services.html" class="header__top-link">Услуги</a>
                        <a href="designers.html" class="header__top-link">Дизайнерам</a>
                        <a href="business.html" class="header__top-link">Бизнесу</a>
                        <a href="delivery.html" class="header__top-link">Доставка</a>
                        <a href="projects.html" class="header__top-link">Проекты</a>
                    </nav>

                    <!-- Правая часть -->
                    <div class="header__top-right">
                        <a href="favorites.html" class="header__top-link">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                            </svg>
                            Избранное
                        </a>
                        <a href="catalog.html" class="header__top-link header__top-catalog">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 2h3v3H2V2zm5 0h3v3H7V2zm5 0h3v3h-3V2zM2 7h3v3H2V7zm5 0h3v3H7V7zm5 0h3v3h-3V7zM2 12h3v3H2v-3zm5 0h3v3H7v-3zm5 0h3v3h-3v-3z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Каталог
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Средний хедер -->
        <div class="header__middle">
            <div class="container">
                <div class="header__middle-inner">
                    <!-- Логотип + слоган -->
                    <div class="header__branding">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo">
                            <img src="<?php echo esc_url($t . '/img/logo.jpg'); ?>" alt="ФАБРИКА интерьеров" class="header__logo-img">
                        </a>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="header__tagline">Дизайнерская мебель<br>для дома, работы и отдыха</a>
                    </div>

                    <!-- Поиск -->
                    <div class="header__search">
                        <input type="text" placeholder="Поиск" class="header__search-input">
                        <button class="header__search-button" aria-label="Искать">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 17A8 8 0 109 1a8 8 0 000 16zM19 19l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Контакты + кнопка -->
                    <div class="header__right">
                        <div class="header__contacts-group">
                            <div class="header__work-time header__work-time--right">
                                <div class="header__work-time-header">
                                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-width="1.5"/>
                                        <path d="M8 4v4l3 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                    Режим работы:
                                </div>
                                <div class="header__work-time-value">ежедневно, 10:00–19:00</div>
                            </div>
                            <a href="tel:+79785977442" class="header__phone">
                                <span class="header__phone-label">Звоните сейчас</span>
                                <span class="header__phone-number">+7 (978) 597-74-42</span>
                            </a>
                        </div>
                        <a href="#contact-form" class="header__cta-button">Заказать звонок</a>
                    </div>

                    <!-- Бургер меню (мобильная версия) -->
                    <button class="header__burger" aria-label="Открыть меню">
                        <span class="header__burger-line"></span>
                        <span class="header__burger-line"></span>
                        <span class="header__burger-line"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Нижний хедер (основная навигация) -->
        <div class="header__bottom">
            <div class="container">
                <nav class="header__nav">
                    <ul class="header__menu">
                      
                        <li class="header__menu-item">
                            <a href="#mebel" class="header__menu-link">Мебель</a>
                        </li>
                        <li class="header__menu-item">
                            <a href="catalog.html" class="header__menu-link">Посуда</a>
                        </li>
                        <li class="header__menu-item">
                            <a href="catalog.html" class="header__menu-link">Декор</a>
                        </li>
                        <!-- <li class="header__menu-item">
                            <a href="catalog.html" class="header__menu-link">На улице</a>
                        </li> -->
                        <li class="header__menu-item">
                            <a href="services.html" class="header__menu-link">Услуги</a>
                        </li>
                        <li class="header__menu-item">
                            <a href="catalog.html" class="header__menu-link">Horeca</a>
                        </li>
                       
                        <li class="header__menu-item">
                            <a href="#sale" class="header__menu-link header__menu-link--accent">Акции</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Overlay для мобильного меню -->
        <div class="header__mobile-overlay"></div>

        <!-- Мобильное меню -->
        <div class="header__mobile-menu">
            <!-- Заголовок меню -->
            <div class="header__mobile-header">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="header__mobile-logo">
                    <img src="<?php echo esc_url($t . '/img/logo.jpg'); ?>" alt="ФАБРИКА интерьеров" class="header__mobile-logo-img">
                </a>
                <button class="header__mobile-close" aria-label="Закрыть меню">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>

            <!-- Поиск -->
            <div class="header__mobile-search">
                <div class="header__mobile-search-wrapper">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="header__mobile-search-icon">
                        <path d="M9 17A8 8 0 109 1a8 8 0 000 16zM19 19l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input type="text" placeholder="Поиск товаров..." class="header__mobile-search-input">
                    <button type="button" class="header__mobile-search-button" aria-label="Искать">
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 17A8 8 0 109 1a8 8 0 000 16zM19 19l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Контактная информация -->
            <div class="header__mobile-contacts">
                <a href="tel:+79785977442" class="header__mobile-contact header__mobile-contact--phone">
                    <div class="header__mobile-contact-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="header__mobile-contact-content">
                        <span class="header__mobile-contact-label">Телефон</span>
                        <span class="header__mobile-contact-value">+7 (978) 597-74-42</span>
                    </div>
                </a>
                <div class="header__mobile-contact header__mobile-contact--time">
                    <div class="header__mobile-contact-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="header__mobile-contact-content">
                        <span class="header__mobile-contact-label">Режим работы</span>
                        <span class="header__mobile-contact-value">ежедневно, 10:00–19:00</span>
                    </div>
                </div>
            </div>

            <!-- Кнопка заказа звонка -->
            <a href="#contact-form" class="header__mobile-cta">
                <span>Заказать звонок</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

            <!-- Навигация -->
            <nav class="header__mobile-nav">
                <a href="favorites.html" class="header__mobile-link">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                    </svg>
                    <span>Избранное</span>
                </a>
                <a href="office.html" class="header__mobile-link">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 22V12h6v10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>О компании</span>
                </a>
                <a href="services.html" class="header__mobile-link">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Услуги</span>
                </a>
                <a href="#production" class="header__mobile-link">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 3h8v8H3zM13 3h8v8h-8zM3 13h8v8H3zM13 13h8v8h-8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Производство</span>
                </a>
                <a href="designers.html" class="header__mobile-link">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Дизайнерам</span>
                </a>
                <a href="business.html" class="header__mobile-link">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Бизнесу</span>
                </a>
                <a href="delivery.html" class="header__mobile-link">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 3h15v13H1zM16 8h4l3 3v5h-7V8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="5.5" cy="18.5" r="2.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="18.5" cy="18.5" r="2.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Доставка</span>
                </a>
                <a href="projects.html" class="header__mobile-link">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="3" width="7" height="7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <rect x="14" y="3" width="7" height="7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <rect x="14" y="14" width="7" height="7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <rect x="3" y="14" width="7" height="7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Проекты</span>
                </a>
            </nav>
        </div>
    </header>