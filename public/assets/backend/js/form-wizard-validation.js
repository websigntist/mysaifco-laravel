/**
 * bs-stepper + FormValidation for #wizard-validation (product form).
 * Form wraps the stepper — resolve the form with document.querySelector, not from inside the stepper.
 */
(function () {
    'use strict';

    function init() {
        if (typeof FormValidation === 'undefined' || typeof Stepper === 'undefined') {
            console.warn('form-wizard-validation: FormValidation or Stepper not loaded');
            return;
        }

        var stepperEl = document.querySelector('#wizard-validation');
        if (!stepperEl) {
            return;
        }

        var formEl = document.querySelector('#wizard-validation-form');
        if (!formEl) {
            console.warn('form-wizard-validation: #wizard-validation-form not found');
            return;
        }

        var accountPane = stepperEl.querySelector('#account-details-validation');
        var personalPane = stepperEl.querySelector('#personal-info-validation');
        var socialPane = stepperEl.querySelector('#social-links-validation');
        if (!accountPane || !personalPane || !socialPane) {
            return;
        }

        var nextBtns = [].slice.call(stepperEl.querySelectorAll('.btn-next'));
        var prevBtns = [].slice.call(stepperEl.querySelectorAll('.btn-prev'));

        var stepper = new Stepper(stepperEl, { linear: true });

        var fvAccount = FormValidation.formValidation(accountPane, {
            fields: {
                formValidationUsername: {
                    validators: {
                        notEmpty: { message: 'The name is required' },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: 'The name must be more than 6 and less than 30 characters long',
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9 ]+$/,
                            message: 'The name can only consist of alphabetical, number and space',
                        },
                    },
                },
                formValidationEmail: {
                    validators: {
                        notEmpty: { message: 'The Email is required' },
                        emailAddress: { message: 'The value is not a valid email address' },
                    },
                },
                formValidationPass: {
                    validators: {
                        notEmpty: { message: 'The password is required' },
                    },
                },
                formValidationConfirmPass: {
                    validators: {
                        notEmpty: { message: 'The Confirm Password is required' },
                        identical: {
                            compare: function () {
                                return accountPane.querySelector('[name="formValidationPass"]').value;
                            },
                            message: 'The password and its confirm are not the same',
                        },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    eleValidClass: '',
                    rowSelector: '.form-control-validation',
                }),
                autoFocus: new FormValidation.plugins.AutoFocus(),
                submitButton: new FormValidation.plugins.SubmitButton(),
            },
            init: function (instance) {
                instance.on('plugins.message.placed', function (e) {
                    if (e.element.parentElement.classList.contains('input-group')) {
                        e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
                    }
                });
            },
        }).on('core.form.valid', function () {
            stepper.next();
        });

        var fvPersonal = FormValidation.formValidation(personalPane, {
            fields: {
                formValidationFirstName: {
                    validators: {
                        notEmpty: { message: 'The first name is required' },
                    },
                },
                formValidationLastName: {
                    validators: {
                        notEmpty: { message: 'The last name is required' },
                    },
                },
                formValidationCountry: {
                    validators: {
                        notEmpty: { message: 'The Country is required' },
                    },
                },
                formValidationLanguage: {
                    selector: '#formValidationLanguage',
                    validators: {
                        callback: {
                            message: 'Select at least one language',
                            callback: function (input) {
                                var el = input.element;
                                return el.selectedOptions && el.selectedOptions.length > 0;
                            },
                        },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    eleValidClass: '',
                    rowSelector: '.form-control-validation',
                }),
                autoFocus: new FormValidation.plugins.AutoFocus(),
                submitButton: new FormValidation.plugins.SubmitButton(),
            },
        }).on('core.form.valid', function () {
            stepper.next();
        });

        if (typeof jQuery !== 'undefined' && jQuery.fn.select2) {
            jQuery(personalPane)
                .find('select.select2')
                .each(function () {
                    var $el = jQuery(this);
                    if ($el.data('select2')) {
                        return;
                    }
                    $el.wrap('<div class="position-relative"></div>');
                    var isMulti = $el.prop('multiple');
                    $el.select2({
                        placeholder: isMulti ? 'Select languages' : 'Select country',
                        dropdownParent: $el.parent(),
                    }).on('change', function () {
                        var id = $el.attr('id');
                        if (id === 'formValidationCountry') {
                            fvPersonal.revalidateField('formValidationCountry');
                        }
                        if (id === 'formValidationLanguage') {
                            fvPersonal.revalidateField('formValidationLanguage');
                        }
                    });
                });
        }

        var fvSocial = FormValidation.formValidation(socialPane, {
            fields: {
                formValidationTwitter: {
                    validators: {
                        notEmpty: { message: 'The Twitter URL is required' },
                        uri: { message: 'The URL is not proper' },
                    },
                },
                formValidationFacebook: {
                    validators: {
                        notEmpty: { message: 'The Facebook URL is required' },
                        uri: { message: 'The URL is not proper' },
                    },
                },
                formValidationGoogle: {
                    validators: {
                        notEmpty: { message: 'The Google URL is required' },
                        uri: { message: 'The URL is not proper' },
                    },
                },
                formValidationLinkedIn: {
                    validators: {
                        notEmpty: { message: 'The LinkedIn URL is required' },
                        uri: { message: 'The URL is not proper' },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap5: new FormValidation.plugins.Bootstrap5({
                    eleValidClass: '',
                    rowSelector: '.form-control-validation',
                }),
                autoFocus: new FormValidation.plugins.AutoFocus(),
                submitButton: new FormValidation.plugins.SubmitButton(),
            },
        }).on('core.form.valid', function () {
            /* Last wizard step valid — use main form buttons below to save */
        });

        nextBtns.forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                switch (stepper._currentIndex) {
                    case 0:
                        fvAccount.validate();
                        break;
                    case 1:
                        fvPersonal.validate();
                        break;
                    case 2:
                        fvSocial.validate();
                        break;
                    default:
                        break;
                }
            });
        });

        prevBtns.forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                if (stepper._currentIndex === 1 || stepper._currentIndex === 2) {
                    stepper.previous();
                }
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
