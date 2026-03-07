<?php
/**
 * Шаблон архива каталога (Столы, Стулья и т.д.)
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-category';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <?php
    $term = get_queried_object();
    if (!$term || !isset($term->term_id)) {
        return;
    }
    $term_name = $term->name;
    $term_description = $term->description;

    // URL главной страницы каталога
    $catalog_page = get_posts(array(
        'post_type'      => 'page',
        'posts_per_page' => 1,
        'meta_key'       => '_wp_page_template',
        'meta_value'     => 'templates/template-catalog.php',
    ));
    $catalog_url = $catalog_page ? get_permalink($catalog_page[0]) : get_post_type_archive_link('fabrica_product');
    if (empty($catalog_url)) {
        $catalog_url = home_url('/');
    }
    ?>
    <!-- Хлебные крошки -->
    <nav class="category-breadcrumb" aria-label="Хлебные крошки">
        <div class="container">
            <ol class="category-breadcrumb__list">
                <li class="category-breadcrumb__item">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="category-breadcrumb__link">Главная</a>
                </li>
                <li class="category-breadcrumb__item">
                    <a href="<?php echo esc_url($catalog_url); ?>" class="category-breadcrumb__link">Каталог</a>
                </li>
                <li class="category-breadcrumb__item" aria-current="page"><?php echo esc_html($term_name); ?></li>
            </ol>
        </div>
    </nav>

    <!-- Hero категории -->
    <section class="category-hero">
        <div class="container">
            <div class="category-hero__inner">
                <h1 class="category-hero__title"><?php echo esc_html($term_name); ?></h1>
                <?php if ($term_description) : ?>
                <p class="category-hero__subtitle"><?php echo esc_html($term_description); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Сетка товаров -->
    <section class="category-products">
        <div class="container">
            <?php if (have_posts()) : ?>
            <div class="category-products__grid">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/product-card', null, array('product_id' => get_the_ID()));
                endwhile;
                ?>
            </div>
            <?php the_posts_pagination(array('mid_size' => 2)); ?>
            <?php else : ?>
            <p class="category-products__empty">В этом каталоге пока нет товаров.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Форма заявки -->
    <?php get_template_part('template-parts/contact-form'); ?>
</main>

<?php get_footer(); ?>
