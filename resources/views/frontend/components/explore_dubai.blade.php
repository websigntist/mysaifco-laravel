@php
    $explore = $explore ?? null;
    $popularSearch = $popularSearch ?? null;
    $popularSearchItems = $popularSearchItems ?? [];
@endphp
<section class="py-14">

    @if($explore && (filled($explore->title) || filled($explore->description)))
        <div class="container mx-auto">
            @if(filled($explore->title))
                @php
                    $words     = explode(' ', $explore->title);
                    $mainText  = implode(' ', array_slice($words, 0, -2)); // all except last 2
                    $spanText  = implode(' ', array_slice($words, -2));    // last 2 words
                @endphp

                <h2 class="text-left font-heading text-2xl font-semibold italic leading-tight tracking-tight text-mst-gray">
                    <span>{{ $mainText }}  </span><span class="text-mst">{{ $spanText }}</span>
                </h2>
            @endif
            @if(filled($explore->description))
                <div class="font-body text-center md:text-left text-sm bg-[#FAF7F2] mt-6 p-5 rounded-lg border border-[#BA9B31]/40">
                    {!! $explore->description !!}
                </div>
            @endif
        </div>
    @endif

    @if($popularSearch && (filled($popularSearch->title) || filled($popularSearch->description) || count($popularSearchItems) > 0))
        <div class="container mx-auto mt-10">
            @if(filled($popularSearch->title))
                @php
                    $words     = explode(' ', $popularSearch->title);
                    $mainText  = implode(' ', array_slice($words, 0, -1));
                    $spanText  = implode(' ', array_slice($words, -1));
                @endphp
                <h2 class="text-left font-heading text-2xl font-semibold italic leading-tight tracking-tight text-mst-gray">
                    <span>{{ $mainText }}  </span><span class="text-mst">{{ $spanText }}</span>
                </h2>
            @else
                <h2 class="text-left font-heading text-2xl font-semibold italic leading-tight tracking-tight text-mst-gray">
                    <span class="text-mst-gray">Popular </span><span class="text-mst">Searches</span>
                </h2>
            @endif
            @if(filled($popularSearch->description))
                <p class="text-left font-body mt-2">{{ $popularSearch->description }}</p>
            @endif
            @if(count($popularSearchItems) > 0)
                <ul class="flex flex-wrap items-center justify-center gap-3 font-body text-sm
                           bg-[#FAF7F2] mt-6 p-5 rounded-lg border border-[#BA9B31]/40">
                    @foreach($popularSearchItems as $label)
                        <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
                            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                            {{ $label }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif
</section>
