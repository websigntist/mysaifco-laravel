<?php $__env->startPush('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/flatpickr.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/select2.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 mt-3">
        <form action="<?php echo e(route($module.'.update', $data->id)); ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
            <?php echo csrf_field(); ?>
            <?php echo method_field('Put'); ?>
            <div class="row gy-6">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <div class="d-flex flex-column justify-content-center">
                            <?php echo heading_breadcrumbs('Update '. $title, $title.' form'); ?>

                        </div>
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            <?php echo goBack($module,'Update'); ?>

                        </div>
                    </div>
                </div>
            </div>
            
            <?php if($errors->any()): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h5 class="alert-heading mb-2">Validation Errors:</h5>
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="row mb-6 gy-6">
                <!-- left column ===================================-->
                <!-- ===============================================-->
                <div class="col-sm-12 col-xl-8">
                    <!-- page information -->
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-apps iconmrgn me-1"></span> Fill Out
                                                                                                     The <?php echo e(ucfirst($title)); ?>

                                                                                                     Details
                            </h6>
                            <?php echo card_action_element(); ?>

                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="menu_title">
                                            <span><?php echo e(_label('menu_title')); ?></span> </label> <input type="text"
                                                                                                  id="menu_title"
                                                                                                  name="menu_title"
                                                                                                  value="<?php echo e(old('menu_title', $data->menu_title)); ?>"
                                                                                                  class="form-control"
                                                                                                  placeholder="Enter <?php echo e(_label('menu_title')); ?>..." required>
                                        <?php echo error_label('menu_title'); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="page_title">
                                            <span><?php echo e(_label('page_title')); ?></span> </label>
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <input class="form-check-input mt-0"
                                                       type="checkbox"
                                                       name="show_title"
                                                       value="1"
                                                       <?php echo e(old('show_title', $data->show_title) == 1 ? 'checked' : ''); ?>

                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       data-bs-original-title="Show Title">
                                            </div>
                                            <input type="text"
                                                   id="page_title"
                                                   name="page_title"
                                                   value="<?php echo e(old('page_title', $data->page_title)); ?>"
                                                   class="form-control"
                                                   placeholder="Enter <?php echo e(_label('page_title')); ?>..." required>
                                        </div>
                                        <?php echo error_label('page_title'); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="sub_title">
                                            <?php echo e(_label('sub_title')); ?>

                                            <small style="font-size: 10px">(optional)</small></label> <input type="text"
                                                                                                             id="sub_title"
                                                                                                             name="sub_title"
                                                                                                             value="<?php echo e(old('sub_title', $data->sub_title)); ?>"
                                                                                                             class="form-control"
                                                                                                             placeholder="Enter <?php echo e(_label('sub_title')); ?>...">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="friendly_url">
                                            <span><?php echo e(_label('friendly_url')); ?></span> </label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="friendlyUrl">https://websigntist.com/</span>
                                            <input type="text"
                                                   class="form-control"
                                                   id="friendly_url"
                                                   name="friendly_url"
                                                   value="<?php echo e(old('friendly_url', $data->friendly_url)); ?>"
                                                   placeholder="Enter <?php echo e(_label('friendly_url')); ?>" required>
                                        </div>
                                        <?php echo error_label('friendly_url'); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="description" class="form-control" id="editor"><?php echo e(old('description', $data->description)); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- meta title -->
                    <div class="card card-action border-top-bottom mt-5">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-world-www iconmrgn me-1"></span> SEO Meta
                                                                                                          Description
                            </h6>
                            <?php echo card_action_element(); ?>

                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="meta_title">
                                            <span><?php echo e(_label('meta_title')); ?></span> </label> <input type="text"
                                                                                                  id="meta_title"
                                                                                                  name="meta_title"
                                                                                                  value="<?php echo e(old('meta_title', $data->meta_title)); ?>"
                                                                                                  class="form-control"
                                                                                                  placeholder="Enter <?php echo e(_label('meta_title')); ?>..." required>
                                        <?php echo error_label('meta_title'); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="meta_keywords">
                                            <?php echo e(_label('meta_keywords')); ?>

                                        </label> <input type="text"
                                                        id="meta_keywords"
                                                        name="meta_keywords"
                                                        value="<?php echo e(old('meta_keywords', $data->meta_keywords)); ?>"
                                                        class="form-control"
                                                        placeholder="Enter <?php echo e(_label('meta_keywords')); ?>...">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-password-toggle">
                                            <label class="form-label text-capitalize" for="meta_description">
                                                <?php echo e(_label('meta_description')); ?>

                                            </label> <textarea class="form-control"
                                                               id="meta_description"
                                                               name="meta_description"
                                                               placeholder="Write <?php echo e(_label('meta_description')); ?>" rows="3"><?php echo e(old('meta_description', $data->meta_description)); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right column ===================================-->
                <!-- ================================================-->
                <div class="col-sm-12 col-xl-4">
                    <!-- status -->
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-photo iconmrgn me-1"></span>feature image
                            </h6>
                            <?php echo card_action_element(); ?>

                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <?php echo image_input_option($data->image ? asset('assets/images/'.$module .'/' . $data->image) : imageNotFound(),'image'); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="image_alt"><?php echo e(_label('image_alt')); ?> </label>
                                        <input type="text" id="image_alt" name="image_alt" value="<?php echo e(old('image_alt', $data->image_alt)); ?>" class="form-control" placeholder="Enter <?php echo e(_label('image_alt')); ?>...">
                                        <?php echo error_label('image_alt'); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="image_title"><?php echo e(_label('image_title')); ?></label>
                                        <input type="text" id="image_title" name="image_title" value="<?php echo e(old('image_title', $data->image_title)); ?>" class="form-control" placeholder="Enter <?php echo e(_label('image_title')); ?>...">
                                        <?php echo error_label('image_title'); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- menu parent -->
                    <div class="card card-action border-top-bottom mt-5">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-table-options iconmrgn me-1"></span>other
                                                                                                             option
                            </h6>
                            <?php echo card_action_element(); ?>

                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="status">
                                            <span><?php echo e(_label('status')); ?></span> </label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            <?php $__currentLoopData = $getStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($status); ?>" <?php echo e($data->status == $status ? 'selected' : ''); ?>>
                                                    <?php echo e(ucfirst($status)); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="parent_id">
                                            <?php echo e(_label('parent_id')); ?>

                                        </label>
                                        <select id="parent_id" name="parent_id" class="form-select select2">
                                            <option value="0">/Parent</option>
                                            <?php $__currentLoopData = $parent_ids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($parent->id); ?>" <?php echo e($parent->id == $data->parent_id ? 'selected' : ''); ?>>
                                                    <?php echo e($parent->menu_title); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="parent_id">
                                            <?php echo e(_label('container_layout')); ?>

                                        </label>
                                        <select id="container_layout" name="container_layout" class="form-select select2">
                                            <?php $__currentLoopData = $getlayout; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($layout); ?>" <?php echo e($data->container_layout == $layout ? 'selected' : ''); ?>><?php echo e(ucfirst($layout)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="show_in_menu">
                                            <?php echo e(_label('show_in_menu')); ?>

                                        </label>
                                        <select id="show_in_menu" name="show_in_menu" class="form-select select2">
                                            <?php $__currentLoopData = $getShowinmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($menu); ?>" <?php echo e($data->show_in_menu == $menu ?
                                                'selected' : ''); ?>>
                                                    <?php echo e(ucfirst($menu)); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label text-capitalize" for="ordering">
                                            <?php echo e(_label('ordering')); ?>

                                        </label> <input type="number"
                                                        id="ordering"
                                                        name="ordering"
                                                        value="<?php echo e(old('ordering', $data->ordering)); ?>"
                                                        class="form-control"
                                                        placeholder="Enter 1 to 99...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- maintenance mode -->
                    
                    <!-- action buttons -->
                    <div class="card border-top-bottom mt-5 py-3">
                        <div class="row">
                            <?php echo form_action_buttons('Update Now', 'Update & New', 'Update & Stay'); ?>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $('#menu_title').bind('keyup blur', function () {
            var menu_title = $(this).val();
            $('#friendly_url').val(friendly_URL(menu_title));
            $('#meta_title').val(meta_title(menu_title));
            $('#page_title').val(page_title(menu_title));
            $('#title').val(meta_title(menu_title));
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
    <script src="<?php echo e(asset('assets/backend/js/cleave-zen.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/moment.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/select2.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/form-layouts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/form-validation.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/js/tinymce/tinymce.min.js')); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            tinymce.init({
                selector: '#editor',
                license_key: 'gpl', // Required for free version
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
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/pages/edit.blade.php ENDPATH**/ ?>