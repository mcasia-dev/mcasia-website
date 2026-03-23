@extends('layouts.app')
@section('title', 'McAsia')
@section('content')

@php
    $blocks = collect($homePage->blocks ?? [])
        ->filter(fn ($block) => !empty($block['type']));
@endphp

<main class="w-full overflow-x-hidden bg-white">
    @foreach($blocks as $block)
        @includeIf('components.home.blocks.' . $block['type'], ['block' => $block])
    @endforeach

    @include('components.footer')
</main>

@endsection

