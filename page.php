<?php
/**
 * Шаблон страницы по умолчанию
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page';
$page_slug = '';
if (have_posts()) {
    the_post();
    $page_slug = get_post_field('post_name') ?: 'default';
    $body_class .= ' page-' . $page_slug;
    rewind_posts();
}
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>
