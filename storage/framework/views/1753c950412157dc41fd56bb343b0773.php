<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-6">
                <div class="col-sm-12 mt-8">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex flex-column justify-content-center">
                            <?php echo heading_breadcrumbs('Gallery: ' . $gallery->title . ' – Images'); ?>

                        </div>
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            <a href="<?php echo e(route('galleries')); ?>" class="btn btn-sm btn-dark waves-effect waves-light d-lg-block d-none d-flex" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Go Back">
                                <span class="icon-base ti tabler-arrow-back-up-double icon-22px me-2"></span>Back
                            </a>
                            <a href="<?php echo e(route('galleries')); ?>" class="btn btn-icon btn-dark waves-effect d-flex d-lg-none d-sm-block" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Go Back">
                                <span class="icon-base ti tabler-arrow-back-up-double icon-22px"></span>
                            </a>
                            <a href="<?php echo e(route('galleries.edit', $gallery->id)); ?>" class="btn btn-sm btn-label-primary waves-effect waves-light ms-2">
                                <span class="icon-base ti tabler-pencil me-1"></span> Edit Gallery
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-action mb-12 border-top-bottom">
                <div class="card-header border-bottom pb-3 pt-3 cardStyling">
                    <i class="icon-base ti tabler-photo me-1"></i>
                    <h6 class="card-action-title mb-0">Gallery images</h6>
                    <?php echo card_action_element(); ?>

                </div>
                <div class="collapse show p-5">
                    <div class="table-responsive">
                        <table class="table table-hover" id="galleryImagesTable">
                            <thead class="border-top">
                            <tr>
                                <th>Image</th>
                                <th>Image title</th>
                                <th>Image alt</th>
                                <th>Ordering</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $getData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="imageRowId-<?php echo e($data->id); ?>">
                                    <td>
                                        <div class="avatar avatar-md light-gallery" id="gallery-<?php echo e($data->id); ?>">
                                            <a href="<?php echo e($data->image ? asset('assets/images/galleries/images/'.$data->image) : '#'); ?>">
                                                <img src="<?php echo e($data->image ? asset('assets/images/galleries/images/'.$data->image) : imageNotFound()); ?>"
                                                     alt="<?php echo e($data->image_alt); ?>"
                                                     title="<?php echo e($data->image_alt); ?>"
                                                     class="border rounded-circle">
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm image_title_input" data-id="<?php echo e($data->id); ?>" value="<?php echo e($data->image_title); ?>" placeholder="Title">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm image_alt_input" data-id="<?php echo e($data->id); ?>" value="<?php echo e($data->image_alt); ?>" placeholder="Alt">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm image_ordering_input" data-id="<?php echo e($data->id); ?>" value="<?php echo e($data->ordering); ?>" min="0" style="width: 70px;">
                                    </td>
                                    <td>
                                        <span id="imageStatusLabel-<?php echo e($data->id); ?>" class="badge <?php echo e($data->status === 'active' ? 'bg-label-success' : 'bg-label-danger'); ?>"><?php echo e(ucfirst($data->status)); ?></span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <button type="button" class="btn btn-text-secondary rounded-pill waves-effect btn-icon deleteImageBtn" data-id="<?php echo e($data->id); ?>" title="Delete image">
                                                <i class="icon-base ti tabler-trash icon-22px"></i>
                                            </button>
                                            <button type="button" class="btn btn-text-secondary rounded-pill waves-effect btn-icon toggleImageStatusBtn" data-id="<?php echo e($data->id); ?>" data-current-status="<?php echo e($data->status); ?>" title="Toggle status">
                                                <i class="icon-base ti tabler-refresh icon-22px"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if($getData->isEmpty()): ?>
                        <p class="text-muted text-center py-4">No images in this gallery. Add images from the gallery edit page.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const baseUrl = "<?php echo e(url('admin/galleries')); ?>";
            const csrf = "<?php echo e(csrf_token()); ?>";

            // Image title (image_title) – same as "Image title (attr)" in this schema; we have one field image_title
            document.querySelectorAll(".image_title_input").forEach(input => {
                input.addEventListener("blur", function () {
                    const id = this.getAttribute("data-id");
                    const value = this.value;
                    fetch(baseUrl + "/images/update-title", {
                        method: "POST",
                        headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": csrf },
                        body: JSON.stringify({ id: id, image_title: value })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) Notiflix.Notify.success(data.message || 'Title updated.');
                    })
                    .catch(() => Notiflix.Notify.failure('Failed to update title.'));
                });
            });

            document.querySelectorAll(".image_title_attr_input").forEach(input => {
                input.addEventListener("blur", function () {
                    const id = this.getAttribute("data-id");
                    const value = this.value;
                    fetch(baseUrl + "/images/update-title", {
                        method: "POST",
                        headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": csrf },
                        body: JSON.stringify({ id: id, image_title: value })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) Notiflix.Notify.success(data.message || 'Title updated.');
                    })
                    .catch(() => Notiflix.Notify.failure('Failed to update.'));
                });
            });

            document.querySelectorAll(".image_alt_input").forEach(input => {
                input.addEventListener("blur", function () {
                    const id = this.getAttribute("data-id");
                    const value = this.value;
                    fetch(baseUrl + "/images/update-alt", {
                        method: "POST",
                        headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": csrf },
                        body: JSON.stringify({ id: id, image_alt: value })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) Notiflix.Notify.success(data.message || 'Alt updated.');
                    })
                    .catch(() => Notiflix.Notify.failure('Failed to update alt.'));
                });
            });

            document.querySelectorAll(".image_ordering_input").forEach(input => {
                input.addEventListener("blur", function () {
                    const id = this.getAttribute("data-id");
                    const value = parseInt(this.value, 10);
                    if (isNaN(value)) return;
                    fetch(baseUrl + "/images/update-ordering", {
                        method: "POST",
                        headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": csrf },
                        body: JSON.stringify({ id: id, ordering: value })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) Notiflix.Notify.success(data.message || 'Ordering updated.');
                    })
                    .catch(() => Notiflix.Notify.failure('Failed to update ordering.'));
                });
            });

            document.querySelectorAll(".deleteImageBtn").forEach(btn => {
                btn.addEventListener("click", function () {
                    const id = this.getAttribute("data-id");
                    const url = baseUrl + "/images/delete/" + id;
                    Notiflix.Confirm.show(
                        'Confirm Delete',
                        'Delete this image?',
                        'Yes, Delete',
                        'Cancel',
                        async () => {
                            const row = document.getElementById("imageRowId-" + id);
                            try {
                                Notiflix.Loading.circle('Deleting image...');
                                const response = await fetch(url, {
                                    method: "DELETE",
                                    headers: { "X-CSRF-TOKEN": csrf, "X-Requested-With": "XMLHttpRequest" }
                                });
                                const data = await response.json();
                                Notiflix.Loading.remove();
                                if (data.success) {
                                    Notiflix.Notify.success(data.message);
                                    if (row) row.remove();
                                } else {
                                    Notiflix.Notify.failure(data.message || 'Failed to delete.');
                                }
                            } catch (e) {
                                Notiflix.Loading.remove();
                                Notiflix.Notify.failure('Error deleting image.');
                            }
                        },
                        () => {},
                        { width: '320px', borderRadius: '8px', okButtonBackground: '#E3342F' }
                    );
                });
            });

            document.querySelectorAll(".toggleImageStatusBtn").forEach(btn => {
                btn.addEventListener("click", function (e) {
                    e.preventDefault();
                    const id = this.getAttribute("data-id");
                    const currentStatus = this.getAttribute("data-current-status");
                    const url = baseUrl + "/images/" + id + "/status";
                    Notiflix.Loading.circle('Updating status...');
                    fetch(url, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": csrf,
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: JSON.stringify({ status: currentStatus })
                    })
                    .then(res => res.json())
                    .then(data => {
                        Notiflix.Loading.remove();
                        if (data.success) {
                            const label = document.getElementById("imageStatusLabel-" + id);
                            if (label) {
                                label.textContent = data.status.charAt(0).toUpperCase() + data.status.slice(1);
                                label.className = data.status === 'active' ? "badge bg-label-success" : "badge bg-label-danger";
                            }
                            this.setAttribute("data-current-status", data.status);
                            Notiflix.Notify.success(data.message || 'Status updated.');
                        } else {
                            Notiflix.Notify.failure(data.message || 'Failed to update status.');
                        }
                    })
                    .catch(() => {
                        Notiflix.Loading.remove();
                        Notiflix.Notify.failure('Error updating status.');
                    });
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\galleries\images-listing.blade.php ENDPATH**/ ?>