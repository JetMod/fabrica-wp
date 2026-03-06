<?php
/**
 * Шаблон главной и блога
 * Когда главная = «Последние записи» — показываем лендинг (index.php)
 * Когда есть отдельная «Страница записей» — показываем список постов
 *
 * @package Fabrica
 */

// Главная страница (клик по логотипу) — всегда показываем лендинг
if (is_front_page()) {
    require get_template_directory() . '/index.php';
    return;
}

// Страница блога (если настроена отдельно в Настройки → Чтение)
$t = get_template_directory_uri();
$body_class = 'page-blog';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <div class="container" style="padding: 60px 20px;">
        <?php if (have_posts()) : ?>
            <div class="blog-list">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="blog-item">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="blog-meta"><?php the_date(); ?></div>
                        <?php the_excerpt(); ?>
                    </article>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p>Записей пока нет.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
