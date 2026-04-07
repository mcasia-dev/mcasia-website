@extends('layouts.app')
@section('title', 'McAsia - Recipe Details')
@section('content')

    <style>
        .recipe-page {
            background: radial-gradient(1000px 500px at 5% -5%, rgba(220, 38, 38, 0.12), transparent 60%),
            radial-gradient(900px 520px at 95% 10%, rgba(248, 113, 113, 0.12), transparent 55%),
            #f7f7f5;
        }

        .recipe-surface {
            border: 1px solid #ececec;
            background: #fff;
            box-shadow: 0 14px 38px rgba(15, 23, 42, 0.06);
        }

        .meta-pill {
            border: 1px solid #e7e7e7;
            background: #fff5f5;
        }

        .recipe-pill {
            border: 1px solid #e7e7e7;
            background: #f9fafb;
        }

        .step-card {
            border: 1px solid #ececec;
            background: #fff;
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.04);
        }

        .media-shell {
            border: 1px solid #ececec;
            background: #fafafa;
        }

        .section-kicker {
            letter-spacing: 0.18em;
        }
    </style>

    @php
        $ingredientCount = count($recipe['ingredients'] ?? []);
        $stepCount = count($recipe['instructions'] ?? []);
    @endphp

    <main class="recipe-page w-full overflow-x-hidden">
        <section class="max-w-6xl mx-auto px-4 sm:px-6 py-8 sm:py-10 lg:py-12 space-y-6">
            <article class="recipe-surface rounded-3xl p-4 sm:p-6">
                <div class="media-shell rounded-2xl overflow-hidden">
                    @if(!empty($recipe['videoEmbed']))
                        <video
                            class="w-full rounded-2xl"
                            width="1280"
                            height="720"
                            poster="{{ $recipe['image'] }}"
                            autoplay
                            muted
                            playsinline
                            controls
                            preload="metadata"
                        >
                            <source src="{{ $recipe['videoEmbed'] }}" type="video/webm">
                            <source src="{{ $recipe['videoEmbed'] }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <img src="{{ $recipe['image'] }}" class="w-full h-72 sm:h-96 object-cover rounded-2xl"
                             alt="{{ $recipe['title'] }}">
                    @endif
                </div>
            </article>

            <article class="recipe-surface rounded-3xl p-5 sm:p-7 lg:p-8">
                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-5">
                    <div>
                        <p class="section-kicker text-xs font-semibold uppercase text-red-600 mb-2">Recipe Details</p>
                        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 leading-tight">{{ $recipe['title'] }}</h1>

                        @if(!empty($recipe['description']))
                            <p class="text-gray-600 leading-relaxed mt-4 max-w-3xl text-sm md:text-base text-justify">{{ $recipe['description'] }}</p>
                        @endif
                    </div>

                    <a href="{{ route('recipes') }}"
                       class="inline-flex items-center justify-center gap-2 h-11 px-4 rounded-xl border border-gray-300 text-sm sm:text-base text-gray-700 hover:text-red-600 hover:border-red-300 transition-colors">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Back to Recipes</span>
                    </a>
                </div>
            </article>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <article class="recipe-surface rounded-3xl p-5 sm:p-6">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4">Ingredients</h2>

                    @if(!empty($recipe['ingredients']))
                        <ul class="space-y-2.5 text-gray-700">
                            @foreach($recipe['ingredients'] as $ingredient)
                                <li class="recipe-pill rounded-xl px-3.5 py-2.5 text-sm sm:text-base">{{ $ingredient['name'] }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 text-sm sm:text-base">No ingredients listed.</p>
                    @endif
                </article>

                <article class="recipe-surface rounded-3xl p-5 sm:p-6">
                    <h2 class="text-xl sm:text-2xl font-bold text-gray-900 mb-4">Cooking Instructions</h2>

                    @if(!empty($recipe['instructions']))
                        <ol class="space-y-3 text-gray-700">
                            @foreach($recipe['instructions'] as $index => $step)
                                <li class="step-card rounded-xl px-3.5 py-3.5 text-sm sm:text-base flex items-start gap-3 text-justify">
                                <span
                                    class="mt-0.5 h-7 w-7 shrink-0 inline-flex items-center justify-center rounded-full bg-red-50 text-red-600 text-xs font-bold">
                                    {{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}
                                </span>
                                    <span>{{ $step }}</span>
                                </li>
                            @endforeach
                        </ol>
                    @else
                        <p class="text-gray-500 text-sm sm:text-base">No instructions listed.</p>
                    @endif
                </article>
            </div>
        </section>

        @include('components.footer')
    </main>
@endsection
