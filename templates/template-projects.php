<?php
/**
 * Template Name: Проекты
 * Description: Портфолио проектов
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-projects';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<?php
while (have_posts()) :
    the_post();
    get_template_part('template-parts/content-projects');
endwhile;
?>

<?php get_footer(); ?>
