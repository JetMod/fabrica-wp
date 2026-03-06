<?php
/**
 * Карточка статьи для блока блога на главной
 * Использует классы blog__card (сетка 4 колонки)
 *
 * @package Fabrica
 * Использование: в цикле WP или get_template_part('template-parts/blog-card', null, array('post_id' => $id));
 */

if (!defined('ABSPATH')) {
    return;
}

$args = (array) get_query_var('args', array());
$post_id = isset($args['post_id']) ? (int) $args['post_id'] : 0;
if (!$post_id) {
    global $post;
    $post_id = $post ? $post->ID : 0;
}
if (!$post_id) {
    return;
}

$post_obj = get_post($post_id);
if (!$post_obj || $post_obj->post_type !== 'post' || $post_obj->post_status !== 'publish') {
    return;
}

$title = get_the_title($post_id);
$link = get_permalink($post_id);
$excerpt = has_excerpt($post_id) ? get_the_excerpt($post_id) : wp_trim_words(get_the_content(null, false, $post_id), 20);
$date = get_the_date('j M Y', $post_id);

$terms = get_the_category($post_id);
$category_name = '';
if ($terms && !is_wp_error($terms)) {
    $category_name = $terms[0]->name;
}

$thumb_id = get_post_thumbnail_id($post_id);
$img_url = '';
if ($thumb_id) {
    $img_url = get_the_post_thumbnail_url($post_id, 'large');
}
if (empty($img_url)) {
    $img_url = get_template_directory_uri() . '/img/16.webp';
}
?>
<article class="blog__card">
    <a href="<?php echo esc_url($link); ?>" class="blog__card-link">
        <div class="blog__card-image">
            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>" class="blog__img" loading="lazy">
            <div class="blog__card-overlay">
                <span class="blog__read-more">Читать далее</span>
            </div>
        </div>
        <div class="blog__card-content">
            <div class="blog__card-meta">
                <?php if ($category_name) : ?>
                <span class="blog__card-category"><?php echo esc_html($category_name); ?></span>
                <?php endif; ?>
                <span class="blog__card-date"><?php echo esc_html($date); ?></span>
            </div>
            <h3 class="blog__card-title"><?php echo esc_html($title); ?></h3>
            <?php if ($excerpt) : ?>
            <p class="blog__card-excerpt"><?php echo esc_html($excerpt); ?></p>
            <?php endif; ?>
        </div>
    </a>
</article>
