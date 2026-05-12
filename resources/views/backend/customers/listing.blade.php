@extends('backend.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-6">
                <div class="col-sm-12 mt-8">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs(ucfirst(str_replace('-', ' ', $title) .' '. 'list')) !!}
                        </div>
                        <!-- ===== actions buttons start =====-->
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            {{-- Add Buttons --}}
                            {!! actionButton($module, 'add', route($module.'.create'), 'Add New') !!}
                            {!! actionButton($module, 'add_mob', route($module.'.create'),'','tabler-plus', 'Add New') !!}

                            {{-- Delete Buttons --}}
                            {!! actionButton($module, 'delete', null, 'Delete All') !!}
                            {!! actionButton($module, 'delete_mob', null, '', 'tabler-trash', 'Delete All') !!}

                            {{-- Import / Export --}}
                            {{--{!! actionButton($module, 'import', route($module.'.import'), '', 'tabler-upload', 'Import') !!}
                            {!! actionButton($module, 'export', route($module.'.export'), '', 'tabler-download', 'Export') !!}--}}
                        </div>
                        <!-- ===== actions buttons end =====-->
                    </div>
                </div>
            </div>
            <!-- ========= card =============-->
            <div class="card card-action mb-12 border-top-bottom">
                <div class="card-header border-bottom sticky-element pb-3 pt-3 cardStyling">
                    <i class="icon-base ti tabler-layout-list me-1"></i>
                    <h6 class="card-action-title mb-0 text-capitalize">{{str_replace('-', ' ', $title) .' '. 'list'}}</h6>
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
                                            'image'  => 'User',
                                            'user_type'  => 'Role',
                                            'created_at' => 'Created',
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
                                                @if($col === 'image')
                                                    <div class="d-flex justify-content-start align-items-center user-name">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-md me-4 light-gallery" id="gallery-{{ $data->id }}">
                                                                <a href="{{ asset('assets/images/'.$imageFolder .'/'. $data->image) }}">
                                                                    <img src="{{ $data->image ? asset ('assets/images/' . $imageFolder .'/'. $data->image) : imageNotFound() }}"
                                                                         alt="{{$data->image}}"
                                                                         title="{{$data->image}}"
                                                                         class="rounded-circle">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <a href="javascript:" class="text-heading text-truncate">
                                                                <span class="fw-medium">{{ $data->first_name }}</span>
                                                            </a> <small>{{ $data->email }}</small>
                                                        </div>
                                                    </div>
                                                @elseif($col === 'user_type')
                                                    <span class="text-heading">
                                                        {{ $data->userType?->user_type ?? 'N/A' }}
                                                    </span>
                                                @elseif($col === 'ordering')
                                                    {{ $data->ordering }}
                                                @elseif($col === 'status')
                                                    <span id="statusLabel-{{ $data->id }}"
                                                      class="badge {{ $data->status === 'Active' ? 'bg-label-success' : 'bg-label-danger' }}">
                                                        {{ ucfirst($data->status) }}
                                                    </span>
                                                @elseif($col === 'created_at')
                                                    {{ $data->created_at?->format('M d, Y') ?? '-' }}
                                                @elseif($col === 'created_by')
                                                    {{ getCreatedBy($data->created_by) }}
                                                @else
                                                    {{ $data->$col }}
                                                @endif
                                            </td>
                                        @endforeach
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {!! actionButton2($module, 'edit', route($module.'.edit', $data->id), 'Edit', $data->id, 'Edit', 'tabler-edit', 'btn btn-text-secondary rounded-pill waves-effect btn-icon') !!}
                                                {!! actionButton2($module, 'view', '#dataModal', null, $data->id, 'View Details') !!}
                                                <div class="dropdown">
                                                    {!! actionButton2($module, 'more') !!}
                                                    <div class="dropdown-menu">
                                                        {!! actionButton2($module, 'delete', route($module.'.delete', $data->id), 'Delete', $data->id, 'Delete', 'tabler-trash', 'dropdown-item waves-effect delete-record deleteBtn') !!}
                                                        {!! actionButton2($module, 'duplicate', route($module.'.duplicate', $data->id), 'Duplicate') !!}
                                                        {!! actionButton2($module, 'status', null, $data->status, $data->id, 'Change Status') !!}
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
    @include('backend.components.viewModal')
