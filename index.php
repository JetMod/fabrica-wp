<?php $t = get_template_directory_uri(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ФАБРИКА интерьеров — производство полного цикла дизайнерской мебели и интерьерных решений">
    <meta name="keywords" content="дизайнерская мебель, интерьерные решения, производство мебели, мебель на заказ">
    <meta name="theme-color" content="#F5F3EF">
    
    <!-- Open Graph -->
    <meta property="og:title" content="ФАБРИКА интерьеров — Дизайнерская мебель и интерьеры под ключ">
    <meta property="og:description" content="Производство полного цикла дизайнерской мебели и интерьерных решений">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo esc_url($t . '/img/main.webp'); ?>">
    
    <title>ФАБРИКА интерьеров — Дизайнерская мебель и интерьеры под ключ</title>
    
    <!-- Иконка для браузера (логотип) -->
    <link rel="icon" href="<?php echo esc_url($t . '/img/logo.jpg'); ?>" type="image/jpeg">
    <link rel="apple-touch-icon" href="<?php echo esc_url($t . '/img/logo.jpg'); ?>">
    
    <!-- Preload критических ресурсов -->
    <link rel="preload" as="image" href="<?php echo esc_url($t . '/img/logo.jpg'); ?>">
    <link rel="preload" as="video" href="<?php echo esc_url($t . '/video/hero.mp4'); ?>">
    
    <?php wp_head(); ?>
</head>
<body class="page-index">
 
 <?php get_header(); ?>

<?php
// ACF Options для главной страницы (с fallback на значения по умолчанию)
$opt = function($key, $default = '') {
    if (!function_exists('get_field')) return $default;
    $v = get_field($key, 'option');
    return ($v !== '' && $v !== null && $v !== false) ? $v : $default;
};
$hero_slides_default = array(
    array('slide_active' => true, 'slide_title' => 'СКИДКА НА КОМПЛЕКТ СТОЛ + СТУЛЬЯ', 'slide_subtitle' => 'Акция распространяется на столы без знака «финальная цена»', 'slide_button_text' => 'В КАТАЛОГ', 'slide_button_url' => '', 'slide_image' => array('url' => $t . '/img/16.webp')),
    array('slide_active' => true, 'slide_title' => 'СТУЛЬЯ GALLOTI', 'slide_subtitle' => 'Итальянская элегантность в вашем интерьере ♡', 'slide_button_text' => 'В КАТАЛОГ', 'slide_button_url' => '', 'slide_image' => array('url' => $t . '/img/17.webp')),
    array('slide_active' => true, 'slide_title' => 'СТУЛ MORGAN', 'slide_subtitle' => 'Идеальное решение для вашего интерьера ♡', 'slide_button_text' => 'В МАГАЗИН', 'slide_button_url' => '', 'slide_image' => array('url' => $t . '/img/18.webp')),
    array('slide_active' => true, 'slide_title' => 'КОЛЛЕКЦИЯ SOFIA И СТОЛ ORION', 'slide_subtitle' => 'Коллекция Sofia в новом цвете — творчество и новая распашной круглый стол Orion ♡', 'slide_button_text' => 'В МАГАЗИН', 'slide_button_url' => '', 'slide_image' => array('url' => $t . '/img/19.webp')),
    array('slide_active' => true, 'slide_title' => 'ДИВАН CAMPO', 'slide_subtitle' => 'От итальянского конструктора Giovanni Lella ♡', 'slide_button_text' => 'В МАГАЗИН', 'slide_button_url' => '', 'slide_image' => array('url' => $t . '/img/20.webp')),
);
$hero_slides_raw = function_exists('get_field') ? get_field('hero_promo_slides', 'option') : array();
$hero_slides = !empty($hero_slides_raw) ? $hero_slides_raw : $hero_slides_default;
$hero_slides = array_values(array_filter($hero_slides, function($s) { return !empty($s['slide_active']); }));
if (empty($hero_slides)) $hero_slides = $hero_slides_default;
?>

    <!-- Основной контент -->
    <main class="main" role="main" id="main-content">
        <!-- Видео Hero — полноэкранное видео -->
        <?php
        $vh_video = $opt('video_hero_video', '');
        $vh_video_src = $vh_video ? esc_url($vh_video) : esc_url($t . '/video/hero1.mov');
        $vh_tagline = $opt('video_hero_tagline', 'Фабрика');
        $vh_tagline_accent = $opt('video_hero_tagline_accent', 'интерьеров');
        $vh_title = $opt('video_hero_title', 'Дизайнерская мебель в Крыму');
        $vh_text = $opt('video_hero_text', 'Мебель на заказ и интерьеры под ключ. Отражаем ваш вкус.');
        $vh_btn_text = $opt('video_hero_button_text', 'В каталог');
        $vh_btn_url = $opt('video_hero_button_url', '#');
        $vh_scroll = $opt('video_hero_scroll_hint', 'Листайте вниз');
        ?>
        <section class="video-hero" aria-label="Видео ФАБРИКА интерьеров">
            <div class="video-hero__wrapper">
                <video
                    class="video-hero__video"
                    src="<?php echo $vh_video_src; ?>"
                    autoplay
                    muted
                    loop
                    playsinline
                    disablePictureInPicture
                    disableRemotePlayback
                    aria-label="Фоновое видео"
                ></video>
                <div class="video-hero__overlay" aria-hidden="true"></div>
            </div>
            <div class="video-hero__content">
                <div class="video-hero__content-inner">
                    <div class="container">
                        <p class="video-hero__tagline"><?php echo esc_html($vh_tagline); ?> <span class="video-hero__tagline-accent"><?php echo esc_html($vh_tagline_accent); ?></span></p>
                        <h1 class="video-hero__title"><?php echo esc_html($vh_title); ?></h1>
                        <p class="video-hero__text"><?php echo esc_html($vh_text); ?></p>
                        <a href="<?php echo esc_url($vh_btn_url); ?>" class="video-hero__cta button button--primary"><?php echo esc_html($vh_btn_text); ?></a>
                    </div>
                </div>
            </div>
            <a href="#about" class="video-hero__scroll-hint" aria-label="<?php echo esc_attr($vh_scroll); ?>">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
                <span><?php echo esc_html($vh_scroll); ?></span>
            </a>
        </section>

        <!-- Заголовок блока акций -->
        <?php
        $hp_label = $opt('hero_promo_label', 'Акции и новинки');
        $hp_title = $opt('hero_promo_title', 'Специальные предложения');
        $hp_subtitle = $opt('hero_promo_subtitle', 'Выгодные условия на мебель и интерьерные решения');
        ?>
        <div class="hero-promo-intro">
            <p class="hero-promo-intro__label"><?php echo esc_html($hp_label); ?></p>
            <h2 class="hero-promo-intro__title"><?php echo esc_html($hp_title); ?></h2>
            <p class="hero-promo-intro__subtitle"><?php echo esc_html($hp_subtitle); ?></p>
        </div>

        <!-- Hero секция — слайдер акций -->
        <section class="hero" aria-label="Промо-слайдер с акциями и трендами">
            <div class="hero__slider">
                <?php
                $slide_index = 0;
                foreach ($hero_slides as $slide) :
                    $s_title = !empty($slide['slide_title']) ? $slide['slide_title'] : '';
                    $s_subtitle = !empty($slide['slide_subtitle']) ? $slide['slide_subtitle'] : '';
                    $s_btn_text = !empty($slide['slide_button_text']) ? $slide['slide_button_text'] : 'В КАТАЛОГ';
                    $s_btn_url = !empty($slide['slide_button_url']) ? $slide['slide_button_url'] : '#';
                    $s_img = $slide['slide_image'] ?? null;
                    $s_img_url = is_array($s_img) ? ($s_img['url'] ?? '') : ($s_img ?: '');
                    if (empty($s_img_url)) $s_img_url = $t . '/img/16.webp';
                    $is_first = ($slide_index === 0);
                    $slide_index++;
                ?>
                <div class="hero__slide<?php echo $is_first ? ' active' : ''; ?>">
                    <div class="hero__slide-content">
                        <div class="hero__text-side">
                            <div class="hero__text-wrapper">
                                <h1 class="hero__title"><?php echo esc_html($s_title); ?></h1>
                                <p class="hero__subtitle"><?php echo esc_html($s_subtitle); ?></p>
                                <a href="<?php echo esc_url($s_btn_url); ?>" class="button button--primary hero__button"><?php echo esc_html($s_btn_text); ?></a>
                            </div>
                        </div>
                        <div class="hero__image-side">
                            <img src="<?php echo esc_url($s_img_url); ?>" alt="<?php echo esc_attr($s_title); ?>" class="hero__image">
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Навигация слайдера -->
            <div class="hero__navigation">
                <button class="hero__nav-btn hero__nav-prev" aria-label="Предыдущий слайд">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="hero__nav-btn hero__nav-next" aria-label="Следующий слайд">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>

            <!-- Индикаторы слайдов -->
            <div class="hero__dots">
                <?php foreach ($hero_slides as $i => $slide) : ?>
                <button class="hero__dot<?php echo $i === 0 ? ' active' : ''; ?>" data-slide="<?php echo (int) $i; ?>" aria-label="Слайд <?php echo $i + 1; ?>"></button>
                <?php endforeach; ?>
            </div>

            <!-- Счетчик слайдов -->
            <div class="hero__counter">
                <span class="hero__counter-current">01</span>
                <span class="hero__counter-separator">/</span>
                <span class="hero__counter-total"><?php echo str_pad((string) count($hero_slides), 2, '0', STR_PAD_LEFT); ?></span>
            </div>

        </section>

        <!-- О компании -->
        <?php
        $ab_title = $opt('about_title', 'ФАБРИКА интерьеров');
        $ab_subtitle = $opt('about_subtitle', 'Производство полного цикла');
        $ab_text1 = $opt('about_text_1', 'Мы создаём интерьерные решения под ключ — от проектирования до монтажа. Работаем с домами, отелями, ресторанами и общественными пространствами.');
        $ab_text2 = $opt('about_text_2', 'Предлагаем не просто мебель, а продуманные до деталей комплексные решения: проектирование, производство, отделку, индивидуальные элементы и монтаж.');
        $ab_btn_text = $opt('about_button_text', 'Узнать о производстве');
        $ab_btn_url = $opt('about_button_url', '#');
        $ab_image = $opt('about_image', null);
        $ab_img_url = is_array($ab_image) ? ($ab_image['url'] ?? '') : ($ab_image ?: '');
        if (empty($ab_img_url)) $ab_img_url = $t . '/img/main.webp';
        $ab_values_title = $opt('about_values_title', 'Наши приемущества');
        $ab_v1_icon = $opt('about_value_1_icon', '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 5L25 15L35 17L27.5 24.5L29 35L20 30L11 35L12.5 24.5L5 17L15 15L20 5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>');
        $ab_v1_name = $opt('about_value_1_name', 'Качество');
        $ab_v1_text = $opt('about_value_1_text', 'Используем лучшие материалы и технологии производства');
        $ab_v2_icon = $opt('about_value_2_icon', '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 20H15M25 20H35M20 5V15M20 25V35" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><circle cx="20" cy="20" r="12" stroke="currentColor" stroke-width="2"/></svg>');
        $ab_v2_name = $opt('about_value_2_name', 'Дизайн');
        $ab_v2_text = $opt('about_value_2_text', 'Современные решения и авторский подход к каждому проекту');
        $ab_v3_icon = $opt('about_value_3_icon', '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 35C28.2843 35 35 28.2843 35 20C35 11.7157 28.2843 5 20 5C11.7157 5 5 11.7157 5 20C5 28.2843 11.7157 35 20 35Z" stroke="currentColor" stroke-width="2"/><path d="M20 12V20L26 26" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>');
        $ab_v3_name = $opt('about_value_3_name', 'Индивидуальность');
        $ab_v3_text = $opt('about_value_3_text', 'Создаём уникальные решения под задачи клиента');
        $ab_v4_icon = $opt('about_value_4_icon', '<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 20L15 28L33 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>');
        $ab_v4_name = $opt('about_value_4_name', 'Ответственность');
        $ab_v4_text = $opt('about_value_4_text', 'Берём ответственность за результат от начала до конца');
        ?>
        <section class="about animate-on-scroll" id="about" aria-labelledby="about-title">
            <div class="container">
                <div class="about__inner">
                    <!-- Текстовая часть -->
                    <div class="about__content">
                        <h2 class="about__title" id="about-title"><?php echo esc_html($ab_title); ?></h2>
                        <p class="about__subtitle"><?php echo esc_html($ab_subtitle); ?></p>
                        <p class="about__text"><?php echo esc_html($ab_text1); ?></p>
                        <p class="about__text"><?php echo esc_html($ab_text2); ?></p>
                        <a href="<?php echo esc_url($ab_btn_url); ?>" class="button button--secondary about__button">
                            <?php echo esc_html($ab_btn_text); ?>
                        </a>
                    </div>

                    <!-- Изображение -->
                    <div class="about__image">
                        <img src="<?php echo esc_url($ab_img_url); ?>" alt="<?php echo esc_attr($ab_title); ?>" class="about__img">
                    </div>
                </div>

                <!-- Ключевые приемущества -->
                <div class="about__values">
                    <h3 class="about__values-title"><?php echo esc_html($ab_values_title); ?></h3>
                    <div class="about__values-grid">
                        <div class="about__value-card">
                            <div class="about__value-icon"><?php echo $ab_v1_icon; ?></div>
                            <h4 class="about__value-name"><?php echo esc_html($ab_v1_name); ?></h4>
                            <p class="about__value-text"><?php echo esc_html($ab_v1_text); ?></p>
                        </div>
                        <div class="about__value-card">
                            <div class="about__value-icon"><?php echo $ab_v2_icon; ?></div>
                            <h4 class="about__value-name"><?php echo esc_html($ab_v2_name); ?></h4>
                            <p class="about__value-text"><?php echo esc_html($ab_v2_text); ?></p>
                        </div>
                        <div class="about__value-card">
                            <div class="about__value-icon"><?php echo $ab_v3_icon; ?></div>
                            <h4 class="about__value-name"><?php echo esc_html($ab_v3_name); ?></h4>
                            <p class="about__value-text"><?php echo esc_html($ab_v3_text); ?></p>
                        </div>
                        <div class="about__value-card">
                            <div class="about__value-icon"><?php echo $ab_v4_icon; ?></div>
                            <h4 class="about__value-name"><?php echo esc_html($ab_v4_name); ?></h4>
                            <p class="about__value-text"><?php echo esc_html($ab_v4_text); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Каталог популярных товаров -->
        <?php
        $fp_sale_label = $opt('featured_tab_sale_label', 'Скидки и акции');
        $fp_new_label = $opt('featured_tab_new_label', 'Новинки');
        $fp_view_all_text = $opt('featured_view_all_text', 'Смотреть всё');
        $fp_view_all_url = $opt('featured_view_all_url', '#');
        $fp_sale_ids = function_exists('get_field') ? get_field('featured_products_sale', 'option') : array();
        $fp_new_ids = function_exists('get_field') ? get_field('featured_products_new', 'option') : array();
        $fp_sale_ids = is_array($fp_sale_ids) ? $fp_sale_ids : array();
        $fp_new_ids = is_array($fp_new_ids) ? $fp_new_ids : array();
        ?>
        <section class="featured-products animate-on-scroll" aria-label="Популярные позиции каталога — скидки и новинки">
            <div class="container">
                <div class="featured-products__header">
                    <div class="featured-products__tabs">
                        <button class="featured-products__tab active" data-tab="sale"><?php echo esc_html($fp_sale_label); ?></button>
                        <button class="featured-products__tab" data-tab="new"><?php echo esc_html($fp_new_label); ?></button>
                    </div>
                    <a href="<?php echo esc_url($fp_view_all_url); ?>" class="featured-products__view-all">
                        <?php echo esc_html($fp_view_all_text); ?>
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 4L13 10L7 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <div class="featured-products__content">
                    <!-- Таб: Скидки и акции -->
                    <div class="featured-products__tab-content active" data-content="sale">
                        <div class="featured-products__slider">
                            <button class="featured-products__nav featured-products__nav--prev" aria-label="Предыдущий">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <div class="featured-products__slider-wrapper">
                                <div class="featured-products__grid">
                                    <?php foreach ($fp_sale_ids as $pid) : get_template_part('template-parts/product-card', null, array('product_id' => $pid)); endforeach; ?>
                                </div>
                            </div>
                            <button class="featured-products__nav featured-products__nav--next" aria-label="Следующий">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <div class="featured-products__dots"></div>
                    </div>

                    <!-- Таб: Новинки -->
                    <div class="featured-products__tab-content" data-content="new">
                        <div class="featured-products__slider">
                            <button class="featured-products__nav featured-products__nav--prev" aria-label="Предыдущий">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <div class="featured-products__slider-wrapper">
                                <div class="featured-products__grid">
                                    <?php foreach ($fp_new_ids as $pid) : get_template_part('template-parts/product-card', null, array('product_id' => $pid)); endforeach; ?>
                                </div>
                            </div>
                            <button class="featured-products__nav featured-products__nav--next" aria-label="Следующий">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>
                        <div class="featured-products__dots"></div>
                    </div>
                </div>
            </div>
        </section>


     

        <!-- Каталог -->
        <?php
        $cat_title = $opt('catalog_title', 'Каталог');
        $cat_subtitle = $opt('catalog_subtitle', 'Откройте для себя мир премиальных интерьерных решений');
        $cat_cards_raw = function_exists('get_field') ? get_field('catalog_cards', 'option') : array();
        $cat_cards_default = array(
            array('card_image' => array('url' => $t . '/img/20.webp'), 'card_title' => 'Мебель', 'card_text' => 'Дизайнерская мебель для любого пространства', 'card_url' => '#'),
            array('card_image' => array('url' => $t . '/img/18.webp'), 'card_title' => 'Освещение', 'card_text' => 'Элегантные светильники и люстры', 'card_url' => '#'),
            array('card_image' => array('url' => $t . '/img/19.webp'), 'card_title' => 'Декор', 'card_text' => 'Изысканные аксессуары для интерьера', 'card_url' => '#'),
            array('card_image' => array('url' => $t . '/img/17.webp'), 'card_title' => 'Текстиль', 'card_text' => 'Премиальные ткани и текстильные решения', 'card_url' => '#'),
            array('card_image' => array('url' => $t . '/img/16.webp'), 'card_title' => 'Напольные покрытия', 'card_text' => 'Качественные материалы для пола', 'card_url' => '#'),
            array('card_image' => array('url' => $t . '/img/6.webp'), 'card_title' => 'HORECA', 'card_text' => 'Профессиональные решения для бизнеса', 'card_url' => '#'),
        );
        $cat_cards = (!empty($cat_cards_raw) && count($cat_cards_raw) >= 6) ? $cat_cards_raw : $cat_cards_default;
        $cat_view_all_text = $opt('catalog_view_all_text', 'Посмотреть весь каталог');
        $cat_view_all_url = $opt('catalog_view_all_url', '#');
        $cat_arrow_svg = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>';
        ?>
        <section class="catalog animate-on-scroll" id="catalog" aria-labelledby="catalog-title">
            <div class="container">
                <div class="catalog__header">
                    <h2 class="catalog__title" id="catalog-title"><?php echo esc_html($cat_title); ?></h2>
                    <p class="catalog__subtitle"><?php echo esc_html($cat_subtitle); ?></p>
                </div>

                <div class="catalog__grid">
                    <?php foreach ($cat_cards as $i => $card) :
                        $c_img = $card['card_image'] ?? null;
                        $c_img_url = is_array($c_img) ? ($c_img['url'] ?? '') : ($c_img ?: '');
                        if (empty($c_img_url)) $c_img_url = $t . '/img/20.webp';
                        $c_title = !empty($card['card_title']) ? $card['card_title'] : '';
                        $c_text = !empty($card['card_text']) ? $card['card_text'] : '';
                        $c_url = !empty($card['card_url']) ? $card['card_url'] : '#';
                        $c_num = str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT);
                    ?>
                    <a href="<?php echo esc_url($c_url); ?>" class="catalog__card">
                        <div class="catalog__card-image">
                            <img src="<?php echo esc_url($c_img_url); ?>" alt="<?php echo esc_attr($c_title); ?>" class="catalog__img">
                            <div class="catalog__card-overlay"></div>
                        </div>
                        <div class="catalog__card-content">
                            <span class="catalog__card-number"><?php echo esc_html($c_num); ?></span>
                            <h3 class="catalog__card-title"><?php echo esc_html($c_title); ?></h3>
                            <p class="catalog__card-text"><?php echo esc_html($c_text); ?></p>
                            <span class="catalog__card-arrow"><?php echo $cat_arrow_svg; ?></span>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>

                <div class="catalog__action">
                    <a href="<?php echo esc_url($cat_view_all_url); ?>" class="catalog__view-all">
                        <span><?php echo esc_html($cat_view_all_text); ?></span>
                        <?php echo $cat_arrow_svg; ?>
                    </a>
                </div>
            </div>
        </section>


           <!-- Услуги -->
           <?php
           $svc_title = $opt('services_title', 'Фабрика также предоставляет услуги');
           $svc_subtitle = $opt('services_subtitle', 'Комплексный подход к реализации ваших интерьерных проектов');
           $svc_footer_text = $opt('services_footer_text', 'Обсудить проект');
           $svc_footer_url = $opt('services_footer_url', '#contact-form');
           $svc_ids = function_exists('get_field') ? get_field('featured_services', 'option') : array();
           $svc_ids = is_array($svc_ids) ? $svc_ids : array();
           if (!empty($svc_ids)) : ?>
           <section class="services animate-on-scroll" aria-labelledby="services-title">
            <div class="container">
                <div class="services__header">
                    <h2 class="services__title" id="services-title"><?php echo esc_html($svc_title); ?></h2>
                    <p class="services__subtitle"><?php echo esc_html($svc_subtitle); ?></p>
                </div>

                <div class="services__slider-wrapper">
                    <button class="services__nav services__nav--prev" aria-label="Предыдущие услуги">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <div class="services__slider">
                        <div class="services__track">
                            <?php foreach ($svc_ids as $sid) : get_template_part('template-parts/service-card', null, array('service_id' => $sid)); endforeach; ?>
                        </div>
                    </div>

                    <button class="services__nav services__nav--next" aria-label="Следующие услуги">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="services__dots" aria-hidden="true"></div>

                <div class="services__footer">
                    <a href="<?php echo esc_url($svc_footer_url); ?>" class="button button--primary"><?php echo esc_html($svc_footer_text); ?></a>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Проекты -->
        <?php
        $prj_title = $opt('projects_title', 'Наши проекты');
        $prj_subtitle = $opt('projects_subtitle', 'Реализованные интерьерные решения для разных пространств');
        $prj_ids = function_exists('get_field') ? get_field('featured_projects', 'option') : array();
        $prj_ids = is_array($prj_ids) ? $prj_ids : array();
        $prj_view_all_text = $opt('projects_view_all_text', 'Смотреть все проекты');
        $prj_view_all_url = $opt('projects_view_all_url', '');
        if (empty($prj_view_all_url)) {
            $prj_pages = get_posts(array(
                'post_type'      => 'page',
                'posts_per_page' => 1,
                'meta_key'       => '_wp_page_template',
                'meta_value'     => 'templates/template-projects.php',
            ));
            $prj_view_all_url = $prj_pages ? get_permalink($prj_pages[0]) : home_url('/');
        }
        ?>
        <section class="projects animate-on-scroll" id="projects" aria-labelledby="projects-title">
            <div class="container">
                <div class="projects__header">
                    <h2 class="projects__title" id="projects-title"><?php echo esc_html($prj_title); ?></h2>
                    <p class="projects__subtitle"><?php echo esc_html($prj_subtitle); ?></p>
                </div>

                <?php if (!empty($prj_ids)) : ?>
                <div class="projects__grid">
                    <?php foreach ($prj_ids as $i => $pid) : get_template_part('template-parts/project-card', null, array('project_id' => $pid, 'index' => $i)); endforeach; ?>
                </div>

                <div class="projects__footer">
                    <a href="<?php echo esc_url($prj_view_all_url); ?>" class="button button--secondary"><?php echo esc_html($prj_view_all_text); ?></a>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <?php get_template_part('template-parts/contact-form'); ?>






        <!-- Для оптовых клиентов и дизайнеров -->
        <?php
        $wh_show = $opt('wholesale_show', true);
        $wh_show = ($wh_show === false || $wh_show === '0' || $wh_show === 0) ? false : true;
        if ($wh_show) :
        $wh_img = function_exists('get_field') ? get_field('wholesale_image', 'option') : null;
        $wh_img_url = (!empty($wh_img) && is_array($wh_img) && !empty($wh_img['url'])) ? $wh_img['url'] : $t . '/img/20.webp';
        $wh_img_alt = $opt('wholesale_image_alt', '');
        $wh_show_badge = $opt('wholesale_show_badge', true);
        $wh_show_badge = ($wh_show_badge === false || $wh_show_badge === '0' || $wh_show_badge === 0) ? false : true;
        $wh_badge = $opt('wholesale_badge', 'ПРЕМИУМ');
        $wh_title = $opt('wholesale_title', 'Для оптовых клиентов и дизайнеров');
        $wh_subtitle = $opt('wholesale_subtitle', '');
        $wh_desc = $opt('wholesale_description', 'Мы тщательно анализируем мебельный рынок и точно знаем, что нужно современному покупателю. Создаём интерьерные решения, которые выбирают профессионалы.');
        $wh_features_raw = function_exists('get_field') ? get_field('wholesale_features', 'option') : array();
        $wh_features_default = array(
            array('feature_icon' => 'box', 'feature_title' => '1500+ товаров', 'feature_text' => 'Широкий ассортимент в каталоге'),
            array('feature_icon' => 'factory', 'feature_title' => 'Собственное производство', 'feature_text' => 'Полный цикл от идеи до монтажа'),
            array('feature_icon' => 'team', 'feature_title' => 'Своя команда Design&Research', 'feature_text' => 'Проектирование и разработка'),
            array('feature_icon' => 'percent', 'feature_title' => 'Персональные условия', 'feature_text' => 'Индивидуальный подход на любые объёмы'),
        );
        $wh_features = !empty($wh_features_raw) ? $wh_features_raw : $wh_features_default;
        $wh_svg_icons_map = array(
            'box' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none"><path d="M3 7V5C3 3.89543 3.89543 3 5 3H19C20.1046 3 21 3.89543 21 5V7M3 7L3 19C3 20.1046 3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V7M3 7L12 13L21 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'factory' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none"><path d="M3 21H21M5 21V7L13 2L21 7V21M9 9V21M15 9V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'team' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none"><path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            'percent' => '<svg width="32" height="32" viewBox="0 0 24 24" fill="none"><path d="M12 2V22M17 5H9.5C8.57174 5 7.6815 5.36875 7.02513 6.02513C6.36875 6.6815 6 7.57174 6 8.5C6 9.42826 6.36875 10.3185 7.02513 10.9749C7.6815 11.6313 8.57174 12 9.5 12H14.5C15.4283 12 16.3185 12.3687 16.9749 13.0251C17.6313 13.6815 18 14.5717 18 15.5C18 16.4283 17.6313 17.3185 16.9749 17.9749C16.3185 18.6313 15.4283 19 14.5 19H6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        );
        $wh_cta_text = $opt('wholesale_cta_text', 'Условия для сотрудничества');
        $wh_cta_url = $opt('wholesale_cta_url', '');
        if (empty($wh_cta_url)) {
            $wh_pages = get_posts(array('post_type' => 'page', 'posts_per_page' => 1, 'meta_key' => '_wp_page_template', 'meta_value' => 'templates/template-designers.php'));
            $wh_cta_url = $wh_pages ? get_permalink($wh_pages[0]) : 'tel:+79785977442';
        }
        $wh_cta2_show = $opt('wholesale_cta2_show', false);
        $wh_cta2_show = ($wh_cta2_show === true || $wh_cta2_show === '1' || $wh_cta2_show === 1);
        $wh_cta2_text = $opt('wholesale_cta2_text', 'Позвонить');
        $wh_cta2_url = $opt('wholesale_cta2_url', 'tel:+79785977442');
        $wh_svg_star = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
        $wh_img_alt = $wh_img_alt ?: $wh_title;
        ?>
        <section class="wholesale animate-on-scroll" id="wholesale" aria-labelledby="wholesale-title">
            <div class="container">
                <div class="wholesale__inner">
                    <div class="wholesale__image">
                        <div class="wholesale__image-wrapper">
                            <img src="<?php echo esc_url($wh_img_url); ?>" alt="<?php echo esc_attr($wh_img_alt); ?>" class="wholesale__img" loading="lazy">
                            <div class="wholesale__image-overlay"></div>
                            <?php if ($wh_show_badge && $wh_badge) : ?>
                            <div class="wholesale__badge">
                                <?php echo $wh_svg_star; ?>
                                <span><?php echo esc_html($wh_badge); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="wholesale__content">
                        <h2 class="wholesale__title" id="wholesale-title"><?php echo esc_html($wh_title); ?></h2>
                        <?php if ($wh_subtitle) : ?>
                        <p class="wholesale__subtitle"><?php echo esc_html($wh_subtitle); ?></p>
                        <?php endif; ?>
                        <p class="wholesale__description"><?php echo esc_html($wh_desc); ?></p>
                        <div class="wholesale__features">
                            <?php foreach ($wh_features as $i => $f) :
                                $ficon = !empty($f['feature_icon']) ? $f['feature_icon'] : (array_keys($wh_svg_icons_map)[$i] ?? 'box');
                                $ft = !empty($f['feature_title']) ? $f['feature_title'] : '';
                                $fx = !empty($f['feature_text']) ? $f['feature_text'] : '';
                                $icon = isset($wh_svg_icons_map[$ficon]) ? $wh_svg_icons_map[$ficon] : $wh_svg_icons_map['box'];
                                if ($ft || $fx) :
                            ?>
                            <div class="wholesale__feature">
                                <div class="wholesale__feature-icon"><?php echo $icon; ?></div>
                                <div class="wholesale__feature-content">
                                    <h3 class="wholesale__feature-title"><?php echo esc_html($ft); ?></h3>
                                    <p class="wholesale__feature-text"><?php echo esc_html($fx); ?></p>
                                </div>
                            </div>
                            <?php endif; endforeach; ?>
                        </div>
                        <div class="wholesale__cta-group">
                            <a href="<?php echo esc_url($wh_cta_url); ?>" class="wholesale__cta button button--primary">
                                <span><?php echo esc_html($wh_cta_text); ?></span>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                            <?php if ($wh_cta2_show && ($wh_cta2_text || $wh_cta2_url)) : ?>
                            <a href="<?php echo esc_url($wh_cta2_url); ?>" class="wholesale__cta wholesale__cta--secondary button button--secondary">
                                <span><?php echo esc_html($wh_cta2_text); ?></span>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Блог / Статьи -->
        <?php
        $blog_show = $opt('blog_show', true);
        $blog_show = ($blog_show === false || $blog_show === '0' || $blog_show === 0) ? false : true;
        if ($blog_show) :
        $blog_title = $opt('blog_title', 'Вам будет интересно');
        $blog_view_all_text = $opt('blog_view_all_text', 'Все статьи');
        $blog_view_all_url = $opt('blog_view_all_url', '');
        if (empty($blog_view_all_url)) {
            $blog_page_id = (int) get_option('page_for_posts');
            $blog_view_all_url = $blog_page_id ? get_permalink($blog_page_id) : home_url('/');
        }
        $blog_count = (int) $opt('blog_posts_count', 4);
        $blog_count = max(1, min(12, $blog_count));
        $blog_featured = function_exists('get_field') ? get_field('blog_featured_posts', 'option') : array();
        $blog_featured = is_array($blog_featured) ? array_filter(array_map('intval', $blog_featured)) : array();

        if (!empty($blog_featured)) {
            $blog_query = new WP_Query(array(
                'post_type'      => 'post',
                'post__in'       => $blog_featured,
                'orderby'        => 'post__in',
                'posts_per_page' => count($blog_featured),
                'post_status'    => 'publish',
            ));
        } else {
            $blog_query = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => $blog_count,
                'post_status'    => 'publish',
                'orderby'        => 'date',
            ));
        }
        ?>
        <section class="blog animate-on-scroll" id="blog" aria-labelledby="blog-title">
            <div class="container">
                <div class="blog__header">
                    <h2 class="blog__title" id="blog-title"><?php echo esc_html($blog_title); ?></h2>
                    <a href="<?php echo esc_url($blog_view_all_url); ?>" class="blog__view-all">
                        <?php echo esc_html($blog_view_all_text); ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

                <?php if ($blog_query->have_posts()) : ?>
                <div class="blog__grid">
                    <?php while ($blog_query->have_posts()) : $blog_query->the_post(); get_template_part('template-parts/blog-card'); endwhile; wp_reset_postdata(); ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>
    </main>

<?php get_footer(); ?>
