<?php
/**
 * Контент страницы «Юридическая информация»
 * Режим «индекс»: навигация + карточки разделов (короткая главная).
 * Режим «раздел»: один раздел (реквизиты, политика, соглашение, оферта).
 *
 * @package Fabrica
 */

$company = fabrica_get_company_info();
$privacy = fabrica_get_legal_privacy_policy();
$agreement = fabrica_get_legal_user_agreement();
$offer = fabrica_get_legal_public_offer();

$current_slug = '';
$obj = get_queried_object();
if ($obj && isset($obj->post_name)) {
    $current_slug = $obj->post_name;
}

// Определяем тип страницы: index | requisites | privacy | agreement | offer
$legal_section = 'index';
if (preg_match('/rekvizity/i', $current_slug)) {
    $legal_section = 'requisites';
} elseif (preg_match('/politika|privacy/i', $current_slug)) {
    $legal_section = 'privacy';
} elseif (preg_match('/soglashenie|terms/i', $current_slug)) {
    $legal_section = 'agreement';
} elseif (preg_match('/oferta|offer/i', $current_slug)) {
    $legal_section = 'offer';
}

$base_url = fabrica_get_legal_base_url();
$req_url = fabrica_get_legal_requisites_url();
$privacy_url = fabrica_get_legal_page_url('privacy');
$terms_url = fabrica_get_legal_page_url('terms');
$offer_url = fabrica_get_legal_page_url('offer');

$section_titles = array(
    'requisites' => 'Реквизиты компании',
    'privacy'    => 'Политика конфиденциальности',
    'agreement'  => 'Пользовательское соглашение',
    'offer'      => 'Публичная оферта',
);
$section_intros = array(
    'requisites' => 'Полные реквизиты для договоров и оплаты.',
    'privacy'    => 'Обработка персональных данных и использование cookies.',
    'agreement'  => 'Условия использования сайта и интеллектуальная собственность.',
    'offer'      => 'Условия заключения договора, оплаты и доставки.',
);
?>

<?php if ($legal_section !== 'index') : ?>
<!-- Страница одного раздела: ссылка «Назад» -->
<div class="legal-back">
    <div class="container">
        <a href="<?php echo esc_url($base_url); ?>" class="legal-back__link">← К юридической информации</a>
    </div>
</div>
<?php endif; ?>

<!-- Hero -->
<section class="legal-hero">
    <div class="legal-hero__bg">
        <div class="legal-hero__grid"></div>
        <div class="legal-hero__shapes" aria-hidden="true">
            <div class="legal-hero__blob legal-hero__blob--1"></div>
            <div class="legal-hero__blob legal-hero__blob--2"></div>
            <div class="legal-hero__ring legal-hero__ring--1"></div>
            <div class="legal-hero__ring legal-hero__ring--2"></div>
        </div>
        <div class="legal-hero__glow legal-hero__glow--1"></div>
        <div class="legal-hero__glow legal-hero__glow--2"></div>
    </div>
    <div class="container legal-hero__container">
        <p class="legal-hero__lead"><?php echo $legal_section === 'index' ? 'Правовая информация' : 'Юридическая информация'; ?></p>
        <h1 class="legal-hero__title"><?php echo $legal_section === 'index' ? 'Юридическая информация' : esc_html($section_titles[$legal_section]); ?></h1>
        <p class="legal-hero__date">Обновлено: <?php echo esc_html(date_i18n('d.m.Y')); ?></p>
    </div>
</section>

<!-- Навигация по разделам (на всех юридических страницах) -->
<nav class="legal-nav animate-on-scroll" aria-label="Разделы">
    <div class="container">
        <div class="legal-nav__inner">
            <span class="legal-nav__label">Разделы:</span>
            <ul class="legal-nav__list">
                <?php if ($req_url) : ?><li><a href="<?php echo esc_url($req_url); ?>" class="legal-nav__link<?php echo $legal_section === 'requisites' ? ' legal-nav__link--current' : ''; ?>">Реквизиты</a></li><?php endif; ?>
                <?php if ($privacy_url) : ?><li><a href="<?php echo esc_url($privacy_url); ?>" class="legal-nav__link<?php echo $legal_section === 'privacy' ? ' legal-nav__link--current' : ''; ?>">Политика конфиденциальности</a></li><?php endif; ?>
                <?php if ($terms_url) : ?><li><a href="<?php echo esc_url($terms_url); ?>" class="legal-nav__link<?php echo $legal_section === 'agreement' ? ' legal-nav__link--current' : ''; ?>">Пользовательское соглашение</a></li><?php endif; ?>
                <?php if ($offer_url) : ?><li><a href="<?php echo esc_url($offer_url); ?>" class="legal-nav__link<?php echo $legal_section === 'offer' ? ' legal-nav__link--current' : ''; ?>">Публичная оферта</a></li><?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<?php if ($legal_section === 'index') : ?>
