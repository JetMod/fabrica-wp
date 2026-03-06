<?php
/**
 * Шаблон страницы услуги
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-service-single';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <div class="container" style="padding: 60px 20px;">
        <?php
        while (have_posts()) :
            the_post();
            $service_id = get_the_ID();
            $image_arr = get_field('service_image', $service_id);
            $image_url = '';
            if (!empty($image_arr) && is_array($image_arr) && !empty($image_arr['url'])) {
                $image_url = $image_arr['url'];
            } elseif (has_post_thumbnail($service_id)) {
                $image_url = get_the_post_thumbnail_url($service_id, 'large');
            }
            if (empty($image_url)) {
                $image_url = $t . '/img/1.webp';
            }
            $terms = get_the_terms($service_id, 'service_category');
            $category_name = '';
            if ($terms && !is_wp_error($terms)) {
                $category_name = $terms[0]->name;
            }
            ?>
            <article id="service-<?php the_ID(); ?>" <?php post_class('service-single'); ?>>
                <header class="service-single__header" style="margin-bottom: 32px;">
                    <?php if ($category_name) : ?>
                    <p class="service-single__category" style="margin: 0 0 8px; font-size: 0.875rem; color: #666;"><?php echo esc_html($category_name); ?></p>
                    <?php endif; ?>
                    <h1 class="service-single__title" style="margin: 0 0 16px; font-size: 2rem;"><?php the_title(); ?></h1>
                    <?php if (has_excerpt()) : ?>
                    <p class="service-single__excerpt" style="margin: 0; font-size: 1.125rem; color: #555;"><?php the_excerpt(); ?></p>
                    <?php endif; ?>
                </header>
                <div class="service-single__image" style="margin-bottom: 32px; border-radius: 8px; overflow: hidden;">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: auto; display: block;">
                </div>
                <div class="service-single__content" style="max-width: 800px;">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>
