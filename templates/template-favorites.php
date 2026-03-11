<?php
/**
 * Template Name: Избранное
 * Description: Страница избранных товаров (данные из localStorage)
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-favorites';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <?php
    $catalog_page = get_posts(array(
        'post_type'      => 'page',
        'posts_per_page' => 1,
        'meta_key'       => '_wp_page_template',
        'meta_value'     => 'templates/template-catalog.php',
    ));
    $catalog_url = $catalog_page ? get_permalink($catalog_page[0]) : (get_post_type_archive_link('fabrica_product') ?: home_url('/'));
    ?>
    <!-- Хлебные крошки -->
    <nav class="category-breadcrumb" aria-label="Хлебные крошки">
        <div class="container">
            <ol class="category-breadcrumb__list">
                <li class="category-breadcrumb__item">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="category-breadcrumb__link">Главная</a>
                </li>
                <li class="category-breadcrumb__item" aria-current="page">Избранное</li>
            </ol>
        </div>
    </nav>

    <!-- Hero -->
    <section class="category-hero">
        <div class="container">
            <div class="category-hero__inner">
                <h1 class="category-hero__title">Избранное</h1>
                <p class="category-hero__subtitle">Товары, которые вы сохранили. Добавляйте понравившиеся с помощью сердечка на карточке.</p>
            </div>
        </div>
    </section>

    <!-- Сетка товаров (заполняется JS) -->
    <section class="category-products">
        <div class="container">
            <div id="favorites-grid" class="category-products__grid"></div>
            <div id="favorites-empty" class="favorites-empty" hidden>
                <p class="favorites-empty__title">В избранном пока ничего нет</p>
                <p class="favorites-empty__text">Добавляйте понравившиеся товары с помощью сердечка на карточке — они появятся здесь.</p>
                <a href="<?php echo esc_url($catalog_url); ?>" class="button">Перейти в каталог</a>
            </div>
        </div>
    </section>

    <!-- Форма заявки -->
    <?php get_template_part('template-parts/contact-form'); ?>
</main>

<?php get_footer(); ?>
