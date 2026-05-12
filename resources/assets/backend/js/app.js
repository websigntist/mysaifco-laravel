// LightGallery init for both class conventions used in templates.
(function () {
    function getPlugins() {
        var plugins = [];
        if (typeof window.lgZoom !== 'undefined') plugins.push(window.lgZoom);
        if (typeof window.lgThumbnail !== 'undefined') plugins.push(window.lgThumbnail);
        return plugins;
    }

    function initGroupedListingLightbox() {
        document.addEventListener('click', function (e) {
            var link = e.target.closest('.table-responsive .light-gallery a[href], .table-responsive .lightgallery a[href], #jsdatatable_list .light-gallery a[href], #jsdatatable_list .lightgallery a[href]');
            if (!link) return;
            if (typeof window.lightGallery === 'undefined') return;

            e.preventDefault();

            var scope = link.closest('.table-responsive') || link.closest('#jsdatatable_list') || document;
            var allLinks = Array.prototype.slice.call(scope.querySelectorAll('.light-gallery a[href], .lightgallery a[href]'))
                .filter(function (a) {
                    var href = (a.getAttribute('href') || '').trim();
                    return href !== '' && href !== '#';
                });
            if (allLinks.length === 0) return;

            var items = allLinks.map(function (a) {
                var img = a.querySelector('img');
                return {
                    src: a.getAttribute('href'),
                    thumb: img ? img.getAttribute('src') : ''
                };
            });
            var index = Math.max(0, allLinks.indexOf(link));

            var host = document.createElement('div');
            document.body.appendChild(host);
            var instance = window.lightGallery(host, {
                dynamic: true,
                dynamicEl: items,
                index: index,
                controls: true,
                download: false,
                plugins: getPlugins(),
                speed: 500
            });
            if (instance && typeof instance.openGallery === 'function') {
                instance.openGallery(index);
            }

            host.addEventListener('lgAfterClose', function () {
                if (instance && typeof instance.destroy === 'function') instance.destroy();
                host.remove();
            }, { once: true });
        });
    }

    function initStandardLightGalleries() {
        if (typeof window.lightGallery === 'undefined') return;

        var galleries = document.querySelectorAll('.light-gallery, .lightgallery');
        galleries.forEach(function (gallery) {
            if (gallery.closest('.table-responsive') || gallery.closest('#jsdatatable_list')) return;
            if (gallery.getAttribute('data-lg-initialized') === '1') return;
            if (!gallery.querySelector('a[href], a[data-src]')) return;

            window.lightGallery(gallery, {
                selector: 'a',
                controls: true,
                download: false,
                plugins: getPlugins(),
                speed: 500
            });

            gallery.setAttribute('data-lg-initialized', '1');
        });
    }

    function initLightGalleries() {
        initGroupedListingLightbox();
        initStandardLightGalleries();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initLightGalleries);
    } else {
        initLightGalleries();
    }
})();

/*=========== select all checkbox script start ===============*/
(function () {
    'use strict';

    function initSelectAll() {
        const selectAllCheckbox = document.getElementById('selectAll');
        const deleteButtons = document.querySelectorAll('.confirm_all');

        if (!selectAllCheckbox || deleteButtons.length === 0) return;

        const getChildCheckboxes = () => document.querySelectorAll('.childCheckbox');

        const setDeleteButtonState = (enabled) => {
            deleteButtons.forEach(btn => {
                if (enabled) {
                    btn.disabled = false;
                    btn.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    btn.disabled = true;
                    btn.classList.add('opacity-50', 'cursor-not-allowed');
                }
            });
        };

        function updateDeleteButtonState() {
            const anyChecked = Array.from(getChildCheckboxes()).some(cb => cb.checked);
            setDeleteButtonState(anyChecked);
        }

        selectAllCheckbox.addEventListener('change', function () {
            getChildCheckboxes().forEach(cb => cb.checked = this.checked);
            updateDeleteButtonState();
        });

        document.addEventListener('change', function (e) {
            if (e.target.classList.contains('childCheckbox')) {
                const childCheckboxes = getChildCheckboxes();

                if (!e.target.checked) {
                    selectAllCheckbox.checked = false;
                } else if (Array.from(childCheckboxes).every(cb => cb.checked)) {
                    selectAllCheckbox.checked = true;
                }

                updateDeleteButtonState();
            }
        });

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                const checked = Array.from(getChildCheckboxes()).filter(cb => cb.checked);
                if (checked.length === 0) {
                    if (typeof Notiflix !== 'undefined') {
                        Notiflix.Notify.info('Please select at least one record to delete.', {
                            position: 'right-bottom'
                        });
                    }
                    return;
                }

                if (typeof Notiflix !== 'undefined') {
                    Notiflix.Confirm.show(
                        'Confirm Deletion',
                        'Selected records will be permanently deleted!',
                        'Yes, Delete All',
                        'Cancel',
                        function okCb() {
                            Notiflix.Loading.standard('Deleting...');
                            setTimeout(() => {
                                Notiflix.Loading.remove();
                                Notiflix.Notify.success('Records deleted successfully!', {
                                    position: 'right-top'
                                });
                                const deleteForm = document.querySelector('.deleteAll');
                                if (deleteForm) {
                                    deleteForm.submit();
                                }
                            }, 500);
                        },
                        function cancelCb() {
                            Notiflix.Notify.info('Deletion cancelled.', {
                                position: 'right-top'
                            });
                        },
                        {
                            width: '320px',
                            borderRadius: '8px',
                            okButtonBackground: '#E3342F',
                            titleColor: '#333333',
                            messageColor: '#666666',
                            buttonsFontSize: '15px'
                        }
                    );
                } else {
                    if (confirm('Are you sure you want to delete selected records?')) {
                        const deleteForm = document.querySelector('.deleteAll');
                        if (deleteForm) {
                            deleteForm.submit();
                        }
                    }
                }
            });
        });

        updateDeleteButtonState();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSelectAll);
    } else {
        initSelectAll();
    }
})();
/*=========== select all checkbox script end ===============*/

