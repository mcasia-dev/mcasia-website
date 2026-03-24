@extends('layouts.app')

@section('title', $brand->brand_name ?? 'Brand')

@section('content')
    @php
        $bannerImage = $brand->getFirstMediaUrl('brand-banner') ?: asset('images/home/banner/homepage-banner-1.jpg');
        $logoImage = $brand->getFirstMediaUrl('brand-logo');

        $dummyProducts = collect([
            ['name' => 'Sample Product 01', 'image' => asset('images/home/our-products/cooking-essential.png')],
            ['name' => 'Sample Product 02', 'image' => asset('images/home/our-products/beverages.png')],
            ['name' => 'Sample Product 03', 'image' => asset('images/home/our-products/frozen2.png')],
        ]);
    @endphp

    <main class="bg-stone-50 py-10 sm:py-12">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <section class="overflow-hidden rounded-[28px] border border-stone-200 bg-white shadow-sm">
                <img src="{{ $bannerImage }}" alt="{{ $brand->brand_name }} banner"
                    class="h-auto w-full object-cover">
            </section>

{{--            <section class="mt-8 rounded-[28px] border border-stone-200 bg-white px-6 py-7 shadow-sm sm:px-8">--}}
{{--                <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">--}}
{{--                    <div class="flex items-center gap-4">--}}
{{--                        @if ($logoImage)--}}
{{--                            <div class="flex h-20 w-20 items-center justify-center rounded-2xl border border-stone-200 bg-white p-3">--}}
{{--                                <img src="{{ $logoImage }}" alt="{{ $brand->brand_name }} logo"--}}
{{--                                    class="max-h-full max-w-full object-contain">--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        <div>--}}
{{--                            <h1 class="text-2xl font-bold tracking-tight text-stone-900 sm:text-3xl">--}}
{{--                                {{ $brand->brand_name }}--}}
{{--                            </h1>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                @if (!empty($brand->brand_description))--}}
{{--                    <div class="mt-6 border-t border-stone-100 pt-6">--}}
{{--                        <p class="max-w-3xl text-base leading-8 text-stone-600">--}}
{{--                            {{ $brand->brand_description }}--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </section>--}}

            <section class="mt-8">
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($brand->products as $product)
                        <article class="overflow-hidden rounded-[24px] bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                            <div class="bg-stone-50 p-5">
                                <div class="flex h-[220px] items-center justify-center rounded-[20px] bg-white">
                                    <img src="{{ $product->media[0]->original_url }}" alt="{{ $product->name }}"
                                        class="h-36 w-36 object-contain">
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection
