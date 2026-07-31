@extends('backend.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-6">
                <div class="col-sm-12 mt-8">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs(ucfirst($title .' '. 'list')) !!}
                        </div>
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
                    </div>
                </div>
            </div>

            <div class="card card-action mb-12 border-top-bottom">
                <div class="card-header border-bottom pb-3 pt-3 cardStyling">
                    <i class="icon-base ti tabler-layout-list me-1"></i>
                    <h6 class="card-action-title mb-0 text-capitalize">{{ $title .' '. 'list' }}</h6>
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
                                               title="Select All">
                                    </th>
                                    <th>Departure Date / Day</th>
                                    <th>Sharing 4~5 Beds</th>
                                    <th>Sharing 3 Beds</th>
                                    <th>Sharing 2 Beds</th>
                                    <th>Tour Category</th>
                                    <th>Status</th>
                                    <th>Ordering</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($getData as $item)
                                    <tr id="row-{{ $item->id }}">
                                        <td>
                                            <input type="checkbox" name="ids[]" value="{{ $item->id }}" class="form-check-input childCheckbox select-item">
                                        </td>
                                        <td>
                                            <strong>{{ $item->departure_date }}</strong>
                                        </td>
                                        <td>
                                            <span class="badge bg-label-success fs-6">{{ $item->sharing_4_5_beds ?? '-' }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-label-info fs-6">{{ $item->sharing_3_beds ?? '-' }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-label-warning fs-6">{{ $item->sharing_2_beds ?? '-' }}</span>
                                        </td>
                                        <td>
                                            {{ $item->tourType->title ?? 'N/A' }}
                                        </td>
                                        <td>
                                            @if(isset($isTrashed) && $isTrashed)
                                                <span class="badge bg-label-danger">{{ $item->status }}</span>
                                            @else
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input toggle-status"
                                                           type="checkbox"
                                                           data-id="{{ $item->id }}"
                                                           {{ $item->status === 'Active' ? 'checked' : '' }}>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $item->ordering }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if(isset($isTrashed) && $isTrashed)
                                                    <a href="{{ route($module.'.restore', $item->id) }}"
                                                       class="btn btn-text-secondary rounded-pill waves-effect btn-icon"
                                                       data-bs-toggle="tooltip" title="Restore">
                                                        <i class="icon-base ti tabler-restore icon-22px"></i>
                                                    </a>
                                                    <a href="{{ route($module.'.forcedelete', $item->id) }}"
                                                       class="btn btn-text-secondary rounded-pill waves-effect btn-icon"
                                                       data-bs-toggle="tooltip" title="Delete permanently"
                                                       onclick="return confirm('Permanently delete this record?');">
                                                        <i class="icon-base ti tabler-trash-x icon-22px"></i>
                                                    </a>
                                                @else
                                                    {!! actionButton2($module, 'edit', route($module.'.edit', $item->id), 'Edit', $item->id, 'Edit', 'tabler-edit', 'btn btn-text-secondary rounded-pill waves-effect btn-icon') !!}
                                                    {!! actionButton2($module, 'view', '#dataModal', null, $item->id, 'View Details') !!}
                                                    <div class="dropdown">
                                                        {!! actionButton2($module, 'more') !!}
                                                        <div class="dropdown-menu">
                                                            {!! actionButton2($module, 'delete', route($module.'.delete', $item->id), 'Delete', $item->id, 'Delete', 'tabler-trash', 'dropdown-item waves-effect delete-record deleteBtn') !!}
                                                            {!! actionButton2($module, 'duplicate', route($module.'.duplicate', $item->id), 'Duplicate') !!}
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
    </div>
    @include('backend.components.viewModal')
@endsection
@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
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
                            }
                        });
                        if (typeof Notiflix !== 'undefined' && Notiflix.Notify) {
                            Notiflix.Notify.info(`${count} item${count !== 1 ? 's' : ''} ${shouldCheck ? 'selected' : 'deselected'}`);
                        }
                    }
                    lastChecked = this;
                });
            });

            $('#selectAll').on('change', function () {
                $('.childCheckbox').prop('checked', $(this).prop('checked'));
            });

            $(document).on('change', '.toggle-status', function () {
                var id = $(this).data('id');
                var status = $(this).is(':checked') ? 'Active' : 'Inactive';
                $.ajax({
                    url: '/admin/umrah-bus-schedules/' + id + '/status',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status
                    },
                    success: function (res) {
                        if (typeof Notiflix !== 'undefined' && Notiflix.Notify) {
                            Notiflix.Notify.success(res.message);
                        }
                    },
                    error: function () {
                        alert('Failed to update status');
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modalElement = document.getElementById("dataModal");
            if (!modalElement) return;

            const modal = new bootstrap.Modal(modalElement);
            const contentArea = document.getElementById("modalDataContent");

            document.querySelectorAll(".viewBtn").forEach(btn => {
                btn.addEventListener("click", async function () {
                    const dataId = this.getAttribute("data-id");
                    const url = `/admin/{{ $module }}/modal-view/${dataId}`;

                    contentArea.innerHTML = `<tr><td colspan="2" class="text-center text-info">Loading...</td></tr>`;

                    try {
                        const response = await fetch(url, {
                            headers: {"X-Requested-With": "XMLHttpRequest"}
                        });

                        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

                        const res = await response.json();
                        const data = res.data ?? res;

                        const rows = `
                            <tr><th>ID</th><td>${data.id ?? '-'}</td></tr>
                            <tr><th>Departure Date / Day</th><td>${data.departure_date ?? '-'}</td></tr>
                            <tr><th>Sharing 4~5 Beds Price</th><td>${data.sharing_4_5_beds ?? '-'}</td></tr>
                            <tr><th>Sharing 3 Beds Price</th><td>${data.sharing_3_beds ?? '-'}</td></tr>
                            <tr><th>Sharing 2 Beds Price</th><td>${data.sharing_2_beds ?? '-'}</td></tr>
                            <tr><th>Tour Category</th><td>${data.tour_type?.title ?? '-'}</td></tr>
                            <tr><th>Status</th><td>${data.status ?? '-'}</td></tr>
                            <tr><th>Created At</th><td>${data.created_at ?? '-'}</td></tr>
                        `;

                        contentArea.innerHTML = rows;
                        modal.show();
                    } catch (error) {
                        console.error("Fetch error:", error);
                        contentArea.innerHTML = `<tr><td colspan="2" class="text-danger text-center">Error loading data.</td></tr>`;
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

                    if (typeof Notiflix !== 'undefined' && Notiflix.Confirm) {
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
                    } else {
                        if (confirm('Are you sure you want to delete this record?')) {
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
                                }
                            } catch (e) {}
                        }
                    }
                });
            });
        });
    </script>
@endpush
