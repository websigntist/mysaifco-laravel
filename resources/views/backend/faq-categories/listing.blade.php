@extends('backend.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row gy-6">
                <div class="col-sm-12 mt-8">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex flex-column justify-content-center">
                            {!! heading_breadcrumbs(ucfirst(str_replace('-', ' ', $title) . ' list')) !!}
                        </div>
                        <div class="card-header-elements ms-auto d-flex align-content-between gap-2">
                            @if(($moduleName ?? $module) !== 'trashed')
                                {!! actionButton($module, 'add', route($module . '.create'), 'Add New') !!}
                                {!! actionButton($module, 'add_mob', route($module . '.create'), '', 'tabler-plus', 'Add New') !!}
                                <a href="{{ route($module . '.trashed') }}" class="btn btn-sm btn-label-secondary waves-effect d-lg-block d-none d-flex" data-bs-toggle="tooltip" title="Trashed">
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
                    <h6 class="card-action-title mb-0 text-capitalize">{{ str_replace('-', ' ', $title) . ' list' }}</h6>
                    {!! card_action_element() !!}
                </div>
                <div class="collapse show p-5">
                    <form action="{{ route($module . '.delete-all') }}" method="POST" class="deleteAll">
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
                                            'image'      => 'Image',
                                            'title'      => 'Title',
                                            'status'     => 'Status',
                                            'ordering'   => 'Ordering',
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
                                                    @if(!empty($data->image))
                                                        <img src="{{ asset('assets/images/'.$module.'/'.$data->image) }}" alt="{{ $data->title }}" width="45" height="45" class="rounded object-fit-cover">
                                                    @else
                                                        <span class="text-muted">—</span>
                                                    @endif
                                                @elseif($col === 'title')
                                                    <div class="d-flex flex-column">
                                                        <span class="fw-medium">{{ $data->title }}</span>
                                                        <small class="text-muted">{{ url('/') }}/{{ $data->friendly_url }}</small>
                                                    </div>
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
                                                @if(($moduleName ?? $module) === 'trashed')
                                                    <a href="{{ route($module . '.restore', $data->id) }}"
                                                       class="btn btn-text-secondary rounded-pill waves-effect btn-icon"
                                                       data-bs-toggle="tooltip" title="Restore">
                                                        <i class="icon-base ti tabler-restore icon-22px"></i>
                                                    </a>
                                                    <a href="{{ route($module . '.forcedelete', $data->id) }}"
                                                       class="btn btn-text-secondary rounded-pill waves-effect btn-icon"
                                                       data-bs-toggle="tooltip" title="Delete permanently"
                                                       onclick="return confirm('Permanently delete this record?');">
                                                        <i class="icon-base ti tabler-trash-x icon-22px"></i>
                                                    </a>
                                                @else
                                                    {!! actionButton2($module, 'edit', route($module . '.edit', $data->id), 'Edit', $data->id, 'Edit', 'tabler-edit', 'btn btn-text-secondary rounded-pill waves-effect btn-icon') !!}
                                                    {!! actionButton2($module, 'view', '#dataModal', null, $data->id, 'View Details') !!}
                                                    <div class="dropdown">
                                                        {!! actionButton2($module, 'more') !!}
                                                        <div class="dropdown-menu">
                                                            {!! actionButton2($module, 'delete', route($module . '.delete', $data->id), 'Delete', $data->id, 'Delete', 'tabler-trash', 'dropdown-item waves-effect delete-record deleteBtn') !!}
                                                            {!! actionButton2($module, 'duplicate', route($module . '.duplicate', $data->id), 'Duplicate') !!}
                                                            {!! actionButton2($module, 'status', null, $data->status, $data->id, 'Change Status') !!}
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
                        const start = Array.from(checkboxes).indexOf(lastChecked);
                        const end = Array.from(checkboxes).indexOf(this);
                        const rangeStart = Math.min(start, end);
                        const rangeEnd = Math.max(start, end);
                        const shouldCheck = this.checked;
                        checkboxes.forEach((cb, i) => {
                            if (i >= rangeStart && i <= rangeEnd) {
                                cb.checked = shouldCheck;
                            }
                        });
                    }
                    lastChecked = this;
                });
            });
        });
    </script>
@endpush
