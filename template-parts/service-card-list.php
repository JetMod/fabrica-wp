<?php
/**
 * Карточка услуги для страницы «Услуги» (сетка с фильтрами)
 *
 * @package Fabrica
 */

if (!defined('ABSPATH')) {
    return;
}

$args = (array) get_query_var('args', array());
$service_id = isset($args['service_id']) ? (int) $args['service_id'] : 0;
if (!$service_id) {
    return;
}

$post = get_post($service_id);
if (!$post || $post->post_type !== 'fabrica_service') {
    return;
}

$title = get_the_title($service_id);
$link = get_permalink($service_id);
$excerpt = has_excerpt($service_id) ? get_the_excerpt($service_id) : '';

$terms = get_the_terms($service_id, 'service_category');
$category_slug = 'design';
$category_name = 'Дизайн';
if ($terms && !is_wp_error($terms)) {
    $category_slug = $terms[0]->slug;
    $category_name = $terms[0]->name;
}

$image_arr = get_field('service_image', $service_id);
$image_url = '';
if (!empty($image_arr) && is_array($image_arr) && !empty($image_arr['url'])) {
    $image_url = $image_arr['url'];
} elseif (has_post_thumbnail($service_id)) {
    $image_url = get_the_post_thumbnail_url($service_id, 'large');
}
if (empty($image_url)) {
    $image_url = get_template_directory_uri() . '/img/1.webp';
}
?>
<a href="<?php echo esc_url($link); ?>" class="service-card" data-category="<?php echo esc_attr($category_slug); ?>">
    <div class="service-card__image">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" class="service-card__img">
        <div class="service-card__overlay"></div>
        <div class="service-card__badge"><?php echo esc_html($category_name); ?></div>
    </div>
    <div class="service-card__content">
        <h3 class="service-card__title"><?php echo esc_html($title); ?></h3>
        <?php if ($excerpt) : ?>
        <p class="service-card__text"><?php echo esc_html($excerpt); ?></p>
        <?php endif; ?>
        <div class="service-card__footer">
            <span class="service-card__link">Подробнее</span>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
        </div>
    </div>
</a>
