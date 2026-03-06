<?php
/**
 * Template Name: Дизайнерам
 * Description: Условия для дизайнеров
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-designers';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <?php get_template_part('template-parts/content-designers'); ?>
</main>

<?php get_footer(); ?>
