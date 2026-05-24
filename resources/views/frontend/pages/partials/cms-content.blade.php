@if($page->show_title == '1' && filled($page->page_title))
    <section class="flex justify-center py-8 md:py-10">
        <div class="container mx-auto">
            <h1 class="text-4xl font-semibold capitalize">{{ $page->page_title }}</h1>
            @if(filled($page->sub_title))
                <p class="mt-3 text-lg text-mst-gray">{{ $page->sub_title }}</p>
            @endif
        </div>
    </section>
@endif

@if(filled($pageContent ?? null))
    <div class="container mx-auto">
        <div class="cms-page__content">
            {!! $pageContent !!}
        </div>
    </div>
@endif
