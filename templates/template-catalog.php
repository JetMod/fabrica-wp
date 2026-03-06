<?php
/**
 * Template Name: Каталог
 * Description: Каталог товаров
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-catalog';
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
        <!-- TODO: Добавить контент из catalog.html -->
    </div>
</main>

<?php get_footer(); ?>
