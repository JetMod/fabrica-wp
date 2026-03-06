<?php
/**
 * Карточка статьи для страницы блога (архив)
 * Использует классы blog-card, data-category для фильтрации
 *
 * @package Fabrica
 */

if (!defined('ABSPATH')) {
    return;
}

global $post;
if (!$post || $post->post_type !== 'post' || $post->post_status !== 'publish') {
    return;
}

$post_id = $post->ID;
$title = get_the_title();
$link = get_permalink();
$excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20);
$date = get_the_date('j M Y');

$terms = get_the_category($post_id);
$category_name = '';
$category_slug = '';
if ($terms && !is_wp_error($terms)) {
    $category_name = $terms[0]->name;
    $category_slug = $terms[0]->slug;
}

$thumb_id = get_post_thumbnail_id($post_id);
$img_url = $thumb_id ? get_the_post_thumbnail_url($post_id, 'large') : '';
if (empty($img_url)) {
    $img_url = get_template_directory_uri() . '/img/16.webp';
}
?>
<article class="blog-card" data-category="<?php echo esc_attr($category_slug ?: 'uncategorized'); ?>">
    <a href="<?php echo esc_url($link); ?>" class="blog-card__link">
        <div class="blog-card__image">
            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>" class="blog-card__img" loading="lazy">
            <div class="blog-card__overlay">
                <span class="blog-card__read-more">Читать далее</span>
            </div>
        </div>
        <div class="blog-card__content">
            <div class="blog-card__meta">
                <?php if ($category_name) : ?>
                <span class="blog-card__category"><?php echo esc_html($category_name); ?></span>
                <?php endif; ?>
                <span class="blog-card__date"><?php echo esc_html($date); ?></span>
            </div>
            <h3 class="blog-card__title"><?php echo esc_html($title); ?></h3>
            <?php if ($excerpt) : ?>
            <p class="blog-card__excerpt"><?php echo esc_html($excerpt); ?></p>
            <?php endif; ?>
        </div>
    </a>
</article>
