<?php
/**
 * Custom Post Type: Услуга (Service)
 * Taxonomy: Категория услуги (service_category)
 *
 * @package Fabrica
 */

if (!defined('ABSPATH')) {
    exit;
}

function fabrica_register_service_cpt() {
    $labels = array(
        'name'               => 'Услуги',
        'singular_name'      => 'Услуга',
        'menu_name'          => 'Услуги',
        'add_new'            => 'Добавить услугу',
        'add_new_item'       => 'Добавить новую услугу',
        'edit_item'          => 'Редактировать услугу',
        'new_item'           => 'Новая услуга',
        'view_item'          => 'Посмотреть услугу',
        'search_items'       => 'Искать услуги',
        'not_found'          => 'Услуги не найдены',
        'not_found_in_trash' => 'В корзине услуг нет',
        'all_items'          => 'Все услуги',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'service', 'with_front' => false),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-admin-tools',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('fabrica_service', $args);
}
add_action('init', 'fabrica_register_service_cpt');

function fabrica_register_service_category_taxonomy() {
    $labels = array(
        'name'          => 'Категории услуг',
        'singular_name' => 'Категория услуги',
        'search_items'  => 'Искать категории',
        'all_items'     => 'Все категории',
        'edit_item'     => 'Редактировать категорию',
        'add_new_item'  => 'Добавить категорию',
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'rewrite'           => array('slug' => 'service-category'),
        'show_admin_column' => true,
    );

    register_taxonomy('service_category', array('fabrica_service'), $args);
}
add_action('init', 'fabrica_register_service_category_taxonomy');

/**
 * Создание категорий услуг по умолчанию (для фильтров)
 */
function fabrica_create_default_service_categories() {
    if (get_option('fabrica_service_categories_created')) {
        return;
    }
    $categories = array(
        'design'     => 'Дизайн',
        'production' => 'Производство',
        'equipment'  => 'Оснащение',
        'supply'     => 'Поставка',
        'service'    => 'Сервис',
    );
    foreach ($categories as $slug => $name) {
        if (!term_exists($slug, 'service_category')) {
            wp_insert_term($name, 'service_category', array('slug' => $slug));
        }
    }
    update_option('fabrica_service_categories_created', true);
}
add_action('init', 'fabrica_create_default_service_categories', 20);
