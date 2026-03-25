@extends('layouts.app')
@section('title', 'McAsia - About Us')
@section('content')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Marcellus&family=Work+Sans:wght@300;400;500;600&display=swap');

        :root {
            --ink: #141414;
            --ivory: #f8f7f2;
            --accent: #0f766e;
        }

        body.fade-in {
            opacity: 1;
        }

        .about-page {
            font-family: 'Onest', sans-serif;
            background:
            radial-gradient(1000px 500px at 90% -10%, rgba(220, 38, 38, 0.08), transparent 60%),
            radial-gradient(900px 500px at -10% 50%, rgba(239, 68, 68, 0.08), transparent 60%),
            linear-gradient(180deg, #f8fafc 0%, #f3f4f6 100%);
            color: var(--ink);
        }

        .about-banner-frame {
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.12);
        }

        .about-banner-frame::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(15, 23, 42, 0.08) 0%, rgba(15, 23, 42, 0.18) 100%);
            pointer-events: none;
        }

        .about-intro-card {
            box-shadow: 0 14px 36px rgba(15, 23, 42, 0.08);
        }

        .about-title-block {
            position: relative;
            padding-top: 1.75rem;
        }

        .about-title-block::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4.5rem;
            height: 0.28rem;
            border-radius: 9999px;
            background: linear-gradient(90deg, #b91c1c 0%, #ef4444 100%);
        }

        .timeline {
            position: relative;
            padding-left: 1.75rem;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, var(--accent), rgba(15, 118, 110, 0.3));
        }

        .timeline-dot {
            position: absolute;
            left: -6px;
            top: 6px;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 0 6px rgba(15, 118, 110, 0.15);
        }

        .fade-section {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .story-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .story-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
        }

        .timeline-showcase {
            position: relative;
        }

        .timeline-showcase::before {
            content: '';
            position: absolute;
            left: 1rem;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, rgba(15, 118, 110, 0.2), var(--accent), rgba(245, 158, 11, 0.35));
        }

        .timeline-item {
            position: relative;
            padding-left: 3.25rem;
        }

        .timeline-pin {
            position: absolute;
            left: 0.34rem;
            top: 1.75rem;
            width: 1.35rem;
            height: 1.35rem;
            border-radius: 50%;
            background: linear-gradient(135deg, #0f766e, #f59e0b);
            box-shadow: 0 0 0 0.45rem rgba(15, 118, 110, 0.12);
        }

        .timeline-panel {
            position: relative;
            padding: 1.5rem 1.5rem 1.4rem;
            border-radius: 1.5rem;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(15, 23, 42, 0.07);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
        }

        .timeline-panel::before {
            content: '';
            position: absolute;
            left: -0.8rem;
            top: 1.9rem;
            width: 1rem;
            height: 1rem;
            background: rgba(255, 255, 255, 0.92);
            border-left: 1px solid rgba(15, 23, 42, 0.07);
            border-bottom: 1px solid rgba(15, 23, 42, 0.07);
            transform: rotate(45deg);
        }

        .timeline-chip {
            display: inline-flex;
            align-items: center;
            margin-bottom: 0.85rem;
            padding: 0.4rem 0.75rem;
            border-radius: 999px;
            background: rgba(15, 118, 110, 0.08);
            color: #0f766e;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        .timeline-heading {
            font-family: 'Onest', serif;
            font-size: clamp(1.55rem, 2.5vw, 2.1rem);
            line-height: 1.15;
            color: #111827;
            margin-bottom: 1rem;
        }

        .timeline-body {
            color: #4b5563;
            text-align: justify;
            text-justify: inter-word;
        }

        .timeline-body p,
        .timeline-body ul,
        .timeline-body ol {
            margin: 0 0 1rem;
            line-height: 1.9;
            text-align: justify;
            text-justify: inter-word;
        }

        .timeline-body ul,
        .timeline-body ol {
            padding-left: 1.25rem;
        }

        .timeline-body li + li {
            margin-top: 0.45rem;
        }

        .timeline-body strong {
            color: #111827;
        }

        @media (min-width: 1024px) {
            .timeline-showcase::before {
                left: 50%;
                transform: translateX(-50%);
            }

            .timeline-item {
                width: calc(50% - 2rem);
                padding-left: 0;
            }

            .timeline-item:nth-child(odd) {
                margin-right: auto;
            }

            .timeline-item:nth-child(even) {
                margin-left: auto;
            }

            .timeline-item:nth-child(odd) .timeline-pin {
                left: auto;
                right: -2.7rem;
            }

            .timeline-item:nth-child(even) .timeline-pin {
                left: -2.7rem;
            }

            .timeline-item:nth-child(odd) .timeline-panel::before {
                left: auto;
                right: -0.55rem;
                border-left: none;
                border-right: 1px solid rgba(15, 23, 42, 0.07);
            }
        }
    </style>

    @php
        $timelineEntries = [];

        foreach (($ourStory?->timeline_items ?? []) as $item) {
            if (blank($item['year'] ?? null) && blank($item['title'] ?? null) && blank($item['body'] ?? null)) {
                continue;
            }

            $timelineEntries[] = [
                'year' => $item['year'] ?? 'Story',
                'title' => $item['title'] ?? 'Our Journey',
                'body' => $item['body'] ?? '',
            ];
        }

        $contentHtml = $ourStory?->content ?? '';

        if (empty($timelineEntries) && !empty($contentHtml)) {
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML('<?xml encoding="utf-8" ?><div id="timeline-root">' . $contentHtml . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_clear_errors();

            $root = $dom->getElementById('timeline-root');
            $currentEntry = null;

            if ($root) {
                foreach ($root->childNodes as $node) {
                    if (!in_array($node->nodeType, [XML_ELEMENT_NODE, XML_TEXT_NODE], true)) {
                        continue;
                    }

                    if ($node->nodeType === XML_TEXT_NODE && trim($node->textContent) === '') {
                        continue;
                    }

                    $nodeName = strtolower($node->nodeName);

                    if (in_array($nodeName, ['h2', 'h3'], true)) {
                        if ($currentEntry) {
                            $timelineEntries[] = $currentEntry;
                        }

                        $title = trim($node->textContent);
                        preg_match('/^(Today|\d{4})/i', $title, $matches);

                        $currentEntry = [
                            'year' => $matches[1] ?? 'Story',
                            'title' => $title,
                            'body' => '',
                        ];

                        continue;
                    }

                    if (!$currentEntry) {
                        $currentEntry = [
                            'year' => 'Story',
                            'title' => 'Our Journey',
                            'body' => '',
                        ];
                    }

                    $currentEntry['body'] .= $dom->saveHTML($node);
                }

                if ($currentEntry) {
                    $timelineEntries[] = $currentEntry;
                }
            }
        }
    @endphp

    <main class="about-page">
        <section class="px-4 pt-6 sm:px-6 sm:pt-8 lg:pt-10">
            <div class="max-w-6xl mx-auto">
                <div class="about-banner-frame relative overflow-hidden rounded-[28px] border border-white/70 bg-white">
                    <div class="h-[28vh] min-h-[240px] sm:h-[34vh] md:h-[380px]">
                        <img src="{{ $ourStory->media[0]->original_url ?? asset('images/HOMEPAGE/1.jpg') }}" alt="McAsia Background"
                             class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </section>

        <section class="max-w-5xl mx-auto px-4 sm:px-6 py-8 sm:py-10 lg:py-12 space-y-6 sm:space-y-8">
            <article class="about-intro-card fade-section rounded-3xl border border-slate-200/80 bg-white p-6 sm:p-8 lg:p-10">
                <div class="max-w-4xl">
                    <div class="about-title-block">
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight leading-tight text-slate-900">
                            {{ $ourStory->title ?? 'Our Story' }}
                        </h1>
                    </div>

                    <p class="mt-5 max-w-3xl text-lg sm:text-xl lg:text-2xl font-semibold leading-snug text-slate-800">
                        {{ $ourStory?->subtitle ?? 'Bridging the Philippines with the authentic flavors of Asia since 2012' }}
                    </p>

                    <div class="mt-6 border-t border-slate-200 pt-6 text-gray-600 leading-relaxed text-sm md:text-lg lg:text-xl text-justify">
                        {!! $ourStory->description ?? '<strong>McAsia Foodtrade Corporation</strong>, established in March 2012, began with a clear vision to bridge the Philippines with the rich flavors of Asia by providing authentic, high-quality food products to businesses and consumers nationwide. Operating under the trading name McAsia, the company set out to become a trusted source of Asian culinary essentials in the country.' !!}
                    </div>
                </div>
            </article>
        </section>

        <section class="py-12 sm:py-16 lg:py-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6">
                <div class="timeline-showcase space-y-8 sm:space-y-10">
                    @forelse ($timelineEntries as $entry)
                        <article class="timeline-item fade-section">
                            <span class="timeline-pin" aria-hidden="true"></span>
                            <div class="timeline-panel story-card">
                                <span class="timeline-chip">{{ $entry['year'] }}</span>
                                <h3 class="timeline-heading">{{ $entry['title'] }}</h3>
                                <div class="timeline-body text-sm md:text-lg prose">
                                    {!! $entry['body'] !!}
                                </div>
                            </div>
                        </article>
                    @empty
                    @endforelse
                </div>
            </div>
        </section>

        <section class="py-12 sm:py-16 lg:py-20 bg-gray-50/90">
            <div class="max-w-6xl mx-auto px-4 sm:px-6">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center text-gray-900 mb-8 sm:mb-12 fade-section">
                    Our Purpose & Values
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                    <article
                        class="fade-section story-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                        <div class="h-44 sm:h-48 overflow-hidden">
                            <img src="{{ asset('images/about_us/1.jpg') }}" alt="Mission"
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="p-5 sm:p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-bullseye text-teal-600"></i>
                                Mission
                            </h3>
                            <p class="text-gray-600 leading-relaxed text-sm md:text-base text-justify">
                                We are dedicated to delivering authentic Asian products that satisfy and elevate every
                                Filipino's Asian cravings with uncompromising quality.
                            </p>
                        </div>
                    </article>

                    <article
                        class="fade-section story-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                        <div class="h-44 sm:h-48 overflow-hidden">
                            <img src="{{ asset('images/about_us/2.jpg') }}" alt="Vision"
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="p-5 sm:p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-eye text-amber-500"></i>
                                Vision
                            </h3>
                            <p class="text-gray-600 leading-relaxed text-sm md:text-base text-justify">
                                To be the leading provider of Asian consumer products, offering authentic taste that
                                uncovers the heart of Asian flavors and beyond.
                            </p>
                        </div>
                    </article>

                    <article
                        class="fade-section story-card bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100">
                        <div class="h-44 sm:h-48 overflow-hidden">
                            <img src="{{ asset('images/about_us/3.jpg') }}" alt="Core Values"
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="p-5 sm:p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3 flex items-center gap-2">
                                <i class="fa-solid fa-gem text-teal-600"></i>
                                Core Values
                            </h3>
                            <ul class="space-y-2 text-gray-600 text-sm md:text-base text-justify">
                                <li class="flex items-start gap-2"><i
                                        class="fa-solid fa-check text-teal-600 mt-1"></i><span>Excellence in everything we
                                        do</span></li>
                                <li class="flex items-start gap-2"><i
                                        class="fa-solid fa-check text-teal-600 mt-1"></i><span>Customer Commitment</span>
                                </li>
                                <li class="flex items-start gap-2"><i
                                        class="fa-solid fa-check text-teal-600 mt-1"></i><span>Integrity in all
                                        dealings</span></li>
                                <li class="flex items-start gap-2"><i
                                        class="fa-solid fa-check text-teal-600 mt-1"></i><span>Teamwork and
                                        collaboration</span></li>
                                <li class="flex items-start gap-2"><i
                                        class="fa-solid fa-check text-teal-600 mt-1"></i><span>Sustainable practices</span>
                                </li>
                            </ul>
                        </div>
                    </article>
                </div>

                <div class="text-center pt-8 sm:pt-4 fade-section">
                    <a href="#" onclick="history.back(); return false;"
                       class="inline-flex items-center gap-2 rounded-full border border-red-200 bg-white px-5 py-2.5 text-sm font-semibold text-red-700 shadow-sm hover:bg-red-50 transition-colors">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Back</span>
                    </a>
                </div>
            </div>
        </section>


        @include('components.footer')
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.AOS) {
                AOS.init({
                    once: true,
                    duration: 900,
                    easing: 'ease-in-out',
                });
            }
        });
    </script>

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
@endsection
