@php
    $p = $product ?? null;
    $galleryBase = 'assets/images/products/gallery/';
@endphp
<div class="tab-pane fade" id="navs-images-gallery" role="tabpanel">
    <div class="row g-6">
        <div class="col-md-11">
            <label class="form-label text-capitalize" for="main_image">{{_label('product_main_image')}} </label>
          <input class="form-control"
                 type="file"
                 name="main_image"
                 id="main_image"
                 accept="image/*">
       </div>
        <div class="col-md-1">
            @if($p && $p->main_image)
            <div class="light-gallery text-center mt-3">
                <a href="{{ asset('assets/images/products/'.$p->main_image) }}">
                    <img class="rounded mt-2 img-fluid border" src="{{ asset('assets/images/products/'.$p->main_image) }}" alt="{{ $p->image_alt }}" title="{{ $p->image_title }}">
                </a>
            </div>
            @endif
       </div>
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="image_alt">{{_label('image_alt')}} </label>
            <input type="text" id="image_alt" name="image_alt" value="{{ old('image_alt', optional($p)->image_alt) }}" class="form-control" placeholder="Enter {{_label('image_alt')}}...">
            {!! error_label('image_alt') !!}
        </div>
        <div class="col-md-6">
            <label class="form-label text-capitalize" for="image_title">{{_label('image_title')}}</label>
            <input type="text" id="image_title" name="image_title" value="{{ old('image_title', optional($p)->image_title) }}" class="form-control" placeholder="Enter {{_label('image_title')}}...">
            {!! error_label('image_title') !!}
        </div>
        <div class="col-md-12">
            <label class="form-label text-capitalize" for="video_lint"> {{_label('video_lint')}} </label>
            <input type="text"
                   id="video_lint"
                   name="video_lint"
                   value="{{ old('video_lint', optional($p)->video_lint) }}"
                   class="form-control"
                   placeholder="Enter {{_label('video_lint')}}...">
            {!! error_label('video_lint') !!}
        </div>
        <div class="col-md-12">
            <label class="form-label text-capitalize">
                {{_label('product_image_gallery')}} <gallery class="text-danger text-lowercase">(upload images; they are saved when you submit the product)</gallery>
            </label>
            <input class="form-control" type="file" name="product_images[]" id="product_images" accept="image/*" multiple>
            {{--<div class="dropzone needsclick" id="dropzone-multi" data-upload-url="{{ route('dropzone.upload') }}">
                <div class="dz-message needsclick">
                    Drop gallery images here or click to upload
                    <span class="note needsclick">(JPEG, PNG, WebP, GIF — max 5MB each)</span>
                </div>
                <div class="fallback">
                    <input name="product_images" type="file" multiple>
                </div>
            </div>--}}
            <div class="mt-5">
                <h6>Product Gallery images</h6>
                <div id="product-gallery-thumbs" class="row g-3 light-gallery"
                     data-gallery-url-prefix="{{ rtrim(asset('assets/images/products/gallery'), '/').'/' }}">
                    @if($p && $p->productImages && $p->productImages->isNotEmpty())
                        @foreach($p->productImages as $g)
                            <div class="col-6 col-md-3 product-gallery-thumb" data-gallery-path="{{ $g->path }}">
                                <div class="position-relative border rounded overflow-hidden bg-label-secondary bg-opacity-10">
                                    <a href="{{ asset($galleryBase.$g->path) }}">
                                        <img class="img-fluid w-100 d-block" style="max-height: 140px; object-fit: cover;" src="{{ asset($galleryBase.$g->path) }}" alt="">
                                    </a>
                                    <button type="button" class="btn btn-sm btn-icon btn-danger position-absolute top-0 end-0 m-1 btn-remove-gallery-thumb" title="Remove from gallery" aria-label="Remove">
                                        <i class="icon-base ti tabler-x"></i>
                                    </button>
                                </div>
                                <input type="hidden" name="gallery_images[]" value="{{ $g->path }}">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@once
    @push('script')
        <script>
            (function () {
                function bindProductImageRemove() {
                    var wrap = document.getElementById('product-gallery-thumbs');
                    if (!wrap || wrap._removeBound) return;
                    wrap._removeBound = true;

                    wrap.addEventListener('click', function (e) {
                        var btn = e.target.closest('.btn-remove-gallery-thumb');
                        if (!btn || !wrap.contains(btn)) return;

                        var col = btn.closest('.product-gallery-thumb');
                        if (!col) return;

                        // Hidden input lives inside the same card; removing the card removes input too.
                        col.remove();
                    });
                }

                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', bindProductImageRemove);
                } else {
                    bindProductImageRemove();
                }
            })();
        </script>
    @endpush
@endonce
