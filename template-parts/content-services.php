<?php
/**
 * Template part for displaying the services page content
 *
 * @package Fabrica
 */

if (!isset($t)) {
    $t = get_template_directory_uri();
}

?>
<main class="main" role="main" id="main-content">

    <!-- Hero секция -->
    <section class="services-hero">
        <div class="container">
            <div class="services-hero__content">
                <div class="services-hero__badge">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <polyline points="22 4 12 14.01 9 11.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Профессиональные услуги</span>
                </div>
                <h1 class="services-hero__title">Услуги дизайна интерьера и производства мебели в Симферополе и Крыму</h1>
                <p class="services-hero__subtitle">Полный спектр услуг от разработки концепции интерьера до производства мебели и оснащения объектов под ключ. Работаем с частными клиентами, дизайнерами и бизнесом по всему Крыму.</p>
                <div class="services-hero__stats">
                    <div class="services-hero__stat">
                        <div class="services-hero__stat-number">18+</div>
                        <div class="services-hero__stat-label">Видов услуг</div>
                    </div>
                    <div class="services-hero__stat">
                        <div class="services-hero__stat-number">100%</div>
                        <div class="services-hero__stat-label">Под ключ</div>
                    </div>
                    <div class="services-hero__stat">
                        <div class="services-hero__stat-number">Крым</div>
                        <div class="services-hero__stat-label">Работаем по всему региону</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Фильтры категорий -->
    <section class="services-filters">
        <div class="container">
            <div class="services-filters__wrapper">
                <button class="services-filter services-filter--active" data-category="all">
                    <span>Все услуги</span>
                </button>
                <button class="services-filter" data-category="design">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Дизайн</span>
                </button>
                <button class="services-filter" data-category="production">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Производство</span>
                </button>
                <button class="services-filter" data-category="equipment">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <polyline points="9 22 9 12 15 12 15 22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Оснащение</span>
                </button>
                <button class="services-filter" data-category="supply">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 6h18M16 10a4 4 0 0 1-8 0" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Поставка</span>
                </button>
                <button class="services-filter" data-category="service">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Сервис</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Список услуг -->
    <section class="services-list">
        <div class="container">
            <div class="services-list__grid" id="servicesGrid">
                <!-- 1. Дизайн интерьера и визуализация -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="design">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/5.webp'); ?>" alt="Дизайн интерьера и визуализация в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Дизайн</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Дизайн интерьера и визуализация</h3>
                        <p class="service-card__text">Концепция интерьера, 3D-визуализация и подбор всех элементов под ключ.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 2. Оснащение отелей и гостиниц -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="equipment">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/1.webp'); ?>" alt="Оснащение отелей и гостиниц в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Оснащение</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Оснащение отелей и гостиниц</h3>
                        <p class="service-card__text">Комплексная комплектация гостиничных номеров и общественных зон: мебель, текстиль, освещение, аксессуары.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 3. Мебель на заказ -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="production">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/6.webp'); ?>" alt="Мебель на заказ в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Производство</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Мебель на заказ (корпусная и мягкая)</h3>
                        <p class="service-card__text">Изготовление мебели по индивидуальным размерам для отелей, ресторанов и жилых интерьеров.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 4. Поставка посуды для HoReCa -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="supply">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/2.webp'); ?>" alt="Поставка посуды для HoReCa в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Поставка</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Поставка посуды для HoReCa</h3>
                        <p class="service-card__text">Широкий ассортимент посуды и столовых принадлежностей для ресторанов и отелей.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 5. Монтаж и доставка -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="service">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/6.webp'); ?>" alt="Монтаж и доставка по России" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Сервис</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Монтаж и доставка по России</h3>
                        <p class="service-card__text">Профессиональная установка мебели и доставка по всей России.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 6. Оснащение ресторанов и кафе -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="equipment">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/2.webp'); ?>" alt="Оснащение ресторанов и кафе в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Оснащение</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Оснащение ресторанов и кафе</h3>
                        <p class="service-card__text">Посуда, мебель, текстиль, декор и оборудование для ресторанов, кафе и баров под ключ.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 7. Производство мебели по индивидуальным проектам -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="production">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/1.webp'); ?>" alt="Производство мебели по индивидуальным проектам в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Производство</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Производство мебели по индивидуальным проектам</h3>
                        <p class="service-card__text">Собственное производство: корпусная и мягкая мебель, панели, двери по вашим эскизам.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 8. Проектирование и подбор мебели -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="design">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/7.webp'); ?>" alt="Проектирование и подбор мебели в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Дизайн</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Проектирование и подбор мебели</h3>
                        <p class="service-card__text">Индивидуальное проектирование, 3D-визуализация и подбор решений под ваш интерьер.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 9. Поставка текстиля -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="supply">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/3.webp'); ?>" alt="Поставка текстиля для ресторанов и отелей в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Поставка</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Поставка текстиля для ресторанов и отелей</h3>
                        <p class="service-card__text">Постельное бельё, полотенца, шторы, скатерти и другой текстиль от проверенных производителей.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 10. Комплектация объектов под ключ -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="equipment">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/5.webp'); ?>" alt="Комплектация объектов под ключ в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Оснащение</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Комплектация объектов «под ключ»</h3>
                        <p class="service-card__text">От выбора материалов до финального монтажа — одна команда и полная ответственность за результат.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 11. Производство и покраска мебели -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="production">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/2.webp'); ?>" alt="Производство и покраска мебели в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Производство</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Производство и покраска мебели</h3>
                        <p class="service-card__text">Работаем с ЛДСП, МДФ, натуральным деревом, металлом. Используем точный распил и современную покраску.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 12. Освещение и элементы интерьера -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="supply">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/4.webp'); ?>" alt="Освещение и элементы интерьера в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Поставка</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Освещение и элементы интерьера</h3>
                        <p class="service-card__text">Светильники, декор и аксессуары для создания гармоничного интерьера.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 13. Оснащение апартаментов и мини-отелей -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="equipment">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/3.webp'); ?>" alt="Оснащение апартаментов и мини-отелей в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Оснащение</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Оснащение апартаментов и мини-отелей</h3>
                        <p class="service-card__text">Полная комплектация апартаментов и мини-отелей мебелью, техникой и аксессуарами.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 14. Условия для дизайнеров и студий -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="service">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/7.webp'); ?>" alt="Условия для дизайнеров и студий" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Сервис</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Условия для дизайнеров и студий</h3>
                        <p class="service-card__text">Выгодные условия, персональное сопровождение и помощь в комплектации проектов.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 15. Постпродажное обслуживание -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="service">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/9.webp'); ?>" alt="Постпродажное обслуживание в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Сервис</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Постпродажное обслуживание</h3>
                        <p class="service-card__text">Гарантийное обслуживание, ремонт и консультации по уходу за изделиями.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 16. Оснащение офисов и коммерческих помещений -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="equipment">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/4.webp'); ?>" alt="Оснащение офисов и коммерческих помещений в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Оснащение</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Оснащение офисов и коммерческих помещений</h3>
                        <p class="service-card__text">Мебель и интерьерные решения для офисов, шоурумов и коммерческих пространств.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 17. Поставка фурнитуры и декора -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="supply">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/3.webp'); ?>" alt="Поставка фурнитуры и декора в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Поставка</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Поставка фурнитуры и декора</h3>
                        <p class="service-card__text">Надёжная фурнитура, текстиль, свет и аксессуары от проверенных поставщиков для интерьеров.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- 18. Поставка хозтоваров для HoReCa -->
                <a href="<?php echo esc_url(home_url('/service-single/')); ?>" class="service-card" data-category="supply">
                    <div class="service-card__image">
                        <img src="<?php echo esc_url($t . '/img/4.webp'); ?>" alt="Поставка хозтоваров для HoReCa в Симферополе" class="service-card__img">
                        <div class="service-card__overlay"></div>
                        <div class="service-card__badge">Поставка</div>
                    </div>
                    <div class="service-card__content">
                        <h3 class="service-card__title">Поставка хозтоваров для HoReCa</h3>
                        <p class="service-card__text">Широкий ассортимент хозяйственных товаров для ресторанов, отелей и кафе от проверенных производителей.</p>
                        <div class="service-card__footer">
                            <span class="service-card__link">Подробнее</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA секция -->
    <section class="services-cta">
        <div class="container">
            <div class="services-cta__content">
                <h2 class="services-cta__title">Нужна консультация по услугам?</h2>
                <p class="services-cta__text">Свяжитесь с нами, и мы поможем выбрать оптимальное решение для вашего проекта в Симферополе и Крыму</p>
                <div class="services-cta__actions">
                    <a href="#contact-form" class="services-cta__button services-cta__button--primary">
                        <span>Получить консультацию</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="tel:+79785977442" class="services-cta__button services-cta__button--secondary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                        <span>+7 (978) 597-74-42</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Форма обратной связи -->
    <section class="contact animate-on-scroll" id="contact-form" aria-labelledby="contact-title">
        <div class="contact__background">
            <div class="contact__pattern"></div>
        </div>
        <div class="container">
            <div class="contact__premium">
                <div class="contact__header">
                    <span class="contact__accent">Начните свой проект</span>
                    <h2 class="contact__title" id="contact-title">Получите персональную консультацию</h2>
                    <p class="contact__subtitle">Оставьте заявку, и наш эксперт свяжется с вами в течение 15 минут</p>
                </div>

                <form class="contact__form" id="contactForm">
                    <div class="contact__form-row">
                        <div class="contact__input-wrapper">
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                class="contact__input" 
                                placeholder="Ваше имя"
                                required
                            >
                            <span class="contact__input-border"></span>
                        </div>
                        <div class="contact__input-wrapper">
                            <input 
                                type="tel" 
                                id="phone" 
                                name="phone" 
                                class="contact__input" 
                                placeholder="+7 (___) ___-__-__"
                                required
                            >
                            <span class="contact__input-border"></span>
                        </div>
                        <button type="submit" class="contact__button">
                            <span>Получить консультацию</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                    <p class="contact__privacy">
                        <label style="display: flex; align-items: flex-start; gap: 8px; cursor: pointer;">
                            <input type="checkbox" name="privacy_agreement" required style="margin-top: 2px; cursor: pointer;">
                            <span>Нажимая на кнопку, вы соглашаетесь с <a href="#">политикой конфиденциальности</a></span>
                        </label>
                    </p>
                </form>

                <!-- Сообщение об успехе -->
                <div class="contact__success" id="contactSuccess" style="display: none;">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M8 12l2 2 4-4"/>
                    </svg>
                    <h3>Спасибо за обращение!</h3>
                    <p>Наш менеджер свяжется с вами в ближайшее время</p>
                </div>
            </div>
        </div>
    </section>

</main>
