@props(['section' => []])

@php
    use Illuminate\Support\Facades\Storage;

    $fallbackCards = [
        [
            'title' => 'About Us',
            'description' => 'We source and import a diverse selection of authentic Asian food products from countries such as Japan, China, Thailand, Malaysia, Indonesia, Taiwan, and more.',
            'image' => asset('images/HOMEPAGE/1.jpg'),
            'button_label' => 'Learn More',
            'button_url' => '/our-story',
        ],
        [
            'title' => 'Our Impact',
            'description' => 'For years, we have served as a reliable bridge between world-class brands and Filipino consumers, ensuring access to safe, high-quality food and beverage products that enrich everyday life.',
            'image' => asset('images/Everyday Moments/2.png'),
            'button_label' => 'Learn More',
            'button_url' => '/our_impact',
        ],
        [
            'title' => 'Our Channel',
            'description' => 'We take pride in building strong and lasting partnerships that bring high-quality food products closer to consumers. Our distribution channels are strategically developed to ensure efficiency, consistency, and excellence nationwide.',
            'image' => asset('images/home/asian-cravings/our-channel-tile.jpg'),
            'button_label' => 'Learn More',
            'button_url' => '/our_channel',
        ],
        [
            'title' => 'Reach Us',
            'description' => 'We believe that open communication is key to lasting partnerships. Our dedicated representatives are here to provide support, answer your questions, and explore opportunities that align with your business needs.',
            'image' => asset('images/HOMEPAGE/4.jpg'),
            'button_label' => 'Learn More',
            'button_url' => '/reach-us',
        ],
    ];

    $cards = collect(data_get($section, 'items', []))
        ->values()
        ->pad(4, [])
        ->take(4)
        ->map(function ($item, $index) use ($fallbackCards) {
            $fallback = $fallbackCards[$index];

            return [
                'title' => $item['title'] ?? $fallback['title'],
                'description' => $item['description'] ?? $fallback['description'],
                'image' => filled($item['image'] ?? null) ? Storage::disk('public')->url($item['image']) : $fallback['image'],
                'button_label' => $item['button_label'] ?? $fallback['button_label'],
                'button_url' => $item['button_url'] ?? $fallback['button_url'],
            ];
        });
@endphp

<section class="relative w-full overflow-hidden bg-gradient-to-b from-gray-50 to-gray-100 py-12 md:pb-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <div class="mt-4 flex items-center justify-center gap-2">
                <div class="w-16 h-1 bg-red-500 rounded-full"></div>
                <div class="w-4 h-4 bg-red-600 rounded-full"></div>
                <div class="w-16 h-1 bg-red-500 rounded-full"></div>
            </div>
        </div>

        <div class="card_display grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($cards as $card)
                <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ $loop->index * 100 }}"
                     class="group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="relative overflow-hidden">
                        <img
                            src="{{ $card['image'] }}"
                            alt="{{ $card['title'] }}"
                            title="{{ $card['title'] }}"
                            loading="lazy"
                            decoding="async"
                            fetchpriority="high"
                            class="w-full h-48 md:h-56 object-cover transition-transform duration-500 group-hover:scale-110">
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-red-600 transition-colors duration-300">
                            {{ $card['title'] }}
                        </h3>
                        <div class="text-gray-600 text-sm mb-4 leading-relaxed text-justify font-onest">
                            {!! str($card['description'])->sanitizeHtml() !!}
                        </div>
                        <a
                            href="{{ $card['button_url'] }}"
                            title="{{ $card['button_label'] }}"
                            rel="noopener noreferrer"
                            aria-label="{{ $card['button_label'] }}"
                            class="inline-flex items-center gap-2 text-red-600 font-semibold hover:text-red-700 transition-all duration-300 group/link"
                        >
                            {{ $card['button_label'] }}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor"
                                 class="w-4 h-4 transform group-hover/link:translate-x-1 transition-transform duration-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
