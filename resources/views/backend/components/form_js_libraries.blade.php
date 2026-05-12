{{--================ CSS style ==========================--}}


{{--================ JS libraries ==========================--}}
<script>
    $('#title').bind('keyup blur', function () {
        var title = $(this).val();
        $('#friendly_url').val(friendly_URL(title));
        $('#meta_title').val(meta_title(title));
    });

    /*auto written friendly url*/
    function friendly_URL(url) {
        url.trim();
        var URL = url.replace(/\-+/g, '-').replace(/\W+/g, '-');// Replace Non-word characters
        if (URL.substr((URL.length - 1), URL.length) == '-') {
            URL = URL.substr(0, (URL.length - 1));
        }
        return URL.toLowerCase();
    }

    /*auto written page title*/
    function page_title(url) {
        url.trim();
        var URL = url.replace(/\-+/g, '-').replace(/\W+/g, ' ');// Replace Non-word characters
        if (URL.substr((URL.length - 1), URL.length) == ' ') {
            URL = URL.substr(0, (URL.length - 1));
        }
        return capital_letter(URL);
    }

    /*auto written meta title*/
    function meta_title(url) {
        url.trim();
        var URL = url.replace(/\-+/g, '-').replace(/\W+/g, ' ');// Replace Non-word characters
        if (URL.substr((URL.length - 1), URL.length) == ' ') {
            URL = URL.substr(0, (URL.length - 1));
        }
        return capital_letter(URL);
    }

    /* capitalize in java */
    function capital_letter(str) {
        str = str.split(" ");
        for (var i = 0, x = str.length; i < x; i++) {
            str[i] = str[i][0].toUpperCase() + str[i].substr(1);
        }
        return str.join(" ");
    }
</script>
<script src="{{ asset('assets/backend/js/cleave-zen.js') }}"></script>
<script src="{{ asset('assets/backend/js/select2.js') }}"></script>
<script src="{{ asset('assets/backend/js/form-layouts.js') }}"></script>
<script src="{{ asset('assets/backend/js/form-validation.js') }}"></script>
<script src="{{ asset('assets/backend/js/tinymce/tinymce.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof tinymce === 'undefined') return;
        var common = {
            license_key: 'gpl',
            plugins: 'code lists link image table anchor searchreplace visualblocks fullscreen insertdatetime table wordcount',
            toolbar: [
                'undo redo | fontfamily fontsize | bold italic underline forecolor backcolor | strikethrough numlist ' +
                'bullist checklist alignleft aligncenter alignright alignjustify |',
                'link image table | subscript superscript removeformat | fullscreen code'
            ].join(' '),
            menubar: false,
            branding: false,
            toolbar_mode: 'wrap',
            font_family_formats:
                'Poppins=poppins, sans-serif;' +
                'Arial=arial,helvetica,sans-serif;' +
                'Georgia=georgia,serif;' +
                'Times New Roman=times new roman,times;' +
                'Verdana=verdana,geneva,sans-serif;',
            font_size_formats: '8px 10px 12px 14px 16px 18px 20px 24px 28px 32px 36px',
        };
        if (document.querySelector('.tinymce-editor')) {
            tinymce.init(Object.assign({ selector: '.tinymce-editor' }, common));
        } else if (document.querySelector('#editor')) {
            tinymce.init(Object.assign({ selector: '#editor' }, common));
        }
    });
</script>
