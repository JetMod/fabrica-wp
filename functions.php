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
 * Скрываем стандартный блок «Каталоги» — выбор каталога только через ACF
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