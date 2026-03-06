<?php
/**
 * Контент страницы блога (архив статей)
 * Используется в home.php и archive.php (категории, теги, автор, дата)
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$categories = get_categories(array('orderby' => 'name', 'order' => 'ASC'));
$blog_url = fabrica_get_blog_page_url();

// Текущий контекст архива
$current_cat_slug = '';
$archive_title = 'Блог';
$archive_subtitle = 'Статьи о дизайне мебели, интерьерах, советы экспертов и истории дизайна';

if (is_category()) {
    $term = get_queried_object();
    $current_cat_slug = $term->slug;
    $archive_title = $term->name;
    $archive_subtitle = $term->description ?: 'Статьи в рубрике «' . esc_html($term->name) . '»';
} elseif (is_tag()) {
    $term = get_queried_object();
    $archive_title = 'Тег: ' . $term->name;
    $archive_subtitle = 'Статьи с тегом «' . esc_html($term->name) . '»';
} elseif (is_author()) {
    $author = get_queried_object();
    $archive_title = 'Автор: ' . $author->display_name;
    $archive_subtitle = 'Все статьи автора';
} elseif (is_date()) {
    $year = get_query_var('year');
    $month = get_query_var('monthnum');
    $day = get_query_var('day');
    if ($year && $month && $day) {
        $archive_title = date_i18n('j F Y', strtotime("{$year}-{$month}-{$day}"));
        $archive_subtitle = 'Статьи за ' . $archive_title;
    } elseif ($year && $month) {
        $archive_title = date_i18n('F Y', strtotime("{$year}-{$month}-01"));
        $archive_subtitle = 'Статьи за ' . $archive_title;
    } elseif ($year) {
        $archive_title = $year . ' год';
        $archive_subtitle = 'Статьи за ' . $year . ' год';
    } else {
        $archive_title = 'Архив';
        $archive_subtitle = 'Статьи по дате';
    }
}
?>
        <!-- Хлебные крошки -->
        <nav class="blog-breadcrumb" aria-label="Хлебные крошки">
            <div class="container">
                <ol class="blog-breadcrumb__list">
                    <li class="blog-breadcrumb__item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="blog-breadcrumb__link">Главная</a>
                    </li>
                    <li class="blog-breadcrumb__item">
                        <a href="<?php echo esc_url($blog_url); ?>" class="blog-breadcrumb__link">Блог</a>
                    </li>
                    <?php if (!is_home()) : ?>
                    <li class="blog-breadcrumb__item" aria-current="page"><?php echo esc_html($archive_title); ?></li>
                    <?php else : ?>
                    <li class="blog-breadcrumb__item" aria-current="page">Блог</li>
                    <?php endif; ?>
                </ol>
            </div>
        </nav>

        <!-- Hero блога -->
        <section class="blog-hero">
            <div class="container">
                <div class="blog-hero__inner">
                    <h1 class="blog-hero__title"><?php echo esc_html($archive_title); ?></h1>
                    <p class="blog-hero__subtitle"><?php echo esc_html($archive_subtitle); ?></p>
                </div>
            </div>
        </section>

        <!-- Фильтры категорий (ссылки для SEO) -->
        <?php if (!empty($categories)) : ?>
        <section class="blog-filters">
            <div class="container">
                <div class="blog-filters__inner">
                    <a href="<?php echo esc_url($blog_url); ?>" class="blog-filters__link<?php echo empty($current_cat_slug) ? ' blog-filters__link--active' : ''; ?>">Все статьи</a>
                    <?php foreach ($categories as $cat) : ?>
                    <a href="<?php echo esc_url(get_category_link($cat)); ?>" class="blog-filters__link<?php echo ($current_cat_slug === $cat->slug) ? ' blog-filters__link--active' : ''; ?>"><?php echo esc_html($cat->name); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Список статей -->
        <section class="blog-list">
            <div class="container">
                <?php if (have_posts()) : ?>
                <div class="blog-list__grid" id="blogGrid">
                    <?php while (have_posts()) : the_post(); get_template_part('template-parts/blog-card', 'archive'); endwhile; ?>
                </div>
                <?php the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '←',
                    'next_text' => '→',
                )); ?>
                <?php else : ?>
                <p class="blog-list__empty">Записей пока нет.</p>
                <?php endif; ?>
            </div>
        </section>
