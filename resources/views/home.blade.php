@extends('layouts.app')
@section('title', 'McAsia')
@section('content')


@push('styles')
    @vite('resources/css/autoscroll.css')
@endpush

<style>
    html,
    body {
        overflow-x: hidden;
        visibility: hidden;
    }

    [x-cloak] {
        display: none !important;
    }

    /* Viewing for Monitor going 2k - 4k resolution */
    @media (min-width: 1440px) {
        .content-wrapper {
            margin-left: -17rem;
            /* Move content slightly right */
            margin-top: 8rem;
            /* Optional vertical offset */
        }

        .meet_our_brand {
            top: -5rem !important;
            left: 38rem !important;
            width: 18rem !important;
        }

        .name_title {
            font-size: 3.75rem !important;
        }

        .view_all_brand {
            margin-left: 44% !important;
            font-size: 20px;
            position: relative;
            /* ← Add */
            z-index: 9999;
            /* ← Add (very high value) */
        }

        .recipes-area {
            margin-left: 22rem !important;

        }

        .recipe-images {
            margin-left: 22rem !important;
            gap: -10rem;
        }

        .first-fade-info {
            margin-left: 5rem !important;
        }

        .spacing_1 {
            margin-bottom: 7rem;
        }

        .image-container {
            height: 130% !important;
            padding: 0;
        }

        /*------------------------------VOLUME CONFIGURATION DESIGN------------------------------ */
        .custom-volume-btn {
            position: absolute;
            top: 95%;
            right: 94%;
            transform: translateY(-50%);
            z-index: 50;
            color: white;
            padding: 1.5rem;
            font-size: 1.875rem;
            transition: background 0.2s ease-out;
        }

        .custom-volume-btn:hover {
            background: rgba(0, 0, 0, 0.7);
        }
    }


    @media (min-width: 641px) and (max-width: 1439px) {
        .recipes-area {
            margin-left: 6rem !important;
        }

        .recipe-images {
            margin-left: 6rem !important;
            gap: -10rem;
        }

        .spacing_1 {
            margin-bottom: 9rem;
        }

        .images-preview {
            width: 100%;
            height: 230px;
            object-fit: cover;
            border-radius: 0;
        }

        .name_title {
            font-size: 45px;
        }

        .view_all_brand {
            margin-left: 45% !important;
            font-size: 20px;
        }

        /*------------------------------VOLUME CONFIGURATION DESIGN------------------------------ */
        .custom-volume-btn {
            position: absolute;
            top: 95%;
            right: 94%;
            transform: translateY(-50%);
            z-index: 50;
            color: white;
            padding: 1.5rem;
            font-size: 1.875rem;
            transition: background 0.2s ease-out;
        }

        .custom-volume-btn:hover {
            background: rgba(0, 0, 0, 0.7);
        }
    }

    /*----------------------------------Mobile Viewing-------------------------------------*/
    @media (max-width: 434px) {
        .name_title {
            font-size: 35px;
            margin-left: 19px;

        }

        .card_display {
            margin-bottom: 10rem;
        }

        .image-container {
            height: auto !important;
            padding: 0;
        }

        .image-container>div>div {
            flex-direction: column !important;
            gap: 1rem !important;
            padding: 1rem !important;
        }

        .images-preview {
            width: 100%;
            height: auto;
            max-height: 240px;
            object-fit: contain;
        }

        .view_all_brand {
            margin-left: 33% !important;
            font-size: 20px;
        }

        /*------------------------------VOLUME CONFIGURATION DESIGN------------------------------ */
        .custom-volume-btn {
            position: absolute;
            top: 95%;
            right: 40%;
            transform: translateY(-50%);
            z-index: 50;
            color: white;
            padding: 1.5rem;
            font-size: 1.875rem;
            transition: background 0.2s ease-out;
        }

        .custom-volume-btn:hover {
            background: rgba(0, 0, 0, 0.7);
        }
    }
</style>

<x-home.banner />

<x-home.home-to-your-asian-cravings />

<x-home.our-products />

<x-home.our-recipes />

<script>
    window.addEventListener('load', () => {
        const video = document.getElementById('heroVideo');
        document.body.style.visibility = 'visible';

        // Make sure video starts playing
        if (video) {
            video.play().catch(error => {
                console.log("Video playback failed:", error);
            });
        }

    });

    const video = document.getElementById('heroVideo');
    const volumeBtn = document.getElementById('volumeBtn');

    // Start with muted video
    video.muted = true;
    video.volume = 1.0; // optional initial volume

    volumeBtn.addEventListener('click', () => {
        video.muted = !video.muted; // toggle mute
        volumeBtn.textContent = video.muted ? '🔇' : '🔊';
    });

    function logoPagination() {
        return {
            logos: Array.from({
                length: 52
            }, (_, i) => i + 1),
            currentPage: 1,
            perPage: 27,
            animated: false,
            get totalPages() {
                return Math.ceil(this.logos.length / this.perPage);
            },
            get paginatedLogos() {
                const start = (this.currentPage - 1) * this.perPage;
                return this.logos.slice(start, start + this.perPage);
            },
            nextPage() {
                if (this.currentPage < this.totalPages) {
                    this.currentPage++;
                    this.triggerAnimation();
                }
            },
            prevPage() {
                if (this.currentPage > 1) {
                    this.currentPage--;
                    this.triggerAnimation();
                }
            },
            triggerAnimation() {
                this.animated = false;
                setTimeout(() => this.animated = true, 50);
            },
            init() {
                this.animated = true;
            }
        }
    }

    // Tab buttons
    const tab1Btn = document.getElementById('tab1Btn');
    const tab2Btn = document.getElementById('tab2Btn');
    const tab1 = document.getElementById('tab1');
    const tab2 = document.getElementById('tab2');


    window.addEventListener('DOMContentLoaded', () => {
        tab1.classList.remove('hidden');
        tab2.classList.add('hidden');

        tab1Btn.classList.add('bg-red-600', 'text-white', 'font-bold');
        tab1Btn.classList.remove('text-gray-700');

        tab2Btn.classList.remove('bg-red-600', 'text-white', 'font-bold');
        tab2Btn.classList.add('text-gray-700');
    });




    tab1Btn.addEventListener('click', () => {
        tab1.classList.remove('hidden');
        tab2.classList.add('hidden');
        tab1Btn.classList.add('bg-red-600', 'text-white', 'font-bold');
        tab1Btn.classList.remove('text-gray-700');
        tab2Btn.classList.remove('bg-red-600', 'text-white', 'font-bold');
        tab2Btn.classList.add('text-gray-700');
    });

    tab2Btn.addEventListener('click', () => {
        tab2.classList.remove('hidden');
        tab1.classList.add('hidden');

        tab2Btn.classList.add('bg-red-600', 'text-white', 'font-bold');
        tab2Btn.classList.remove('text-gray-700');
        tab1Btn.classList.remove('bg-red-600', 'text-white', 'font-bold');
        tab1Btn.classList.add('text-gray-700');

        // Animate Tab 2 logos
        const items = tab2.querySelectorAll('.logo-item');
        items.forEach((el, index) => {
            el.classList.add('opacity-0', 'scale-90'); // reset
            el.style.transitionDelay = `${index * 50}ms`;
        });
        setTimeout(() => {
            items.forEach(el => el.classList.remove('opacity-0', 'scale-90'));
            items.forEach(el => el.classList.add('opacity-100', 'scale-100'));
        }, 50);
    });

    window.addEventListener('load', () => {
        document.documentElement.style.visibility = 'visible';
    });
</script>

@include('components.footer')
