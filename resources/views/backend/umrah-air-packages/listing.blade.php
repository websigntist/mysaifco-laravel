@extends('backend.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-6">
                <div class="col-sm-12 mt-8">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs(ucfirst(str_replace('-',' ',$title) .' '. 'list')) !!}
                        </div>
                        <!-- ===== actions buttons start =====-->
                        <div class="card-header-elements ms-auto d-flex align-content-between gap-2">
                            @if(($moduleName ?? $module) !== 'trashed' && !isset($isTrashed))
                                {!! actionButton($module, 'add', route($module.'.create'), 'Add New') !!}
                                {!! actionButton($module, 'add_mob', route($module.'.create'),'','tabler-plus', 'Add New') !!}
                                <a href="{{ route($module.'.trashed') }}" class="btn btn-sm btn-label-secondary waves-effect d-lg-block d-none d-flex" data-bs-toggle="tooltip" title="Trashed">
                                    <span class="icon-xs icon-base ti tabler-trash me-2 topicon"></span>Trashed
                                </a>
                            @else
                                <a href="{{ route($module) }}" class="btn btn-sm btn-label-primary waves-effect d-lg-block d-none d-flex">
                                    <span class="icon-xs icon-base ti tabler-arrow-left me-2 topicon"></span>Back to list
                                </a>
                            @endif
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
                    <h6 class="card-action-title mb-0 text-capitalize">{{ str_replace('-',' ',$title) .' '. 'list' }}</h6>
                    {!! card_action_element() !!}
                </div>
                <div class="collapse show p-5">
                    <form action="{{ route($module.'.delete-all') }}" method="POST" class="deleteAll">
                        <input type="hidden" name="trashed" value="{{ $moduleName }}">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-hover" id="jsdatatable_list">
                                <thead class="border-top">
                                <tr>
                                    <th>
                                        <input id="selectAll"
                                               class="form-check-input childCheckbox"
                                               type="checkbox"
                                               data-bs-toggle="tooltip"
                                               data-bs-placement="top"
                                               title="Select All (Use Shift+Click to select range)">
                                    </th>
                                    @php
                                        $renameMap = [
                                            'image' => 'Image',
                                            'title' => 'Package Title',
                                            'tour_type' => 'Tour Category',
                                            'price' => 'Price',
                                            'min_people' => 'Min People',
                                            'makkah_hotel' => 'Makkah Hotel',
                                            'madinah_hotel' => 'Madinah Hotel',
                                            'status' => 'Status',
                                            'ordering' => 'Ordering',
                                            'created_at' => 'Created',
                                            'created_by' => 'Created By',
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
                                            <input name="ids[]" value="{{ $data->id }}" type="checkbox" class="childCheckbox form-check-input select-item">
                                        </td>
                                        @foreach($columns as $col)
                                            @if(in_array($col, $hiddenColumns))
                                                @continue
                                            @endif
                                            <td class="capitalize">
                                                @if($col === 'image')
                                                    <div class="lightgallery">
                                                        <a href="{{ $data->imageUrl() }}">
                                                            <img src="{{ $data->imageUrl() }}" alt="{{ $data->title }}" class="rounded border" width="50" height="50" style="object-fit: cover;">
                                                        </a>
                                                    </div>
                                                @elseif($col === 'title')
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-medium">{{ Str::words($data->title, 12, '...') }}</span>
                                                    </div>
                                                @elseif($col === 'price')
                                                    <span class="badge bg-label-success fs-6">
                                                        {{ $data->currency ?? 'AED' }} {{ $data->price }}
                                                    </span>
                                                @elseif($col === 'min_people')
                                                    @if($data->min_people)
                                                        <span class="badge bg-label-info"><i class="ti tabler-users icon-xs me-1"></i>{{ $data->min_people }}</span>
                                                    @else
                                                        <span class="text-muted">—</span>
                                                    @endif
                                                @elseif($col === 'tour_type')
                                                    {{ $data->tourType?->title ?? ($data->tour_type ?: '—') }}
                                                @elseif($col === 'makkah_hotel')
                                                    {{ $data->makkah_hotel ?: '—' }}
                                                @elseif($col === 'madinah_hotel')
                                                    {{ $data->madinah_hotel ?: '—' }}
                                                @elseif($col === 'status')
                                                    @if(isset($isTrashed) && $isTrashed)
                                                        <span class="badge bg-label-danger">{{ $data->status }}</span>
                                                    @else
                                                        <span id="statusLabel-{{ $data->id }}"
                                                              class="badge {{ $data->status === 'Active' ? 'bg-label-success' : 'bg-label-danger' }}">
                                                            {{ ucfirst($data->status) }}
                                                        </span>
                                                    @endif
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
                                                @if(($moduleName ?? $module) === 'trashed' || (isset($isTrashed) && $isTrashed))
                                                    <a href="{{ route($module.'.restore', $data->id) }}"
                                                       class="btn btn-text-secondary rounded-pill waves-effect btn-icon"
                                                       data-bs-toggle="tooltip" title="Restore">
                                                        <i class="icon-base ti tabler-restore icon-22px"></i>
                                                    </a>
                                                    <a href="{{ route($module.'.forcedelete', $data->id) }}"
                                                       class="btn btn-text-secondary rounded-pill waves-effect btn-icon"
                                                       data-bs-toggle="tooltip" title="Delete permanently"
                                                       onclick="return confirm('Permanently delete this record?');">
                                                        <i class="icon-base ti tabler-trash-x icon-22px"></i>
                                                    </a>
                                                @else
                                                    {!! actionButton2($module, 'edit', route($module.'.edit', $data->id), 'Edit', $data->id, 'Edit', 'tabler-edit', 'btn btn-text-secondary rounded-pill waves-effect btn-icon') !!}
                                                    {!! actionButton2($module, 'view', '#dataModal', null, $data->id, 'View Details') !!}
                                                    <div class="dropdown">
                                                        {!! actionButton2($module, 'more') !!}
                                                        <div class="dropdown-menu">
                                                            {!! actionButton2($module, 'delete', route($module.'.delete', $data->id), 'Delete', $data->id, 'Delete', 'tabler-trash', 'dropdown-item waves-effect delete-record deleteBtn') !!}
                                                            {!! actionButton2($module, 'duplicate', route($module.'.duplicate', $data->id), 'Duplicate') !!}
                                                            {!! actionButton2($module, 'status', null, $data->status, $data->id, 'Change Status', null, 'dropdown-item waves-effect toggleStatusBtn') !!}
                                                        </div>
                                                    </div>
                                                @endif
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
                                }
                            }
                        });
                        if (typeof Notiflix !== 'undefined') {
                            Notiflix.Notify.info(`${count} item${count !== 1 ? 's' : ''} ${shouldCheck ? 'selected' : 'deselected'}`);
                        }
                    }
                    lastChecked = this;
                });
            });

            const selectAllCheckbox = document.getElementById('selectAll');
            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function() {
                    checkboxes.forEach(checkbox => { checkbox.checked = this.checked; });
                });
            }

            const modalEl = document.getElementById("dataModal");
            const modal = modalEl ? new bootstrap.Modal(modalEl) : null;
            const contentArea = document.getElementById("detailContentId");

            document.querySelectorAll(".viewBtn").forEach(btn => {
                btn.addEventListener("click", async function () {
                    const dataId = this.getAttribute("data-id");
                    const url = `/admin/{{ $module }}/modal-view/${dataId}`;

                    if (contentArea) {
                        contentArea.innerHTML = `<tr><td colspan="2" class="text-center text-info">Loading...</td></tr>`;
                    }

                    try {
                        const response = await fetch(url, {
                            headers: {"X-Requested-With": "XMLHttpRequest"}
                        });

                        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

                        const res = await response.json();
                        const data = res.data ?? res;

                        let imageRow = '';
                        if (data.image || res.image_url) {
                            const imgUrl = res.image_url ?? data.image;
                            imageRow = `<tr><th>Main Image</th><td><div class="lightgallery"><a href="${imgUrl}"><img src="${imgUrl}" width="80" class="rounded border"></a></div></td></tr>`;
                        }

                        let makkahImgRow = '';
                        if (data.makkah_image || res.makkah_image_url) {
                            const imgUrl = res.makkah_image_url ?? data.makkah_image;
                            makkahImgRow = `<tr><th>Makkah Image</th><td><div class="lightgallery"><a href="${imgUrl}"><img src="${imgUrl}" width="80" class="rounded border"></a></div></td></tr>`;
                        }

                        let madinahImgRow = '';
                        if (data.madinah_image || res.madinah_image_url) {
                            const imgUrl = res.madinah_image_url ?? data.madinah_image;
                            madinahImgRow = `<tr><th>Madinah Image</th><td><div class="lightgallery"><a href="${imgUrl}"><img src="${imgUrl}" width="80" class="rounded border"></a></div></td></tr>`;
                        }

                        const rows = `
                            <tr><th>ID</th><td>${data.id ?? '-'}</td></tr>
                            ${imageRow}
                            <tr><th>Package Title</th><td>${data.title ?? '-'}</td></tr>
                            <tr><th>Price</th><td>${data.currency ?? 'AED'} ${data.price ?? '-'}</td></tr>
                            <tr><th>Min People</th><td>${data.min_people ?? '-'}</td></tr>
                            <tr><th>Tour Category</th><td>${data.tour_type?.title ?? data.tour_type ?? '-'}</td></tr>
                            <tr><th>Makkah Stay</th><td>${data.makkah_nights_title ?? '-'} | ${data.makkah_hotel ?? '-'} (${data.makkah_rating ?? ''} - ${data.makkah_reviews ?? ''})</td></tr>
                            ${makkahImgRow}
                            <tr><th>Madinah Stay</th><td>${data.madinah_nights_title ?? '-'} | ${data.madinah_hotel ?? '-'} (${data.madinah_rating ?? ''} - ${data.madinah_reviews ?? ''})</td></tr>
                            ${madinahImgRow}
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge ${data.status === 'Active' ? 'bg-label-success' : 'bg-label-danger'}">
                                        ${data.status ?? '-'}
                                    </span>
                                </td>
                            </tr>
                            <tr><th>Ordering</th><td>${data.ordering ?? 0}</td></tr>
                            <tr><th>Created At</th><td>${data.created_at ?? '-'}</td></tr>
                            <tr><th>Created By</th><td>${res.created_by_name ?? data.created_by_name ?? '-'}</td></tr>
                        `;

                        if (contentArea) contentArea.innerHTML = rows;
                        if (modal) modal.show();
                    } catch (error) {
                        console.error("Fetch error:", error);
                        if (contentArea) contentArea.innerHTML = `<tr><td colspan="2" class="text-danger text-center">Error loading data.</td></tr>`;
                        if (modal) modal.show();
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

                    if (typeof Notiflix !== 'undefined') {
                        Notiflix.Confirm.show(
                            'Confirm Delete',
                            'Are you sure you want to move this record to trash?',
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

                                    if (data.success) {
                                        Notiflix.Notify.success(data.message);
                                        this.closest("tr")?.remove();
                                    } else {
                                        Notiflix.Notify.failure(data.message || 'Failed to delete.');
                                    }
                                } catch (error) {
                                    Notiflix.Loading.remove();
                                    Notiflix.Notify.failure('Error deleting record.');
                                }
                            }
                        );
                    } else if (confirm('Are you sure you want to delete this record?')) {
                        try {
                            const response = await fetch(url, {
                                method: "DELETE",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    "X-Requested-With": "XMLHttpRequest"
                                }
                            });
                            const data = await response.json();
                            if (data.success) {
                                this.closest("tr")?.remove();
                            } else {
                                alert(data.message || 'Failed to delete.');
                            }
                        } catch (error) {
                            alert('Error deleting record.');
                        }
                    }
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
                    const currentStatus = this.getAttribute("data-current-status") || "Active";
                    const newStatus = currentStatus === "Active" ? "Inactive" : "Active";
                    const url = `/admin/{{ $module }}/${dataId}/status`;

                    if (typeof Notiflix !== 'undefined') {
                        Notiflix.Loading.circle('Updating status...');
                    }

                    fetch(url, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: JSON.stringify({status: newStatus})
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (typeof Notiflix !== 'undefined') {
                                Notiflix.Loading.remove();
                            }

                            if (data.success) {
                                const statusLabel = document.getElementById("statusLabel-" + dataId);
                                const nextStatus = data.status || newStatus;
                                if (statusLabel) {
                                    statusLabel.textContent = nextStatus.charAt(0).toUpperCase() + nextStatus.slice(1);
                                    statusLabel.className =
                                        nextStatus === 'Active'
                                            ? "badge bg-label-success"
                                            : "badge bg-label-danger";
                                }
                                this.setAttribute("data-current-status", nextStatus);
                                if (typeof Notiflix !== 'undefined') {
                                    Notiflix.Notify.success(data.message || "Status updated successfully");
                                }
                            } else {
                                if (typeof Notiflix !== 'undefined') {
                                    Notiflix.Notify.failure(data.message || "Failed to update status");
                                }
                            }
                        })
                        .catch(() => {
                            if (typeof Notiflix !== 'undefined') {
                                Notiflix.Loading.remove();
                                Notiflix.Notify.failure("Error updating status.");
                            }
                        });
                });
            });
        });
    </script>
@endpush
