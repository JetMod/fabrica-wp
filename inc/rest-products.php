<?php
/**
 * REST API: продукты по ID для страницы избранного
 *
 * @package Fabrica
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action('rest_api_init', function() {
    register_rest_route('fabrica/v1', '/products', array(
        'methods'             => 'GET',
        'callback'            => 'fabrica_rest_products_by_ids',
        'permission_callback' => '__return_true',
        'args'                => array(
            'ids' => array(
                'required'          => false,
                'type'              => 'string',
                'sanitize_callback' => 'sanitize_text_field',
                'description'       => 'ID товаров через запятую (например: 1,2,3)',
            ),
        ),
    ));
});

function fabrica_rest_products_by_ids($request) {
    $ids_param = $request->get_param('ids');
    if (empty($ids_param)) {
        return rest_ensure_response(array());
    }

    $ids = array_filter(array_map('intval', explode(',', $ids_param)));
    if (empty($ids)) {
        return rest_ensure_response(array());
    }

    $posts = get_posts(array(
        'post_type'      => 'fabrica_product',
        'post__in'       => $ids,
        'posts_per_page' => -1,
        'orderby'        => 'post__in',
        'post_status'    => 'publish',
    ));

    $t = get_template_directory_uri();
    $products = array();

    foreach ($posts as $post) {
        $pid = (int) $post->ID;
        $img = function_exists('get_field') ? get_field('product_image', $pid) : null;
        $img_url = '';
        if (!empty($img) && is_array($img) && !empty($img['url'])) {
            $img_url = $img['url'];
        } elseif (has_post_thumbnail($pid)) {
            $img_url = get_the_post_thumbnail_url($pid, 'large');
        }
        if (empty($img_url)) {
            $img_url = $t . '/img/16.webp';
        }

        $price = (function_exists('get_field') ? get_field('product_price', $pid) : null) ?: 'По запросу';
        $price_old = function_exists('get_field') ? get_field('product_price_old', $pid) : null;
        $status = (function_exists('get_field') ? get_field('product_status', $pid) : null) ?: 'order';
        $badge = function_exists('get_field') ? get_field('product_badge', $pid) : null;
        $badge_text = '';
        if ($badge === 'trend') {
            $badge_text = 'Тренд';
        } elseif ($badge === 'final') {
            $badge_text = 'Финальная цена';
        }

        $products[] = array(
            'id'       => (string) $pid,
            'title'    => get_the_title($pid),
            'image'    => $img_url,
            'link'    => get_permalink($pid),
            'price'   => $price,
            'priceOld' => $price_old,
            'status'  => $status,
            'badge'   => $badge_text,
        );
    }

    return rest_ensure_response($products);
}
