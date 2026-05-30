<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-6">
                <div class="col-sm-12 mt-8">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex flex-column justify-content-center">
                            <?php echo heading_breadcrumbs(ucfirst(str_replace('-',' ',$title) .' '. 'list')); ?>

                        </div>
                        <!-- ===== actions buttons start =====-->
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            
                            <?php echo actionButton($module, 'add', route($module.'.create'), 'Add New'); ?>

                            <?php echo actionButton($module, 'add_mob', route($module.'.create'),'','tabler-plus', 'Add New'); ?>


                            
                            <?php echo actionButton($module, 'delete', null, 'Delete All'); ?>

                            <?php echo actionButton($module, 'delete_mob', null, '', 'tabler-trash', 'Delete All'); ?>


                            
                            <?php echo actionButton($module, 'import', route($module.'.import-form'), '', 'tabler-upload', 'Import CSV'); ?>

                            <?php echo actionButton($module, 'export', route($module.'.export'), '', 'tabler-download', 'Export CSV'); ?>

                        </div>
                        <!-- ===== actions buttons end =====-->
                    </div>
                </div>
            </div>
            <!-- ========= product summary =============-->
            <?php
                $ps = $productListSummary ?? [
                    'total' => 0,
                    'published' => 0,
                    'unpublished' => 0,
                    'total_amount' => 0,
                    'currency' => strtoupper(trim((string) (get_setting('site_currency') ?: ''))) ?: 'USD',
                ];
            ?>
            <div class="card mb-6 border-top-bottom">
                <div class="card-widget-separator-wrapper">
                  <div class="card-body card-widget-separator">
                    <div class="row gy-4 gy-sm-1">
                      <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-4 pb-sm-0">
                          <div>
                            <h4 class="mb-0"><?php echo e(number_format($ps['total'])); ?></h4>
                            <p class="mb-0">Total Products</p>
                          </div>
                          <span class="avatar me-sm-6">
                            <span class="avatar-initial bg-label-secondary rounded text-heading">
                              <i class="icon-base ti tabler-package icon-26px text-heading"></i>
                            </span>
                          </span>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-6">
                      </div>
                      <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0">
                          <div>
                            <h4 class="mb-0"><?php echo e(number_format($ps['published'])); ?></h4>
                            <p class="mb-0">Published</p>
                          </div>
                          <span class="avatar p-2 me-lg-6">
                            <span class="avatar-initial bg-label-secondary rounded"><i class="icon-base ti tabler-circle-check icon-26px text-heading"></i></span>
                          </span>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none">
                      </div>
                      <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start border-end pb-4 pb-sm-0 card-widget-3">
                          <div>
                            <h4 class="mb-0"><?php echo e(number_format($ps['unpublished'])); ?></h4>
                            <p class="mb-0">Unpublish</p>
                          </div>
                          <span class="avatar p-2 me-sm-6">
                            <span class="avatar-initial bg-label-secondary rounded"><i class="icon-base ti tabler-circle-x icon-26px text-heading"></i></span>
                          </span>
                        </div>
                      </div>
                      <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start">
                          <div>
                            <h4 class="mb-0"><?php echo e($ps['currency']); ?> <?php echo e(number_format($ps['total_amount'], 2)); ?></h4>
                            <p class="mb-0">Total Amount</p>
                          </div>
                          <span class="avatar p-2">
                            <span class="avatar-initial bg-label-secondary rounded"><i class="icon-base ti tabler-currency-dollar icon-26px text-heading"></i></span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <!-- ========= card =============-->
            <div class="card card-action mb-12 border-top-bottom">
                <div class="card-header border-bottom sticky-element pb-3 pt-3 cardStyling">
                    <i class="icon-base ti tabler-layout-list me-1"></i>
                    <h6 class="card-action-title mb-0 text-capitalize"><?php echo e(str_replace('-',' ',$title) .' '. 'list'); ?></h6>
                    <?php echo card_action_element(); ?>

                </div>
                <div class="collapse show p-5">
                    <form action="<?php echo e(route($module.'.delete-all')); ?>" method="POST" class="deleteAll">
                        <input type="hidden" name="trashed" value="<?php echo e($_module); ?>">
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
                                            'image' => 'Product',
                                            'categories' => 'Categories',
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
                                                    <div class="d-flex justify-content-start align-items-center user-name">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-md me-4 light-gallery" id="gallery-<?php echo e($data->id); ?>">
                                                                <a href="<?php echo e($data->main_image ? asset('assets/images/products/'.$data->main_image) : '#'); ?>">
                                                                    <img src="<?php echo e($data->main_image ? asset('assets/images/products/'.$data->main_image) : imageNotFound()); ?>"
                                                                         alt="<?php echo e($data->title); ?>"
                                                                         class="rounded-circle">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <a href="javascript:" class="text-heading text-truncate">
                                                                <span class="fw-medium"><?php echo e($data->title); ?></span>
                                                            </a> <small><?php echo e(Str::words(strip_tags((string) ($data->short_description ?? '')), 10, '...')); ?></small>
                                                        </div>
                                                    </div>
                                                <?php elseif($col === 'categories'): ?>
                                                    <?php $__empty_1 = true; $__currentLoopData = $data->categories ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <span class="badge bg-label-danger me-1"><?php echo e($cat->title); ?></span>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <span class="text-muted">—</span>
                                                    <?php endif; ?>
                                                <?php elseif($col === 'regular_price'): ?>
                                                   <?php echo e(strtoupper(get_setting('site_currency'))); ?> <?php echo e($data->regular_price); ?>

                                                <?php elseif($col === 'ordering'): ?>
                                                    <?php echo e($data->ordering); ?>

                                                    
                                                <?php elseif($col === 'status'): ?>
                                                    <span id="statusLabel-<?php echo e($data->id); ?>"
                                                          class="badge <?php echo e(in_array($data->status, ['Active', 'Published'], true) ? 'bg-label-success' : 'bg-label-danger'); ?>">
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
    <?php echo $__env->make('backend.components.btn_action_script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
                        const imageUrl = data.main_image
                            ? `/assets/images/products/${data.main_image}`
                            : "<?php echo e(imageNotFound()); ?>";

                        // Categories may come as array or comma-separated string.
                        const categoryList = Array.isArray(data.categories)
                            ? data.categories
                            : (typeof data.categories === 'string'
                                ? data.categories.split(',').map(c => c.trim()).filter(Boolean)
                                : []);
                        const categories = categoryList.length
                            ? categoryList.map(cat => `<span class="badge bg-label-danger me-1 mb-1">${cat}</span>`).join('')
                            : '<span class="badge bg-label-secondary">Not Selected</span>';

                        const productTypeList = Array.isArray(data.product_types)
                            ? data.product_types
                            : (typeof data.product_types === 'string'
                                ? data.product_types.split(',').map(t => t.trim()).filter(Boolean)
                                : []);
                        const productTypes = productTypeList.length
                            ? productTypeList.map(t => `<span class="badge bg-label-warning me-1 mb-1">${t}</span>`).join('')
                            : '<span class="badge bg-label-secondary">Not Selected</span>';

                        // Build data rows
                        const rows = `
                                <tr><th>ID</th><td>${data.id ?? '-'}</td></tr>
                                <tr><th><?php echo e(_label('regular_price')); ?></th><td>${data.currency} ${data.regular_price ?? '-'}</td></tr>
                                <tr><th><?php echo e(_label('title')); ?></th><td>${data.title ?? '-'}</td></tr>
                                <tr><th><?php echo e(_label('friendly_url')); ?></th><td>${data.friendly_url ?? '-'}</td></tr>
                                <tr><th><?php echo e(_label('categories')); ?></th><td>${categories}</td></tr>
                                <tr><th><?php echo e(_label('description')); ?></th><td>
                                    ${data.short_description ? data.short_description.split(' ').slice(0, 10).join(' ') : '-'}
                                </td></tr>
                                <tr><th><?php echo e(_label('brand')); ?></th><td>${data.brand ?? '-'}</td></tr>
                                <tr>
                                    <th><?php echo e(_label('status')); ?></th>
                                    <td>
                                        <span class="badge ${['Active','Published'].includes(data.status || '') ? 'bg-label-success' : 'bg-label-danger'}">
                                            ${data.status ? data.status : '-'}
                                        </span>
                                    </td>
                                </tr>
                                <tr><th><?php echo e(_label('stock_status')); ?></th><td>${data.stock_status ?? '-'}</td></tr>
                                <tr><th><?php echo e(_label('quantity')); ?></th><td>${data.quantity ?? '-'}</td></tr>
                                <tr><th><?php echo e(_label('product_types')); ?></th><td>${productTypes}</td></tr>
                                <tr><th><?php echo e(_label('ordering')); ?></th><td>${data.ordering ?? '-'}</td></tr>
                                <tr><th><?php echo e(_label('created_at')); ?></th><td>${data.created_at ?? '-'}</td></tr>
                                <tr><th><?php echo e(_label('created_by_name')); ?></th><td>${data.created_by_name ?? '-'}</td></tr>
                                <tr>
                                    <th><?php echo e(_label('image')); ?></th>
                                    <td>
                                        <img src="${imageUrl}" alt="Image" class="img-thumbnail rounded border-1" width="100" />
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\products\listing.blade.php ENDPATH**/ ?>