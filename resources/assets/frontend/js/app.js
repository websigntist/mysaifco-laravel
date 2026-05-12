import 'https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js';

import Swiper from 'swiper';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

import $ from "jquery";

window.$ = $;
window.jQuery = $;

/**
 * Quote form: native <select> lists ignore option padding on many OS/browsers.
 * Custom list keeps the real <select> (submit + ids) and applies 10px row padding in CSS.
 */
function initQuoteFormCustomSelects() {
    const chevronSvg =
        '<svg class="h-4 w-4 shrink-0 text-white/80" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>';

    function closeSelect(wrap) {
        const list = wrap.querySelector('.quote-custom-select__list');
        const trigger = wrap.querySelector('.quote-custom-select__trigger');
        if (list) list.hidden = true;
        if (trigger) trigger.setAttribute('aria-expanded', 'false');
        wrap.classList.remove('is-open');
        /** @type {HTMLElement | undefined} */
        const cell = wrap._stackCell;
        cell?.classList.remove('quote-form-select-cell--open');
    }

    document.querySelectorAll('form.quote-form').forEach((form, formIndex) => {
        if (form.dataset.quoteSelectInit === '1') return;
        form.dataset.quoteSelectInit = '1';

        form.querySelectorAll('select').forEach((select, selectIndex) => {
            if (select.closest('.quote-custom-select')) return;

            const wrap = document.createElement('div');
            wrap.className = 'quote-custom-select relative z-10 w-full';

            const trigger = document.createElement('button');
            trigger.type = 'button';
            trigger.className =
                'quote-custom-select__trigger flex w-full items-center justify-between gap-2 border-0 border-b-2' +
                ' border-default-medium bg-transparent py-2.5 text-left text-sm text-white focus:border-brand' +
                ' focus:outline-none focus:ring-0';
            trigger.setAttribute('aria-haspopup', 'listbox');
            trigger.setAttribute('aria-expanded', 'false');

            const listId = `${select.id || select.name || 'quote-select'}-list-${formIndex}-${selectIndex}`;
            trigger.setAttribute('aria-controls', listId);
            trigger.innerHTML = `<span class="quote-custom-select__label min-w-0 truncate"></span>${chevronSvg}`;

            const list = document.createElement('ul');
            list.id = listId;
            list.className =
                'quote-custom-select__list absolute left-0 right-0 top-full z-[200] mt-1 max-h-56 overflow-y-auto' +
                ' rounded bg-gray-900 py-1 text-left shadow-xl outline-none';
            list.setAttribute('role', 'listbox');
            list.hidden = true;

            const labelSpan = trigger.querySelector('.quote-custom-select__label');

            function syncLabelAndSelection() {
                const idx = select.selectedIndex >= 0 ? select.selectedIndex : 0;
                const opt = select.options[idx];
                labelSpan.textContent = opt ? opt.textContent : '';
                list.querySelectorAll('.quote-custom-select__option').forEach((li, i) => {
                    li.classList.toggle('is-selected', i === idx);
                    li.setAttribute('aria-selected', i === idx ? 'true' : 'false');
                });
            }

            Array.from(select.options).forEach((opt, idx) => {
                const li = document.createElement('li');
                li.setAttribute('role', 'option');
                li.className = 'quote-custom-select__option cursor-pointer text-sm text-slate-100';
                li.textContent = opt.textContent;
                li.dataset.value = opt.value;
                li.tabIndex = -1;
                li.addEventListener('click', (e) => {
                    e.stopPropagation();
                    select.selectedIndex = idx;
                    select.dispatchEvent(new Event('change', { bubbles: true }));
                    syncLabelAndSelection();
                    closeSelect(wrap);
                });
                list.appendChild(li);
            });

            select.parentNode.insertBefore(wrap, select);
            wrap.appendChild(trigger);
            wrap.appendChild(list);
            wrap.appendChild(select);

            wrap._stackCell = wrap.closest('.group');

            select.className = 'sr-only';
            select.setAttribute('tabindex', '-1');

            syncLabelAndSelection();
            select.addEventListener('change', syncLabelAndSelection);

            trigger.addEventListener('click', (e) => {
                e.stopPropagation();
                if (!list.hidden) {
                    closeSelect(wrap);
                    return;
                }
                form.querySelectorAll('.quote-custom-select').forEach((w) => {
                    if (w !== wrap) closeSelect(w);
                });
                list.hidden = false;
                trigger.setAttribute('aria-expanded', 'true');
                wrap.classList.add('is-open');
                wrap._stackCell?.classList.add('quote-form-select-cell--open');
            });
        });

        document.addEventListener('click', () => {
            form.querySelectorAll('.quote-custom-select').forEach(closeSelect);
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                form.querySelectorAll('.quote-custom-select').forEach(closeSelect);
            }
        });
    });
}

