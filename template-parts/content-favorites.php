<?php
/**
 * Контент страницы «Избранное»
 * Список товаров подгружается JS из localStorage + REST API
 *
 * @package Fabrica
 */

$catalog_url = home_url('/');
$catalog_page = get_posts(array(
    'post_type'      => 'page',
    'posts_per_page' => 1,
    'meta_key'       => '_wp_page_template',
    'meta_value'     => 'templates/template-catalog.php',
));
if ($catalog_page) {
    $catalog_url = get_permalink($catalog_page[0]);
}
?>
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

<section class="category-hero">
    <div class="container">
        <div class="category-hero__inner">
            <h1 class="category-hero__title">Избранное</h1>
            <p class="category-hero__subtitle">Товары, которые вы сохранили. Добавляйте понравившиеся с помощью сердечка на карточке.</p>
        </div>
    </div>
</section>

<section class="category-products">
    <div class="container">
        <div id="favorites-grid" class="category-products__grid"></div>
        <div id="favorites-empty" class="favorites-empty">
            <p class="favorites-empty__title">В избранном пока ничего нет</p>
            <p class="favorites-empty__text">Добавляйте понравившиеся товары с помощью сердечка на карточке — они появятся здесь.</p>
            <a href="<?php echo esc_url($catalog_url); ?>" class="button">Перейти в каталог</a>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/contact-form'); ?>
