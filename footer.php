<?php
if (!isset($t)) {
    $t = get_template_directory_uri();
}
$catalog_url = fabrica_get_catalog_page_url();
$office_url = fabrica_get_office_page_url();
$home_url = home_url('/');
?>
    <!-- Footer -->
    <footer class="footer" id="contacts" role="contentinfo">
        <!-- Верхняя секция с карточками -->
        <div class="footer__cta-section">
            <div class="container">
                    <?php
                    $cta1_title = fabrica_footer_option('footer_cta_1_title', 'B2B программа');
                    $cta1_text = fabrica_footer_option('footer_cta_1_text', 'Вы дизайнер интерьера или архитектор? Присоединяйтесь сегодня.');
                    $cta1_link = fabrica_footer_option('footer_cta_1_link', '#contact-form');
                    $cta1_btn = fabrica_footer_option('footer_cta_1_btn', 'Присоединиться');
                    $cta2_title = fabrica_footer_option('footer_cta_2_title', 'Дизайн-услуги');
                    $cta2_text = fabrica_footer_option('footer_cta_2_text', 'Комплексные дизайн-услуги для вашего интерьера под ключ.');
                    $cta2_link = fabrica_footer_option('footer_cta_2_link', '#contact-form');
                    $cta2_btn = fabrica_footer_option('footer_cta_2_btn', 'Записаться на встречу');
                    $cta3_title = fabrica_footer_option('footer_cta_3_title', 'Посетите шоурум');
                    $cta3_text = fabrica_footer_option('footer_cta_3_text', 'Приглашаем увидеть наши коллекции в нашем шоуруме.');
                    ?>
                    <div class="footer__cta-grid">
                    <div class="footer__cta-card">
                        <div class="footer__cta-icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                        </div>
                        <h3 class="footer__cta-title"><?php echo esc_html($cta1_title); ?></h3>
                        <p class="footer__cta-text"><?php echo esc_html($cta1_text); ?></p>
                        <a href="<?php echo esc_url($cta1_link ?: '#contact-form'); ?>" class="footer__cta-link"><?php echo esc_html($cta1_btn); ?></a>
                    </div>
                    <div class="footer__cta-divider"></div>
                    <div class="footer__cta-card">
                        <div class="footer__cta-icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M12 19l7-7 3 3-7 7-3-3z"></path>
                                <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path>
                                <path d="M2 2l7.586 7.586"></path>
                                <circle cx="11" cy="11" r="2"></circle>
                            </svg>
                        </div>
                        <h3 class="footer__cta-title"><?php echo esc_html($cta2_title); ?></h3>
                        <p class="footer__cta-text"><?php echo esc_html($cta2_text); ?></p>
                        <a href="<?php echo esc_url($cta2_link ?: '#contact-form'); ?>" class="footer__cta-link"><?php echo esc_html($cta2_btn); ?></a>
                    </div>
                    <div class="footer__cta-divider"></div>
                    <div class="footer__cta-card">
                        <div class="footer__cta-icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <h3 class="footer__cta-title"><?php echo esc_html($cta3_title); ?></h3>
                        <p class="footer__cta-text"><?php echo esc_html($cta3_text); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Основной контент футера -->
        <div class="footer__main">
            <div class="container">
                <div class="footer__content">
                    <?php
                    $footer_logo = function_exists('get_field') ? get_field('footer_logo', 'option') : null;
                    $footer_logo_src = ($footer_logo && !empty($footer_logo['url'])) ? $footer_logo['url'] : $t . '/img/logo.jpg';
                    $footer_logo_alt = ($footer_logo && !empty($footer_logo['alt'])) ? $footer_logo['alt'] : get_bloginfo('name');
                    ?>
                    <div class="footer__brand">
                        <a href="<?php echo esc_url($home_url); ?>" class="footer__logo">
                            <img src="<?php echo esc_url($footer_logo_src); ?>" alt="<?php echo esc_attr($footer_logo_alt); ?>" class="footer__logo-img">
                        </a>
                        <p class="footer__description"><?php echo esc_html(fabrica_footer_option('footer_description', 'Производство полного цикла интерьерных решений премиум-класса. Создаём мебель и комплексные проекты под ключ с 2010 года.')); ?></p>
                        <div class="footer__social">
                            <?php
                            $social_links = fabrica_footer_option('footer_social_links', array());
                            if (!empty($social_links) && is_array($social_links)) {
                                foreach ($social_links as $item) {
                                    $url = isset($item['url']) ? $item['url'] : '';
                                    $icon_key = isset($item['icon']) ? $item['icon'] : 'telegram';
                                    if (empty($url)) continue;
                                    $icon_data = fabrica_get_social_icon_svg($icon_key);
                                    ?>
                                    <a href="<?php echo esc_url($url); ?>" class="footer__social-link" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($icon_data['label']); ?>">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><?php echo $icon_data['path']; ?></svg>
                                    </a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <div class="footer__menu-grid">
                        <?php
                        $company_default = array(
                            array('label' => 'О нас', 'preset' => 'office_about', 'url' => ''),
                            array('label' => 'Наши проекты', 'preset' => 'projects', 'url' => ''),
                            array('label' => 'Производство', 'preset' => 'production', 'url' => ''),
                            array('label' => 'Блог', 'preset' => 'blog', 'url' => ''),
                        );
                        $catalog_default = array(
                            array('label' => 'Мебель', 'preset' => 'mebel', 'url' => ''),
                            array('label' => 'Посуда', 'preset' => 'posuda', 'url' => ''),
                            array('label' => 'Декор', 'preset' => 'dekor', 'url' => ''),
                            array('label' => 'Horeca', 'preset' => 'horeca', 'url' => ''),
                        );
                        $services_default = array(
                            array('label' => 'Для дизайнеров', 'preset' => 'designers', 'url' => ''),
                            array('label' => 'Для бизнеса', 'preset' => 'business', 'url' => ''),
                            array('label' => 'Услуги', 'preset' => 'services', 'url' => ''),
                            array('label' => 'Доставка и сборка', 'preset' => 'delivery', 'url' => ''),
                        );
                        $company_items = fabrica_footer_option('footer_menu_company', $company_default);
                        $catalog_items = fabrica_footer_option('footer_menu_catalog', $catalog_default);
                        $services_items = fabrica_footer_option('footer_menu_services', $services_default);
                        if (!is_array($company_items)) $company_items = $company_default;
                        if (!is_array($catalog_items)) $catalog_items = $catalog_default;
                        if (!is_array($services_items)) $services_items = $services_default;

                        $render_footer_menu = function($items, $title) {
                            if (empty($items)) return;
                            echo '<div class="footer__menu-column"><h4 class="footer__menu-title">' . esc_html($title) . '</h4><ul class="footer__menu-list">';
                            foreach ($items as $it) {
                                $label = isset($it['label']) ? trim($it['label']) : '';
                                if (!$label) continue;
                                $url = !empty($it['url']) ? $it['url'] : (isset($it['preset']) && $it['preset'] ? fabrica_get_url_by_preset($it['preset']) : home_url('/'));
                                echo '<li><a href="' . esc_url($url) . '" class="footer__menu-link">' . esc_html($label) . '</a></li>';
                            }
                            echo '</ul></div>';
                        };
                        $render_footer_menu($company_items, 'Компания');
                        $render_footer_menu($catalog_items, 'Каталог');
                        $render_footer_menu($services_items, 'Услуги');
                        ?>
                        <div class="footer__menu-column">
                            <h4 class="footer__menu-title">Контакты</h4>
                            <ul class="footer__contacts-list">
                                <?php
                                $phone = fabrica_footer_option('footer_phone', '+7 (978) 597-74-42');
                                $email = fabrica_footer_option('footer_email', 'info@fabrica.ru');
                                $address = fabrica_footer_option('footer_address', 'ул. Генерала Васильева, 42');
                                $address_url = fabrica_footer_option('footer_address_url', 'https://yandex.ru/maps/-/CPEiqUoc');
                                $work_time = fabrica_footer_option('footer_work_time', 'ежедневно, 10:00–19:00');
                                $phone_clean = preg_replace('/[^0-9+]/', '', $phone);
                                ?>
                                <li class="footer__contact-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                    <a href="tel:<?php echo esc_attr($phone_clean); ?>" class="footer__contact-link"><?php echo esc_html($phone); ?></a>
                                </li>
                                <li class="footer__contact-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    <a href="mailto:<?php echo esc_attr($email); ?>" class="footer__contact-link"><?php echo esc_html($email); ?></a>
                                </li>
                                <li class="footer__contact-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    <?php if ($address_url) : ?><a href="<?php echo esc_url($address_url); ?>" target="_blank" rel="noopener noreferrer" class="footer__contact-link"><?php echo esc_html($address); ?></a><?php else : ?><span class="footer__contact-text"><?php echo esc_html($address); ?></span><?php endif; ?>
                                </li>
                                <li class="footer__contact-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    <span class="footer__contact-text"><?php echo esc_html($work_time); ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Нижняя часть футера -->
        <div class="footer__bottom">
            <div class="container">
                <div class="footer__bottom-content">
                    <?php
                    $copyright_text = fabrica_footer_option('footer_copyright', 'ФАБРИКА интерьеров. Все права защищены.');
                    ?>
                    <p class="footer__copyright">© <?php echo esc_html(date('Y')); ?> <?php echo esc_html($copyright_text); ?></p>
                    <?php
                    $legal_base = fabrica_get_legal_base_url();
                    $privacy = fabrica_footer_option('footer_privacy_url') ?: fabrica_get_legal_page_url('privacy');
                    $terms = fabrica_footer_option('footer_terms_url') ?: fabrica_get_legal_page_url('terms');
                    $offer = fabrica_footer_option('footer_offer_url') ?: fabrica_get_legal_page_url('offer');
                    if ($legal_base || $privacy || $terms || $offer) :
                    ?>
                    <div class="footer__legal">
                        <?php
                        $legal_parts = array();
                        if ($legal_base) $legal_parts[] = '<a href="' . esc_url($legal_base) . '" class="footer__legal-link">Юридическая информация</a>';
                        if ($privacy) $legal_parts[] = '<a href="' . esc_url($privacy) . '" class="footer__legal-link">Политика конфиденциальности</a>';
                        if ($terms) $legal_parts[] = '<a href="' . esc_url($terms) . '" class="footer__legal-link">Пользовательское соглашение</a>';
                        if ($offer) $legal_parts[] = '<a href="' . esc_url($offer) . '" class="footer__legal-link">Публичная оферта</a>';
                        echo implode('<span class="footer__separator">•</span>', $legal_parts);
                        ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>

    <!-- Кнопка "Наверх" -->
    <button class="scroll-top" id="scrollTop" aria-label="Наверх">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 19V5M12 5L5 12M12 5L19 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>

    <!-- Плавающие кнопки связи -->
    <?php
    $float_phone = fabrica_footer_option('footer_phone', '+7 (978) 597-74-42');
    $float_phone_clean = preg_replace('/[^0-9+]/', '', $float_phone);
    $float_telegram = '';
    $social_links = fabrica_footer_option('footer_social_links', array());
    if (!empty($social_links) && is_array($social_links)) {
        foreach ($social_links as $item) {
            if (isset($item['icon']) && $item['icon'] === 'telegram' && !empty($item['url'])) {
                $float_telegram = $item['url'];
                break;
            }
        }
    }
    ?>
    <div class="floating-buttons">
        <a href="tel:<?php echo esc_attr($float_phone_clean); ?>" class="floating-button floating-button--phone" aria-label="Позвонить">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
        <?php if ($float_telegram) : ?>
        <a href="<?php echo esc_url($float_telegram); ?>" target="_blank" rel="noopener noreferrer" class="floating-button floating-button--telegram" aria-label="Telegram">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.64-.203-.658-.64.135-.954l11.566-4.458c.538-.196 1.006.128.832.941z"/>
            </svg>
        </a>
        <?php endif; ?>
    </div>

    <!-- Виджет чата с менеджером -->
    <div class="chat-widget" id="chatWidget">
        <!-- Развернутый вид -->
        <div class="chat-widget__content">
            <div class="chat-widget__avatar">
                <img src="<?php echo esc_url($t . '/img/logo.jpg'); ?>" alt="Менеджер" class="chat-widget__avatar-img">
            </div>
            <div class="chat-widget__info">
                <div class="chat-widget__name"><?php echo esc_html(fabrica_footer_option('chat_name', 'Александр, ведущий менеджер')); ?></div>
                <div class="chat-widget__message"><?php echo esc_html(fabrica_footer_option('chat_message', 'Мы тут! Всегда на связи.')); ?></div>
            </div>
            <button class="chat-widget__button" id="chatButton" aria-label="Открыть чат">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
        <button class="chat-widget__close" id="chatClose" aria-label="Свернуть">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        
        <!-- Свернутый вид (только иконка) -->
        <button class="chat-widget__collapsed" id="chatCollapsed" aria-label="Развернуть чат">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="chat-widget__badge">1</span>
        </button>
    </div>

    <!-- Модальное окно для обратной связи -->
    <div class="callback-modal" id="callbackModal" aria-hidden="true" role="dialog" aria-labelledby="callbackModalTitle">
    <div class="callback-modal__overlay"></div>

    <div class="callback-modal__content">
        <button class="callback-modal__close" id="callbackModalClose" aria-label="Закрыть модальное окно" type="button">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M18 6L6 18M6 6l12 12"/>
            </svg>
        </button>
        
        <div class="callback-modal__header">
            <h2 class="callback-modal__title" id="callbackModalTitle">Заказать звонок</h2>
            <p class="callback-modal__subtitle">Оставьте свои контакты, и мы свяжемся с вами в ближайшее время</p>
        </div>

        <div class="callback-modal__form-wrap">
            <?php echo do_shortcode('[contact-form-7 id="c4935ce" title="Без названия"]'); ?>
        </div>

        <div class="callback-modal__success" id="callbackSuccess" style="display:none;">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <path d="M8 12l2 2 4-4"/>
            </svg>
            <h3>Спасибо за обращение!</h3>
            <p>Наш менеджер свяжется с вами в ближайшее время</p>
        </div>
    </div>
</div>

    <!-- Модальное окно чата -->
<div class="chat-modal" id="chatModal" aria-hidden="true" role="dialog" aria-labelledby="chatModalTitle">
    <div class="chat-modal__overlay"></div>

    <div class="chat-modal__content">
        <!-- Заголовок с информацией о менеджере -->
        <div class="chat-modal__header">
            <div class="chat-modal__header-content">
                <div class="chat-modal__manager-info">
                    <div class="chat-modal__avatar">
                        <img src="<?php echo esc_url($t . '/img/logo.jpg'); ?>" alt="Александр" class="chat-modal__avatar-img">
                        <span class="chat-modal__status"></span>
                    </div>

                    <div class="chat-modal__manager-text">
                        <div class="chat-modal__manager-name">Александр, ведущий менеджер</div>
                        <div class="chat-modal__manager-status">Мы тут! Всегда общение.</div>
                    </div>
                </div>

                <button class="chat-modal__close-header" id="chatModalClose" aria-label="Закрыть чат" type="button">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 6L6 18M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Основной контент -->
        <div class="chat-modal__body">
            <div class="chat-modal__form-wrap">
                <?php echo do_shortcode('[contact-form-7 id="b310b3c" title="Виджет с чатом"]'); ?>
            </div>

            <!-- Сообщение об успехе -->
            <div class="chat-modal__success" id="chatSuccess" style="display:none;">
                <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M8 12l2 2 4-4"/>
                </svg>
                <h3>Сообщение отправлено!</h3>
                <p>Менеджер свяжется с вами в ближайшее время</p>
            </div>
        </div>
    </div>
</div>

    <?php wp_footer(); ?>
</body>
</html>