// Initialize DataTables
(function () {
    'use strict';

    function initDataTables() {
        if (typeof jQuery === 'undefined' || typeof jQuery.fn.DataTable === 'undefined') {
            console.warn('jQuery or DataTables not loaded');
            return;
        }

        const $ = jQuery;

        $(document).ready(function () {
            if ($('#jsdatatable_list').length) {
                $('#jsdatatable_list').DataTable({
                    responsive: true,
                    pageLength: 50,
                    lengthMenu: [[10, 20, 50, 100], [10, 20, 50, 100]],
                    columnDefs: [
                        {orderable: false, searchable: false, targets: [0, -1]}
                    ],
                    language: {
                        paginate: {
                            first:
                                '<span class="d-inline-flex align-items-center"><i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px" aria-hidden="true"></i><span class="visually-hidden">First</span></span>',
                            previous:
                                '<span class="d-inline-flex align-items-center justify-content-center"><i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px" aria-hidden="true"></i><span class="visually-hidden">Previous</span></span>',
                            next:
                                '<span class="d-inline-flex align-items-center justify-content-center"><i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px" aria-hidden="true"></i><span class="visually-hidden">Next</span></span>',
                            last:
                                '<span class="d-inline-flex align-items-center"><i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px" aria-hidden="true"></i><span class="visually-hidden">Last</span></span>',
                        },
                    },
                    initComplete: function () {
                        $('div.dt-search input').attr('placeholder', 'Search here...');
                        if (typeof window.initBootstrapTooltips === 'function') {
                            window.initBootstrapTooltips();
                        }
                    }
                });
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDataTables);
    } else {
        initDataTables();
    }
})();

// Delete other module image
(function () {
    'use strict';

    function initDeleteImage() {
        if (typeof jQuery === 'undefined') {
            return;
        }

        const $ = jQuery;

        $(document).ready(function () {
            $(document).on('click', '.del_img', function () {
                const button = $(this);
                const hiddenInput = $('.delete_img');

                hiddenInput.val('1');

                $('.lightgallery').fadeOut(300, function () {
                    $(this).remove();
                });

                $('.trashImg').fadeOut(300, function () {
                    $(this).remove();
                });

                button.closest('.fImg').fadeOut(200, function () {
                    $(this).remove();
                });
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDeleteImage);
    } else {
        initDeleteImage();
    }
})();

// Delete setting images
(function () {
    'use strict';

    function initDeleteSettingImage() {
        if (typeof jQuery === 'undefined') {
            return;
        }

        const $ = jQuery;

        $(document).ready(function () {
            $(document).on('click', '.setting_del_img', function () {
                const button = $(this);
                const row = button.closest('.image-row');
                const hiddenInput = row.find('.setting_delete_img');
                const gallery = row.find('.lightgallery');

                hiddenInput.val('1');

                gallery.fadeOut(300, function () {
                    $(this).remove();
                });

                button.closest('.sfImg').fadeOut(200, function () {
                    $(this).remove();
                });
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDeleteSettingImage);
    } else {
        initDeleteSettingImage();
    }
})();

// Bootstrap 5 tooltips: re-init with container "body" so they are not clipped by .table-responsive / overflow
(function () {
    'use strict';

    function initBootstrapTooltips(root) {
        if (typeof bootstrap === 'undefined' || !bootstrap.Tooltip) {
            return;
        }
        var scope = root || document;
        scope.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function (el) {
            var existing = bootstrap.Tooltip.getInstance(el);
            if (existing) {
                existing.dispose();
            }
            new bootstrap.Tooltip(el, { container: 'body' });
        });
    }

    window.initBootstrapTooltips = initBootstrapTooltips;

    function run() {
        initBootstrapTooltips(document);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', run);
    } else {
        run();
    }
})();
