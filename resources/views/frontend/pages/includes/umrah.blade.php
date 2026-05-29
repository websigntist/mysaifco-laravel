<section class="flex justify-center items-center py-8 px-4">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-[2fr_1fr]">
            <div class="">
                @php
                    $page_title = "Umrah Travel Agency";
                        $words    = explode(' ', $page_title);
                        $count    = count($words);
                        $spanN    = $count >= 3 ? 2 : 1;  // 3+ words = last 2, 2 words = last 1
                        $mainText = implode(' ', array_slice($words, 0, -$spanN));
                        $spanText = implode(' ', array_slice($words, -$spanN));
                    @endphp

                    <h1 class="text-left">
                        <span>{{ $mainText }} </span><span class="text-mst">{{ $spanText }}</span>
                    </h1>

                <p class="text-left mt-4">Get everything on a single call with Umrah travel agency. Every Muslim wishes
                                          to visit Makkah and Madina at least once in his/her life to perform Umrah.
                                          Keeping this in view, Our main goal is to assist each and every pilgrim to
                                          have a comfortable, safe, and trouble-free journey to perform Umrah from UAE
                                          and UK. </p>
            </div>
            <div class="flex items-center justify-end">
                <img src="{{asset('assets/images/umrah/umrah-2.webp')}}" alt="umrah">
            </div>
        </div>
    </div>
</section>
