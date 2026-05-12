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
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            {!! actionButton($module, 'add', route($module.'.create'), 'Add New') !!}
                            {!! actionButton($module, 'add_mob', route($module.'.create'),'','tabler-plus', 'Add New') !!}
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
                                        <input id="selectAll" class="form-check-input" type="checkbox"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="Select All (Use Shift+Click to select range)">
                                    </th>
                                    @php
                                        $renameMap = [
                                            'cover_image'   => 'Cover',
                                            'title'         => 'Gallery Title',
                                            'images_count'  => 'Images Count',
                                            'ordering'      => 'Order',
                                            'created_at'    => 'Created',
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
                                                @if($col === 'cover_image')
                                                    <div class="avatar avatar-md light-gallery">
                                                        <a href="{{ $data->cover_image ? asset('assets/images/'.$module.'/'.$data->cover_image) : '#' }}">
                                                            <img src="{{ $data->cover_image ? asset('assets/images/'.$module.'/'.$data->cover_image) : imageNotFound() }}"
                                                                 alt="{{ $data->title }}"
                                                                 title="{{ $data->title }}"
                                                                 class="border rounded-circle">
                                                        </a>
                                                    </div>
                                                @elseif($col === 'title')
                                                    <span class="gallery_title cursor-pointer" data-id="{{ $data->id }}" title="Click to edit">{{ $data->title }}</span>
                                                    <input type="text" class="gallery_title_input form-control d-none" data-id="{{ $data->id }}" value="{{ $data->title }}" style="max-width: 180px;">
                                                @elseif($col === 'images_count')
                                                    {{ $data->images_count ?? 0 }}
                                                @elseif($col === 'ordering')
                                                    <span class="gallery_ordering cursor-pointer" data-id="{{ $data->id }}" title="Click to edit">{{ $data->ordering }}</span>
                                                    <input type="number" class="gallery_ordering_input form-control d-none" data-id="{{ $data->id }}" value="{{ $data->ordering }}" style="width: 70px;">
                                                @elseif($col === 'status')
                                                    <span id="statusLabel-{{ $data->id }}"
                                                          class="badge {{ $data->status === 'active' ? 'bg-label-success' : 'bg-label-danger' }}">
                                                        {{ ucfirst($data->status) }}
                                                    </span>
                                                @elseif($col === 'created_at')
                                                    {{ $data->created_at?->format('M d, Y') ?? '-' }}
                                                @else
                                                    {{ $data->$col }}
                                                @endif
                                            </td>
                                        @endforeach
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {!! actionButton2($module, 'edit', route($module.'.edit', $data->id), 'Edit', $data->id, 'Edit', 'tabler-edit', 'btn btn-text-secondary rounded-pill waves-effect btn-icon') !!}
                                                {!! actionButton2($module, 'view', '#dataModal', null, $data->id, 'View Details') !!}
                                                <a href="{{ route('galleries.images', $data->id) }}" class="btn btn-text-secondary rounded-pill waves-effect btn-icon" title="Gallery Images">
                                                    <i class="icon-base ti tabler-photo me-0"></i>
                                                </a>
                                                <div class="dropdown">
                                                    {!! actionButton2($module, 'more') !!}
                                                    <div class="dropdown-menu">
                                                        {!! actionButton2($module, 'delete', route($module.'.delete', $data->id), 'Delete', $data->id, 'Delete', 'tabler-trash', 'dropdown-item waves-effect delete-record deleteBtn') !!}
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
                        checkboxes.forEach((cb, i) => {
                            if (i >= rangeStart && i <= rangeEnd) cb.checked = shouldCheck;
                        });
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

            document.querySelectorAll(".gallery_title").forEach(span => {
                span.addEventListener("click", function() {
                    const id = this.getAttribute("data-id");
                    const input = document.querySelector('.gallery_title_input[data-id="' + id + '"]');
                    if (input && input.classList.contains('d-none')) {
                        this.classList.add('d-none');
                        input.classList.remove('d-none');
                        input.focus();
                    }
                });
            });
            document.querySelectorAll(".gallery_ordering").forEach(span => {
                span.addEventListener("click", function() {
                    const id = this.getAttribute("data-id");
                    const input = document.querySelector('.gallery_ordering_input[data-id="' + id + '"]');
                    if (input && input.classList.contains('d-none')) {
                        this.classList.add('d-none');
                        input.classList.remove('d-none');
                        input.focus();
                    }
                });
            });
            document.querySelectorAll(".gallery_title_input").forEach(input => {
                input.addEventListener("focus", function() {
                    const id = this.getAttribute("data-id");
                    document.querySelector('.gallery_title[data-id="' + id + '"]').classList.add('d-none');
                });
                input.addEventListener("blur", function () {
                    const id = this.getAttribute("data-id");
                    const value = this.value.trim();
                    if (!value) return;
                    Notiflix.Loading.circle('Updating title...');
                    fetch("{{ route($module . '.update-title') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({ id: id, title: value })
                    })
                    .then(res => res.json())
                    .then(data => {
                        Notiflix.Loading.remove();
                        if (data.success) {
                            const span = document.querySelector('.gallery_title[data-id="' + id + '"]');
                            if (span) { span.textContent = data.title; span.classList.remove('d-none'); }
                            this.classList.add('d-none');
                            this.value = data.title;
                            Notiflix.Notify.success(data.message || 'Title updated.');
                        }
                    })
                    .catch(err => {
                        Notiflix.Loading.remove();
                        Notiflix.Notify.failure('Failed to update title.');
                    });
                });
                input.addEventListener("blur", function() {
                    const id = this.getAttribute("data-id");
                    const span = document.querySelector('.gallery_title[data-id="' + id + '"]');
                    if (span && !this.classList.contains('d-none')) {
                        span.classList.remove('d-none');
                        this.classList.add('d-none');
                    }
                });
            });
            document.querySelectorAll(".gallery_ordering_input").forEach(input => {
                input.addEventListener("focus", function() {
                    const id = this.getAttribute("data-id");
                    document.querySelector('.gallery_ordering[data-id="' + id + '"]').classList.add('d-none');
                });
                input.addEventListener("blur", function () {
                    const id = this.getAttribute("data-id");
                    const value = this.value.trim();
                    if (value === '') return;
                    Notiflix.Loading.circle('Updating ordering...');
                    fetch("{{ route($module . '.update-ordering') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({ id: id, ordering: parseInt(value, 10) })
                    })
                    .then(res => res.json())
                    .then(data => {
                        Notiflix.Loading.remove();
                        if (data.success) {
                            const span = document.querySelector('.gallery_ordering[data-id="' + id + '"]');
                            if (span) { span.textContent = data.ordering; span.classList.remove('d-none'); }
                            this.classList.add('d-none');
                            this.value = data.ordering;
                            Notiflix.Notify.success(data.message || 'Ordering updated.');
                        }
                    })
                    .catch(err => {
                        Notiflix.Loading.remove();
                        Notiflix.Notify.failure('Failed to update ordering.');
                    });
                });
                input.addEventListener("blur", function() {
                    const id = this.getAttribute("data-id");
                    const span = document.querySelector('.gallery_ordering[data-id="' + id + '"]');
                    if (span && !this.classList.contains('d-none')) {
                        span.classList.remove('d-none');
                        this.classList.add('d-none');
                    }
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
                    contentArea.innerHTML = `<tr><td colspan="2" class="text-center text-info">Loading...</td></tr>`;
                    try {
                        const response = await fetch(url, { headers: {"X-Requested-With": "XMLHttpRequest"} });
                        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                        const data = await response.json();
                        const imageUrl = data.cover_image ? `/assets/images/{{ $module }}/${data.cover_image}` : "{{ imageNotFound() }}";
                        const rows = `
                            <tr><th>ID</th><td>${data.id ?? '-'}</td></tr>
                            <tr><th>Title</th><td>${data.title ?? '-'}</td></tr>
                            <tr><th>Status</th><td><span class="badge ${data.status === 'active' ? 'bg-label-success' : 'bg-label-danger'}">${data.status ? data.status.charAt(0).toUpperCase() + data.status.slice(1) : '-'}</span></td></tr>
                            <tr><th>Ordering</th><td>${data.ordering ?? '-'}</td></tr>
                            <tr><th>Images Count</th><td>${data.images_count ?? 0}</td></tr>
                            <tr><th>Created At</th><td>${data.created_at ?? '-'}</td></tr>
                            <tr><th>Created By</th><td>${data.created_by_name ?? '-'}</td></tr>
                            <tr><th>Cover Image</th><td><img src="${imageUrl}" alt="Cover" class="img-thumbnail rounded border-1" width="100" /></td></tr>
                        `;
                        contentArea.innerHTML = rows;
                        modal.show();
                    } catch (error) {
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
                        'Are you sure you want to delete this {{ $title }}? This action cannot be undone.',
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
                                if (!response.ok) throw new Error(`HTTP error ${response.status}`);
                                const data = await response.json();
                                Notiflix.Loading.remove();
                                if (data.success) {
                                    Notiflix.Notify.success(data.message || '{{ ucfirst($title) }} deleted.');
                                    const row = document.querySelector('#rowId-' + id);
                                    if (row) row.remove();
                                } else {
                                    Notiflix.Notify.failure(data.message || 'Failed to delete.');
                                }
                            } catch (error) {
                                Notiflix.Loading.remove();
                                Notiflix.Notify.failure('Error deleting record.');
                            }
                        },
                        () => { Notiflix.Notify.info('Delete cancelled.'); },
                        { width: '320px', borderRadius: '8px', okButtonBackground: '#E3342F' }
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
                    const url = `/admin/{{ $module }}/${dataId}/status`;
                    Notiflix.Loading.circle('Updating status...');
                    fetch(url, {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: JSON.stringify({ status: currentStatus })
                    })
                    .then(res => res.json())
                    .then(data => {
                        Notiflix.Loading.remove();
                        if (data.success) {
                            const statusLabel = document.getElementById("statusLabel-" + dataId);
                            if (statusLabel) {
                                statusLabel.textContent = data.status.charAt(0).toUpperCase() + data.status.slice(1);
                                statusLabel.className = data.status === 'active' ? "badge bg-label-success" : "badge bg-label-danger";
                            }
                            this.setAttribute("data-current-status", data.status);
                            Notiflix.Notify.success(data.message || "Status updated.");
                        } else {
                            Notiflix.Notify.failure(data.message || "Failed to update status.");
                        }
                    })
                    .catch(err => {
                        Notiflix.Loading.remove();
                        Notiflix.Notify.failure("Error updating status.");
                    });
                });
            });
        });
    </script>
@endpush
