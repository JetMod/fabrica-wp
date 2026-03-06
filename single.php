<?php
/**
 * Шаблон отдельной записи блога
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-single';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <div class="container" style="padding: 60px 20px; max-width: 800px;">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                <header class="single-post__header">
                    <h1 class="single-post__title"><?php the_title(); ?></h1>
                    <div class="single-post__meta">
                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php the_date(); ?></time>
                        <?php if (get_the_author()) : ?>
                            <span class="single-post__author"><?php the_author(); ?></span>
                        <?php endif; ?>
                    </div>
                </header>
                <div class="single-post__content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>
