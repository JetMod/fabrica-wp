<?php
/**
 * Контент страницы услуги (как в HTML-макете)
 *
 * @package Fabrica
 */

if (!defined('ABSPATH')) {
    return;
}

$service_id = get_the_ID();
$t = get_template_directory_uri();

// Hero image
$image_arr = get_field('service_image', $service_id);
$image_url = '';
if (!empty($image_arr) && is_array($image_arr) && !empty($image_arr['url'])) {
    $image_url = $image_arr['url'];
} elseif (has_post_thumbnail($service_id)) {
    $image_url = get_the_post_thumbnail_url($service_id, 'large');
}
if (empty($image_url)) {
    $image_url = $t . '/img/1.webp';
}

$hero_subtitle = get_field('service_hero_subtitle', $service_id);
if (empty($hero_subtitle) && has_excerpt($service_id)) {
    $hero_subtitle = get_the_excerpt($service_id);
}

$hero_meta = get_field('service_hero_meta', $service_id);
$hero_meta = is_array($hero_meta) ? $hero_meta : array();

$cta_text = get_field('service_cta_text', $service_id) ?: 'Получить консультацию';
$cta_url = get_field('service_cta_url', $service_id) ?: '#contact-form';

// SVG иконки для meta
$meta_icons = array(
    'location' => '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2"/>',
    'clock' => '<circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><polyline points="12 6 12 12 16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
    'check' => '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><polyline points="22 4 12 14.01 9 11.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
    'shield' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
    'ruble' => '<path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
);

// SVG иконки для преимуществ
$feature_icons = array(
    'check' => '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><polyline points="22 4 12 14.01 9 11.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
    'shield' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
    'users' => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
    'ruble' => '<path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
    'clock' => '<circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/><polyline points="12 6 12 12 16 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>',
    'location' => '<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2"/>',
);

$services_page_url = fabrica_get_services_page_url();
$projects_page_url = fabrica_get_projects_page_url();
?>

<!-- Hero -->
<section class="service-hero">
    <div class="service-hero__background">
        <div class="service-hero__image-wrapper">
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" class="service-hero__bg-image" loading="eager">
            <div class="service-hero__overlay"></div>
        </div>
    </div>
    <div class="container">
        <div class="service-hero__content">
            <div class="service-hero__badge">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Профессиональные услуги</span>
            </div>
            <h1 class="service-hero__title"><?php the_title(); ?></h1>
            <?php if ($hero_subtitle) : ?>
            <p class="service-hero__subtitle"><?php echo esc_html($hero_subtitle); ?></p>
            <?php endif; ?>
            <?php if (!empty($hero_meta)) : ?>
            <div class="service-hero__meta">
                <?php foreach ($hero_meta as $item) :
                    $icon_key = isset($item['icon']) ? $item['icon'] : 'check';
                    $icon_svg = isset($meta_icons[$icon_key]) ? $meta_icons[$icon_key] : $meta_icons['check'];
                    if (empty($item['text'])) continue;
                ?>
                <div class="service-hero__meta-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><?php echo $icon_svg; ?></svg>
                    <span><?php echo esc_html($item['text']); ?></span>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <div class="service-hero__actions">
                <a href="<?php echo esc_url($cta_url); ?>" class="service-hero__cta service-hero__cta--primary">
                    <span><?php echo esc_html($cta_text); ?></span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="#service-features" class="service-hero__cta service-hero__cta--secondary"><span>Узнать больше</span></a>
            </div>
        </div>
    </div>
</section>

<?php
$about_title = get_field('service_about_title', $service_id);
$about_content = get_field('service_about_content', $service_id);
if (empty($about_content) && get_post_field('post_content', $service_id)) {
    $about_content = apply_filters('the_content', get_post_field('post_content', $service_id));
}
if (empty($about_title) && $about_content) {
    $about_title = 'О нашей услуге «' . get_the_title($service_id) . '»';
}
if ($about_title || $about_content) :
?>
<section class="service-about">
    <div class="container">
        <div class="service-about__content">
            <?php if ($about_title) : ?>
            <h2 class="service-about__title"><?php echo esc_html($about_title); ?></h2>
            <?php endif; ?>
            <?php if ($about_content) : ?>
            <div class="service-about__text"><?php echo wp_kses_post($about_content); ?></div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
