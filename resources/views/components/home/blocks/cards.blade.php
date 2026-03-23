@php
    $items = collect($block['data']['items'] ?? []);
    $gridColumns = (int) ($block['data']['grid_columns'] ?? 3);
    $gridColumns = max(1, min(4, $gridColumns));

    $gridClass = match ($gridColumns) {
        1 => 'grid-cols-1',
        2 => 'grid-cols-1 sm:grid-cols-2',
        4 => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-4',
        default => 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3',
    };
@endphp

<section class="py-10 sm:py-14 lg:py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-12">
            <div class="mt-4 flex items-center justify-center gap-2">
                <div class="w-16 h-1 bg-red-500 rounded-full"></div>
                <div class="w-4 h-4 bg-red-600 rounded-full"></div>
                <div class="w-16 h-1 bg-red-500 rounded-full"></div>
            </div>
        </div>

        @if(!empty($block['data']['title']))
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6 sm:mb-8">
                {{ $block['data']['title'] }}
            </h2>
        @endif

        <div class="card_display grid {{ $gridClass }} gap-6">
            @foreach($items as $item)
                @php
                    $cardImageRaw = $item['image'] ?? null;
                    $cardImages = collect(is_array($cardImageRaw) ? $cardImageRaw : array_filter([$cardImageRaw]))
                        ->filter()
                        ->map(fn ($path) => asset('storage/' . $path))
                        ->values();
                    $buttonLabel = trim((string) ($item['button_label'] ?? ''));
                    $buttonUrl = trim((string) ($item['button_url'] ?? $item['button_link'] ?? ''));
                @endphp

                <article class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                    @if($cardImages->isNotEmpty())
                        <div class="relative overflow-hidden h-48 md:h-56"
                             x-data="{ index: 0, images: @js($cardImages) }"
                             x-init="if (images.length > 1) { setInterval(() => { index = (index + 1) % images.length; }, 4200); }">
                            <template x-for="(image, imageIndex) in images" :key="imageIndex">
                                <img :src="image"
                                     :alt="'{{ $item['title'] ?? 'Card image' }}'"
                                     :class="index === imageIndex ? 'opacity-100 z-10' : 'opacity-0 z-0'"
                                     class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out transition-transform group-hover:scale-110">
                            </template>
                        </div>
                    @endif

                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-red-600 transition-colors duration-300">
                            {{ $item['title'] ?? '' }}
                        </h3>

                        @if(!empty($item['description']))
                            <p class="text-gray-600 text-sm mb-4 leading-relaxed">{{ $item['description'] }}</p>
                        @endif

                        @if($buttonLabel !== '')
                            <a href="{{ $buttonUrl !== '' ? $buttonUrl : '#' }}"
                               class="inline-flex items-center gap-2 text-red-600 font-semibold hover:text-red-700 transition-all duration-300 group/link">
                                {{ $buttonLabel }}
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke-width="2"
                                     stroke="currentColor"
                                     class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform duration-300">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
