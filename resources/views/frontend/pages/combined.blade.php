@extends('frontend.layouts.master')
@section('content')
    <div class="cms-page">
        @if($page->show_title == '1' && filled($page->page_title))
            <section class="flex justify-center px-4 py-8 md:py-10">
                <div class="container mx-auto">
                    <h1 class="text-4xl font-semibold capitalize">{{ $page->page_title }}</h1>
                    @if(filled($page->sub_title))
                        <p class="mt-3 text-lg text-mst-gray">{{ $page->sub_title }}</p>
                    @endif
                </div>
            </section>
        @endif

        @if(!empty($pageImageUrl))
            <section class="flex justify-center px-4 pb-6">
                <div class="container mx-auto">
                    <img src="{{ $pageImageUrl }}"
                         alt="{{ $page->image_alt ?? $page->page_title }}"
                         title="{{ $page->image_title ?? $page->page_title }}"
                         class="mx-auto max-h-[28rem] w-full max-w-4xl rounded-xl object-cover">
                </div>
            </section>
        @endif

        @include('frontend.pages.partials.cms-content')
    </div>

    @if(!empty($includeFile))
        <div class="cms-page__include">
            {!! shortcode_include_render($includeFile, [
                'page'    => $page,
                'cmsPage' => $page,
            ]) !!}
        </div>
    @endif
@endsection
