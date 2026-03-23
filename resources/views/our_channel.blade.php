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
            #f8fafc;
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

<div class="h-26"></div>

<div class="relative overflow-hidden min-h-screen channel-shell">
    <section class="relative h-[45vh] sm:h-[55vh] md:h-[560px] overflow-hidden">
        <img src="{{ $bannerImage }}"
             alt="{{ $pageTitle }}"
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/35 to-black/55"></div>

        <div class="relative z-10 h-full flex items-center justify-center text-center px-4 sm:px-6">
            <div class="max-w-3xl">
                <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold text-white">{{ $pageTitle }}</h1>
                @if(!empty($pageSubtitle))
                    <p class="text-white/90 mt-3 text-sm sm:text-base lg:text-lg">
                        {{ $pageSubtitle }}
                    </p>
                @endif
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-10 sm:py-14 lg:py-16 space-y-8 sm:space-y-10">
        <article class="fade-section rounded-2xl border border-slate-200/80 bg-white/90 backdrop-blur-sm p-5 sm:p-7 shadow-sm space-y-5">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $pageTitle }}</h2>

            @if(!empty($pageDescription))
                <div class="text-gray-600 leading-relaxed prose prose-sm sm:prose-base max-w-none">
                    {!! $pageDescription !!}
                </div>
            @elseif($blocks->isEmpty())
                <p class="text-gray-600 leading-relaxed">
                    At <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span>, we take pride in building strong and lasting partnerships that bring high-quality food products closer to consumers.
                    Our distribution channels are strategically developed to ensure efficiency, consistency, and excellence from sourcing premium goods to delivering them to retail shelves, foodservice establishments, and institutional clients nationwide.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    We work hand in hand with leading supermarkets, convenience stores, wholesalers, and food service providers to make our products accessible across the Philippines.
                    Through a well-established logistics and supply network, we maintain the integrity and freshness of every product we deliver.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    Our goal is not only to distribute but to connect brands with markets and consumers with quality, ensuring that every partner, from manufacturer to retailer, shares in the success of sustainable growth and mutual trust.
                </p>
                <p class="text-gray-600 leading-relaxed">
                    At McAsia, our channel is more than a route. It is a partnership built on reliability, innovation, and a shared passion for food excellence.
                </p>
            @endif

            @foreach($blocks as $block)
                @php $blockData = $block['data'] ?? []; @endphp

                @if(($block['type'] ?? '') === 'paragraph')
                    <div class="fade-section space-y-2">
                        @if(!empty($blockData['heading']))
                            <h3 class="text-xl font-semibold text-gray-900">{{ $blockData['heading'] }}</h3>
                        @endif
                        <div class="text-gray-600 leading-relaxed prose prose-sm sm:prose-base max-w-none">
                            {!! $blockData['body'] ?? '' !!}
                        </div>
                    </div>
                @elseif(($block['type'] ?? '') === 'image' && !empty($blockData['image']))
                    <div class="fade-section">
                        <img src="{{ asset('storage/' . $blockData['image']) }}"
                             alt="{{ $blockData['caption'] ?? $pageTitle }}"
                             class="w-full rounded-xl border border-slate-200 shadow-sm">
                        @if(!empty($blockData['caption']))
                            <p class="text-sm text-gray-500 mt-2">{{ $blockData['caption'] }}</p>
                        @endif
                    </div>
                @endif
            @endforeach

            <div class="pt-2">
                <a href="#"
                   onclick="history.back(); return false;"
                   class="inline-flex items-center gap-2 rounded-full border border-red-200 bg-white px-5 py-2.5 text-sm font-semibold text-red-700 hover:bg-red-50 transition-colors">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back</span>
                </a>
            </div>
        </article>
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
