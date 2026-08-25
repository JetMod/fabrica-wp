// // ===================================
// // Попап праздничного выходного дня
// // Показывается каждый раз при заходе на сайт 27 мая
// // ===================================

// (function () {
//     var MONTH = 5;  // май (0-based: 4 = май, но Date.getMonth() → 0-based, май = 4)
//     var DAY   = 27;

//     function isTodayHoliday() {
//         var now   = new Date();
//         var month = now.getMonth() + 1; // 1-12
//         var day   = now.getDate();
//         return month === MONTH && day === DAY;
//     }

//     function openPopup() {
//         var popup = document.getElementById('holidayPopup');
//         if (!popup) return;
//         popup.classList.add('active');
//         document.body.style.overflow = 'hidden';
//         popup.setAttribute('aria-hidden', 'false');
//     }

//     function closePopup() {
//         var popup = document.getElementById('holidayPopup');
//         if (!popup) return;
//         popup.classList.remove('active');
//         document.body.style.overflow = '';
//         popup.setAttribute('aria-hidden', 'true');
//     }

//     function init() {
//         if (!isTodayHoliday()) return;

//         var popup   = document.getElementById('holidayPopup');
//         var btnClose = document.getElementById('holidayPopupClose');
//         var btnX     = document.getElementById('holidayPopupX');
//         var overlay  = popup ? popup.querySelector('.holiday-popup__overlay') : null;

//         if (!popup) return;

//         // Показываем попап через небольшую задержку для плавности
//         setTimeout(openPopup, 600);

//         if (btnClose) btnClose.addEventListener('click', closePopup);
//         if (btnX)     btnX.addEventListener('click', closePopup);
//         if (overlay)  overlay.addEventListener('click', closePopup);

//         document.addEventListener('keydown', function (e) {
//             if (e.key === 'Escape') closePopup();
//         });
//     }

//     if (document.readyState === 'loading') {
//         document.addEventListener('DOMContentLoaded', init);
//     } else {
//         init();
//     }
// })();
