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

function initTourDetailsSwiper() {
    const el = document.querySelector('.tour-details-swiper');
    if (!el || el.dataset.swiperInit === '1') {
        return;
    }
    el.dataset.swiperInit = '1';

    const wrap = el.parentElement;
    const prevEl = wrap?.querySelector('.tour-details-swiper-prev') ?? null;
    const nextEl = wrap?.querySelector('.tour-details-swiper-next') ?? null;

    const swiper = new Swiper(el, {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 0,
        speed: 800,
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        pagination: {
            el: wrap?.querySelector('.tour-details-swiper-pagination') ?? null,
            clickable: true,
        },
        navigation: {
            prevEl,
            nextEl,
        },
    });

    el.addEventListener('click', (e) => {
        if (!e.target.closest('.tour-details-swiper-prev') && !e.target.closest('.tour-details-swiper-next')) {
            swiper.slideNext();
        }
    });
}

function initTourBookingForm() {
    const form = document.getElementById('tour-booking-form');
    if (!form) return;

    const adultSelect = document.getElementById('adult-count');
    const childSelect = document.getElementById('child-count');
    const infantSelect = document.getElementById('infant-count');
    const totalEl = document.getElementById('booking-total-price');

    // Custom date picker logic
    const dateInput = document.getElementById('booking-date');
    const dateDisplay = document.getElementById('booking-date-display');
    if (dateInput && dateDisplay) {
        dateInput.addEventListener('change', function() {
            if (dateInput.value) {
                const date = new Date(dateInput.value);
                if (!isNaN(date.getTime())) {
                    const options = { day: '2-digit', month: 'short', year: 'numeric' };
                    dateDisplay.textContent = date.toLocaleDateString('en-US', options);
                } else {
                    dateDisplay.textContent = dateInput.value;
                }
                dateDisplay.classList.remove('text-gray-400');
                dateDisplay.classList.add('text-[#282828]');
            } else {
                dateDisplay.textContent = 'Select Date';
            }
        });
    }

    // Parse prices from HTML dynamically for robustness
    const adultPriceText = document.querySelector('.adult-price-value');
    const childPriceText = document.querySelector('.child-price-value');
    const infantPriceText = document.querySelector('.infant-price-value');

    const ADULT_PRICE = adultPriceText ? (parseFloat(adultPriceText.textContent) || 0) : 150;
    const CHILD_PRICE = childPriceText ? (parseFloat(childPriceText.textContent) || 0) : 150;
    const INFANT_PRICE = infantPriceText ? (parseFloat(infantPriceText.textContent) || 0) : 0;

    function calculateTotal() {
        const adults = parseInt(adultSelect.value) || 0;
        const children = parseInt(childSelect.value) || 0;
        const infants = parseInt(infantSelect.value) || 0;

        const total = (adults * ADULT_PRICE) + (children * CHILD_PRICE) + (infants * INFANT_PRICE);
        
        totalEl.textContent = `AED ${total.toFixed(2)}`;
    }

    adultSelect.addEventListener('change', calculateTotal);
    childSelect.addEventListener('change', calculateTotal);
    infantSelect.addEventListener('change', calculateTotal);

    // Initial calculation
    calculateTotal();
}




function initHolidayPackagesSwiper() {
    const el = document.querySelector('.holiday-swiper');
    if (!el || el.dataset.swiperInit === '1') {
        return;
    }
    el.dataset.swiperInit = '1';

    const wrap = el.closest('.holiday-swiper-wrap');
    const prevEl = wrap?.querySelector('.holiday-swiper-prev') ?? null;
    const nextEl = wrap?.querySelector('.holiday-swiper-next') ?? null;

    const swiper = new Swiper(el, {
        modules: [Autoplay, Navigation],
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 16,
        speed: 600,
        loop: true,
        watchOverflow: true,
        grabCursor: true,
        observer: true,
        observeParents: true,
        resizeObserver: true,
        navigation: {
            prevEl,
            nextEl,
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 1.72,
                slidesPerGroup: 1,
                spaceBetween: 24,
            },
            1024: {
                slidesPerView: 2.8,
                slidesPerGroup: 1,
                spaceBetween: 28,
            },
        },
    });

    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => swiper.update(), 150);
    });
}

function initBestSellerSwiper() {
    const el = document.querySelector('.best-seller-swiper');
    if (!el || el.dataset.swiperInit === '1') {
        return;
    }
    el.dataset.swiperInit = '1';

    const wrap = el.closest('.best-seller-swiper-wrap');
    const prevEl = wrap?.querySelector('.best-seller-swiper-prev') ?? null;
    const nextEl = wrap?.querySelector('.best-seller-swiper-next') ?? null;

    new Swiper(el, {
        modules: [Autoplay, Navigation],
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 16,
        speed: 600,
        loop: false,
        rewind: true,
        watchOverflow: true,
        grabCursor: true,
        navigation: {
            prevEl,
            nextEl,
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2.35,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3.5,
                spaceBetween: 20,
            },
        },
    });
}

