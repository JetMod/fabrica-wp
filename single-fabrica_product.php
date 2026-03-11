<?php
/**
 * Шаблон страницы товара
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-product';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <?php
    while (have_posts()) :
        the_post();
        $product_id = get_the_ID();
        $title = get_the_title();

        // Изображения: галерея или главное
        $gallery = get_field('product_gallery', $product_id);
        $image_arr = get_field('product_image', $product_id);
        $images = array();
        if (!empty($gallery) && is_array($gallery)) {
            foreach ($gallery as $img) {
                if (!empty($img['url'])) {
                    $images[] = $img;
                }
            }
        }
        if (empty($images) && !empty($image_arr) && is_array($image_arr) && !empty($image_arr['url'])) {
            $images[] = $image_arr;
        }
        if (empty($images) && has_post_thumbnail($product_id)) {
            $thumb_id = get_post_thumbnail_id($product_id);
            $images[] = array('url' => get_the_post_thumbnail_url($product_id, 'large'), 'alt' => $title);
        }
        if (empty($images)) {
            $images[] = array('url' => $t . '/img/16.webp', 'alt' => $title);
        }

        $price = get_field('product_price', $product_id) ?: 'По запросу';
        $price_old = get_field('product_price_old', $product_id) ?: '';
        $status = get_field('product_status', $product_id) ?: 'order';
        $status_class = ($status === 'available') ? 'product-info__status--available' : 'product-info__status--order';
        $status_text = ($status === 'available') ? 'В наличии' : 'Под заказ';

        $badge = get_field('product_badge', $product_id) ?: '';
        $badge_text = '';
        if ($badge === 'final') {
            $badge_text = 'Финальная цена';
        } elseif ($badge === 'trend') {
            $badge_text = 'Тренд';
        }

        $description = get_field('product_description', $product_id) ?: '';
        $description_full = get_field('product_description_full', $product_id) ?: '';
        $specs = get_field('product_specs', $product_id) ?: array();

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

        // Каталог товара (для хлебных крошек)
        $product_terms = get_the_terms($product_id, 'product_catalog');
        $product_catalog = null;
        if ($product_terms && !is_wp_error($product_terms) && !empty($product_terms)) {
            $product_catalog = $product_terms[0];
        }

        $heart_svg = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/></svg>';
        ?>
        <!-- Хлебные крошки -->
        <nav class="product-breadcrumb" aria-label="Хлебные крошки">
            <div class="container">
                <ol class="product-breadcrumb__list">
                    <li class="product-breadcrumb__item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="product-breadcrumb__link">Главная</a>
                    </li>
                    <li class="product-breadcrumb__item">
                        <a href="<?php echo esc_url($catalog_url); ?>" class="product-breadcrumb__link">Каталог</a>
                    </li>
                    <?php if ($product_catalog) : ?>
                    <li class="product-breadcrumb__item">
                        <a href="<?php echo esc_url(get_term_link($product_catalog)); ?>" class="product-breadcrumb__link"><?php echo esc_html($product_catalog->name); ?></a>
                    </li>
                    <?php endif; ?>
                    <li class="product-breadcrumb__item" aria-current="page"><?php echo esc_html($title); ?></li>
                </ol>
            </div> 
        </nav>

        <!-- Основная секция товара -->
        <section class="product-main">
            <div class="container">
                <div class="product-main__inner">
                    <!-- Галерея -->
                    <div class="product-gallery">
                        <div class="product-gallery__main" id="mainImage">
                            <?php foreach ($images as $i => $img) : ?>
                            <div class="product-gallery__main-slide<?php echo $i === 0 ? ' active' : ''; ?>">
                                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt'] ?? $title . ' — вид ' . ($i + 1)); ?>" class="product-gallery__main-img">
                            </div>
                            <?php endforeach; ?>
                            <?php if (count($images) > 1) : ?>
                            <button type="button" class="product-gallery__nav product-gallery__nav--prev" aria-label="Предыдущее фото">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M15 18l-6-6 6-6"/>
                                </svg>
                            </button>
                            <button type="button" class="product-gallery__nav product-gallery__nav--next" aria-label="Следующее фото">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M9 18l6-6-6-6"/>
                                </svg>
                            </button>
                            <?php endif; ?>
                        </div>
                        <?php if (count($images) > 1) : ?>
                        <div class="product-gallery__thumbs">
                            <?php foreach ($images as $i => $img) : ?>
                            <button type="button" class="product-gallery__thumb<?php echo $i === 0 ? ' active' : ''; ?>" aria-label="Фото <?php echo $i + 1; ?>">
                                <img src="<?php echo esc_url($img['url']); ?>" alt="" class="product-gallery__thumb-img">
                            </button>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Информация о товаре -->
                    <div class="product-info">
                        <?php if ($badge_text) : ?>
                        <span class="product-info__badge"><?php echo esc_html($badge_text); ?></span>
                        <?php endif; ?>
                        <h1 class="product-info__title"><?php echo esc_html($title); ?></h1>
                        <span class="product-info__status <?php echo esc_attr($status_class); ?>"><?php echo esc_html($status_text); ?></span>
                        <div class="product-info__price">
                            <span class="product-info__price-current"><?php echo esc_html($price); ?></span>
                            <?php if ($price_old) : ?>
                            <span class="product-info__price-old"><?php echo esc_html($price_old); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if ($description) : ?>
                        <div class="product-info__description">
                            <p><?php echo nl2br(esc_html($description)); ?></p>
                        </div>
                        <?php endif; ?>
                        <div class="product-info__actions">
                            <a href="#contact-form" class="product-info__button product-info__button--primary">Оставить заявку</a>
                            <button type="button" class="product-info__button product-info__button--secondary" id="addToFavorites" aria-label="В избранное">
                                <?php echo $heart_svg; ?>
                            </button>
                        </div>
                        <?php if (!empty($specs)) : ?>
                        <div class="product-info__specs">
                            <h3 class="product-info__specs-title">Характеристики</h3>
                            <ul class="product-info__specs-list">
                                <?php foreach ($specs as $spec) :
                                    $label = isset($spec['spec_label']) ? trim($spec['spec_label']) : '';
                                    $value = isset($spec['spec_value']) ? trim($spec['spec_value']) : '';
                                    if ($label === '' && $value === '') continue;
                                ?>
                                <li class="product-info__spec-item">
                                    <span class="product-info__spec-label"><?php echo esc_html($label ?: '—'); ?></span>
                                    <span class="product-info__spec-value"><?php echo esc_html($value ?: '—'); ?></span>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php if ($description_full) : ?>
        <!-- Описание товара -->
        <section class="product-description">
            <div class="container">
                <div class="product-description__inner">
                    <h2 class="product-description__title">О товаре</h2>
                    <div class="product-description__text">
                        <?php echo $description_full; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Похожие товары -->
        <?php
        $related_args = array(
            'post_type'      => 'fabrica_product',
            'posts_per_page' => 4,
            'post__not_in'   => array($product_id),
            'orderby'        => 'rand',
        );
        if ($product_catalog) {
            $related_args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_catalog',
                    'field'    => 'term_id',
                    'terms'    => $product_catalog->term_id,
                ),
            );
        }
        $related = get_posts($related_args);
        if (empty($related) && $product_catalog) {
            unset($related_args['tax_query']);
            $related = get_posts($related_args);
        }
        if (!empty($related)) :
        ?>
        <section class="product-related">
            <div class="container">
                <h2 class="product-related__title">Похожие товары</h2>
                <div class="product-related__grid">
                    <?php foreach ($related as $rel_post) :
                        get_template_part('template-parts/product-card', null, array('product_id' => $rel_post->ID));
                    endforeach; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Форма заявки -->
        <?php get_template_part('template-parts/contact-form'); ?>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
