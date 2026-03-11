<?php
/**
 * Template Name: Юридическая страница
 * Description: Политика конфиденциальности, оферта, реквизиты
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-legal';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/content', 'legal');
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
