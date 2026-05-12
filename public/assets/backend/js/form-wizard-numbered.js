/**
 * Demo wizards (.wizard-numbered, etc.) — guards missing DOM and optional selectpicker.
 */
(function ($) {
    'use strict';

    $(function () {
        if (typeof $.fn.selectpicker === 'function') {
            $('.selectpicker').selectpicker();
        }
        if (typeof $.fn.select2 === 'function') {
            $('.select2').each(function () {
                var $el = $(this);
                if ($el.data('select2')) {
                    return;
                }
                $el.wrap('<div class="position-relative"></div>');
                $el.select2({
                    placeholder: 'Select value',
                    dropdownParent: $el.parent(),
                });
            });
        }
    });

    function bindStepper(selector) {
        var el = document.querySelector(selector);
        if (!el) {
            return;
        }
        var next = [].slice.call(el.querySelectorAll('.btn-next'));
        var prev = [].slice.call(el.querySelectorAll('.btn-prev'));
        var sub = el.querySelector('.btn-submit');
        var stepper = new Stepper(el, { linear: false });
        next.forEach(function (btn) {
            btn.addEventListener('click', function () {
                stepper.next();
            });
        });
        prev.forEach(function (btn) {
            btn.addEventListener('click', function () {
                stepper.previous();
            });
        });
        if (sub) {
            sub.addEventListener('click', function () {
                alert('Submitted..!!');
            });
        }
    }

    function initNumberedWizards() {
        if (typeof Stepper === 'undefined') {
            return;
        }
        bindStepper('.wizard-numbered');
        bindStepper('.wizard-vertical');
        bindStepper('.wizard-modern-example');
        bindStepper('.wizard-modern-vertical');
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initNumberedWizards);
    } else {
        initNumberedWizards();
    }
})(jQuery);
