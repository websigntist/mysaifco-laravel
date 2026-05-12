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
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="first_name">
                                                <span>{{_label('first_name')}}</span> </label>
                                            <input type="text"
                                                  id="first_name"
                                                  name="first_name"
                                                  value="{{ old ('first_name', $data->first_name ) }}"
                                                  class="form-control"
                                                  placeholder="Enter {{_label('first_name')}}..." required>
                                            {!! error_label('first_name') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="last_name">
                                                {{_label('last_name')}} </label>
                                            <input type="text"
                                                id="last_name"
                                                name="last_name"
                                                value="{{ old('last_name', $data->last_name) }}"
                                                class="form-control"
                                                placeholder="Enter {{_label('last_name')}}..." required>
                                            {!! error_label('last_name') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="email">
                                                <span>{{_label('email')}}</span> </label>
                                            <input type="email"
                                                         id="email"
                                                         name="email"
                                                         value="{{ old('email', $data->email) }}"
                                                         class="form-control"
                                                         placeholder="Enter {{_label('email')}}..." required>
                                            {!! error_label('email') !!}
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label text-capitalize" for="phone">
                                                <span>{{_label('phone')}}</span> </label>
                                            <input type="text"
                                                     id="phone"
                                                     name="phone"
                                                     value="{{ old('phone', $data->phone) }}"
                                                     class="form-control"
                                                     placeholder="Enter {{_label('phone')}}...">
                                            {!! error_label('phone') !!}
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="subject">
                                                {{_label('subject')}} </label>
                                            <input type="text"
                                                          id="subject"
                                                          name="subject"
                                                          value="{{ old('subject', $data->subject) }}"
                                                          class="form-control"
                                                          placeholder="Enter {{_label('subject')}}...">
                                            {!! error_label('subject') !!}
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label text-capitalize" for="message">
                                                {{_label('customer_message')}} </label>
                                            <textarea class="form-control"
                                                      id="message"
                                                      name="message"
                                                      placeholder="Write {{_label('description')}}" rows="5">{{ old ('message', $data->message) }}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label text-capitalize" for="status">
                                                <span>{{_label('status')}}</span> </label>
                                            <select id="status" name="status" class="form-select select2" required>
                                                @foreach($getStatus as $status)
                                                    <option value="{{ old($status, $status) }}" {{$data->status == $status ? 'selected' : ''}}>
                                                        {{ ucfirst($status) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label text-capitalize" for="document">
                                                {{_label('document')}}
                                            </label>
                                            <input class="form-control"
                                                            type="file"
                                                            name="document"
                                                            id="document">
                                            <div class="text-center my-3">
                                                <small class="text-danger">jpg,png,pdf,docx,xlsx|max:2mb</small>
                                            </div>
                                        </div>
                                        <div class="col-md-3 d-flex justify-content-end">
                                            <a href="{{asset('assets/documents/'. $data->document)}}" download>
                                                <button type="button" class="btn btn-danger mt-7 d-flex">
                                                    <i class="breadcrumb-icon icon-base ti tabler-cloud-download me-2"></i>
                                                    Download
                                                </button>
                                            </a>
                                        </div>
                                        <div class="col-md-12">
                                            {!! form_action_buttons('Submit Now', 'Save & New', 'Save & Stay') !!}
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
