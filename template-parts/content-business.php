<?php
/**
 * Контент страницы «Бизнесу»
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
$hero_image = $d('business_hero_image', array());
$hero_badge = $d('business_hero_badge', 'B2B Решения');
$hero_title_1 = $d('business_hero_title_1', 'Мебель для');
$hero_title_2 = $d('business_hero_title_2', 'вашего бизнеса');
$hero_subtitle = $d('business_hero_subtitle', "Комплексное оснащение офисов, ресторанов и гостиниц.\nОптовые поставки, индивидуальные решения и гарантия качества.");
$hero_btn1_text = $d('business_hero_btn1_text', 'Получить КП');
$hero_btn1_url = $d('business_hero_btn1_url', '#contact-form');
$hero_btn2_text = $d('business_hero_btn2_text', 'Узнать условия');
$hero_btn2_url = $d('business_hero_btn2_url', '#benefits');
$hero_stats = $d('business_hero_stats', array());
$hero_stats_default = array(
    array('number' => '500+', 'label' => 'Проектов'),
    array('number' => 'до 20%', 'label' => 'Скидка'),
    array('number' => '100%', 'label' => 'Под ключ'),
);
$hero_stats = !empty($hero_stats) ? $hero_stats : $hero_stats_default;
$hero_scroll_text = $d('business_hero_scroll_text', 'Узнать больше');

// Benefits
$benefits_badge = $d('business_benefits_badge', 'Преимущества');
$benefits_title = $d('business_benefits_title', 'Почему компании выбирают нас');
$benefits_subtitle = $d('business_benefits_subtitle', 'Надёжный партнёр для оснащения офисов, ресторанов и гостиниц');
$benefits_items = $d('business_benefits_items', array());
$benefits_default = array(
    array('title' => 'Оптовые цены', 'text' => 'Специальные условия для корпоративных заказчиков. Скидки до 20% в зависимости от объёма заказа.'),
    array('title' => 'Работа по договору', 'text' => 'Официальные документы, счёт, акты. Отсрочка платежа для постоянных партнёров.'),
    array('title' => 'Под ключ', 'text' => 'Проектирование, производство, доставка и монтаж. Один подрядчик — полная ответственность.'),
    array('title' => 'Гарантия и сервис', 'text' => 'Расширенная гарантия на всю продукцию. Сервисное обслуживание после сдачи объекта.'),
    array('title' => 'Соблюдение сроков', 'text' => 'Чёткие сроки изготовления и поставки. Работаем по графикам и этапам проекта.'),
    array('title' => 'Индивидуальные решения', 'text' => 'Мебель по вашим размерам и дизайну. Брендирование и нестандартная комплектация.'),
);
$benefits_items = !empty($benefits_items) ? $benefits_items : $benefits_default;

$benefit_icons = array(
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>',
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 11l3 3L22 4M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>',
);

// Process
$process_badge = $d('business_process_badge', 'Как мы работаем');
$process_title = $d('business_process_title', 'Этапы сотрудничества');
$process_subtitle = $d('business_process_subtitle', 'Прозрачный процесс от заявки до сдачи объекта');
$process_steps = $d('business_process_steps', array());
$process_default = array(
    array('title' => 'Заявка и расчёт', 'text' => 'Вы оставляете заявку. Мы считаем коммерческое предложение и согласовываем бюджет и сроки.'),
    array('title' => 'Проектирование', 'text' => 'Разработка планировок, подбор мебели и материалов. Выезд на объект при необходимости.'),
    array('title' => 'Договор и предоплата', 'text' => 'Заключаем договор, согласуем этапы оплаты. Работаем по счёту для юрлиц и ИП.'),
    array('title' => 'Производство', 'text' => 'Изготовление мебели на нашем производстве. Контроль качества на каждом этапе.'),
    array('title' => 'Доставка и монтаж', 'text' => 'Доставляем на объект, выполняем монтаж. Передаём документы и даём гарантию.'),
);
$process_steps = !empty($process_steps) ? $process_steps : $process_default;

// Conditions
$conditions_badge = $d('business_conditions_badge', 'Условия');
$conditions_title = $d('business_conditions_title', 'Условия для бизнеса');
$conditions_text = $d('business_conditions_text', 'Гибкие условия для корпоративных заказчиков: от разовых поставок до долгосрочного сотрудничества.');
$conditions_items = $d('business_conditions_items', array());
$conditions_default = array(
    array('title' => 'Скидка от 10% до 20%', 'text' => 'В зависимости от объёма заказа и типа заказчика'),
    array('title' => 'Отсрочка платежа', 'text' => 'Для постоянных партнёров — отсрочка до 30 дней'),
    array('title' => 'Работа с НДС и без НДС', 'text' => 'Выставляем счета для юрлиц и ИП по запросу'),
    array('title' => 'Участие в тендерах', 'text' => 'Готовы участвовать в закупках и предоставить все документы'),
);
$conditions_items = !empty($conditions_items) ? $conditions_items : $conditions_default;
$conditions_card_title = $d('business_conditions_card_title', 'Корпоративный заказ');
$conditions_card_features = $d('business_conditions_card_features', array());
$conditions_card_default = array(
    array('label' => 'Минимальный заказ', 'value' => 'от 100 000 ₽'),
    array('label' => 'Скидка', 'value' => 'до 20%'),
    array('label' => 'Персональный менеджер', 'value' => '✓'),
);
$conditions_card_features = !empty($conditions_card_features) ? $conditions_card_features : $conditions_card_default;

// FAQ
$faq_title = $d('business_faq_title', 'Часто задаваемые вопросы');
$faq_items = $d('business_faq_items', array());
$faq_default = array(
    array('question' => 'Работаете ли вы с НДС?', 'answer' => '<p>Да. Мы работаем как с НДС, так и без НДС — выставляем счета под вашу систему налогообложения. Уточните нужный вариант при запросе коммерческого предложения.</p>'),
    array('question' => 'Можете выставить счёт по безналу?', 'answer' => '<p>Да. Выставляем счета для юридических лиц и ИП, работаем по безналичному расчёту. Реквизиты и образцы документов отправляем по запросу.</p>'),
    array('question' => 'Работаете ли по ЭДО?', 'answer' => '<p>Да. Для обмена документами в электронном виде отправьте приглашение на наш ИНН — реквизиты указаны в <a href="' . esc_url(home_url('/#contacts')) . '">разделе контактов</a>.</p>'),
    array('question' => 'Предоставляете отчётные документы?', 'answer' => '<p>Да. После отгрузки и приёмки передаём полный комплект: акты, накладные, счёт-фактуру при необходимости — всё, что нужно для учёта.</p>'),
    array('question' => 'Есть ли гарантия на продукцию?', 'answer' => '<p>Да. На всю мебель действует гарантия. Срок и условия указываются в договоре. После гарантийного срока доступно сервисное обслуживание.</p>'),
    array('question' => 'Организуете доставку и сборку?', 'answer' => '<p>Да. Доставка по региону и в другие города, профессиональная сборка на объекте. Стоимость и сроки рассчитываются индивидуально под ваш заказ.</p>'),
);
$faq_items = !empty($faq_items) ? $faq_items : $faq_default;

$hero_img_url = '';
if (is_array($hero_image) && !empty($hero_image['url'])) {
    $hero_img_url = $hero_image['url'];
} elseif (is_array($hero_image) && !empty($hero_image['sizes']['large'])) {
    $hero_img_url = $hero_image['sizes']['large'];
} else {
    $hero_img_url = get_template_directory_uri() . '/img/21.webp';
}
?>
<!-- Hero -->
<section class="business-hero">
    <div class="business-hero__background">
        <div class="business-hero__image-bg">
            <img src="<?php echo esc_url($hero_img_url); ?>" alt="<?php echo esc_attr($hero_title_1 . ' ' . $hero_title_2); ?>" class="business-hero__bg-img" loading="eager">
            <div class="business-hero__overlay"></div>
        </div>
        <div class="business-hero__gradient-mesh"></div>
    </div>

    <div class="container">
        <div class="business-hero__inner">
            <div class="business-hero__content">
                <?php if ($hero_badge) : ?>
                <div class="business-hero__badge">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                    <span><?php echo esc_html($hero_badge); ?></span>
                </div>
                <?php endif; ?>

                <h1 class="business-hero__title">
                    <?php if ($hero_title_1) : ?><span class="business-hero__title-main"><?php echo esc_html($hero_title_1); ?></span><?php endif; ?>
                    <?php if ($hero_title_2) : ?><span class="business-hero__title-accent"><?php echo esc_html($hero_title_2); ?></span><?php endif; ?>
                </h1>

                <?php if ($hero_subtitle) : ?>
                <p class="business-hero__subtitle"><?php echo nl2br(esc_html($hero_subtitle)); ?></p>
                <?php endif; ?>

                <div class="business-hero__actions">
                    <?php if ($hero_btn1_text && $hero_btn1_url) : ?>
                    <a href="<?php echo esc_url($hero_btn1_url); ?>" class="business-hero__cta business-hero__cta--primary">
                        <span><?php echo esc_html($hero_btn1_text); ?></span>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <?php endif; ?>
                    <?php if ($hero_btn2_text && $hero_btn2_url) : ?>
                    <a href="<?php echo esc_url($hero_btn2_url); ?>" class="business-hero__cta business-hero__cta--secondary">
                        <span><?php echo esc_html($hero_btn2_text); ?></span>
                    </a>
                    <?php endif; ?>
                </div>

                <?php if (!empty($hero_stats)) : ?>
                <div class="business-hero__stats">
                    <?php foreach ($hero_stats as $i => $stat) :
                        if (empty($stat['number']) && empty($stat['label'])) continue;
                    ?>
                    <?php if ($i > 0) : ?><div class="business-hero__stat-divider"></div><?php endif; ?>
                    <div class="business-hero__stat-card">
                        <div class="business-hero__stat-number"><?php echo esc_html($stat['number']); ?></div>
                        <div class="business-hero__stat-label"><?php echo esc_html($stat['label']); ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if ($hero_scroll_text) : ?>
    <a href="#benefits" class="business-hero__scroll" aria-label="<?php echo esc_attr($hero_scroll_text); ?>">
        <span class="business-hero__scroll-text"><?php echo esc_html($hero_scroll_text); ?></span>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M7 13l5 5 5-5M7 6l5 5 5-5"/>
        </svg>
    </a>
    <?php endif; ?>
</section>

<!-- Преимущества -->
<section class="business-benefits animate-on-scroll" id="benefits">
    <div class="container">
        <div class="business-benefits__header">
            <?php if ($benefits_badge) : ?><div class="business-benefits__badge"><?php echo esc_html($benefits_badge); ?></div><?php endif; ?>
            <?php if ($benefits_title) : ?><h2 class="business-benefits__title"><?php echo esc_html($benefits_title); ?></h2><?php endif; ?>
            <?php if ($benefits_subtitle) : ?><p class="business-benefits__subtitle"><?php echo esc_html($benefits_subtitle); ?></p><?php endif; ?>
        </div>
        <div class="business-benefits__grid">
            <?php foreach ($benefits_items as $i => $b) :
                if (empty($b['title']) && empty($b['text'])) continue;
                $icon = isset($benefit_icons[$i % count($benefit_icons)]) ? $benefit_icons[$i % count($benefit_icons)] : $benefit_icons[0];
            ?>
            <div class="business-benefit">
                <div class="business-benefit__icon"><?php echo $icon; ?></div>
                <?php if (!empty($b['title'])) : ?><h3 class="business-benefit__title"><?php echo esc_html($b['title']); ?></h3><?php endif; ?>
                <?php if (!empty($b['text'])) : ?><p class="business-benefit__text"><?php echo esc_html($b['text']); ?></p><?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Процесс работы -->
<section class="business-process animate-on-scroll">
    <div class="container">
        <div class="business-process__header">
            <?php if ($process_badge) : ?><div class="business-process__badge"><?php echo esc_html($process_badge); ?></div><?php endif; ?>
            <?php if ($process_title) : ?><h2 class="business-process__title"><?php echo esc_html($process_title); ?></h2><?php endif; ?>
            <?php if ($process_subtitle) : ?><p class="business-process__subtitle"><?php echo esc_html($process_subtitle); ?></p><?php endif; ?>
        </div>
        <div class="business-process__timeline">
            <?php foreach ($process_steps as $i => $step) :
                if (empty($step['title']) && empty($step['text'])) continue;
                $num = str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT);
            ?>
            <div class="business-process__step">
                <div class="business-process__step-number"><?php echo esc_html($num); ?></div>
                <div class="business-process__step-content">
                    <?php if (!empty($step['title'])) : ?><h3 class="business-process__step-title"><?php echo esc_html($step['title']); ?></h3><?php endif; ?>
                    <?php if (!empty($step['text'])) : ?><p class="business-process__step-text"><?php echo esc_html($step['text']); ?></p><?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Условия -->
<section class="business-conditions animate-on-scroll">
    <div class="container">
        <div class="business-conditions__inner">
            <div class="business-conditions__content">
                <?php if ($conditions_badge) : ?><div class="business-conditions__badge"><?php echo esc_html($conditions_badge); ?></div><?php endif; ?>
                <?php if ($conditions_title) : ?><h2 class="business-conditions__title"><?php echo esc_html($conditions_title); ?></h2><?php endif; ?>
                <?php if ($conditions_text) : ?><p class="business-conditions__text"><?php echo esc_html($conditions_text); ?></p><?php endif; ?>
                <div class="business-conditions__list">
                    <?php foreach ($conditions_items as $c) :
                        if (empty($c['title']) && empty($c['text'])) continue;
                    ?>
                    <div class="business-conditions__item">
                        <div class="business-conditions__item-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 6L9 17l-5-5"/>
                            </svg>
                        </div>
                        <div class="business-conditions__item-content">
                            <?php if (!empty($c['title'])) : ?><h3 class="business-conditions__item-title"><?php echo esc_html($c['title']); ?></h3><?php endif; ?>
                            <?php if (!empty($c['text'])) : ?><p class="business-conditions__item-text"><?php echo esc_html($c['text']); ?></p><?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="business-conditions__visual">
                <div class="business-conditions__card">
                    <div class="business-conditions__card-header">
                        <div class="business-conditions__card-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="12" y1="1" x2="12" y2="23"/>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                            </svg>
                        </div>
                        <?php if ($conditions_card_title) : ?><h3 class="business-conditions__card-title"><?php echo esc_html($conditions_card_title); ?></h3><?php endif; ?>
                    </div>
                    <div class="business-conditions__card-content">
                        <?php foreach ($conditions_card_features as $f) :
                            if (empty($f['label']) && empty($f['value'])) continue;
                        ?>
                        <div class="business-conditions__card-feature">
                            <span class="business-conditions__card-feature-label"><?php echo esc_html($f['label']); ?></span>
                            <span class="business-conditions__card-feature-value"><?php echo esc_html($f['value']); ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="business-faq animate-on-scroll" id="faq">
    <div class="container">
        <?php if ($faq_title) : ?><h2 class="business-faq__title"><?php echo esc_html($faq_title); ?></h2><?php endif; ?>
        <div class="business-faq__list">
            <?php foreach ($faq_items as $idx => $item) :
                if (empty($item['question']) && empty($item['answer'])) continue;
                $faq_id = 'faq-' . ($idx + 1);
                $faq_qid = 'faq-q' . ($idx + 1);
            ?>
            <div class="business-faq__item" data-faq>
                <button type="button" class="business-faq__question" aria-expanded="false" aria-controls="<?php echo esc_attr($faq_id); ?>" id="<?php echo esc_attr($faq_qid); ?>" data-faq-trigger>
                    <span><?php echo esc_html($item['question']); ?></span>
                    <span class="business-faq__icon" aria-hidden="true"></span>
                </button>
                <div class="business-faq__answer" id="<?php echo esc_attr($faq_id); ?>" role="region" aria-labelledby="<?php echo esc_attr($faq_qid); ?>" hidden>
                    <?php echo wp_kses_post($item['answer']); ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section> 

<?php get_template_part('template-parts/contact-form'); ?>
