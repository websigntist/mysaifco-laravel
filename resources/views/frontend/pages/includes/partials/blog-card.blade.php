@foreach($blogs as $blog)
    <div class="border border-gray-200 rounded-2xl overflow-hidden flex flex-col h-full">
        <div class="relative w-full h-[200px] overflow-hidden">
            <img src="{{ $blog->imageUrl() }}" alt="{{ $blog->title }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
        </div>
        <div class="p-3 flex flex-col flex-1">
            <h3 class="font-heading font-bold text-xl text-mst-gray mb-3 leading-snug
            hover:text-mst transition-colors duration-200 line-clamp-2">
                <a href="{{ $blog->frontendUrl() }}">{{ $blog->title }}</a>
            </h3>
            <div class="flex items-center gap-4 text-gray-700 text-sm mb-3">
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                    </svg>
                    <span>{{ $blog->created_at?->format('M d, Y') }}</span>
                </div>
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                    </svg>
                    <span>{{ $blog->readingTimeMinutes() }} min read</span>
                </div>
            </div>
            <p class="font-body text-gray-700 text-sm leading-relaxed mb-2 flex-1">
                {{ $blog->excerpt() }}
            </p>
            <div class="mt-auto">
                <a href="{{ $blog->frontendUrl() }}" class="inline-flex items-center gap-1 font-heading italic font-bold text-mst text-sm transition-colors duration-200">
                    <span>Read more</span>
                    <svg class="w-3.5 h-3.5 text-mst" fill="none" stroke="currentColor"
                         stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
@endforeach
