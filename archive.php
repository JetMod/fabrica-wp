<?php
/**
 * Шаблон архива блога (категории, теги, автор, дата)
 * Использует тот же layout, что и home.php
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-blog page-blog-archive';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <?php get_template_part('template-parts/content-blog'); ?>
</main>

<?php get_footer(); ?>
