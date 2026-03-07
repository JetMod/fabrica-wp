<?php
/**
 * Карточка услуги для блока на главной (слайдер)
 *
 * @package Fabrica
 * Использование: get_template_part('template-parts/service-card', null, array('service_id' => $id));
 */

if (!defined('ABSPATH')) {
    return;
}

// Поддержка args из get_template_part(..., array('service_id' => $id)) или set_query_var('args', ...)
$args = isset($args) ? (array) $args : (array) get_query_var('args', array());
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
if (empty($excerpt) && function_exists('get_field')) {
    $hero_subtitle = get_field('service_hero_subtitle', $service_id);
    if (!empty($hero_subtitle)) {
        $excerpt = $hero_subtitle;
    } else {
        $about = get_field('service_about_content', $service_id);
        if (!empty($about)) {
            $excerpt = wp_trim_words(wp_strip_all_tags($about), 20);
        } elseif (get_post_field('post_content', $service_id)) {
            $excerpt = wp_trim_words(wp_strip_all_tags(get_post_field('post_content', $service_id)), 20);
        }
    }
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
<a href="<?php echo esc_url($link); ?>" class="services__card services__card--link">
    <div class="services__card-image">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" class="services__img">
        <div class="services__card-overlay"></div>
    </div>
    <div class="services__card-content">
        <h4 class="services__card-title"><?php echo esc_html($title); ?></h4>
        <?php if ($excerpt) : ?>
        <p class="services__card-text"><?php echo esc_html($excerpt); ?></p>
        <?php endif; ?>
    </div>
</a>
