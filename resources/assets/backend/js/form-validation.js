(() => {
    // Initialize custom option checkboxes (if available)
    if (window.Helpers && typeof window.Helpers.initCustomOptionCheck === "function") {
        window.Helpers.initCustomOptionCheck();
    }

    // Flatpickr basic validation setup
    const datePickers = document.querySelectorAll(".flatpickr-validation");
    if (datePickers.length) {
        datePickers.forEach(picker => {
            picker.flatpickr({
                allowInput: true,
                monthSelectorType: "static"
            });
        });
    }

    // Bootstrap form validation for native validation forms
    const forms = document.querySelectorAll(".needs-validation");
    Array.prototype.slice.call(forms).forEach(form => {
        form.addEventListener("submit", e => {
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.classList.add("was-validated");
        }, false);
    });
})();

// ✅ Run form validation setup only if form exists
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formValidationExamples");
    if (!form) return; // Stop if form not present

    const select2Field = jQuery(form.querySelector('[name="formValidationSelect2"]'));
    const techField = jQuery(form.querySelector('[name="formValidationTech"]'));
    const langField = form.querySelector('[name="formValidationLang"]');
    const selectPicker = jQuery(form.querySelector(".selectpicker"));

    const fv = FormValidation.formValidation(form, {
        fields: {
            formValidationName: {
                validators: {
                    notEmpty: { message: "Please enter your name" },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: "Name must be 6–30 characters long"
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9 ]+$/,
                        message: "Name can only contain letters, numbers, and spaces"
                    }
                }
            },
            formValidationEmail: {
                validators: {
                    notEmpty: { message: "Please enter your email" },
                    emailAddress: { message: "Enter a valid email address" }
                }
            },
            formValidationPass: {
                validators: { notEmpty: { message: "Please enter your password" } }
            },
            formValidationConfirmPass: {
                validators: {
                    notEmpty: { message: "Please confirm password" },
                    identical: {
                        compare: () => form.querySelector('[name="formValidationPass"]').value,
                        message: "Passwords do not match"
                    }
                }
            },
            formValidationFile: {
                validators: { notEmpty: { message: "Please select a file" } }
            },
            formValidationDob: {
                validators: {
                    notEmpty: { message: "Please select your DOB" },
                    date: {
                        format: "YYYY/MM/DD",
                        message: "The value is not a valid date"
                    }
                }
            },
            formValidationSelect2: {
                validators: { notEmpty: { message: "Please select your country" } }
            },
            formValidationLang: {
                validators: { notEmpty: { message: "Please add your language" } }
            },
            formValidationTech: {
                validators: { notEmpty: { message: "Please select a technology" } }
            },
            formValidationHobbies: {
                validators: { notEmpty: { message: "Please select your hobbies" } }
            },
            formValidationBio: {
                validators: {
                    notEmpty: { message: "Please enter your bio" },
                    stringLength: {
                        min: 100,
                        max: 500,
                        message: "Bio must be 100–500 characters long"
                    }
                }
            },
            formValidationGender: {
                validators: { notEmpty: { message: "Please select your gender" } }
            },
            formValidationPlan: {
                validators: { notEmpty: { message: "Please select a plan" } }
            },
            formValidationSwitch: {
                validators: { notEmpty: { message: "Please select your preference" } }
            },
            formValidationCheckbox: {
                validators: { notEmpty: { message: "Please accept our T&C" } }
            }
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
                eleValidClass: "",
                rowSelector: field => ".form-control-validation"
            }),
            submitButton: new FormValidation.plugins.SubmitButton(),
            defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
            autoFocus: new FormValidation.plugins.AutoFocus()
        },
        init: instance => {
            instance.on("plugins.message.placed", e => {
                if (e.element.parentElement.classList.contains("input-group")) {
                    e.element.parentElement.insertAdjacentElement("afterend", e.messageElement);
                }
                if (e.element.parentElement.parentElement.classList.contains("custom-option")) {
                    e.element.closest(".row").insertAdjacentElement("afterend", e.messageElement);
                }
            });
        }
    });

    // Date picker (Flatpickr)
    const dobField = form.querySelector('[name="formValidationDob"]');
    if (dobField) {
        dobField.flatpickr({
            enableTime: false,
            dateFormat: "Y/m/d",
            onChange: () => fv.revalidateField("formValidationDob")
        });
    }

    // Select2 dropdown validation
    if (select2Field.length) {
        select2Field.wrap('<div class="position-relative"></div>');
        select2Field
            .select2({
                placeholder: "Select country",
                dropdownParent: select2Field.parent()
            })
            .on("change", () => fv.revalidateField("formValidationSelect2"));
    }

    // Typeahead for tech field
    if (techField.length) {
        const techList = [
            "ReactJS", "Angular", "VueJS", "Html", "Css", "Sass",
            "Pug", "Gulp", "Php", "Laravel", "Python", "Bootstrap",
            "Material Design", "NodeJS"
        ];
        techField.typeahead(
            { hint: true, highlight: true, minLength: 1 },
            {
                name: "tech",
                source: function (query, process) {
                    const matches = techList.filter(item =>
                        new RegExp(query, "i").test(item)
                    );
                    process(matches);
                }
            }
        );
    }

    // Tagify for language field
    if (langField) {
        const tagify = new Tagify(langField);
        langField.addEventListener("change", () => {
            fv.revalidateField("formValidationLang");
        });
    }

    // Bootstrap select (picker)
    if (selectPicker.length) {
        selectPicker.on("changed.bs.select", () => {
            fv.revalidateField("formValidationHobbies");
        });
    }
});
