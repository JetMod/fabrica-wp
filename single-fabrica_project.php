<?php
/**
 * Шаблон страницы проекта
 *
 * @package Fabrica
 */

$t = get_template_directory_uri();
$body_class = 'page-project-single';
?>
<?php get_template_part('inc/header-document'); ?>
<?php get_header(); ?>

<main class="main" role="main" id="main-content">
    <?php
    while (have_posts()) :
        the_post();
        $project_id = get_the_ID();
        $image_arr = get_field('project_image', $project_id);
        $image_url = '';
        if (!empty($image_arr) && is_array($image_arr) && !empty($image_arr['url'])) {
            $image_url = $image_arr['url'];
        } elseif (has_post_thumbnail($project_id)) {
            $image_url = get_the_post_thumbnail_url($project_id, 'large');
        }
        if (empty($image_url)) {
            $image_url = $t . '/img/16.webp';
        }
        $terms = get_the_terms($project_id, 'project_category');
        $category_name = '';
        if ($terms && !is_wp_error($terms)) {
            $category_name = $terms[0]->name;
        }
        $projects_page_url = function_exists('get_field') ? get_field('projects_view_all_url', 'option') : '';
        if (empty($projects_page_url)) {
            $pages = get_posts(array(
                'post_type'      => 'page',
                'posts_per_page' => 1,
                'meta_key'       => '_wp_page_template',
                'meta_value'     => 'templates/template-projects.php',
            ));
            $projects_page_url = $pages ? get_permalink($pages[0]) : home_url('/');
        }
        ?>
        <nav class="project-breadcrumb" aria-label="Хлебные крошки">
            <div class="container">
                <ol class="project-breadcrumb__list">
                    <li class="project-breadcrumb__item">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="project-breadcrumb__link">Главная</a>
                    </li>
                    <li class="project-breadcrumb__item">
                        <a href="<?php echo esc_url($projects_page_url); ?>" class="project-breadcrumb__link">Проекты</a>
                    </li>
                    <li class="project-breadcrumb__item" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </div>
        </nav>

        <section class="project-hero">
            <div class="container">
                <div class="project-hero__inner">
                    <div class="project-hero__image">
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" class="project-hero__img" loading="eager">
                    </div>
                    <div class="project-hero__content">
                        <?php if ($category_name) : ?>
                        <span class="project-hero__category"><?php echo esc_html($category_name); ?></span>
                        <?php endif; ?>
                        <h1 class="project-hero__title"><?php the_title(); ?></h1>
                        <?php if (has_excerpt()) : ?>
                        <p class="project-hero__lead"><?php the_excerpt(); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php if (get_the_content()) : ?>
        <section class="project-about animate-on-scroll">
            <div class="container">
                <div class="project-about__inner">
                    <div class="project-about__content">
                        <h2 class="project-about__title">О проекте</h2>
                        <div class="project-about__text">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php if ($category_name) : ?>
                    <aside class="project-about__meta">
                        <div class="project-meta">
                            <div class="project-meta__row">
                                <span class="project-meta__label">Тип объекта</span>
                                <span class="project-meta__value"><?php echo esc_html($category_name); ?></span>
                            </div>
                        </div>
                    </aside>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <section class="project-cta animate-on-scroll" id="contact-form">
            <div class="container">
                <div class="project-cta__inner">
                    <h2 class="project-cta__title">Хотите похожий проект?</h2>
                    <p class="project-cta__text">Оставьте заявку — обсудим ваше пространство и подберём мебель и отделку под задачу.</p>
                    <a href="tel:+79785977442" class="project-cta__button">
                        <span>Обсудить проект</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        <?php
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
