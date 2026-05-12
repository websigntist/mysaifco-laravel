@extends('backend.layouts.master')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/select2.css') }}">
@endpush
@section('content')
    <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row gy-6">
                    <div class="col-sm-12 mt-8">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex flex-column justify-content-center">
                                {!! heading_breadcrumbs(ucfirst($title .' '. 'list')) !!}
                            </div>
                            <!-- ===== actions buttons start =====-->
                            <div class="card-header-elements ms-auto d-flex align-content-between">
                                {{-- Add Buttons --}}
                                {!! actionButton($module, 'add', route($module.'.create'), 'Add New') !!}
                                {!! actionButton($module, 'add_mob', route($module.'.create'),'','tabler-plus', 'Add New') !!}

                                {{-- Delete Buttons --}}
                                {!! actionButton($module, 'delete', null, 'Delete All') !!}
                                {!! actionButton($module, 'delete_mob', null, '', 'tabler-trash', 'Delete All') !!}

                                {{-- PDF Buttons --}}
                                @if (!$moduleName)
                                <a href="{{route($module.'.download-pdf', $getData[0]->id)}}"
                                   class="btn btn-sm btn-dark waves-effect d-lg-block d-none d-flex">
                                    <span class="icon-base ti tabler-file-type-pdf icon-20px me-2"></span>PDF</a>
                                <a href="{{route($module.'.download-pdf', $getData[0]->id)}}"
                                   class="btn btn-sm btn-icon btn-dark waves-effect d-lg-none d-sm-block d-flex">
                                    <span class="icon-base ti tabler-file-type-pdf icon-20px"></span> </a>
                                @endif
                            </div>
                            <!-- ===== actions buttons end =====-->
                        </div>
                    </div>
                </div>
                <!-- ========= card =============-->
                <div class="card card-action mb-12 border-top-bottom">
                    <div class="card-header border-bottom sticky-element pb-3 pt-3 cardStyling">
                        <i class="icon-base ti tabler-layout-list me-1"></i>
                        <h6 class="card-action-title mb-0 text-capitalize">{{$title .' '. 'list'}}</h6>
                        {!! card_action_element() !!}
                    </div>
                    <div class="collapse show p-5">
                        <form action="{{ route($module.'.delete-all') }}" method="POST" class="deleteAll">
                            <input type="hidden" name="trashed" value="{{$moduleName}}">
                            @csrf
                            <div class="table-responsive">
                                <table class="table table-hover" id="jsdatatable_list">
                                    <thead class="border-top">
                                    <tr>
                                        <th>
                                            <input id="selectAll"
                                                   class="form-check-input"
                                                   type="checkbox"
                                                   data-bs-toggle="tooltip"
                                                   data-bs-placement="top"
                                                   title="Select All (Use Shift+Click to select range)">
                                        </th>
                                        @php
                                            $renameMap = [
                                                'quotation_number' => 'Quote #',
                                                'client_name' => 'Client',
                                                'client_email' => 'Email',
                                                'quotation_date' => 'Date',
                                                'valid_until' => 'Valid Until',
                                                'total' => 'Total Amt',
                                                'created_at' => 'Created',
                                                'tax_rate' => 'Tax (%)',
                                            ];
                                        @endphp

                                        @foreach($columns as $col)
                                            @unless(in_array($col, $hiddenColumns))
                                                <th>{{ $renameMap[$col] ?? ucfirst(str_replace('_', ' ', $col)) }}</th>
                                            @endunless
                                        @endforeach
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($getData as $data)
                                        <tr id="rowId-{{ $data->id }}">
                                            <td>
                                                <input name="ids[]" value="{{ $data->id }}" type="checkbox" class="childCheckbox form-check-input">
                                            </td>
                                            @foreach($columns as $col)
                                                @if(in_array($col, $hiddenColumns))
                                                    @continue
                                                @endif
                                                <td class="capitalize">
                                                    @if($col === 'quotation_number')
                                                        <strong class="text-primary">{{ $data->quotation_number }}</strong>
                                                    @elseif($col === 'client_name')
                                                        {{ $data->client_name }}
                                                    @elseif($col === 'client_email')
                                                        {{ $data->client_email }}
                                                    @elseif($col === 'quotation_date' || $col === 'valid_until')
                                                        {{ $data->$col ? $data->$col->format('M d, Y') : '-' }}
                                                    @elseif($col === 'total')
                                                        <strong class="text-danger">${{ number_format($data->total, 2) }}</strong>
                                                     @elseif($col === 'tax_rate')
                                                        <strong class="text-danger">{{ $data->tax_rate }}</strong>
                                                    @elseif($col === 'status')
                                                        <select class="form-select select2 form-select-sm status-select"
                                                                data-id="{{ $data->id }}"
                                                                data-url="{{ route($module.'.status', $data->id) }}"
                                                                style="width: auto; min-width: 120px;">
                                                            <option value="draft" {{ $data->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                                            <option value="sent" {{ $data->status == 'sent' ? 'selected' : '' }}>Sent</option>
                                                            <option value="accepted" {{ $data->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                            <option value="rejected" {{ $data->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                            <option value="expired" {{ $data->status == 'expired' ? 'selected' : '' }}>Expired</option>
                                                        </select>
                                                    @elseif($col === 'created_at')
                                                        {{ $data->created_at ? $data->created_at->format('M d, Y') : '-' }}
                                                    @elseif($col === 'deleted_at')
                                                        {{ $data->deleted_at ? $data->deleted_at->format('M d, Y') : '-' }}
                                                    @elseif($col === 'created_by')
                                                        {{ $data->creator?->name ?? '-' }}
                                                    @else
                                                        {{ $data->$col ?? '-' }}
                                                    @endif
                                                </td>
                                            @endforeach
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    {!! actionButton2($module, 'edit', route($module.'.edit', $data->id), 'Edit', $data->id, 'Edit', 'tabler-edit', 'btn btn-text-secondary rounded-pill waves-effect btn-icon') !!}
                                                    <a href="{{ route($module.'.view', $data->id) }}"
                                                       class="btn btn-text-secondary rounded-pill waves-effect btn-icon viewBtn"
                                                       data-bs-toggle="tooltip" title="View">
                                                        <i class="icon-base ti tabler-eye icon-22px"></i> </a>
                                                    <div class="dropdown">
                                                        {!! actionButton2($module, 'more') !!}
                                                        <div class="dropdown-menu">
                                                            {!! actionButton2($module, 'delete', route($module.'.delete', $data->id), 'Delete', $data->id, 'Delete', 'tabler-trash', 'dropdown-item waves-effect delete-record deleteBtn') !!}
                                                            {!! actionButton2($module, 'duplicate', route($module.'.duplicate', $data->id), 'Duplicate') !!}
                                                            <a href="{{route($module.'.download-pdf', $data->id)}}"
                                                            class="dropdown-item waves-effect">
                                                             <span class="icon-base ti tabler-file-type-pdf icon-20px me-2"></span>Download PDF</a>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- / Content -->
    </div>
@endsection
@push('script')
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        // ========================================
        // Shift+Click Range Selection
        // ========================================
        let lastChecked = null;
        const checkboxes = document.querySelectorAll('.childCheckbox');

        checkboxes.forEach((checkbox, index) => {
            checkbox.addEventListener('click', function(e) {
                // Handle Shift+Click for range selection
                if (e.shiftKey && lastChecked) {
                    e.preventDefault(); // Prevent text selection

                    const start = Array.from(checkboxes).indexOf(lastChecked);
                    const end = Array.from(checkboxes).indexOf(this);

                    // Determine the range (min to max index)
                    const rangeStart = Math.min(start, end);
                    const rangeEnd = Math.max(start, end);

                    // Get the state we want to apply (from the clicked checkbox)
                    const shouldCheck = this.checked;

                    // Apply the selection to all checkboxes in range (inclusive)
                    let count = 0;
                    checkboxes.forEach((cb, i) => {
                        if (i >= rangeStart && i <= rangeEnd) {
                            cb.checked = shouldCheck;
                            count++;

                            // Add brief highlight animation
                            const row = cb.closest('tr');
                            if (row) {
                                row.style.transition = 'background-color 0.3s ease';
                                row.style.backgroundColor = '#e3f2fd';
                                setTimeout(() => {
                                    row.style.backgroundColor = '';
                                }, 600);
                            }
                        }
                    });

                    // Show notification about how many items were selected
                    Notiflix.Notify.info(`${count} item${count !== 1 ? 's' : ''} ${shouldCheck ? 'selected' : 'deselected'}`);
                }

                // Always update lastChecked to current checkbox
                lastChecked = this;
            });
        });

        // ========================================
        // Select All Checkbox
        // ========================================
        const selectAllCheckbox = document.getElementById('selectAll');

        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });

            // Update "Select All" when individual checkboxes change
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const allChecked = Array.from(checkboxes).every(cb => cb.checked);
                    const someChecked = Array.from(checkboxes).some(cb => cb.checked);

                    selectAllCheckbox.checked = allChecked;
                    selectAllCheckbox.indeterminate = someChecked && !allChecked;
                });
            });
        }

        // ========================================
        // Delete Button Handler
        // ========================================
        document.querySelectorAll(".deleteBtn").forEach(button => {
            button.addEventListener("click", function () {
                const id = this.getAttribute("data-id");
                const url = "{{ url('admin/'.$module.'/delete') }}/" + id;
                const row = this.closest("tr"); // ✅ capture row outside async scope

                Notiflix.Confirm.show(
                    'Confirm Delete',
                    'Are you sure you want to delete this {{$title}}? This action cannot be undone.',
                    'Yes, Delete',
                    'Cancel',
                    async () => {
                        Notiflix.Loading.standard('Deleting...');

                        try {
                            const response = await fetch(url, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    "X-Requested-With": "XMLHttpRequest"
                                }
                            });

                            const data = await response.json();
                            Notiflix.Loading.remove();

                            if (response.ok && data.success) {
                                Notiflix.Notify.success(data.message || '{{ ucfirst($title) }} deleted successfully.');

                                // ✅ Instantly remove the row
                                if (row) {
                                    row.style.transition = 'opacity 0.4s ease';
                                    row.style.opacity = '0';
                                    setTimeout(() => row.remove(), 400);
                                }

                            } else {
                                Notiflix.Notify.failure(data.message || 'Failed to delete {{$title}}.');
                            }
                        } catch (error) {
                            Notiflix.Loading.remove();
                            console.error("Delete error:", error);
                            Notiflix.Notify.failure('Error deleting record. Please try again.');
                        }
                    },
                    () => {
                        Notiflix.Notify.info('Delete cancelled.');
                    },
                    {
                        width: '320px',
                        borderRadius: '8px',
                        okButtonBackground: '#E3342F',
                        titleColor: '#333333',
                        messageColor: '#666',
                        buttonsFontSize: '15px'
                    }
                );
            });
        });
    });
    </script>

    <script>
        // Status change
        $('.status-select').on('change', function () {
            const id = $(this).data('id');
            const url = $(this).data('url');
            const status = $(this).val();

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function (response) {
                    if (response.status === 'success') {
                        Notiflix.Notify.success(response.message || 'Status updated successfully!');
                    } else {
                        Notiflix.Notify.failure(response.message || 'Failed to update status.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                    Notiflix.Notify.failure('Error updating status. Please try again.');
                }
            });
        });
    </script>

    <script src="{{ asset('assets/backend/js/select2.js') }}"></script>
@endpush

