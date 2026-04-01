@extends('layouts.app')
@section('title', 'McAsia - Reach Us')
@section('content')

    <style>
        .reach-shell {
            background: radial-gradient(1100px 600px at 90% -10%, rgba(220, 38, 38, 0.08), transparent 60%),
            radial-gradient(900px 500px at -10% 40%, rgba(239, 68, 68, 0.08), transparent 60%),
            #f8fafc;
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

        .reach-hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.55), rgba(0, 0, 0, 0.35));
        }

        .contact-card {
            border: 1px solid #e2e8f0;
            background: linear-gradient(160deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        }

        .field-error {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.15);
        }
    </style>

    <main class="w-full overflow-x-hidden reach-shell">
        <section class="reach-hero relative h-[34vh] sm:h-[44vh] lg:h-[86vh] overflow-hidden">
            <img src="{{ $data->media[0]->original_url ?? asset('images/HOMEPAGE/4.jpg') }}" alt="Reach Us"
                 title="Reach Us"
                 loading="lazy"
                 decoding="async"
                 fetchpriority="high"
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="relative z-10 h-full flex items-center justify-center text-center px-4 sm:px-6">
                <div>
                    <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold text-white">{{ $data->title ?? 'Reach Us'  }}</h1>
                    <p class="text-white/90 mt-3 text-sm sm:text-base lg:text-lg max-w-2xl mx-auto">
                        {{ $data->subtitle ?? '' }}
                    </p>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 py-10 sm:py-14 lg:py-16 space-y-8 sm:space-y-10">
            <article
                class="fade-section space-y-4 rounded-2xl border border-slate-200/80 bg-white/90 backdrop-blur-sm p-5 sm:p-7 shadow-sm">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">{{ $data->title ?? 'Reach Us'  }}</h2>
                <div class="text-gray-600 leading-relaxed text-sm sm:text-base prose text-justify">
                    {!! $data->description ?? 'At McAsia Foodtrade Corporation, we value meaningful connections with our partners, clients, and customers. Whether you are a supplier looking to collaborate, a retailer interested in our brands, or a customer with an inquiry, our team is ready to assist you. We believe that open communication is key to lasting partnerships. Our dedicated representatives are here to provide support, answer your questions, and explore opportunities that align with your business needs. Let us build something great together. Reach us today.' !!}
                </div>
            </article>

            <div class="fade-section grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-stretch">
                <x-reach_us.map/>

                <x-reach_us.form/>
            </div>
        </section>

        @include('components.footer')
    </main>

    <script>
        const fadeSections = document.querySelectorAll('.fade-section');
        const reachUsForm = document.getElementById('reach-us-form');
        const submitBtn = document.getElementById('reach-us-submit-btn');
        const submitText = document.getElementById('reach-us-submit-text');

        const fadeInOnScroll = () => {
            const triggerBottom = window.innerHeight * 0.85;
            fadeSections.forEach((section) => {
                const sectionTop = section.getBoundingClientRect().top;
                if (sectionTop < triggerBottom) {
                    section.classList.add('visible');
                }
            });
        };

        window.addEventListener('scroll', fadeInOnScroll);
        window.addEventListener('load', fadeInOnScroll);

        if (reachUsForm && submitBtn && submitText) {
            let isSubmitting = false;

            reachUsForm.addEventListener('submit', (event) => {
                if (isSubmitting) {
                    event.preventDefault();
                    return;
                }

                isSubmitting = true;
                submitBtn.disabled = true;
                submitText.textContent = 'Submitting...';
            });
        }
    </script>
@endsection
