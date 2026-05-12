@php
    $p = $product ?? null;
    $selectedBrandId = old('brand_id', optional($p)->brand_id);
    if ($selectedBrandId === null && isset($brands) && $brands->isNotEmpty() && ! $p) {
        $selectedBrandId = $brands->first()->id;
    }
@endphp
<div class="tab-pane fade show active" id="navs-basic-info" role="tabpanel">
    <div class="row g-6">
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="title"> <span>{{_label('title')}}</span> </label>
            <input type="text"
                   id="title"
                   name="title"
                   value="{{ old('title', optional($p)->title) }}"
                   class="form-control"
                   placeholder="Enter {{_label('title')}}..." required>
            {!! error_label('title') !!}
        </div>
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="friendly_url">
                <span>{{_label('friendly_url')}}</span></label>
            <div class="input-group">
                <span class="input-group-text" id="friendlyUrl">{{url('/')}}/</span> <input type="text"
                                                                                            class="form-control"
                                                                                            id="friendly_url"
                                                                                            name="friendly_url"
                                                                                            value="{{ old('friendly_url', optional($p)->friendly_url) }}"
                                                                                            placeholder="Enter {{_label('friendly_url')}}" required>
            </div>
            <div class="form-text text-danger">product url/slug should be unique.</div>
            {!! error_label('friendly_url') !!}
        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="quantity"> <span>{{_label('quantity')}}</span> </label>
            <input type="number"
                   id="quantity"
                   name="quantity"
                   value="{{ old('quantity', optional($p)->quantity ?? 0) }}"
                   class="form-control"
                   min="0"
                   placeholder="Enter {{_label('quantity')}}..." required>
            {!! error_label('quantity') !!}
        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="stock_status"> <span>{{_label('stock_status')}}</span> </label>
            <select id="stock_status" name="stock_status" class="form-select select2" required>
                @foreach($enumStockStatus ?? [] as $opt)
                    <option value="{{ $opt }}" @selected(old('stock_status', optional($p)->stock_status ?? ($enumStockStatus[0] ?? '')) === $opt)>{{ $opt }}</option>
                @endforeach
            </select>
            {!! error_label('stock_status') !!}
        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="discount"> {{_label('discount')}} </label>
            <select id="discount" name="discount" class="form-select select2" data-placeholder="Select types">
                <option value="">Select discount</option>
                @foreach($enumDiscount ?? [] as $opt)
                    <option value="{{ $opt }}" @selected((string) old('discount', optional($p)->discount) === (string) $opt)>{{ $opt }}%</option>
                @endforeach
            </select>
            {!! error_label('discount') !!}
        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="brand_id"> {{_label('brand')}} </label>
            <select id="brand_id" name="brand_id" class="form-select select2" required @if(isset($brands) && $brands->isEmpty()) disabled @endif>
                @foreach($brands ?? [] as $b)
                    <option value="{{ $b->id }}" @selected((string) $selectedBrandId === (string) $b->id)>{{ $b->name }}</option>
                @endforeach
            </select>
            @if(isset($brands) && $brands->isEmpty())
                <div class="form-text text-warning">Add at least one active brand before creating a product.</div>
            @endif
            {!! error_label('brand_id') !!}
        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="product_tag"> {{_label('product_tag')}} </label>
            <select id="product_tag" name="product_tag" class="form-select select2">
                <option value="">Select product tag</option>
                @foreach($enumProductTag ?? [] as $opt)
                    <option value="{{ $opt }}" @selected(old('product_tag', optional($p)->product_tag) === $opt)>{{ $opt }}</option>
                @endforeach
            </select>
            {!! error_label('product_tag') !!}
        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="style_no"> {{_label('style_no')}} </label>
            <input type="text"
                   id="style_no"
                   name="style_no"
                   value="{{ old('style_no', optional($p)->style_no) }}"
                   class="form-control"
                   placeholder="Enter {{_label('style_no')}}...">
            {!! error_label('style_no') !!}
        </div>
         <div class="col-md-3">
            <label class="form-label text-capitalize" for="sku"> {{_label('SKU')}} </label>
            <input type="text"
                   id="sku"
                   name="sku"
                   value="{{ old('sku', optional($p)->sku) }}"
                   class="form-control"
                   placeholder="Enter {{_label('sku')}}...">
            {!! error_label('sku') !!}
        </div>
         <div class="col-md-3">
            <label class="form-label text-capitalize" for="isbn"> Barcode / ISBN </label>
            <input type="text"
                   id="isbn"
                   name="isbn"
                   value="{{ old('isbn', optional($p)->isbn) }}"
                   class="form-control"
                   placeholder="Enter barcode / ISBN...">
            {!! error_label('isbn') !!}
        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="weight">
                {{_label('weight')}} <unit class="text-lowercase">({{get_setting('weight_unit')}})</unit>
            </label>
            <input type="number"
                   step="0.001"
                   id="weight"
                   name="weight"
                   value="{{ old('weight', optional($p)->weight) }}"
                   class="form-control"
                   placeholder="Enter {{_label('weight')}}...">
            <div class="form-text text-danger">update unit from <a href="{{siteUrl('admin/settings')}}" target="_blank">setting</a></div>
            {!! error_label('weight') !!}
        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="length">
                {{_label('length')}} <unit class="text-lowercase">({{get_setting('measurment_unit')}})</unit>
            </label>
            <input type="number"
                   step="0.001"
                   id="length"
                   name="length"
                   value="{{ old('length', optional($p)->length) }}"
                   class="form-control"
                   placeholder="Enter {{_label('length')}}...">
            {!! error_label('length') !!}
        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="width">
                {{_label('width')}} <unit class="text-lowercase">({{get_setting('measurment_unit')}})</unit>
            </label>
            <input type="number"
                   step="0.001"
                   id="width"
                   name="width"
                   value="{{ old('width', optional($p)->width) }}"
                   class="form-control"
                   placeholder="Enter {{_label('width')}}...">
            {!! error_label('width') !!}
        </div>
        <div class="col-md-3">
            <label class="form-label text-capitalize" for="height">
                {{_label('height')}} <unit class="text-lowercase">({{get_setting('measurment_unit')}})</unit>
            </label>
            <input type="number"
                   step="0.001"
                   id="height"
                   name="height"
                   value="{{ old('height', optional($p)->height) }}"
                   class="form-control"
                   placeholder="Enter {{_label('height')}}...">
            {!! error_label('height') !!}
        </div>
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="short_description"> {{_label('short_description')}} </label>
            <textarea name="short_description" id="short_description" class="form-control" rows="5" placeholder="Write product short description...">{{ old('short_description', optional($p)->short_description) }}</textarea>
        </div>
        <div class="-col-md-12">
            {{--=========================--}}
            <div class="nav-align-top nav-tabs-shadow">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#full_description">
                          Product Full Description
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#product_features">
                          Product Features
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#product_specifications">
                          Product Specifications
                        </button>
                    </li>
                </ul>
                <div class="tab-content" style="padding: 20px 0 0 0 !important;">
                    @include('backend.components.full_description')
                    @include('backend.components.product_features')
                    @include('backend.components.product_specifications')
                </div>
            </div>
            {{--=========================--}}
        </div>

    </div>
</div>
