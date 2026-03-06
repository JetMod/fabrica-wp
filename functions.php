<?php
/**
 * Функции темы ФАБРИКА интерьеров
 *
 * @package Fabrica
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once get_template_directory() . '/inc/cpt-product.php';
require_once get_template_directory() . '/inc/cpt-service.php';
require_once get_template_directory() . '/inc/cpt-project.php';

/**
 * Сброс правил перезаписи при активации темы (для CPT)
 */
function fabrica_rewrite_flush() {
    fabrica_register_product_cpt();
    fabrica_register_service_cpt();
    fabrica_register_project_cpt();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'fabrica_rewrite_flush');

/**
 * Подключение стилей и скриптов
 * Все стили и скрипты подключаются в одном месте — здесь
 */
function fabrica_enqueue_assets() {
    $theme_uri = get_template_directory_uri();
    $theme_path = get_template_directory();
    $version = defined('WP_DEBUG') && WP_DEBUG ? filemtime($theme_path . '/css/main.css') : '1.0';

    // ========== СТИЛИ ==========
    // main.css импортирует все остальные стили (style.css, header.css, hero.css и т.д.)
    wp_enqueue_style(
        'fabrica-main',
        $theme_uri . '/css/main.css',
        array(),
        $version
    );

    // ========== СКРИПТЫ (в footer, перед </body>) ==========
    // app.js — ES-модуль, основной файл (импортирует mobile-menu, header, hero-slider и т.д.)
    wp_enqueue_script(
        'fabrica-app',
        $theme_uri . '/js/app.js',
        array(),
        $version,
        true // in_footer
    );

    // main.js — fallback для старых браузеров без поддержки ES modules
    wp_enqueue_script(
        'fabrica-main',
        $theme_uri . '/js/main.js',
        array(),
        $version,
        true // in_footer
    );

    // Скрипт страницы услуг (фильтры, слайдер)
    if (is_page_template('templates/template-services.php')) {
        wp_enqueue_script(
            'fabrica-services-page',
            $theme_uri . '/js/services-page.js',
            array(),
            $version,
            true
        );
    }

    // Скрипт блога (синхронизация высоты карточек на главной)
    if (is_front_page()) {
        wp_enqueue_script(
            'fabrica-blog',
            $theme_uri . '/js/blog.js',
            array(),
            $version,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'fabrica_enqueue_assets');

/**
 * Добавляем type="module" и nomodule для скриптов
 */
function fabrica_script_loader_tag($tag, $handle, $src) {
    if ('fabrica-app' === $handle) {
        return '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    if ('fabrica-main' === $handle) {
        return '<script nomodule src="' . esc_url($src) . '" defer></script>';
    }
    return $tag;
}
add_filter('script_loader_tag', 'fabrica_script_loader_tag', 10, 3);

/**
 * Поддержка возможностей темы
 */
function fabrica_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'fabrica_theme_support');

/**
 * ACF: Options Page и Local JSON
 */
function fabrica_acf_init() {
    if (!function_exists('acf_add_options_page')) {
        return;
    }

    acf_add_options_page(array(
        'page_title' => 'Настройки главной страницы',
        'menu_title' => 'Главная страница',
        'menu_slug'  => 'acf-options-home',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ));
}
add_action('acf/init', 'fabrica_acf_init');

function fabrica_acf_json_save_point($path) {
    return get_template_directory() . '/acf';
}
add_filter('acf/settings/save_json', 'fabrica_acf_json_save_point');

function fabrica_acf_json_load_point($paths) {
    unset($paths[0]);
    $paths[] = get_template_directory() . '/acf';
    return $paths;
}
add_filter('acf/settings/load_json', 'fabrica_acf_json_load_point');

/**
 * URL страницы услуг (из ACF или страницы с шаблоном «Услуги»)
 */
function fabrica_get_services_page_url() {
    $url = function_exists('get_field') ? get_field('services_page_url', 'option') : '';
    if ($url) {
        return $url;
    }
    $pages = get_posts(array(
        'post_type'      => 'page',
        'posts_per_page' => 1,
        'meta_key'       => '_wp_page_template',
        'meta_value'     => 'templates/template-services.php',
    ));
    return $pages ? get_permalink($pages[0]) : home_url('/');
}

/**
 * URL страницы проектов (из ACF или страницы с шаблоном «Проекты»)
 */
function fabrica_get_projects_page_url() {
    $url = function_exists('get_field') ? get_field('projects_view_all_url', 'option') : '';
    if ($url) {
        return $url;
    }
    $pages = get_posts(array(
        'post_type'      => 'page',
        'posts_per_page' => 1,
        'meta_key'       => '_wp_page_template',
        'meta_value'     => 'templates/template-projects.php',
    ));
    return $pages ? get_permalink($pages[0]) : home_url('/');
}

/**
 * URL страницы «Дизайнерам»
 */
function fabrica_get_designers_page_url() {
    $pages = get_posts(array(
        'post_type'      => 'page',
        'posts_per_page' => 1,
        'meta_key'       => '_wp_page_template',
        'meta_value'     => 'templates/template-designers.php',
    ));
    return $pages ? get_permalink($pages[0]) : home_url('/');
}

/**
 * URL страницы «Бизнесу»
 */
function fabrica_get_business_page_url() {
    $pages = get_posts(array(
        'post_type'      => 'page',
        'posts_per_page' => 1,
        'meta_key'       => '_wp_page_template',
        'meta_value'     => 'templates/template-business.php',
    ));
    return $pages ? get_permalink($pages[0]) : home_url('/');
}

/**
 * URL страницы блога (из Настройки → Чтение → Страница записей)
 */
function fabrica_get_blog_page_url() {
    $page_id = (int) get_option('page_for_posts');
    return $page_id ? get_permalink($page_id) : home_url('/');
}

/**
 * Создание категорий блога по умолчанию
 */
function fabrica_create_default_blog_categories() {
    if (get_option('fabrica_blog_categories_created')) {
        return;
    }
    $categories = array(
        'guides'  => 'Гиды по выбору',
        'history' => 'История дизайна',
        'tips'    => 'Советы экспертов',
        'trends'  => 'Тренды',
    );
    foreach ($categories as $slug => $name) {
        if (!term_exists($slug, 'category')) {
            wp_insert_term($name, 'category', array('slug' => $slug));
        }
    }
    update_option('fabrica_blog_categories_created', true);
}
add_action('init', 'fabrica_create_default_blog_categories', 20);


add_filter('wpcf7_autop_or_not', '__return_false');