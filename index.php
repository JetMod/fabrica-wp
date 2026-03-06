<?php $t = get_template_directory_uri(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ФАБРИКА интерьеров — производство полного цикла дизайнерской мебели и интерьерных решений">
    <meta name="keywords" content="дизайнерская мебель, интерьерные решения, производство мебели, мебель на заказ">
    <meta name="theme-color" content="#F5F3EF">
    
    <!-- Open Graph -->
    <meta property="og:title" content="ФАБРИКА интерьеров — Дизайнерская мебель и интерьеры под ключ">
    <meta property="og:description" content="Производство полного цикла дизайнерской мебели и интерьерных решений">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo esc_url($t . '/img/main.webp'); ?>">
    
    <title>ФАБРИКА интерьеров — Дизайнерская мебель и интерьеры под ключ</title>
    
    <!-- Иконка для браузера (логотип) -->
    <link rel="icon" href="<?php echo esc_url($t . '/img/logo.jpg'); ?>" type="image/jpeg">
    <link rel="apple-touch-icon" href="<?php echo esc_url($t . '/img/logo.jpg'); ?>">
    
    <!-- Preload критических ресурсов -->
    <link rel="preload" as="image" href="<?php echo esc_url($t . '/img/logo.jpg'); ?>">
    <link rel="preload" as="video" href="<?php echo esc_url($t . '/video/hero.mp4'); ?>">
    
    <?php wp_head(); ?>
</head>
<body class="page-index">
 
 <?php get_header(); ?>

    <!-- Основной контент -->
    <main class="main" role="main" id="main-content">
        <!-- Видео Hero — полноэкранное видео -->
        <section class="video-hero" aria-label="Видео ФАБРИКА интерьеров">
            <div class="video-hero__wrapper">
                <video
                    class="video-hero__video"
                    src="<?php echo esc_url($t . '/video/hero1.mov'); ?>"
                    autoplay
                    muted
                    loop
                    playsinline
                    disablePictureInPicture
                    disableRemotePlayback
                    aria-label="Фоновое видео"
                ></video>
                <div class="video-hero__overlay" aria-hidden="true"></div>
            </div>
            <div class="video-hero__content">
                <div class="video-hero__content-inner">
                    <div class="container">
                        <p class="video-hero__tagline">Фабрика <span class="video-hero__tagline-accent">интерьеров</span></p>
                        <h1 class="video-hero__title">Дизайнерская мебель в Крыму</h1>
                        <p class="video-hero__text">Мебель на заказ и интерьеры под ключ. Отражаем ваш вкус.</p>
                        <a href="catalog.html" class="video-hero__cta button button--primary">В каталог</a>
                    </div>
                </div>
            </div>
            <a href="#about" class="video-hero__scroll-hint" aria-label="Листайте вниз">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
                <span>Листайте вниз</span>
            </a>
        </section>

        <!-- Заголовок блока акций -->
        <div class="hero-promo-intro">
            <p class="hero-promo-intro__label">Акции и новинки</p>
            <h2 class="hero-promo-intro__title">Специальные предложения</h2>
            <p class="hero-promo-intro__subtitle">Выгодные условия на мебель и интерьерные решения</p>
        </div>

        <!-- Hero секция — слайдер акций -->
        <section class="hero" aria-label="Промо-слайдер с акциями и трендами">
            <div class="hero__slider">
                <!-- Слайд 1 - Акция -->
                <div class="hero__slide active">
                    <div class="hero__slide-content">
                        <div class="hero__text-side">
                            <div class="hero__text-wrapper">
                                <h1 class="hero__title">СКИДКА НА КОМПЛЕКТ СТОЛ + СТУЛЬЯ</h1>
                                <p class="hero__subtitle">Акция распространяется на столы без знака «финальная цена»</p>
                                <a href="catalog.html" class="button button--primary hero__button">В КАТАЛОГ</a>
                            </div>
                        </div>
                        <div class="hero__image-side">
                            <img src="<?php echo esc_url($t . '/img/16.webp'); ?>" alt="Акция на столы и стулья" class="hero__image">
                        </div>
                    </div>
                </div>

                <!-- Слайд 2 - Стулья GALLOTI -->
                <div class="hero__slide">
                    <div class="hero__slide-content">
                        <div class="hero__text-side">
                            <div class="hero__text-wrapper">
                                <h1 class="hero__title">СТУЛЬЯ GALLOTI</h1>
                                <p class="hero__subtitle">Итальянская элегантность в вашем интерьере ♡</p>
                                <a href="catalog.html" class="button button--primary hero__button">В КАТАЛОГ</a>
                            </div>
                        </div>
                        <div class="hero__image-side">
                            <img src="<?php echo esc_url($t . '/img/17.webp'); ?>" alt="Стулья Galloti" class="hero__image">
                        </div>
                    </div>
                </div>

                <!-- Слайд 3 - Стул MORGAN -->
                <div class="hero__slide">
                    <div class="hero__slide-content">
                        <div class="hero__text-side">
                            <div class="hero__text-wrapper">
                                <h1 class="hero__title">СТУЛ MORGAN</h1>
                                <p class="hero__subtitle">Идеальное решение для вашего интерьера ♡</p>
                                <a href="catalog.html" class="button button--primary hero__button">В МАГАЗИН</a>
                            </div>
                        </div>
                        <div class="hero__image-side">
                            <img src="<?php echo esc_url($t . '/img/18.webp'); ?>" alt="Стул Morgan" class="hero__image">
                        </div>
                    </div>
                </div>

                <!-- Слайд 4 - Коллекция SOFIA -->
                <div class="hero__slide">
                    <div class="hero__slide-content">
                        <div class="hero__text-side">
                            <div class="hero__text-wrapper">
                                <h1 class="hero__title">КОЛЛЕКЦИЯ SOFIA И СТОЛ ORION</h1>
                                <p class="hero__subtitle">Коллекция Sofia в новом цвете — творчество и новая распашной круглый стол Orion ♡</p>
                                <a href="catalog.html" class="button button--primary hero__button">В МАГАЗИН</a>
                            </div>
                        </div>
                        <div class="hero__image-side">
                            <img src="<?php echo esc_url($t . '/img/19.webp'); ?>" alt="Коллекция Sofia и стол Orion" class="hero__image">
                        </div>
                    </div>
                </div>

                <!-- Слайд 5 - Диван CAMPO -->
                <div class="hero__slide">
                    <div class="hero__slide-content">
                        <div class="hero__text-side">
                            <div class="hero__text-wrapper">
                                <h1 class="hero__title">ДИВАН CAMPO</h1>
                                <p class="hero__subtitle">От итальянского конструктора Giovanni Lella ♡</p>
                                <a href="catalog.html" class="button button--primary hero__button">В МАГАЗИН</a>
                            </div>
                        </div>
                        <div class="hero__image-side">
                            <img src="<?php echo esc_url($t . '/img/20.webp'); ?>" alt="Диван Campo" class="hero__image">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Навигация слайдера -->
            <div class="hero__navigation">
                <button class="hero__nav-btn hero__nav-prev" aria-label="Предыдущий слайд">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="hero__nav-btn hero__nav-next" aria-label="Следующий слайд">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>

            <!-- Индикаторы слайдов -->
            <div class="hero__dots">
                <button class="hero__dot active" data-slide="0" aria-label="Слайд 1"></button>
                <button class="hero__dot" data-slide="1" aria-label="Слайд 2"></button>
                <button class="hero__dot" data-slide="2" aria-label="Слайд 3"></button>
                <button class="hero__dot" data-slide="3" aria-label="Слайд 4"></button>
                <button class="hero__dot" data-slide="4" aria-label="Слайд 5"></button>
            </div>

            <!-- Счетчик слайдов -->
            <div class="hero__counter">
                <span class="hero__counter-current">01</span>
                <span class="hero__counter-separator">/</span>
                <span class="hero__counter-total">05</span>
            </div>

        </section>

        <!-- О компании -->
        <section class="about animate-on-scroll" id="about" aria-labelledby="about-title">
            <div class="container">
                <div class="about__inner">
                    <!-- Текстовая часть -->
                    <div class="about__content">
                        <h2 class="about__title" id="about-title">ФАБРИКА интерьеров</h2>
                        <p class="about__subtitle">Производство полного цикла</p>
                        <p class="about__text">
                            Мы создаём интерьерные решения под ключ — от проектирования до монтажа. Работаем с домами, отелями, ресторанами и общественными пространствами.
                        </p>
                        <p class="about__text">
                            Предлагаем не просто мебель, а продуманные до деталей комплексные решения: проектирование, производство, отделку, индивидуальные элементы и монтаж.
                        </p>
                        <a href="office.html" class="button button--secondary about__button">
                            Узнать о производстве
                        </a>
                    </div>

                    <!-- Изображение -->
                    <div class="about__image">
                        <img src="<?php echo esc_url($t . '/img/main.webp'); ?>" alt="Интерьерные решения" class="about__img">
                    </div>
                </div>

                <!-- Ключевые приемущества -->
                <div class="about__values">
                    <h3 class="about__values-title">Наши приемущества</h3>
                    <div class="about__values-grid">
                        <div class="about__value-card">
                            <div class="about__value-icon">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 5L25 15L35 17L27.5 24.5L29 35L20 30L11 35L12.5 24.5L5 17L15 15L20 5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <h4 class="about__value-name">Качество</h4>
                            <p class="about__value-text">Используем лучшие материалы и технологии производства</p>
                        </div>

                        <div class="about__value-card">
                            <div class="about__value-icon">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 20H15M25 20H35M20 5V15M20 25V35" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    <circle cx="20" cy="20" r="12" stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>
                            <h4 class="about__value-name">Дизайн</h4>
                            <p class="about__value-text">Современные решения и авторский подход к каждому проекту</p>
                        </div>

                        <div class="about__value-card">
                            <div class="about__value-icon">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 35C28.2843 35 35 28.2843 35 20C35 11.7157 28.2843 5 20 5C11.7157 5 5 11.7157 5 20C5 28.2843 11.7157 35 20 35Z" stroke="currentColor" stroke-width="2"/>
                                    <path d="M20 12V20L26 26" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <h4 class="about__value-name">Индивидуальность</h4>
                            <p class="about__value-text">Создаём уникальные решения под задачи клиента</p>
                        </div>

                        <div class="about__value-card">
                            <div class="about__value-icon">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 20L15 28L33 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <h4 class="about__value-name">Ответственность</h4>
                            <p class="about__value-text">Берём ответственность за результат от начала до конца</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Каталог популярных товаров -->
        <section class="featured-products animate-on-scroll" aria-label="Популярные позиции каталога — скидки и новинки">
            <div class="container">
                <!-- Заголовок с табами -->
                <div class="featured-products__header">
                    <div class="featured-products__tabs">
                        <button class="featured-products__tab active" data-tab="sale">Скидки и акции</button>
                        <button class="featured-products__tab" data-tab="new">Новинки</button>
                    </div>
                    <a href="catalog.html" class="featured-products__view-all">
                        Смотреть всё
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 4L13 10L7 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <!-- Контент табов -->
                <div class="featured-products__content">
                    <!-- Таб: Скидки и акции -->
                    <div class="featured-products__tab-content active" data-content="sale">
                        <div class="featured-products__slider">
                            <button class="featured-products__nav featured-products__nav--prev" aria-label="Предыдущий">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            
                            <div class="featured-products__slider-wrapper">
                                <div class="featured-products__grid">
                                <!-- Товар 1 -->
                                <div class="product-card" data-product-id="1">
                                    <div class="product-card__image">
                                        <img src="<?php echo esc_url($t . '/img/16.webp'); ?>" alt="Стол обеденный" class="product-card__img">
                                        <button class="product-card__favorite" aria-label="В избранное">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                                            </svg>
                                        </button>
                                        <div class="product-card__badge">Финальная цена</div>
                                    </div>
                                    <div class="product-card__info">
                                        <h3 class="product-card__title">Стол обеденный раскладной</h3>
                                        <div class="product-card__status product-card__status--available">В наличии</div>
                                        <div class="product-card__footer">
                                            <div class="product-card__price">
                                                <span class="product-card__price-current">45 900 руб.</span>
                                                <span class="product-card__price-old">62 900 руб.</span>
                                            </div>
                                            <button type="button" class="product-card__request" aria-label="Узнать цену" data-callback-modal>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 4h16v12H2V4zm0 0l8 5 8-5M2 16V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                    <!-- Товар 2 -->
                                    <div class="product-card" data-product-id="9">
                                        <div class="product-card__image">
                                            <img src="<?php echo esc_url($t . '/img/17.webp'); ?>" alt="Стулья Galloti" class="product-card__img">
                                            <button class="product-card__favorite" aria-label="В избранное">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="product-card__info">
                                            <h3 class="product-card__title">Стулья Galloti комплект 4 шт</h3>
                                            <div class="product-card__status product-card__status--order">Под заказ</div>
                                            <div class="product-card__footer">
                                                <div class="product-card__price">
                                                    <span class="product-card__price-current">89 900 руб.</span>
                                                    <span class="product-card__price-old">115 900 руб.</span>
                                                </div>
                                                <button type="button" class="product-card__request" aria-label="Узнать цену" data-callback-modal>
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 4h16v12H2V4zm0 0l8 5 8-5M2 16V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Товар 3 -->
                                    <div class="product-card" data-product-id="10">
                                        <div class="product-card__image">
                                            <img src="<?php echo esc_url($t . '/img/18.webp'); ?>" alt="Стул Morgan" class="product-card__img">
                                            <button class="product-card__favorite" aria-label="В избранное">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                                                </svg>
                                            </button>
                                            <div class="product-card__badge">Финальная цена</div>
                                        </div>
                                        <div class="product-card__info">
                                            <h3 class="product-card__title">Стул Morgan, велюр серый</h3>
                                            <div class="product-card__status product-card__status--available">В наличии</div>
                                            <div class="product-card__footer">
                                                <div class="product-card__price">
                                                    <span class="product-card__price-current">24 990 руб.</span>
                                                    <span class="product-card__price-old">32 990 руб.</span>
                                                </div>
                                                <button type="button" class="product-card__request" aria-label="Узнать цену" data-callback-modal>
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 4h16v12H2V4zm0 0l8 5 8-5M2 16V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Товар 4 -->
                                    <div class="product-card" data-product-id="2">
                                        <div class="product-card__image">
                                            <img src="<?php echo esc_url($t . '/img/19.webp'); ?>" alt="Стол Orion" class="product-card__img">
                                            <button class="product-card__favorite" aria-label="В избранное">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="product-card__info">
                                            <h3 class="product-card__title">Стол Orion раскладной круглый</h3>
                                            <div class="product-card__status product-card__status--available">В наличии</div>
                                            <div class="product-card__footer">
                                                <div class="product-card__price">
                                                    <span class="product-card__price-current">52 900 руб.</span>
                                                    <span class="product-card__price-old">68 900 руб.</span>
                                                </div>
                                                <button type="button" class="product-card__request" aria-label="Узнать цену" data-callback-modal>
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 4h16v12H2V4zm0 0l8 5 8-5M2 16V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                <!-- Товар 5 -->
                                <div class="product-card" data-product-id="11">
                                    <div class="product-card__image">
                                        <img src="<?php echo esc_url($t . '/img/20.webp'); ?>" alt="Диван Campo" class="product-card__img">
                                        <button class="product-card__favorite" aria-label="В избранное">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                                            </svg>
                                        </button>
                                        <div class="product-card__badge">Финальная цена</div>
                                    </div>
                                    <div class="product-card__info">
                                        <h3 class="product-card__title">Диван Campo, ткань букле</h3>
                                        <div class="product-card__status product-card__status--order">Под заказ</div>
                                        <div class="product-card__footer">
                                            <div class="product-card__price">
                                                <span class="product-card__price-current">169 900 руб.</span>
                                                <span class="product-card__price-old">199 900 руб.</span>
                                            </div>
                                            <button type="button" class="product-card__request" aria-label="Узнать цену" data-callback-modal>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 4h16v12H2V4zm0 0l8 5 8-5M2 16V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Товар 6 -->
                                <div class="product-card" data-product-id="12">
                                    <div class="product-card__image">
                                        <img src="<?php echo esc_url($t . '/img/17.webp'); ?>" alt="Стулья Galloti" class="product-card__img">
                                        <button class="product-card__favorite" aria-label="В избранное">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                                            </svg>
                                        </button>
                                        <div class="product-card__badge">Финальная цена</div>
                                    </div>
                                    <div class="product-card__info">
                                        <h3 class="product-card__title">Стулья Galloti, комплект 2 шт</h3>
                                        <div class="product-card__status product-card__status--available">В наличии</div>
                                        <div class="product-card__footer">
                                            <div class="product-card__price">
                                                <span class="product-card__price-current">54 900 руб.</span>
                                                <span class="product-card__price-old">69 900 руб.</span>
                                            </div>
                                            <button type="button" class="product-card__request" aria-label="Узнать цену" data-callback-modal>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 4h16v12H2V4zm0 0l8 5 8-5M2 16V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Товар 7 -->
                                <div class="product-card" data-product-id="13">
                                    <div class="product-card__image">
                                        <img src="<?php echo esc_url($t . '/img/18.webp'); ?>" alt="Стул Morgan" class="product-card__img">
                                        <button class="product-card__favorite" aria-label="В избранное">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                                            </svg>
                                        </button>
                                        <div class="product-card__badge">Финальная цена</div>
                                    </div>
                                    <div class="product-card__info">
                                        <h3 class="product-card__title">Стул Morgan, экокожа</h3>
                                        <div class="product-card__status product-card__status--available">В наличии</div>
                                        <div class="product-card__footer">
                                            <div class="product-card__price">
                                                <span class="product-card__price-current">19 900 руб.</span>
                                                <span class="product-card__price-old">26 900 руб.</span>
                                            </div>
                                            <button type="button" class="product-card__request" aria-label="Узнать цену" data-callback-modal>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 4h16v12H2V4zm0 0l8 5 8-5M2 16V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Товар 8 -->
                                <div class="product-card" data-product-id="3">
                                    <div class="product-card__image">
                                        <img src="<?php echo esc_url($t . '/img/16.webp'); ?>" alt="Стол обеденный" class="product-card__img">
                                        <button class="product-card__favorite" aria-label="В избранное">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__info">
                                        <h3 class="product-card__title">Стол обеденный прямоугольный</h3>
                                        <div class="product-card__status product-card__status--order">Под заказ</div>
                                        <div class="product-card__footer">
                                            <div class="product-card__price">
                                                <span class="product-card__price-current">39 900 руб.</span>
                                                <span class="product-card__price-old">52 900 руб.</span>
                                            </div>
                                            <button type="button" class="product-card__request" aria-label="Узнать цену" data-callback-modal>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 4h16v12H2V4zm0 0l8 5 8-5M2 16V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <button class="featured-products__nav featured-products__nav--next" aria-label="Следующий">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <div class="featured-products__dots"></div>
                    </div>

                    <!-- Таб: Новинки -->
                    <div class="featured-products__tab-content" data-content="new">
                        <div class="featured-products__slider">
                            <button class="featured-products__nav featured-products__nav--prev" aria-label="Предыдущий">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            
                            <div class="featured-products__slider-wrapper">
                                <div class="featured-products__grid">
                                <div class="product-card" data-product-id="14">
                                    <div class="product-card__image">
                                        <img src="<?php echo esc_url($t . '/img/20.webp'); ?>" alt="Диван Campo" class="product-card__img">
                                        <button class="product-card__favorite" aria-label="В избранное">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                                            </svg>
                                        </button>
                                        <div class="product-card__badge product-card__badge--trend">Тренд</div>
                                    </div>
                                    <div class="product-card__info">
                                        <h3 class="product-card__title">Диван Campo от Giovanni Lella</h3>
                                        <div class="product-card__status product-card__status--order">Под заказ</div>
                                        <div class="product-card__footer">
                                            <div class="product-card__price">
                                                <span class="product-card__price-current">189 900 руб.</span>
                                            </div>
                                            <button type="button" class="product-card__request" aria-label="Узнать цену" data-callback-modal>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 4h16v12H2V4zm0 0l8 5 8-5M2 16V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="product-card" data-product-id="15">
                                    <div class="product-card__image">
                                        <img src="<?php echo esc_url($t . '/img/19.webp'); ?>" alt="Коллекция Sofia" class="product-card__img">
                                        <button class="product-card__favorite" aria-label="В избранное">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                                            </svg>
                                        </button>
                                        <div class="product-card__badge product-card__badge--trend">Тренд</div>
                                    </div>
                                    <div class="product-card__info">
                                        <h3 class="product-card__title">Коллекция Sofia, стол Orion</h3>
                                        <div class="product-card__status product-card__status--available">В наличии</div>
                                        <div class="product-card__footer">
                                            <div class="product-card__price">
                                                <span class="product-card__price-current">129 900 руб.</span>
                                            </div>
                                            <button type="button" class="product-card__request" aria-label="Узнать цену" data-callback-modal>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 4h16v12H2V4zm0 0l8 5 8-5M2 16V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-card" data-product-id="16">
                                    <div class="product-card__image">
                                        <img src="<?php echo esc_url($t . '/img/18.webp'); ?>" alt="Стул Morgan" class="product-card__img">
                                        <button class="product-card__favorite" aria-label="В избранное">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                                            </svg>
                                        </button>
                                        <div class="product-card__badge product-card__badge--trend">Тренд</div>
                                    </div>
                                    <div class="product-card__info">
                                        <h3 class="product-card__title">Стул Morgan, латте</h3>
                                        <div class="product-card__status product-card__status--order">Под заказ</div>
                                        <div class="product-card__footer">
                                            <div class="product-card__price">
                                                <span class="product-card__price-current">27 900 руб.</span>
                                            </div>
                                            <button type="button" class="product-card__request" aria-label="Узнать цену" data-callback-modal>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 4h16v12H2V4zm0 0l8 5 8-5M2 16V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-card" data-product-id="17">
                                    <div class="product-card__image">
                                        <img src="<?php echo esc_url($t . '/img/17.webp'); ?>" alt="Стулья Galloti" class="product-card__img">
                                        <button class="product-card__favorite" aria-label="В избранное">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                                            </svg>
                                        </button>
                                        <div class="product-card__badge product-card__badge--trend">Тренд</div>
                                    </div>
                                    <div class="product-card__info">
                                        <h3 class="product-card__title">Стулья Galloti, комплект 2 шт</h3>
                                        <div class="product-card__status product-card__status--available">В наличии</div>
                                        <div class="product-card__footer">
                                            <div class="product-card__price">
                                                <span class="product-card__price-current">59 900 руб.</span>
                                            </div>
                                            <button type="button" class="product-card__request" aria-label="Узнать цену" data-callback-modal>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 4h16v12H2V4zm0 0l8 5 8-5M2 16V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-card" data-product-id="4">
                                    <div class="product-card__image">
                                        <img src="<?php echo esc_url($t . '/img/16.webp'); ?>" alt="Стол обеденный" class="product-card__img">
                                        <button class="product-card__favorite" aria-label="В избранное">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                                            </svg>
                                        </button>
                                        <div class="product-card__badge product-card__badge--trend">Тренд</div>
                                    </div>
                                    <div class="product-card__info">
                                        <h3 class="product-card__title">Стол обеденный, ясень</h3>
                                        <div class="product-card__status product-card__status--order">Под заказ</div>
                                        <div class="product-card__footer">
                                            <div class="product-card__price">
                                                <span class="product-card__price-current">74 900 руб.</span>
                                            </div>
                                            <button type="button" class="product-card__request" aria-label="Узнать цену" data-callback-modal>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 4h16v12H2V4zm0 0l8 5 8-5M2 16V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                            <button class="featured-products__nav featured-products__nav--next" aria-label="Следующий">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <div class="featured-products__dots"></div>
                    </div>
                </div>
            </div>
        </section>


     

        <!-- Каталог -->
        <section class="catalog animate-on-scroll" id="catalog" aria-labelledby="catalog-title">
            <div class="container">
                <div class="catalog__header">
                    <h2 class="catalog__title" id="catalog-title">Каталог</h2>
                    <p class="catalog__subtitle">Откройте для себя мир премиальных интерьерных решений</p>
                </div>

                <div class="catalog__grid">
                    <!-- Мебель -->
                    <a href="catalog.html" class="catalog__card">
                        <div class="catalog__card-image">
                            <img src="<?php echo esc_url($t . '/img/20.webp'); ?>" alt="Мебель" class="catalog__img">
                            <div class="catalog__card-overlay"></div>
                        </div>
                        <div class="catalog__card-content">
                            <span class="catalog__card-number">01</span>
                            <h3 class="catalog__card-title">Мебель</h3>
                            <p class="catalog__card-text">Дизайнерская мебель для любого пространства</p>
                            <span class="catalog__card-arrow">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </span>
                        </div>
                    </a>

                    <!-- Освещение -->
                    <a href="catalog.html" class="catalog__card">
                        <div class="catalog__card-image">
                            <img src="<?php echo esc_url($t . '/img/18.webp'); ?>" alt="Освещение" class="catalog__img">
                            <div class="catalog__card-overlay"></div>
                        </div>
                        <div class="catalog__card-content">
                            <span class="catalog__card-number">02</span>
                            <h3 class="catalog__card-title">Освещение</h3>
                            <p class="catalog__card-text">Элегантные светильники и люстры</p>
                            <span class="catalog__card-arrow">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </span>
                        </div>
                    </a>

                    <!-- Декор -->
                    <a href="catalog.html" class="catalog__card">
                        <div class="catalog__card-image">
                            <img src="<?php echo esc_url($t . '/img/19.webp'); ?>" alt="Декор" class="catalog__img">
                            <div class="catalog__card-overlay"></div>
                        </div>
                        <div class="catalog__card-content">
                            <span class="catalog__card-number">03</span>
                            <h3 class="catalog__card-title">Декор</h3>
                            <p class="catalog__card-text">Изысканные аксессуары для интерьера</p>
                            <span class="catalog__card-arrow">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </span>
                        </div>
                    </a>

                    <!-- Текстиль -->
                    <a href="catalog.html" class="catalog__card">
                        <div class="catalog__card-image">
                            <img src="<?php echo esc_url($t . '/img/17.webp'); ?>" alt="Текстиль" class="catalog__img">
                            <div class="catalog__card-overlay"></div>
                        </div>
                        <div class="catalog__card-content">
                            <span class="catalog__card-number">04</span>
                            <h3 class="catalog__card-title">Текстиль</h3>
                            <p class="catalog__card-text">Премиальные ткани и текстильные решения</p>
                            <span class="catalog__card-arrow">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </span>
                        </div>
                    </a>

                    <!-- Напольные покрытия -->
                    <a href="catalog.html" class="catalog__card">
                        <div class="catalog__card-image">
                            <img src="<?php echo esc_url($t . '/img/16.webp'); ?>" alt="Напольные покрытия" class="catalog__img">
                            <div class="catalog__card-overlay"></div>
                        </div>
                        <div class="catalog__card-content">
                            <span class="catalog__card-number">05</span>
                            <h3 class="catalog__card-title">Напольные покрытия</h3>
                            <p class="catalog__card-text">Качественные материалы для пола</p>
                            <span class="catalog__card-arrow">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </span>
                        </div>
                    </a>

                    <!-- HORECA -->
                    <a href="catalog.html" class="catalog__card">
                        <div class="catalog__card-image">
                            <img src="<?php echo esc_url($t . '/img/6.webp'); ?>" alt="HORECA" class="catalog__img">
                            <div class="catalog__card-overlay"></div>
                        </div>
                        <div class="catalog__card-content">
                            <span class="catalog__card-number">06</span>
                            <h3 class="catalog__card-title">HORECA</h3>
                            <p class="catalog__card-text">Профессиональные решения для бизнеса</p>
                            <span class="catalog__card-arrow">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Кнопка посмотреть все -->
                <div class="catalog__action">
                    <a href="catalog.html" class="catalog__view-all">
                        <span>Посмотреть весь каталог</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>


           <!-- Услуги -->
           <section class="services animate-on-scroll" aria-labelledby="services-title">
            <div class="container">
                <div class="services__header">
                    <h2 class="services__title" id="services-title">Фабрика также предоставляет услуги</h2>
                    <p class="services__subtitle">Комплексный подход к реализации ваших интерьерных проектов</p>
                </div>

                <div class="services__slider-wrapper">
                    <!-- Кнопка "Назад" -->
                    <!-- Кнопка "Назад" -->
                    <button class="services__nav services__nav--prev" aria-label="Предыдущие услуги">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <div class="services__slider">
                        <div class="services__track">
                            <!-- 1. Оснащение -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/1.webp'); ?>" alt="Оснащение отелей и гостиниц" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Оснащение отелей и гостиниц</h4>
                                    <p class="services__card-text">Комплексная комплектация гостиничных номеров и общественных зон: мебель, текстиль, освещение, аксессуары.</p>
                                </div>
                            </div>
                            <!-- 2. Производство -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/6.webp'); ?>" alt="Мебель на заказ корпусная и мягкая" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Мебель на заказ (корпусная и мягкая)</h4>
                                    <p class="services__card-text">Изготовление мебели по индивидуальным размерам для отелей, ресторанов и жилых интерьеров.</p>
                                </div>
                            </div>
                            <!-- 3. Проектирование -->
                            <a href="service-single.html" class="services__card services__card--link">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/5.webp'); ?>" alt="Дизайн интерьера и визуализация" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Дизайн интерьера и визуализация</h4>
                                    <p class="services__card-text">Концепция интерьера, 3D-визуализация и подбор всех элементов под ключ.</p>
                                </div>
                            </a>
                            <!-- 4. Поставка -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/2.webp'); ?>" alt="Поставка посуды для HoReCa" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Поставка посуды для HoReCa</h4>
                                    <p class="services__card-text">Широкий ассортимент посуды и столовых принадлежностей для ресторанов и отелей.</p>
                                </div>
                            </div>
                            <!-- 5. Монтаж -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/6.webp'); ?>" alt="Монтаж и доставка по России" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Монтаж и доставка по России</h4>
                                    <p class="services__card-text">Профессиональная установка мебели и доставка по всей России.</p>
                                </div>
                            </div>
                            <!-- 6. Оснащение -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/2.webp'); ?>" alt="Оснащение ресторанов и кафе" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Оснащение ресторанов и кафе</h4>
                                    <p class="services__card-text">Посуда, мебель, текстиль, декор и оборудование для ресторанов, кафе и баров под ключ.</p>
                                </div>
                            </div>
                            <!-- 7. Производство -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/1.webp'); ?>" alt="Производство мебели по индивидуальным проектам" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Производство мебели по индивидуальным проектам</h4>
                                    <p class="services__card-text">Собственное производство: корпусная и мягкая мебель, панели, двери по вашим эскизам.</p>
                                </div>
                            </div>
                            <!-- 8. Проектирование -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/7.webp'); ?>" alt="Проектирование и подбор мебели" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Проектирование и подбор мебели</h4>
                                    <p class="services__card-text">Индивидуальное проектирование, 3D-визуализация и подбор решений под ваш интерьер.</p>
                                </div>
                            </div>
                            <!-- 9. Поставка -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/3.webp'); ?>" alt="Поставка текстиля для ресторанов и отелей" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Поставка текстиля для ресторанов и отелей</h4>
                                    <p class="services__card-text">Постельное бельё, полотенца, шторы, скатерти и другой текстиль от проверенных производителей.</p>
                                </div>
                            </div>
                            <!-- 10. Оснащение -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/5.webp'); ?>" alt="Комплектация объектов под ключ" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Комплектация объектов «под ключ»</h4>
                                    <p class="services__card-text">От выбора материалов до финального монтажа — одна команда и полная ответственность за результат.</p>
                                </div>
                            </div>
                            <!-- 11. Производство -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/2.webp'); ?>" alt="Производство и покраска мебели" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Производство и покраска мебели</h4>
                                    <p class="services__card-text">Работаем с ЛДСП, МДФ, натуральным деревом, металлом. Используем точный распил и современную покраску.</p>
                                </div>
                            </div>
                            <!-- 12. Поставка -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/4.webp'); ?>" alt="Освещение и элементы интерьера" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Освещение и элементы интерьера</h4>
                                    <p class="services__card-text">Светильники, декор и аксессуары для создания гармоничного интерьера.</p>
                                </div>
                            </div>
                            <!-- 13. Оснащение -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/3.webp'); ?>" alt="Оснащение апартаментов и мини-отелей" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Оснащение апартаментов и мини-отелей</h4>
                                    <p class="services__card-text">Полная комплектация апартаментов и мини-отелей мебелью, техникой и аксессуарами.</p>
                                </div>
                            </div>
                            <!-- 14. Сотрудничество -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/7.webp'); ?>" alt="Условия для дизайнеров и студий" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Условия для дизайнеров и студий</h4>
                                    <p class="services__card-text">Выгодные условия, персональное сопровождение и помощь в комплектации проектов.</p>
                                </div>
                            </div>
                            <!-- 15. Обслуживание -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/9.webp'); ?>" alt="Постпродажное обслуживание" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Постпродажное обслуживание</h4>
                                    <p class="services__card-text">Гарантийное обслуживание, ремонт и консультации по уходу за изделиями.</p>
                                </div>
                            </div>
                            <!-- 16. Оснащение -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/4.webp'); ?>" alt="Оснащение офисов и коммерческих помещений" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Оснащение офисов и коммерческих помещений</h4>
                                    <p class="services__card-text">Мебель и интерьерные решения для офисов, шоурумов и коммерческих пространств.</p>
                                </div>
                            </div>
                            <!-- 17. Поставка -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/3.webp'); ?>" alt="Поставка фурнитуры и декора" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Поставка фурнитуры и декора</h4>
                                    <p class="services__card-text">Надёжная фурнитура, текстиль, свет и аксессуары от проверенных поставщиков для интерьеров.</p>
                                </div>
                            </div>
                            <!-- 18. Поставка -->
                            <div class="services__card">
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($t . '/img/4.webp'); ?>" alt="Поставка хозтоваров для HoReCa" class="services__img">
                                    <div class="services__card-overlay"></div>
                                </div>
                                <div class="services__card-content">
                                    <h4 class="services__card-title">Поставка хозтоваров для HoReCa</h4>
                                    <p class="services__card-text">Широкий ассортимент хозяйственных товаров для ресторанов, отелей и кафе от проверенных производителей.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="services__nav services__nav--next" aria-label="Следующие услуги">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <!-- Индикаторы слайдов -->
                <div class="services__dots" aria-hidden="true"></div>

                <div class="services__footer">
                    <a href="#contact-form" class="button button--primary">Обсудить проект</a>
                </div>
            </div>
        </section>

        <!-- Проекты -->
        <section class="projects animate-on-scroll" id="projects" aria-labelledby="projects-title">
            <div class="container">
                <div class="projects__header">
                    <h2 class="projects__title" id="projects-title">Наши проекты</h2>
                    <p class="projects__subtitle">Реализованные интерьерные решения для разных пространств</p>
                </div>

                <div class="projects__grid">
                    <!-- Проект 1 -->
                    <div class="projects__item projects__item--large" data-project-id="1">
                        <div class="projects__image">
                            <img src="<?php echo esc_url($t . '/img/16.webp'); ?>" alt="Интерьер гостиной" class="projects__img" loading="lazy">
                            <div class="projects__overlay">
                                <div class="projects__content">
                                    <h3 class="projects__name">Современная гостиная</h3>
                                    <p class="projects__category">Частный дом</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Проект 2 -->
                    <div class="projects__item" data-project-id="2">
                        <div class="projects__image">
                            <img src="<?php echo esc_url($t . '/img/17.webp'); ?>" alt="Интерьер спальни" class="projects__img" loading="lazy">
                            <div class="projects__overlay">
                                <div class="projects__content">
                                    <h3 class="projects__name">Премиальная спальня</h3>
                                    <p class="projects__category">Апартаменты</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Проект 3 -->
                    <div class="projects__item" data-project-id="3">
                        <div class="projects__image">
                            <img src="<?php echo esc_url($t . '/img/18.webp'); ?>" alt="Интерьер кухни" class="projects__img" loading="lazy">
                            <div class="projects__overlay">
                                <div class="projects__content">
                                    <h3 class="projects__name">Дизайнерская кухня</h3>
                                    <p class="projects__category">Квартира</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Проект 4 -->
                    <div class="projects__item" data-project-id="4">
                        <div class="projects__image">
                            <img src="<?php echo esc_url($t . '/img/19.webp'); ?>" alt="Интерьер ресторана" class="projects__img" loading="lazy">
                            <div class="projects__overlay">
                                <div class="projects__content">
                                    <h3 class="projects__name">Ресторан премиум-класса</h3>
                                    <p class="projects__category">Общепит</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Проект 5 -->
                    <div class="projects__item projects__item--wide" data-project-id="5">
                        <div class="projects__image">
                            <img src="<?php echo esc_url($t . '/img/20.webp'); ?>" alt="Интерьер отеля" class="projects__img" loading="lazy">
                            <div class="projects__overlay">
                                <div class="projects__content">
                                    <h3 class="projects__name">Отель бутик</h3>
                                    <p class="projects__category">Гостиничный номер</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Проект 6 -->
                    <div class="projects__item" data-project-id="6">
                        <div class="projects__image">
                            <img src="<?php echo esc_url($t . '/img/21.webp'); ?>" alt="Интерьер офиса" class="projects__img" loading="lazy">
                            <div class="projects__overlay">
                                <div class="projects__content">
                                    <h3 class="projects__name">Современный офис</h3>
                                    <p class="projects__category">Коммерческое пространство</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Проект 7 -->
                    <div class="projects__item" data-project-id="7">
                        <div class="projects__image">
                            <img src="<?php echo esc_url($t . '/img/22.webp'); ?>" alt="Интерьер кафе" class="projects__img" loading="lazy">
                            <div class="projects__overlay">
                                <div class="projects__content">
                                    <h3 class="projects__name">Уютное кафе</h3>
                                    <p class="projects__category">Общепит</p>
                                </div>
                            </div>
                        </div>
                    </div>

                 
                </div>

                <div class="projects__footer">
                    <a href="projects.html" class="button button--secondary">Смотреть все проекты</a>
                </div>
            </div>
        </section>

        <!-- Форма обратной связи -->
        <!-- Премиальная форма заявки -->
        <section class="contact animate-on-scroll" id="contact-form" aria-labelledby="contact-title">
            <div class="contact__background">
                <div class="contact__pattern"></div>
            </div>
            <div class="container">
                <div class="contact__premium">
                    <div class="contact__header">
                        <span class="contact__accent">Начните свой проект</span>
                        <h2 class="contact__title" id="contact-title">Получите персональную консультацию</h2>
                        <p class="contact__subtitle">Оставьте заявку, и наш эксперт свяжется с вами в течение 15 минут</p>
                    </div>

                    <form class="contact__form" id="contactForm">
                        <div class="contact__form-row">
                            <div class="contact__input-wrapper">
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name" 
                                    class="contact__input" 
                                    placeholder="Ваше имя"
                                    required
                                >
                                <span class="contact__input-border"></span>
                            </div>
                            <div class="contact__input-wrapper">
                                <input 
                                    type="tel" 
                                    id="phone" 
                                    name="phone" 
                                    class="contact__input" 
                                    placeholder="+7 (___) ___-__-__"
                                    required
                                >
                                <span class="contact__input-border"></span>
                            </div>
                            <button type="submit" class="contact__button">
                                <span>Получить консультацию</span>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </button>
                        </div>
                        <p class="contact__privacy">
                            <label style="display: flex; align-items: flex-start; gap: 8px; cursor: pointer;">
                                <input type="checkbox" name="privacy_agreement" required style="margin-top: 2px; cursor: pointer;">
                                <span>Нажимая на кнопку, вы соглашаетесь с <a href="#">политикой конфиденциальности</a></span>
                            </label>
                        </p>
                    </form>

                    <!-- Преимущества -->
                    <div class="contact__benefits">
                        <div class="contact__benefit">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 6L9 17L4 12"/>
                            </svg>
                            <span>Бесплатная консультация</span>
                        </div>
                        <div class="contact__benefit">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 6L9 17L4 12"/>
                            </svg>
                            <span>Расчёт в день обращения</span>
                        </div>
                        <div class="contact__benefit">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 6L9 17L4 12"/>
                            </svg>
                            <span>Гарантия качества</span>
                        </div>
                    </div>

                    <!-- Сообщение об успешной отправке -->
                    <div class="contact__success" id="successMessage">
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M8 12l2 2 4-4"/>
                        </svg>
                        <div>
                            <h3>Спасибо за обращение!</h3>
                            <p>Наш менеджер свяжется с вами в ближайшее время</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Для оптовых клиентов и дизайнеров -->
        <section class="wholesale animate-on-scroll" id="wholesale" aria-labelledby="wholesale-title">
            <div class="container">
                <div class="wholesale__inner">
                    <!-- Изображение -->
                    <div class="wholesale__image">
                        <div class="wholesale__image-wrapper">
                            <img src="<?php echo esc_url($t . '/img/20.webp'); ?>" alt="Дизайнерская мебель для оптовых клиентов" class="wholesale__img" loading="lazy">
                            <div class="wholesale__image-overlay"></div>
                            <div class="wholesale__badge">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>ПРЕМИУМ</span>
                            </div>
                        </div>
                    </div>

                    <!-- Контент -->
                    <div class="wholesale__content">
                        <h2 class="wholesale__title" id="wholesale-title">Для оптовых клиентов и дизайнеров</h2>
                        <p class="wholesale__description">
                            Мы тщательно анализируем мебельный рынок и точно знаем, что нужно современному покупателю. Создаём интерьерные решения, которые выбирают профессионалы.
                        </p>

                        <!-- Преимущества -->
                        <div class="wholesale__features">
                            <div class="wholesale__feature">
                                <div class="wholesale__feature-icon">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 7V5C3 3.89543 3.89543 3 5 3H19C20.1046 3 21 3.89543 21 5V7M3 7L3 19C3 20.1046 3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V7M3 7L12 13L21 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="wholesale__feature-content">
                                    <h3 class="wholesale__feature-title">1500+ товаров</h3>
                                    <p class="wholesale__feature-text">Широкий ассортимент в каталоге</p>
                                </div>
                            </div>

                            <div class="wholesale__feature">
                                <div class="wholesale__feature-icon">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 21H21M5 21V7L13 2L21 7V21M9 9V21M15 9V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="wholesale__feature-content">
                                    <h3 class="wholesale__feature-title">Собственное производство</h3>
                                    <p class="wholesale__feature-text">Полный цикл от идеи до монтажа</p>
                                </div>
                            </div>

                            <div class="wholesale__feature">
                                <div class="wholesale__feature-icon">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="wholesale__feature-content">
                                    <h3 class="wholesale__feature-title">Своя команда Design&Research</h3>
                                    <p class="wholesale__feature-text">Проектирование и разработка</p>
                                </div>
                            </div>

                            <div class="wholesale__feature">
                                <div class="wholesale__feature-icon">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2V22M17 5H9.5C8.57174 5 7.6815 5.36875 7.02513 6.02513C6.36875 6.6815 6 7.57174 6 8.5C6 9.42826 6.36875 10.3185 7.02513 10.9749C7.6815 11.6313 8.57174 12 9.5 12H14.5C15.4283 12 16.3185 12.3687 16.9749 13.0251C17.6313 13.6815 18 14.5717 18 15.5C18 16.4283 17.6313 17.3185 16.9749 17.9749C16.3185 18.6313 15.4283 19 14.5 19H6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="wholesale__feature-content">
                                    <h3 class="wholesale__feature-title">Персональные условия</h3>
                                    <p class="wholesale__feature-text">Индивидуальный подход на любые объёмы</p>
                                </div>
                            </div>
                        </div>

                        <!-- Кнопка CTA -->
                        <a href="#contact-form" class="wholesale__cta button button--primary">
                            <span>Условия для сотрудничества</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Блог / Статьи -->
        <section class="blog animate-on-scroll" id="blog" aria-labelledby="blog-title">
            <div class="container">
                <div class="blog__header">
                    <h2 class="blog__title" id="blog-title">Вам будет интересно</h2>
                    <a href="blog.html" class="blog__view-all">
                        Все статьи
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <div class="blog__grid">
                    <!-- Статья 1 -->
                    <article class="blog__card">
                        <a href="blog-single.html" class="blog__card-link">
                            <div class="blog__card-image">
                                <img src="<?php echo esc_url($t . '/img/16.webp'); ?>" alt="5 ключевых факторов для выбора идеальных стульев" class="blog__img" loading="lazy">
                                <div class="blog__card-overlay">
                                    <span class="blog__read-more">Читать далее</span>
                                </div>
                            </div>
                            <div class="blog__card-content">
                                <div class="blog__card-meta">
                                    <span class="blog__card-category">Гиды по выбору</span>
                                    <span class="blog__card-date">15 янв 2026</span>
                                </div>
                                <h3 class="blog__card-title">5 ключевых факторов для выбора идеальных стульев</h3>
                                <p class="blog__card-excerpt">Как подобрать стулья, которые будут комфортными, стильными и прослужат долгие годы</p>
                            </div>
                        </a>
                    </article>

                    <!-- Статья 2 -->
                    <article class="blog__card">
                        <a href="blog-single.html" class="blog__card-link">
                            <div class="blog__card-image">
                                <img src="<?php echo esc_url($t . '/img/17.webp'); ?>" alt="История дизайна мебели: от классицизма до современности" class="blog__img" loading="lazy">
                                <div class="blog__card-overlay">
                                    <span class="blog__read-more">Читать далее</span>
                                </div>
                            </div>
                            <div class="blog__card-content">
                                <div class="blog__card-meta">
                                    <span class="blog__card-category">История дизайна</span>
                                    <span class="blog__card-date">12 янв 2026</span>
                                </div>
                                <h3 class="blog__card-title">История дизайна мебели: от классицизма до современности</h3>
                                <p class="blog__card-excerpt">Путешествие через эпохи — от изящного классицизма до минималистичного модерна</p>
                            </div>
                        </a>
                    </article>

                    <!-- Статья 3 -->
                    <article class="blog__card">
                        <a href="blog-single.html" class="blog__card-link">
                            <div class="blog__card-image">
                                <img src="<?php echo esc_url($t . '/img/18.webp'); ?>" alt="История дизайна мебели: от античности до XVIII века" class="blog__img" loading="lazy">
                                <div class="blog__card-overlay">
                                    <span class="blog__read-more">Читать далее</span>
                                </div>
                            </div>
                            <div class="blog__card-content">
                                <div class="blog__card-meta">
                                    <span class="blog__card-category">История дизайна</span>
                                    <span class="blog__card-date">8 янв 2026</span>
                                </div>
                                <h3 class="blog__card-title">История дизайна мебели: от античности до XVIII века</h3>
                                <p class="blog__card-excerpt">Эволюция мебельного искусства от древних времен до эпохи барокко и рококо</p>
                            </div>
                        </a>
                    </article>

                    <!-- Статья 4 -->
                    <article class="blog__card">
                        <a href="blog-single.html" class="blog__card-link">
                            <div class="blog__card-image">
                                <img src="<?php echo esc_url($t . '/img/19.webp'); ?>" alt="Как выбрать стол для маленькой кухни: секреты дизайнеров" class="blog__img" loading="lazy">
                                <div class="blog__card-overlay">
                                    <span class="blog__read-more">Читать далее</span>
                                </div>
                            </div>
                            <div class="blog__card-content">
                                <div class="blog__card-meta">
                                    <span class="blog__card-category">Советы экспертов</span>
                                    <span class="blog__card-date">5 янв 2026</span>
                                </div>
                                <h3 class="blog__card-title">Как выбрать стол для маленькой кухни: секреты дизайнеров</h3>
                                <p class="blog__card-excerpt">Практичные решения для компактных пространств, которые не жертвуют функциональностью</p>
                            </div>
                        </a>
                    </article>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
