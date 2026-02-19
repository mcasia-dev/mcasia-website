@extends('layouts.app')
@section('title', 'McAsia')
@section('content')

@push('styles')
@vite('resources/css/autoscroll.css')
@endpush

<style>
  /* Base animation states */
  .reveal {
    opacity: 0;
    transform: translateY(50px) scale(0.98);
    transition: all 1.2s ease;
  }
  .reveal-left {
    transform: translateX(-80px);
  }
  .reveal-right {
    transform: translateX(80px);
  }
  .active {
    opacity: 1;
    transform: translateX(0) translateY(0) scale(1);
  }
</style>

<div class="h-10"></div>

<!--------------------------------------SECTION 1----------------------------------------------->
<section class="px-10 py-20 bg-gray-50">

@php
    $brands = [
        ['img' => 'abc/banner.png', 'url' => '/abc'],
        ['img' => 'daisho/banner.png', 'url' => '/daisho'],
        ['img' => 'heng/banner.png', 'url' => '/heng'],
        ['img' => 'oxford/banner.png', 'url' => '/oxford'],
        ['img' => 'kingchef/banner.png', 'url' => '/kingchef'],
        ['img' => 'meetu/banner.png', 'url' => '/meetu'],
        ['img' => 'milcasa/banner.png', 'url' => '/milcasa'],
        ['img' => 'otafuku/banner.png', 'url' => '/otafuku'],
        ['img' => 'ozaki/banner.png', 'url' => '/ozaki'],
        ['img' => 'seachef/banner.png', 'url' => '/seachef'],
        ['img' => 'ummami/banner.png', 'url' => '/ummami'],
    ];
@endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 -gap-x-30 gap-y-7">
        @foreach ($brands as $brand)
            <a href="{{ $brand['url'] }}" class="block justify-center h-32 md:h-80 lg:h-[13rem] transition-transform hover:scale-105">
                <img 
                    src="{{ asset('images/product_brands/' . $brand['img']) }}" 
                    alt="Brand Banner"
                    class="w-full h-full object-contain"
                >
            </a>
        @endforeach
    </div>

</section>

<!------------------------------------------------------------------------------------------------->

@include('components.footer')

@endsection
