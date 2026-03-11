<?php
/**
 * Контент страницы «Доставка»
 * Все данные из ACF с fallback на значения по умолчанию
 *
 * @package Fabrica
 */

$page_id = get_queried_object_id();

$d = function($key, $default = '') {
    global $page_id;
    $v = function_exists('get_field') ? get_field($key, $page_id) : '';
    return ($v !== '' && $v !== null && $v !== false) ? $v : $default;
};

// Hero
$hero_lead = $d('delivery_hero_lead', 'Доставка и сборка мебели');
$hero_title_1 = $d('delivery_hero_title_1', 'От склада до вашей двери.');
$hero_title_2 = $d('delivery_hero_title_2', 'Соберём на месте.');
$hero_text = $d('delivery_hero_text', 'По городу, Крыму и всей России. Бережная упаковка, чёткие сроки и профессиональная сборка на объекте.');
$hero_btn1_text = $d('delivery_hero_btn1_text', 'Узнать сроки и цены');
$hero_btn1_url = $d('delivery_hero_btn1_url', '#zones');
$hero_phone = $d('delivery_hero_btn2_phone', '+7 (978) 597-74-42');
$hero_zones = $d('delivery_hero_zones', array());
$hero_zones_default = array(
    array('title' => 'Севастополь и Крым', 'desc' => 'Своя доставка, 1–4 дня'),
    array('title' => 'Вся Россия', 'desc' => 'СДЭК, Деловые Линии и др.'),
    array('title' => 'Сборка на объекте', 'desc' => 'Под ключ'),
);
$hero_zones = !empty($hero_zones) ? $hero_zones : $hero_zones_default;

$hero_zone_icons = array(
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
    '<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>',
);

// Methods
$methods_badge = $d('delivery_methods_badge', 'Способы');
$methods_title = $d('delivery_methods_title', 'Как мы доставляем');
$methods_subtitle = $d('delivery_methods_subtitle', 'Выберите удобный вариант доставки');
$methods_items = $d('delivery_methods_items', array());
$methods_default = array(
    array('title' => 'Курьером по городу', 'text' => 'Доставка до подъезда или на объект. Стоимость и сроки зависят от адреса — уточняйте при заказе.'),
    array('title' => 'По региону', 'text' => 'Доставка по Крыму и Севастополю. Рассчитаем стоимость и согласуем дату доставки.'),
    array('title' => 'Транспортные компании', 'text' => 'Отправка по России через СДЭК, Деловые Линии и другие ТК. Стоимость по тарифам перевозчика.'),
    array('title' => 'Самовывоз', 'text' => 'Заберите заказ с нашего склада или шоурума. Бесплатно. Адрес и время — по согласованию.'),
);
$methods_items = !empty($methods_items) ? $methods_items : $methods_default;

$method_icons = array(
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>',
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>',
);

// Zones
$zones_badge = $d('delivery_zones_badge', 'Зоны и сроки');
$zones_title = $d('delivery_zones_title', 'Сроки доставки');
$zones_subtitle = $d('delivery_zones_subtitle', 'Ориентировочные сроки. Точную дату согласуем после оформления заказа.');
$zones_items = $d('delivery_zones_items', array());
$zones_default = array(
    array('name' => 'Севастополь и окрестности', 'terms' => '1–2 рабочих дня после готовности заказа. Стоимость от 500 ₽.'),
    array('name' => 'Крым', 'terms' => '2–4 рабочих дня. Стоимость рассчитывается по адресу.'),
    array('name' => 'Россия', 'terms' => 'По тарифам и срокам выбранной ТК. Обычно 3–14 дней в зависимости от региона.'),
);
$zones_items = !empty($zones_items) ? $zones_items : $zones_default;

