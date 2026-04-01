@extends('layouts.app')
@section('title', 'McAsia')
@section('content')

@php
    $sections = $homePage->blocks ?? [];
@endphp

<main class="w-full overflow-x-hidden bg-white">
    <x-home.banner :section="data_get($sections, 'banner', [])" />

    <x-home.home-to-your-asian-cravings :section="data_get($sections, 'home_to_your_asian_cravings', [])" />

    <x-home.our-products :section="data_get($sections, 'our_products', [])" :brands="$brands" />

    <x-home.our-recipes :section="data_get($sections, 'our_recipes', [])" />

    @include('components.footer')
</main>

@endsection
