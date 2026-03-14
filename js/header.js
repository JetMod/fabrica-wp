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
 * Выпадающее меню на мобильных: контент показывается в панели под навигацией
 * (вне .header__nav), чтобы не обрезаться overflow. Без переноса узлов в body.
 */
function initHeaderDropdown() {
    const panel = document.getElementById('header-dropdown-panel');
    const dropdownItems = document.querySelectorAll('.header__menu-item--has-dropdown');
    if (!panel || !dropdownItems.length) return;

    function closePanel() {
        panel.classList.remove('is-open');
        panel.setAttribute('aria-hidden', 'true');
        panel.innerHTML = '';
        panel.style.left = '';
        panel.style.width = '';
        panel.style.right = '';
        panel.style.minWidth = '';
        dropdownItems.forEach(function(item) {
            item.classList.remove('header__dropdown-open');
        });
        document.removeEventListener('click', onDocumentClick);
        window.removeEventListener('scroll', onScrollClose);
    }

    function onDocumentClick(e) {
        if (panel.contains(e.target)) {
            if (e.target.closest('a')) closePanel();
            return;
        }
        var item = e.target.closest('.header__menu-item--has-dropdown');
        if (item && item.querySelector('.header__menu-link') === e.target) return;
        closePanel();
    }

    function onScrollClose() {
        closePanel();
    }

    function openPanel(item) {
        var dropdown = item.querySelector('.header__dropdown');
        if (!dropdown) return;
        dropdownItems.forEach(function(other) {
            other.classList.remove('header__dropdown-open');
        });
        item.classList.add('header__dropdown-open');
        panel.innerHTML = '';
        var list = document.createElement('ul');
        list.className = 'header__dropdown-panel-list';
        list.setAttribute('role', 'list');
        [].slice.call(dropdown.children).forEach(function(li) {
            list.appendChild(li.cloneNode(true));
        });
        panel.appendChild(list);

        var container = panel.offsetParent;
        if (container) {
            var itemRect = item.getBoundingClientRect();
            var containerRect = container.getBoundingClientRect();
            var panelMinW = 220;
            var panelMaxW = Math.min(280, containerRect.width - 24);
            var panelW = Math.max(panelMinW, Math.min(itemRect.width, panelMaxW));
            var left = itemRect.left - containerRect.left;
            if (left + panelW > containerRect.width - 12) left = containerRect.width - panelW - 12;
            if (left < 12) left = 12;
            panel.style.left = left + 'px';
            panel.style.width = panelW + 'px';
            panel.style.right = 'auto';
            panel.style.minWidth = panelMinW + 'px';
        }

        panel.classList.add('is-open');
        panel.setAttribute('aria-hidden', 'false');
        setTimeout(function() {
            document.addEventListener('click', onDocumentClick);
            window.addEventListener('scroll', onScrollClose, { passive: true });
        }, 80);
    }

    dropdownItems.forEach(function(item) {
        var link = item.querySelector('.header__menu-link');
        if (!link) return;

        link.addEventListener('click', function(e) {
            if (window.innerWidth > 768) return;

            if (item.classList.contains('header__dropdown-open')) {
                closePanel();
                return;
            }
            e.preventDefault();
            openPanel(item);
        });
    });
}
