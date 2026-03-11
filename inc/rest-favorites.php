<?php
/**
 * REST API: эндпоинт для получения товаров по ID (страница «Избранное»)
 *
 * @package Fabrica
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Регистрация REST API эндпоинта
 */
function fabrica_register_favorites_rest_route() {
    register_rest_route('fabrica/v1', '/favorites-products', array(
        'methods'             => WP_REST_Server::READABLE,
        'callback'            => 'fabrica_rest_favorites_products',
        'permission_callback' => '__return_true',
        'args'                => array(
            'ids' => array(
                'required'          => true,
                'type'              => 'string',
                'description'       => 'ID товаров через запятую',
                'sanitize_callback' => 'sanitize_text_field',
            ),
        ),
    ));
}
add_action('rest_api_init', 'fabrica_register_favorites_rest_route');

/**
 * Callback: возвращает массив товаров по ID
 *
 * @param WP_REST_Request $request
 * @return WP_REST_Response|WP_Error
 */
function fabrica_rest_favorites_products($request) {
    $ids_param = $request->get_param('ids');
    if (empty($ids_param)) {
        return new WP_REST_Response(array(), 200);
    }

    $ids = array_map('absint', array_filter(explode(',', $ids_param)));
    $ids = array_unique($ids);
    if (empty($ids)) {
        return new WP_REST_Response(array(), 200);
    }

    $products = array();
    foreach ($ids as $product_id) {
        $post = get_post($product_id);
        if (!$post || $post->post_type !== 'fabrica_product' || $post->post_status !== 'publish') {
            continue;
        }

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

        $price = get_field('product_price', $product_id) ?: '';
        $price_old = get_field('product_price_old', $product_id) ?: '';
        if (empty($price)) {
            $price = 'По запросу';
        }
        $status = get_field('product_status', $product_id) ?: 'order';
        $badge = get_field('product_badge', $product_id) ?: '';

        $badge_text = '';
        if ($badge === 'final') {
            $badge_text = 'Финальная цена';
        } elseif ($badge === 'trend') {
            $badge_text = 'Тренд';
        }

        $products[] = array(
            'id'       => (string) $product_id,
            'title'    => get_the_title($product_id),
            'link'     => get_permalink($product_id),
            'image'    => $image_url,
            'price'    => $price,
            'priceOld' => $price_old,
            'status'   => $status === 'available' ? 'available' : 'order',
            'badge'    => $badge_text,
        );
    }

    return new WP_REST_Response($products, 200);
}
