<?php
/**
 * Шаблон страницы 404
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-404';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <div class="container" style="padding: 80px 20px; text-align: center;">
        <h1 style="font-size: 4rem; margin-bottom: 1rem;">404</h1>
        <p style="font-size: 1.25rem; margin-bottom: 2rem;">Страница не найдена</p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="button button--primary">На главную</a>
    </div>
</main>

<?php get_footer(); ?>
