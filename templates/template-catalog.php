<?php
/**
 * Template Name: Каталог
 * Description: Главная страница каталога — карточки каталогов
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-catalog';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;

    $catalogs = get_terms(array(
        'taxonomy'   => 'product_catalog',
        'hide_empty' => false,
        'parent'     => 0,
    ));

    if (is_wp_error($catalogs)) {
        $catalogs = array();
    }

    $default_images = array(
        $t . '/img/16.webp',
        $t . '/img/17.webp',
        $t . '/img/18.webp',
        $t . '/img/19.webp',
        $t . '/img/20.webp',
        $t . '/img/21.webp',
        $t . '/img/22.webp',
        $t . '/img/6.webp',
    );
    ?>
    <!-- Hero -->
    <section class="catalog-hero">
        <div class="catalog-hero__background">
            <div class="catalog-hero__gradient catalog-hero__gradient--1"></div>
            <div class="catalog-hero__gradient catalog-hero__gradient--2"></div>
            <div class="catalog-hero__pattern"></div>
        </div>
        <div class="container">
            <div class="catalog-hero__inner">
                <h1 class="catalog-hero__title">Каталог</h1>
                <p class="catalog-hero__subtitle">Откройте для себя мир премиальных интерьерных решений</p>
            </div>
        </div>
    </section>

    <?php if (!empty($catalogs)) : ?>
    <!-- Каталог категорий -->
    <section class="catalog-categories">
        <div class="container">
            <div class="catalog-categories__grid">
                <?php foreach ($catalogs as $i => $term) :
                    $term_link = get_term_link($term);
                    if (is_wp_error($term_link)) continue;

                    $img = get_field('catalog_image', 'product_catalog_' . $term->term_id);
                    $img_url = '';
                    if (!empty($img) && is_array($img) && !empty($img['url'])) {
                        $img_url = $img['url'];
                    } else {
                        $img_url = $default_images[$i % count($default_images)];
                    }
                    ?>
                    <a href="<?php echo esc_url($term_link); ?>" class="catalog-categories__card">
                        <div class="catalog-categories__image">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($term->name); ?>" class="catalog-categories__img" loading="lazy">
                        </div>
                        <h3 class="catalog-categories__title"><?php echo esc_html($term->name); ?></h3>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Форма заявки -->
    <?php get_template_part('template-parts/contact-form'); ?>
</main>

<?php get_footer(); ?>
