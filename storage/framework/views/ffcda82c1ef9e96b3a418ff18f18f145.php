<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row gy-6">
                    <div class="col-sm-12 mt-8">
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


                                
                                <?php echo actionButton($module, 'import', route($module.'.import'), '', 'tabler-upload', 'Import CSV'); ?>

                                <?php echo actionButton($module, 'export', route($module.'.export'), '', 'tabler-download', 'Export CSV'); ?>

                            </div>
                            <!-- ===== actions buttons end =====-->
                        </div>
                    </div>
                </div>
                <!-- ========= card =============-->
                <div class="card card-action mb-12 border-top-bottom">
                    <div class="card-header border-bottom pb-3 pt-3 cardStyling">
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
                                                'parent_id' => 'parent',
                                                'created_at' => 'Created',
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
                                                    <?php if($col === 'image'): ?>
                                                        <div class="avatar avatar-md light-gallery" id="gallery-<?php echo e($data->id); ?>">
                                                            <a href="<?php echo e(asset('assets/images/'.$module .'/'. $data->image)); ?>">
                                                                <img src="<?php echo e($data->image ? asset ('assets/images/' . $module .'/'. $data->image) : imageNotFound()); ?>"
                                                                     alt="<?php echo e($data->image); ?>"
                                                                     title="<?php echo e($data->image); ?>"
                                                                     class="border rounded-circle">
                                                            </a>
                                                        </div>
                                                    <?php elseif($col === 'menu_title'): ?>
                                                        <?php echo e($data->menu_title); ?>

                                                        
                                                        
                                                    <?php elseif($col === 'parent_id'): ?>
                                                        <?php if($data->parentPage?->menu_title): ?>
                                                            <span class="badge badge-outline-warning"><?php echo e($data->parentPage?->menu_title); ?></span>
                                                        <?php else: ?>
                                                            <span class="badge badge-outline-gray">/Parent</span>
                                                        <?php endif; ?>
                                                        
                                                    <?php elseif($col === 'ordering'): ?>
                                                        <?php echo e($data->ordering); ?>

                                                        
                                                    <?php elseif($col === 'status'): ?>
                                                        <span id="statusLabel-<?php echo e($data->id); ?>"
                                                          class="badge <?php echo e($data->status === 'published' ? 'bg-label-success' : 'bg-label-danger'); ?>">
                                                            <?php echo e(ucfirst($data->status)); ?>

                                                        </span>
                                                    <?php elseif($col === 'created_at'): ?>
                                                        <?php echo e($data->created_at?->format('M d, Y') ?? '-'); ?>

                                                    <?php elseif($col === 'created_by'): ?>
                                                        <?php echo e(getCreatedBy($data->created_by)); ?>

                                                    <?php else: ?>
                                                        <?php echo e($data->$col); ?>

                                                    <?php endif; ?>
                                                </td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <?php echo actionButton2($module, 'edit', route($module.'.edit', $data->id), 'Edit', $data->id, 'Edit', 'tabler-edit', 'btn btn-text-secondary rounded-pill waves-effect btn-icon'); ?>

                                                    <?php echo actionButton2($module, 'view', '#dataModal', null, $data->id, 'View Details'); ?>

                                                    <div class="dropdown">
                                                        <?php echo actionButton2($module, 'more'); ?>

                                                        <div class="dropdown-menu">
                                                            <?php echo actionButton2($module, 'delete', route($module.'.delete', $data->id), 'Delete', $data->id, 'Delete', 'tabler-trash', 'dropdown-item waves-effect delete-record deleteBtn'); ?>

                                                            <?php echo actionButton2($module, 'duplicate', route($module.'.duplicate', $data->id), 'Duplicate'); ?>

                                                            <?php echo actionButton2($module, 'status', null, $data->status, $data->id, 'Change Status'); ?>

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
    <?php echo $__env->make('backend.components.viewModal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
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
        // Original Scripts Below
        // ========================================
        document.querySelectorAll(".menu_title").forEach(input => {

            // Save updated value when focus leaves the field (blur)
            input.addEventListener("blur", function () {
                const id = this.getAttribute("data-id");
                const value = this.value.trim();

                if (!value) return;
                // Optional: show loading spinner while updating
                Notiflix.Loading.circle('Updating title...');

                fetch("<?php echo e(route($module . '.update-title')); ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>"
                    },
                    body: JSON.stringify({
                        id: id,
                        menu_title: value
                    })
                })
                .then(res => res.json())
                .then(data => {
                    Notiflix.Loading.remove();
                    if (data.success) {
                        Notiflix.Notify.success("<?php echo e(ucfirst($title)); ?> title updated successfully!");
                    } else {
                        Notiflix.Notify.warning(data.message || "No changes detected.");
                    }
                    console.log("<?php echo e(ucfirst($title)); ?> title updated:", data);
                })
                .catch(err => {
                    Notiflix.Loading.remove();
                    console.error("Error updating <?php echo e($title); ?> title:", err);
                    Notiflix.Notify.failure("Failed to update <?php echo e(strtolower($title)); ?> title.");
                });
            });
        });
    });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".ordering").forEach(input => {

                input.addEventListener("blur", function () {
                    const id = this.getAttribute("data-id");
                    const value = this.value.trim();

                    if (!value) return;

                    // Optional: show loading spinner while updating
                    Notiflix.Loading.circle('Updating ordering...');

                    fetch("<?php echo e(route($module . '.update-ordering')); ?>", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>"
                        },
                        body: JSON.stringify({
                            id: id,
                            ordering: value
                        })
                    })
                        .then(res => res.json())
                        .then(data => {
                            Notiflix.Loading.remove();
                            if (data.success) {
                                Notiflix.Notify.success("Ordering updated successfully!");
                            } else {
                                Notiflix.Notify.warning(data.message || "No changes detected.");
                            }
                            console.log("Ordering updated:", data);
                        })
                        .catch(err => {
                            Notiflix.Loading.remove();
                            console.error("Error updating ordering:", err);
                            Notiflix.Notify.failure("Failed to update ordering.");
                        });
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modalEl = document.getElementById("dataModal");
            const modal = new bootstrap.Modal(modalEl);
            const contentArea = document.getElementById("detailContentId");

            document.querySelectorAll(".viewBtn").forEach(btn => {
                btn.addEventListener("click", async function () {
                    const dataId = this.getAttribute("data-id");
                    const url = `/admin/<?php echo e($module); ?>/modal-view/${dataId}`;

                    // Show loading state
                    contentArea.innerHTML = `
                    <tr><td colspan="2" class="text-center text-info">Loading...</td></tr>
                `;

                    try {
                        const response = await fetch(url, {
                            headers: {"X-Requested-With": "XMLHttpRequest"}
                        });

                        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

                        const data = await response.json();
                        console.log("<?php echo e(ucfirst($title)); ?> Data:", data);

                        // Handle empty data
                        if (!data || Object.keys(data).length === 0) {
                            contentArea.innerHTML = `
                            <tr><td colspan="2" class="text-center text-warning">No <?php echo e($title); ?> data found.</td></tr>
                        `;
                            modal.show();
                            return;
                        }

                        // Define image URL safely
                        const imageUrl = data.image
                            ? `/assets/images/<?php echo e($module); ?>/${data.image}`
                            : "<?php echo e(imageNotFound()); ?>";

                        // Build data rows
                        const rows = `
                            <tr><th>ID</th><td>${data.id ?? '-'}</td></tr>
                            <tr><th>Parent</th><td>${data.parent_page_title ?? '/Parent'}</td></tr>
                            <tr><th>Menu Title</th><td>${data.menu_title ?? '-'}</td></tr>
                            <tr><th>Page Title</th><td>${data.page_title ?? '-'}</td></tr>
                            <tr><th>Friendly URL</th><td>${data.friendly_url ?? '-'}</td></tr>
                            <tr><th>Description</th><td>${data.description ?? '-'}</td></tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge ${data.status === 'published' ? 'bg-label-success' : 'bg-label-danger'}">
                                        ${data.status ? data.status.charAt(0).toUpperCase() + data.status.slice(1) : '-'}
                                    </span>
                                </td>
                            </tr>
                            <tr><th>Ordering</th><td>${data.ordering ?? '-'}</td></tr>
                            <tr><th>Show In Menu</th><td>${data.show_in_menu}</td></tr>
                            <tr><th>Created At</th><td>${data.created_at ?? '-'}</td></tr>
                            <tr><th>Created By</th><td>${data.created_by_name ?? '-'}</td></tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img
                                        src="${data.image ? `/assets/images/pages/${data.image}` : imageNotFound()}"
                                        alt="Image"
                                        class="img-thumbnail rounded border-1"
                                        width="100"
                                    />
                                </td>
                            </tr>
                        `;

                        // Inject and show modal
                        contentArea.innerHTML = rows;
                        modal.show();

                    } catch (error) {
                        console.error("Fetch error:", error);
                        contentArea.innerHTML = `
                        <tr><td colspan="2" class="text-danger text-center">Error loading <?php echo e($title); ?> data.</td></tr>
                    `;
                        modal.show();
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".deleteBtn").forEach(btn => {
                btn.addEventListener("click", async function () {
                    const id = this.getAttribute("data-id");
                    const url = "<?php echo e(url('admin/'.$module.'/delete')); ?>/" + id;

                    // Notiflix confirmation dialog
                    Notiflix.Confirm.show(
                        'Confirm Delete',
                        'Are you sure you want to delete this <?php echo e($title); ?>? This action cannot be undone.',
                        'Yes, Delete',
                        'Cancel',
                        async () => {
                            // Show loading while deleting
                            Notiflix.Loading.standard('Deleting...');

                            try {
                                const response = await fetch(url, {
                                    method: "DELETE",
                                    headers: {
                                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                                        "X-Requested-With": "XMLHttpRequest"
                                    }
                                });

                                if (!response.ok) throw new Error(`HTTP error ${response.status}`);

                                const data = await response.json();
                                Notiflix.Loading.remove();

                                if (data.success) {
                                    Notiflix.Notify.failure(data.message || '<?php echo e(ucfirst($title)); ?> deleted successfully.');

                                    // Remove table row instantly
                                    const row = this.closest("tr");
                                    if (row) row.remove();

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
                            // Cancel callback
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
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".toggleStatusBtn").forEach(btn => {
                btn.addEventListener("click", function (e) {
                    e.preventDefault();

                    const dataId = this.getAttribute("data-id");
                    const currentStatus = this.getAttribute("data-current-status");
                    const url = `/admin/<?php echo e($module); ?>/${dataId}/status`;

                    // Optional: show loading indicator
                    Notiflix.Loading.circle('Updating status...');

                    fetch(url, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: JSON.stringify({status: currentStatus})
                    })
                        .then(res => res.json())
                        .then(data => {
                            Notiflix.Loading.remove(); // remove loading

                            if (data.success) {
                                // Update label
                                const statusLabel = document.getElementById("statusLabel-" + dataId);
                                if (statusLabel) {
                                    statusLabel.textContent = data.status.charAt(0).toUpperCase() + data.status.slice(1);
                                    statusLabel.className =
                                        data.status === 'published'
                                            ? "badge bg-label-success"
                                            : "badge bg-label-danger";
                                }

                                // Update button attribute
                                this.setAttribute("data-current-status", data.status);

                                // Success notification
                                Notiflix.Notify.success(data.message || "Status updated successfully");
                            } else {
                                Notiflix.Notify.failure(data.message || "Failed to update status");
                            }
                        })
                        .catch(err => {
                            console.error("Status update error:", err);
                            Notiflix.Loading.remove();
                            Notiflix.Notify.failure("Error updating status. Please try again.");
                        });
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/pages/listing.blade.php ENDPATH**/ ?>