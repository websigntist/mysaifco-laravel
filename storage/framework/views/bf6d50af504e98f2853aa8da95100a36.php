<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row gy-6">
                    <div class="col-sm-12 mt-3">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex flex-column justify-content-center">
                                <?php echo heading_breadcrumbs(ucfirst($title .' '. 'list')); ?>

                            </div>
                            <!-- ===== actions buttons start =====-->
                            <div class="card-header-elements ms-auto d-flex align-content-between">
                                
                                <?php echo actionButton($module, 'add', route($module.'.create'), 'Add New'); ?>

                                <?php echo actionButton($module, 'add_mob', route($module.'.create'),'','tabler-plus', 'Add New'); ?>


                                
                                <?php echo actionButton($module, 'delete', null, 'Delete All'); ?>

                                <?php echo actionButton($module, 'delete_mob', null, '', 'tabler-trash', 'Delete All'); ?>


                                
                                <?php if(!$moduleName): ?>
                                <a href="<?php echo e(route($module.'.download-pdf', $getData[0]->id)); ?>"
                                   class="btn btn-sm btn-dark waves-effect d-lg-block d-none d-flex">
                                    <span class="icon-base ti tabler-file-type-pdf icon-20px me-2"></span>PDF</a>
                                <a href="<?php echo e(route($module.'.download-pdf', $getData[0]->id)); ?>"
                                   class="btn btn-sm btn-icon btn-dark waves-effect d-lg-none d-sm-block d-flex">
                                    <span class="icon-base ti tabler-file-type-pdf icon-20px"></span> </a>
                                <?php endif; ?>
                            </div>
                            <!-- ===== actions buttons end =====-->
                        </div>
                    </div>
                </div>
                <!-- ========= card =============-->
                <div class="card card-action mb-12 border-top-bottom">
                    <div class="card-header border-bottom sticky-element pb-3 pt-3 cardStyling">
                        <i class="icon-base ti tabler-layout-list me-1"></i>
                        <h6 class="card-action-title mb-0 text-capitalize"><?php echo e($title .' '. 'list'); ?></h6>
                        <?php echo card_action_element(); ?>

                    </div>
                    <div class="collapse show p-5">
                        <form action="<?php echo e(route($module.'.delete-all')); ?>" method="POST" class="deleteAll">
                            <input type="hidden" name="trashed" value="<?php echo e($moduleName); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="table-responsive">
                                <table class="table table-hover" id="jsdatatable_list">
                                    <thead class="border-top">
                                    <tr>
                                        <th>
                                            <input id="selectAll"
                                                   class="form-check-input"
                                                   type="checkbox"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="top"
                                                   title="Select All (Use Shift+Click to select range)">
                                        </th>
                                        <?php
                                            $renameMap = [
                                                'invoice_number' => 'Invoice #',
                                                'client_name' => 'Client',
                                                'client_email' => 'Email',
                                                'invoice_date' => 'Date',
                                                'due_date' => 'Due Date',
                                                'total' => 'Total Amt',
                                                'created_at' => 'Created',
                                                'tax_rate' => 'Tax (%)',
                                            ];
                                        ?>

                                        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if (! (in_array($col, $hiddenColumns))): ?>
                                                <th><?php echo e($renameMap[$col] ?? ucfirst(str_replace('_', ' ', $col))); ?></th>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $getData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="rowId-<?php echo e($data->id); ?>">
                                            <td>
                                                <input name="ids[]" value="<?php echo e($data->id); ?>" type="checkbox" class="childCheckbox form-check-input">
                                            </td>
                                            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(in_array($col, $hiddenColumns)): ?>
                                                    <?php continue; ?>
                                                <?php endif; ?>
                                                <td class="capitalize">
                                                    <?php if($col === 'invoice_number'): ?>
                                                        <strong class="text-primary"><?php echo e($data->invoice_number); ?></strong>
                                                    <?php elseif($col === 'client_name'): ?>
                                                        <?php echo e($data->client_name); ?>

                                                    <?php elseif($col === 'client_email'): ?>
                                                        <?php echo e($data->client_email); ?>

                                                    <?php elseif($col === 'invoice_date' || $col === 'due_date'): ?>
                                                        <?php echo e($data->$col ? $data->$col->format('M d, Y') : '-'); ?>

                                                    <?php elseif($col === 'total'): ?>
                                                        <strong class="text-danger">$<?php echo e(number_format($data->total, 2)); ?></strong>
                                                     <?php elseif($col === 'tax_rate'): ?>
                                                        <strong class="text-danger"><?php echo e($data->tax_rate); ?></strong>
                                                    <?php elseif($col === 'status'): ?>
                                                        <select class="form-select select2 form-select-sm status-select"
                                                                data-id="<?php echo e($data->id); ?>"
                                                                data-url="<?php echo e(route($module.'.status', $data->id)); ?>"
                                                                style="width: auto; min-width: 120px;">
                                                            <option value="draft" <?php echo e($data->status == 'draft' ? 'selected' : ''); ?>>Draft</option>
                                                            <option value="sent" <?php echo e($data->status == 'sent' ? 'selected' : ''); ?>>Sent</option>
                                                            <option value="overdue" <?php echo e($data->status == 'overdue' ? 'selected' : ''); ?>>Overdue</option>
                                                            <option value="cancelled" <?php echo e($data->status == 'cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                                                        </select>
                                                    <?php elseif($col === 'created_at'): ?>
                                                        <?php echo e($data->created_at ? $data->created_at->format('M d, Y') : '-'); ?>

                                                    <?php elseif($col === 'deleted_at'): ?>
                                                        <?php echo e($data->deleted_at ? $data->deleted_at->format('M d, Y') : '-'); ?>

                                                    <?php elseif($col === 'created_by'): ?>
                                                        <?php echo e($data->creator?->name ?? '-'); ?>

                                                    <?php else: ?>
                                                        <?php echo e($data->$col ?? '-'); ?>

                                                    <?php endif; ?>
                                                </td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <?php echo actionButton2($module, 'delete', route($module.'.delete', $data->id), null, $data->id); ?>

                                                    
                                                    <a href="<?php echo e(route($module.'.view', $data->id)); ?>"
                                                       class="btn btn-text-secondary rounded-pill waves-effect btn-icon viewBtn"
                                                       data-bs-toggle="tooltip" title="View">
                                                        <i class="icon-base ti tabler-eye icon-22px"></i> </a>
                                                    <div class="dropdown">
                                                        <?php echo actionButton2($module, 'more'); ?>

                                                        <div class="dropdown-menu">
                                                            <?php echo actionButton2($module, 'edit', route($module.'.edit', $data->id), 'Edit'); ?>

                                                            <a href="<?php echo e(route($module.'.download-pdf', $data->id)); ?>"
                                                            class="dropdown-item waves-effect">
                                                             <span class="icon-base ti tabler-file-type-pdf icon-20px me-2"></span>Download DF</a>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- / Content -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        // ========================================
        // Shift+Click Range Selection
        // ========================================
        let lastChecked = null;
        const checkboxes = document.querySelectorAll('.childCheckbox');

        checkboxes.forEach((checkbox, index) => {
            checkbox.addEventListener('click', function(e) {
                // Handle Shift+Click for range selection
                if (e.shiftKey && lastChecked) {
                    e.preventDefault(); // Prevent text selection

                    const start = Array.from(checkboxes).indexOf(lastChecked);
                    const end = Array.from(checkboxes).indexOf(this);

                    // Determine the range (min to max index)
                    const rangeStart = Math.min(start, end);
                    const rangeEnd = Math.max(start, end);

                    // Get the state we want to apply (from the clicked checkbox)
                    const shouldCheck = this.checked;

                    // Apply the selection to all checkboxes in range (inclusive)
                    let count = 0;
                    checkboxes.forEach((cb, i) => {
                        if (i >= rangeStart && i <= rangeEnd) {
                            cb.checked = shouldCheck;
                            count++;

                            // Add brief highlight animation
                            const row = cb.closest('tr');
                            if (row) {
                                row.style.transition = 'background-color 0.3s ease';
                                row.style.backgroundColor = '#e3f2fd';
                                setTimeout(() => {
                                    row.style.backgroundColor = '';
                                }, 600);
                            }
                        }
                    });

                    // Show notification about how many items were selected
                    Notiflix.Notify.info(`${count} item${count !== 1 ? 's' : ''} ${shouldCheck ? 'selected' : 'deselected'}`);
                }

                // Always update lastChecked to current checkbox
                lastChecked = this;
            });
        });

        // ========================================
        // Select All Checkbox
        // ========================================
        const selectAllCheckbox = document.getElementById('selectAll');

        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });

            // Update "Select All" when individual checkboxes change
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const allChecked = Array.from(checkboxes).every(cb => cb.checked);
                    const someChecked = Array.from(checkboxes).some(cb => cb.checked);

                    selectAllCheckbox.checked = allChecked;
                    selectAllCheckbox.indeterminate = someChecked && !allChecked;
                });
            });
        }

        // ========================================
        // Delete Button Handler
        // ========================================
        document.querySelectorAll(".deleteBtn").forEach(button => {
            button.addEventListener("click", function () {
                const id = this.getAttribute("data-id");
                const url = "<?php echo e(url('admin/'.$module.'/delete')); ?>/" + id;
                const row = this.closest("tr"); // ✅ capture row outside async scope

                Notiflix.Confirm.show(
                    'Confirm Delete',
                    'Are you sure you want to delete this <?php echo e($title); ?>? This action cannot be undone.',
                    'Yes, Delete',
                    'Cancel',
                    async () => {
                        Notiflix.Loading.standard('Deleting...');

                        try {
                            const response = await fetch(url, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                                    "X-Requested-With": "XMLHttpRequest"
                                }
                            });

                            const data = await response.json();
                            Notiflix.Loading.remove();

                            if (response.ok && data.success) {
                                Notiflix.Notify.success(data.message || '<?php echo e(ucfirst($title)); ?> deleted successfully.');

                                // ✅ Instantly remove the row
                                if (row) {
                                    row.style.transition = 'opacity 0.4s ease';
                                    row.style.opacity = '0';
                                    setTimeout(() => row.remove(), 400);
                                }

                            } else {
                                Notiflix.Notify.failure(data.message || 'Failed to delete <?php echo e($title); ?>.');
                            }
                        } catch (error) {
                            Notiflix.Loading.remove();
                            console.error("Delete error:", error);
                            Notiflix.Notify.failure('Error deleting record. Please try again.');
                        }
                    },
                    () => {
                        Notiflix.Notify.info('Delete cancelled.');
                    },
                    {
                        width: '320px',
                        borderRadius: '8px',
                        okButtonBackground: '#E3342F',
                        titleColor: '#333333',
                        messageColor: '#666',
                        buttonsFontSize: '15px'
                    }
                );
            });
        });
    });
    </script>
    <script>
        // Status change
        $('.status-select').on('change', function () {
            const id = $(this).data('id');
            const url = $(this).data('url');
            const status = $(this).val();

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    status: status
                },
                success: function (response) {
                    if (response.status === 'success') {
                        Notiflix.Notify.success(response.message || 'Status updated successfully!');
                    } else {
                        Notiflix.Notify.failure(response.message || 'Failed to update status.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                    Notiflix.Notify.failure('Error updating status. Please try again.');
                }
            });
        });
    </script>
    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>

    <script src="<?php echo e(asset('assets/backend/js/select2.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/invoices/listing.blade.php ENDPATH**/ ?>