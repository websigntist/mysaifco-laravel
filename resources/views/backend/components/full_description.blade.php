@php $p = $product ?? null; @endphp
<div class="tab-pane fade show active" id="full_description" role="tabpanel">
    <textarea name="full_description" class="form-control tinymce-editor" id="editor_full_description" rows="8">{{ old('full_description', optional($p)->full_description) }}</textarea>
</div>
