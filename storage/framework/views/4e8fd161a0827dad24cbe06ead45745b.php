<div class="tab-pane fade" id="contact_details">
    <div class="row g-6">
        <!-- landline 1 -->
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="landline_number">
                <?php echo _label('landline_number_1'); ?>
            </label> <input type="text"
                            id="landline_number"
                            name="settings[landline_number]"
                            value="<?php echo e(old('landline_number', get_setting('landline_number'))); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('landline_number'); ?>...">
        </div>
        <!-- landline 2 -->
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="landline_number_2">
                <?php echo _label('landline_number_2'); ?>
            </label> <input type="text"
                            id="landline_number_2"
                            name="settings[landline_number_2]"
                            value="<?php echo e(old('landline_number_2', get_setting('landline_number_2'))); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('landline_number_2'); ?>...">
        </div>
        <!-- mobile -->
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="mobile_number">
                <?php echo _label('mobile_number'); ?>
            </label> <input type="text"
                            id="mobile_number"
                            name="settings[mobile_number]"
                            value="<?php echo e(old('mobile_number', get_setting('mobile_number'))); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('mobile_number'); ?>...">
        </div>
        <!-- whatsapp -->
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="whatsapp_number">
                <?php echo _label('whatsapp_number'); ?>
            </label> <input type="text"
                            id="whatsapp_number"
                            name="settings[whatsapp_number]"
                            value="<?php echo e(old('whatsapp_number' ,get_setting('whatsapp_number'))); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('whatsapp_number'); ?>...">
        </div>
        <!-- email -->
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="email">
                <?php echo _label('email_address'); ?>
            </label> <input type="text"
                            id="email"
                            name="settings[email]"
                            value="<?php echo e(old('email', get_setting('email'))); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('email'); ?>...">
        </div>
        <!-- url -->
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="website_url">
                <?php echo _label('website_url'); ?>
            </label> <input type="text"
                            id="website_url"
                            name="settings[website_url]"
                            value="<?php echo e(old('website_url' ,get_setting('website_url'))); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('website_url'); ?>...">
        </div>
        <!-- address -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="address">
                <?php echo _label('address'); ?>
            </label> <input type="text"
                            id="address"
                            name="settings[address]"
                            value="<?php echo e(old('address', get_setting('address'))); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('address'); ?>...">
        </div>
        <!-- google map -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="google_map_code">
                <?php echo _label('google_map_code'); ?>
            </label> <textarea class="form-control"
                               id="google_map_code"
                               name="settings[google_map_code]"
                               placeholder="Write <?php echo _label('google_map_code'); ?>" rows="5"><?php echo e(old('google_map_code' ,get_setting('google_map_code'))); ?></textarea>
        </div>
    </div>
</div>
<?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/components/contact_details.blade.php ENDPATH**/ ?>