<?php
/**
 * Форма обратной связи (Contact Form 7)
 * Используется на главной, странице услуг, доставки и др.
 *
 * @package Fabrica
 *
 * Использование:
 *   get_template_part('template-parts/contact-form');
 *   get_template_part('template-parts/contact-form', null, array(
 *       'accent'        => 'Начните свой проект',
 *       'title'         => 'Получите персональную консультацию',
 *       'subtitle'      => 'Оставьте заявку...',
 *       'form_id'       => '34b380a',
 *       'show_benefits' => true,
 *   ));
 */

$default_form_id = apply_filters('fabrica_contact_form_id', '34b380a');

$args = wp_parse_args($args ?? array(), array(
    'accent'        => 'Начните свой проект',
    'title'         => 'Получите персональную консультацию',
    'subtitle'      => 'Оставьте заявку, и наш эксперт свяжется с вами в ближайшее время',
    'form_id'       => $default_form_id,
    'show_benefits' => true,
));

$accent        = $args['accent'];
$title         = $args['title'];
$subtitle      = $args['subtitle'];
$form_id       = $args['form_id'];
$show_benefits = $args['show_benefits'];

$benefits = array(
    'Бесплатная консультация',
    'Расчёт в день обращения',
    'Гарантия качества',
);
?>
<section class="contact animate-on-scroll" id="contact-form" aria-labelledby="contact-title">
    <div class="contact__background">
        <div class="contact__pattern"></div>
    </div>
    <div class="container">
        <div class="contact__premium">
            <div class="contact__header">
                <?php if ($accent) : ?>
                <span class="contact__accent"><?php echo esc_html($accent); ?></span>
                <?php endif; ?>
                <h2 class="contact__title" id="contact-title"><?php echo esc_html($title); ?></h2>
                <?php if ($subtitle) : ?>
                <p class="contact__subtitle"><?php echo esc_html($subtitle); ?></p>
                <?php endif; ?>
            </div>

            <?php if ($form_id && function_exists('wpcf7_contact_form')) : ?>
            <?php echo do_shortcode('[contact-form-7 id="' . esc_attr($form_id) . '" title="Форма обратной связи"]'); ?>
            <?php endif; ?>

            <?php if ($show_benefits && !empty($benefits)) : ?>
            <div class="contact__benefits">
                <?php foreach ($benefits as $benefit) : ?>
                <div class="contact__benefit">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17L4 12"/></svg>
                    <span><?php echo esc_html($benefit); ?></span>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <div class="contact__success" id="successMessage" style="display:none;">
                <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M8 12l2 2 4-4"/>
                </svg>
                <div>
                    <h3>Спасибо за обращение!</h3>
                    <p>Наш менеджер свяжется с вами в ближайшее время</p>
                </div>
            </div>
        </div>
    </div>
</section>
