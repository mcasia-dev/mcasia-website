@php
    $imageRaw = $block['data']['image'] ?? null;
    $images = collect(is_array($imageRaw) ? $imageRaw : array_filter([$imageRaw]))
        ->filter()
        ->map(fn ($path) => asset('storage/' . $path))
        ->values();

    if ($images->isEmpty()) {
        $images = collect([asset('images/HOMEPAGE/1.jpg')]);
    }

    $imageDisplay = $block['data']['image_display'] ?? 'carousel';
    $gridColumns = max(2, min(4, (int) ($block['data']['grid_columns'] ?? 2)));
    $gridClass = match ($gridColumns) {
        3 => 'grid-cols-3',
        4 => 'grid-cols-4',
        default => 'grid-cols-2',
    };

    $imagePosition = ($block['data']['image_position'] ?? 'left');
    $isImageLeft = $imagePosition === 'left';
    $imageLabel = $block['data']['image_label'] ?? '';
    $buttonLabel = trim((string) ($block['data']['button_label'] ?? ''));
    $buttonUrl = trim((string) ($block['data']['button_url'] ?? $block['data']['button_link'] ?? ''));
@endphp

<section class="bg-white py-16">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
        <div data-aos="fade-right" data-aos-duration="700"
             class="w-full mx-auto lg:mx-0 {{ $isImageLeft ? 'order-1 lg:order-1' : 'order-2 lg:order-2' }}">
            @if($imageDisplay === 'grid' && $images->count() > 1)
                <div class="grid {{ $gridClass }} gap-3 sm:gap-4">
                    @foreach($images as $image)
                        <div class="relative overflow-hidden rounded-xl shadow-sm border border-gray-100">
                            <img src="{{ $image }}"
                                 alt="{{ $block['data']['title'] ?? 'Section image' }}"
                                 class="w-full h-28 sm:h-32 md:h-36 object-contain">
                        </div>
                    @endforeach
                </div>
            @else
                <div
                    class="relative rounded-2xl overflow-hidden shadow-lg h-[260px] sm:h-[320px] md:h-[340px] lg:h-[440px]"
                    x-data="{ index: 0, images: @js($images) }"
                    x-init="if (images.length > 1) { setInterval(() => { index = (index + 1) % images.length; }, 5000); }">
                    <template x-for="(image, imageIndex) in images" :key="imageIndex">
                        <img :src="image"
                             :alt="'{{ $block['data']['title'] ?? 'Section image' }}'"
                             :class="index === imageIndex ? 'opacity-100 z-10' : 'opacity-0 z-0'"
                             class="absolute inset-0 w-full h-full md:h-[340px] lg:h-[440px] product-hero-fade object-cover transition-opacity duration-1000 ease-in-out">
                    </template>

                    @if(!empty($imageLabel) || $images->count() > 1)
                        <div
                            class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-black/70 to-transparent z-20"></div>
                        <div class="absolute left-6 bottom-6 text-white z-30">
                            @if(!empty($imageLabel))
                                <h3 class="text-3xl font-bold text-white mb-2 leading-tight drop-shadow">{{ $imageLabel }}</h3>
                            @endif
                            @if($images->count() > 1)
                                <div class="flex items-center gap-2" aria-label="Product image pagination">
                                    <template x-for="(_, dotIndex) in images" :key="dotIndex">
                                        <button type="button"
                                                class="w-3.5 h-3.5 rounded-full border-2 border-white/90 transition-colors"
                                                :class="index === dotIndex ? 'bg-white' : 'bg-transparent'"
                                                @click="index = dotIndex"
                                                :aria-label="`Go to slide ${dotIndex + 1}`"></button>
                                    </template>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <div data-aos="fade-left" data-aos-duration="700" data-aos-delay="100"
             class="flex flex-col mt-10 md:mt-0 {{ $isImageLeft ? 'order-2 lg:order-2' : 'order-1 lg:order-1' }}">
            <h2 class="text-3xl sm:text-5xl font-bold text-gray-900 mb-4">
                {{ $block['data']['title'] ?? '' }}
            </h2>

            @if(!empty($block['data']['body']))
                <p class="mb-8 text-justify">
                    {{ $block['data']['body'] }}
                </p>
            @endif

            @if($buttonLabel !== '')
                <div class="w-auto">
                    <a href="{{ $buttonUrl !== '' ? $buttonUrl : '#' }}"
                       class="custom-border inline-flex items-center w-auto justify-center bg-red-700 text-white text-sm px-8 py-3 font-semibold hover:bg-red-500 transition-colors">
                        {{ $buttonLabel }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</section>
