<?php
/**
 * Функции темы ФАБРИКА интерьеров
 *
 * @package Fabrica
 */

if (!defined('ABSPATH')) {
    exit;
}

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
