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
    <div class="container" style="padding: 60px 20px;">
        <?php
        while (have_posts()) :
            the_post();
            $product_id = get_the_ID();
            $image_arr = get_field('product_image', $product_id);
            $image_url = '';
            if (!empty($image_arr) && is_array($image_arr) && !empty($image_arr['url'])) {
                $image_url = $image_arr['url'];
            } elseif (has_post_thumbnail($product_id)) {
                $image_url = get_the_post_thumbnail_url($product_id, 'large');
            }
            if (empty($image_url)) {
                $image_url = $t . '/img/16.webp';
            }
            $price = get_field('product_price', $product_id) ?: 'По запросу';
            $price_old = get_field('product_price_old', $product_id) ?: '';
            $status = get_field('product_status', $product_id) ?: 'order';
            $status_text = ($status === 'available') ? 'В наличии' : 'Под заказ';
            ?>
            <article id="product-<?php the_ID(); ?>" <?php post_class('product-single'); ?> data-product-id="<?php echo (int) $product_id; ?>">
                <div class="product-single__inner" style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: start;">
                    <div class="product-single__gallery">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" style="width: 100%; height: auto; border-radius: 8px;">
                    </div>
                    <div class="product-single__info">
                        <h1 class="product-single__title" style="margin: 0 0 16px; font-size: 1.75rem;"><?php the_title(); ?></h1>
                        <p class="product-single__status" style="margin: 0 0 16px; color: #666;"><?php echo esc_html($status_text); ?></p>
                        <div class="product-single__price" style="margin: 0 0 24px; font-size: 1.25rem;">
                            <span class="product-single__price-current"><?php echo esc_html($price); ?></span>
                            <?php if ($price_old) : ?>
                            <span class="product-single__price-old" style="text-decoration: line-through; color: #999; margin-left: 8px;"><?php echo esc_html($price_old); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="product-single__content" style="margin: 0 0 24px;">
                            <?php the_content(); ?>
                        </div>
                        <button type="button" class="button button--primary" data-callback-modal>Узнать цену</button>
                    </div>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>
