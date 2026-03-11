<?php
/**
 * Шаблон архива каталога (Столы, Стулья и т.д.)
 * Если у категории есть подкатегории — показываем их карточками.
 * Если нет — показываем товары.
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

    // Подкатегории (если есть)
    $subcategories = get_terms(array(
        'taxonomy'   => 'product_catalog',
        'hide_empty' => false,
        'parent'     => (int) $term->term_id,
        'number'     => 24,
    ));
    if (is_wp_error($subcategories)) {
        $subcategories = array();
    }
    $has_subcategories = !empty($subcategories);

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
    $parent_term = $term->parent ? get_term($term->parent, 'product_catalog') : null;
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
                <?php if ($parent_term && !is_wp_error($parent_term)) :
                    $parent_link = get_term_link($parent_term);
                    if (!is_wp_error($parent_link)) : ?>
                <li class="category-breadcrumb__item">
                    <a href="<?php echo esc_url($parent_link); ?>" class="category-breadcrumb__link"><?php echo esc_html($parent_term->name); ?></a>
                </li>
                <?php endif; endif; ?>
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

    <?php if ($has_subcategories) : ?>
    <!-- Подкатегории карточками -->
    <section class="catalog-categories">
        <div class="container">
            <div class="catalog-categories__grid">
                <?php foreach ($subcategories as $i => $subterm) :
                    $term_link = get_term_link($subterm);
                    if (is_wp_error($term_link)) continue;

                    $img = get_field('catalog_image', 'product_catalog_' . $subterm->term_id);
                    $img_url = '';
                    if (!empty($img) && is_array($img) && !empty($img['url'])) {
                        $img_url = $img['url'];
                    } else {
                        $img_url = $default_images[$i % count($default_images)];
                    }
                    ?>
                    <a href="<?php echo esc_url($term_link); ?>" class="catalog-categories__card">
                        <div class="catalog-categories__image">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($subterm->name); ?>" class="catalog-categories__img" loading="lazy">
                        </div>
                        <h3 class="catalog-categories__title"><?php echo esc_html($subterm->name); ?></h3>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php else : ?>
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
    <?php endif; ?>

    <!-- Форма заявки -->
    <?php get_template_part('template-parts/contact-form'); ?>
</main>

<?php get_footer(); ?>
