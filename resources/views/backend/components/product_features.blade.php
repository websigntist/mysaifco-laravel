@php $p = $product ?? null; @endphp
<div class="tab-pane fade" id="product_features" role="tabpanel">
    <textarea name="product_features" class="form-control tinymce-editor" id="editor_product_features" rows="8">{{ old('product_features', optional($p)->product_features) }}</textarea>
</div>
