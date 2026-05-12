@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="content-wrapper">
       <!-- Content -->
       <div class="container-xxl flex-grow-1 mt-3 -container-p-y">
          <form action="{{ route('setting.update-form') }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <input type="hidden" name="active_tab" id="active_tab"
                     value="{{ old('active_tab', session('active_tab', '#general_setting')) }}">
             <!-- top heading and action buttons bar -->
              <div class="row gy-6">
                  <div class="col-sm-12 col-xl-10 offset-xl-1">
                      <div class="d-flex justify-content-between align-items-center mb-3 mt-5">
                          <div class="d-flex flex-column justify-content-center">
                              {!! heading_breadcrumbs('Update '. $title, $title.' update form') !!}
                          </div>
                          <div class="card-header-elements ms-auto d-flex align-content-between">
                                  {!! goBack('dashboard', 'Update') !!}
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
                <div class="col-sm-12 col-xl-10 offset-xl-1">
                   <!-- page information -->
                   <div class="card card-action border-top-bottom">
                      <div class="card-header border-bottom py-3 d-flex justify-content-between align-items-center">
                         <h6 class="mb-0 text-capitalize">
                            <span class="icon-sm icon-base ti tabler-settings-check iconmrgn me-1"></span> update setting
                         </h6>
                          {!! card_action_element() !!}
                      </div>
                      <div class="collapse show">
                         <div class="card-body">
                            <div class="row g-6 pt-5">
                               <div class="col-md-12 sitesettings">
                                  <div class="nav-align-left nav-tabs-shadow">
                                     <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                           <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#general_setting">
                                              <span class="icon-sm icon-base ti tabler-brand-google-home iconmrgn me-1"></span>
                                              General Setting
                                           </button>
                                        </li>
                                        <li class="nav-item">
                                           <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#header_footer">
                                              <span class="icon-sm icon-base ti tabler-layout-board iconmrgn me-1"></span>
                                              Header & Footer
                                           </button>
                                        </li>
                                        <li class="nav-item">
                                           <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#contact_details">
                                              <span class="icon-sm icon-base ti tabler-headphones iconmrgn me-1"></span>
                                              Contaci Details
                                           </button>
                                        </li>
                                        <li class="nav-item">
                                           <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#admin_settings">
                                              <span class="icon-sm icon-base ti tabler-adjustments-cog iconmrgn me-1"></span>
                                              Admin Settings
                                           </button>
                                        </li>
                                        <li class="nav-item">
                                           <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#social_networks">
                                              <span class="icon-sm icon-base ti tabler-social iconmrgn me-1"></span> Social
                                                                                                                     Networks
                                           </button>
                                        </li>
                                        <li class="nav-item">
                                           <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#smtp_settings">
                                              <span class="icon-sm icon-base ti tabler-mail-cog iconmrgn me-1"></span> SMTP
                                                                                                                       Settings
                                           </button>
                                        </li>
                                        <li class="nav-item">
                                           <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#payment_api">
                                              <span class="icon-sm icon-base ti tabler-api iconmrgn me-1"></span> Payment
                                                                                                                  API
                                           </button>
                                        </li>
                                         <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#unit_currency">
                                             <span class="icon-sm icon-base ti tabler-ruler-measure iconmrgn me-1"></span> Unit & Currency
                                         </button>
                                         <li class="nav-item">
                                        </li>
                                        <li class="nav-item">
                                           <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#maintenance_mode">
                                              <span class="icon-sm icon-base ti tabler-box-model-2 iconmrgn me-1"></span>
                                              Maintenance Mode
                                           </button>
                                        </li>
                                     </ul>
                                     <div class="tab-content">
                                        @include('backend.components.general_setting')
                                        @include('backend.components.header_footer')
                                        @include('backend.components.contact_details')
                                        @include('backend.components.admin_settings')
                                        @include('backend.components.social_networks')
                                        @include('backend.components.smtp_settings')
                                        @include('backend.components.payment_api')
                                        @include('backend.components.unit_currency')
                                        @include('backend.components.maintenance_mode')
                                     </div>
                                  </div>
                               </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const activeTabInput = document.getElementById('active_tab');
            const tabButtons = document.querySelectorAll('.sitesettings [data-bs-toggle="tab"]');
            if (!activeTabInput || tabButtons.length === 0 || typeof bootstrap === 'undefined') return;

            tabButtons.forEach(function (btn) {
                btn.addEventListener('shown.bs.tab', function (e) {
                    const target = e.target.getAttribute('data-bs-target');
                    if (target) activeTabInput.value = target;
                });
            });

            const initialTarget = activeTabInput.value;
            if (!initialTarget) return;

            const initialBtn = document.querySelector('.sitesettings [data-bs-target="' + initialTarget + '"]');
            if (initialBtn) {
                new bootstrap.Tab(initialBtn).show();
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modeSelect = document.getElementById("paypal_payment_mode");
            const liveDiv = document.getElementById("paypal_live");
            const sandboxDiv = document.getElementById("paypal_sandbox");

            function togglePayPalFields() {
                const value = modeSelect.value;
                console.log("Selected Mode:", value); // debug
                if (value === "live_mode") {
                    liveDiv.style.display = "block";
                    sandboxDiv.style.display = "none";
                } else {
                    sandboxDiv.style.display = "block";
                    liveDiv.style.display = "none";
                }
            }

            // Run once on load
            togglePayPalFields();

            // Handle change for normal select or Select2
            if (typeof jQuery !== "undefined" && jQuery.fn.select2) {
                jQuery(modeSelect).on("change", togglePayPalFields);
            } else {
                modeSelect.addEventListener("change", togglePayPalFields);
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modeSelect = document.getElementById("stripe_payment_mode");
            const liveDiv = document.getElementById("stripe_live");
            const sandboxDiv = document.getElementById("stripe_test");

            function togglePayPalFields() {
                const value = modeSelect.value;
                console.log("Selected Mode:", value); // debug
                if (value === "live_mode") {
                    liveDiv.style.display = "block";
                    sandboxDiv.style.display = "none";
                } else {
                    sandboxDiv.style.display = "block";
                    liveDiv.style.display = "none";
                }
            }

            // Run once on load
            togglePayPalFields();

            // Handle change for normal select or Select2
            if (typeof jQuery !== "undefined" && jQuery.fn.select2) {
                jQuery(modeSelect).on("change", togglePayPalFields);
            } else {
                modeSelect.addEventListener("change", togglePayPalFields);
            }
        });
    </script>
    <script src="{{ asset('assets/backend/js/cleave-zen.js') }}"></script>
    <script src="{{ asset('assets/backend/js/moment.js') }}"></script>
    <script src="{{ asset('assets/backend/js/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/backend/js/select2.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-layouts.js') }}"></script>
    <script src="{{ asset('assets/backend/js/form-validation.js') }}"></script>
@endpush