// Assembly
$asm_badge = $d('delivery_assembly_badge', 'Сборка');
$asm_title = $d('delivery_assembly_title', 'Профессиональная сборка на объекте');
$asm_text = $d('delivery_assembly_text', 'Собираем мебель на вашей территории: аккуратно, по инструкции, с проверкой качества. Стоимость сборки зависит от сложности и объёма — озвучим при заказе.');
$asm_list = $d('delivery_assembly_list', array());
$asm_list_default = array(
    array('item' => 'Сборка корпусной и мягкой мебели'),
    array('item' => 'Подъём на этаж при доставке'),
    array('item' => 'Утилизация упаковки по желанию'),
);
$asm_list = !empty($asm_list) ? $asm_list : $asm_list_default;
$asm_btn_text = $d('delivery_assembly_btn_text', 'Заказать доставку и сборку');
$asm_btn_url = $d('delivery_assembly_btn_url', '#contact-form');
$asm_card_title = $d('delivery_assembly_card_title', 'Сборка под ключ');
$asm_card_text = $d('delivery_assembly_card_text', 'Рассчитаем стоимость доставки и сборки под ваш заказ. Оставьте заявку или позвоните нам.');

// Payment
$pay_badge = $d('delivery_payment_badge', 'Оплата');
$pay_title = $d('delivery_payment_title', 'Способы оплаты');
$pay_items = $d('delivery_payment_items', array());
$pay_default = array(
    array('label' => 'Наличные / карта', 'text' => 'При получении заказа курьеру или в шоуруме.'),
    array('label' => 'Безналичный расчёт', 'text' => 'Для юридических лиц и ИП — по счёту, с НДС и без НДС.'),
    array('label' => 'Предоплата', 'text' => 'Для заказов под производство или при отправке в другой город.'),
);
$pay_items = !empty($pay_items) ? $pay_items : $pay_default;
?>
<!-- Hero -->
<section class="delivery-hero">
    <div class="delivery-hero__bg">
        <div class="delivery-hero__grid"></div>
        <div class="delivery-hero__shapes" aria-hidden="true">
            <div class="delivery-hero__blob delivery-hero__blob--1"></div>
            <div class="delivery-hero__blob delivery-hero__blob--2"></div>
            <div class="delivery-hero__blob delivery-hero__blob--3"></div>
            <div class="delivery-hero__ring delivery-hero__ring--1"></div>
            <div class="delivery-hero__ring delivery-hero__ring--2"></div>
            <div class="delivery-hero__orb delivery-hero__orb--1"></div>
            <div class="delivery-hero__orb delivery-hero__orb--2"></div>
        </div>
        <div class="delivery-hero__edges"></div>
        <div class="delivery-hero__vignette"></div>
        <div class="delivery-hero__mesh"></div>
        <div class="delivery-hero__noise"></div>
        <div class="delivery-hero__glow delivery-hero__glow--1"></div>
        <div class="delivery-hero__glow delivery-hero__glow--2"></div>
        <div class="delivery-hero__glow delivery-hero__glow--3"></div>
        <div class="delivery-hero__lines">
            <span></span><span></span><span></span><span></span><span></span>
        </div>
    </div>
    <div class="container delivery-hero__container">
        <div class="delivery-hero__main">
            <p class="delivery-hero__lead"><?php echo esc_html($hero_lead); ?></p>
            <h1 class="delivery-hero__title"><?php echo esc_html($hero_title_1); ?><br><em><?php echo esc_html($hero_title_2); ?></em></h1>
            <p class="delivery-hero__text"><?php echo esc_html($hero_text); ?></p>
            <div class="delivery-hero__cta">
                <a href="<?php echo esc_url($hero_btn1_url); ?>" class="delivery-hero__btn delivery-hero__btn--primary"><?php echo esc_html($hero_btn1_text); ?></a>
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $hero_phone)); ?>" class="delivery-hero__btn delivery-hero__btn--outline"><?php echo esc_html($hero_phone); ?></a>
            </div>
        </div>
        <ul class="delivery-hero__zones">
            <?php foreach ($hero_zones as $i => $z) :
                if (empty($z['title']) && empty($z['desc'])) continue;
                $icon = isset($hero_zone_icons[$i]) ? $hero_zone_icons[$i] : $hero_zone_icons[0];
            ?>
            <li class="delivery-hero__zone">
                <span class="delivery-hero__zone-icon" aria-hidden="true"><?php echo $icon; ?></span>
                <span class="delivery-hero__zone-title"><?php echo esc_html($z['title']); ?></span>
                <span class="delivery-hero__zone-desc"><?php echo esc_html($z['desc']); ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <a href="#zones" class="delivery-hero__scroll" aria-label="Прокрутить вниз">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
    </a>
