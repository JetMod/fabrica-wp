<?php
/**
 * Template Name: Доставка
 * Description: Страница доставки и сборки мебели
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-delivery';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <!-- Hero -->
    <section class="delivery-hero">
        <div class="delivery-hero__bg">
            <div class="delivery-hero__grid"></div>
            <div class="delivery-hero__shapes" aria-hidden="true">
                <div class="delivery-hero__blob delivery-hero__blob--1"></div>
                <div class="delivery-hero__blob delivery-hero__blob--2"></div>
                <div class="delivery-hero__blob delivery-hero__blob--3"></div>
                <div class="delivery-hero__ring delivery-hero__ring--1"></div>
                <div class="delivery-hero__ring delivery-hero__ring--2"></div>
                <div class="delivery-hero__orb delivery-hero__orb--1"></div>
                <div class="delivery-hero__orb delivery-hero__orb--2"></div>
            </div>
            <div class="delivery-hero__edges"></div>
            <div class="delivery-hero__vignette"></div>
            <div class="delivery-hero__mesh"></div>
            <div class="delivery-hero__noise"></div>
            <div class="delivery-hero__glow delivery-hero__glow--1"></div>
            <div class="delivery-hero__glow delivery-hero__glow--2"></div>
            <div class="delivery-hero__glow delivery-hero__glow--3"></div>
            <div class="delivery-hero__lines">
                <span></span><span></span><span></span><span></span><span></span>
            </div>
        </div>
        <div class="container delivery-hero__container">
            <div class="delivery-hero__main">
                <p class="delivery-hero__lead">Доставка и сборка мебели</p>
                <h1 class="delivery-hero__title">От склада до вашей двери.<br><em>Соберём на месте.</em></h1>
                <p class="delivery-hero__text">По городу, Крыму и всей России. Бережная упаковка, чёткие сроки и профессиональная сборка на объекте.</p>
                <div class="delivery-hero__cta">
                    <a href="#zones" class="delivery-hero__btn delivery-hero__btn--primary">Узнать сроки и цены</a>
                    <a href="tel:+79785977442" class="delivery-hero__btn delivery-hero__btn--outline">+7 (978) 597-74-42</a>
                </div>
            </div>
            <ul class="delivery-hero__zones">
                <li class="delivery-hero__zone">
                    <span class="delivery-hero__zone-icon" aria-hidden="true">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
                    </span>
                    <span class="delivery-hero__zone-title">Севастополь и Крым</span>
                    <span class="delivery-hero__zone-desc">Своя доставка, 1–4 дня</span>
                </li>
                <li class="delivery-hero__zone">
                    <span class="delivery-hero__zone-icon" aria-hidden="true">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                    </span>
                    <span class="delivery-hero__zone-title">Вся Россия</span>
                    <span class="delivery-hero__zone-desc">СДЭК, Деловые Линии и др.</span>
                </li>
                <li class="delivery-hero__zone">
                    <span class="delivery-hero__zone-icon" aria-hidden="true">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
                    </span>
                    <span class="delivery-hero__zone-title">Сборка на объекте</span>
                    <span class="delivery-hero__zone-desc">Под ключ</span>
                </li>
            </ul>
        </div>
        <a href="#zones" class="delivery-hero__scroll" aria-label="Прокрутить вниз">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
        </a>
    </section>

    <!-- Как доставляем -->
    <section class="delivery-methods animate-on-scroll">
        <div class="container">
            <div class="delivery-methods__header">
                <div class="delivery-methods__badge">Способы</div>
                <h2 class="delivery-methods__title">Как мы доставляем</h2>
                <p class="delivery-methods__subtitle">Выберите удобный вариант доставки</p>
            </div>
            <div class="delivery-methods__grid">
                <div class="delivery-method">
                    <div class="delivery-method__icon">
                        <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
                            <circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>
                        </svg>
                    </div>
                    <h3 class="delivery-method__title">Курьером по городу</h3>
                    <p class="delivery-method__text">Доставка до подъезда или на объект. Стоимость и сроки зависят от адреса — уточняйте при заказе.</p>
                </div>
                <div class="delivery-method">
                    <div class="delivery-method__icon">
                        <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                        </svg>
                    </div>
                    <h3 class="delivery-method__title">По региону</h3>
                    <p class="delivery-method__text">Доставка по Крыму и Севастополю. Рассчитаем стоимость и согласуем дату доставки.</p>
                </div>
                <div class="delivery-method">
                    <div class="delivery-method__icon">
                        <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>
                        </svg>
                    </div>
                    <h3 class="delivery-method__title">Транспортные компании</h3>
                    <p class="delivery-method__text">Отправка по России через СДЭК, Деловые Линии и другие ТК. Стоимость по тарифам перевозчика.</p>
                </div>
                <div class="delivery-method">
                    <div class="delivery-method__icon">
                        <svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                    </div>
                    <h3 class="delivery-method__title">Самовывоз</h3>
                    <p class="delivery-method__text">Заберите заказ с нашего склада или шоурума. Бесплатно. Адрес и время — по согласованию.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Зоны и сроки -->
    <section class="delivery-zones animate-on-scroll" id="zones">
        <div class="container">
            <div class="delivery-zones__header">
                <div class="delivery-zones__badge">Зоны и сроки</div>
                <h2 class="delivery-zones__title">Сроки доставки</h2>
                <p class="delivery-zones__subtitle">Ориентировочные сроки. Точную дату согласуем после оформления заказа.</p>
            </div>
            <div class="delivery-zones__grid">
                <div class="delivery-zone">
                    <div class="delivery-zone__name">Севастополь и окрестности</div>
                    <div class="delivery-zone__terms">1–2 рабочих дня после готовности заказа. Стоимость от 500 ₽.</div>
                </div>
                <div class="delivery-zone">
                    <div class="delivery-zone__name">Крым</div>
                    <div class="delivery-zone__terms">2–4 рабочих дня. Стоимость рассчитывается по адресу.</div>
                </div>
                <div class="delivery-zone">
                    <div class="delivery-zone__name">Россия</div>
                    <div class="delivery-zone__terms">По тарифам и срокам выбранной ТК. Обычно 3–14 дней в зависимости от региона.</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Сборка -->
    <section class="delivery-assembly animate-on-scroll">
        <div class="container">
            <div class="delivery-assembly__inner">
                <div class="delivery-assembly__content">
                    <div class="delivery-assembly__badge">Сборка</div>
                    <h2 class="delivery-assembly__title">Профессиональная сборка на объекте</h2>
                    <p class="delivery-assembly__text">Собираем мебель на вашей территории: аккуратно, по инструкции, с проверкой качества. Стоимость сборки зависит от сложности и объёма — озвучим при заказе.</p>
                    <ul class="delivery-assembly__list">
                        <li>Сборка корпусной и мягкой мебели</li>
                        <li>Подъём на этаж при доставке</li>
                        <li>Утилизация упаковки по желанию</li>
                    </ul>
                    <a href="#contact-form" class="delivery-assembly__button">
                        <span>Заказать доставку и сборку</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
                <div class="delivery-assembly__visual">
                    <div class="delivery-assembly__card">
                        <div class="delivery-assembly__card-icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                            </svg>
                        </div>
                        <h3 class="delivery-assembly__card-title">Сборка под ключ</h3>
                        <p class="delivery-assembly__card-text">Рассчитаем стоимость доставки и сборки под ваш заказ. Оставьте заявку или позвоните нам.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Оплата -->
    <section class="delivery-payment animate-on-scroll">
        <div class="container">
            <div class="delivery-payment__header">
                <div class="delivery-payment__badge">Оплата</div>
                <h2 class="delivery-payment__title">Способы оплаты</h2>
            </div>
            <div class="delivery-payment__grid">
                <div class="delivery-payment__item">
                    <div class="delivery-payment__icon">Наличные / карта</div>
                    <p class="delivery-payment__text">При получении заказа курьеру или в шоуруме.</p>
                </div>
                <div class="delivery-payment__item">
                    <div class="delivery-payment__icon">Безналичный расчёт</div>
                    <p class="delivery-payment__text">Для юридических лиц и ИП — по счёту, с НДС и без НДС.</p>
                </div>
                <div class="delivery-payment__item">
                    <div class="delivery-payment__icon">Предоплата</div>
                    <p class="delivery-payment__text">Для заказов под производство или при отправке в другой город.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Форма / CTA -->
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
                            <input type="text" id="name" name="name" class="contact__input" placeholder="Ваше имя" required>
                            <span class="contact__input-border"></span>
                        </div>
                        <div class="contact__input-wrapper">
                            <input type="tel" id="phone" name="phone" class="contact__input" placeholder="+7 (___) ___-__-__" required>
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

                <div class="contact__benefits">
                    <div class="contact__benefit">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17L4 12"/></svg>
                        <span>Бесплатная консультация</span>
                    </div>
                    <div class="contact__benefit">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17L4 12"/></svg>
                        <span>Расчёт в день обращения</span>
                    </div>
                    <div class="contact__benefit">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17L4 12"/></svg>
                        <span>Гарантия качества</span>
                    </div>
                </div>

                <div class="contact__success" id="successMessage">
                    <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/><path d="M8 12l2 2 4-4"/>
                    </svg>
                    <div>
                        <h3>Спасибо за обращение!</h3>
                        <p>Наш менеджер свяжется с вами в ближайшее время</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