function initImageLogosSwiper() {
    const el = document.querySelector('#image-logos-swiper');
    if (!el || el.dataset.swiperInit === '1') {
        return;
    }
    el.dataset.swiperInit = '1';

    const wrap = el.closest('.image-logos-carousel');
    const prevEl = wrap?.querySelector('.image-logos-swiper-prev') ?? null;
    const nextEl = wrap?.querySelector('.image-logos-swiper-next') ?? null;

    new Swiper(el, {
        modules: [Autoplay, Navigation],
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 12,
        speed: 500,
        loop: false,
        rewind: true,
        watchOverflow: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        navigation: {
            prevEl,
            nextEl,
        },
        breakpoints: {
            480: {
                slidesPerView: 2,
                slidesPerGroup: 1,
                spaceBetween: 14,
            },
            768: {
                slidesPerView: 3,
                slidesPerGroup: 1,
                spaceBetween: 16,
            },
            1024: {
                slidesPerView: 4,
                slidesPerGroup: 1,
                spaceBetween: 20,
            },
        },
    });
}

function initWhyChooseLogosSwiper() {
    const el = document.querySelector('#why-choose-logos-swiper');
    if (!el || el.dataset.swiperInit === '1') {
        return;
    }
    el.dataset.swiperInit = '1';

    new Swiper(el, {
        modules: [Autoplay, Pagination],
        slidesPerView: 1,
        spaceBetween: 0,
        loop: false,
        rewind: true,
        speed: 600,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        pagination: {
            el: el.querySelector('.why-choose-logos-swiper-pagination'),
            clickable: true,
            dynamicBullets: true,
        },
    });
}

/**
 * Category strip: vertical wheel scrolls horizontally; next button advances one item.
 */
function initScrollMenus() {
    document.querySelectorAll('.scroll_menu').forEach((root) => {
        if (root.dataset.scrollMenuInit === '1') {
            return;
        }
        root.dataset.scrollMenuInit = '1';

        const track = root.querySelector('[data-scroll-menu-track]');
        const nextBtn = root.querySelector('[data-scroll-menu-next]');
        if (!track || !(track instanceof HTMLElement)) {
            return;
        }

        track.addEventListener(
            'wheel',
            (e) => {
                if (Math.abs(e.deltaX) > Math.abs(e.deltaY)) {
                    return;
                }
                e.preventDefault();
                track.scrollLeft += e.deltaY;
            },
            { passive: false },
        );

        function scrollToNextItem() {
            const items = [...track.querySelectorAll('li')];
            if (!items.length) {
                return;
            }
            const sl = track.scrollLeft;
            let target = track.scrollWidth - track.clientWidth;
            for (const li of items) {
                if (li.offsetLeft > sl + 2) {
                    target = li.offsetLeft;
                    break;
                }
            }
            const maxLeft = Math.max(0, track.scrollWidth - track.clientWidth);
            track.scrollTo({ left: Math.min(target, maxLeft), behavior: 'smooth' });
        }

        nextBtn?.addEventListener('click', scrollToNextItem);
    });
}

function initFrontend() {
    initQuoteFormCustomSelects();
    initWhyChooseLogosSwiper();
    initImageLogosSwiper();
    initScrollMenus();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initFrontend);
} else {
    initFrontend();
}
