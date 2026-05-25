<div class="col-md-12">
    <label class="form-label text-capitalize" for="title">
        <span>{{ _label('title') }}</span>
    </label>
    <input type="text"
           id="title"
           name="title"
           value="{{ old('title', $data->title ?? '') }}"
           class="form-control"
           placeholder="Enter {{ _label('title') }}..."
           required>
    {!! error_label('title') !!}
</div>
<div class="col-md-12">
    <label class="form-label text-capitalize" for="description">
        <span>{{ _label('description') }}</span>
    </label>
    <textarea class="form-control"
              id="editor"
              name="description"
              placeholder="Write {{ _label('description') }}..."
              rows="5">{{ old('description', $data->description ?? '') }}</textarea>
</div>
<div class="col-md-4">
    <label class="form-label text-capitalize" for="status">
        <span>{{ _label('status') }}</span>
    </label>
    <select id="status" name="status" class="form-select select2" required>
        @foreach($getStatus as $status)
            <option value="{{ $status }}" {{ old('status', $data->status ?? 'Active') === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-4">
    @include('backend.components.tour-type-select', [
        'tourTypes' => $tourTypes,
        'selected' => old('tour_type_id', $data->tour_type_id ?? null) ? [(int) old('tour_type_id', $data->tour_type_id ?? null)] : [],
    ])
</div>
<div class="col-md-4">
    <label class="form-label text-capitalize" for="ordering">{{ _label('ordering') }}</label>
    <input type="number"
           id="ordering"
           name="ordering"
           value="{{ old('ordering', $data->ordering ?? 0) }}"
           class="form-control"
           placeholder="0"
           min="0">
</div>
