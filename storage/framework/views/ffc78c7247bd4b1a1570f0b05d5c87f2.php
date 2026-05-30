<div class="tab-pane fade" id="contact_details">
    <div class="row g-6">
        <!-- landline 1 -->
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="umrah_inquiry_whatsapp">
                <?php echo _label('umrah_inquiry_whatsapp'); ?>
            </label> <input type="text"
                            id="umrah_inquiry_whatsapp"
                            name="settings[umrah_inquiry_whatsapp]"
                            value="<?php echo e(old('umrah_inquiry_whatsapp', get_setting('umrah_inquiry_whatsapp'))); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('umrah_inquiry_whatsapp'); ?>...">
        </div>
        <!-- landline 2 -->
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="tour_inquiry_whatsapp">
                <?php echo _label('tour_inquiry_whatsapp'); ?>
            </label> <input type="text"
                            id="tour_inquiry_whatsapp"
                            name="settings[tour_inquiry_whatsapp]"
                            value="<?php echo e(old('tour_inquiry_whatsapp', get_setting('tour_inquiry_whatsapp'))); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('tour_inquiry_whatsapp'); ?>...">
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
            <label class="form-label text-capitalize" for="office_whatsapp">
                <?php echo _label('office_whatsapp'); ?>
            </label> <input type="text"
                            id="office_whatsapp"
                            name="settings[office_whatsapp]"
                            value="<?php echo e(old('office_whatsapp' ,get_setting('office_whatsapp'))); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('office_whatsapp'); ?>...">
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
        <!-- contact form email -->
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="contact_form_email">
                <?php echo _label('contact_form_email'); ?>
            </label> <input type="text"
                            id="email"
                            name="settings[contact_form_email]"
                            value="<?php echo e(old('contact_form_email', get_setting('contact_form_email'))); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('contact_form_email'); ?>...">
        </div>
        <!-- url -->
        <div class="col-md-12">
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
<?php /**PATH D:\laragon\www\mysaifco-laravel\resources\views\backend\components\contact_details.blade.php ENDPATH**/ ?>