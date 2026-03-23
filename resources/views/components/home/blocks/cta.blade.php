@php
    $theme = $block['data']['theme'] ?? 'red';

    $themeClasses = match ($theme) {
        'dark' => 'bg-gray-900 text-white',
        'light' => 'bg-white text-gray-900 border border-gray-200',
        default => 'bg-red-600 text-white',
    };
@endphp

<section class="py-10 sm:py-14 lg:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="rounded-2xl p-6 sm:p-8 lg:p-10 {{ $themeClasses }}">
            <h2 class="text-2xl sm:text-3xl font-bold">{{ $block['data']['title'] ?? '' }}</h2>

            @if(!empty($block['data']['description']))
                <p class="mt-3 text-sm sm:text-base leading-relaxed {{ $theme === 'light' ? 'text-gray-600' : 'text-white/85' }}">
                    {{ $block['data']['description'] }}
                </p>
            @endif

            @if(!empty($block['data']['button_label']) && !empty($block['data']['button_url']))
                <a href="{{ $block['data']['button_url'] }}"
                   class="inline-flex items-center mt-5 px-5 py-2.5 rounded-lg font-semibold {{ $theme === 'light' ? 'bg-red-600 text-white hover:bg-red-700' : 'bg-white text-gray-900 hover:bg-gray-100' }} transition-colors">
                    {{ $block['data']['button_label'] }}
                </a>
            @endif
        </div>
    </div>
</section>

