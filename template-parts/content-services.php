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

    <?php
    $services_count = wp_count_posts('fabrica_service');
    $services_count = isset($services_count->publish) ? (int) $services_count->publish : 0;
    ?>
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
                        <div class="services-hero__stat-number"><?php echo esc_html($services_count > 0 ? $services_count . '+' : '—'); ?></div>
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
                        $sid = (int) get_the_ID();
                        $spost = get_post($sid);
                        if (!$spost || $spost->post_type !== 'fabrica_service') {
                            continue;
                        }
                        $stitle = get_the_title($sid);
                        $slink = get_permalink($sid);
                        $sexcerpt = has_excerpt($sid) ? get_the_excerpt($sid) : '';
                        if (empty($sexcerpt) && function_exists('get_field')) {
                            $h = get_field('service_hero_subtitle', $sid);
                            if (!empty($h)) {
                                $sexcerpt = $h;
                            } else {
                                $ab = get_field('service_about_content', $sid);
                                $sexcerpt = !empty($ab) ? wp_trim_words(wp_strip_all_tags($ab), 25) : wp_trim_words(wp_strip_all_tags(get_post_field('post_content', $sid)), 25);
                            }
                        }
                        $sterms = get_the_terms($sid, 'service_category');
                        $scat_slug = ($sterms && !is_wp_error($sterms)) ? $sterms[0]->slug : 'design';
                        $scat_name = ($sterms && !is_wp_error($sterms)) ? $sterms[0]->name : 'Дизайн';
                        $simg = function_exists('get_field') ? get_field('service_image', $sid) : null;
                        $simg_url = '';
                        if (!empty($simg) && is_array($simg) && !empty($simg['url'])) {
                            $simg_url = $simg['url'];
                        } elseif (has_post_thumbnail($sid)) {
                            $simg_url = get_the_post_thumbnail_url($sid, 'large');
                        }
                        if (empty($simg_url)) {
                            $simg_url = get_template_directory_uri() . '/img/1.webp';
                        }
                        ?>
                        <a href="<?php echo esc_url($slink); ?>" class="service-card" data-category="<?php echo esc_attr($scat_slug); ?>">
                            <div class="service-card__image">
                                <img src="<?php echo esc_url($simg_url); ?>" alt="<?php echo esc_attr($stitle); ?>" class="service-card__img">
                                <div class="service-card__overlay"></div>
                                <div class="service-card__badge"><?php echo esc_html($scat_name); ?></div>
                            </div>
                            <div class="service-card__content">
                                <h3 class="service-card__title"><?php echo esc_html($stitle); ?></h3>
                                <?php if ($sexcerpt) : ?>
                                <p class="service-card__text"><?php echo esc_html($sexcerpt); ?></p>
                                <?php endif; ?>
                                <div class="service-card__footer">
                                    <span class="service-card__link">Подробнее</span>
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p class="services-list__empty">Услуги пока не добавлены. <a href="<?php echo esc_url(admin_url('post-new.php?post_type=fabrica_service')); ?>">Добавить первую услугу</a></p>
                    <?php
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
