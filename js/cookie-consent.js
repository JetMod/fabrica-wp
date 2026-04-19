/**
 * Cookies / Яндекс.Метрика: localStorage только при «Принять» (analytics).
 * «Отклонить» не сохраняется — баннер снова при следующей загрузке страницы.
 */
(function () {
    var STORAGE_KEY = 'fabrica_cookie_consent_v1';
    var COUNTER_ID = 108485411;
    var TAG_URL = 'https://mc.yandex.ru/metrika/tag.js?id=' + COUNTER_ID;

    function getStored() {
        try {
            return localStorage.getItem(STORAGE_KEY);
        } catch (e) {
            return null;
        }
    }

    function setStored(value) {
        try {
            localStorage.setItem(STORAGE_KEY, value);
        } catch (e) {
            /* ignore */
        }
    }

    function clearStored() {
        try {
            localStorage.removeItem(STORAGE_KEY);
        } catch (e) {
            /* ignore */
        }
    }

    function loadYandexMetrika() {
        if (window.fabricaYmLoaded) {
            return;
        }
        window.fabricaYmLoaded = true;

        (function (m, e, t, r, i, k, a) {
            m[i] =
                m[i] ||
                function () {
                    (m[i].a = m[i].a || []).push(arguments);
                };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t);
            a = e.getElementsByTagName(t)[0];
            k.async = 1;
            k.src = r;
            a.parentNode.insertBefore(k, a);
        })(window, document, 'script', TAG_URL, 'ym');

        ym(COUNTER_ID, 'init', {
            ssr: true,
            webvisor: true,
            clickmap: true,
            ecommerce: 'dataLayer',
            referrer: document.referrer,
            url: location.href,
            accurateTrackBounce: true,
            trackLinks: true,
        });
    }

    function hideBanner(root) {
        root.classList.add('cookie-consent--hidden');
        root.setAttribute('aria-hidden', 'true');
    }

    function showBanner(root) {
        root.classList.remove('cookie-consent--hidden');
        root.setAttribute('aria-hidden', 'false');
    }

    function init() {
        var root = document.getElementById('cookieConsent');
        if (!root) {
            return;
        }

        var stored = getStored();
        if (stored === 'analytics') {
            loadYandexMetrika();
            hideBanner(root);
            return;
        }

        var checkbox = document.getElementById('cookieConsentPd');
        var btnAccept = document.getElementById('cookieConsentAccept');
        var btnDecline = document.getElementById('cookieConsentDecline');

        showBanner(root);

        function syncAccept() {
            if (btnAccept && checkbox) {
                btnAccept.disabled = !checkbox.checked;
            }
        }

        if (checkbox) {
            checkbox.addEventListener('change', syncAccept);
            syncAccept();
        }

        if (btnAccept) {
            btnAccept.addEventListener('click', function () {
                if (!checkbox || !checkbox.checked) {
                    return;
                }
                setStored('analytics');
                loadYandexMetrika();
                hideBanner(root);
            });
        }

        if (btnDecline) {
            btnDecline.addEventListener('click', function () {
                clearStored();
                hideBanner(root);
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