$features_title = get_field('service_features_title', $service_id) ?: 'Почему выбирают нас';
$features = get_field('service_features', $service_id);
$features = is_array($features) ? $features : array();
if (!empty($features)) :
?>
<section class="service-features" id="service-features">
    <div class="container">
        <h2 class="service-features__title"><?php echo esc_html($features_title); ?></h2>
        <div class="service-features__grid">
            <?php foreach ($features as $f) :
                if (empty($f['title']) && empty($f['text'])) continue;
                $icon_key = isset($f['icon']) ? $f['icon'] : 'check';
                $icon_svg = isset($feature_icons[$icon_key]) ? $feature_icons[$icon_key] : $feature_icons['check'];
            ?>
            <div class="service-feature">
                <div class="service-feature__icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><?php echo $icon_svg; ?></svg>
                </div>
                <h3 class="service-feature__title"><?php echo esc_html($f['title']); ?></h3>
                <?php if (!empty($f['text'])) : ?>
                <p class="service-feature__text"><?php echo esc_html($f['text']); ?></p>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
$process_title = get_field('service_process_title', $service_id) ?: 'Как мы работаем';
$steps = get_field('service_steps', $service_id);
$steps = is_array($steps) ? $steps : array();
if (!empty($steps)) :
?>
<section class="service-process">
    <div class="container">
        <h2 class="service-process__title"><?php echo esc_html($process_title); ?></h2>
        <div class="service-process__steps">
            <?php foreach ($steps as $i => $s) :
                if (empty($s['title']) && empty($s['text'])) continue;
                $num = str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT);
            ?>
            <div class="service-step">
                <div class="service-step__number"><?php echo esc_html($num); ?></div>
                <h3 class="service-step__title"><?php echo esc_html($s['title']); ?></h3>
                <?php if (!empty($s['text'])) : ?>
                <p class="service-step__text"><?php echo esc_html($s['text']); ?></p>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
$portfolio_title = get_field('service_portfolio_title', $service_id) ?: 'Примеры наших работ';
$portfolio_subtitle = get_field('service_portfolio_subtitle', $service_id);
$portfolio_ids = get_field('service_portfolio_projects', $service_id);
$portfolio_ids = is_array($portfolio_ids) ? $portfolio_ids : array();
if (empty($portfolio_ids)) {
    $pq = new WP_Query(array(
        'post_type'      => 'fabrica_project',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post_status'    => 'publish',
    ));
    $portfolio_ids = wp_list_pluck($pq->posts, 'ID');
    wp_reset_postdata();
}
if (!empty($portfolio_ids)) :
?>
<section class="service-portfolio">
    <div class="container">
        <h2 class="service-portfolio__title"><?php echo esc_html($portfolio_title); ?></h2>
        <?php if ($portfolio_subtitle) : ?>
        <p class="service-portfolio__subtitle"><?php echo esc_html($portfolio_subtitle); ?></p>
        <?php endif; ?>
        <div class="service-portfolio__grid">
            <?php foreach ($portfolio_ids as $pid) :
                $p_img = get_field('project_image', $pid);
                $p_img_url = (!empty($p_img['url'])) ? $p_img['url'] : get_the_post_thumbnail_url($pid, 'large');
                if (empty($p_img_url)) $p_img_url = $t . '/img/5.webp';
                $p_title = get_the_title($pid);
                $p_terms = get_the_terms($pid, 'project_category');
                $p_location = ($p_terms && !is_wp_error($p_terms)) ? $p_terms[0]->name . ', Крым' : 'Крым';
            ?>
            <a href="<?php echo esc_url(get_permalink($pid)); ?>" class="service-portfolio__item">
                <img src="<?php echo esc_url($p_img_url); ?>" alt="<?php echo esc_attr($p_title); ?>" class="service-portfolio__img" loading="lazy">
                <div class="service-portfolio__info">
                    <h3 class="service-portfolio__item-title"><?php echo esc_html($p_title); ?></h3>
                    <p class="service-portfolio__item-location"><?php echo esc_html($p_location); ?></p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <div class="service-portfolio__cta">
            <a href="<?php echo esc_url($projects_page_url); ?>" class="service-portfolio__link">Смотреть все проекты</a>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
