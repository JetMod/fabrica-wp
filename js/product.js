/**
 * Карусель изображений товара (скоуп на .product-gallery).
 * При цветовых вариантах — смена медиа по свотчу; стрелки клавиатуры только в контексте товара/галереи.
 */
(function () {
    'use strict';

    /**
     * @param {HTMLElement} galleryRoot
     * @returns {() => void} teardown
     */
    function initProductGallery(galleryRoot) {
        if (!galleryRoot || !(galleryRoot instanceof Element)) {
            return function () {};
        }

        const productMain = galleryRoot.closest('.product-main');
        const variantsScript = galleryRoot.querySelector('#fabrica-product-color-variants-data');
        let currentSlide = 0;

        function getRefs() {
            return {
                mainSlides: galleryRoot.querySelectorAll('.product-gallery__main-slide'),
                thumbs: galleryRoot.querySelectorAll('.product-gallery__thumb'),
                prevBtn: galleryRoot.querySelector('.product-gallery__nav--prev'),
                nextBtn: galleryRoot.querySelector('.product-gallery__nav--next'),
            };
        }

        function showSlide(index) {
            const { mainSlides, thumbs } = getRefs();
            if (!mainSlides.length) {
                return;
            }
            let n = index;
            if (n < 0) {
                n = mainSlides.length - 1;
            }
            if (n >= mainSlides.length) {
                n = 0;
            }
            mainSlides.forEach(function (slide, i) {
                slide.classList.toggle('active', i === n);
            });
            thumbs.forEach(function (thumb, i) {
                thumb.classList.toggle('active', i === n);
            });
            currentSlide = n;
        }

        function isEditableFocused(el) {
            if (!el || el.nodeType !== 1) {
                return false;
            }
            if (el.isContentEditable) {
                return true;
            }
            var tag = el.tagName;
            return tag === 'INPUT' || tag === 'TEXTAREA' || tag === 'SELECT';
        }

        function shouldHandleGalleryKeyboard() {
            var el = document.activeElement;
            if (!el || el === document.body) {
                return false;
            }
            if (galleryRoot.contains(el)) {
                return true;
            }
            if (productMain && productMain.contains(el) && !isEditableFocused(el)) {
                return true;
            }
            return false;
        }

        function createNavButton(direction) {
            var btn = document.createElement('button');
            btn.type = 'button';
            btn.className =
                'product-gallery__nav product-gallery__nav--' +
                (direction === 'prev' ? 'prev' : 'next');
            btn.setAttribute(
                'aria-label',
                direction === 'prev' ? 'Предыдущее фото' : 'Следующее фото'
            );
            if (direction === 'prev') {
                btn.innerHTML =
                    '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>';
            } else {
                btn.innerHTML =
                    '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>';
            }
            return btn;
        }

        function insertThumbsInGallery(galleryEl, thumbsEl) {
            var swatches = galleryEl.querySelector('.product-color-swatches');
            var script = galleryEl.querySelector('#fabrica-product-color-variants-data');
            if (swatches) {
                if (swatches.nextSibling) {
                    galleryEl.insertBefore(thumbsEl, swatches.nextSibling);
                } else {
                    galleryEl.appendChild(thumbsEl);
                }
            } else if (script) {
                galleryEl.insertBefore(thumbsEl, script);
            } else {
                galleryEl.appendChild(thumbsEl);
            }
        }

        /**
         * @param {HTMLElement} root
         * @param {{ url: string, alt?: string }[]} images
         */
        function replaceGalleryMedia(root, images) {
            var mainEl = root.querySelector('.product-gallery__main');
            if (!mainEl || !images || !images.length) {
                return;
            }

            mainEl.innerHTML = '';

            images.forEach(function (img, i) {
                var slide = document.createElement('div');
                slide.className =
                    'product-gallery__main-slide' + (i === 0 ? ' active' : '');
                var im = document.createElement('img');
                im.className = 'product-gallery__main-img';
                im.src = img.url;
                im.alt = img.alt != null ? String(img.alt) : '';
                slide.appendChild(im);
                mainEl.appendChild(slide);
            });

            if (images.length > 1) {
                mainEl.appendChild(createNavButton('prev'));
                mainEl.appendChild(createNavButton('next'));
            }

            var existingThumbs = root.querySelector('.product-gallery__thumbs');
            if (images.length > 1) {
                var thumbs = existingThumbs || document.createElement('div');
                thumbs.className = 'product-gallery__thumbs';
                thumbs.innerHTML = '';
                images.forEach(function (img, i) {
                    var btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className =
                        'product-gallery__thumb' + (i === 0 ? ' active' : '');
                    btn.setAttribute('aria-label', 'Фото ' + (i + 1));
                    var tim = document.createElement('img');
                    tim.className = 'product-gallery__thumb-img';
                    tim.src = img.url;
                    tim.alt = '';
                    btn.appendChild(tim);
                    thumbs.appendChild(btn);
                });
                if (!existingThumbs) {
                    insertThumbsInGallery(root, thumbs);
                }
            } else if (existingThumbs) {
                existingThumbs.remove();
            }
        }

        function updateSwatchStates(root, activeIndex) {
            root.querySelectorAll('.product-color-swatches__btn').forEach(function (btn, i) {
                var on = i === activeIndex;
                btn.classList.toggle('is-active', on);
                btn.setAttribute('aria-pressed', on ? 'true' : 'false');
            });
        }

        function onClick(e) {
            var thumb = e.target.closest('.product-gallery__thumb');
            if (thumb && galleryRoot.contains(thumb)) {
                var thumbs = galleryRoot.querySelectorAll('.product-gallery__thumb');
                var idx = Array.prototype.indexOf.call(thumbs, thumb);
                if (idx >= 0) {
                    showSlide(idx);
                }
                return;
            }

            if (e.target.closest('.product-gallery__nav--prev')) {
                e.preventDefault();
                var slidesPrev = getRefs().mainSlides;
                if (slidesPrev.length) {
                    showSlide(currentSlide - 1);
                }
                return;
            }

            if (e.target.closest('.product-gallery__nav--next')) {
                e.preventDefault();
                var slidesNext = getRefs().mainSlides;
                if (slidesNext.length) {
                    showSlide(currentSlide + 1);
                }
                return;
            }

            var swatch = e.target.closest('.product-color-swatches__btn');
            if (!swatch || !galleryRoot.contains(swatch) || !variantsScript) {
                return;
            }

            var data;
            try {
                data = JSON.parse(variantsScript.textContent || '{}');
            } catch (err) {
                return;
            }

            var vi = parseInt(swatch.getAttribute('data-variant-index'), 10);
            if (isNaN(vi) || !data.variants || !data.variants[vi]) {
                return;
            }

            var variant = data.variants[vi];
            updateSwatchStates(galleryRoot, vi);

            // Вариант без своей галереи: только переключаем свотч, медиа не меняем.
            if (!variant.images || !variant.images.length) {
                return;
            }

            removeListeners();
            replaceGalleryMedia(galleryRoot, variant.images);
            currentSlide = 0;
            showSlide(0);
            addListeners();
        }

        function onKeydown(e) {
            if (e.key !== 'ArrowLeft' && e.key !== 'ArrowRight') {
                return;
            }
            if (!shouldHandleGalleryKeyboard()) {
                return;
            }

            var refs = getRefs();
            if (!refs.prevBtn && !refs.nextBtn) {
                return;
            }

            if (e.key === 'ArrowLeft' && refs.prevBtn) {
                e.preventDefault();
                if (refs.mainSlides.length) {
                    showSlide(currentSlide - 1);
                }
            } else if (e.key === 'ArrowRight' && refs.nextBtn) {
                e.preventDefault();
                if (refs.mainSlides.length) {
                    showSlide(currentSlide + 1);
                }
            }
        }

        function addListeners() {
            galleryRoot.addEventListener('click', onClick);
            document.addEventListener('keydown', onKeydown);
        }

        function removeListeners() {
            galleryRoot.removeEventListener('click', onClick);
            document.removeEventListener('keydown', onKeydown);
        }

        addListeners();
        showSlide(0);

        return removeListeners;
    }

    if (typeof window !== 'undefined') {
        window.initProductGallery = initProductGallery;
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.product-gallery').forEach(function (root) {
            initProductGallery(root);
        });
    });
})();
