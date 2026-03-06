<?php
/**
 * Шаблон отдельной записи блога
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-single page-blog-single';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <?php
    while (have_posts()) :
        the_post();
        $post_id = get_the_ID();
        $terms = get_the_category($post_id);
        $category_name = $terms && !is_wp_error($terms) ? $terms[0]->name : '';
        $tags = get_the_tags($post_id);
        $blog_url = fabrica_get_blog_page_url();
        $thumb_id = get_post_thumbnail_id($post_id);
        $img_url = $thumb_id ? get_the_post_thumbnail_url($post_id, 'large') : $t . '/img/16.webp';
        ?>
        <nav class="article-breadcrumb" aria-label="Хлебные крошки">
            <div class="container">
                <ol class="article-breadcrumb__list">
                    <li class="article-breadcrumb__item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="article-breadcrumb__link">Главная</a>
                    </li>
                    <li class="article-breadcrumb__item">
                        <a href="<?php echo esc_url($blog_url); ?>" class="article-breadcrumb__link">Блог</a>
                    </li>
                    <li class="article-breadcrumb__item" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </div>
        </nav>

        <section class="article-hero">
            <div class="container">
                <div class="article-hero__image">
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>" class="article-hero__img" loading="eager">
                </div>
                <div class="article-hero__content">
                    <div class="article-hero__meta">
                        <?php if ($category_name) : ?>
                        <span class="article-hero__category"><?php echo esc_html($category_name); ?></span>
                        <?php endif; ?>
                        <span class="article-hero__date"><?php the_date('j M Y'); ?></span>
                    </div>
                    <h1 class="article-hero__title"><?php the_title(); ?></h1>
                    <?php if (has_excerpt()) : ?>
                    <p class="article-hero__lead"><?php the_excerpt(); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <article class="article-content">
            <div class="container">
                <div class="article-content__inner">
                    <div class="article-content__main">
                        <div class="article-content__text">
                            <?php the_content(); ?>
                        </div>
                        <?php if ($tags && !is_wp_error($tags)) : ?>
                        <div class="article-content__tags">
                            <span class="article-content__tags-label">Теги:</span>
                            <?php foreach ($tags as $tag) : ?>
                            <a href="<?php echo esc_url(get_tag_link($tag)); ?>" class="article-content__tag"><?php echo esc_html($tag->name); ?></a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <aside class="article-content__sidebar">
                        <?php
                        $related = new WP_Query(array(
                            'post_type'      => 'post',
                            'posts_per_page' => 3,
                            'post__not_in'   => array($post_id),
                            'orderby'        => 'rand',
                            'post_status'    => 'publish',
                        ));
                        if ($related->have_posts()) :
                        ?>
                        <div class="article-sidebar">
                            <div class="article-sidebar__block">
                                <h3 class="article-sidebar__title">Похожие статьи</h3>
                                <div class="article-sidebar__articles">
                                    <?php while ($related->have_posts()) : $related->the_post();
                                        $r_img = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                                        if (!$r_img) $r_img = $t . '/img/16.webp';
                                    ?>
                                    <article class="article-sidebar__item">
                                        <a href="<?php the_permalink(); ?>" class="article-sidebar__link">
                                            <img src="<?php echo esc_url($r_img); ?>" alt="<?php the_title_attribute(); ?>" class="article-sidebar__img">
                                            <div class="article-sidebar__content">
                                                <h4 class="article-sidebar__title-small"><?php the_title(); ?></h4>
                                                <span class="article-sidebar__date"><?php the_date('j M Y'); ?></span>
                                            </div>
                                        </a>
                                    </article>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </aside>
                </div>
            </div>
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
