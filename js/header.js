// ===================================
// Header скролл эффект
// ===================================

import { throttle, debounce } from './utils.js';

/**
 * Инициализация эффекта прокрутки для header
 */
export function initHeaderScroll() {
    const header = document.querySelector('.header');
    if (!header) return;
    
    const isIndexPage = document.body.classList.contains('page-index');
    const scrollThreshold = isIndexPage ? 120 : 50;
    
    function updateHeaderState() {
        const currentScroll = window.pageYOffset;
        if (currentScroll > scrollThreshold) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }
    
    // На главной при загрузке без скролла — без класса scrolled (прозрачный хедер)
    if (isIndexPage && window.pageYOffset <= scrollThreshold) {
        header.classList.remove('scrolled');
    }
    
    // Во время скролла — throttle, чтобы не дёргать DOM слишком часто
    const handleScroll = throttle(updateHeaderState, 100);
    
    // После окончания скролла — финальная проверка (убирает "залипание" при резком скролле вверх)
    const handleScrollEnd = debounce(updateHeaderState, 150);
    
    function onScroll() {
        handleScroll();
        handleScrollEnd();
    }
    
    window.addEventListener('scroll', onScroll, { passive: true });
    
    // Добавляем плавную анимацию при наведении на логотип
    const logo = document.querySelector('.header__logo');
    if (logo) {
        logo.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.02) rotate(1deg)';
        });
        
        logo.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    }

    // Выпадающий список на touch-устройствах (клик вместо hover)
    initHeaderDropdown();
}

/**
 * Инициализация выпадающего меню (dropdown) для touch-устройств
 */
function initHeaderDropdown() {
    const dropdownItems = document.querySelectorAll('.header__menu-item--has-dropdown');
    if (!dropdownItems.length) return;

    function closeAllDropdowns() {
        dropdownItems.forEach(item => item.classList.remove('header__dropdown-open'));
        document.removeEventListener('click', closeAllDropdowns);
    }

    dropdownItems.forEach(item => {
        const link = item.querySelector('.header__menu-link');
        if (!link) return;

        link.addEventListener('click', function(e) {
            if (!('ontouchstart' in window)) return; // только для touch
            if (item.classList.contains('header__dropdown-open')) {
                return; // при повторном клике — переход по ссылке
            }
            e.preventDefault();
            dropdownItems.forEach(other => other.classList.remove('header__dropdown-open'));
            item.classList.add('header__dropdown-open');
            setTimeout(() => document.addEventListener('click', closeAllDropdowns), 0);
        });
    });
}
