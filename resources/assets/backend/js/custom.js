/*======== delete normal image =========*/
/*$('.del_img').click(function () {
    let _parent = $(this).closest('.fImg');
    let container = _parent.closest('.container');

    // Set hidden input to 1
    _parent.find('.delete_img').val(1);

    // Remove the image
    container.find('.lightgallery').remove();

    // Remove delete button section
    _parent.remove();
});*/
/* js data table */
document.addEventListener("DOMContentLoaded", function () {
    $('#dataTable').DataTable({
        responsive: true,
        pageLength: 20,
        columnDefs: [
            { orderable: false, searchable: false, targets: [0, -1] } // disable for first column
        ]
    });
});


/*document.addEventListener("DOMContentLoaded", function () {
    let table = $('#dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        orderCellsTop: true,
        fixedHeader: true
    });

    // Apply search on each column
    $('#dataTable thead tr:eq(1) th').each(function (i) {
        $('input', this).on('keyup change', function () {
            if (table.column(i).search() !== this.value) {
                table.column(i).search(this.value).draw();
            }
        });
    });
});*/

$(document).ready(function () {
    $('.del_img').click(function () {
        let parent = $(this).closest('.fImg');
        $('.delete_img', parent).val('1'); // Set to 1 to indicate deletion
        $('.lightgallery', parent.closest('.place-items-center')).remove(); // Remove image preview
        $(this).remove(); // Remove delete button
    });
});

/*=========== select all checkbox script start ===============*/
document.addEventListener('DOMContentLoaded', function () {
    const selectAllCheckbox = document.getElementById('selectAll');
    const childCheckboxes = document.querySelectorAll('.childCheckbox');
    const deleteButton = document.querySelector('.confirm_all');

    if (!selectAllCheckbox || !deleteButton) {
        //console.error('selectAllCheckbox or deleteButton not found.');
        return;
    }

    // Disable delete button initially
    deleteButton.disabled = true;
    deleteButton.classList.add('opacity-50', 'cursor-not-allowed');

    function updateDeleteButtonState() {
        const anyChecked = Array.from(childCheckboxes).some(cb => cb.checked);
        if (anyChecked) {
            deleteButton.disabled = false;
            deleteButton.classList.remove('opacity-50', 'cursor-not-allowed');
        } else {
            deleteButton.disabled = true;
            deleteButton.classList.add('opacity-50', 'cursor-not-allowed');
        }
    }

    // Handle select all
    selectAllCheckbox.addEventListener('change', function () {
        childCheckboxes.forEach(cb => cb.checked = this.checked);
        updateDeleteButtonState();
    });

    // Handle individual checkbox changes
    childCheckboxes.forEach(cb => {
        cb.addEventListener('change', function () {
            if (!this.checked) {
                selectAllCheckbox.checked = false;
            } else if (Array.from(childCheckboxes).every(cb => cb.checked)) {
                selectAllCheckbox.checked = true;
            }
            updateDeleteButtonState();
        });
    });

    // Sweetalert2 Confirmation
    deleteButton.addEventListener('click', function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "Selected pages will be deleted!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FB2C36",
            cancelButtonColor: "#549600",
            confirmButtonText: "Yes, Delete All!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector('.deleteAll').submit();
            }
        });
    });
});