</section>

<!-- Как доставляем -->
<section class="delivery-methods animate-on-scroll">
    <div class="container">
        <div class="delivery-methods__header">
            <div class="delivery-methods__badge"><?php echo esc_html($methods_badge); ?></div>
            <h2 class="delivery-methods__title"><?php echo esc_html($methods_title); ?></h2>
            <p class="delivery-methods__subtitle"><?php echo esc_html($methods_subtitle); ?></p>
        </div>
        <div class="delivery-methods__grid">
            <?php foreach ($methods_items as $i => $m) :
                if (empty($m['title']) && empty($m['text'])) continue;
                $icon = isset($method_icons[$i]) ? $method_icons[$i] : $method_icons[0];
            ?>
            <div class="delivery-method">
                <div class="delivery-method__icon"><?php echo $icon; ?></div>
                <h3 class="delivery-method__title"><?php echo esc_html($m['title']); ?></h3>
                <p class="delivery-method__text"><?php echo esc_html($m['text']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Зоны и сроки -->
<section class="delivery-zones animate-on-scroll" id="zones">
    <div class="container">
        <div class="delivery-zones__header">
            <div class="delivery-zones__badge"><?php echo esc_html($zones_badge); ?></div>
            <h2 class="delivery-zones__title"><?php echo esc_html($zones_title); ?></h2>
            <p class="delivery-zones__subtitle"><?php echo esc_html($zones_subtitle); ?></p>
        </div>
        <div class="delivery-zones__grid">
            <?php foreach ($zones_items as $z) :
                if (empty($z['name']) && empty($z['terms'])) continue;
            ?>
            <div class="delivery-zone">
                <div class="delivery-zone__name"><?php echo esc_html($z['name']); ?></div>
                <div class="delivery-zone__terms"><?php echo esc_html($z['terms']); ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Сборка -->
<section class="delivery-assembly animate-on-scroll">
    <div class="container">
        <div class="delivery-assembly__inner">
            <div class="delivery-assembly__content">
                <div class="delivery-assembly__badge"><?php echo esc_html($asm_badge); ?></div>
                <h2 class="delivery-assembly__title"><?php echo esc_html($asm_title); ?></h2>
                <p class="delivery-assembly__text"><?php echo esc_html($asm_text); ?></p>
                <ul class="delivery-assembly__list">
                    <?php foreach ($asm_list as $a) :
                        if (empty($a['item'])) continue;
                    ?>
                    <li><?php echo esc_html($a['item']); ?></li>
                    <?php endforeach; ?>
                </ul>
                <a href="<?php echo esc_url($asm_btn_url); ?>" class="delivery-assembly__button">
                    <span><?php echo esc_html($asm_btn_text); ?></span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
            <div class="delivery-assembly__visual">
                <div class="delivery-assembly__card">
                    <div class="delivery-assembly__card-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                        </svg>
                    </div>
                    <h3 class="delivery-assembly__card-title"><?php echo esc_html($asm_card_title); ?></h3>
                    <p class="delivery-assembly__card-text"><?php echo esc_html($asm_card_text); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Оплата -->
<section class="delivery-payment animate-on-scroll">
    <div class="container">
        <div class="delivery-payment__header">
            <div class="delivery-payment__badge"><?php echo esc_html($pay_badge); ?></div>
            <h2 class="delivery-payment__title"><?php echo esc_html($pay_title); ?></h2>
        </div>
        <div class="delivery-payment__grid">
            <?php foreach ($pay_items as $p) :
                if (empty($p['label']) && empty($p['text'])) continue;
            ?>
            <div class="delivery-payment__item">
                <div class="delivery-payment__icon"><?php echo esc_html($p['label']); ?></div>
                <p class="delivery-payment__text"><?php echo esc_html($p['text']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div> 
</section>

<?php get_template_part('template-parts/contact-form'); ?>
