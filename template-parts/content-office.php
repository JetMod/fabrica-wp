<?php
/**
 * Контент страницы «О нас»
 * Все данные из ACF с fallback на значения по умолчанию
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$page_id = get_queried_object_id();

$d = function($key, $default = '') {
    global $page_id;
    $v = function_exists('get_field') ? get_field($key, $page_id) : '';
    return ($v !== '' && $v !== null && $v !== false) ? $v : $default;
};

// Hero
$hero_badge = $d('office_hero_badge', 'Премиум-класс');
$hero_title_1 = $d('office_hero_title_1', 'Дизайнерская мебель');
$hero_title_2 = $d('office_hero_title_2', 'нового уровня');
$hero_subtitle = $d('office_hero_subtitle', 'Создаём уникальные интерьерные решения, которые вдохновляют и восхищают. Дизайнерская мебель премиум-класса для тех, кто ценит эстетику и качество.');
$hero_btn1_text = $d('office_hero_btn1_text', 'Смотреть каталог');
$hero_btn1_url = $d('office_hero_btn1_url', '#catalog');
$hero_btn2_text = $d('office_hero_btn2_text', 'Консультация');
$hero_btn2_url = $d('office_hero_btn2_url', '#contact-form');
$hero_features = $d('office_hero_features', array());
$hero_features_default = array(
    array('text' => 'Индивидуальный дизайн'),
    array('text' => 'Премиум материалы'),
    array('text' => 'Гарантия качества'),
);
$hero_features = !empty($hero_features) ? $hero_features : $hero_features_default;
$hero_image = $d('office_hero_image', null);
$hero_img_url = (!empty($hero_image) && is_array($hero_image) && !empty($hero_image['url'])) ? $hero_image['url'] : $t . '/img/21.webp';

// About
$about_badge = $d('office_about_badge', 'О нас');
$about_title = $d('office_about_title', 'Мебель для тех, кто ценит качество');
$about_content = $d('office_about_content', '');
if (empty($about_content)) {
    $about_content = '<p>Мы создаём дизайнерскую мебель премиум-класса, которая сочетает функциональность, эстетику и безупречный дизайн. Каждое изделие — результат многолетнего опыта и внимания к деталям.</p><p>Мы понимаем, что интерьерное пространство влияет на настроение и вдохновение. Поэтому предлагаем решения, которые создают атмосферу уюта, стиля и индивидуальности.</p>';
}
$about_stats = $d('office_about_stats', array());
$about_stats_default = array(
    array('number' => '14+', 'label' => 'лет опыта'),
    array('number' => '500+', 'label' => 'реализованных проектов'),
    array('number' => '100%', 'label' => 'удовлетворённых клиентов'),
);
$about_stats = !empty($about_stats) ? $about_stats : $about_stats_default;
$about_image = $d('office_about_image', null);
$about_img_url = (!empty($about_image) && is_array($about_image) && !empty($about_image['url'])) ? $about_image['url'] : $t . '/img/21.webp';

// Benefits
$benefits_badge = $d('office_benefits_badge', 'Преимущества');
$benefits_title = $d('office_benefits_title', 'Почему выбирают нас');
$benefits_items = $d('office_benefits_items', array());
$benefits_default = array(
    array('icon' => 'layers', 'title' => 'Премиум материалы', 'text' => 'Используем только натуральные материалы высочайшего качества: массив дерева, натуральная кожа, металл премиум-класса.'),
    array('icon' => 'check', 'title' => 'Индивидуальный подход', 'text' => 'Каждый проект разрабатывается с учётом особенностей вашего пространства и корпоративной культуры.'),
    array('icon' => 'shield', 'title' => 'Гарантия качества', 'text' => 'Предоставляем расширенную гарантию на всю продукцию и сервисное обслуживание на протяжении всего срока эксплуатации.'),
    array('icon' => 'clock', 'title' => 'Быстрые сроки', 'text' => 'Оптимизированное производство позволяет выполнять заказы в сжатые сроки без потери качества.'),
    array('icon' => 'users', 'title' => 'Комплексные решения', 'text' => 'От проектирования до монтажа — берём на себя все этапы создания идеального интерьерного пространства.'),
    array('icon' => 'box', 'title' => 'Экологичность', 'text' => 'Используем экологически чистые материалы и технологии, безопасные для здоровья и окружающей среды.'),
);
$benefits_items = !empty($benefits_items) ? $benefits_items : $benefits_default;

$benefit_icons = array(
    'layers' => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>',
    'check' => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 11l3 3L22 4M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>',
    'shield' => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    'clock' => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>',
    'users' => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
    'box' => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>',
);

// Location
$loc_badge = $d('office_location_badge', 'Контакты');
$loc_title = $d('office_location_title', 'Посетите наш шоурум');
$loc_subtitle = $d('office_location_subtitle', 'Приглашаем вас увидеть наши коллекции вживую и получить персональную консультацию');
$loc_address = $d('office_location_address', 'ул. Генерала Васильева, 42');
$loc_address_url = $d('office_location_address_url', 'https://yandex.ru/maps/-/CPEiqUoc');
$loc_phone = $d('office_location_phone', '+7 (978) 597-74-42');
$loc_hours = $d('office_location_hours', 'ежедневно, 10:00–19:00');
$loc_map_embed = $d('office_location_map_embed', '');
if (empty($loc_map_embed)) {
    $loc_map_embed = 'https://yandex.ru/map-widget/v1/?um=constructor%3A0d5a83b82f05f3e301cdbfd1ec8c2ff9f3e73811d536b667fa0bb1c71045761d&amp;source=constructor';
}
$loc_btn1_text = $d('office_location_btn1_text', 'Открыть на карте');
$loc_btn1_url = $d('office_location_btn1_url', '');
if (empty($loc_btn1_url)) {
    $loc_btn1_url = $loc_address_url;
}
$loc_btn2_text = $d('office_location_btn2_text', 'Позвонить');
$loc_btn2_url = $d('office_location_btn2_url', '');
if (empty($loc_btn2_url)) {
    $loc_btn2_url = 'tel:' . preg_replace('/[^0-9+]/', '', $loc_phone);
}
?>
<!-- Hero секция -->
<section class="office-hero">
    <div class="office-hero__background">
        <div class="office-hero__overlay"></div>
        <div class="office-hero__pattern"></div>
        <div class="office-hero__gradient"></div>
    </div>
    <div class="container">
        <div class="office-hero__inner">
            <div class="office-hero__content">
                <div class="office-hero__badge">
                    <span class="office-hero__badge-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </span>
                    <?php echo esc_html($hero_badge); ?>
                </div>
                <h1 class="office-hero__title">
                    <span class="office-hero__title-line"><?php echo esc_html($hero_title_1); ?></span>
                    <span class="office-hero__title-line office-hero__title-line--accent"><?php echo esc_html($hero_title_2); ?></span>
                </h1>
                <p class="office-hero__subtitle"><?php echo esc_html($hero_subtitle); ?></p>
                <div class="office-hero__actions">
                    <a href="<?php echo esc_url($hero_btn1_url); ?>" class="button button--primary office-hero__button">
                        <span><?php echo esc_html($hero_btn1_text); ?></span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url($hero_btn2_url); ?>" class="button button--secondary office-hero__button">
                        <span><?php echo esc_html($hero_btn2_text); ?></span>
                    </a>
                </div>
                <div class="office-hero__features">
                    <?php foreach ($hero_features as $f) :
                        $ft = !empty($f['text']) ? $f['text'] : '';
                        if ($ft) :
                    ?>
                    <div class="office-hero__feature">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 6L9 17l-5-5"/>
                        </svg>
                        <span><?php echo esc_html($ft); ?></span>
                    </div>
                    <?php endif; endforeach; ?>
                </div>
            </div>
            <div class="office-hero__visual">
                <div class="office-hero__image-wrapper">
                    <img src="<?php echo esc_url($hero_img_url); ?>" alt="<?php echo esc_attr($hero_title_1 . ' ' . $hero_title_2); ?>" class="office-hero__image" loading="eager">
                    <div class="office-hero__image-overlay"></div>
                </div>
                <div class="office-hero__decorative">
                    <div class="office-hero__decorative-item office-hero__decorative-item--1"></div>
                    <div class="office-hero__decorative-item office-hero__decorative-item--2"></div>
                    <div class="office-hero__decorative-item office-hero__decorative-item--3"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="office-hero__scroll-indicator">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M7 13l5 5 5-5M7 6l5 5 5-5"/>
        </svg>
    </div>
</section>

<!-- О компании -->
<section class="office-about animate-on-scroll">
    <div class="container">
        <div class="office-about__inner">
            <div class="office-about__content">
                <div class="office-about__badge"><?php echo esc_html($about_badge); ?></div>
                <h2 class="office-about__title"><?php echo esc_html($about_title); ?></h2>
                <div class="office-about__text office-about__content-text"><?php echo wp_kses_post($about_content); ?></div>
                <div class="office-about__stats">
                    <?php foreach ($about_stats as $s) :
                        $sn = !empty($s['number']) ? $s['number'] : '';
                        $sl = !empty($s['label']) ? $s['label'] : '';
                        if ($sn || $sl) :
                    ?>
                    <div class="office-about__stat">
                        <div class="office-about__stat-number"><?php echo esc_html($sn); ?></div>
                        <div class="office-about__stat-label"><?php echo esc_html($sl); ?></div>
                    </div>
                    <?php endif; endforeach; ?>
                </div>
            </div>
            <div class="office-about__image">
                <img src="<?php echo esc_url($about_img_url); ?>" alt="<?php echo esc_attr($about_title); ?>" class="office-about__img" loading="lazy">
            </div>
        </div>
    </div>
</section>

<!-- Преимущества -->
<section class="office-benefits animate-on-scroll">
    <div class="container">
        <div class="office-benefits__header">
            <div class="office-benefits__badge"><?php echo esc_html($benefits_badge); ?></div>
            <h2 class="office-benefits__title"><?php echo esc_html($benefits_title); ?></h2>
        </div>
        <div class="office-benefits__grid">
            <?php foreach ($benefits_items as $item) :
                $bi = !empty($item['icon']) ? $item['icon'] : 'layers';
                $bt = !empty($item['title']) ? $item['title'] : '';
                $bx = !empty($item['text']) ? $item['text'] : '';
                $icon = isset($benefit_icons[$bi]) ? $benefit_icons[$bi] : $benefit_icons['layers'];
                if ($bt || $bx) :
            ?>
            <div class="office-benefit">
                <div class="office-benefit__icon"><?php echo $icon; ?></div>
                <h3 class="office-benefit__title"><?php echo esc_html($bt); ?></h3>
                <p class="office-benefit__text"><?php echo esc_html($bx); ?></p>
            </div>
            <?php endif; endforeach; ?>
        </div>
    </div>
</section>

<!-- Контакты и карта -->
<section class="office-location animate-on-scroll" id="location">
    <div class="container">
        <div class="office-location__inner">
            <div class="office-location__content">
                <div class="office-location__badge"><?php echo esc_html($loc_badge); ?></div>
                <h2 class="office-location__title"><?php echo esc_html($loc_title); ?></h2>
                <p class="office-location__subtitle"><?php echo esc_html($loc_subtitle); ?></p>

                <div class="office-location__info">
                    <div class="office-location__item">
                        <div class="office-location__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div class="office-location__details">
                            <h3 class="office-location__label">Адрес</h3>
                            <a href="<?php echo esc_url($loc_address_url); ?>" target="_blank" rel="noopener noreferrer" class="office-location__value office-location__value--link">
                                <?php echo esc_html($loc_address); ?>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14L21 3"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="office-location__item">
                        <div class="office-location__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div class="office-location__details">
                            <h3 class="office-location__label">Телефон</h3>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $loc_phone)); ?>" class="office-location__value office-location__value--link">
                                <?php echo esc_html($loc_phone); ?>
                            </a>
                        </div>
                    </div>

                    <div class="office-location__item">
                        <div class="office-location__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div class="office-location__details">
                            <h3 class="office-location__label">Режим работы</h3>
                            <p class="office-location__value"><?php echo esc_html($loc_hours); ?></p>
                        </div>
                    </div>
                </div>

                <div class="office-location__actions">
                    <a href="<?php echo esc_url($loc_btn1_url); ?>" target="_blank" rel="noopener noreferrer" class="button button--primary">
                        <span><?php echo esc_html($loc_btn1_text); ?></span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6M15 3h6v6M10 14L21 3"/>
                        </svg>
                    </a>
                    <a href="<?php echo esc_url($loc_btn2_url); ?>" class="button button--secondary">
                        <span><?php echo esc_html($loc_btn2_text); ?></span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="office-location__map">
                <iframe
                    src="<?php echo esc_url($loc_map_embed); ?>"
                    width="100%"
                    height="100%"
                    frameborder="0"
                    style="border: 0; border-radius: 20px;"
                    allowfullscreen="true"
                    loading="lazy"
                    title="Карта расположения шоурума"
                ></iframe>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/contact-form'); ?>
