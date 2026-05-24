@php
    $redTags = $redTags ?? collect();
    $selected = old('red_tag_id', $selected ?? null);
@endphp
<label class="form-label text-capitalize" for="red_tag_id">{{ _label('red_tag') ?? 'Red Tag' }}</label>
<select id="red_tag_id"
        name="red_tag_id"
        class="form-select select2">
    <option value="">- select red tag -</option>
    @foreach($redTags as $redTag)
        <option value="{{ $redTag->id }}" {{ (string) $selected === (string) $redTag->id ? 'selected' : '' }}>
            {{ $redTag->title }}
        </option>
    @endforeach
</select>
