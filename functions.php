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
require_once get_template_directory() . '/inc/tax-product-catalog.php';
require_once get_template_directory() . '/inc/rest-favorites.php';
 
/**   
 * Сброс правил перезаписи при активации темы (для CPT и таксономий)
 */
function fabrica_rewrite_flush() {
    fabrica_register_product_cpt();
    fabrica_register_product_catalog_taxonomy();
    fabrica_register_service_cpt();
    fabrica_register_project_cpt();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'fabrica_rewrite_flush');

/**
 * Скрываем стандартный блок «Каталоги» — выбор через ACF в форме товара
 */
function fabrica_remove_product_catalog_metabox() {
    remove_meta_box('product_catalogdiv', 'fabrica_product', 'side');
}
add_action('admin_menu', 'fabrica_remove_product_catalog_metabox', 99);

/**
 * Скрываем стандартный блок «Категории услуг» — выбор только через ACF (вкладка «Карточка»)
 */
function fabrica_remove_service_category_metabox() {
    remove_meta_box('service_categorydiv', 'fabrica_service', 'side');
}
add_action('admin_menu', 'fabrica_remove_service_category_metabox', 99);

/**
 * Скрываем стандартный блок «Категории проектов» — выбор только через ACF
 */
function fabrica_remove_project_category_metabox() {
    remove_meta_box('project_categorydiv', 'fabrica_project', 'side');
}
add_action('admin_menu', 'fabrica_remove_project_category_metabox', 99);

/**
 * Хук при сохранении услуги — сброс кэша страницы услуг для немедленного отображения
 */
