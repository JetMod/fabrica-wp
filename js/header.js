// ===================================
// Header скролл эффект
// ===================================

import { throttle, debounce } from './utils.js';

/** Порог ширины как в CSS (мобильная навигация) */
const HEADER_MOBILE_MAX = 768;
const MEGA_CLOSE_DELAY_MS = 200;

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
    initDesktopMegaNav();
}

/**
 * Десктоп: задержка закрытия мега-меню, aria-expanded, Escape.
 */
function initDesktopMegaNav() {
    const items = document.querySelectorAll('.header__menu-item--has-dropdown');
    if (!items.length) return;

    let closeTimer = null;

    function clearCloseTimer() {
        if (closeTimer) {
            clearTimeout(closeTimer);
            closeTimer = null;
        }
    }

    function setExpanded(item, expanded) {
        var link = item.querySelector('.header__menu-link');
        if (link && link.hasAttribute('aria-expanded')) {
            link.setAttribute('aria-expanded', expanded ? 'true' : 'false');
        }
    }

    function closeAllMegaOpen() {
        clearCloseTimer();
        items.forEach(function(item) {
            item.classList.remove('header__mega-open');
            setExpanded(item, false);
        });
    }

    function openMegaItem(item) {
        clearCloseTimer();
        items.forEach(function(other) {
            if (other !== item) {
                other.classList.remove('header__mega-open');
                setExpanded(other, false);
            }
        });
        item.classList.add('header__mega-open');
        setExpanded(item, true);
    }

    function scheduleCloseMega(item) {
        clearCloseTimer();
        closeTimer = setTimeout(function() {
            closeTimer = null;
            if (item.contains(document.activeElement)) return;
            item.classList.remove('header__mega-open');
            setExpanded(item, false);
        }, MEGA_CLOSE_DELAY_MS);
    }

    items.forEach(function(item) {
        item.addEventListener('mouseenter', function() {
            if (window.innerWidth <= HEADER_MOBILE_MAX) return;
            openMegaItem(item);
        });
        item.addEventListener('mouseleave', function() {
            if (window.innerWidth <= HEADER_MOBILE_MAX) return;
            scheduleCloseMega(item);
        });
        item.addEventListener('focusin', function() {
            if (window.innerWidth <= HEADER_MOBILE_MAX) return;
            openMegaItem(item);
        });
        item.addEventListener('focusout', function(e) {
            if (window.innerWidth <= HEADER_MOBILE_MAX) return;
            if (item.contains(e.relatedTarget)) return;
            clearCloseTimer();
            item.classList.remove('header__mega-open');
            setExpanded(item, false);
        });
    });

    document.addEventListener('keydown', function(e) {
        if (e.key !== 'Escape') return;
        var nav = document.querySelector('.header__nav');
        if (!nav || !nav.contains(document.activeElement)) return;
        var item = document.activeElement.closest('.header__menu-item--has-dropdown');
        if (!item) return;
        e.preventDefault();
        clearCloseTimer();
        closeAllMegaOpen();
        if (item.contains(document.activeElement)) {
            document.activeElement.blur();
        }
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth <= HEADER_MOBILE_MAX) {
            closeAllMegaOpen();
        }
    });
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
        dropdownItems.forEach(function(item) {
            item.classList.remove('header__dropdown-open');
            var link = item.querySelector('.header__menu-link');
            if (link && link.hasAttribute('aria-expanded')) {
                link.setAttribute('aria-expanded', 'false');
            }
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
        var dropdown = item.querySelector('.header__mega') || item.querySelector('.header__dropdown');
        if (!dropdown) return;
        dropdownItems.forEach(function(other) {
            other.classList.remove('header__dropdown-open');
        });
        item.classList.add('header__dropdown-open');
        var triggerLink = item.querySelector('.header__menu-link');
        if (triggerLink && triggerLink.hasAttribute('aria-expanded')) {
            triggerLink.setAttribute('aria-expanded', 'true');
        }
        panel.innerHTML = '';
        panel.appendChild(dropdown.cloneNode(true));
        panel.classList.add('is-open');
        panel.setAttribute('aria-hidden', 'false');
        setTimeout(function() {
            document.addEventListener('click', onDocumentClick);
            window.addEventListener('scroll', onScrollClose, { passive: true });
        }, 80);
    }

    document.addEventListener('keydown', function(e) {
        if (e.key !== 'Escape') return;
        if (window.innerWidth > HEADER_MOBILE_MAX) return;
        if (panel.classList.contains('is-open')) {
            closePanel();
        }
    });

    dropdownItems.forEach(function(item) {
        var link = item.querySelector('.header__menu-link');
        if (!link) return;

        link.addEventListener('click', function(e) {
            if (window.innerWidth > HEADER_MOBILE_MAX) return;

            if (item.classList.contains('header__dropdown-open')) {
                closePanel();
                return;
            }
            e.preventDefault();
            openPanel(item);
        });
    });
}
