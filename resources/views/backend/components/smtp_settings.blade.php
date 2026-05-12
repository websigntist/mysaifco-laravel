<div class="tab-pane fade" id="smtp_settings">
    <div class="row g-6 d-flex align-items-end">
        <!-- smtp host -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="smtp_host">
                <?php echo _label('smtp_host'); ?>
            </label> <input type="text"
                            id="smtp_host"
                            name="settings[smtp_host]"
                            value="{{get_setting('smtp_host')}}"
                            class="form-control"
                            placeholder="Enter <?php echo _label('smtp_host'); ?>...">
        </div>
        <!-- smtp user -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="smtp_user">
                <?php echo _label('smtp_user'); ?>
            </label> <input type="text"
                            id="smtp_user"
                            name="settings[smtp_user]"
                            value="{{get_setting('smtp_user')}}"
                            class="form-control"
                            placeholder="Enter <?php echo _label('smtp_user'); ?>...">
        </div>
        <!-- smtp password -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="smtp_password">
                <?php echo _label('smtp_password'); ?>
            </label> <input type="password"
                            id="smtp_password"
                            name="settings[smtp_password]"
                            value="{{get_setting('smtp_password')}}"
                            class="form-control"
                            placeholder="Enter <?php echo _label('smtp_password'); ?>...">
        </div>
        <!-- smtp port -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="smtp_port">
                <?php echo _label('smtp_port'); ?>
            </label> <input type="text"
                            id="smtp_port"
                            name="settings[smtp_port]"
                            value="{{get_setting('smtp_port')}}"
                            class="form-control"
                            placeholder="Enter <?php echo _label('smtp_port'); ?>...">
        </div>
        <!-- google reCAPTCHA site key -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="recaptcha_site_key">
                <?php echo _label('google_recaptcha_site_key'); ?>
            </label> <input type="text"
                            id="recaptcha_site_key"
                            name="settings[recaptcha_site_key]"
                            value="{{get_setting('recaptcha_site_key')}}"
                            class="form-control"
                            placeholder="Enter <?php echo _label('recaptcha_site_key'); ?>...">
        </div>
        <!-- google reCAPTCHA secret key -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="recaptcha_secret_key">
                <?php echo _label('google_recaptcha_secret_key'); ?>
            </label> <input type="text"
                            id="recaptcha_secret_key"
                            name="settings[recaptcha_secret_key]"
                            value="{{get_setting('recaptcha_secret_key')}}"
                            class="form-control"
                            placeholder="Enter <?php echo _label('recaptcha_secret_key'); ?>...">
        </div>
    </div>
</div>
