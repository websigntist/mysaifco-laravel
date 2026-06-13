<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-6">
                <div class="col-sm-12 mt-8">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex flex-column justify-content-center">
                            <?php echo heading_breadcrumbs(ucfirst($title .' '. 'list')); ?>

                        </div>
                        <div class="card-header-elements ms-auto d-flex align-content-between gap-2">
                            <?php if(($moduleName ?? $module) !== 'trashed'): ?>
                                <?php echo actionButton($module, 'add', route($module.'.create'), 'Add New'); ?>

                                <?php echo actionButton($module, 'add_mob', route($module.'.create'),'','tabler-plus', 'Add New'); ?>

                                <a href="<?php echo e(route($module.'.trashed')); ?>" class="btn btn-sm btn-label-secondary waves-effect d-lg-block d-none d-flex" data-bs-toggle="tooltip" title="Trashed">
                                    <span class="icon-xs icon-base ti tabler-trash me-2 topicon"></span>Trashed
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route($module)); ?>" class="btn btn-sm btn-label-primary waves-effect d-lg-block d-none d-flex">
                                    <span class="icon-xs icon-base ti tabler-arrow-left me-2 topicon"></span>Back to list
                                </a>
                            <?php endif; ?>
                            <?php echo actionButton($module, 'delete', null, 'Delete All'); ?>

                            <?php echo actionButton($module, 'delete_mob', null, '', 'tabler-trash', 'Delete All'); ?>

                        </div>
                    </div>
                </div>
            </div>

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
                                                <?php if($col === 'title'): ?>
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-medium"><?php echo e(Str::words($data->title, 12, '...')); ?></span>
                                                        <?php if($data->description): ?>
                                                            <small class="text-muted"><?php echo e(Str::words(strip_tags($data->description), 12, '...')); ?></small>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php elseif($col === 'status'): ?>
                                                    <span id="statusLabel-<?php echo e($data->id); ?>"
                                                          class="badge <?php echo e($data->status === 'Active' ? 'bg-label-success' : 'bg-label-danger'); ?>">
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
                                                <?php if(($moduleName ?? $module) === 'trashed'): ?>
                                                    <a href="<?php echo e(route($module.'.restore', $data->id)); ?>"
                                                       class="btn btn-text-secondary rounded-pill waves-effect btn-icon"
                                                       data-bs-toggle="tooltip" title="Restore">
                                                        <i class="icon-base ti tabler-restore icon-22px"></i>
                                                    </a>
                                                    <a href="<?php echo e(route($module.'.forcedelete', $data->id)); ?>"
                                                       class="btn btn-text-secondary rounded-pill waves-effect btn-icon"
                                                       data-bs-toggle="tooltip" title="Delete permanently"
                                                       onclick="return confirm('Permanently delete this record?');">
                                                        <i class="icon-base ti tabler-trash-x icon-22px"></i>
                                                    </a>
                                                <?php else: ?>
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
                                                <?php endif; ?>
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
    </div>
    <?php echo $__env->make('backend.components.viewModal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let lastChecked = null;
            const checkboxes = document.querySelectorAll('.childCheckbox');

            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener('click', function(e) {
                    if (e.shiftKey && lastChecked) {
                        e.preventDefault();
                        const start = Array.from(checkboxes).indexOf(lastChecked);
                        const end = Array.from(checkboxes).indexOf(this);
                        const rangeStart = Math.min(start, end);
                        const rangeEnd = Math.max(start, end);
                        const shouldCheck = this.checked;
                        let count = 0;
                        checkboxes.forEach((cb, i) => {
                            if (i >= rangeStart && i <= rangeEnd) {
                                cb.checked = shouldCheck;
                                count++;
                            }
                        });
                        Notiflix.Notify.info(`${count} item${count !== 1 ? 's' : ''} ${shouldCheck ? 'selected' : 'deselected'}`);
                    }
                    lastChecked = this;
                });
            });

            const selectAllCheckbox = document.getElementById('selectAll');
            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function() {
                    checkboxes.forEach(checkbox => { checkbox.checked = this.checked; });
                });
            }

            const modalEl = document.getElementById("dataModal");
            const modal = new bootstrap.Modal(modalEl);
            const contentArea = document.getElementById("detailContentId");

            document.querySelectorAll(".viewBtn").forEach(btn => {
                btn.addEventListener("click", async function () {
                    const dataId = this.getAttribute("data-id");
                    const url = `/admin/<?php echo e($module); ?>/modal-view/${dataId}`;

                    contentArea.innerHTML = `<tr><td colspan="2" class="text-center text-info">Loading...</td></tr>`;

                    try {
                        const response = await fetch(url, {
                            headers: {"X-Requested-With": "XMLHttpRequest"}
                        });

                        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

                        const data = await response.json();

                        const rows = `
                            <tr><th style="width: 25%">ID</th><td>${data.id ?? '-'}</td></tr>
                            <tr><th>Title</th><td>${data.title ?? '-'}</td></tr>
                            <tr><th>Description</th><td>${data.description ?? '-'}</td></tr>
                            <tr>
                                <th colspan="2" class="bg-light text-primary text-center font-weight-bold">Explore UAE Items</th>
                            </tr>
                            <tr>
                                <th>Item 1</th>
                                <td>
                                    <strong>Title:</strong> ${data.title1 || '-'}<br>
                                    <strong>Sub-Title:</strong> ${data.sub_title1 || '-'}
                                </td>
                            </tr>
                            <tr>
                                <th>Item 2</th>
                                <td>
                                    <strong>Title:</strong> ${data.title2 || '-'}<br>
                                    <strong>Sub-Title:</strong> ${data.sub_title2 || '-'}
                                </td>
                            </tr>
                            <tr>
                                <th>Item 3</th>
                                <td>
                                    <strong>Title:</strong> ${data.title3 || '-'}<br>
                                    <strong>Sub-Title:</strong> ${data.sub_title3 || '-'}
                                </td>
                            </tr>
                            <tr>
                                <th>Item 4</th>
                                <td>
                                    <strong>Title:</strong> ${data.title4 || '-'}<br>
                                    <strong>Sub-Title:</strong> ${data.sub_title4 || '-'}
                                </td>
                            </tr>
                            <tr>
                                <th>Item 5</th>
                                <td>
                                    <strong>Title:</strong> ${data.title5 || '-'}<br>
                                    <strong>Sub-Title:</strong> ${data.sub_title5 || '-'}
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2" class="bg-light text-primary text-center font-weight-bold">Metadata</th>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge ${data.status === 'Active' ? 'bg-label-success' : 'bg-label-danger'}">
                                        ${data.status ?? '-'}
                                    </span>
                                </td>
                            </tr>
                            <tr><th>Ordering</th><td>${data.ordering ?? '-'}</td></tr>
                            <tr><th>Created At</th><td>${data.created_at ?? '-'}</td></tr>
                            <tr><th>Created By</th><td>${data.created_by_name ?? '-'}</td></tr>
                        `;

                        contentArea.innerHTML = rows;
                        modal.show();
                    } catch (error) {
                        console.error("Fetch error:", error);
                        contentArea.innerHTML = `<tr><td colspan="2" class="text-danger text-center">Error loading data.</td></tr>`;
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

                    Notiflix.Confirm.show(
                        'Confirm Delete',
                        'Are you sure you want to delete this record?',
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

                                if (data.success) {
                                    Notiflix.Notify.success(data.message);
                                    this.closest("tr")?.remove();
                                } else {
                                    Notiflix.Notify.failure(data.message || 'Failed to delete.');
                                }
                            } catch (error) {
                                Notiflix.Loading.remove();
                                Notiflix.Notify.failure('Error deleting record.');
                            }
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
                            Notiflix.Loading.remove();

                            if (data.success) {
                                const statusLabel = document.getElementById("statusLabel-" + dataId);
                                if (statusLabel) {
                                    statusLabel.textContent = data.status.charAt(0).toUpperCase() + data.status.slice(1);
                                    statusLabel.className =
                                        data.status === 'Active'
                                            ? "badge bg-label-success"
                                            : "badge bg-label-danger";
                                }
                                this.setAttribute("data-current-status", data.status);
                                Notiflix.Notify.success(data.message || "Status updated successfully");
                            } else {
                                Notiflix.Notify.failure(data.message || "Failed to update status");
                            }
                        })
                        .catch(() => {
                            Notiflix.Loading.remove();
                            Notiflix.Notify.failure("Error updating status.");
                        });
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views/backend/explore-uae/listing.blade.php ENDPATH**/ ?>