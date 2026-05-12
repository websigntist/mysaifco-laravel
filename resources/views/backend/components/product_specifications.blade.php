@php $p = $product ?? null; @endphp
<div class="tab-pane fade" id="product_specifications" role="tabpanel">
    <textarea name="product_specifications" class="form-control tinymce-editor" id="editor_product_specifications" rows="8">{{ old('product_specifications', optional($p)->product_specifications) }}</textarea>
</div>