function fabrica_service_saved_hook($post_id) {
    if (get_post_type($post_id) !== 'fabrica_service') {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    do_action('fabrica_service_saved', $post_id);

    // Сброс кэша для популярных плагинов (страница услуг обновится сразу)
    if (function_exists('rocket_clean_domain')) {
        rocket_clean_domain();
    }
    if (function_exists('w3tc_flush_all')) {
        w3tc_flush_all();
    }
    if (class_exists('LiteSpeed_Cache_API') && method_exists('LiteSpeed_Cache_API', 'purge_all')) {
        LiteSpeed_Cache_API::purge_all();
    }
}
add_action('save_post', 'fabrica_service_saved_hook');

/**
 * Сброс кэша при сохранении страницы услуг
 */
function fabrica_services_page_saved_hook($post_id) {
    if (get_post_type($post_id) !== 'page') {
        return;
    }
    if (get_page_template_slug($post_id) !== 'templates/template-services.php') {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (function_exists('rocket_clean_domain')) {
        rocket_clean_domain();
    }
    if (function_exists('w3tc_flush_all')) {
        w3tc_flush_all();
    }
    if (class_exists('LiteSpeed_Cache_API') && method_exists('LiteSpeed_Cache_API', 'purge_all')) {
        LiteSpeed_Cache_API::purge_all();
    }
}
add_action('save_post', 'fabrica_services_page_saved_hook');

/**
 * Сброс кэша при сохранении страницы доставки
 */
function fabrica_delivery_page_saved_hook($post_id) {
    if (get_post_type($post_id) !== 'page') {
        return;
    }
    if (get_page_template_slug($post_id) !== 'templates/template-delivery.php') {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (function_exists('rocket_clean_domain')) {
        rocket_clean_domain();
    }
    if (function_exists('w3tc_flush_all')) {
        w3tc_flush_all();
    }
    if (class_exists('LiteSpeed_Cache_API') && method_exists('LiteSpeed_Cache_API', 'purge_all')) {
        LiteSpeed_Cache_API::purge_all();
    }
}
add_action('save_post', 'fabrica_delivery_page_saved_hook');

/**
 * Сброс кэша при сохранении страницы «Бизнесу»
 */
function fabrica_business_page_saved_hook($post_id) {
    if (get_post_type($post_id) !== 'page') {
        return;
    }
    if (get_page_template_slug($post_id) !== 'templates/template-business.php') {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (function_exists('rocket_clean_domain')) {
        rocket_clean_domain();
    }
    if (function_exists('w3tc_flush_all')) {
        w3tc_flush_all();
    }
    if (class_exists('LiteSpeed_Cache_API') && method_exists('LiteSpeed_Cache_API', 'purge_all')) {
        LiteSpeed_Cache_API::purge_all();
    }
}
add_action('save_post', 'fabrica_business_page_saved_hook');

/**
 * Сброс кэша при сохранении страницы «Дизайнерам»
 */
function fabrica_designers_page_saved_hook($post_id) {
    if (get_post_type($post_id) !== 'page') {
        return;
    }
    if (get_page_template_slug($post_id) !== 'templates/template-designers.php') {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (function_exists('rocket_clean_domain')) {
        rocket_clean_domain();
    }
    if (function_exists('w3tc_flush_all')) {
        w3tc_flush_all();
    }
    if (class_exists('LiteSpeed_Cache_API') && method_exists('LiteSpeed_Cache_API', 'purge_all')) {
        LiteSpeed_Cache_API::purge_all();
    }
}
add_action('save_post', 'fabrica_designers_page_saved_hook');

/**
 * Сброс кэша при сохранении страницы «Проекты»
 */
function fabrica_projects_page_saved_hook($post_id) {
    if (get_post_type($post_id) !== 'page') {
        return;
    }
    if (get_page_template_slug($post_id) !== 'templates/template-projects.php') {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (function_exists('rocket_clean_domain')) {
        rocket_clean_domain();
    }
    if (function_exists('w3tc_flush_all')) {
        w3tc_flush_all();
    }
    if (class_exists('LiteSpeed_Cache_API') && method_exists('LiteSpeed_Cache_API', 'purge_all')) {
        LiteSpeed_Cache_API::purge_all();
    }
}
add_action('save_post', 'fabrica_projects_page_saved_hook');

/**
 * Сброс кэша при сохранении страницы «Избранное»
 */
function fabrica_favorites_page_saved_hook($post_id) {
    if (get_post_type($post_id) !== 'page') {
        return;
    }
    if (get_page_template_slug($post_id) !== 'templates/template-favorites.php') {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (function_exists('rocket_clean_domain')) {
        rocket_clean_domain();
    }
    if (function_exists('w3tc_flush_all')) {
        w3tc_flush_all();
    }
    if (class_exists('LiteSpeed_Cache_API') && method_exists('LiteSpeed_Cache_API', 'purge_all')) {
        LiteSpeed_Cache_API::purge_all();
    }
}
add_action('save_post', 'fabrica_favorites_page_saved_hook');

/**
 * Сброс кэша при сохранении юридической страницы
 */
function fabrica_legal_page_saved_hook($post_id) {
    if (get_post_type($post_id) !== 'page') {
        return;
    }
    if (get_page_template_slug($post_id) !== 'templates/template-legal.php') {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (function_exists('rocket_clean_domain')) {
        rocket_clean_domain();
    }
    if (function_exists('w3tc_flush_all')) {
        w3tc_flush_all();
    }
    if (class_exists('LiteSpeed_Cache_API') && method_exists('LiteSpeed_Cache_API', 'purge_all')) {
        LiteSpeed_Cache_API::purge_all();
    }
}
add_action('save_post', 'fabrica_legal_page_saved_hook');

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

    // Скрипт страницы товара (галерея)
    if (is_singular('fabrica_product')) {
        wp_enqueue_script(
            'fabrica-product',
            $theme_uri . '/js/product.js',
            array(),
            $version,
            true
        );
    }

    // Скрипт страницы «Избранное»
    if (is_page_template('templates/template-favorites.php')) {
        wp_enqueue_script(
            'fabrica-favorites-page',
            $theme_uri . '/js/favorites-page.js',
            array(),
            $version,
            true
        );
        wp_localize_script('fabrica-favorites-page', 'fabricaFavorites', array(
            'restUrl' => rest_url('fabrica/v1/favorites-products'),
            'nonce'   => wp_create_nonce('wp_rest'),
        ));
    }
}
add_action('wp_enqueue_scripts', 'fabrica_enqueue_assets');

/**
 * Добавляем type="module" и nomodule для скриптов
 */
function fabrica_script_loader_tag($tag, $handle, $src) {
    if ('fabrica-app' === $handle || 'fabrica-favorites-page' === $handle) {
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
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));
}
add_action('after_setup_theme', 'fabrica_theme_support');

/**
 * Поиск: включаем в результаты товары, услуги, проекты и страницы
 */
function fabrica_search_include_cpt($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_search()) {
        $query->set('post_type', array('post', 'page', 'fabrica_product', 'fabrica_service', 'fabrica_project'));
    }
}
add_action('pre_get_posts', 'fabrica_search_include_cpt');

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

    acf_add_options_page(array(
        'page_title' => 'Header и Футер',
        'menu_title' => 'Header и Футер',
        'menu_slug'  => 'acf-options-footer',
        'capability' => 'edit_posts',
        'icon_url'   => 'dashicons-editor-kitchensink',
    ));

    acf_add_options_page(array(
        'page_title' => 'Юридическая информация',
        'menu_title' => 'Юридическая информация',
        'menu_slug'  => 'acf-options-legal',
        'capability' => 'edit_posts',
        'icon_url'   => 'dashicons-media-document',
    ));

    acf_add_options_page(array(
        'page_title' => 'Настройки блога',
        'menu_title' => 'Блог',
        'menu_slug'  => 'acf-options-blog',
        'capability' => 'edit_posts',
        'icon_url'   => 'dashicons-edit',
    ));

    acf_add_options_page(array(
        'page_title' => 'Настройки поиска',
        'menu_title' => 'Поиск',
        'menu_slug'  => 'acf-options-search',
        'capability' => 'edit_posts',
        'icon_url'   => 'dashicons-search',
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
 * URL страницы «О нас» (office)
 */
function fabrica_get_office_page_url() {
    $pages = get_posts(array(
        'post_type'      => 'page',
        'posts_per_page' => 1,
        'meta_key'       => '_wp_page_template',
        'meta_value'     => 'templates/template-office.php',
    ));
    return $pages ? get_permalink($pages[0]) : home_url('/');
}

/**
 * URL страницы «Доставка»
 */
function fabrica_get_delivery_page_url() {
    $pages = get_posts(array(
        'post_type'      => 'page',
        'posts_per_page' => 1,
        'meta_key'       => '_wp_page_template',
        'meta_value'     => 'templates/template-delivery.php',
    ));
    return $pages ? get_permalink($pages[0]) : home_url('/');
}

/**
 * Получить подкатегории для пункта меню каталога (по имени или slug)
 *
 * @param string $label Название категории (Мебель, Посуда, Декор, Horeca и т.д.)
 * @param array  $fallback Fallback-пункты если категория нет или пуста
 * @return array{terms: array, use_fallback: bool, parent_url: string|null}
 */
function fabrica_get_subcategories_for_menu($label, $fallback = array()) {
    $term = get_term_by('name', $label, 'product_catalog');
    if (!$term || is_wp_error($term)) {
        $slug = sanitize_title($label);
        $term = get_term_by('slug', $slug, 'product_catalog');
    }
    $subs = array();
    $use_fallback = false;
    $parent_url = null;
    if ($term && !is_wp_error($term)) {
        $parent_link = get_term_link($term);
        if (!is_wp_error($parent_link)) {
            $parent_url = $parent_link;
        }
        $subs = get_terms(array(
            'taxonomy'   => 'product_catalog',
            'hide_empty' => false,
            'parent'     => (int) $term->term_id,
            'number'     => 12,
        ));
        if (is_wp_error($subs)) {
            $subs = array();
        }
    }
    if (empty($subs) && !empty($fallback)) {
        $catalog_url = fabrica_get_catalog_page_url();
        $resolved = array();
        foreach ($fallback as $item) {
            $name = is_object($item) ? $item->name : ($item['name'] ?? '');
            $slug = is_object($item) ? $item->slug : ($item['slug'] ?? sanitize_title($name));
            $term_by_slug = get_term_by('slug', $slug, 'product_catalog');
            if ($term_by_slug && !is_wp_error($term_by_slug)) {
                $link = get_term_link($term_by_slug);
                $link = !is_wp_error($link) ? $link : $catalog_url;
                $resolved[] = (object) array('name' => $term_by_slug->name, 'slug' => $term_by_slug->slug, 'link' => $link);
            } else {
                $link = home_url('/catalog/' . $slug . '/');
                $resolved[] = (object) array('name' => $name, 'slug' => $slug, 'link' => $link);
            }
        }
        $subs = $resolved;
        $use_fallback = true;
    }
    return array('terms' => $subs, 'use_fallback' => $use_fallback, 'parent_url' => $parent_url);
}

/**
 * URL категории каталога по названию (для меню, футера)
 * Если категория существует — возвращает ссылку на неё, иначе — на главную каталога.
 */
function fabrica_get_category_url($label) {
    $term = get_term_by('name', $label, 'product_catalog');
    if (!$term || is_wp_error($term)) {
        $term = get_term_by('slug', sanitize_title($label), 'product_catalog');
    }
    if ($term && !is_wp_error($term)) {
        $link = get_term_link($term);
        if (!is_wp_error($link)) {
            return $link;
        }
    }
    return fabrica_get_catalog_page_url();
}

/**
 * Реквизиты компании (ИП) для юридических страниц
 * Можно переопределить через ACF options
 *
 * @return array
 */
function fabrica_get_company_info() {
    $defaults = array(
        'legal_name'   => 'ИП Османов Эскендер Сейранович',
        'inn'          => '910906142735',
        'ogrnip'       => '315910200053599',
        'okpo'         => '01979784',
        'account'      => '40802810630000036205',
        'bank'         => 'КРАСНОДАРСКОЕ ОТДЕЛЕНИЕ N8619 ПАО СБЕРБАНК',
        'bik'          => '040349602',
        'corr_account' => '30101810100000000602',
        'address'      => 'РОССИЯ, 297573, Крым Респ, Симферопольский р-н, Фонтаны с, СЭреджеповой ул, дом № 1',
        'phone'        => '+7 (978) 751-72-10',
        'certificate'  => '91 №000035409 от 17.01.2015',
    );
    if (function_exists('get_field')) {
        $acf = get_field('legal_company_info', 'option');
        if (is_array($acf) && !empty($acf)) {
            $defaults = array_merge($defaults, array_filter($acf));
        }
    }
    return apply_filters('fabrica_company_info', $defaults);
}

require_once get_template_directory() . '/inc/legal-texts.php';

/**
 * Все опубликованные страницы с шаблоном «Юридическая страница»
 *
 * @return array
 */
function fabrica_get_legal_pages() {
    static $pages = null;
    if ($pages === null) {
        $pages = get_posts(array(
            'post_type'      => 'page',
            'posts_per_page' => 50,
            'post_status'    => 'publish',
            'meta_key'       => '_wp_page_template',
            'meta_value'     => 'templates/template-legal.php',
            'orderby'        => 'menu_order title',
            'order'          => 'ASC',
        ));
    }
    return $pages ?: array();
}

/**
 * URL страницы раздела по slug-паттернам (реквизиты, политика, соглашение, оферта)
 *
 * @param array $slug_patterns массив slug или подстрок для поиска (post_name)
 * @return string
 */
function fabrica_get_legal_url_by_slugs($slug_patterns) {
    $pages = fabrica_get_legal_pages();
    foreach ($pages as $p) {
        $name = $p->post_name;
        foreach ($slug_patterns as $pattern) {
            if ($name === $pattern || strpos($name, $pattern) !== false) {
                return get_permalink($p);
            }
        }
    }
    return '';
}

/**
 * URL главной страницы «Юридическая информация» (индекс разделов)
 *
 * @return string
 */
function fabrica_get_legal_base_url() {
    $index_slugs = array('juridicheskaya-informaciya', 'legal', 'juridicheskaya');
    $url = fabrica_get_legal_url_by_slugs($index_slugs);
    if ($url) {
        return $url;
    }
    $pages = fabrica_get_legal_pages();
    return $pages ? get_permalink($pages[0]) : '';
}

/**
 * URL страницы «Реквизиты» (или главная с якорем #requisites)
 */
function fabrica_get_legal_requisites_url() {
    $url = fabrica_get_legal_url_by_slugs(array('rekvizity'));
    if ($url) {
        return $url;
    }
    $base = fabrica_get_legal_base_url();
    return $base ? $base . '#requisites' : '';
}

/**
 * URL юридической страницы по типу (fallback для футера)
 * Ищет отдельную страницу раздела или главную с якорем
 *
 * @param string $type privacy|terms|offer
 * @return string
 */
function fabrica_get_legal_page_url($type) {
    $slugs = array(
        'privacy' => array('politika-konfidencialnosti', 'politika', 'privacy'),
        'terms'   => array('polzovatelskoe-soglashenie', 'soglashenie', 'terms'),
        'offer'   => array('publichnaya-oferta', 'oferta', 'offer'),
    );
    if (isset($slugs[$type])) {
        $url = fabrica_get_legal_url_by_slugs($slugs[$type]);
        if ($url) {
            return $url;
        }
    }
    $base = fabrica_get_legal_base_url();
    if (!$base) {
        return '';
    }
    $anchors = array('privacy' => 'privacy', 'terms' => 'agreement', 'offer' => 'offer');
    $anchor = isset($anchors[$type]) ? $anchors[$type] : '';
    return $anchor ? $base . '#' . $anchor : $base;
}

/**
 * URL по пресету (для меню из ACF)
 */
function fabrica_get_url_by_preset($preset) {
    $office_url = fabrica_get_office_page_url();
    $map = array(
        'home'         => home_url('/'),
        'office'       => $office_url,
        'office_about' => $office_url . '#about',
        'services'     => fabrica_get_services_page_url(),
        'designers'    => fabrica_get_designers_page_url(),
        'business'     => fabrica_get_business_page_url(),
        'delivery'     => fabrica_get_delivery_page_url(),
        'projects'     => fabrica_get_projects_page_url(),
        'favorites'    => fabrica_get_favorites_page_url(),
        'catalog'      => fabrica_get_catalog_page_url(),
        'contact'      => home_url('/#contact-form'),
        'production'   => home_url('/#production'),
        'blog'         => fabrica_get_blog_page_url(),
        'legal'        => fabrica_get_legal_base_url(),
        'mebel'        => fabrica_get_category_url('Мебель'),
        'posuda'       => fabrica_get_category_url('Посуда'),
        'dekor'        => fabrica_get_category_url('Декор'),
        'horeca'       => fabrica_get_category_url('Horeca'),
    );
    return isset($map[$preset]) ? $map[$preset] : home_url('/');
}

/**
 * URL страницы «Каталог»
 */
function fabrica_get_catalog_page_url() {
    $pages = get_posts(array(
        'post_type'      => 'page',
        'posts_per_page' => 1,
        'meta_key'       => '_wp_page_template',
        'meta_value'     => 'templates/template-catalog.php',
    ));
    return $pages ? get_permalink($pages[0]) : (get_post_type_archive_link('fabrica_product') ?: home_url('/'));
}

/**
 * URL страницы «Избранное»
 */
function fabrica_get_favorites_page_url() {
    $pages = get_posts(array(
        'post_type'      => 'page',
        'posts_per_page' => 1,
        'meta_key'       => '_wp_page_template',
        'meta_value'     => 'templates/template-favorites.php',
    ));
    return $pages ? get_permalink($pages[0]) : home_url('/');
}

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
 * URL секции «Акции» (главная страница #sale)
 */
function fabrica_get_sale_section_url() {
    $front = (int) get_option('page_on_front');
    if ($front) {
        return get_permalink($front) . '#sale';
    }
    return home_url('/#sale');
}

/**
 * URL страницы блога (из Настройки → Чтение → Страница записей)
 */
function fabrica_get_blog_page_url() {
    $page_id = (int) get_option('page_for_posts');
    return $page_id ? get_permalink($page_id) : home_url('/');
}

/**
 * Значение из настроек Header и Футер (ACF Options)
 */
function fabrica_footer_option($name, $default = '') {
    $value = function_exists('get_field') ? get_field($name, 'option') : '';
    if ($value === '' || $value === null || $value === false) {
        return $default;
    }
    return $value;
}

/**
 * Значение из настроек «Юридическая информация» (ACF Options)
 */
function fabrica_legal_option($name, $default = '') {
    $value = function_exists('get_field') ? get_field($name, 'option') : '';
    if ($value === '' || $value === null) {
        return $default;
    }
    return $value;
}

/**
 * SVG-иконки соцсетей для футера
 */
function fabrica_get_social_icon_svg($icon_key) {
    $icons = array(
        'vk' => '<path d="M15.07 2H8.93C3.33 2 2 3.33 2 8.93v6.14C2 20.67 3.33 22 8.93 22h6.14c5.6 0 6.93-1.33 6.93-6.93V8.93C22 3.33 20.67 2 15.07 2zm3.19 14.86h-1.55c-.46 0-.6-.36-1.42-1.18-.72-.72-1.03-.82-1.21-.82-.25 0-.32.07-.32.41v1.08c0 .29-.09.46-.87.46-1.27 0-2.67-.77-3.66-2.21-1.49-2.15-1.9-3.77-1.9-4.1 0-.18.07-.34.41-.34h1.55c.31 0 .42.14.54.47.59 1.68 1.58 3.15 1.99 3.15.15 0 .22-.07.22-.46v-1.77c-.05-.85-.5-1.02-.5-1.35 0-.15.13-.29.33-.29h2.44c.26 0 .35.14.35.44v2.39c0 .26.11.35.19.35.15 0 .27-.09.55-.37.86-.98 1.48-2.49 1.48-2.49.08-.18.22-.34.54-.34h1.55c.37 0 .45.19.37.44-.17.79-.83 1.91-1.46 2.71l-.53.69c-.13.18-.16.26 0 .47.11.15.51.5.77.79.51.51.9 1.04 1.01 1.37.11.34-.06.51-.41.51z"/>',
        'whatsapp' => '<path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 1.856.001 3.598.723 4.907 2.034 1.31 1.311 2.031 3.054 2.03 4.908-.001 3.825-3.113 6.938-6.937 6.938z"/>',
        'telegram' => '<path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.64-.203-.658-.64.135-.954l11.566-4.458c.538-.196 1.006.128.832.941z"/>',
        'instagram' => '<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>',
        'facebook' => '<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>',
        'youtube' => '<path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>',
        'viber' => '<path d="M11.4 0C9.473.028 5.333.344 3.02 2.467 1.302 4.187.696 6.7.633 9.817.57 12.933 0 15.5 0 15.5s.284 2.084.426 3.042c.356 2.375 2.417 4.542 4.792 4.792C6.166 23.716 8 24 8 24s2.567-.57 5.683-.633c3.117-.063 5.63-.669 7.35-2.387 2.123-2.313 2.439-6.453 2.467-8.38C23.972 10.6 23.656 6.46 21.533 4.147 19.813 2.427 17.3 1.82 14.183 1.757 13.225 1.615 11.4 1.4 11.4 0zm6.083 16.667c-.25 0-1.583-.594-1.833-.646-.25-.052-.417-.083-.583.25-.167.333-.646 1.125-.792 1.354-.146.229-.292.26-.542.083-.25-.177-1.042-.771-1.771-1.479-.656-.583-1.146-1.302-1.271-1.521-.125-.219-.014-.333.083-.438.083-.083.188-.208.271-.313.083-.104.125-.177.188-.292.063-.114.031-.219-.021-.313s-.625-1.5-.854-2.042c-.229-.542-.458-.458-.625-.271-.167.188-.646.833-.875 1.125-.229.292-.458.333-.688.104-.229-.229-.896-.927-1.375-1.396-.521-.5-.875-.667-.875-.667s.229-.458.354-.625c.104-.146.229-.25.313-.25h.479c.146 0 .313-.021.458.146.146.167 1 1.021 1.188 1.208.188.188.375.208.646.063.271-.146 1.083-.896 1.354-1.125.271-.229.542-.188.813.063.271.25 1.125 1.063 1.375 1.271.25.208.417.313.479.438.063.125.063.729-.271 1.438-.333.708-1.25 1.354-1.458 1.417-.208.063-.438.104-.688-.021-.25-.125-1.063-.438-1.521-.625-.458-.188-.792-.292-.875-.333-.083-.042-.146-.167-.125-.313.021-.146.083-.271.167-.375z"/>',
        'tiktok' => '<path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>',
    );
    $labels = array(
        'vk' => 'ВКонтакте', 'whatsapp' => 'WhatsApp', 'telegram' => 'Telegram',
        'instagram' => 'Instagram', 'facebook' => 'Facebook', 'youtube' => 'YouTube',
        'viber' => 'Viber', 'tiktok' => 'TikTok',
    );
    $path = isset($icons[$icon_key]) ? $icons[$icon_key] : $icons['telegram'];
    $label = isset($labels[$icon_key]) ? $labels[$icon_key] : $icon_key;
    return array('path' => $path, 'label' => $label);
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

/**
 * Значения по умолчанию для полей услуги (при создании новой)
 */
function fabrica_service_default_values($value, $post_id, $field) {
    if ($field['name'] === 'service_hero_meta' && empty($value)) {
        return array(
            array('icon' => 'location', 'text' => 'Работаем по всему Крыму'),
            array('icon' => 'clock', 'text' => 'От 2 до 4 недель'),
            array('icon' => 'check', 'text' => 'Гарантия качества'),
        );
    }
    if ($field['name'] === 'service_features' && empty($value)) {
        return array(
            array('icon' => 'check', 'title' => 'Опыт работы в Крыму', 'text' => 'Многолетний опыт работы с клиентами по всему Крыму, знание местных особенностей и требований.'),
            array('icon' => 'shield', 'title' => 'Индивидуальный подход', 'text' => 'Каждый проект разрабатывается индивидуально с учётом ваших пожеланий, особенностей помещения и бюджета.'),
            array('icon' => 'ruble', 'title' => 'Прозрачные цены', 'text' => 'Честные и прозрачные цены без скрытых доплат. Фиксированная стоимость в договоре.'),
            array('icon' => 'clock', 'title' => 'Соблюдение сроков', 'text' => 'Строгое соблюдение оговоренных сроков выполнения работ. Работаем быстро и качественно.'),
        );
    }
    if ($field['name'] === 'service_steps' && empty($value)) {
        return array(
            array('title' => 'Консультация и выезд', 'text' => 'Свяжитесь с нами по телефону или оставьте заявку. Наш специалист приедет к вам для консультации, замеров и обсуждения пожеланий.'),
            array('title' => 'Разработка концепции', 'text' => 'Разрабатываем концепцию с учётом ваших предпочтений и особенностей помещения. Представляем несколько вариантов для выбора.'),
            array('title' => 'Согласование и реализация', 'text' => 'Согласовываем детали и приступаем к реализации. Держим вас в курсе на каждом этапе.'),
            array('title' => 'Сдача проекта', 'text' => 'Передаём готовый результат с гарантией качества. При необходимости сопровождаем после сдачи.'),
        );
    }
    if ($field['name'] === 'service_pricing_factors' && empty($value)) {
        return array(
            array('icon' => '📐', 'text' => 'Площадь помещения'),
            array('icon' => '🎨', 'text' => 'Стиль интерьера'),
            array('icon' => '🚪', 'text' => 'Количество комнат'),
            array('icon' => '✨', 'text' => 'Ваши пожелания'),
        );
    }
    if ($field['name'] === 'service_hero_subtitle' && empty($value)) {
        return 'Комплексный подход к реализации ваших интерьерных проектов. Индивидуальный подход, гарантия качества.';
    }
    if ($field['name'] === 'service_about_title' && empty($value)) {
        return 'О нашей услуге';
    }
    if ($field['name'] === 'service_about_content' && empty($value)) {
        return '<p>ФАБРИКА интерьеров предлагает профессиональные услуги в Симферополе и Крыму. Мы создаём уникальные интерьерные решения, которые отражают ваш стиль и потребности.</p><p>Наша команда специалистов работает с клиентами по всему Крыму: Симферополь, Ялта, Севастополь, Алушта, Евпатория и другие города. Мы гарантируем качественное выполнение работ и индивидуальный подход к каждому проекту.</p>';
    }
    if ($field['name'] === 'service_features_title' && empty($value)) {
        return 'Почему выбирают нас в Симферополе и Крыму';
    }
    if ($field['name'] === 'service_process_title' && empty($value)) {
        return 'Как мы работаем';
    }
    if ($field['name'] === 'service_portfolio_title' && empty($value)) {
        return 'Примеры наших работ в Крыму';
    }
    if ($field['name'] === 'service_portfolio_subtitle' && empty($value)) {
        return 'Реализованные проекты в Симферополе, Ялте, Севастополе и других городах Крыма';
    }
    if ($field['name'] === 'service_pricing_intro' && empty($value)) {
        return 'Цены зависят от площади помещения, сложности проекта и объёма работ. Точную стоимость рассчитаем после консультации и выезда на объект.';
    }
    if ($field['name'] === 'service_pricing_description' && empty($value)) {
        return '<p>Для получения точного расчёта стоимости свяжитесь с нами. Мы подготовим индивидуальное коммерческое предложение с учётом всех особенностей вашего проекта.</p>';
    }
    if ($field['name'] === 'service_pricing_note' && empty($value)) {
        return 'Работаем с частными клиентами, дизайнерами и бизнесом по всему Крыму. Предоставляем услуги как полного цикла (от концепции до реализации), так и отдельных этапов (только визуализация или только подбор мебели).';
    }
    if ($field['name'] === 'service_faq_title' && empty($value)) {
        return 'Часто задаваемые вопросы';
    }
    if ($field['name'] === 'service_hero_badge' && empty($value)) {
        return 'Профессиональные услуги';
    }
    if ($field['name'] === 'service_hero_cta_secondary_text' && empty($value)) {
        return 'Узнать больше';
    }
    if ($field['name'] === 'service_hero_cta_secondary_url' && empty($value)) {
        return '#service-features';
    }
    if ($field['name'] === 'service_pricing_cta_title' && empty($value)) {
        return 'Узнайте стоимость вашего проекта';
    }
    if ($field['name'] === 'service_pricing_cta_subtitle' && empty($value)) {
        return 'Получите бесплатную консультацию и расчёт стоимости';
    }
    if ($field['name'] === 'service_pricing_cta_btn_text' && empty($value)) {
        return 'Узнать стоимость';
    }
    if ($field['name'] === 'service_pricing_benefits' && empty($value)) {
        return array(
            array('title' => 'Индивидуальный расчёт', 'text' => 'Учитываем все особенности проекта'),
            array('title' => 'Прозрачные цены', 'text' => 'Без скрытых доплат и комиссий'),
            array('title' => 'Гарантия качества', 'text' => 'Фиксируем стоимость в договоре'),
        );
    }
    if ($field['name'] === 'service_pricing_guarantee' && empty($value)) {
        return 'Бесплатная консультация и выезд на объект';
    }
    if ($field['name'] === 'service_faq' && empty($value)) {
        return array(
            array('question' => 'Сколько стоит услуга?', 'answer' => 'Стоимость зависит от площади помещения, сложности проекта и объёма работ. Для получения точного расчёта свяжитесь с нами — мы подготовим индивидуальное коммерческое предложение после консультации и выезда на объект.'),
            array('question' => 'Что входит в услугу?', 'answer' => 'В услугу входит разработка концепции, создание визуализации, подбор мебели, материалов и декоративных элементов. Также мы предоставляем рабочие чертежи и спецификации для реализации проекта.'),
            array('question' => 'Как долго выполняется заказ?', 'answer' => 'Сроки зависят от площади помещения и сложности проекта. Обычно разработка занимает от 2 до 4 недель. Точные сроки указываются в договоре, и мы строго их соблюдаем.'),
            array('question' => 'Работаете ли вы в других городах Крыма?', 'answer' => 'Да, мы работаем по всему Крыму: Симферополь, Ялта, Севастополь, Алушта, Евпатория и другие города. Выезжаем на объект для консультации, замеров и выполнения работ.'),
            array('question' => 'Даёте ли вы гарантию?', 'answer' => 'Да, мы предоставляем гарантию на все выполненные работы. Срок гарантии и условия указываются в договоре. Также мы предоставляем возможность внесения правок на этапе согласования.'),
        );
    }
    return $value;
}
add_filter('acf/load_value/name=service_hero_meta', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_features', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_steps', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_pricing_factors', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_hero_subtitle', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_about_title', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_about_content', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_features_title', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_process_title', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_portfolio_title', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_portfolio_subtitle', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_pricing_intro', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_pricing_description', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_pricing_note', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_faq_title', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_faq', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_hero_badge', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_hero_cta_secondary_text', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_hero_cta_secondary_url', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_pricing_cta_title', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_pricing_cta_subtitle', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_pricing_cta_btn_text', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_pricing_benefits', 'fabrica_service_default_values', 10, 3);
add_filter('acf/load_value/name=service_pricing_guarantee', 'fabrica_service_default_values', 10, 3);

/**
 * Schema.org Service для страницы услуги
 */
function fabrica_service_schema() {
    if (!is_singular('fabrica_service')) {
        return;
    }
    $service_id = get_queried_object_id();
    $title = get_the_title($service_id);
    $excerpt = has_excerpt($service_id) ? get_the_excerpt($service_id) : '';
    $image = get_field('service_image', $service_id);
    $image_url = '';
    if (!empty($image) && is_array($image) && !empty($image['url'])) {
        $image_url = $image['url'];
    } elseif (has_post_thumbnail($service_id)) {
        $image_url = get_the_post_thumbnail_url($service_id, 'large');
    }
    if ($image_url && strpos($image_url, 'http') !== 0) {
        $image_url = home_url($image_url);
    }

    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'serviceType' => $title,
        'name' => $title,
        'description' => $excerpt ?: wp_strip_all_tags(get_post_field('post_content', $service_id)),
        'provider' => array(
            '@type' => 'LocalBusiness',
            'name' => 'ФАБРИКА интерьеров',
            'telephone' => '+79785977442',
            'address' => array(
                '@type' => 'PostalAddress',
                'addressLocality' => 'Симферополь',
                'addressRegion' => 'Крым',
                'addressCountry' => 'RU',
            ),
            'openingHoursSpecification' => array(
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'),
                'opens' => '10:00',
                'closes' => '19:00',
            ),
            'areaServed' => array('@type' => 'City', 'name' => 'Симферополь'),
        ),
        'areaServed' => array('@type' => 'City', 'name' => 'Симферополь'),
    );
    if ($image_url) {
        $schema['image'] = $image_url;
    }
    echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>' . "\n";

    $services_url = fabrica_get_services_page_url();
    $breadcrumb = array(
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => array(
            array('@type' => 'ListItem', 'position' => 1, 'name' => 'Главная', 'item' => array('@id' => home_url('/'))),
            array('@type' => 'ListItem', 'position' => 2, 'name' => 'Услуги', 'item' => array('@id' => $services_url)),
            array('@type' => 'ListItem', 'position' => 3, 'name' => $title, 'item' => array('@id' => get_permalink($service_id))),
        ),
    );
    echo '<script type="application/ld+json">' . wp_json_encode($breadcrumb) . '</script>' . "\n";
}
add_action('wp_head', 'fabrica_service_schema', 5);