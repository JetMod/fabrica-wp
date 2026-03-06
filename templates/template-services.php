<?php
/**
 * Template Name: Услуги
 * Description: Страница услуг дизайна интерьера и производства мебели
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-services';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<?php get_template_part('template-parts/content-services'); ?>

<?php get_footer(); ?>
