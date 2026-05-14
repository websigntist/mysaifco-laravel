<div class="tab-pane fade" id="social_networks">
    <div class="row g-6">
        <!-- facebook -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="facebook">
                <?php echo _label('facebook'); ?>
            </label> <input type="text"
                            id="facebook"
                            name="settings[facebook]"
                            value="<?php echo e(get_setting('facebook')); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('facebook_link'); ?>...">
        </div>
        <!-- instagram -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="instagram">
                <?php echo _label('instagram'); ?>
            </label> <input type="text"
                            id="instagram"
                            name="settings[instagram]"
                            value="<?php echo e(get_setting('instagram')); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('instagram_link'); ?>...">
        </div>
        <!-- linkeding -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="linkedin">
                <?php echo _label('linkedin'); ?>
            </label> <input type="text"
                            id="linkedin"
                            name="settings[linkedin]"
                            value="<?php echo e(get_setting('linkedin')); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('linkedin_link'); ?>...">
        </div>
        <!-- youtube -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="youtube">
                <?php echo _label('youtube'); ?>
            </label> <input type="text"
                            id="youtube"
                            name="settings[youtube]"
                            value="<?php echo e(get_setting('youtube')); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('youtube_link'); ?>...">
        </div>
        <!-- x twitter -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="twitter">
                <?php echo _label('x twitter'); ?>
            </label> <input type="text"
                            id="twitter"
                            name="settings[twitter]"
                            value="<?php echo e(get_setting('twitter')); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('twitter_link'); ?>...">
        </div>
        <!-- tiktok -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="tiktok">
                <?php echo _label('tiktok'); ?>
            </label> <input type="text"
                            id="tiktok"
                            name="settings[tiktok]"
                            value="<?php echo e(get_setting('tiktok')); ?>"
                            class="form-control"
                            placeholder="Enter <?php echo _label('tiktok_link'); ?>...">
        </div>
    </div>
</div>
<?php /**PATH D:\laragon\www\laravel-cursor\resources\views/backend/components/social_networks.blade.php ENDPATH**/ ?>