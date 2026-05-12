// All imports removed - files are now loaded via script tags in the layout
// This file contains only the application logic

// Initialize lightgallery inside DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
    if (typeof lightGallery === 'undefined') return;

    const getPlugins = () => {
        const plugins = [];
        if (typeof lgThumbnail !== 'undefined') plugins.push(lgThumbnail);
        if (typeof lgZoom !== 'undefined') plugins.push(lgZoom);
        return plugins;
    };

    // Group all listing page images into one navigable lightbox.
    document.addEventListener('click', e => {
        const link = e.target.closest('.table-responsive .light-gallery a[href], .table-responsive .lightgallery a[href], #jsdatatable_list .light-gallery a[href], #jsdatatable_list .lightgallery a[href]');
        if (!link) return;
        if (typeof lightGallery === 'undefined') return;

        e.preventDefault();

        const scope = link.closest('.table-responsive') || link.closest('#jsdatatable_list') || document;
        const allLinks = Array.from(scope.querySelectorAll('.light-gallery a[href], .lightgallery a[href]'))
            .filter(a => {
                const href = (a.getAttribute('href') || '').trim();
                return href !== '' && href !== '#';
            });
        if (!allLinks.length) return;

        const dynamicEl = allLinks.map(a => {
            const img = a.querySelector('img');
            return {
                src: a.getAttribute('href'),
                thumb: img ? img.getAttribute('src') : '',
            };
        });
        const index = Math.max(0, allLinks.indexOf(link));

        const host = document.createElement('div');
        document.body.appendChild(host);
        const instance = lightGallery(host, {
            dynamic: true,
            dynamicEl,
            index,
            plugins: getPlugins(),
            speed: 500,
            controls: true,
            download: false,
        });
        if (instance && typeof instance.openGallery === 'function') {
            instance.openGallery(index);
        }

        host.addEventListener('lgAfterClose', () => {
            if (instance && typeof instance.destroy === 'function') instance.destroy();
            host.remove();
        }, { once: true });
    });

    // Keep standard behavior for non-listing galleries.
    const galleries = document.querySelectorAll('.lightgallery, .light-gallery');
    galleries.forEach(gallery => {
        if (gallery.closest('.table-responsive') || gallery.closest('#jsdatatable_list')) return;
        if (gallery.getAttribute('data-lg-initialized') === '1') return;
        if (!gallery.querySelector('a[href], a[data-src]')) return;

        lightGallery(gallery, {
            selector: 'a',
            plugins: getPlugins(),
            speed: 500,
            controls: true,
            download: false,
        });

        gallery.setAttribute('data-lg-initialized', '1');
    });
});

// Make Notiflix globally available if loaded
if (typeof Notiflix !== 'undefined') {
    window.Notiflix = Notiflix;
}

/*=========== select all checkbox script start ===============*/
document.addEventListener('DOMContentLoaded', function () {
    const selectAllCheckbox = document.getElementById('selectAll');
    const deleteButtons = document.querySelectorAll('.confirm_all'); // all delete buttons

    if (!selectAllCheckbox || deleteButtons.length === 0) return;

    const getChildCheckboxes = () => document.querySelectorAll('.childCheckbox');

    // Update delete button disabled state for both buttons
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

    // Handle Select All
    selectAllCheckbox.addEventListener('change', function () {
        getChildCheckboxes().forEach(cb => cb.checked = this.checked);
        updateDeleteButtonState();
    });

    // Handle individual checkbox change
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

    // Attach event to ALL delete buttons
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
                        // Optional loading effect
                        Notiflix.Loading.standard('Deleting...');
                        setTimeout(() => {
                            Notiflix.Loading.remove();
                            Notiflix.Notify.success('Records deleted successfully!', {
                                position: 'right-top'
                            });
                            document.querySelector('.deleteAll').submit();
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
                        okButtonBackground: '#e3342f',
                        titleColor: '#333',
                        messageColor: '#666',
                        buttonsFontSize: '15px'
                    }
                );
            }
        });
    });

    // Initialize button state
    updateDeleteButtonState();
});
/*=========== select all checkbox script end ===============*/

// Initialize a table once DOM is ready
$(document).ready(function () {
    if ($.fn.DataTable && $('#jsdatatable_list').length) {
        $('#jsdatatable_list').DataTable({
            responsive: true,
            pageLength: 50,
            lengthMenu: [[10, 20, 50, 100], [10, 20, 50, 100]],
            columnDefs: [
                {orderable: false, searchable: false, targets: [0, -1]} // disable for first and last column
            ],
            initComplete: function () {
                $('div.dt-search input').attr('placeholder', 'Search here...');
            }
        });
    }
});

// delete other module image
$(document).ready(function () {
    $('.del_img').click(function () {
        let button = $(this);
        let hiddenInput = $('.delete_img'); // find the global hidden input for delete flag

        // mark image for deletion
        hiddenInput.val('1');

        // remove image preview
        $('.lightgallery').fadeOut(300, function () {
            $(this).remove();
        });

        $('.trashImg').fadeOut(300, function () {
            $(this).remove();
        });

        // remove delete button container
        button.closest('.fImg').fadeOut(200, function () {
            $(this).remove();
        });
    });
});

// delete setting images
$(document).ready(function () {
    $('.setting_del_img').on('click', function () {
        const button = $(this);
        const row = button.closest('.image-row'); // scoped row (keeps grid aligned)
        const hiddenInput = row.find('.setting_delete_img');
        const gallery = row.find('.lightgallery');

        // mark this specific image as deleted
        hiddenInput.val('1');

        // fade out only this row's image and button
        gallery.fadeOut(300, function () {
            $(this).remove();
        });

        button.closest('.sfImg').fadeOut(200, function () {
            $(this).remove();
        });
    });
});
