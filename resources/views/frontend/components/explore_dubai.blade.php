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

                <h2 class="font-heading text-2xl font-semibold italic leading-tight tracking-tight text-mst-gray">
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
                    $mainText  = implode(' ', array_slice($words, 0, -2));
                    $spanText  = implode(' ', array_slice($words, -2));
                @endphp
                <h2 class="font-heading text-2xl font-semibold italic leading-tight tracking-tight text-mst-gray">
                    <span>{{ $mainText }}  </span><span class="text-mst">{{ $spanText }}</span>
                </h2>
            @else
                <h2 class="font-heading text-2xl font-semibold italic leading-tight tracking-tight text-mst-gray">
                    <span class="text-mst-gray">Popular </span><span class="text-mst">Searches</span>
                </h2>
            @endif
            @if(filled($popularSearch->description))
                <p class="font-body mt-2">{{ $popularSearch->description }}</p>
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
{{--
@php
    $slug = request()->segment(1);
@endphp
<section class="py-14">
    <div class="container mx-auto">
        <h2 class="font-heading text-2xl font-semibold italic leading-tight tracking-tight text-mst-gray">
            @if($slug == '')
                <span class="text-mst-gray">Explore Dubai With Us   </span>
                <span class="text-mst">– Online Travel Agency</span>
            @elseif($slug == 'all-categories')
                <span class="text-mst-gray">Explore Dubai With Us   </span>
                <span class="text-mst">– Online Travel Agency</span>
            @elseif(in_array($slug ?? '', ['disert-safari-tour', 'desert-safari-tours'], true))
                <span class="text-mst-gray">Desert Safari </span><span class="text-mst"> Dubai Deals</span>
            @endif
        </h2>
        <div class="font-body text-center md:text-left text-sm bg-[#FAF7F2] mt-6 p-5 rounded-lg border
        border-[#BA9B31]/40">
            @if($slug == '')
                <p>It’s everyone’s dream to explore the world and enjoy its beauty. Saifco Travel & Tourism LLC is
                   making that possible and is also offering affordable Dubai tour packages. We are not only letting you
                   explore the UAE but are also arranging tours out of the country. And you can easily find a travel
                   agency near me like ours. All of our Dubai tour packages are priced relatively lower than other
                   companies. Also, we make it easier and more convenient for you to go on any tour whether in the
                   country or internationally. Moreover, you can also roam inside Dubai, Sharjah, and Abu Dhabi on our
                   other inbound tours. Rent a jet ski, Go for the Dubai Desert Safari, Eat a delicious Dhow cruise
                   dinner, or opt for luxury yacht cruising.</p>
            @elseif($slug == 'all-categories')
                <p>It’s everyone’s dream to explore the world and enjoy its beauty. Saifco Travel & Tourism LLC is
                   making that possible and is also offering affordable Dubai tour packages. We are not only letting you
                   explore the UAE but are also arranging tours out of the country. And you can easily find a travel
                   agency near me like ours. All of our Dubai tour packages are priced relatively lower than other
                   companies. Also, we make it easier and more convenient for you to go on any tour whether in the
                   country or internationally. Moreover, you can also roam inside Dubai, Sharjah, and Abu Dhabi on our
                   other inbound tours. Rent a jet ski, Go for the Dubai Desert Safari, Eat a delicious Dhow cruise
                   dinner, or opt for luxury yacht cruising.</p>
            @elseif(in_array($slug ?? '', ['disert-safari-tour', 'desert-safari-tours'], true))
                <p>All You Need to Know About Desert Safari in Dubai </p>
                <p>Have you ever been captivated by the breathtaking scenes of a Dubai Desert Safari in movies or music
                   videos? Ever dreamed of feeling the golden sand slip through your fingers, surrounded by endless
                   dunes that stretch as far as the eye can see? There’s a reason why the Desert Safari in Dubai is one
                   of the most talked-about experiences among tourists—it’s a thrilling adventure that leaves an
                   unforgettable mark on every traveler.
                </p>
                <p>If you’re planning a trip to Dubai, make sure the Dubai Desert Safari is at the top of your
                   itinerary. This iconic tour offers a perfect mix of excitement, culture, and natural beauty, making
                   it a must-do activity. Whether you’re looking for heart-racing dune bashing, serene camel rides, or
                   mesmerizing desert sunsets, a desert safari tour in Dubai delivers it all—and more.</p>
            @endif
        </div>
    </div>
    --}}
{{--==================--}}{{--

    <div class="container mx-auto mt-10">
        <h2 class="font-heading text-2xl font-semibold italic leading-tight tracking-tight text-mst-gray">
            <span class="text-mst-gray">Popular </span><span class="text-mst">Searches</span>
        </h2>
        <p class="font-body mt-2">
            Quick access to what travelers explore most—making it easier to find the right experience without the
            search</p>
        <ul class="flex flex-wrap items-center justify-center gap-3 font-body text-sm
                   bg-[#FAF7F2] mt-6 p-5 rounded-lg border border-[#BA9B31]/40">
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Yacht in Dubai Marina
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Yacht Rental Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Dune Bashing Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Quad Biking Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                VR5 Tasheel Locations
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Desert Safari in Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Ski Dubai Tickets Offer
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Legoland Dubai Tickets
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                The Frame Dubai Tickets
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Umrah By Bus
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Umrah Services Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Theme Park Tickets
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Safari Tour Dubai
            </li>
            <li class="bg-mst rounded-full py-2 px-4 text-white italic font-heading cursor-pointer
            hover:bg-gradient-to-r hover:from-[#BA9B31] to-[#74611E] transition duration-300">
                Speed Boat Tour
            </li>
        </ul>
    </div>
</section>
--}}
