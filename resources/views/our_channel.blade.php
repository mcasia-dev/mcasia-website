@extends('layouts.app')
@section('title', 'McAsia')
@section('content')

@php
    $pageTitle = $data->title ?? 'Our Channel';
    $pageSubtitle = $data->subtitle ?? 'Connecting trusted brands to more Filipino homes and businesses nationwide.';
    $pageDescription = $data->description ?? '';
    $bannerImage = $data?->getFirstMediaUrl('our-channel-banner') ?: asset('images/HOMEPAGE/3.jpg');
    $blocks = collect($data->content_blocks ?? []);
@endphp

<style>
    .channel-shell {
        background:
            radial-gradient(1000px 500px at 90% -10%, rgba(220, 38, 38, 0.08), transparent 60%),
            radial-gradient(900px 500px at -10% 50%, rgba(239, 68, 68, 0.08), transparent 60%),
            linear-gradient(180deg, #f8fafc 0%, #f3f4f6 100%);
    }

    .channel-banner-frame {
        box-shadow: 0 24px 60px rgba(15, 23, 42, 0.12);
    }

    .channel-banner-frame::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(15, 23, 42, 0.08) 0%, rgba(15, 23, 42, 0.18) 100%);
        pointer-events: none;
    }

    .channel-section-card {
        box-shadow: 0 14px 36px rgba(15, 23, 42, 0.08);
    }

    .channel-title-block {
        position: relative;
        padding-top: 1.75rem;
    }

    .channel-title-block::before {
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

{{--<div class="h-26"></div>--}}

<div class="relative overflow-hidden min-h-screen channel-shell">
    <section class="px-4 pt-6 sm:px-6 sm:pt-8 lg:pt-10">
        <div class="max-w-6xl mx-auto">
            <div class="channel-banner-frame relative overflow-hidden rounded-[28px] border border-white/70 bg-white">
                <div class="h-[28vh] min-h-[240px] sm:h-[34vh] md:h-[380px]">
                    <img src="{{ $bannerImage }}"
                         alt="{{ $pageTitle }}"
                         class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-5xl mx-auto px-4 sm:px-6 py-8 sm:py-10 lg:py-12 space-y-6 sm:space-y-8">
        <article class="channel-section-card fade-section rounded-3xl border border-slate-200/80 bg-white p-6 sm:p-8 lg:p-10">
            <div class="max-w-4xl">
                <div class="channel-title-block">
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
                            At <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span>, we take pride in building strong and lasting partnerships that bring high-quality food products closer to consumers.
                            Our distribution channels are strategically developed to ensure efficiency, consistency, and excellence from sourcing premium goods to delivering them to retail shelves, foodservice establishments, and institutional clients nationwide.
                        </p>
                        <p>
                            We work hand in hand with leading supermarkets, convenience stores, wholesalers, and food service providers to make our products accessible across the Philippines.
                            Through a well-established logistics and supply network, we maintain the integrity and freshness of every product we deliver.
                        </p>
                        <p>
                            Our goal is not only to distribute but to connect brands with markets and consumers with quality, ensuring that every partner, from manufacturer to retailer, shares in the success of sustainable growth and mutual trust.
                        </p>
                        <p>
                            At McAsia, our channel is more than a route. It is a partnership built on reliability, innovation, and a shared passion for food excellence.
                        </p>
                    </div>
                @endif
            </div>
        </article>

        @foreach($blocks as $block)
            @php $blockData = $block['data'] ?? []; @endphp

            @if(($block['type'] ?? '') === 'paragraph')
                <article class="channel-section-card fade-section rounded-3xl border border-slate-200/80 bg-white p-6 sm:p-8 lg:p-10">
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
                <article class="channel-section-card fade-section overflow-hidden rounded-3xl border border-slate-200/80 bg-white">
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
