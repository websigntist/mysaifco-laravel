@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 mt-3">
        <form action="{{ route($module.'.store') }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="row gy-6">
                <div class="col-sm-12 col-xl-10 offset-xl-1">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs('Add New '. $title, $title.' form') !!}
                        </div>
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            {!! goBack($module) !!}
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="row">
                    <div class="col-sm-12 col-xl-10 offset-xl-1">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h5 class="alert-heading mb-2">Validation Errors:</h5>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row mb-6 gy-6">
                <div class="col-sm-12 col-xl-10 offset-xl-1">
                    <!-- Main Package Information -->
                    <div class="card card-action border-top-bottom mb-6">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-plane iconmrgn me-1"></span> Main Package
                                                                                                      Information
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5 align-items-center">
                                    <div class="col-md-8">
                                        <label class="form-label text-capitalize" for="title">
                                            <span>Package Title</span> <span class="text-danger">*</span> </label>
                                        <input type="text"
                                               id="title"
                                               name="title"
                                               value="{{ old('title') }}"
                                               class="form-control"
                                               placeholder="e.g. 5 Nights 5 Star Umrah Package"
                                               required>
                                        {!! error_label('title') !!}
                                    </div>
                                    <div class="col-md-4">
                                        @include('backend.components.tour-type-select', [
                                            'tourTypes' => $tourTypes,
                                            'selected' => old('tour_type_id') ? [(int) old('tour_type_id')] : [],
                                        ])
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="price">
                                            <span>Price Per Head</span> </label> <input type="text"
                                                                                        id="price"
                                                                                        name="price"
                                                                                        value="{{ old('price') }}"
                                                                                        class="form-control"
                                                                                        placeholder="e.g. 4600">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="currency"> <span>Currency</span>
                                        </label> <input type="text"
                                                        id="currency"
                                                        name="currency"
                                                        value="{{ old('currency', 'AED') }}"
                                                        class="form-control"
                                                        placeholder="e.g. AED">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label text-capitalize" for="min_people"> <span>Min People / Persons</span>
                                        </label> <input type="text"
                                                        id="min_people"
                                                        name="min_people"
                                                        value="{{ old('min_people') }}"
                                                        class="form-control"
                                                        placeholder="e.g. 2 Persons">
                                    </div>
                                    <div class="col-md-3 image-upload-widget" data-field="image">
                                        <label class="form-label text-capitalize" for="image">
                                            <span>Header / Main Image</span> </label>
                                        <input type="file" id="image" name="image" class="form-control image-file-input" accept="image/*">
                                        <input type="hidden" name="delete_img[image]" value="0" class="delete_img">
                                    </div>
                                    <div class="col-md-1">
                                        <div class="row align-items-center mt-2">
                                            <div class="col-auto">
                                                <div class="light-gallery lightgallery text-center image-preview-wrap" style="display:none;">
                                                    <a href="#">
                                                        <img class="rounded border image-preview" src="" width="75" height="75" style="object-fit: cover;" alt="Preview">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-auto fImg" style="display:none;">
                                            <button type="button" class="del_img btn btn-sm btn-danger waves-effect waves-light">
                                                <i class="ti tabler-trash me-1"></i>Remove Image
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label text-capitalize" for="image_alt">
                                            <span>Image Alt</span> </label>
                                        <input type="text" id="image_alt" name="image_alt" value="{{ old('image_alt') }}" class="form-control" placeholder="Image Alt Text">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label text-capitalize" for="image_title">
                                            <span>Image Title</span> </label>
                                        <input type="text" id="image_title" name="image_title" value="{{ old('image_title') }}" class="form-control" placeholder="Image Title Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Makkah Stay Details -->
                    <div class="card card-action border-top-bottom mb-6">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-building-fortress iconmrgn me-1"></span> Makkah
                                                                                                                  Hotel
                                                                                                                  & Stay
                                                                                                                  Details
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5 align-items-center">
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="makkah_nights_title"> <span>Makkah Nights / Title</span>
                                        </label> <input type="text"
                                                        id="makkah_nights_title"
                                                        name="makkah_nights_title"
                                                        value="{{ old('makkah_nights_title') }}"
                                                        class="form-control"
                                                        placeholder="e.g. 3 Nights in Makkah">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="makkah_hotel"> <span>Makkah Hotel / Location</span>
                                        </label> <input type="text"
                                                        id="makkah_hotel"
                                                        name="makkah_hotel"
                                                        value="{{ old('makkah_hotel') }}"
                                                        class="form-control"
                                                        placeholder="e.g. Pullman Zamzam or Similar">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label text-capitalize" for="makkah_rating">
                                            <span>Rating</span> </label> <input type="text"
                                                                                id="makkah_rating"
                                                                                name="makkah_rating"
                                                                                value="{{ old('makkah_rating') }}"
                                                                                class="form-control"
                                                                                placeholder="e.g. 4.9/5">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label text-capitalize" for="makkah_reviews"> <span>Reviews Count</span>
                                        </label> <input type="text"
                                                        id="makkah_reviews"
                                                        name="makkah_reviews"
                                                        value="{{ old('makkah_reviews') }}"
                                                        class="form-control"
                                                        placeholder="e.g. 5.1k Reviews">
                                    </div>
                                    <div class="col-md-3 image-upload-widget" data-field="makkah_image">
                                        <label class="form-label text-capitalize" for="makkah_image"> <span>Makkah Card Image</span>
                                        </label>
                                        <input type="file" id="makkah_image" name="makkah_image" class="form-control image-file-input" accept="image/*">
                                        <input type="hidden" name="delete_img[makkah_image]" value="0" class="delete_img">
                                    </div>
                                    <div class="col-md-1">
                                        <div class="row align-items-center mt-2">
                                            <div class="col-auto">
                                                <div class="light-gallery lightgallery text-center image-preview-wrap" style="display:none;">
                                                    <a href="#">
                                                        <img class="rounded border image-preview" src="" width="75" height="75" style="object-fit: cover;" alt="Preview">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-auto fImg" style="display:none;">
                                            <button type="button" class="del_img btn btn-sm btn-danger waves-effect waves-light">
                                                <i class="ti tabler-trash me-1"></i>Remove Image
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Madinah Stay Details -->
                    <div class="card card-action border-top-bottom mb-6">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-building-mosque iconmrgn me-1"></span> Madinah
                                                                                                                Hotel &
                                                                                                                Stay
                                                                                                                Details
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5 align-items-center">
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="madinah_nights_title"> <span>Madinah Nights / Title</span>
                                        </label> <input type="text"
                                                        id="madinah_nights_title"
                                                        name="madinah_nights_title"
                                                        value="{{ old('madinah_nights_title') }}"
                                                        class="form-control"
                                                        placeholder="e.g. 2 Nights in Madinah">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="madinah_hotel"> <span>Madinah Hotel / Location</span>
                                        </label> <input type="text"
                                                        id="madinah_hotel"
                                                        name="madinah_hotel"
                                                        value="{{ old('madinah_hotel') }}"
                                                        class="form-control"
                                                        placeholder="e.g. Madina Movenpick or Similar">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label text-capitalize" for="madinah_rating">
                                            <span>Rating</span> </label> <input type="text"
                                                                                id="madinah_rating"
                                                                                name="madinah_rating"
                                                                                value="{{ old('madinah_rating') }}"
                                                                                class="form-control"
                                                                                placeholder="e.g. 4.9/5">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label text-capitalize" for="madinah_reviews"> <span>Reviews Count</span>
                                        </label> <input type="text"
                                                        id="madinah_reviews"
                                                        name="madinah_reviews"
                                                        value="{{ old('madinah_reviews') }}"
                                                        class="form-control"
                                                        placeholder="e.g. 5.1k Reviews">
                                    </div>
                                    <div class="col-md-3 image-upload-widget" data-field="madinah_image">
                                        <label class="form-label text-capitalize" for="madinah_image"> <span>Madinah Card Image</span>
                                        </label>
                                        <input type="file" id="madinah_image" name="madinah_image" class="form-control image-file-input" accept="image/*">
                                        <input type="hidden" name="delete_img[madinah_image]" value="0" class="delete_img">
                                    </div>
                                    <div class="col-md-1">
                                        <div class="row align-items-center mt-2">
                                            <div class="col-auto">
                                                <div class="light-gallery lightgallery text-center image-preview-wrap" style="display:none;">
                                                    <a href="#">
                                                        <img class="rounded border image-preview" src="" width="75" height="75" style="object-fit: cover;" alt="Preview">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="col-auto fImg" style="display:none;">
                                            <button type="button" class="del_img btn btn-sm btn-danger waves-effect waves-light">
                                                <i class="ti tabler-trash me-1"></i>Remove Image
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Status & Ordering -->
                    <div class="card card-action border-top-bottom mb-6">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-adjustments iconmrgn me-1"></span> Status &
                                                                                                            Ordering
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-6 pt-5">
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="status"> <span>Status</span>
                                            <span class="text-danger">*</span> </label>
                                        <select id="status" name="status" class="form-select select2" required>
                                            @foreach($getStatus as $st)
                                                <option value="{{ $st }}" {{ old('status', 'Active') == $st ? 'selected' : '' }}>
                                                    {{ ucfirst($st) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-capitalize" for="ordering"> <span>Ordering</span>
                                        </label> <input type="number"
                                                        id="ordering"
                                                        name="ordering"
                                                        value="{{ old('ordering', 0) }}"
                                                        class="form-control"
                                                        placeholder="1, 2, 3...">
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        {!! form_action_buttons('Submit Form', 'Save & New', 'Save & Stay') !!}
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
    <script src="{{ asset('assets/backend/js/select2.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({width: '100%'});
        });
    </script>
@endpush
