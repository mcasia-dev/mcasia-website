@extends('layouts.app')
@section('title', 'Driven By Innovation')
@section('content')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Marcellus&family=Work+Sans:wght@300;400;500;600;700&display=swap');

        :root {
            --edge-ink: #101828;
            --edge-muted: #475467;
            --edge-line: rgba(16, 24, 40, 0.08);
            --edge-teal: #0f766e;
            --edge-amber: #d97706;
            --edge-shell: #f8f7f2;
        }

        body.fade-in {
            opacity: 1;
        }

        .edge-page {
            font-family: 'Onest', sans-serif;
            color: var(--edge-ink);
            background:
                radial-gradient(1100px 540px at 10% -10%, rgba(15, 118, 110, 0.08), transparent 60%),
                radial-gradient(900px 500px at 95% 15%, rgba(217, 119, 6, 0.08), transparent 55%),
                var(--edge-shell);
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

        .innovation-hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(0, 0, 0, 0.4));
        }

        .content-card {
            border: 1px solid var(--edge-line);
            background: rgba(255, 255, 255, 0.88);
            box-shadow: 0 14px 40px rgba(15, 23, 42, 0.05);
        }

        .edge-prose p,
        .edge-prose ul,
        .edge-prose ol,
        .edge-prose blockquote {
            margin: 0 0 1rem;
            line-height: 1.9;
            color: var(--edge-muted);
        }

        .edge-prose h2,
        .edge-prose h3 {
            color: var(--edge-ink);
            line-height: 1.18;
            margin: 1.75rem 0 0.85rem;
            font-size: clamp(1.3rem, 2vw, 1.8rem);
        }

        .edge-prose strong {
            color: var(--edge-ink);
            font-weight: 600;
        }

        .edge-prose ul,
        .edge-prose ol {
            padding-left: 1.25rem;
        }

        .edge-prose li + li {
            margin-top: 0.35rem;
        }

        .edge-back {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.85rem 1.15rem;
            border-radius: 0.9rem;
            border: 1px solid rgba(15, 23, 42, 0.12);
            color: var(--edge-ink);
            background: rgba(255, 255, 255, 0.78);
            transition: transform 0.25s ease, border-color 0.25s ease, background 0.25s ease;
        }

        .edge-back:hover {
            transform: translateY(-2px);
            border-color: rgba(15, 118, 110, 0.28);
            background: #ffffff;
        }

        @media (max-width: 767px) {
            .content-card {
                border-radius: 1.25rem;
            }
        }
    </style>

    <main class="edge-page w-full overflow-x-hidden">
        <section class="innovation-hero relative h-[36vh] sm:h-[46vh] lg:h-[100vh] overflow-hidden">
            <img src="{{ $ourEdge->media[0]->original_url ?? asset('images/driven_innovation/1.jpg') }}" alt="Driven Innovation"
                 title="Driven Innovation"
                 loading="lazy"
                 decoding="async"
                 fetchpriority="high"
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="relative z-10 h-full flex items-center justify-center text-center px-4 sm:px-6">
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 py-10 sm:py-14 lg:py-16 space-y-6 sm:space-y-8">
            <article class="content-card rounded-2xl p-6 sm:p-8 space-y-4">
                <h1 class="text-3xl sm:text-4xl text-gray-900">{{ $ourEdge->title ?? '' }}</h1>
                <div class="edge-prose text-sm sm:text-base text-justify">
                    {!! $ourEdge->description ?? '' !!}
                </div>
            </article>

            <article class="fade-section content-card rounded-2xl p-6 sm:p-8">
                <div class="edge-prose text-sm sm:text-base text-justify">
                    {!! $ourEdge->content ?? '' !!}
                </div>
            </article>

            <div class="fade-section mt-8">
                <a href="#"
                   title="Go back to the previous page"
                   rel="noopener noreferrer"
                   aria-label="Go back to the previous page"
                   onclick="history.back(); return false;"
                   class="edge-back">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back</span>
                </a>
            </div>
        </section>

        <x-featured-brands-carousel title="Featured Brands" />

        @include('components.footer')
    </main>

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

        if (window.AOS) {
            AOS.init({
                duration: 1000,
                once: true,
            });
        }
    </script>
@endsection
