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
                        <div class="card-header-elements ms-auto d-flex align-content-between">
                            {{-- Add Buttons --}}
                            {!! actionButton($module, 'add', route($module.'.create'), 'Add New') !!}
                            {!! actionButton($module, 'add_mob', route($module.'.create'),'','tabler-plus', 'Add New') !!}

                            {{-- Delete Buttons --}}
                            {!! actionButton($module, 'delete', null, 'Delete All') !!}
                            {!! actionButton($module, 'delete_mob', null, '', 'tabler-trash', 'Delete All') !!}

                            {{-- Import / Export --}}
                            {!! actionButton($module, 'import', route($module.'.import-form'), '', 'tabler-upload', 'Import CSV') !!}
                            {!! actionButton($module, 'export', route($module.'.export'), '', 'tabler-download', 'Export CSV') !!}
                        </div>
                        <!-- ===== actions buttons end =====-->
                    </div>
                </div>
            </div>
            <!-- ========= product summary =============-->
            @php
                $ps = $productListSummary ?? [
                    'total' => 0,
                    'published' => 0,
                    'unpublished' => 0,
                    'total_amount' => 0,
                    'currency' => strtoupper(trim((string) (get_setting('site_currency') ?: ''))) ?: 'USD',
                ];
            @endphp
            <div class="card mb-6 border-top-bottom">
                <div class="card-widget-separator-wrapper">
                  <div class="card-body card-widget-separator">
                    <div class="row gy-4 gy-sm-1">
                      <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-4 pb-sm-0">
                          <div>
                            <h4 class="mb-0">{{ number_format($ps['total']) }}</h4>
                            <p class="mb-0">Total Products</p>
                          </div>
                          <span class="avatar me-sm-6">
                            <span class="avatar-initial bg-label-secondary rounded text-heading">
                              <i class="icon-base ti tabler-package icon-26px text-heading"></i>
                            </span>
                          </span>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-6">
                      </div>
                      <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-4 pb-sm-0">
                          <div>
                            <h4 class="mb-0">{{ number_format($ps['published']) }}</h4>
                            <p class="mb-0">Published</p>
                          </div>
                          <span class="avatar p-2 me-lg-6">
                            <span class="avatar-initial bg-label-secondary rounded"><i class="icon-base ti tabler-circle-check icon-26px text-heading"></i></span>
                          </span>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none">
                      </div>
                      <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start border-end pb-4 pb-sm-0 card-widget-3">
                          <div>
                            <h4 class="mb-0">{{ number_format($ps['unpublished']) }}</h4>
                            <p class="mb-0">Unpublish</p>
                          </div>
                          <span class="avatar p-2 me-sm-6">
                            <span class="avatar-initial bg-label-secondary rounded"><i class="icon-base ti tabler-circle-x icon-26px text-heading"></i></span>
                          </span>
                        </div>
                      </div>
                      <div class="col-sm-6 col-lg-3">
                        <div class="d-flex justify-content-between align-items-start">
                          <div>
                            <h4 class="mb-0">{{ $ps['currency'] }} {{ number_format($ps['total_amount'], 2) }}</h4>
                            <p class="mb-0">Total Amount</p>
                          </div>
                          <span class="avatar p-2">
                            <span class="avatar-initial bg-label-secondary rounded"><i class="icon-base ti tabler-currency-dollar icon-26px text-heading"></i></span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <!-- ========= card =============-->
            <div class="card card-action mb-12 border-top-bottom">
                <div class="card-header border-bottom sticky-element pb-3 pt-3 cardStyling">
                    <i class="icon-base ti tabler-layout-list me-1"></i>
                    <h6 class="card-action-title mb-0 text-capitalize">{{str_replace('-',' ',$title) .' '. 'list'}}</h6>
                    {!! card_action_element() !!}
                </div>
                <div class="collapse show p-5">
                    <form action="{{ route($module.'.delete-all') }}" method="POST" class="deleteAll">
                        <input type="hidden" name="trashed" value="{{$_module}}">
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
                                            'image' => 'Product',
                                            'categories' => 'Categories',
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
                                                                <a href="{{ $data->main_image ? asset('assets/images/products/'.$data->main_image) : '#' }}">
                                                                    <img src="{{ $data->main_image ? asset('assets/images/products/'.$data->main_image) : imageNotFound() }}"
                                                                         alt="{{ $data->title }}"
                                                                         class="rounded-circle">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-column">
                                                            <a href="javascript:" class="text-heading text-truncate">
                                                                <span class="fw-medium">{{ $data->title }}</span>
                                                            </a> <small>{{ Str::words(strip_tags((string) ($data->short_description ?? '')), 10, '...') }}</small>
                                                        </div>
                                                    </div>
                                                @elseif($col === 'categories')
                                                    @forelse($data->categories ?? [] as $cat)
                                                        <span class="badge bg-label-danger me-1">{{ $cat->title }}</span>
                                                    @empty
                                                        <span class="text-muted">—</span>
                                                    @endforelse
                                                @elseif($col === 'regular_price')
                                                   {{strtoupper(get_setting('site_currency'))}} {{ $data->regular_price }}
                                                @elseif($col === 'ordering')
                                                    {{ $data->ordering }}
                                                    {{--<span class="invisible">{{ $data->ordering }}</span>
                                                    <input type="number"
                                                           id="ordering"
                                                           name="ordering"
                                                           data-id="{{ $data->id }}"
                                                           value="{{ $data->ordering }}"
                                                           class="ordering form-control">--}}
                                                @elseif($col === 'status')
                                                    <span id="statusLabel-{{ $data->id }}"
                                                          class="badge {{ in_array($data->status, ['Active', 'Published'], true) ? 'bg-label-success' : 'bg-label-danger' }}">
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
    @include('backend.components.btn_action_script')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
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
                        const imageUrl = data.main_image
                            ? `/assets/images/products/${data.main_image}`
                            : "{{ imageNotFound() }}";

                        // Categories may come as array or comma-separated string.
                        const categoryList = Array.isArray(data.categories)
                            ? data.categories
                            : (typeof data.categories === 'string'
                                ? data.categories.split(',').map(c => c.trim()).filter(Boolean)
                                : []);
                        const categories = categoryList.length
                            ? categoryList.map(cat => `<span class="badge bg-label-danger me-1 mb-1">${cat}</span>`).join('')
                            : '<span class="badge bg-label-secondary">Not Selected</span>';

                        const productTypeList = Array.isArray(data.product_types)
                            ? data.product_types
                            : (typeof data.product_types === 'string'
                                ? data.product_types.split(',').map(t => t.trim()).filter(Boolean)
                                : []);
                        const productTypes = productTypeList.length
                            ? productTypeList.map(t => `<span class="badge bg-label-warning me-1 mb-1">${t}</span>`).join('')
                            : '<span class="badge bg-label-secondary">Not Selected</span>';

                        // Build data rows
                        const rows = `
                                <tr><th>ID</th><td>${data.id ?? '-'}</td></tr>
                                <tr><th>{{_label('regular_price')}}</th><td>${data.currency} ${data.regular_price ?? '-'}</td></tr>
                                <tr><th>{{_label('title')}}</th><td>${data.title ?? '-'}</td></tr>
                                <tr><th>{{_label('friendly_url')}}</th><td>${data.friendly_url ?? '-'}</td></tr>
                                <tr><th>{{_label('categories')}}</th><td>${categories}</td></tr>
                                <tr><th>{{_label('description')}}</th><td>
                                    ${data.short_description ? data.short_description.split(' ').slice(0, 10).join(' ') : '-'}
                                </td></tr>
                                <tr><th>{{_label('brand')}}</th><td>${data.brand ?? '-'}</td></tr>
                                <tr>
                                    <th>{{_label('status')}}</th>
                                    <td>
                                        <span class="badge ${['Active','Published'].includes(data.status || '') ? 'bg-label-success' : 'bg-label-danger'}">
                                            ${data.status ? data.status : '-'}
                                        </span>
                                    </td>
                                </tr>
                                <tr><th>{{_label('stock_status')}}</th><td>${data.stock_status ?? '-'}</td></tr>
                                <tr><th>{{_label('quantity')}}</th><td>${data.quantity ?? '-'}</td></tr>
                                <tr><th>{{_label('product_types')}}</th><td>${productTypes}</td></tr>
                                <tr><th>{{_label('ordering')}}</th><td>${data.ordering ?? '-'}</td></tr>
                                <tr><th>{{_label('created_at')}}</th><td>${data.created_at ?? '-'}</td></tr>
                                <tr><th>{{_label('created_by_name')}}</th><td>${data.created_by_name ?? '-'}</td></tr>
                                <tr>
                                    <th>{{_label('image')}}</th>
                                    <td>
                                        <img src="${imageUrl}" alt="Image" class="img-thumbnail rounded border-1" width="100" />
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
@endpush
