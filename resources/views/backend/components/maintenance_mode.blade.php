<div class="tab-pane fade" id="maintenance_mode">
    <div class="row g-6 d-flex align-items-end">
        <!-- content -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="maintenance_title">
                <?php echo _label('maintenance_title'); ?>
            </label> <input type="text"
                            id="maintenance_title"
                            name="settings[maintenance_title]"
                            value="{{old('maintenance_title', get_setting('maintenance_title'))}}"
                            class="form-control"
                            placeholder="Enter <?php echo _label('maintenance_title  '); ?>...">
        </div>
        <div class="col-md-12 mb-5">
            <label class="form-label text-capitalize" for="content">
                <?php echo _label('content'); ?>
            </label> <textarea class="form-control"
                               id="content"
                               name="settings[content]"
                               placeholder="Write <?php echo _label('content'); ?>" rows="5">{{get_setting('content')}}</textarea>
        </div>
        <!-- logo -->
        {!! setting_image('maintenance logo', 'm_logo') !!}
        <div class="col-md-4">
            <label class="form-label text-capitalize" for="maintenance_mode">
                <?php echo _label('maintenance_mode'); ?>
            </label> <select id="maintenance_mode" name="settings[maintenance_mode]" class="form-select select2">
                <option value="">-Select option-</option>
                <option value="Active" {{(get_setting('maintenance_mode')) == 'Active' ? 'selected' : ''}}>Active
                </option>
                <option value="Inactive" {{(get_setting('maintenance_mode')) == 'Inactive' ? 'selected' : ''}}>
                    Inactive
                </option>
            </select>
        </div>
        <!-- show timer -->
        <div class="col-md-4">
            <label class="form-label text-capitalize" for="show_timer">
                <?php echo _label('show_timer'); ?>
            </label> <select id="show_timer" name="settings[show_timer]" class="form-select select2">
                <option value="">-Select option-</option>
                <option value="Yes" {{(get_setting('show_timer')) == 'Yes' ? 'selected' : ''}}>Yes</option>
                <option value="No" {{(get_setting('show_timer')) == 'No' ? 'selected' : ''}}>No</option>
            </select>
        </div>
        <!-- expiry date -->
        <div class="col-md-4">
            <label class="form-label text-capitalize" for="maintenance_end_date">
                <?php echo _label('maintenance_end_date'); ?>
            </label> <input type="text"
                            id="maintenance_end_date"
                            name="maintenance_end_date"
                            value="{{get_setting('maintenance_end_date')}}"
                            class="form-control dob-picker"
                            placeholder="YYYY-MM-DD">
        </div>
    </div>
</div>
