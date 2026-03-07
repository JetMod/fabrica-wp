<?php
/**
 * Контент страницы одного проекта
 *
 * @package Fabrica
 */

if (!defined('ABSPATH')) {
    return;
}

$project_id = get_the_ID();
$t = get_template_directory_uri();

$image_arr = get_field('project_image', $project_id);
$image_url = '';
if (!empty($image_arr) && is_array($image_arr) && !empty($image_arr['url'])) {
    $image_url = $image_arr['url'];
} elseif (has_post_thumbnail($project_id)) {
    $image_url = get_the_post_thumbnail_url($project_id, 'large');
}
if (empty($image_url)) {
    $image_url = $t . '/img/16.webp';
}

$terms = get_the_terms($project_id, 'project_category');
$category_name = ($terms && !is_wp_error($terms)) ? $terms[0]->name : '';

$projects_page_url = fabrica_get_projects_page_url();

$about_title = get_field('project_about_title', $project_id) ?: 'О проекте';
$about_content = get_field('project_about_content', $project_id);
if (empty($about_content)) {
    $about_content = get_post_field('post_content', $project_id);
}

$hero_lead = get_field('project_hero_lead', $project_id);
if (empty($hero_lead) && has_excerpt($project_id)) {
    $hero_lead = get_the_excerpt($project_id);
}
if (empty($hero_lead) && function_exists('get_field')) {
    $ab = get_field('project_about_content', $project_id) ?: get_post_field('post_content', $project_id);
    if (!empty($ab)) {
        $hero_lead = wp_trim_words(wp_strip_all_tags($ab), 25);
    }
}

$project_area = get_field('project_area', $project_id);
$project_year = get_field('project_year', $project_id);

$gallery_title = get_field('project_gallery_title', $project_id) ?: 'Фото проекта';
$gallery = get_field('project_gallery', $project_id);
$gallery = is_array($gallery) ? $gallery : array();

$cta_title = get_field('project_cta_title', $project_id) ?: 'Хотите похожий проект?';
$cta_text = get_field('project_cta_text', $project_id) ?: 'Оставьте заявку — обсудим ваше пространство и подберём мебель и отделку под задачу.';
$cta_button = get_field('project_cta_button_text', $project_id) ?: 'Обсудить проект';
$cta_url = get_field('project_cta_button_url', $project_id) ?: '#contact-form';
?>
<nav class="project-breadcrumb" aria-label="Хлебные крошки">
    <div class="container">
        <ol class="project-breadcrumb__list">
            <li class="project-breadcrumb__item">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="project-breadcrumb__link">Главная</a>
            </li>
            <li class="project-breadcrumb__item">
                <a href="<?php echo esc_url($projects_page_url); ?>" class="project-breadcrumb__link">Проекты</a>
            </li>
            <li class="project-breadcrumb__item" aria-current="page"><?php the_title(); ?></li>
        </ol>
    </div>
</nav>

<section class="project-hero">
    <div class="container">
        <div class="project-hero__inner">
            <div class="project-hero__image">
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" class="project-hero__img" loading="eager">
            </div>
            <div class="project-hero__content">
                <?php if ($category_name) : ?>
                <span class="project-hero__category"><?php echo esc_html($category_name); ?></span>
                <?php endif; ?>
                <h1 class="project-hero__title"><?php the_title(); ?></h1>
                <?php if (!empty($hero_lead)) : ?>
                <p class="project-hero__lead"><?php echo esc_html($hero_lead); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($about_content) || $category_name || $project_area || $project_year) : ?>
<section class="project-about animate-on-scroll">
    <div class="container">
            <div class="project-about__inner">
            <div class="project-about__content">
                <h2 class="project-about__title"><?php echo esc_html($about_title); ?></h2>
                <?php if (!empty($about_content)) : ?>
                <div class="project-about__text">
                    <?php echo apply_filters('the_content', $about_content); ?>
                </div>
                <?php endif; ?>
            </div>
            <?php if ($category_name || $project_area || $project_year) : ?>
            <aside class="project-about__meta">
                <div class="project-meta">
                    <?php if ($category_name) : ?>
                    <div class="project-meta__row">
                        <span class="project-meta__label">Тип объекта</span>
                        <span class="project-meta__value"><?php echo esc_html($category_name); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if ($project_area) : ?>
                    <div class="project-meta__row">
                        <span class="project-meta__label">Площадь</span>
                        <span class="project-meta__value"><?php echo esc_html($project_area); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if ($project_year) : ?>
                    <div class="project-meta__row">
                        <span class="project-meta__label">Год</span>
                        <span class="project-meta__value"><?php echo esc_html($project_year); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </aside>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (!empty($gallery)) : ?>
<section class="project-gallery animate-on-scroll">
    <div class="container">
        <h2 class="project-gallery__title"><?php echo esc_html($gallery_title); ?></h2>
        <div class="project-gallery__grid">
            <?php foreach ($gallery as $img) :
                $img_url = is_array($img) && !empty($img['url']) ? $img['url'] : (is_numeric($img) ? wp_get_attachment_image_url($img, 'large') : '');
                $img_alt = is_array($img) && !empty($img['alt']) ? $img['alt'] : (is_array($img) && !empty($img['title']) ? $img['title'] : get_the_title($project_id));
                if (empty($img_url)) continue;
                ?>
                <div class="project-gallery__item">
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" class="project-gallery__img" loading="lazy">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="project-cta animate-on-scroll">
    <div class="container">
        <div class="project-cta__inner">
            <h2 class="project-cta__title"><?php echo esc_html($cta_title); ?></h2>
            <p class="project-cta__text"><?php echo esc_html($cta_text); ?></p>
            <a href="<?php echo esc_url($cta_url); ?>" class="project-cta__button">
                <span><?php echo esc_html($cta_button); ?></span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/contact-form', null, array(
    'accent'   => 'Начните свой проект',
    'title'    => 'Получите персональную консультацию',
    'subtitle' => 'Оставьте заявку, и наш эксперт свяжется с вами в течение 15 минут',
)); ?>