$pricing_title = get_field('service_pricing_title', $service_id);
if (empty($pricing_title)) {
    $pricing_title = get_the_title($service_id) . ' в Симферополе';
}
$pricing_intro = get_field('service_pricing_intro', $service_id);
$pricing_description = get_field('service_pricing_description', $service_id);
$pricing_factors = get_field('service_pricing_factors', $service_id);
$pricing_factors = is_array($pricing_factors) ? $pricing_factors : array();
$show_pricing = true;
if ($show_pricing) :
?>
<section class="service-pricing">
    <div class="service-pricing__container">
        <div class="service-pricing__grid">
            <div class="service-pricing__left">
                <div class="service-pricing__badge">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Стоимость услуги</span>
                </div>
                <?php if ($pricing_title) : ?>
                <h2 class="service-pricing__title"><?php echo esc_html($pricing_title); ?></h2>
                <?php endif; ?>
                <?php if ($pricing_intro) : ?>
                <p class="service-pricing__intro"><?php echo esc_html($pricing_intro); ?></p>
                <?php endif; ?>
                <div class="service-pricing__description">
                    <?php if ($pricing_description) : ?>
                    <div><?php echo wp_kses_post($pricing_description); ?></div>
                    <?php endif; ?>
                    <?php if (!empty($pricing_factors)) : ?>
                    <div class="service-pricing__factors">
                        <h3>Что влияет на стоимость:</h3>
                        <div class="service-pricing__factors-grid">
                            <?php foreach ($pricing_factors as $pf) :
                                if (empty($pf['text'])) continue;
                            ?>
                            <div class="service-pricing__factor">
                                <div class="service-pricing__factor-icon"><?php echo esc_html($pf['icon'] ?: '📐'); ?></div>
                                <span><?php echo esc_html($pf['text']); ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php
                    $pricing_note = get_field('service_pricing_note', $service_id);
                    if ($pricing_note) :
                    ?>
                    <p class="service-pricing__note"><?php echo nl2br(esc_html($pricing_note)); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="service-pricing__right">
                <div class="service-pricing__cta-card">
                    <div class="service-pricing__cta-header">
                        <h3>Узнайте стоимость вашего проекта</h3>
                        <p>Получите бесплатную консультацию и расчёт стоимости</p>
                    </div>
                    <a href="#contact-form" class="service-pricing__cta-button">
                        <span>Узнать стоимость</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <div class="service-pricing__benefits">
                        <div class="service-pricing__benefit">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><?php echo $feature_icons['check']; ?></svg>
                            <div><strong>Индивидуальный расчёт</strong><span>Учитываем все особенности проекта</span></div>
                        </div>
                        <div class="service-pricing__benefit">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><?php echo $feature_icons['ruble']; ?></svg>
                            <div><strong>Прозрачные цены</strong><span>Без скрытых доплат и комиссий</span></div>
                        </div>
                        <div class="service-pricing__benefit">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><?php echo $feature_icons['shield']; ?></svg>
                            <div><strong>Гарантия качества</strong><span>Фиксируем стоимость в договоре</span></div>
                        </div>
                    </div>
                    <div class="service-pricing__guarantee">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><?php echo $feature_icons['check']; ?></svg>
                        <span>Бесплатная консультация и выезд на объект</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_template_part('template-parts/contact-form'); ?>

<?php
$faq_title = get_field('service_faq_title', $service_id);
$faq_items = get_field('service_faq', $service_id);
$faq_items = is_array($faq_items) ? $faq_items : array();
if (!empty($faq_items)) :
?>
<section class="service-faq">
    <div class="container">
        <h2 class="service-faq__title"><?php echo esc_html($faq_title ?: 'Часто задаваемые вопросы'); ?></h2>
        <div class="service-faq__list">
            <?php foreach ($faq_items as $i => $faq) :
                if (empty($faq['question']) && empty($faq['answer'])) continue;
                $num = str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT);
            ?>
            <div class="service-faq__item">
                <button class="service-faq__button" type="button" aria-expanded="false">
                    <span class="service-faq__number"><?php echo esc_html($num); ?></span>
                    <h3 class="service-faq__question"><?php echo esc_html($faq['question']); ?></h3>
                    <svg class="service-faq__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div class="service-faq__answer-wrapper">
                    <div class="service-faq__answer-content">
                        <p class="service-faq__answer"><?php echo nl2br(esc_html($faq['answer'])); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
