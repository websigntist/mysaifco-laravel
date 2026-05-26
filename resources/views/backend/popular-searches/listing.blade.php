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
                            @if(($moduleName ?? $module) !== 'trashed')
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
                                               class="form-check-input"
                                               type="checkbox"
                                               data-bs-toggle="tooltip"
                                               data-bs-placement="top"
                                               title="Select All (Use Shift+Click to select range)">
                                    </th>
                                    @php
                                        $renameMap = [
                                            'created_at' => 'Created',
                                            'tour_type' => 'Tour Type',
                                            'search_items' => 'Search Terms',
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
                                                @if($col === 'title')
                                                    <span class="fw-medium">{{ Str::words($data->title, 12, '...') }}</span>
                                                @elseif($col === 'tour_type')
                                                    {{ $data->tourType?->title ?? ($tourTypeMap[$data->tour_type_id] ?? '—') }}
                                                @elseif($col === 'search_items')
                                                    @php
                                                        $terms = collect($data->search_items ?? [])->pluck('title')->filter();
                                                    @endphp
                                                    <span class="badge bg-label-primary">{{ $terms->count() }} terms</span>
                                                    @if($terms->isNotEmpty())
                                                        <small class="d-block text-muted mt-1">{{ Str::words($terms->implode(', '), 10, '...') }}</small>
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
                                                @if(($moduleName ?? $module) === 'trashed')
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
            }

            const modalEl = document.getElementById("dataModal");
            const modal = new bootstrap.Modal(modalEl);
            const contentArea = document.getElementById("detailContentId");

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

                        const data = await response.json();

                        const rows = `
                            <tr><th>ID</th><td>${data.id ?? '-'}</td></tr>
                            <tr><th>Title</th><td>${data.title ?? '-'}</td></tr>
                            <tr><th>Description</th><td>${data.description ?? '-'}</td></tr>
                            <tr><th>Tour Type</th><td>${data.tour_type ?? '-'}</td></tr>
                            <tr><th>Search Terms</th><td>${(data.search_items && data.search_items.length) ? data.search_items.join(', ') : '-'}</td></tr>
                            <tr><th>Created At</th><td>${data.created_at ?? '-'}</td></tr>
                            <tr><th>Created By</th><td>${data.created_by_name ?? '-'}</td></tr>
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

                    Notiflix.Confirm.show(
                        'Confirm Delete',
                        'Are you sure you want to delete this record?',
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
                });
            });
        });
    </script>
@endpush
