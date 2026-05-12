<div class="tab-pane fade mt-5" id="header_footer">
    <div class="row g-6 d-flex align-items-center">

        {!! setting_image('header logo', 'logo') !!}
        {!! setting_image('footer logo', 'footer_logo') !!}
        {!! setting_image('favicon', 'favicon') !!}

        <!-- robots -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="site_loader">
                <?php echo _label('robots'); ?>
            </label>
            <select id="robots" name="settings[robots]" class="form-select select2">
                <option value="0">-Select option-</option>
                <option value="INDEX,FOLLOW" {{(get_setting('robots')) == 'INDEX,FOLLOW' ? 'selected' : ''}}>INDEX, FOLLOW</option>
                <option value="NOINDEX, FOLLOW" {{(get_setting('robots')) == 'NOINDEX, FOLLOW' ? 'selected' : ''}}>NOINDEX, FOLLOW</option>
                <option value="INDEX, NOFOLLOW" {{(get_setting('robots')) == 'INDEX, NOFOLLOW' ? 'selected' : ''}}>INDEX, NOFOLLOW</option>
                <option value="NOINDEX, NOFOLLOW" {{(get_setting('robots')) == 'NOINDEX, NOFOLLOW' ? 'selected' : ''}}>NOINDEX, NOFOLLOW</option>
            </select>
        </div>
        <!-- copyright -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="copyright_text">
                <?php echo _label('copyright_text'); ?>
            </label> <input type="text"
                            id="copyright_text"
                            name="settings[copyright_text]"
                            value="{{old('copyright_text', get_setting('copyright_text'))}}"
                            class="form-control"
                            placeholder="Enter <?php echo _label('copyright_text'); ?>...">
        </div>
        <!-- google analytics code -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="google_analytics_code">
                <?php echo _label('google_analytics_code'); ?>
            </label>
            <textarea class="form-control"
                       id="google_analytics_code"
                       name="settings[google_analytics_code]"
                       placeholder="Write <?php echo _label('google_analytics_code'); ?>" rows="4">{{old('google_analytics_code', get_setting('google_analytics_code')) }}</textarea>
        </div>
    </div>
</div>
