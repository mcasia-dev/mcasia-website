@extends('layouts.app')
@section('title', 'McAsia - Cooking Essentials')

@push('styles')
    <style>
        .product-hero-bg {
            background-image: linear-gradient(120deg, rgba(8, 15, 35, 0.8), rgba(127, 29, 29, 0.45)),
            url("{{ asset('images/CANNED GOODS.jpg') }}");
            background-size: cover;
            background-position: center;
        }

        .category-glow {
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.28);
        }

        .frosted-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.92), rgba(255, 255, 255, 0.76));
            backdrop-filter: blur(6px);
        }
    </style>
@endpush

@section('content')
    @php
        $groups = [
            ['key' => 'cooking', 'name' => 'Cooking Essentials', 'icon' => 'fa-bowl-food', 'link' => url('/products/cooking-essentials')],
            ['key' => 'frozen', 'name' => 'Frozen Products', 'icon' => 'fa-snowflake', 'link' => '#'],
            ['key' => 'beverage', 'name' => 'Beverage', 'icon' => 'fa-mug-hot', 'link' => route('beverage')],
            ['key' => 'snacks', 'name' => 'Snacks', 'icon' => 'fa-cookie-bite', 'link' => '#'],
            ['key' => 'packaging', 'name' => 'Packaging Supplies', 'icon' => 'fa-box-open', 'link' => '#'],
        ];

        $subcategories = [
            ['name' => 'Canned Goods', 'image' => 'images/CANNED GOODS/1.png'],
            ['name' => 'Cooking Oil', 'image' => 'images/BRAND/KING CHEF/11.png'],
            ['name' => 'Breading Mix', 'image' => 'images/BRAND/HENG/4.png'],
            ['name' => 'Flour', 'image' => 'images/BRAND/KING CHEF/16.png'],
            ['name' => 'Noodles', 'image' => 'images/NOODLES/1.png'],
            ['name' => 'Condiments & Sauces', 'image' => 'images/BRAND/ABC/2.png'],
            ['name' => 'Pantry Staples', 'image' => 'images/BRAND/KING CHEF/21.png'],
        ];
    @endphp

    <div class="min-h-screen bg-slate-100 pt-28 pb-16 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto space-y-7" x-data="{ active: 'cooking' }">
            <section class="relative overflow-hidden rounded-3xl product-hero-bg category-glow">
                <div class="px-6 py-10 md:px-12 md:py-14">
                    <p class="text-white/80 tracking-[0.25em] uppercase text-xs sm:text-sm">Our Products</p>
                    <h1 class="text-white text-3xl sm:text-4xl lg:text-5xl font-black mt-3 leading-tight max-w-2xl">
                        Cooking Essentials
                    </h1>
                </div>

                <div class="px-4 pb-5 sm:px-6 sm:pb-6">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
                        @foreach ($groups as $group)
                            <a href="{{ $group['link'] }}"
                               @mouseenter="active = '{{ $group['key'] }}'"
                               class="rounded-2xl border border-white/70 p-3 text-center transition-all duration-200 frosted-card"
                               :class="active === '{{ $group['key'] }}' ? 'bg-red-700 text-white border-red-500 scale-[1.02]' : 'text-slate-800 hover:bg-white'">
                                <i class="fa-solid {{ $group['icon'] }} text-lg"></i>
                                <p class="text-sm font-bold mt-1 leading-tight">{{ $group['name'] }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="bg-white rounded-3xl shadow-md border border-slate-200 px-5 py-5 sm:px-7">
                <div class="flex items-center justify-between flex-wrap gap-3">
                    <h2 class="text-slate-900 text-xl font-extrabold">Subcategories</h2>
                    <a href="{{ url('/consumer_products') }}" class="text-sm font-semibold text-red-600 hover:text-red-700">
                        View Full Product Gallery
                    </a>
                </div>

                <div class="mt-5 flex flex-wrap gap-3">
                    @foreach ($subcategories as $item)
                        <button
                            class="px-4 py-2 rounded-xl bg-slate-100 text-slate-700 font-semibold text-sm hover:bg-red-50 hover:text-red-700 transition">
                            {{ $item['name'] }}
                        </button>
                    @endforeach
                </div>
            </section>

            <section class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($subcategories as $item)
                    <article class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all border border-slate-200">
                        <div class="h-44 bg-slate-50 flex items-center justify-center p-5">
                            <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="max-h-full object-contain">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-slate-900">{{ $item['name'] }}</h3>
                            <p class="text-sm text-slate-500 mt-1">Premium options selected for homes, restaurants, and retail channels.</p>
                        </div>
                    </article>
                @endforeach
            </section>
        </div>
    </div>

    @include('components.footer')
@endsection
