@if(filled($pageContent ?? null))
    <div class="container mx-auto">
        <div class="cms-page__content">
            {!! $pageContent !!}
        </div>
    </div>
@endif
