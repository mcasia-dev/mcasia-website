@extends('layouts.app')
@section('title', 'McAsia - Reach Us')
@section('content')

    <style>
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
            border: 1px solid #e5e7eb;
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
        }

        .field-error {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.15);
        }
    </style>

    <main class="w-full overflow-x-hidden">
        <div class="pt-20 lg:pt-32"></div>

        <section class="reach-hero relative h-[34vh] sm:h-[44vh] lg:h-[56vh] overflow-hidden">
            <img src="{{ asset('images/HOMEPAGE/4.jpg') }}" alt="Reach Us"
                class="absolute inset-0 w-full h-full object-cover">
            <div class="relative z-10 h-full flex items-center justify-center text-center px-4 sm:px-6">
                <div>
                    <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold text-white">Reach Us</h1>
                    <p class="text-white/90 mt-3 text-sm sm:text-base lg:text-lg max-w-2xl mx-auto">
                        We are here to support your inquiries, partnerships, and business needs.
                    </p>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 py-10 sm:py-14 lg:py-16 space-y-8 sm:space-y-10">
            <article class="fade-section space-y-4">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Reach Us</h2>
                <p class="text-gray-600 leading-relaxed text-justify text-sm sm:text-base">
                    At <span class="font-semibold text-gray-800">McAsia Foodtrade Corporation</span>, we value meaningful
                    connections with our partners, clients, and customers. Whether you are a supplier looking to collaborate,
                    a retailer interested in our brands, or a customer with an inquiry, our team is ready to assist you.
                </p>
                <p class="text-gray-600 leading-relaxed text-justify text-sm sm:text-base">
                    We believe that open communication is key to lasting partnerships. Our dedicated representatives are here
                    to provide support, answer your questions, and explore opportunities that align with your business needs.
                </p>
                <p class="text-gray-600 leading-relaxed text-justify text-sm sm:text-base">
                    Let us build something great together. Reach us today.
                </p>
                <a href="#" onclick="history.back(); return false;"
                    class="inline-flex items-center gap-2 text-base text-gray-800 hover:text-red-600 transition-colors py-2">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back</span>
                </a>
            </article>

            <div class="fade-section grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-stretch">
                <div class="contact-card rounded-2xl overflow-hidden">
                    <div class="p-5 sm:p-6 border-b border-gray-200">
                        <h3 class="text-xl sm:text-2xl font-semibold text-gray-900">Visit Our Office</h3>
                        <p class="text-sm text-gray-500 mt-1">Find us on the map below.</p>
                    </div>
                    <div class="h-[320px] sm:h-[420px]">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.4398514532104!2d120.99464470973412!3d14.630955576275623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b664691d8169%3A0xa01ff34f48ad9591!2sMcAsia%20Foodtrade%20Corporation!5e0!3m2!1sen!2sph!4v1762934600495!5m2!1sen!2sph"
                            class="w-full h-full border-0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="contact-card rounded-2xl p-5 sm:p-6 lg:p-7">
                    <h3 class="text-2xl font-bold text-gray-800 mb-5">Contact Us</h3>

                    @if (session('success'))
                        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="space-y-4">
                        <form id="reach-us-form" action="{{ url('/send-mail') }}" method="POST" novalidate>
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label for="first_name" class="block text-gray-700 font-medium mb-1">First Name*</label>
                                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:outline-none @error('first_name') field-error @enderror"
                                        required>
                                    @error('first_name')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="middle_name" class="block text-gray-700 font-medium mb-1">Middle Name</label>
                                    <input type="text" id="middle_name" name="middle_name" value="{{ old('middle_name') }}"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:outline-none">
                                </div>
                                <div>
                                    <label for="last_name" class="block text-gray-700 font-medium mb-1">Last Name*</label>
                                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:outline-none @error('last_name') field-error @enderror"
                                        required>
                                    @error('last_name')
                                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-1">Email*</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:outline-none @error('email') field-error @enderror"
                                    required>
                                @error('email')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-gray-700 font-medium mb-1">Phone (PH)*</label>
                                <input type="tel" id="phone" name="phone" placeholder="+639XXXXXXXXX"
                                    value="{{ old('phone') }}"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:outline-none @error('phone') field-error @enderror"
                                    required>
                                @error('phone')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="message" class="block text-gray-700 font-medium mb-1">Message*</label>
                                <textarea id="message" name="message" rows="5"
                                    class="w-full border border-gray-300 rounded-md px-3 py-2.5 focus:ring-2 focus:ring-yellow-500 focus:outline-none @error('message') field-error @enderror"
                                    placeholder="Write your message here..." required>{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="pt-2">
                                <button id="reach-us-submit-btn" type="submit"
                                    class="w-full sm:w-auto bg-black hover:bg-yellow-700 disabled:bg-gray-500 disabled:cursor-not-allowed text-white px-6 py-2.5 rounded-md transition-all duration-300">
                                    <span id="reach-us-submit-text">Submit</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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
