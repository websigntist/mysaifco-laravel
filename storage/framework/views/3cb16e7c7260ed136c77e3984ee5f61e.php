<div class="tab-pane fade" id="payment_api">
    <div class="row g-6 d-flex align-items-end">
        <!-- paypal payment mode -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="paypal_payment_mode">
                <?php echo _label('select_paypal_payment_mode'); ?>
            </label>
            <select id="paypal_payment_mode" name="settings[paypal_payment_mode]" class="form-select select2">
                <option value="">-Select option-</option>
                <option value="live_mode" <?php echo e((get_setting('paypal_payment_mode')) == 'live_mode' ? 'selected' : ''); ?>>Live Mode</option>
                <option value="sandbox" <?php echo e((get_setting('paypal_payment_mode')) == 'sandbox' ? 'selected' : ''); ?>>Sandbox</option>
            </select>
        </div>
        <!-- paypal live id -->
        <div class="col-md-12" id="paypal_live" style="display: none;">
            <label class="form-label text-capitalize" for="paypal_live">
                Paypal: <div class="badge bg-label-success"><?php echo _label('live'); ?></div>
            </label> <input type="email"
                            id="paypal_live"
                            name="settings[paypal_live]"
                            value="<?php echo e(get_setting('paypal_live')); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('paypal_live'); ?>...">
        </div>
        <!-- paypal sandbox id -->
        <div class="col-md-12" id="paypal_sandbox">
            <label class="form-label text-capitalize" for="paypal_sandbox">
                Paypal: <div class="badge bg-label-danger"><?php echo _label('sandbox'); ?></div>
            </label> <input type="email"
                            id="paypal_sandbox"
                            name="settings[paypal_sandbox]"
                            value="<?php echo e(get_setting('paypal_sandbox')); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('paypal_sandbox'); ?>...">
        </div>
        <!-- ======================== -->
        <!-- stripe payment mode -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="stripe_payment_mode">
                <?php echo _label('select_stripe_payment_mode'); ?>
            </label>
            <select id="stripe_payment_mode" name="settings[stripe_payment_mode]" class="form-select select2">
                <option value="">-Select option-</option>
                <option value="live_mode" <?php echo e((get_setting('stripe_payment_mode')) == 'live_mode' ? 'selected' : ''); ?>>Live Mode</option>
                <option value="test_mode" <?php echo e((get_setting('stripe_payment_mode')) == 'test_mode' ? 'selected' : ''); ?>>Test Mode</option>
            </select>
        </div>
        <!-- stripe live mode -->
        <div class="col-md-12" id="stripe_live" style="display: none;">
            <label class="form-label text-capitalize" for="stripe_live_site_key">
                <?php echo e(_label('stripe_site_key')); ?>

                <div class="badge bg-label-success"><?php echo _label('live'); ?></div>
            </label> <input type="text"
                            id="stripe_live_site_key"
                            name="settings[stripe_live_site_key]"
                            value="<?php echo e(get_setting('stripe_live_site_key')); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('stripe_live_site_key'); ?>...">

            <label class="form-label text-capitalize mt-5" for="stripe_live_secret_key">
                <?php echo e(_label('stripe_secret_key')); ?>

                <div class="badge bg-label-success"><?php echo _label('live'); ?></div>
            </label> <input type="text"
                            id="stripe_live_secret_key"
                            name="settings[stripe_live_secret_key]"
                            value="<?php echo e(get_setting('stripe_live_secret_key')); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('stripe_live_secret_key'); ?>...">
        </div>
        <!-- stripe test mode -->
        <div class="col-md-12" id="stripe_test">
            <label class="form-label text-capitalize" for="stripe_test_site_key">
                <?php echo e(_label('stripe_site_key')); ?>

                <div class="badge bg-label-danger"><?php echo _label('test'); ?></div>
            </label> <input type="text"
                            id="stripe_test_site_key"
                            name="settings[stripe_test_site_key]"
                            value="<?php echo e(get_setting('stripe_test_site_key')); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('stripe_test_site_key'); ?>...">

            <label class="form-label text-capitalize mt-5" for="stripe_test_secret_key">
                <?php echo e(_label('stripe_secret_key')); ?>:
                <div class="badge bg-label-danger"><?php echo _label('test'); ?></div>
            </label> <input type="text"
                            id="stripe_test_secret_key"
                            name="settings[stripe_test_secret_key]"
                            value="<?php echo e(get_setting('stripe_test_secret_key')); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('stripe_test_secret_key'); ?>...">
        </div>
    </div>
</div>
<?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/components/payment_api.blade.php ENDPATH**/ ?>