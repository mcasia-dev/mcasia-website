@props(['section' => []])

@php
    use Illuminate\Support\Facades\Storage;

    $bannerImage = filled(data_get($section, 'banner_image'))
        ? Storage::disk('public')->url(data_get($section, 'banner_image'))
        : asset('images/home/our-recipe/recipe-banner.png');
    $eyebrow = data_get($section, 'eyebrow', 'Recipes');
    $title = data_get($section, 'title', 'Cook Like A Chef!');
    $description = data_get($section, 'description', "Turn every meal into a moment that brings families together and sparks inspiration in the kitchen. Discover our Asian recipes, crafted with a chef's touch and made to be shared.");
    $buttonLabel = data_get($section, 'button_label', 'View Recipes');
    $buttonUrl = data_get($section, 'button_url', '/recipes');
@endphp

<section class="bg-white ">
    <div class="">
        <div data-aos="fade-up" data-aos-duration="700" class="relative overflow-hidden">
            <img
                src="{{ $bannerImage }}"
                alt="Recipes"
                title="Our Recipes"
                loading="lazy"
                decoding="async"
                fetchpriority="high"
                class="w-full h-[500px] sm:h-[420px] md:h-full object-cover"
            />
            <div class="absolute inset-0 bg-black/20"></div>

            <div data-aos="fade-left" data-aos-duration="700" data-aos-delay="120"
                 class="absolute left-1/2 -translate-x-1/2 sm:left-4 sm:translate-x-0 lg:left-10 bottom-3 sm:bottom-8 md:bottom-36 w-[calc(100%-1.5rem)] max-w-[340px] sm:max-w-sm md:max-w-md bg-white/95 backdrop-blur rounded-[2rem] sm:rounded-4xl items-center p-5 sm:p-8 md:p-10">
                <p class="font-yellowtail text-red-600 text-4xl leading-none mb-2">{{ $eyebrow }}</p>
                <h3 class="text-[2.15rem] sm:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
                    {{ $title }}
                </h3>
                <div class="text-gray-600 font-onest text-sm md:text-base leading-relaxed mb-6 text-justify">
                    {!! str($description)->sanitizeHtml() !!}
                </div>

                <div class="flex justify-center">
                    <a
                        href="{{ $buttonUrl }}"
                        title="{{ $buttonLabel }}"
                        rel="noopener noreferrer"
                        aria-label="{{ $buttonLabel }}"
                        class="custom-border inline-flex items-center justify-center text-sm bg-red-700 text-white px-8 py-3 rounded-full font-semibold hover:bg-red-500 transition-colors"
                    >
                        {{ $buttonLabel }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
