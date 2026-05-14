<div class="tab-pane fade show active" id="general_setting">
    <div class="row g-6">
        <!-- site meta title -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="site_title">
                <?php echo _label('site_title'); ?>
            </label> <input type="text"
                            id="site_title"
                            name="settings[site_title]"
                            value="<?php echo e(old('site_title', get_setting('site_title'))); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('site_title'); ?>...">
        </div>
        <!-- site meta keywords -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="site_keywords">
                <?php echo _label('site_keywords'); ?>
            </label> <input type="text"
                            id="site_keywords"
                            name="settings[site_keywords]"
                            value="<?php echo e(old('site_keywords', get_setting('site_keywords'))); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('site_keywords'); ?>...">
        </div>
        <!-- site meta description -->
        <div class="col-md-12">
            <div class="form-password-toggle">
                <label class="form-label text-capitalize" for="site_description">
                    <?php echo _label('site_description'); ?>
                </label>
                <textarea class="form-control"
                           id="site_description"
                           name="settings[site_description]"
                           placeholder="Write <?php echo _label('site_description'); ?>" rows="3"><?php echo e(old('site_description', get_setting('site_description'))); ?></textarea>
            </div>
        </div>
        <!-- site loader -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="loader">
                <?php echo _label('loader'); ?>
            </label>
            <select id="site_loader" name="settings[loader]" class="form-select select2">
                <option value="0">-Select option-</option>
                <option value="Yes" <?php echo e((get_setting('loader')) == 'Yes' ? 'selected' : ''); ?>>Yes</option>
                <option value="No" <?php echo e((get_setting('loader')) == 'No' ? 'selected' : ''); ?>>No</option>
            </select>
        </div>
    </div>
</div>
<?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/components/general_setting.blade.php ENDPATH**/ ?>