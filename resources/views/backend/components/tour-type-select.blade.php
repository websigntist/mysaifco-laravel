@php
    $multiple = (bool) ($multiple ?? false);
    $required = (bool) ($required ?? false);
    $tourTypes = $tourTypes ?? collect();
    $fieldId = $id ?? ($multiple ? 'tour_type' : 'tour_type_id');
    $fieldName = $multiple ? 'tour_type[]' : 'tour_type_id';
    $selectedValues = (array) ($selected ?? []);
@endphp
<label class="form-label text-capitalize" for="{{ $fieldId }}">{{ _label('tour_type') }}</label>
<select id="{{ $fieldId }}"
        name="{{ $fieldName }}"
        class="form-select select2"
        @if($multiple) multiple data-placeholder="Select tour type..." @endif
        @if(!empty($required)) required @endif>
    @unless($multiple)
        <option value="">- select tour type -</option>
    @endunless
    @foreach($tourTypes as $tourType)
        <option value="{{ $tourType->id }}"
            {{ in_array($tourType->id, $selectedValues) ? 'selected' : '' }}>
            {{ $tourType->title }}
        </option>
    @endforeach
</select>
