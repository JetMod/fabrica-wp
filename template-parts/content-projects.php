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

$d_bool = function($key, $default = true) use ($page_id) {
    if (!function_exists('get_field')) {
        return $default;
    }
    $v = get_field($key, $page_id);
    if ($v === null || $v === '') {
        return $default;
    }
    return (bool) filter_var($v, FILTER_VALIDATE_BOOLEAN);
};

$badge = $d('projects_page_badge', 'Портфолио');
$title_1 = $d('projects_page_title_1', 'Наши');
$title_2 = $d('projects_page_title_2', 'проекты');
$subtitle = $d('projects_page_subtitle', 'Реализованные интерьерные решения для частных домов, офисов, ресторанов и гостиниц. Каждый проект — уникальное пространство, созданное с вниманием к деталям.');
$stat_1_num = $d('projects_page_stat_1_number', '100+');
$stat_1_label = $d('projects_page_stat_1_label', 'реализованных проектов');
$stat_2_num = $d('projects_page_stat_2_number', '9+');
$stat_2_label = $d('projects_page_stat_2_label', 'лет опыта');
$scroll_label = $d('projects_page_scroll_label', 'Смотреть работы');

$show_hero_visual = $d_bool('projects_page_show_hero_visual', true);
$show_visual_caption = $d_bool('projects_page_show_visual_caption', true);
$show_hero_ambient = $d_bool('projects_page_show_hero_ambient', true);
$show_hero_corners = $d_bool('projects_page_show_hero_corners', true);

$visual_caption_custom = '';
if (function_exists('get_field')) {
    $vc = get_field('projects_page_visual_caption', $page_id);
    if (is_string($vc)) {
        $visual_caption_custom = trim($vc);
    }
}
$visual_caption_text = $visual_caption_custom !== '' ? $visual_caption_custom : ($badge ?: 'Портфолио');

$watermark_text = 'ПОРТФОЛИО';
if (function_exists('get_field')) {
    $wm = get_field('projects_page_watermark', $page_id);
    if ($wm !== null && $wm !== false) {
        $watermark_text = trim((string) $wm);
    }
}

$hero_preview_items = array();
if ($show_hero_visual) {
    $hero_from_acf = array();
    if (function_exists('get_field')) {
        foreach (array(1, 2, 3) as $hero_img_n) {
            $img = get_field('projects_page_hero_image_' . $hero_img_n, $page_id);
            if (empty($img)) {
                continue;
            }
            $img_url = '';
            $img_alt = '';
            if (is_array($img) && !empty($img['url'])) {
                $img_url = $img['url'];
                if (!empty($img['alt'])) {
                    $img_alt = $img['alt'];
                } elseif (!empty($img['ID'])) {
                    $img_alt = (string) get_post_meta((int) $img['ID'], '_wp_attachment_image_alt', true);
                }
            } elseif (is_numeric($img)) {
                $aid = (int) $img;
                $img_url = wp_get_attachment_image_url($aid, 'large');
                if ($img_url) {
                    $img_alt = (string) get_post_meta($aid, '_wp_attachment_image_alt', true);
                }
            }
            if ($img_url !== '') {
                $hero_from_acf[] = array(
                    'url' => $img_url,
                    'alt' => $img_alt !== '' ? $img_alt : ($badge ?: 'Портфолио'),
                );
            }
        }
    }

    if (!empty($hero_from_acf)) {
        $hero_preview_items = $hero_from_acf;
    } else {
        $hero_q = new WP_Query(array(
            'post_type'      => 'fabrica_project',
            'posts_per_page' => 3,
            'orderby'        => 'menu_order title',
            'order'          => 'ASC',
            'post_status'    => 'publish',
        ));
        if ($hero_q->have_posts()) {
            while ($hero_q->have_posts()) {
                $hero_q->the_post();
                $hpid = (int) get_the_ID();
                $pimg = function_exists('get_field') ? get_field('project_image', $hpid) : null;
                $pimg_url = '';
                if (!empty($pimg) && is_array($pimg) && !empty($pimg['url'])) {
                    $pimg_url = $pimg['url'];
                } elseif (has_post_thumbnail($hpid)) {
                    $pimg_url = get_the_post_thumbnail_url($hpid, 'large');
                }
                if (empty($pimg_url)) {
                    $pimg_url = get_template_directory_uri() . '/img/16.webp';
                }
                $hero_preview_items[] = array(
                    'url' => $pimg_url,
                    'alt' => get_the_title($hpid),
                );
            }
            wp_reset_postdata();
        }
    }
}

