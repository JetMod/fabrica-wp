<?php
if (!isset($t)) {
    $t = get_template_directory_uri();
}
?>
   <!-- Header -->
   <header class="header">
        <!-- Верхний хедер -->
        <div class="header__top">
            <div class="container">
                <div class="header__top-inner">
                    <!-- Верхнее меню -->
                    <?php
                    $top_nav = function_exists('get_field') ? get_field('header_top_nav', 'option') : array();
                    $top_nav_default = array(
                        array('label' => 'О нас', 'preset' => 'office', 'url' => ''),
                        array('label' => 'Услуги', 'preset' => 'services', 'url' => ''),
                        array('label' => 'Дизайнерам', 'preset' => 'designers', 'url' => ''),
                        array('label' => 'Бизнесу', 'preset' => 'business', 'url' => ''),
                        array('label' => 'Доставка', 'preset' => 'delivery', 'url' => ''),
                        array('label' => 'Проекты', 'preset' => 'projects', 'url' => ''),
                    );
                    $top_nav = !empty($top_nav) ? $top_nav : $top_nav_default;
                    ?>
                    <nav class="header__top-nav">
                        <?php foreach ($top_nav as $item) :
                            $label = !empty($item['label']) ? $item['label'] : '';
                            if (!$label) continue;
                            $url = !empty($item['url']) ? $item['url'] : '';
                            if (!$url && !empty($item['preset'])) {
                                $url = fabrica_get_url_by_preset($item['preset']);
                            }
                            if (!$url) $url = home_url('/');
                        ?>
                        <a href="<?php echo esc_url($url); ?>" class="header__top-link"><?php echo esc_html($label); ?></a>
                        <?php endforeach; ?>
                    </nav>

                    <!-- Правая часть -->
                    <?php
                    $top_right = function_exists('get_field') ? get_field('header_top_right', 'option') : array();
                    $top_right_default = array(
                        array('label' => 'Избранное', 'icon' => 'favorites', 'preset' => 'favorites', 'url' => ''),
                        array('label' => 'Каталог', 'icon' => 'catalog', 'preset' => 'catalog', 'url' => ''),
                    );
                    $top_right = !empty($top_right) ? $top_right : $top_right_default;
                    ?>
                    <div class="header__top-right">
                        <?php foreach ($top_right as $item) :
                            $label = !empty($item['label']) ? $item['label'] : '';
                            if (!$label) continue;
                            $url = !empty($item['url']) ? $item['url'] : '';
                            if (!$url && !empty($item['preset'])) {
                                $url = fabrica_get_url_by_preset($item['preset']);
                            }
                            if (!$url) $url = home_url('/');
                            $icon = isset($item['icon']) ? $item['icon'] : 'none';
                            $link_class = ($icon === 'catalog') ? ' header__top-link header__top-catalog' : ' header__top-link';
                        ?>
                        <a href="<?php echo esc_url($url); ?>" class="<?php echo esc_attr(trim($link_class)); ?>">
                            <?php if ($icon === 'favorites') : ?>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                            </svg>
                            <?php elseif ($icon === 'catalog') : ?>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 2h3v3H2V2zm5 0h3v3H7V2zm5 0h3v3h-3V2zM2 7h3v3H2V7zm5 0h3v3H7V7zm5 0h3v3h-3V7zM2 12h3v3H2v-3zm5 0h3v3H7v-3zm5 0h3v3h-3v-3z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <?php endif; ?>
                            <?php echo esc_html($label); ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Средний хедер -->
        <div class="header__middle">
            <div class="container">
                <div class="header__middle-inner">
                    <!-- Логотип + слоган -->
                    <?php
                    $header_logo = function_exists('get_field') ? get_field('header_logo', 'option') : null;
                    $header_logo_mobile = function_exists('get_field') ? get_field('header_logo_mobile', 'option') : null;
                    $logo_desktop = ($header_logo && !empty($header_logo['url'])) ? $header_logo['url'] : '';
                    $logo_mobile = ($header_logo_mobile && !empty($header_logo_mobile['url'])) ? $header_logo_mobile['url'] : $logo_desktop;
                    $logo_alt = ($header_logo && !empty($header_logo['alt'])) ? $header_logo['alt'] : get_bloginfo('name');
                    ?>
                    <div class="header__branding">
                        <?php if ($logo_desktop) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo">
                            <picture>
                                <?php if ($logo_mobile && $logo_mobile !== $logo_desktop) : ?>
                                <source media="(max-width: 768px)" srcset="<?php echo esc_url($logo_mobile); ?>">
                                <?php endif; ?>
                                <img src="<?php echo esc_url($logo_desktop); ?>" alt="<?php echo esc_attr($logo_alt); ?>" class="header__logo-img">
                            </picture>
                        </a>
                        <?php elseif (has_custom_logo()) : ?>
                            <div class="header__logo header__logo--custom"><?php the_custom_logo(); ?></div>
                        <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo">
                            <picture>
                                <source media="(max-width: 768px)" srcset="<?php echo esc_url($t . '/img/logo-mobile.jpg'); ?>">
                                <img src="<?php echo esc_url($t . '/img/logo.jpg'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="header__logo-img">
                            </picture>
                        </a>
                        <?php endif; ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="header__tagline"><?php echo wp_kses_post(nl2br(esc_html(fabrica_footer_option('header_tagline', "Дизайнерская мебель\nдля дома, работы и отдыха")))); ?></a>
                    </div>

                    <!-- Поиск -->
                    <form class="header__search" action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search">
                        <input type="search" name="s" placeholder="<?php echo esc_attr(fabrica_footer_option('header_search_placeholder', 'Поиск')); ?>" class="header__search-input" value="<?php echo get_search_query() ? esc_attr(get_search_query()) : ''; ?>">
                        <button type="submit" class="header__search-button" aria-label="Искать">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 17A8 8 0 109 1a8 8 0 000 16zM19 19l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </form>

                    <!-- Контакты + кнопка -->
                    <div class="header__right">
                        <div class="header__contacts-group">
                            <div class="header__work-time header__work-time--right">
                                <div class="header__work-time-header">
                                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="8" cy="8" r="7" stroke="currentColor" stroke-width="1.5"/>
                                        <path d="M8 4v4l3 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                    </svg>
                                    Режим работы:
                                </div>
                                <div class="header__work-time-value"><?php echo esc_html(fabrica_footer_option('footer_work_time', 'ежедневно, 10:00–19:00')); ?></div>
                            </div>
                            <?php
                            $header_phone = fabrica_footer_option('footer_phone', '+7 (978) 597-74-42');
                            $header_phone_clean = preg_replace('/[^0-9+]/', '', $header_phone);
                            ?>
                            <a href="tel:<?php echo esc_attr($header_phone_clean); ?>" class="header__phone">
                                <span class="header__phone-label">Звоните сейчас</span>
                                <span class="header__phone-number"><?php echo esc_html($header_phone); ?></span>
                            </a>
                        </div>
                        <a href="#contact-form" class="header__cta-button"><?php echo esc_html(fabrica_footer_option('header_cta_text', 'Заказать звонок')); ?></a>
                    </div>

                    <!-- Бургер меню (мобильная версия) -->
                    <button class="header__burger" aria-label="Открыть меню">
                        <span class="header__burger-line"></span>
                        <span class="header__burger-line"></span>
                        <span class="header__burger-line"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Нижний хедер (основная навигация) -->
        <div class="header__bottom">
            <div class="container">
                <nav class="header__nav">
                    <ul class="header__menu">
                        <?php
                        $catalog_url = fabrica_get_catalog_page_url();
                        $menu_items = array(
                            array(
                                'label'    => 'Мебель',
                                'url'      => $catalog_url,
                                'fallback' => array(
                                    (object) array('name' => 'Стулья', 'slug' => 'stulya', 'link' => $catalog_url),
                                    (object) array('name' => 'Столы', 'slug' => 'stoly', 'link' => $catalog_url),
                                    (object) array('name' => 'Уличная мебель', 'slug' => 'ulichnaya-mebel', 'link' => $catalog_url),
                                    (object) array('name' => 'Диваны и кресла', 'slug' => 'divany', 'link' => $catalog_url),
                                    (object) array('name' => 'Шкафы и стеллажи', 'slug' => 'shkafy', 'link' => $catalog_url),
                                ),
                            ),
                            array(
                                'label'    => 'Посуда',
                                'url'      => $catalog_url,
                                'fallback' => array(
                                    (object) array('name' => 'Тарелки', 'slug' => 'tarelki', 'link' => $catalog_url),
                                    (object) array('name' => 'Чашки и кружки', 'slug' => 'chashki-kruzhki', 'link' => $catalog_url),
                                    (object) array('name' => 'Стекло', 'slug' => 'steklo', 'link' => $catalog_url),
                                ),
                            ),
                            array(
                                'label'    => 'Декор11',
                                'url'      => $catalog_url,
                                'fallback' => array(
                                    (object) array('name' => 'Вазы', 'slug' => 'vazy', 'link' => $catalog_url),
                                    (object) array('name' => 'Свечи', 'slug' => 'svechi', 'link' => $catalog_url),
                                    (object) array('name' => 'Картины', 'slug' => 'kartiny', 'link' => $catalog_url),
                                ),
                            ),
                            array('label' => 'Услуги', 'url' => fabrica_get_services_page_url(), 'no_dropdown' => true),
                            array(
                                'label'    => 'Horeca',
                                'url'      => $catalog_url,
                                'fallback' => array(
                                    (object) array('name' => 'Мебель для HoReCa', 'slug' => 'mebel-dlya-horeca', 'link' => $catalog_url),
                                    (object) array('name' => 'Оборудование', 'slug' => 'oborudovanie', 'link' => $catalog_url),
                                ),
                            ),
                        );
                        foreach ($menu_items as $item) :
                            $link_class = isset($item['accent']) && $item['accent'] ? ' header__menu-link--accent' : '';
                            if (!empty($item['no_dropdown'])) {
                                $subs = array('terms' => array(), 'use_fallback' => false, 'parent_url' => null);
                            } else {
                                $subs = fabrica_get_subcategories_for_menu($item['label'], isset($item['fallback']) ? $item['fallback'] : array());
                            }
                            $has_dropdown = !empty($subs['terms']);
                            $use_fallback = $subs['use_fallback'];
                            $item_url = !empty($subs['parent_url']) ? $subs['parent_url'] : $item['url'];
                        ?>
                        <li class="header__menu-item<?php echo $has_dropdown ? ' header__menu-item--has-dropdown' : ''; ?>">
                            <a href="<?php echo esc_url($item_url); ?>" class="header__menu-link<?php echo $link_class; ?>">
                                <?php echo esc_html($item['label']); ?>
                                <?php if ($has_dropdown) : ?>
                                    <svg class="header__menu-arrow" width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L4 4L7 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                <?php endif; ?>
                            </a>
                            <?php if ($has_dropdown) : ?>
                            <ul class="header__dropdown">
                                <?php foreach ($subs['terms'] as $cat) :
                                    $cat_link = $use_fallback ? $cat->link : get_term_link($cat);
                                    if (!$use_fallback && is_wp_error($cat_link)) continue;
                                ?>
                                <li class="header__dropdown-item">
                                    <a href="<?php echo esc_url($cat_link); ?>" class="header__dropdown-link"><?php echo esc_html($cat->name); ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                        <li class="header__menu-item">
                            <a href="<?php echo esc_url(fabrica_get_sale_section_url()); ?>" class="header__menu-link header__menu-link--accent">Акции</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Overlay для мобильного меню -->
        <div class="header__mobile-overlay"></div>

        <!-- Мобильное меню -->
        <div class="header__mobile-menu">
            <!-- Заголовок меню -->
            <div class="header__mobile-header">
                <?php
                $mobile_logo_src = $logo_mobile ?: ($logo_desktop ?: $t . '/img/logo-mobile.jpg');
                $mobile_logo_alt = $logo_alt ?: get_bloginfo('name');
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="header__mobile-logo">
                    <img src="<?php echo esc_url($mobile_logo_src); ?>" alt="<?php echo esc_attr($mobile_logo_alt); ?>" class="header__mobile-logo-img">
                </a>
                <button class="header__mobile-close" aria-label="Закрыть меню">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>

            <!-- Поиск -->
            <form class="header__mobile-search" action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search">
                <div class="header__mobile-search-wrapper">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="header__mobile-search-icon">
                        <path d="M9 17A8 8 0 109 1a8 8 0 000 16zM19 19l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input type="search" name="s" placeholder="<?php echo esc_attr(fabrica_footer_option('header_search_placeholder', 'Поиск товаров...')); ?>" class="header__mobile-search-input" value="<?php echo get_search_query() ? esc_attr(get_search_query()) : ''; ?>">
                    <button type="submit" class="header__mobile-search-button" aria-label="Искать">
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 17A8 8 0 109 1a8 8 0 000 16zM19 19l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </form>

            <!-- Контактная информация -->
            <?php
            $mobile_phone = fabrica_footer_option('footer_phone', '+7 (978) 597-74-42');
            $mobile_phone_clean = preg_replace('/[^0-9+]/', '', $mobile_phone);
            $mobile_work_time = fabrica_footer_option('footer_work_time', 'ежедневно, 10:00–19:00');
            ?>
            <div class="header__mobile-contacts">
                <a href="tel:<?php echo esc_attr($mobile_phone_clean); ?>" class="header__mobile-contact header__mobile-contact--phone">
                    <div class="header__mobile-contact-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="header__mobile-contact-content">
                        <span class="header__mobile-contact-label">Телефон</span>
                        <span class="header__mobile-contact-value"><?php echo esc_html($mobile_phone); ?></span>
                    </div>
                </a>
                <div class="header__mobile-contact header__mobile-contact--time">
                    <div class="header__mobile-contact-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div class="header__mobile-contact-content">
                        <span class="header__mobile-contact-label">Режим работы</span>
                        <span class="header__mobile-contact-value"><?php echo esc_html($mobile_work_time); ?></span>
                    </div>
                </div>
            </div>

            <!-- Кнопка заказа звонка -->
            <a href="<?php echo esc_url(home_url('/#contact-form')); ?>" class="header__mobile-cta">
                <span><?php echo esc_html(fabrica_footer_option('header_cta_text', 'Заказать звонок')); ?></span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

            <!-- Навигация -->
            <nav class="header__mobile-nav">
                <?php foreach ($top_right as $item) :
                    $label = !empty($item['label']) ? $item['label'] : '';
                    if (!$label) continue;
                    $url = !empty($item['url']) ? $item['url'] : '';
                    if (!$url && !empty($item['preset'])) $url = fabrica_get_url_by_preset($item['preset']);
                    if (!$url) $url = home_url('/');
                ?>
                <a href="<?php echo esc_url($url); ?>" class="header__mobile-link">
                    <?php if (isset($item['icon']) && $item['icon'] === 'favorites') : ?>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" stroke="currentColor" stroke-width="2" fill="none"/>
                    </svg>
                    <?php elseif (isset($item['icon']) && $item['icon'] === 'catalog') : ?>
                    <svg width="20" height="20" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2h3v3H2V2zm5 0h3v3H7V2zm5 0h3v3h-3V2zM2 7h3v3H2V7zm5 0h3v3H7V7zm5 0h3v3h-3V7zM2 12h3v3H2v-3zm5 0h3v3H7v-3zm5 0h3v3h-3v-3z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <?php endif; ?>
                    <span><?php echo esc_html($label); ?></span>
                </a>
                <?php endforeach; ?>
                <?php
                $mobile_cats = array('Мебель', 'Посуда', 'Декор', 'Horeca');
                foreach ($mobile_cats as $cat_label) {
                    $cat_url = fabrica_get_category_url($cat_label);
                    ?>
                    <a href="<?php echo esc_url($cat_url); ?>" class="header__mobile-link">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span><?php echo esc_html($cat_label); ?></span>
                    </a>
                <?php } ?>
                <a href="<?php echo esc_url(fabrica_get_sale_section_url()); ?>" class="header__mobile-link header__mobile-link--accent">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 01-2.83 0L2 12V2h10l8.59 8.59a2 2 0 010 2.82z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="7" y1="7" x2="7.01" y2="7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Акции</span>
                </a>
                <?php foreach ($top_nav as $item) :
                    $label = !empty($item['label']) ? $item['label'] : '';
                    if (!$label) continue;
                    $url = !empty($item['url']) ? $item['url'] : '';
                    if (!$url && !empty($item['preset'])) $url = fabrica_get_url_by_preset($item['preset']);
                    if (!$url) $url = home_url('/');
                ?>
                <a href="<?php echo esc_url($url); ?>" class="header__mobile-link">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 22V12h6v10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span><?php echo esc_html($label); ?></span>
                </a>
                <?php endforeach; ?>
                <a href="<?php echo esc_url(home_url('/#production')); ?>" class="header__mobile-link">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 3h8v8H3zM13 3h8v8h-8zM3 13h8v8H3zM13 13h8v8h-8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Производство</span>
                </a>
            </nav>
        </div>
    </header>