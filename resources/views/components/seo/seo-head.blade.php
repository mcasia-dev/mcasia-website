@php
    $title       = $seo?->title       ?? $fallbackTitle ?? config('app.name');
    $description = $seo?->meta_description ?? $fallbackDescription ?? '';
    $canonical   = $seo?->canonical_url    ?? $fallbackCanonical ?? request()->url();
    $robots      = $seo?->robots           ?? $fallbackRobots ?? 'index, follow';
    $fallbackImage = $fallbackImage ?? '';
    $keywords = $seo?->keywords ?? $fallbackKeywords ?? null;
    $author = $seo?->author ?? $fallbackAuthor ?? null;
    $publisher = $seo?->publisher ?: ($fallbackPublisher ?? 'McAsia Foodtrade Corporation');

    $ogTitle       = $seo?->og_title       ?? $title;
    $ogDescription = $seo?->og_description ?? $description;
    $ogImage       = $seo?->og_image       ?? $fallbackImage;
    $ogType        = $seo?->og_type        ?? 'website';
    $ogLocale      = $seo?->og_locale      ?? 'en_PH';

    $twitterCard        = $seo?->twitter_card        ?? 'summary_large_image';
    $twitterTitle       = $seo?->twitter_title       ?? $title;
    $twitterDescription = $seo?->twitter_description ?? $description;
    $twitterImage       = $seo?->twitter_image       ?? $ogImage;
    $twitterSite        = $seo?->twitter_site        ?? '';
@endphp

{{-- ── ESSENTIAL ─────────────────────────────────────── --}}
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<link rel="canonical" href="{{ $canonical }}">
<meta name="robots" content="{{ $robots }}">

@if($keywords)
    <meta name="keywords" content="{{ $keywords }}">
@endif

@if($author)
    <meta name="author" content="{{ $author }}">
@endif

<meta name="publisher" content="{{ $publisher }}">

{{-- ── OPEN GRAPH ───────────────────────────────────── --}}
<meta property="og:title" content="{{ $ogTitle }}">
<meta property="og:description" content="{{ $ogDescription }}">
<meta property="og:type" content="{{ $ogType }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:locale" content="{{ $ogLocale }}">
<meta property="og:site_name" content="{{ config('app.name') }}">

@if($ogImage)
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
@endif

{{-- ── TWITTER / X ──────────────────────────────────── --}}
<meta name="twitter:card" content="{{ $twitterCard }}">
<meta name="twitter:title" content="{{ $twitterTitle }}">
<meta name="twitter:description" content="{{ $twitterDescription }}">

@if($twitterSite)
    <meta name="twitter:site" content="@{{ ltrim($twitterSite, '@') }}">
@endif

@if($twitterImage)
    <meta name="twitter:image" content="{{ $twitterImage }}">
@endif

{{-- ── SCHEMA / JSON-LD ─────────────────────────────── --}}
@if($seo?->schema_script)
    {!! $seo->schema_script !!}
@endif

{{-- ── EXTRA META TAGS ──────────────────────────────── --}}
@if($seo?->extra_meta)
    @foreach($seo->extra_meta as $name => $content)
        <meta name="{{ $name }}" content="{{ $content }}">
    @endforeach
@endif
