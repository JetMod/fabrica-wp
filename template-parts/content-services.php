<?php
/**
 * Template part for displaying the services page content
 *
 * @package Fabrica
 */

if (!isset($t)) {
    $t = get_template_directory_uri();
}

?>
<main class="main" role="main" id="main-content">

    <!-- Hero секция -->
    <section class="services-hero">
        <div class="container">
            <div class="services-hero__content">
                <div class="services-hero__badge">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <polyline points="22 4 12 14.01 9 11.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Профессиональные услуги</span>
                </div>
                <h1 class="services-hero__title">Услуги дизайна интерьера и производства мебели в Симферополе и Крыму</h1>
                <p class="services-hero__subtitle">Полный спектр услуг от разработки концепции интерьера до производства мебели и оснащения объектов под ключ. Работаем с частными клиентами, дизайнерами и бизнесом по всему Крыму.</p>
                <div class="services-hero__stats">
                    <div class="services-hero__stat">
                        <div class="services-hero__stat-number">18+</div>
                        <div class="services-hero__stat-label">Видов услуг</div>
                    </div>
                    <div class="services-hero__stat">
                        <div class="services-hero__stat-number">100%</div>
                        <div class="services-hero__stat-label">Под ключ</div>
                    </div>
                    <div class="services-hero__stat">
                        <div class="services-hero__stat-number">Крым</div>
                        <div class="services-hero__stat-label">Работаем по всему региону</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Фильтры категорий -->
    <section class="services-filters">
        <div class="container">
            <div class="services-filters__wrapper">
                <button class="services-filter services-filter--active" data-category="all">
                    <span>Все услуги</span>
                </button>
                <button class="services-filter" data-category="design">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Дизайн</span>
                </button>
                <button class="services-filter" data-category="production">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Производство</span>
                </button>
                <button class="services-filter" data-category="equipment">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <polyline points="9 22 9 12 15 12 15 22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Оснащение</span>
                </button>
                <button class="services-filter" data-category="supply">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 6h18M16 10a4 4 0 0 1-8 0" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Поставка</span>
                </button>
                <button class="services-filter" data-category="service">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Сервис</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Список услуг -->
    <?php
    $services_query = new WP_Query(array(
        'post_type'      => 'fabrica_service',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order title',
        'order'          => 'ASC',
        'post_status'    => 'publish',
    ));
    ?>
    <section class="services-list">
        <div class="container">
            <div class="services-list__grid" id="servicesGrid">
                <?php
                if ($services_query->have_posts()) :
                    while ($services_query->have_posts()) :
                        $services_query->the_post();
                        set_query_var('args', array('service_id' => get_the_ID()));
                        get_template_part('template-parts/service-card-list');
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- CTA секция -->
    <section class="services-cta">
        <div class="container">
            <div class="services-cta__content">
                <h2 class="services-cta__title">Нужна консультация по услугам?</h2>
                <p class="services-cta__text">Свяжитесь с нами, и мы поможем выбрать оптимальное решение для вашего проекта в Симферополе и Крыму</p>
                <div class="services-cta__actions">
                    <a href="#contact-form" class="services-cta__button services-cta__button--primary">
                        <span>Получить консультацию</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="tel:+79785977442" class="services-cta__button services-cta__button--secondary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                        <span>+7 (978) 597-74-42</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/contact-form'); ?>

</main>
