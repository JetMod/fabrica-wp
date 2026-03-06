<?php
/**
 * Контент страницы «Дизайнерам»
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
$hero_badge = $d('designers_hero_badge', 'Партнерство');
$hero_title_1 = $d('designers_hero_title_1', 'Создавайте');
$hero_title_2 = $d('designers_hero_title_2', 'вместе с нами');
$hero_subtitle = $d('designers_hero_subtitle', 'Выгодные условия сотрудничества для дизайнеров интерьеров. Премиальная мебель, индивидуальные решения и профессиональная поддержка на каждом этапе проекта.');
$hero_btn_primary_text = $d('designers_hero_btn_primary_text', 'Стать партнером');
$hero_btn_primary_url = $d('designers_hero_btn_primary_url', 'tel:+79785977442');
$hero_btn_secondary_text = $d('designers_hero_btn_secondary_text', 'Узнать больше');
$hero_image = $d('designers_hero_image', null);
$hero_img_url = (!empty($hero_image) && is_array($hero_image) && !empty($hero_image['url'])) ? $hero_image['url'] : $t . '/img/21.webp';
$hero_stats = $d('designers_hero_stats', array());
$hero_stats_default = array(
    array('stat_number' => '200+', 'stat_label' => 'дизайнеров-партнеров'),
    array('stat_number' => '15%', 'stat_label' => 'скидка партнерам'),
    array('stat_number' => '24/7', 'stat_label' => 'поддержка'),
);
$hero_stats = !empty($hero_stats) ? $hero_stats : $hero_stats_default;

// Benefits
$benefits_badge = $d('designers_benefits_badge', 'Преимущества');
$benefits_title = $d('designers_benefits_title', 'Почему дизайнеры выбирают нас');
$benefits_subtitle = $d('designers_benefits_subtitle', 'Мы создали экосистему для успешного сотрудничества');
$benefits_items = $d('designers_benefits_items', array());
$benefits_default = array(
    array('benefit_title' => 'Выгодные цены', 'benefit_text' => 'Специальные партнерские цены до 15% ниже розничных. Прозрачное ценообразование без скрытых комиссий.'),
    array('benefit_title' => 'Индивидуальный подход', 'benefit_text' => 'Каждый проект уникален. Мы адаптируем решения под ваши задачи и создаем мебель по вашим эскизам.'),
    array('benefit_title' => 'Быстрые сроки', 'benefit_text' => 'Оптимизированное производство позволяет выполнять заказы в сжатые сроки без потери качества.'),
    array('benefit_title' => 'Техническая поддержка', 'benefit_text' => 'Персональный менеджер, помощь в подборе материалов, консультации по проектированию и монтажу.'),
    array('benefit_title' => 'Гарантия качества', 'benefit_text' => 'Расширенная гарантия на всю продукцию и сервисное обслуживание на протяжении всего срока эксплуатации.'),
    array('benefit_title' => 'Маркетинговая поддержка', 'benefit_text' => 'Помощь в продвижении ваших проектов, фотосессии готовых интерьеров, упоминания в наших каналах.'),
);
$benefits_items = !empty($benefits_items) ? $benefits_items : $benefits_default;

$benefit_icons = array(
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>',
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 11l3 3L22 4M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>',
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>',
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>',
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    '<svg width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
);

// Process
$process_badge = $d('designers_process_badge', 'Как это работает');
$process_title = $d('designers_process_title', 'Процесс сотрудничества');
$process_subtitle = $d('designers_process_subtitle', 'Простой и прозрачный процесс от заявки до реализации проекта');
$process_steps = $d('designers_process_steps', array());
$process_default = array(
    array('step_number' => '01', 'step_title' => 'Регистрация', 'step_text' => 'Заполните форму заявки на партнерство. Мы рассмотрим вашу заявку в течение 24 часов.'),
    array('step_number' => '02', 'step_title' => 'Встреча и знакомство', 'step_text' => 'Личная встреча с нашим менеджером, обсуждение условий сотрудничества и ваших потребностей.'),
    array('step_number' => '03', 'step_title' => 'Получение доступа', 'step_text' => 'Доступ к партнерскому каталогу, ценам и материалам. Персональный менеджер для ваших проектов.'),
    array('step_number' => '04', 'step_title' => 'Работа над проектами', 'step_text' => 'Консультации, подбор материалов, разработка индивидуальных решений и производство.'),
    array('step_number' => '05', 'step_title' => 'Реализация', 'step_text' => 'Доставка, монтаж и сервисное обслуживание. Поддержка на всех этапах проекта.'),
);
$process_steps = !empty($process_steps) ? $process_steps : $process_default;

// Conditions
$conditions_badge = $d('designers_conditions_badge', 'Условия');
$conditions_title = $d('designers_conditions_title', 'Условия партнерства');
$conditions_text = $d('designers_conditions_text', 'Мы предлагаем гибкие условия сотрудничества, адаптированные под разные типы проектов и объемы заказов.');
$conditions_items = $d('designers_conditions_items', array());
$conditions_default = array(
    array('condition_title' => 'Скидки', 'condition_text' => 'В зависимости от объема заказов и статуса партнера'),
    array('condition_title' => 'Отсрочка платежа', 'condition_text' => 'Для постоянных партнеров доступна отсрочка до 30 дней'),
    array('condition_title' => 'Бесплатные образцы', 'condition_text' => 'Предоставляем образцы материалов и тканей для ваших клиентов'),
    array('condition_title' => 'Техническая документация', 'condition_text' => 'Полный комплект чертежей, спецификаций и 3D-моделей'),
);
$conditions_items = !empty($conditions_items) ? $conditions_items : $conditions_default;
$conditions_card_min = $d('designers_conditions_card_min', 'от 50 000 ₽');
$conditions_card_discount = $d('designers_conditions_card_discount', 'от 15%');

// CTA
$cta_badge = $d('designers_cta_badge', 'Регистрация');
$cta_title = $d('designers_cta_title', 'Станьте нашим партнером');
$cta_subtitle = $d('designers_cta_subtitle', 'Свяжитесь с нами для обсуждения условий сотрудничества');
$cta_features = $d('designers_cta_features', array());
$cta_features_default = array(
    array('cta_feature_text' => 'Быстрое рассмотрение заявки'),
    array('cta_feature_text' => 'Персональный подход'),
    array('cta_feature_text' => 'Выгодные условия'),
);
$cta_features = !empty($cta_features) ? $cta_features : $cta_features_default;
$cta_btn_text = $d('designers_cta_btn_text', 'Позвонить');
$cta_btn_url = $d('designers_cta_btn_url', 'tel:+79785977442');
?>
    <!-- Hero секция -->
    <section class="designers-hero">
        <div class="designers-hero__background">
            <div class="designers-hero__gradient designers-hero__gradient--1"></div>
            <div class="designers-hero__gradient designers-hero__gradient--2"></div>
            <div class="designers-hero__pattern"></div>
            <div class="designers-hero__shapes">
                <div class="designers-hero__shape designers-hero__shape--1"></div>
                <div class="designers-hero__shape designers-hero__shape--2"></div>
                <div class="designers-hero__shape designers-hero__shape--3"></div>
            </div>
        </div>
        <div class="container">
            <div class="designers-hero__inner">
                <div class="designers-hero__content">
                    <div class="designers-hero__badge">
                        <span class="designers-hero__badge-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                        </span>
                        <?php echo esc_html($hero_badge); ?>
                    </div>
                    <h1 class="designers-hero__title">
                        <span class="designers-hero__title-line"><?php echo esc_html($hero_title_1); ?></span>
                        <span class="designers-hero__title-line designers-hero__title-line--accent"><?php echo esc_html($hero_title_2); ?></span>
                    </h1>
                    <p class="designers-hero__subtitle"><?php echo esc_html($hero_subtitle); ?></p>
                    <div class="designers-hero__actions">
                        <a href="<?php echo esc_url($hero_btn_primary_url); ?>" class="designers-hero__button designers-hero__button--primary">
                            <span><?php echo esc_html($hero_btn_primary_text); ?></span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                        <a href="#benefits" class="designers-hero__button designers-hero__button--secondary">
                            <span><?php echo esc_html($hero_btn_secondary_text); ?></span>
                        </a>
                    </div>
                    <div class="designers-hero__stats">
                        <?php foreach ($hero_stats as $stat) :
                            $num = !empty($stat['stat_number']) ? $stat['stat_number'] : '';
                            $lbl = !empty($stat['stat_label']) ? $stat['stat_label'] : '';
                            if ($num || $lbl) :
                        ?>
                        <div class="designers-hero__stat">
                            <div class="designers-hero__stat-number"><?php echo esc_html($num); ?></div>
                            <div class="designers-hero__stat-label"><?php echo esc_html($lbl); ?></div>
                        </div>
                        <?php endif; endforeach; ?>
                    </div>
                </div>
                <div class="designers-hero__visual">
                    <div class="designers-hero__image-wrapper">
                        <img src="<?php echo esc_url($hero_img_url); ?>" alt="<?php echo esc_attr($hero_title_1 . ' ' . $hero_title_2); ?>" class="designers-hero__image" loading="eager">
                        <div class="designers-hero__image-overlay"></div>
                    </div>
                    <div class="designers-hero__decorative">
                        <div class="designers-hero__decorative-item designers-hero__decorative-item--1"></div>
                        <div class="designers-hero__decorative-item designers-hero__decorative-item--2"></div>
                        <div class="designers-hero__decorative-item designers-hero__decorative-item--3"></div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#benefits" class="designers-hero__scroll-indicator" aria-label="К преимуществам">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M7 13l5 5 5-5M7 6l5 5 5-5"/>
            </svg>
        </a>
    </section>

    <!-- Преимущества -->
    <section class="designers-benefits animate-on-scroll" id="benefits">
        <div class="container">
            <div class="designers-benefits__header">
                <div class="designers-benefits__badge"><?php echo esc_html($benefits_badge); ?></div>
                <h2 class="designers-benefits__title"><?php echo esc_html($benefits_title); ?></h2>
                <p class="designers-benefits__subtitle"><?php echo esc_html($benefits_subtitle); ?></p>
            </div>
            <div class="designers-benefits__grid">
                <?php foreach ($benefits_items as $i => $item) :
                    $bt = !empty($item['benefit_title']) ? $item['benefit_title'] : '';
                    $bx = !empty($item['benefit_text']) ? $item['benefit_text'] : '';
                    $icon = isset($benefit_icons[$i]) ? $benefit_icons[$i] : $benefit_icons[0];
                    if ($bt || $bx) :
                ?>
                <div class="designers-benefit">
                    <div class="designers-benefit__icon"><?php echo $icon; ?></div>
                    <h3 class="designers-benefit__title"><?php echo esc_html($bt); ?></h3>
                    <p class="designers-benefit__text"><?php echo esc_html($bx); ?></p>
                </div>
                <?php endif; endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Процесс работы -->
    <section class="designers-process animate-on-scroll">
        <div class="container">
            <div class="designers-process__header">
                <div class="designers-process__badge"><?php echo esc_html($process_badge); ?></div>
                <h2 class="designers-process__title"><?php echo esc_html($process_title); ?></h2>
                <p class="designers-process__subtitle"><?php echo esc_html($process_subtitle); ?></p>
            </div>
            <div class="designers-process__timeline">
                <?php foreach ($process_steps as $step) :
                    $sn = !empty($step['step_number']) ? $step['step_number'] : '';
                    $st = !empty($step['step_title']) ? $step['step_title'] : '';
                    $sx = !empty($step['step_text']) ? $step['step_text'] : '';
                    if ($sn || $st || $sx) :
                ?>
                <div class="designers-process__step">
                    <div class="designers-process__step-number"><?php echo esc_html($sn); ?></div>
                    <div class="designers-process__step-content">
                        <h3 class="designers-process__step-title"><?php echo esc_html($st); ?></h3>
                        <p class="designers-process__step-text"><?php echo esc_html($sx); ?></p>
                    </div>
                </div>
                <?php endif; endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Условия сотрудничества -->
    <section class="designers-conditions animate-on-scroll">
        <div class="container">
            <div class="designers-conditions__inner">
                <div class="designers-conditions__content">
                    <div class="designers-conditions__badge"><?php echo esc_html($conditions_badge); ?></div>
                    <h2 class="designers-conditions__title"><?php echo esc_html($conditions_title); ?></h2>
                    <p class="designers-conditions__text"><?php echo esc_html($conditions_text); ?></p>
                    <div class="designers-conditions__list">
                        <?php foreach ($conditions_items as $item) :
                            $ct = !empty($item['condition_title']) ? $item['condition_title'] : '';
                            $cx = !empty($item['condition_text']) ? $item['condition_text'] : '';
                            if ($ct || $cx) :
                        ?>
                        <div class="designers-conditions__item">
                            <div class="designers-conditions__item-icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M20 6L9 17l-5-5"/>
                                </svg>
                            </div>
                            <div class="designers-conditions__item-content">
                                <h3 class="designers-conditions__item-title"><?php echo esc_html($ct); ?></h3>
                                <p class="designers-conditions__item-text"><?php echo esc_html($cx); ?></p>
                            </div>
                        </div>
                        <?php endif; endforeach; ?>
                    </div>
                </div>
                <div class="designers-conditions__visual">
                    <div class="designers-conditions__card">
                        <div class="designers-conditions__card-header">
                            <div class="designers-conditions__card-icon">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                                </svg>
                            </div>
                            <h3 class="designers-conditions__card-title">Партнерский статус</h3>
                        </div>
                        <div class="designers-conditions__card-content">
                            <div class="designers-conditions__card-feature">
                                <span class="designers-conditions__card-feature-label">Минимальный заказ</span>
                                <span class="designers-conditions__card-feature-value"><?php echo esc_html($conditions_card_min); ?></span>
                            </div>
                            <div class="designers-conditions__card-feature">
                                <span class="designers-conditions__card-feature-label">Скидки</span>
                                <span class="designers-conditions__card-feature-value"><?php echo esc_html($conditions_card_discount); ?></span>
                            </div>
                            <div class="designers-conditions__card-feature">
                                <span class="designers-conditions__card-feature-label">Персональный менеджер</span>
                                <span class="designers-conditions__card-feature-value">✓</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA вместо формы -->
    <section class="designers-form designers-form--cta animate-on-scroll" id="contact-form">
        <div class="container">
            <div class="designers-form__inner">
                <div class="designers-form__content">
                    <div class="designers-form__badge"><?php echo esc_html($cta_badge); ?></div>
                    <h2 class="designers-form__title"><?php echo esc_html($cta_title); ?></h2>
                    <p class="designers-form__subtitle"><?php echo esc_html($cta_subtitle); ?></p>
                    <div class="designers-form__features">
                        <?php foreach ($cta_features as $f) :
                            $ft = !empty($f['cta_feature_text']) ? $f['cta_feature_text'] : '';
                            if ($ft) :
                        ?>
                        <div class="designers-form__feature">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 6L9 17l-5-5"/>
                            </svg>
                            <span><?php echo esc_html($ft); ?></span>
                        </div>
                        <?php endif; endforeach; ?>
                    </div>
                </div>
                <a href="<?php echo esc_url($cta_btn_url); ?>" class="designers-form__submit designers-form__submit--link">
                    <span><?php echo esc_html($cta_btn_text); ?></span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
