<?php
/**
 * Шаблон результатов поиска
 * Тексты из ACF Options «Поиск» (acf-options-search)
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-search';

$srch = function($key, $default = '') {
    $v = function_exists('get_field') ? get_field($key, 'option') : '';
    return ($v !== '' && $v !== null && $v !== false) ? $v : $default;
};
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <?php
    global $wp_query;
    $catalog_url = fabrica_get_catalog_page_url();
    $search_query = get_search_query();
    $found_posts = $wp_query->found_posts;
    $has_query = !empty($search_query);
    ?>
    <!-- Хлебные крошки -->
    <nav class="category-breadcrumb" aria-label="Хлебные крошки">
        <div class="container">
            <ol class="category-breadcrumb__list">
                <li class="category-breadcrumb__item">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="category-breadcrumb__link">Главная</a>
                </li>
                <li class="category-breadcrumb__item" aria-current="page">Поиск<?php echo $search_query ? ': «' . esc_html($search_query) . '»' : ''; ?></li>
            </ol>
        </div>
    </nav>

    <!-- Hero категории -->
    <section class="category-hero">
        <div class="container">
            <div class="category-hero__inner">
                <h1 class="category-hero__title"><?php echo $has_query ? 'Результаты поиска: «' . esc_html($search_query) . '»' : 'Поиск'; ?></h1>
                <p class="category-hero__subtitle"><?php echo $has_query ? 'Найдено записей: ' . (int) $found_posts : esc_html($srch('search_subtitle_no_query', 'Введите запрос в поле поиска в шапке сайта.')); ?></p>
            </div>
        </div>
    </section>

    <!-- Результаты -->
    <section class="category-products">
        <div class="container">
            <?php if (have_posts()) : ?>
            <div class="category-products__grid">
                <?php
                while (have_posts()) :
                    the_post();
                    $post_id = get_the_ID();
                    $post_type = get_post_type($post_id);
                    if ($post_type === 'fabrica_product') {
                        get_template_part('template-parts/product-card', null, array('product_id' => $post_id));
                    } elseif ($post_type === 'fabrica_service') {
                        get_template_part('template-parts/service-card', null, array('service_id' => $post_id));
                    } elseif ($post_type === 'fabrica_project') {
                        get_template_part('template-parts/project-card', null, array('project_id' => $post_id));
                    } elseif ($post_type === 'post') {
                        get_template_part('template-parts/blog-card', null, array('post_id' => $post_id));
                    } else {
                        $link = get_permalink($post_id);
                        $title = get_the_title($post_id);
                        $excerpt = has_excerpt($post_id) ? get_the_excerpt($post_id) : wp_trim_words(get_the_content(), 20);
                        $pt_obj = get_post_type_object($post_type);
                        $type_label = $pt_obj ? $pt_obj->labels->singular_name : $post_type;
                        $thumb_id = get_post_thumbnail_id($post_id);
                        $img_url = $thumb_id ? get_the_post_thumbnail_url($post_id, 'medium_large') : '';
                        ?>
                        <a href="<?php echo esc_url($link); ?>" class="product-card search-result-card" style="display:block; padding:0; background:#fff; border-radius:12px; border:1px solid rgba(198,161,91,0.2); overflow:hidden;">
                            <?php if ($img_url) : ?>
                            <div class="search-result-card__image" style="aspect-ratio:16/10; background:#f5f5f5;">
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>" style="width:100%; height:100%; object-fit:cover;" loading="lazy">
                            </div>
                            <?php endif; ?>
                            <div style="padding:20px;">
                                <h3 class="product-card__title" style="margin:0 0 8px;"><?php echo esc_html($title); ?></h3>
                                <p style="margin:0; font-size:14px; color:#666;"><?php echo esc_html($excerpt); ?></p>
                                <span style="font-size:12px; color:var(--color-accent); margin-top:8px; display:inline-block;"><?php echo esc_html($type_label); ?> →</span>
                            </div>
                        </a>
                        <?php
                    }
                endwhile;
                ?>
            </div>
            <?php the_posts_pagination(array('mid_size' => 2)); ?>
            <?php else : ?>
            <?php
            $empty_title = $has_query ? $srch('search_empty_title_has_query', 'Ничего не найдено') : $srch('search_empty_title_no_query', 'Введите запрос');
            $empty_text_tpl = $has_query ? $srch('search_empty_text_has_query', 'По запросу «%s» ничего не найдено. Попробуйте другие слова или перейдите в каталог.') : $srch('search_empty_text_no_query', 'Введите слово или фразу в поле поиска в шапке сайта.');
            $empty_text = $has_query ? sprintf($empty_text_tpl, esc_html($search_query)) : $empty_text_tpl;
            ?>
            <div class="search-empty" id="search-results-empty">
                <h2 class="search-empty__title"><?php echo esc_html($empty_title); ?></h2>
                <p class="search-empty__text"><?php echo esc_html($empty_text); ?></p>
                <a href="<?php echo esc_url($catalog_url); ?>" class="button button--primary" style="margin-top:16px; display:inline-block;"><?php echo esc_html($srch('search_empty_btn', 'Перейти в каталог')); ?></a>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Форма заявки -->
    <?php get_template_part('template-parts/contact-form'); ?>
</main>

<?php get_footer(); ?>
