<div class="tab-pane fade" id="unit_currency">
    <div class="row g-6 d-flex align-items-end">
        <!-- shop currency -->
        <div class="col-md-12" id="shop_currency">
            <label class="form-label text-capitalize" for="shop_currency">
                {{_label('shop_currency')}}
            </label> <select id="shop_currency" name="settings[shop_currency]" class="form-select select2">
                <option value="">-Select option-</option>
                <option value="aed" {{(get_setting('shop_currency')) == 'aed' ? 'selected' : ''}}>Dubai - د.إ</option>
                <option value="usd" {{(get_setting('shop_currency')) == 'usd' ? 'selected' : ''}}>US Dollar - &dollar;</option>
                <option value="pound" {{(get_setting('shop_currency')) == 'pound' ? 'selected' : ''}}>Pound - &pound;</option>
                <option value="euro" {{(get_setting('shop_currency')) == 'euro' ? 'selected' : ''}}>Euro - &euro;</option>
            </select>
        </div>
        <!-- measurment unit -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="measurment_unit">
                <?php echo _label('measurment_unit'); ?>
            </label> <select id="product_unit" name="settings[measurment_unit]" class="form-select select2">
                <option value="">-Select option-</option>
                <option value="cm" {{(get_setting('measurment_unit')) == 'cm' ? 'selected' : ''}}>CM (centimeter)</option>
                <option value="mm" {{(get_setting('measurment_unit')) == 'mm' ? 'selected' : ''}}>MM (millimeter)</option>
                <option value="inches" {{(get_setting('measurment_unit')) == 'inches' ? 'selected' : ''}}>Inches</option>
                <option value="feet" {{(get_setting('measurment_unit')) == 'feet' ? 'selected' : ''}}>Feet</option>
            </select>
        </div>
        <!-- weight unit -->
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="{{_label('weight_unit')}}">
                {{_label('weight_unit')}}
            </label> <select id="product_unit" name="settings[weight_unit]" class="form-select select2">
                <option value="">-Select option-</option>
                <option value="g" {{(get_setting('weight_unit')) == 'g' ? 'selected' : ''}}>G (gram)</option>
                <option value="kg" {{(get_setting('weight_unit')) == 'kg' ? 'selected' : ''}}>KG (kilogram)</option>
            </select>
        </div>

    </div>
</div>
