<?php
/**
 * Template Name: Доставка
 * Description: Страница доставки и сборки мебели
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-delivery';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/content', 'delivery');
    endwhile;
    ?>
</main> 

<?php get_footer(); ?>
