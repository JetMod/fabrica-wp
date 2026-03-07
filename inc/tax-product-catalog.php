<?php
/**
 * Таксономия: Каталог товаров
 * Позволяет привязывать товары к каталогам (Столы, Стулья, Декор и т.д.)
 *
 * @package Fabrica
 */

if (!defined('ABSPATH')) {
    exit;
}

function fabrica_register_product_catalog_taxonomy() {
    $labels = array(
        'name'              => 'Каталоги',
        'singular_name'     => 'Каталог',
        'search_items'      => 'Искать каталоги',
        'all_items'         => 'Все каталоги',
        'parent_item'       => 'Родительский каталог',
        'parent_item_colon' => 'Родительский каталог:',
        'edit_item'         => 'Редактировать каталог',
        'update_item'       => 'Обновить каталог',
        'add_new_item'      => 'Добавить каталог',
        'new_item_name'     => 'Новый каталог',
        'menu_name'         => 'Каталоги',
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud'     => false,
        'rewrite'           => array('slug' => 'catalog', 'with_front' => false),
        'query_var'         => true,
    );

    register_taxonomy('product_catalog', array('fabrica_product'), $args);
}
add_action('init', 'fabrica_register_product_catalog_taxonomy', 15);
