<?php
/**
 * Контент страницы «Проекты»
 *
 * @package Fabrica
 */

if (!isset($t)) {
    $t = get_template_directory_uri();
}

$page_id = get_the_ID();
$d = function($key, $default = '') use ($page_id) {
    return function_exists('get_field') ? (get_field($key, $page_id) ?: $default) : $default;
};

$badge = $d('projects_page_badge', 'Портфолио');
$title_1 = $d('projects_page_title_1', 'Наши');
$title_2 = $d('projects_page_title_2', 'проекты');
$subtitle = $d('projects_page_subtitle', 'Реализованные интерьерные решения для частных домов, офисов, ресторанов и гостиниц. Каждый проект — уникальное пространство, созданное с вниманием к деталям.');
$stat_1_num = $d('projects_page_stat_1_number', '100+');
$stat_1_label = $d('projects_page_stat_1_label', 'реализованных проектов');
$stat_2_num = $d('projects_page_stat_2_number', '9+');
$stat_2_label = $d('projects_page_stat_2_label', 'лет опыта');

$projects_query = new WP_Query(array(
    'post_type'      => 'fabrica_project',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order title',
    'order'          => 'ASC',
    'post_status'    => 'publish',
));
?>
<main class="main" role="main" id="main-content">

    <!-- Hero -->
    <section class="projects-hero">
        <div class="projects-hero__background">
            <div class="projects-hero__gradient projects-hero__gradient--1"></div>
            <div class="projects-hero__gradient projects-hero__gradient--2"></div>
            <div class="projects-hero__pattern"></div>
        </div>
        <div class="container">
            <div class="projects-hero__inner">
                <div class="projects-hero__content">
                    <?php if ($badge) : ?>
                    <div class="projects-hero__badge">
                        <span class="projects-hero__badge-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                <line x1="9" y1="3" x2="9" y2="21"/>
                                <line x1="3" y1="9" x2="21" y2="9"/>
                            </svg>
                        </span>
                        <?php echo esc_html($badge); ?>
                    </div>
                    <?php endif; ?>
                    <h1 class="projects-hero__title">
                        <?php if ($title_1) : ?>
                        <span class="projects-hero__title-line"><?php echo esc_html($title_1); ?></span>
                        <?php endif; ?>
                        <?php if ($title_2) : ?>
                        <span class="projects-hero__title-line projects-hero__title-line--accent"><?php echo esc_html($title_2); ?></span>
                        <?php endif; ?>
                    </h1>
                    <?php if ($subtitle) : ?>
                    <p class="projects-hero__subtitle"><?php echo esc_html($subtitle); ?></p>
                    <?php endif; ?>
                    <div class="projects-hero__stats">
                        <div class="projects-hero__stat">
                            <div class="projects-hero__stat-number"><?php echo esc_html($stat_1_num); ?></div>
                            <div class="projects-hero__stat-label"><?php echo esc_html($stat_1_label); ?></div>
                        </div>
                        <div class="projects-hero__stat">
                            <div class="projects-hero__stat-number"><?php echo esc_html($stat_2_num); ?></div>
                            <div class="projects-hero__stat-label"><?php echo esc_html($stat_2_label); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Галерея проектов -->
    <section class="projects-gallery animate-on-scroll">
        <div class="container">
            <div class="projects-gallery__grid" id="projectsGrid">
                <?php
                if ($projects_query->have_posts()) :
                    $idx = 0;
                    while ($projects_query->have_posts()) :
                        $projects_query->the_post();
                        $pid = (int) get_the_ID();
                        $ppost = get_post($pid);
                        if (!$ppost || $ppost->post_type !== 'fabrica_project') {
                            continue;
                        }
                        $ptitle = get_the_title($pid);
                        $plink = get_permalink($pid);
                        $pterms = get_the_terms($pid, 'project_category');
                        $pcat = ($pterms && !is_wp_error($pterms)) ? $pterms[0]->name : '';
                        $pimg = function_exists('get_field') ? get_field('project_image', $pid) : null;
                        $pimg_url = '';
                        if (!empty($pimg) && is_array($pimg) && !empty($pimg['url'])) {
                            $pimg_url = $pimg['url'];
                        } elseif (has_post_thumbnail($pid)) {
                            $pimg_url = get_the_post_thumbnail_url($pid, 'large');
                        }
                        if (empty($pimg_url)) {
                            $pimg_url = get_template_directory_uri() . '/img/16.webp';
                        }
                        ?>
                        <a href="<?php echo esc_url($plink); ?>" class="projects-gallery__item" data-project-id="<?php echo (int) $pid; ?>">
                            <div class="projects-gallery__image">
                                <img src="<?php echo esc_url($pimg_url); ?>" alt="<?php echo esc_attr($ptitle); ?>" class="projects-gallery__img" loading="lazy">
                                <div class="projects-gallery__overlay">
                                    <div class="projects-gallery__content">
                                        <h3 class="projects-gallery__name"><?php echo esc_html($ptitle); ?></h3>
                                        <?php if ($pcat) : ?>
                                        <p class="projects-gallery__category"><?php echo esc_html($pcat); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php
                        $idx++;
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p class="projects-gallery__empty">Проекты пока не добавлены. <a href="<?php echo esc_url(admin_url('post-new.php?post_type=fabrica_project')); ?>">Добавить первый проект</a></p>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/contact-form'); ?>

</main>