<section class="legal-index animate-on-scroll">
    <div class="container">
        <div class="legal-index__grid">
            <a href="<?php echo esc_url($req_url); ?>" class="legal-index__card">
                <span class="legal-index__icon legal-index__icon--doc"><?php echo fabrica_legal_icon_doc(); ?></span>
                <h2 class="legal-index__title">Реквизиты компании</h2>
                <p class="legal-index__text"><?php echo esc_html($section_intros['requisites']); ?></p>
                <span class="legal-index__more">Читать полностью</span>
            </a>
            <a href="<?php echo esc_url($privacy_url); ?>" class="legal-index__card">
                <span class="legal-index__icon legal-index__icon--shield"><?php echo fabrica_legal_icon_shield(); ?></span>
                <h2 class="legal-index__title">Политика конфиденциальности</h2>
                <p class="legal-index__text"><?php echo esc_html($section_intros['privacy']); ?></p>
                <span class="legal-index__more">Читать полностью</span>
            </a>
            <a href="<?php echo esc_url($terms_url); ?>" class="legal-index__card">
                <span class="legal-index__icon legal-index__icon--file"><?php echo fabrica_legal_icon_file(); ?></span>
                <h2 class="legal-index__title">Пользовательское соглашение</h2>
                <p class="legal-index__text"><?php echo esc_html($section_intros['agreement']); ?></p>
                <span class="legal-index__more">Читать полностью</span>
            </a>
            <a href="<?php echo esc_url($offer_url); ?>" class="legal-index__card">
                <span class="legal-index__icon legal-index__icon--contract"><?php echo fabrica_legal_icon_contract(); ?></span>
                <h2 class="legal-index__title">Публичная оферта</h2>
                <p class="legal-index__text"><?php echo esc_html($section_intros['offer']); ?></p>
                <span class="legal-index__more">Читать полностью</span>
            </a>
        </div>
    </div>
</section>

<?php else : ?>
<!-- Страница одного раздела -->
<?php if ($legal_section === 'requisites') : ?>
<section class="legal-requisites animate-on-scroll" id="requisites">
    <div class="container">
        <div class="legal-requisites__card">
            <div class="legal-requisites__header">
                <div class="legal-requisites__icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                </div>
                <h2 class="legal-requisites__title">Реквизиты компании</h2>
                <p class="legal-requisites__subtitle"><?php echo esc_html($company['legal_name']); ?></p>
            </div>
            <div class="legal-requisites__grid">
                <div class="legal-requisites__item">
                    <span class="legal-requisites__label">ИНН</span>
                    <span class="legal-requisites__value"><?php echo esc_html($company['inn']); ?></span>
                </div>
                <div class="legal-requisites__item">
                    <span class="legal-requisites__label">ОГРНИП</span>
                    <span class="legal-requisites__value"><?php echo esc_html($company['ogrnip']); ?></span>
                </div>
                <div class="legal-requisites__item">
                    <span class="legal-requisites__label">ОКПО</span>
                    <span class="legal-requisites__value"><?php echo esc_html($company['okpo']); ?></span>
                </div>
                <div class="legal-requisites__item legal-requisites__item--full">
                    <span class="legal-requisites__label">Расчётный счёт</span>
                    <span class="legal-requisites__value legal-requisites__value--mono"><?php echo esc_html($company['account']); ?></span>
                </div>
                <div class="legal-requisites__item legal-requisites__item--full">
                    <span class="legal-requisites__label">Банк</span>
                    <span class="legal-requisites__value"><?php echo esc_html($company['bank']); ?></span>
                </div>
                <div class="legal-requisites__item">
                    <span class="legal-requisites__label">БИК</span>
                    <span class="legal-requisites__value legal-requisites__value--mono"><?php echo esc_html($company['bik']); ?></span>
                </div>
                <div class="legal-requisites__item">
                    <span class="legal-requisites__label">Корр. счёт</span>
                    <span class="legal-requisites__value legal-requisites__value--mono"><?php echo esc_html($company['corr_account']); ?></span>
                </div>
                <div class="legal-requisites__item legal-requisites__item--full">
                    <span class="legal-requisites__label">Адрес</span>
                    <span class="legal-requisites__value"><?php echo esc_html($company['address']); ?></span>
                </div>
                <div class="legal-requisites__item">
                    <span class="legal-requisites__label">Телефон</span>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $company['phone'])); ?>" class="legal-requisites__value legal-requisites__link"><?php echo esc_html($company['phone']); ?></a>
                </div>
                <?php if (!empty($company['certificate'])) : ?>
                <div class="legal-requisites__item legal-requisites__item--full">
                    <span class="legal-requisites__label">Свидетельство</span>
                    <span class="legal-requisites__value"><?php echo esc_html($company['certificate']); ?></span>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php else :
    $doc = $legal_section === 'privacy' ? $privacy : ($legal_section === 'agreement' ? $agreement : $offer);
    if (!empty($doc['sections'])) :
?>
<section class="legal-doc legal-doc--single animate-on-scroll">
    <div class="container">
        <div class="legal-doc__inner">
            <?php if (!empty($doc['intro'])) : ?>
            <p class="legal-doc__intro"><?php echo wp_kses_post(nl2br($doc['intro'])); ?></p>
            <?php endif; ?>
            <div class="legal-doc__sections">
                <?php foreach ($doc['sections'] as $sec) : ?>
                <div class="legal-doc__section">
                    <h2 class="legal-doc__section-title"><?php echo esc_html($sec['title']); ?></h2>
                    <ul class="legal-doc__list">
                        <?php foreach ($sec['items'] as $item) : ?>
                        <li class="legal-doc__item"><?php echo wp_kses_post(nl2br(esc_html($item))); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; endif; ?>
<?php endif; ?>