function initTestimonialsSwiper() {
    const el = document.querySelector('#testimonials-swiper');
    if (!el || el.dataset.swiperInit === '1') {
        return;
    }
    el.dataset.swiperInit = '1';

    const wrap = el.closest('.testimonials-swiper-wrap');
    const prevEl = wrap?.querySelector('.testimonials-swiper-prev') ?? null;
    const nextEl = wrap?.querySelector('.testimonials-swiper-next') ?? null;

    new Swiper(el, {
        modules: [Autoplay, Navigation],
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 20,
        speed: 550,
        loop: false,
        rewind: true,
        watchOverflow: true,
        grabCursor: true,
        navigation: {
            prevEl,
            nextEl,
        },
        autoplay: {
            delay: 4500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                slidesPerGroup: 1,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                slidesPerGroup: 1,
                spaceBetween: 24,
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
 * Navbar mega-items: Flowbite used duplicate IDs so only one dropdown worked.
 * Desktop (md+): hover / focus-within via resources/assets/frontend/css/custom.css.
 * Narrow / touch-primary viewports: tap toggles .is-open on the parent li.
 */
function initNavbarDropdowns() {
    const mqMobile = window.matchMedia('(max-width: 767.98px)');
    const mqCoarseTouch = window.matchMedia('(hover: none) and (pointer: coarse)');

    /** Narrow viewports or touch-primary devices (tablets) where hover menus do not work. */
    function useClickForNavDropdowns() {
        return mqMobile.matches || mqCoarseTouch.matches;
    }

    function closeAllNavDropdowns() {
        document.querySelectorAll('.nav-dropdown.is-open, .nav-submenu.is-open').forEach((el) => {
            el.classList.remove('is-open');
        });
    }

    document.querySelectorAll('.nav-dropdown').forEach((rootLi) => {
        const trigger = rootLi.querySelector('.nav-dropdown-trigger');
        if (!trigger || trigger.dataset.navDropdownBound === '1') {
            return;
        }
        trigger.dataset.navDropdownBound = '1';

        trigger.addEventListener('click', (e) => {
            if (!useClickForNavDropdowns()) {
                return;
            }
            e.preventDefault();
            const willOpen = !rootLi.classList.contains('is-open');
            document.querySelectorAll('.nav-dropdown.is-open').forEach((other) => {
                if (other !== rootLi) {
                    other.classList.remove('is-open');
                    other.querySelectorAll('.nav-submenu.is-open').forEach((s) => s.classList.remove('is-open'));
                }
            });
            rootLi.classList.toggle('is-open', willOpen);
            if (!willOpen) {
                rootLi.querySelectorAll('.nav-submenu.is-open').forEach((s) => s.classList.remove('is-open'));
            }
        });
    });

    document.querySelectorAll('.nav-submenu').forEach((subLi) => {
        const trigger = subLi.querySelector('.nav-submenu-trigger');
        if (!trigger || trigger.dataset.navSubmenuBound === '1') {
            return;
        }
        trigger.dataset.navSubmenuBound = '1';

        trigger.addEventListener('click', (e) => {
            if (!useClickForNavDropdowns()) {
                return;
            }
            e.preventDefault();
            e.stopPropagation();
            subLi.classList.toggle('is-open');
        });
    });

    document.addEventListener('click', (e) => {
        if (!useClickForNavDropdowns()) {
            return;
        }
        if (!e.target.closest('.nav-dropdown')) {
            closeAllNavDropdowns();
        }
    });

    mqMobile.addEventListener('change', () => {
        closeAllNavDropdowns();
    });
    mqCoarseTouch.addEventListener('change', () => {
        closeAllNavDropdowns();
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

function initCustomAccordions() {
    const accordions = document.querySelectorAll('[data-custom-accordion="collapse"]');
    accordions.forEach(accordion => {
        const buttons = accordion.querySelectorAll('[data-custom-accordion-target]');
        buttons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = btn.getAttribute('data-custom-accordion-target');
                const target = accordion.querySelector(targetId);
                if (!target) return;

                const isExpanded = btn.getAttribute('aria-expanded') === 'true';

                // Collapse other items if accordion has collapse behavior
                buttons.forEach(otherBtn => {
                    if (otherBtn !== btn && otherBtn.getAttribute('aria-expanded') === 'true') {
                        otherBtn.setAttribute('aria-expanded', 'false');
                        const otherTargetId = otherBtn.getAttribute('data-custom-accordion-target');
                        const otherTarget = accordion.querySelector(otherTargetId);
                        if (otherTarget) {
                            otherTarget.style.gridTemplateRows = '0fr';
                        }
                        const otherIcon = otherBtn.querySelector('[data-accordion-icon]');
                        if (otherIcon) {
                            otherIcon.classList.remove('rotate-180');
                        }
                    }
                });

                // Toggle selected item
                if (isExpanded) {
                    btn.setAttribute('aria-expanded', 'false');
                    target.style.gridTemplateRows = '0fr';
                    const icon = btn.querySelector('[data-accordion-icon]');
                    if (icon) icon.classList.remove('rotate-180');
                } else {
                    btn.setAttribute('aria-expanded', 'true');
                    target.style.gridTemplateRows = '1fr';
                    const icon = btn.querySelector('[data-accordion-icon]');
                    if (icon) icon.classList.add('rotate-180');
                }
            });
        });
    });
}

function initFrontend() {
    initQuoteFormCustomSelects();
    initHolidayPackagesSwiper();
    initBestSellerSwiper();
    initTestimonialsSwiper();
    initWhyChooseLogosSwiper();
    initImageLogosSwiper();
    initTourDetailsSwiper();
    initTourBookingForm();
    initScrollMenus();
    initNavbarDropdowns();
    initCustomAccordions();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initFrontend);
} else {
    initFrontend();
}