@endsection
@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
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
            // Original Scripts Below
            // ========================================
            const modalEl = document.getElementById("dataModal");
            const modal = new bootstrap.Modal(modalEl);
            const contentArea = document.getElementById("detailContentId");

            document.querySelectorAll(".viewBtn").forEach(btn => {
                btn.addEventListener("click", async function () {
                    const dataId = this.getAttribute("data-id");
                    const url = `/admin/{{$module}}/modal-view/${dataId}`;

                    // Show loading state
                    contentArea.innerHTML = `
                    <tr><td colspan="2" class="text-center text-info">Loading...</td></tr>
                `;

                    try {
                        const response = await fetch(url, {
                            headers: {"X-Requested-With": "XMLHttpRequest"}
                        });

                        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

                        const data = await response.json();
                        console.log("{{ucfirst($title)}} Data:", data);

                        // Handle empty data
                        if (!data || Object.keys(data).length === 0) {
                            contentArea.innerHTML = `
                            <tr><td colspan="2" class="text-center text-warning">No {{$title}} data found.</td></tr>
                        `;
                            modal.show();
                            return;
                        }

                        // Define image URL safely
                        const imageUrl = data.image
                            ? `/assets/images/{{$imageFolder}}/${data.image}`
                            : "{{ imageNotFound() }}";

                        // Build data rows
                        const rows = `
                        <tr><th>ID</th><td>${data.id ?? '-'}</td></tr>
                        <tr><th>Full Name</th><td>${(data.first_name ?? '') + ' ' + (data.last_name ?? '')}</td></tr>
                        <tr><th>Mobile No</th><td>${data.mobile_no ?? '-'}</td></tr>
                        <tr><th>Landline No</th><td>${data.landline_no ?? '-'}</td></tr>
                        <tr><th>Email</th><td>${data.email ?? '-'}</td></tr>
                        <tr><th>Gender</th><td>${data.gender ?? '-'}</td></tr>
                        <tr><th>City</th><td>${data.city ?? '-'}</td></tr>
                        <tr><th>State</th><td>${data.state ?? '-'}</td></tr>
                        <tr><th>Zipcode</th><td>${data.zipcode ?? '-'}</td></tr>
                        <tr><th>Address</th><td>${data.address ?? '-'}</td></tr>
                        <tr><th>Status</th><td>${data.status ?? '-'}</td></tr>
                        <tr><th>Created By</th><td>${data.created_by_name ?? '-'}</td></tr>
                        <tr><th>Created At</th><td>${data.created_at ?? '-'}</td></tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <img
                                    src="${imageUrl ? imageUrl : imageNotFound()}"
                                    alt="User Image"
                                    class="img-thumbnail rounded border-1"
                                    width="100"
                                />
                            </td>
                        </tr>
                    `;

                        // Inject and show modal
                        contentArea.innerHTML = rows;
                        modal.show();

                    } catch (error) {
                        console.error("Fetch error:", error);
                        contentArea.innerHTML = `
                        <tr><td colspan="2" class="text-danger text-center">Error loading {{$title}} data.</td></tr>
                    `;
                        modal.show();
                    }
                });
            });
        });
    </script>
    {{-- with sweetalert2 notification --}}
    {{--<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Handle delete button clicks
        document.querySelectorAll(".deleteBtn").forEach(btn => {
            btn.addEventListener("click", async function () {
                const id = this.getAttribute("data-id");
                const url = "{{ url('admin/{{$module}}/delete') }}/" + id; // fallback if route not in data

                // Use SweetAlert2 for confirmation
                const result = await Swal.fire({
                    title: "Are you sure?",
                    text: "This action cannot be undone!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel",
                    reverseButtons: true
                });

                if (result.isConfirmed) {
                    try {
                        const response = await fetch(url, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "X-Requested-With": "XMLHttpRequest"
                            }
                        });

                        if (!response.ok) throw new Error(`HTTP error ${response.status}`);

                        const data = await response.json();

                        if (data.success) {
                            Swal.fire({
                                title: "Deleted!",
                                text: data.message || "The {{$title}} has been deleted successfully.",
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false
                            });

                            // Optionally remove row instantly from table
                            const row = this.closest("tr");
                            if (row) row.remove();

                        } else {
                            Swal.fire("Error!", data.message || "Something went wrong.", "error");
                        }
                    } catch (error) {
                        console.error("Delete error:", error);
                        Swal.fire("Error!", "Failed to delete record. Try again.", "error");
                    }
                }
            });
        });
    });
    </script>--}}
    {{-- with notiflix notification --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".deleteBtn").forEach(btn => {
                btn.addEventListener("click", async function () {
                    const id = this.getAttribute("data-id");
                    const url = "{{ url('admin/'.$module.'/delete') }}/" + id;

                    // Notiflix confirmation dialog
                    Notiflix.Confirm.show(
                        'Confirm Delete',
                        'Are you sure you want to delete this {{$title}}? This action cannot be undone.',
                        'Yes, Delete',
                        'Cancel',
                        async () => {
                            // Show loading while deleting
                            Notiflix.Loading.standard('Deleting...');

                            try {
                                const response = await fetch(url, {
                                    method: "DELETE",
                                    headers: {
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                        "X-Requested-With": "XMLHttpRequest"
                                    }
                                });

                                if (!response.ok) throw new Error(`HTTP error ${response.status}`);

                                const data = await response.json();
                                Notiflix.Loading.remove();

                                if (data.success) {
                                    Notiflix.Notify.failure(data.message || '{{ucfirst($title)}} deleted successfully.');

                                    // Remove table row instantly
                                    const row = this.closest("tr");
                                    if (row) row.remove();

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
                            // Cancel callback
                            Notiflix.Notify.info('Delete cancelled.');
                        },
                        {
                            width: '320px',
                            borderRadius: '8px',
                            okButtonBackground: '#E3342F',
                            titleColor: '#333333',
                            messageColor: '#666666',
                            buttonsFontSize: '15px'
                        }
                    );
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".toggleStatusBtn").forEach(btn => {
                btn.addEventListener("click", function (e) {
                    e.preventDefault();

                    const dataId = this.getAttribute("data-id");
                    const currentStatus = this.getAttribute("data-current-status");
                    const url = `/admin/{{$module}}/${dataId}/status`;

                    // Optional: show loading indicator
                    Notiflix.Loading.circle('Updating status...');

                    fetch(url, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: JSON.stringify({status: currentStatus})
                    })
                        .then(res => res.json())
                        .then(data => {
                            Notiflix.Loading.remove(); // remove loading

                            if (data.success) {
                                // Update label
                                const statusLabel = document.getElementById("statusLabel-" + dataId);
                                if (statusLabel) {
                                    statusLabel.textContent = data.status.charAt(0).toUpperCase() + data.status.slice(1);
                                    statusLabel.className =
                                        data.status === 'Active'
                                            ? "badge bg-label-success"
                                            : "badge bg-label-danger";
                                }

                                // Update button attribute
                                this.setAttribute("data-current-status", data.status);

                                // Success notification
                                Notiflix.Notify.success(data.message || "Status updated successfully");
                            } else {
                                Notiflix.Notify.failure(data.message || "Failed to update status");
                            }
                        })
                        .catch(err => {
                            console.error("Status update error:", err);
                            Notiflix.Loading.remove();
                            Notiflix.Notify.failure("Error updating status. Please try again.");
                        });
                });
            });
        });
    </script>
@endpush
