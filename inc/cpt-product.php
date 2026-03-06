<?php
/**
 * Custom Post Type: Товар (Product)
 *
 * @package Fabrica
 */

if (!defined('ABSPATH')) {
    exit;
}

function fabrica_register_product_cpt() {
    $labels = array(
        'name'               => 'Товары',
        'singular_name'      => 'Товар',
        'menu_name'          => 'Товары',
        'add_new'            => 'Добавить товар',
        'add_new_item'       => 'Добавить новый товар',
        'edit_item'          => 'Редактировать товар',
        'new_item'           => 'Новый товар',
        'view_item'          => 'Посмотреть товар',
        'search_items'       => 'Искать товары',
        'not_found'          => 'Товары не найдены',
        'not_found_in_trash' => 'В корзине товаров нет',
        'all_items'          => 'Все товары',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'product', 'with_front' => false),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-cart',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('fabrica_product', $args);
}
add_action('init', 'fabrica_register_product_cpt');
