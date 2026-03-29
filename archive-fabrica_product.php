<?php
/**
 * Архив типа записи «Товар» (/product/)
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-category page-product-archive';
$catalog_url = fabrica_get_catalog_page_url();
$pt_obj = get_post_type_object('fabrica_product');
$archive_title = $pt_obj && !empty($pt_obj->labels->name) ? $pt_obj->labels->name : 'Товары';
$archive_subtitle = $pt_obj && !empty($pt_obj->description) ? $pt_obj->description : 'Каталог продукции';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <nav class="category-breadcrumb" aria-label="Хлебные крошки">
        <div class="container">
            <ol class="category-breadcrumb__list">
                <li class="category-breadcrumb__item">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="category-breadcrumb__link">Главная</a>
                </li>
                <li class="category-breadcrumb__item">
                    <a href="<?php echo esc_url($catalog_url); ?>" class="category-breadcrumb__link">Каталог</a>
                </li>
                <li class="category-breadcrumb__item" aria-current="page"><?php echo esc_html($archive_title); ?></li>
            </ol>
        </div>
    </nav>

    <section class="category-hero">
        <div class="container">
            <div class="category-hero__inner">
                <h1 class="category-hero__title"><?php echo esc_html($archive_title); ?></h1>
                <?php if ($archive_subtitle) : ?>
                <p class="category-hero__subtitle"><?php echo esc_html($archive_subtitle); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>

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
            <?php
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => '←',
                'next_text' => '→',
            ));
            ?>
            <?php else : ?>
            <p class="category-products__empty">Товары пока не добавлены.</p>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part('template-parts/contact-form'); ?>
</main>

<?php get_footer(); ?>
