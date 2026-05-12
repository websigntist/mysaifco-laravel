<div class="tab-pane fade" id="social_networks">
    <div class="row g-6">
        <!-- facebook -->
        <div class="col-md-9">
            <label class="form-label text-capitalize" for="facebook">
                <?php echo _label('facebook'); ?>
            </label> <input type="text"
                            id="facebook"
                            name="settings[facebook]"
                            value="{{get_setting('facebook')}}"
                            class="form-control"
                            placeholder="Enter <?php echo _label('facebook_link'); ?>...">
        </div>
        <div class="col-md-3">
            <div class="form-check form-switch mt-8">
                <label class="form-label text-capitalize" for="facebook_status">Show/Hide</label>
                <input type="hidden" name="settings[facebook_status]" value="0">
                <input type="checkbox" name="settings[facebook_status]" id="facebook_status" class="form-check-input" value="1"
                       @checked((string) get_setting('facebook_status', '0') === '1')>
            </div>
        </div>
        <!-- instagram -->
        <div class="col-md-9">
            <label class="form-label text-capitalize" for="instagram">
                <?php echo _label('instagram'); ?>
            </label> <input type="text"
                            id="instagram"
                            name="settings[instagram]"
                            value="{{get_setting('instagram')}}"
                            class="form-control"
                            placeholder="Enter <?php echo _label('instagram_link'); ?>...">
        </div>
        <div class="col-md-3">
            <div class="form-check form-switch mt-8">
                <label class="form-label text-capitalize" for="instagram_status">Show/Hide</label>
                <input type="hidden" name="settings[instagram_status]" value="0">
                <input type="checkbox" name="settings[instagram_status]" id="instagram_status" class="form-check-input" value="1"
                       @checked((string) get_setting('instagram_status', '0') === '1')>
            </div>
        </div>
        <!-- linkeding -->
        <div class="col-md-9">
            <label class="form-label text-capitalize" for="linkedin">
                <?php echo _label('linkedin'); ?>
            </label> <input type="text"
                            id="linkedin"
                            name="settings[linkedin]"
                            value="{{get_setting('linkedin')}}"
                            class="form-control"
                            placeholder="Enter <?php echo _label('linkedin_link'); ?>...">
        </div>
        <div class="col-md-3">
            <div class="form-check form-switch mt-8">
                <label class="form-label text-capitalize" for="linkedin_status">Show/Hide</label>
                <input type="hidden" name="settings[linkedin_status]" value="0">
                <input type="checkbox" name="settings[linkedin_status]" id="linkedin_status" class="form-check-input" value="1"
                       @checked((string) get_setting('linkedin_status', '0') === '1')>
            </div>
        </div>
        <!-- youtube -->
        <div class="col-md-9">
            <label class="form-label text-capitalize" for="youtube">
                <?php echo _label('youtube'); ?>
            </label> <input type="text"
                            id="youtube"
                            name="settings[youtube]"
                            value="{{get_setting('youtube')}}"
                            class="form-control"
                            placeholder="Enter <?php echo _label('youtube_link'); ?>...">
        </div>
        <div class="col-md-3">
            <div class="form-check form-switch mt-8">
                <label class="form-label text-capitalize" for="youtube_status">Show/Hide</label>
                <input type="hidden" name="settings[youtube_status]" value="0">
                <input type="checkbox" name="settings[youtube_status]" id="youtube_status" class="form-check-input" value="1"
                       @checked((string) get_setting('youtube_status', '0') === '1')>
            </div>
        </div>
        <!-- x twitter -->
        <div class="col-md-9">
            <label class="form-label text-capitalize" for="twitter">
                <?php echo _label('x twitter'); ?>
            </label> <input type="text"
                            id="twitter"
                            name="settings[twitter]"
                            value="{{get_setting('twitter')}}"
                            class="form-control"
                            placeholder="Enter <?php echo _label('twitter_link'); ?>...">
        </div>
        <div class="col-md-3">
            <div class="form-check form-switch mt-8">
                <label class="form-label text-capitalize" for="twitter_status">Show/Hide</label>
                <input type="hidden" name="settings[twitter_status]" value="0">
                <input type="checkbox" name="settings[twitter_status]" id="twitter_status" class="form-check-input" value="1"
                       @checked((string) get_setting('twitter_status', '0') === '1')>
            </div>
        </div>
        <!-- tiktok -->
        <div class="col-md-9">
            <label class="form-label text-capitalize" for="tiktok">
                <?php echo _label('tiktok'); ?>
            </label> <input type="text"
                            id="tiktok"
                            name="settings[tiktok]"
                            value="{{get_setting('tiktok')}}"
                            class="form-control"
                            placeholder="Enter <?php echo _label('tiktok_link'); ?>...">
        </div>
        <div class="col-md-3">
            <div class="form-check form-switch mt-8">
                <label class="form-label text-capitalize" for="tiktok_status">Show/Hide</label>
                <input type="hidden" name="settings[tiktok_status]" value="0">
                <input type="checkbox" name="settings[tiktok_status]" id="tiktok_status" class="form-check-input" value="1"
                       @checked((string) get_setting('tiktok_status', '0') === '1')>
            </div>
        </div>
    </div>
</div>
