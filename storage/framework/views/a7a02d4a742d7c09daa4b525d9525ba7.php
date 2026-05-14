<div class="tab-pane fade" id="admin_settings">
    <div class="row g-6 d-flex align-items-center">
        <!-- admin logo -->
        <?php echo setting_image('footer logo', 'admin_logo'); ?>

        <!-- admin title -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="admin_title">
                <?php echo _label('admin_title'); ?>
            </label> <input type="text"
                            id="admin_title"
                            name="settings[admin_title]"
                            value="<?php echo e(get_setting('admin_title')); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('admin_title'); ?>...">
        </div>
        <!-- show title or logo -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="show_title_logo">
                <?php echo _label('show_title_or_logo'); ?>
            </label>
            <select id="show_title_logo" name="settings[show_title_logo]" class="form-select select2">
                <option value="">-Select option-</option>
                <option value="image_logo" <?php echo e((get_setting('show_title_logo')) == 'image_logo' ? 'selected' : ''); ?>>Image Logo</option>
                <option value="test_logo" <?php echo e((get_setting('show_title_logo')) == 'test_logo' ? 'selected' : ''); ?>>Text Logo</option>
            </select>
        </div>
    </div>
</div>
<?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/components/admin_settings.blade.php ENDPATH**/ ?>