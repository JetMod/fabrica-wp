<?php
/**
 * Карточка проекта для блока на главной
 *
 * @package Fabrica
 * Использование: get_template_part('template-parts/project-card', null, array('project_id' => $id, 'index' => $i));
 */

if (!defined('ABSPATH')) {
    return;
}

// $project_id и $index передаются из вызывающего кода (index.php) через include
if (empty($project_id) || (int) $project_id <= 0) {
    $args = (array) get_query_var('args', array());
    $project_id = isset($args['project_id']) ? (int) $args['project_id'] : 0;
}
$index = isset($index) ? (int) $index : 0;
if (!$project_id) {
    return;
}

$post = get_post($project_id);
if (!$post || $post->post_type !== 'fabrica_project') {
    return;
}

$title = get_the_title($project_id);
$link = get_permalink($project_id);

$terms = get_the_terms($project_id, 'project_category');
$category_name = '';
if ($terms && !is_wp_error($terms)) {
    $category_name = $terms[0]->name;
}

$image_arr = get_field('project_image', $project_id);
$image_url = '';
if (!empty($image_arr) && is_array($image_arr) && !empty($image_arr['url'])) {
    $image_url = $image_arr['url'];
} elseif (has_post_thumbnail($project_id)) {
    $image_url = get_the_post_thumbnail_url($project_id, 'large');
}
if (empty($image_url)) {
    $image_url = get_template_directory_uri() . '/img/16.webp';
}

$modifier = '';
if ($index === 0) {
    $modifier = 'projects__item--large';
} elseif ($index === 4) {
    $modifier = 'projects__item--wide';
}
$classes = 'projects__item' . ($modifier ? ' ' . $modifier : '');
?>
<a href="<?php echo esc_url($link); ?>" class="<?php echo esc_attr($classes); ?>" data-project-id="<?php echo (int) $project_id; ?>">
    <div class="projects__image">
        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" class="projects__img" loading="lazy">
        <div class="projects__overlay">
            <div class="projects__content">
                <h3 class="projects__name"><?php echo esc_html($title); ?></h3>
                <?php if ($category_name) : ?>
                <p class="projects__category"><?php echo esc_html($category_name); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</a>