$paged = function_exists('fabrica_get_paged_for_page_template') ? fabrica_get_paged_for_page_template() : 1;
$projects_query = new WP_Query(array(
    'post_type'      => 'fabrica_project',
    'posts_per_page' => 12,
    'paged'          => $paged,
    'orderby'        => 'menu_order title',
    'order'          => 'ASC',
    'post_status'    => 'publish',
));
?>
<main class="main" role="main" id="main-content">

    <!-- Hero -->
    <section class="projects-hero<?php echo $show_hero_visual ? '' : ' projects-hero--no-visual'; ?>">
        <div class="projects-hero__background">
            <div class="projects-hero__gradient projects-hero__gradient--1"></div>
            <div class="projects-hero__gradient projects-hero__gradient--2"></div>
            <div class="projects-hero__pattern"></div>
        </div>
        <?php if ($show_hero_ambient) : ?>
        <div class="projects-hero__ambient" aria-hidden="true">
            <div class="projects-hero__ambient-dots"></div>
            <div class="projects-hero__ambient-diagonal"></div>
            <div class="projects-hero__ambient-shimmer"></div>
            <div class="projects-hero__ambient-arc"></div>
        </div>
        <?php endif; ?>
        <?php if ($watermark_text !== '') : ?>
        <div class="projects-hero__watermark" aria-hidden="true"><?php echo esc_html($watermark_text); ?></div>
        <?php endif; ?>
        <?php if ($show_hero_corners) : ?>
        <span class="projects-hero__corner projects-hero__corner--tl"></span>
        <span class="projects-hero__corner projects-hero__corner--tr"></span>
        <span class="projects-hero__corner projects-hero__corner--bl"></span>
        <span class="projects-hero__corner projects-hero__corner--br"></span>
        <?php endif; ?>
        <div class="container">
            <div class="projects-hero__layout">
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
                    <a href="#projectsGrid" class="projects-hero__scroll">
                        <span class="projects-hero__scroll-label"><?php echo esc_html($scroll_label); ?></span>
                        <span class="projects-hero__scroll-icon" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 9l6 6 6-6"/>
                            </svg>
                        </span>
                    </a>
                </div>
                <?php if ($show_hero_visual) : ?>
                <div class="projects-hero__visual" aria-hidden="true">
                    <div class="projects-hero__visual-ring"></div>
                    <div class="projects-hero__visual-stack">
                        <?php
                        $stack_classes = array('projects-hero__frame--back', 'projects-hero__frame--mid', 'projects-hero__frame--front');
                        foreach ($hero_preview_items as $i => $item) :
                            $sc = isset($stack_classes[$i]) ? $stack_classes[$i] : 'projects-hero__frame--front';
                            ?>
                        <div class="projects-hero__frame <?php echo esc_attr($sc); ?>">
                            <img src="<?php echo esc_url($item['url']); ?>" alt="<?php echo esc_attr($item['alt']); ?>" class="projects-hero__frame-img" loading="eager" decoding="async">
                        </div>
                            <?php
                        endforeach;
                        if (empty($hero_preview_items)) :
                            ?>
                        <div class="projects-hero__frame projects-hero__frame--placeholder projects-hero__frame--back"></div>
                        <div class="projects-hero__frame projects-hero__frame--placeholder projects-hero__frame--mid"></div>
                        <div class="projects-hero__frame projects-hero__frame--placeholder projects-hero__frame--front">
                            <svg class="projects-hero__placeholder-icon" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.25">
                                <rect x="3" y="3" width="18" height="18" rx="2"/>
                                <circle cx="8.5" cy="8.5" r="1.5" fill="currentColor"/>
                                <path d="M21 15l-5-5L5 21"/>
                            </svg>
                        </div>
                            <?php
                        endif;
                        ?>
                    </div>
                    <?php if ($show_visual_caption) : ?>
                    <p class="projects-hero__visual-caption"><?php echo esc_html($visual_caption_text); ?></p>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Галерея проектов -->
    <section class="projects-gallery animate-on-scroll">
        <div class="container">
            <div class="projects-gallery__grid" id="projectsGrid">
                <?php
                if ($projects_query->have_posts()) :
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
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <p class="projects-gallery__empty">Проекты пока не добавлены. <a href="<?php echo esc_url(admin_url('post-new.php?post_type=fabrica_project')); ?>">Добавить первый проект</a></p>
                    <?php
                endif;
                ?>
            </div>
            <?php
            if ($projects_query->max_num_pages > 1) {
                global $wp_query;
                $tmp_main = $wp_query;
                $wp_query = $projects_query;
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '←',
                    'next_text' => '→',
                ));
                $wp_query = $tmp_main;
            }
            ?>
        </div>
    </section>

    <?php get_template_part('template-parts/contact-form'); ?>

</main>
