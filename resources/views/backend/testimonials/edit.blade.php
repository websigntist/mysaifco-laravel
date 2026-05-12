@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3">
            <form action="{{ route( $module . '.update', $data->id) }}" method="post" class="needs-validation"
                  enctype="multipart/form-data" novalidate>
                @csrf
                @method('Put')
                <div class="row gy-6">
                    <div class="col-sm-12 col-xl-8 offset-xl-2">
                        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                            <div class="d-flex flex-column justify-content-center">
                                {!! heading_breadcrumbs('Update '. str_replace('-',' ',$title), str_replace('-',' ', $title).' edit form') !!}
                            </div>
                            <div class="card-header-elements ms-auto d-flex align-content-between">
                                {!! goBack($module, 'Update') !!}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Display Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h5 class="alert-heading mb-2">Validation Errors:</h5>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row mb-6 gy-6">
                    <div class="col-sm-12 col-xl-8 offset-xl-2">
                        <!-- page information -->
                        <div class="card card-action border-top-bottom">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-apps iconmrgn me-1"></span> Fill Out
                                                                                                         The {{ucfirst(str_replace('-',' ',$title))}}
                                                                                                         Details
                                </h6>
                                {!! card_action_element() !!}
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="name">
                                                <span>{{_label('name')}}</span> </label>
                                            <input type="text"
                                                 id="name"
                                                 name="name"
                                                 value="{{ old('name', $data->name) }}"
                                                 class="form-control"
                                                 placeholder="Enter {{_label('name')}}..." required>
                                            {!! error_label('name') !!}
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="designation">
                                                <span>{{_label('designation')}}</span> </label>
                                            <input type="text"
                                                   id="designation"
                                                   name="designation"
                                                   value="{{ old('designation', $data->designation) }}"
                                                   class="form-control"
                                                   placeholder="Enter {{_label('designation')}}..." required>
                                            {!! error_label('designation') !!}
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="company">
                                                {{_label('company')}} </label>
                                            <input type="text"
                                                  id="company"
                                                  name="company"
                                                  value="{{ old('company', $data->company) }}"
                                                  class="form-control"
                                                  placeholder="Enter {{_label('company')}}...">
                                            {!! error_label('company') !!}
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="review">
                                                {{_label('write_review')}} </label>
                                            <textarea class="form-control"
                                                     id="review"
                                                     name="review"
                                                     placeholder="Write {{_label('review')}}" rows="3">{{ old ('review', $data->review) }}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="status">
                                                <span>{{_label('status')}}</span> </label>
                                            <select id="status" name="status" class="form-select select2" required>
                                                @foreach($getStatus as $status)
                                                    <option value="{{ old($status, $status) }}" {{ $data->status == $status ? 'selected' : '' }}>
                                                        {{ ucfirst($status) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="type">
                                                <span>{{_label('type')}}</span> </label>
                                            <select id="type" name="type" class="form-select select2" required>
                                                @foreach($gettype as $type)
                                                    <option value="{{ old($type, $type) }}" {{$data->type == $type ? 'selected' : ''}}>
                                                        {{ ucfirst($type) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="ordering">
                                                {{_label('ordering')}}
                                            </label> <input type="number"
                                                            id="ordering"
                                                            name="ordering"
                                                            value="{{ old('ordering', $data->ordering) }}"
                                                            class="form-control"
                                                            placeholder="Enter 1 to 99...">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="image">
                                                <span>{{_label ('photo')}}</span>
                                            </label>
                                            <input type="file" name="image" id="image">
                                            {!! image_input_option($data->image ? asset('assets/images/'.$module .'/' . $data->image) : imageNotFound(),'image','100px') !!}
                                        </div>
                                        <div class="col-md-12">
                                            {!! form_action_buttons('Update Now', 'Update & New', 'Update & Stay') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endsection
@push('script')
    <script src="{{ asset('assets/backend/js/cleave-zen.js') }}"></script>
    <script src="{{ asset('assets/backend/js/select2.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-layouts.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-validation.js') }}"></script>
@endpush
