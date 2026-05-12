@extends('backend.layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
        <form action="{{ route('pages.import') }}" method="post" id="importForm" class="needs-validation"
              enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row gy-6">
                <div class="col-sm-12 col-xl-8 offset-lg-2">
                    <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs('Add New '. $title, $title.' form') !!}
                        </div>
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            {!! goBack($module,'Upload CSV') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-6 gy-6">
                <div class="col-sm-12 col-xl-8 offset-lg-2">
                    <!-- page information -->
                    <div class="card card-action border-top-bottom">
                        <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-capitalize">
                                <span class="icon-sm icon-base ti tabler-apps iconmrgn me-1"></span>
                                Select and import the data
                            </h6>
                            {!! card_action_element() !!}
                        </div>
                        <div class="collapse show">
                            <div class="card-body">
                                <div class="row g-5 pt-5 d-flex justify-content-center ">
                                    <div class="col-sm-12 col-md-8">
                                        <input type="file" name="csv_file" accept=".csv" class="form-control" required>
                                    </div>
                                    <div class="col-sm-12 col-md-4 justify-end d-flex">
                                        <button type="submit" class="actionBtns btn btn-primary waves-effect waves-light">
                                      <span class="icon-base ti tabler-database-plus icon-20px me-2"></span>Upload CSV</button>
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
    <script>
            document.addEventListener('DOMContentLoaded', () => {
                const form = document.getElementById('importForm');

                // Safety check so JS doesn’t break if form doesn’t exist
                if (!form) return;

                form.addEventListener('submit', () => {
                    Notiflix.Loading.standard('Data importing, please wait...');
                });
            });
        </script>
    <script src="{{ asset('assets/backend/js/form-layouts.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-validation.js') }}"></script>
@endpush
