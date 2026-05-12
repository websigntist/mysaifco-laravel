@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
            <form action="{{ route($module.'.update', $user->id) }}" method="post"
                  enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
                @method('Put')
                <!-- top heading and action buttons bar -->
                <div class="row gy-6">
                    <div class="col-sm-12">
                        <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                            <div class="d-flex flex-column justify-content-center">
                                {!! heading_breadcrumbs('Update '. $title, $title.' form') !!}
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
                <!-- left column ===================================-->
                <!-- ===============================================-->
                <div class="row mb-6 gy-6">
                    <div class="col-sm-12 col-xl-8">
                        <!-- user information -->
                        <div class="card card-action border-top-bottom">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-apps iconmrgn"></span>
                                    Fill Out The {{ucfirst($title)}} Details
                                </h6>
                                {!! card_action_element() !!}
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="first_name">
                                                <span>{{_label('first_name')}}</span>
                                            </label>
                                            <input type="text"
                                                   id="first_name"
                                                   class="form-control"
                                                   name="first_name"
                                                   value="{{ old('first_name', $user->first_name) }}"
                                                   placeholder="Enter {{_label('first_name')}}..." required>
                                            {!! error_label('first_name') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="last_name">
                                                <span>{{_label('last_name')}}</span>
                                            </label>
                                            <input type="text"
                                                   name="last_name"
                                                   value="{{ old('last_name', $user->last_name) }}"
                                                   id="last_name"
                                                   class="form-control"
                                                   placeholder="Enter {{_label('last_name')}}..." required>
                                            {!! error_label('last_name') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="mobile_no">
                                                <span>{{_label('mobile_no')}}</span>
                                            </label>
                                            <input type="text"
                                                   name="mobile_no"
                                                   value="{{ old('mobile_no', $user->mobile_no) }}"
                                                   id="mobile_no"
                                                   class="form-control"
                                                   placeholder="Enter {{_label('mobile_no')}}..." required>
                                            {!! error_label('mobile_no') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="landline_no">
                                                <span>{{_label('landline_no')}}</span>
                                            </label>
                                            <input type="text"
                                                   name="landline_no"
                                                   value="{{ old('landline_no', $user->landline_no) }}"
                                                   id="landline_no"
                                                   class="form-control"
                                                   placeholder="Enter {{_label('landline_no')}}" required>
                                            {!! error_label('landline_no') !!}
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="address">
                                                {{_label('address')}}
                                            </label>
                                            <input type="text"
                                                   name="address"
                                                   value="{{ old('address', $user->address) }}"
                                                   id="address"
                                                   class="form-control"
                                                   placeholder="Enter your {{_label('address')}} (optional)">
                                            {!! error_label('address') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="city">
                                                <span>{{_label('city')}}</span>
                                            </label>
                                            <input type="text"
                                                   name="city"
                                                   value="{{ old('city', $user->city) }}"
                                                   id="city"
                                                   class="form-control"
                                                   placeholder="Enter {{_label('city')}}..." required>
                                            {!! error_label('city') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="zipcode">
                                                <span>{{_label('zipcode')}}</span>
                                            </label>
                                            <input type="text"
                                                   name="zipcode"
                                                   value="{{ old('zipcode', $user->zipcode) }}"
                                                   id="zipcode"
                                                   class="form-control"
                                                   placeholder="Enter {{_label('zipcode')}}..." required>
                                            {!! error_label('zipcode') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="state">
                                                <span>{{_label('state')}}</span>
                                            </label>
                                            <input type="text"
                                                   name="state"
                                                   value="{{ old('state', $user->state) }}"
                                                   id="state"
                                                   class="form-control"
                                                   placeholder="Enter {{_label('state')}}..." required>
                                            {!! error_label('state') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="country">
                                                <span>{{_label('country')}}</span>
                                            </label>
                                            <select id="country" name="country" class="select2 form-select" required>
                                                <option value="">Select</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country }}" {{ $user->country == $country ? 'selected' : '' }}>
                                                        {{ $country }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            {!! error_label('country') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="gender">
                                                <span>{{_label('gender')}}</span>
                                            </label>
                                            <select id="gender" name="gender" class="form-select select2" required>
                                                <option value="">-Select option-</option>
                                                @foreach($getGender as $gender)
                                                    <option value="{{ $gender }}" {{ $user->gender == $gender ? 'selected' : '' }}>
                                                        {{ ucfirst($gender) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            {!! error_label('gender') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="dob">
                                                {{_label('date_of_birth')}}
                                            </label>
                                            <input type="text"
                                                   id="dob"
                                                   name="dob"
                                                   value="{{ old('dob', $user->dob) }}"
                                                   class="form-control dob-picker"
                                                   placeholder="YYYY-MM-DD" required>
                                            {!! error_label('dob') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- login information -->
                        <div class="card card-action border-top-bottom mt-5">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-login-2 iconmrgn"></span> Login Information
                                </h6>
                                {!! card_action_element() !!}
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="email">
                                                <span>{{_label('email')}}</span> </label>
                                            <input type="email"
                                                     name="email"
                                                     value="{{ old('email', $user->email) }}"
                                                     id="email"
                                                     class="form-control"
                                                     placeholder="Enter {{_label('email')}}..." required>
                                            {!! error_label('email') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-password-toggle">
                                                <label class="form-label text-capitalize" for="password">
                                                    <span>{{_label('password')}}</span>
                                                </label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password"
                                                           id="password"
                                                           name="password"
                                                           value="{{ old('password') }}"
                                                           class="form-control"
                                                           placeholder="******">
                                                    <span class="input-group-text cursor-pointer" id="password">
                                                   <i class="icon-base ti tabler-eye-off"></i></span>
                                                </div>
                                                {!! error_label('password') !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="user_type_id">
                                                <span>{{_label('user_type')}}</span>
                                            </label>
                                            <select id="user_type_id" name="user_type_id" class="form-select select2" required>
                                                <option value="">-Select option-</option>
                                                @foreach($userTypes as $id => $label)
                                                    <option value="{{ $id }}" {{ $user->user_type_id == $id ? 'selected' : '' }}>
                                                        {{ ucfirst($label) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            {!! error_label('user_type_id') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right column ===================================-->
                    <!-- ================================================-->
                    <div class="col-sm-12 col-xl-4 ">
                        <!-- status -->
                        <div class="card card-action border-top-bottom">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-status-change iconmrgn"></span> Status
                                </h6>
                                {!! card_action_element() !!}
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-12">
                                            <select id="status" name="status" class="form-select select2" required>
                                                <option value="">-Select option-</option>
                                                @foreach($getStatus as $status)
                                                    <option value="{{ $status }}" {{ $user->status == $status ? 'selected' : '' }}>
                                                        {{ ucfirst($status) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            {!! error_label('status') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- image option -->
                        <div class="card card-action border-top-bottom mt-5">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-photo iconmrgn"></span> image options
                                </h6>
                                {!! card_action_element() !!}
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-12">
                                            {!!image_input_option($user->image ? asset ('assets/images/' . $imageFolder .'/'. $user->image) : imageNotFound() )!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ordering or sorting -->
                        <div class="card card-action border-top-bottom mt-5">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-arrows-sort iconmrgn"></span> ordering
                                </h6>
                                {!! card_action_element() !!}
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <div class="col-md-12">
                                            <input type="number"
                                                   name="ordering"
                                                   value="{{ old('ordering', $user->ordering) }}"
                                                   id="ordering"
                                                   class="form-control"
                                                   placeholder="Enter 1 to 99...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- action buttons -->
                        <div class="card card-action border-top-bottom mt-5">
                            <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-capitalize">
                                    <span class="icon-sm icon-base ti tabler-brand-planetscale iconmrgn"></span> Action
                                </h6>
                                {!! card_action_element() !!}
                            </div>
                            <div class="collapse show">
                                <div class="card-body">
                                    <div class="row g-6 pt-5">
                                        <!-- action buttons -->
                                        {!! form_action_buttons('Update Now', 'Update & New', 'Update & Stay') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/backend/js/cleave-zen.js') }}"></script>
    <script src="{{ asset('assets/backend/js/moment.js') }}"></script>
    <script src="{{ asset('assets/backend/js/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/backend/js/select2.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-layouts.js') }}"></script>

@endpush
