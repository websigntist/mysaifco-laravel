@extends('backend.layouts.master')
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
                                            'parent_id' => 'parent',
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
                                                @if($col === 'icon')
                                                    <i class="text-primary icon-32px menu-icon icon-base ti tabler-{!! $data->icon !!}"></i>
                                                @elseif($col === 'module_title')
                                                    {{--{{ $data->module_title }}--}}
                                                    <span class="invisible">{{ $data->module_title }}</span>
                                                    <input type="text"
                                                           id="module_title_{{ $data->id }}"
                                                           name="module_title"
                                                           data-id="{{ $data->id }}"
                                                           value="{{ $data->module_title }}"
                                                           class="module_title form-control">
                                                @elseif($col === 'parent_id')
                                                    @if ($data->parentModule?->module_title)
                                                        <span class="badge badge-outline-warning">{{ $data->parentModule?->module_title ?? '/Parent' }}</span>
                                                    @else
                                                        <span class="badge badge-outline-gray">/Parent</span>
                                                    @endif
                                                    {{--{{ $data->parentModule?->menu_title ?? '/Parent' }}--}}
                                                @elseif($col === 'ordering')
                                                    {{--{{ $data->ordering }}--}}
                                                    <span class="invisible">{{ $data->ordering }}</span>
                                                    <input type="number"
                                                           id="ordering_{{ $data->id }}"
                                                           name="ordering"
                                                           data-id="{{ $data->id }}"
                                                           value="{{ $data->ordering }}"
                                                           class="ordering form-control">
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
            // Shift+Click Range Selection
            let lastChecked = null;
            const checkboxes = document.querySelectorAll('.childCheckbox');
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener('click', function(e) {
                    if (e.shiftKey && lastChecked) {
                        e.preventDefault();
                        const start = Array.from(checkboxes).indexOf(lastChecked);
                        const end = Array.from(checkboxes).indexOf(this);
                        const rangeStart = Math.min(start, end);
                        const rangeEnd = Math.max(start, end);
                        const shouldCheck = this.checked;
                        let count = 0;
                        checkboxes.forEach((cb, i) => {
                            if (i >= rangeStart && i <= rangeEnd) {
                                cb.checked = shouldCheck;
                                count++;
                                const row = cb.closest('tr');
                                if (row) {
                                    row.style.transition = 'background-color 0.3s ease';
                                    row.style.backgroundColor = '#e3f2fd';
                                    setTimeout(() => { row.style.backgroundColor = ''; }, 600);
                                }
                            }
                        });
                        Notiflix.Notify.info(`${count} item${count !== 1 ? 's' : ''} ${shouldCheck ? 'selected' : 'deselected'}`);
                    }
                    lastChecked = this;
                });
            });
            const selectAllCheckbox = document.getElementById('selectAll');
            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function() {
                    checkboxes.forEach(checkbox => { checkbox.checked = this.checked; });
                });
                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        const allChecked = Array.from(checkboxes).every(cb => cb.checked);
                        const someChecked = Array.from(checkboxes).some(cb => cb.checked);
                        selectAllCheckbox.checked = allChecked;
                        selectAllCheckbox.indeterminate = someChecked && !allChecked;
                    });
                });
            }
            // Original Scripts Below
            document.querySelectorAll(".module_title").forEach(input => {

                // Save updated value when focus leaves the field (blur)
                input.addEventListener("blur", function () {
                    const id = this.getAttribute("data-id");
                    const value = this.value.trim();

                    if (!value) return;
                    // Optional: show loading spinner while updating
                    Notiflix.Loading.circle('Updating title...');

                    fetch("{{ route($module . '.update-title') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: JSON.stringify({
                            id: parseInt(id, 10),
                            module_title: value
                        })
                    })
                        .then(async res => {
                            const data = await res.json().catch(() => ({}));
                            Notiflix.Loading.remove();
                            if (res.ok && data.success) {
                                Notiflix.Notify.success(data.message || "Module title updated successfully!");
                                return;
                            }
                            const errMsg = data.errors?.module_title?.[0] || data.message || "Could not update title.";
                            Notiflix.Notify.warning(errMsg);
                        })
                        .catch(err => {
                            Notiflix.Loading.remove();
                            console.error("Error updating module title:", err);
                            Notiflix.Notify.failure("Failed to update module title.");
                        });
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".ordering").forEach(input => {

                input.addEventListener("blur", function () {
                    const id = this.getAttribute("data-id");
                    const value = this.value.trim();

                    if (!value) return;

                    // Optional: show loading spinner while updating
                    Notiflix.Loading.circle('Updating ordering...');

                    fetch("{{ route($module . '.update-ordering') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            id: id,
                            ordering: value
                        })
                    })
                        .then(res => res.json())
                        .then(data => {
                            Notiflix.Loading.remove();
                            if (data.success) {
                                Notiflix.Notify.success("Ordering updated successfully!");
                            } else {
                                Notiflix.Notify.warning(data.message || "No changes detected.");
                            }
                            console.log("Ordering updated:", data);
                        })
                        .catch(err => {
                            Notiflix.Loading.remove();
                            console.error("Error updating ordering:", err);
                            Notiflix.Notify.failure("Failed to update ordering.");
                        });
                });
            });
        });
    </script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const modalEl = document.getElementById("dataModal");
        const modal = new bootstrap.Modal(modalEl);
        const contentArea = document.getElementById("detailContentId");

        document.querySelectorAll(".viewBtn").forEach(btn => {
            btn.addEventListener("click", async function () {
                const dataId = this.getAttribute("data-id");
                const url = `/admin/{{ $module }}/modal-view/${dataId}`;

                // Show loading state
                contentArea.innerHTML = `
                    <tr>
                        <td colspan="2" class="text-center text-info">Loading...</td>
                    </tr>
                `;

                try {
                    const response = await fetch(url, {
                        headers: {"X-Requested-With": "XMLHttpRequest"}
                    });

                    if (!response.ok)
                        throw new Error(`HTTP error! Status: ${response.status}`);

                    const data = await response.json();
                    console.log("{{ ucfirst($title) }} Data:", data);

                    // Handle empty response
                    if (!data || Object.keys(data).length === 0) {
                        contentArea.innerHTML = `
                            <tr>
                                <td colspan="2" class="text-center text-warning">No {{ $title }} data found.</td>
                            </tr>
                        `;
                        modal.show();
                        return;
                    }
                    console.log(data.parent_module);
                    // Safely determine the slug badge
                    const parentModule = data.parent_module != '/Parent'
                        ? `<span class="badge bg-label-warning me-1 mb-1">${data.parent_module}</span>`
                        : `<span class="badge bg-label-secondary me-1 mb-1">/Parent</span>`;

                    // Determine status badge color
                    const statusBadge = data.status === 'Active'
                        ? `<span class="badge bg-label-success">${data.status}</span>`
                        : `<span class="badge bg-label-danger">${data.status ?? '-'}</span>`;

                    // Build modal content rows
                    const rows = `
                        <tr><th>{{ _label('ID') }}</th><td>${data.id ?? '-'}</td></tr>
                        <tr><th>{{ _label('icon') }}</th><td>${data.icon ?? '-'}</td></tr>
                        <tr><th>{{ _label('module_title') }}</th><td>${data.module_title ?? '-'}</td></tr>
                        <tr><th>{{ _label('module_slug') }}</th><td>${data.module_slug}</td></tr>
                        <tr><th>{{ _label('parent_module') }}</th><td>${parentModule}</td></tr>
                        <tr><th>{{ _label('status') }}</th><td>${statusBadge}</td></tr>
                        <tr><th>{{ _label('actions') }}</th><td>${data.actions ?? '-'}</td></tr>
                        <tr><th>{{ _label('ordering') }}</th><td>${data.ordering ?? '-'}</td></tr>
                        <tr><th>{{ _label('show_in_menu') }}</th><td>${data.show_in_menu}</td></tr>
                        <tr><th>{{ _label('created_at') }}</th><td>${data.created_at ?? '-'}</td></tr>
                        <tr><th>{{ _label('created_by') }}</th><td>${data.created_by_name ?? '-'}</td></tr>
                    `;

                    // Update modal and show it
                    contentArea.innerHTML = rows;
                    modal.show();

                } catch (error) {
                    console.error("Fetch error:", error);
                    contentArea.innerHTML = `
                        <tr>
                            <td colspan="2" class="text-danger text-center">
                                Error loading {{ $title }} data.<br>
                                <small>${error.message}</small>
                            </td>
                        </tr>
                    `;
                    modal.show();
                }
            });
        });
    });
    </script>

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
