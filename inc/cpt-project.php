<?php
/**
 * Custom Post Type: Проект (Project)
 * Taxonomy: Категория проекта (project_category)
 *
 * @package Fabrica
 */

if (!defined('ABSPATH')) {
    exit;
}

function fabrica_register_project_cpt() {
    $labels = array(
        'name'               => 'Проекты',
        'singular_name'      => 'Проект',
        'menu_name'          => 'Проекты',
        'add_new'            => 'Добавить проект',
        'add_new_item'       => 'Добавить новый проект',
        'edit_item'          => 'Редактировать проект',
        'new_item'           => 'Новый проект',
        'view_item'          => 'Посмотреть проект',
        'search_items'       => 'Искать проекты',
        'not_found'          => 'Проекты не найдены',
        'not_found_in_trash' => 'В корзине проектов нет',
        'all_items'          => 'Все проекты',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'project', 'with_front' => false),
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_position'       => 7,
        'menu_icon'           => 'dashicons-portfolio',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'        => true,
    );

    register_post_type('fabrica_project', $args);
}
add_action('init', 'fabrica_register_project_cpt');

function fabrica_register_project_category_taxonomy() {
    $labels = array(
        'name'          => 'Категории проектов',
        'singular_name' => 'Категория проекта',
        'search_items'  => 'Искать категории',
        'all_items'     => 'Все категории',
        'edit_item'     => 'Редактировать категорию',
        'add_new_item'  => 'Добавить категорию',
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'rewrite'           => array('slug' => 'project-category'),
        'show_admin_column' => true,
    );

    register_taxonomy('project_category', array('fabrica_project'), $args);
}
add_action('init', 'fabrica_register_project_category_taxonomy');

/**
 * Создание категорий проектов по умолчанию
 */
function fabrica_create_default_project_categories() {
    if (get_option('fabrica_project_categories_created')) {
        return;
    }
    $categories = array(
        'private-house'   => 'Частный дом',
        'apartments'      => 'Апартаменты',
        'apartment'       => 'Квартира',
        'horeca'          => 'Общепит',
        'hotel'           => 'Гостиничный номер',
        'commercial'      => 'Коммерческое пространство',
        'retail'          => 'Торговое пространство',
    );
    foreach ($categories as $slug => $name) {
        if (!term_exists($slug, 'project_category')) {
            wp_insert_term($name, 'project_category', array('slug' => $slug));
        }
    }
    update_option('fabrica_project_categories_created', true);
}
add_action('init', 'fabrica_create_default_project_categories', 20);
