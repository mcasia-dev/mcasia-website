@extends('layouts.app')
@section('title', 'McAsia')
@section('content')

@php
    $pageTitle = $data->title ?? 'Our Impact';
    $pageSubtitle = $data->subtitle ?? 'Building meaningful partnerships and creating lasting value across the food ecosystem.';
    $pageDescription = $data->description ?? '';
    $bannerImage = $data?->getFirstMediaUrl('our-impact-banner') ?: asset('images/Everyday Moments/2.png');
    $blocks = collect($data->content_blocks ?? []);
@endphp

<style>
    .impact-shell {
        background:
            radial-gradient(1000px 500px at 90% -10%, rgba(220, 38, 38, 0.08), transparent 60%),
            radial-gradient(900px 500px at -10% 50%, rgba(239, 68, 68, 0.08), transparent 60%),
            linear-gradient(180deg, #f8fafc 0%, #f3f4f6 100%);
    }

    .impact-banner-frame {
        box-shadow: 0 24px 60px rgba(15, 23, 42, 0.12);
    }

    .impact-banner-frame::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(15, 23, 42, 0.08) 0%, rgba(15, 23, 42, 0.18) 100%);
        pointer-events: none;
    }

    .impact-section-card {
        box-shadow: 0 14px 36px rgba(15, 23, 42, 0.08);
    }

    .impact-title-block {
        position: relative;
        padding-top: 1.75rem;
    }

    .impact-title-block::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 4.5rem;
        height: 0.28rem;
        border-radius: 9999px;
        background: linear-gradient(90deg, #b91c1c 0%, #ef4444 100%);
    }

    body.fade-in {
        opacity: 1;
    }

    .fade-section {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 1s ease-out, transform 1s ease-out;
    }

    .fade-section.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<div class="relative overflow-hidden min-h-screen impact-shell">
    <section class="px-4 pt-6 sm:px-6 sm:pt-8 lg:pt-10">
        <div class="max-w-6xl mx-auto">
            <div class="impact-banner-frame relative overflow-hidden rounded-[28px] border border-white/70 bg-white">
                <div class="h-[28vh] min-h-[240px] sm:h-[34vh] md:h-[380px]">
                    <img src="{{ $bannerImage }}"
                         alt="{{ $pageTitle }}"
                         class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 sm:px-6 py-8 sm:py-10 lg:py-12 space-y-6 sm:space-y-8">
        <article class="impact-section-card fade-section rounded-3xl border border-slate-200/80 bg-white p-6 sm:p-8 lg:p-10">
            <div class="max-w-4xl">
                <div class="impact-title-block">
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight leading-tight text-slate-900">
                        {{ $pageTitle }}
                    </h1>
                </div>

                @if(!empty($pageSubtitle))
                    <p class="mt-5 max-w-3xl text-lg sm:text-xl lg:text-2xl font-semibold leading-snug text-slate-800">
                        {{ $pageSubtitle }}
                    </p>
                @endif

                @if(!empty($pageDescription))
                    <div class="mt-6 border-t border-slate-200 pt-6 text-gray-600 leading-relaxed prose prose-sm sm:prose-base max-w-none">
                        {!! $pageDescription !!}
                    </div>
                @elseif($blocks->isEmpty())
                    <div class="mt-6 border-t border-slate-200 pt-6 space-y-4 text-sm sm:text-base text-gray-600 text-justify leading-relaxed">
                        <p>
                            At <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span>, our impact goes beyond distribution. We connect world-class brands with Filipino consumers through a reliable nationwide network, delivering safe, high-quality food and beverage products that enrich everyday living.
                        </p>
                        <p>
                            Guided by integrity, sustainability, and innovation, we create long-term value for our partners, support local industries, and contribute to economic growth.
                            We measure success not only by performance, but by the lasting relationships we build and the positive impact we create across the food ecosystem.
                        </p>
                    </div>
                @endif
            </div>
        </article>

        @foreach($blocks as $block)
            @php $blockData = $block['data'] ?? []; @endphp

            @if(($block['type'] ?? '') === 'paragraph')
                <article class="impact-section-card fade-section rounded-3xl border border-slate-200/80 bg-white p-6 sm:p-8 lg:p-10">
                    <div class="max-w-4xl space-y-4">
                        @if(!empty($blockData['heading']))
                            <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-gray-900">{{ $blockData['heading'] }}</h2>
                        @endif
                        <div class="text-gray-600 leading-relaxed prose prose-sm sm:prose-base max-w-none">
                            {!! $blockData['body'] ?? '' !!}
                        </div>
                    </div>
                </article>
            @elseif(($block['type'] ?? '') === 'image' && !empty($blockData['image']))
                <article class="impact-section-card fade-section overflow-hidden rounded-3xl border border-slate-200/80 bg-white">
                    <div class="p-3 sm:p-4">
                        <img src="{{ asset('storage/' . $blockData['image']) }}"
                             alt="{{ $blockData['caption'] ?? $pageTitle }}"
                             class="w-full max-h-[620px] rounded-2xl object-cover">
                    </div>
                    @if(!empty($blockData['caption']))
                        <div class="px-5 pb-5 sm:px-6 sm:pb-6">
                            <p class="text-sm text-gray-500">{{ $blockData['caption'] }}</p>
                        </div>
                    @endif
                </article>
            @endif
        @endforeach

        <div class="fade-section pt-2">
            <a href="#"
               onclick="history.back(); return false;"
               class="inline-flex items-center gap-2 rounded-full border border-red-200 bg-white px-5 py-2.5 text-sm font-semibold text-red-700 shadow-sm hover:bg-red-50 transition-colors">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back</span>
            </a>
        </div>
    </section>

    @include('components.footer')
</div>

<script>
    window.addEventListener('load', () => {
        document.body.classList.add('fade-in');
    });

    const fadeSections = document.querySelectorAll('.fade-section');

    const fadeInOnScroll = () => {
        const triggerBottom = window.innerHeight * 0.85;
        fadeSections.forEach(section => {
            const sectionTop = section.getBoundingClientRect().top;
            if (sectionTop < triggerBottom) {
                section.classList.add('visible');
            }
        });
    };

    window.addEventListener('scroll', fadeInOnScroll);
    window.addEventListener('load', fadeInOnScroll);
</script>

<script>
    AOS.init({
        duration: 1000,
        once: true,
    });
</script>

@endsection
