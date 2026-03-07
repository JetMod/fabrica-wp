<?php
/**
 * Карточка товара
 *
 * @package Fabrica
 * Использование: get_template_part('template-parts/product-card', null, array('product_id' => $id));
 */

if (!defined('ABSPATH')) {
    return;
}

// Поддержка args из get_template_part(..., array('product_id' => $id)) или set_query_var('args', ...)
$args = isset($args) ? (array) $args : (array) get_query_var('args', array());
$product_id = isset($args['product_id']) ? (int) $args['product_id'] : 0;
if (!$product_id) {
    return;
}

$post = get_post($product_id);
if (!$post || $post->post_type !== 'fabrica_product') {
    return;
}

$title = get_the_title($product_id);
$link = get_permalink($product_id);

// Изображение: ACF или миниатюра
$image_arr = get_field('product_image', $product_id);
$image_url = '';
if (!empty($image_arr) && is_array($image_arr) && !empty($image_arr['url'])) {
    $image_url = $image_arr['url'];
} elseif (has_post_thumbnail($product_id)) {
    $image_url = get_the_post_thumbnail_url($product_id, 'large');
}
if (empty($image_url)) {
    $image_url = get_template_directory_uri() . '/img/16.webp';
}

// Цены и статус
$price = get_field('product_price', $product_id) ?: '';
$price_old = get_field('product_price_old', $product_id) ?: '';
if (empty($price)) {
    $price = 'По запросу';
}
$status = get_field('product_status', $product_id) ?: 'order';
$badge = get_field('product_badge', $product_id) ?: '';

$status_class = ($status === 'available') ? 'product-card__status--available' : 'product-card__status--order';
$status_text = ($status === 'available') ? 'В наличии' : 'Под заказ';

$badge_class = '';
$badge_text = '';
if ($badge === 'final') {
    $badge_class = '';
    $badge_text = 'Финальная цена';
} elseif ($badge === 'trend') {
    $badge_class = ' product-card__badge--trend';
    $badge_text = 'Тренд';
}

$heart_svg = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/></svg>';
$request_svg = '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 4h16v12H2V4zm0 0l8 5 8-5M2 16V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>
<a href="<?php echo esc_url($link); ?>" class="product-card" data-product-id="<?php echo (int) $product_id; ?>">
    <div class="product-card__image">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" class="product-card__img">
        <button type="button" class="product-card__favorite" aria-label="В избранное" onclick="event.preventDefault(); event.stopPropagation();">
            <?php echo $heart_svg; ?>
        </button>
        <?php if ($badge_text) : ?>
        <div class="product-card__badge<?php echo esc_attr($badge_class); ?>"><?php echo esc_html($badge_text); ?></div>
        <?php endif; ?>
    </div>
    <div class="product-card__info">
        <h3 class="product-card__title"><?php echo esc_html($title); ?></h3>
        <div class="product-card__status <?php echo esc_attr($status_class); ?>"><?php echo esc_html($status_text); ?></div>
        <div class="product-card__footer">
            <div class="product-card__price">
                <?php if ($price) : ?>
                <span class="product-card__price-current"><?php echo esc_html($price); ?></span>
                <?php endif; ?>
                <?php if ($price_old) : ?>
                <span class="product-card__price-old"><?php echo esc_html($price_old); ?></span>
                <?php endif; ?>
            </div>
            <button type="button" class="product-card__request" aria-label="Узнать цену" data-callback-modal onclick="event.preventDefault(); event.stopPropagation();">
                <?php echo $request_svg; ?>
            </button>
        </div>
    </div>
</a>
