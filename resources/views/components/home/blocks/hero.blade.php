@php
    $backgroundRaw = $block['data']['background_image'] ?? null;
    $heroImages = collect(is_array($backgroundRaw) ? $backgroundRaw : array_filter([$backgroundRaw]))
        ->filter()
        ->map(fn ($path) => asset('storage/' . $path))
        ->values();

    if ($heroImages->isEmpty()) {
        $heroImages = collect([asset('images/HOMEPAGE/1.jpg')]);
    }

    $eyebrow = $block['data']['eyebrow'] ?? 'Our Story';
@endphp

<section class="relative text-white overflow-hidden h-screen"
         x-data="{
            index: 0,
            images: @js($heroImages),
            timer: null,
            init() {
                if (this.images.length > 1) {
                    this.timer = setInterval(() => this.next(), 5000);
                }
            },
            next() {
                this.index = (this.index + 1) % this.images.length;
            },
            goTo(i) {
                this.index = i;
                if (this.timer) clearInterval(this.timer);
                if (this.images.length > 1) {
                    this.timer = setInterval(() => this.next(), 5000);
                }
            }
         }">
    <template x-for="(image, imageIndex) in images" :key="imageIndex">
        <img :src="image" :alt="'{{ $block['data']['heading'] ?? 'Hero' }}'"
             :class="index === imageIndex ? 'opacity-100 z-10' : 'opacity-0 z-0'"
             class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 ease-in-out">
    </template>

    <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/45 to-black/30 z-10"></div>

    <div class="relative z-20 h-full">
        <div class="h-full">
            <div class="max-w-6xl mx-auto h-full px-6 md:px-10">
                <div class="h-full flex items-center">
                    <div class="max-w-2xl">
                        <div class="flex flex-col items-start gap-4">
                            <div class="inline-flex items-center gap-2 text-sm font-semibold uppercase tracking-[0.2em] text-white/80 shine-pill">
                                {{ $eyebrow }}
                            </div>

                            <h1 class="text-white text-5xl md:text-7xl font-extrabold mb-3 md:mb-6 leading-tight shine-text py-2">
                                {{ $block['data']['heading'] ?? '' }}
                            </h1>

                            @if(!empty($block['data']['subheading']))
                                <p class="text-white/90 text-base md:text-lg leading-relaxed max-w-xl">
                                    {{ $block['data']['subheading'] }}
                                </p>
                            @endif

                            @if(!empty($block['data']['button_label']) && !empty($block['data']['button_url']))
                                <a href="{{ $block['data']['button_url'] }}"
                                   class="custom-border bg-red-700 text-white text-sm text-center font-semibold hover:bg-red-500 transition-colors">
                                    {{ $block['data']['button_label'] }}
                                </a>
                            @endif

                            <div class="flex items-center gap-2" aria-label="Banner pagination">
                                <template x-for="(_, dotIndex) in images" :key="dotIndex">
                                    <button type="button"
                                            class="w-4 h-4 rounded-full border-2 border-white/90 transition-colors"
                                            :class="index === dotIndex ? 'bg-white relative' : 'bg-transparent'"
                                            @click="goTo(dotIndex)"
                                            :aria-label="`Go to slide ${dotIndex + 1}`">
                                        <span x-show="index === dotIndex"
                                              class="absolute top-1/2 left-1/2 w-[3px] h-[3px] rounded-full bg-black -translate-x-1/2 -translate-y-1/2"></span>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
