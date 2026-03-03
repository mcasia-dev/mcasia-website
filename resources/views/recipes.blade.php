@extends('layouts.app')
@section('title', 'McAsia - Recipes')
@section('content')

<style>
    [x-cloak] {
        display: none !important;
    }

    .recipe-card {
        border: 1px solid #e5e7eb;
        background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .recipe-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 30px rgba(15, 23, 42, 0.14);
    }

    .modal-shell {
        background: rgba(15, 23, 42, 0.72);
        backdrop-filter: blur(4px);
    }

    .modal-panel {
        border: 1px solid #e5e7eb;
        box-shadow: 0 24px 60px rgba(15, 23, 42, 0.28);
    }

    .recipe-pill {
        border: 1px solid #e5e7eb;
        background: #f8fafc;
    }
</style>

<main class="w-full overflow-x-hidden">
    <div class="pt-20 lg:pt-32"></div>

    <section class="relative w-full h-64 sm:h-80 lg:h-[500px] overflow-hidden bg-black">
        <div id="slideshow" class="w-full h-full relative">
            <img src="{{ asset('images/EXPLORE NEW RECEIPES/1.png') }}" class="absolute top-0 left-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000" />
            <img src="{{ asset('images/EXPLORE NEW RECEIPES/2.png') }}" class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
            <img src="{{ asset('images/EXPLORE NEW RECEIPES/3.png') }}" class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
            <img src="{{ asset('images/EXPLORE NEW RECEIPES/4.png') }}" class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
        </div>
    </section>

    <section id="recipesSection" class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-10 lg:py-12"
        x-data="{
            open: false,
            recipe: null,
            videoSrc: null,
            setRecipe(data) {
                this.recipe = data;
                this.videoSrc = data.videoEmbed ?? null;
                this.open = true;
                document.body.style.overflow = 'hidden';
            },
            closeModal() {
                this.open = false;
                this.recipe = null;
                this.videoSrc = null;
                document.body.style.overflow = '';
            }
        }">

        @php
            $recipes = [
                [
                    'image' => 'images/RECIPE/new version/1.jpg',
                    'title' => 'Mixed Seafood',
                    'videoEmbed' => asset('videos/Recipes/MixedSeaFood.mp4'),
                    'ingredients' => [
                        ['name' => '1 pack Lobo Chinese Five Spice Blend Powder'],
                        ['name' => '1 kg marble potatoes'],
                        ['name' => '1 pack Hungarian sausage'],
                        ['name' => '3 pcs fresh corn, cut in three'],
                        ['name' => '4 pcs crabs, cut into 2'],
                        ['name' => '500g Sea Chef shrimp, peeled and deveined'],
                        ['name' => '1/4 cup garlic'],
                        ['name' => '1 lemon or lime'],
                        ['name' => '1 onion'],
                        ['name' => 'Salt and pepper to taste'],
                    ],
                    'instructions' => [
                        'Boil 5L of water over medium-high heat and add the Lobo Chinese Five Spice blend powder.',
                        'Add salt, pepper, marble potatoes, Hungarian sausage, lemon, onions, and garlic. Cover and boil for 10 minutes.',
                        'Add corn and cook for 5 minutes.',
                        'Add crab and cook for 5 minutes.',
                        'Add Sea Chef shrimp and cook for another 3 to 4 minutes.',
                        'Drain off water and pour the contents into a serving tray.',
                    ],
                ],
                [
                    'image' => 'images/RECIPE/new version/2.jpg',
                    'title' => 'Pork Adobo',
                    'videoEmbed' => asset('videos/Recipes/PorkAdobo.mp4'),
                    'ingredients' => [
                        ['name' => '2 lbs pork belly'],
                        ['name' => '2 tbsp garlic (minced or crushed)'],
                        ['name' => '2 pcs bay leaves'],
                        ['name' => '4 tbsp vinegar'],
                        ['name' => '1/2 cup Kikkoman Soy Sauce Koikuchi'],
                        ['name' => '1 tbsp peppercorn'],
                        ['name' => '2 cups water'],
                        ['name' => '1 cup stock'],
                        ['name' => 'Salt to taste'],
                    ],
                    'instructions' => [
                        'Mix pork belly with soy sauce, vinegar, bay leaves, peppercorn, and garlic.',
                        'Sear the marinated pork until brown on all sides, then set aside.',
                        'In the same pan, saute garlic until fragrant.',
                        'Put back the pork into the pan, cover, and bring to a boil.',
                        'Once boiling, add the stock.',
                        'Simmer for 20 to 25 minutes or until the pork is tender.',
                        'Transfer to a platter and serve hot.',
                    ],
                ],
                [
                    'image' => 'images/RECIPE/new version/7.jpg',
                    'title' => 'Spring Rolls',
                    'videoEmbed' => asset('videos/Recipes/SpringRolls.mp4'),
                    'ingredients' => [
                        ['name' => '20 spring roll wrappers'],
                        ['name' => '6 King Chef canned shiitake mushrooms'],
                        ['name' => '230g skinless, boneless chicken thighs'],
                        ['name' => '110g raw Sea Chef shrimp, deveined'],
                        ['name' => '600g cabbage, shredded'],
                        ['name' => '1 tsp sea salt'],
                        ['name' => '1 1/2 tbsp cornstarch mixed with 3 tbsp mushroom soaking liquid'],
                        ['name' => '1 egg'],
                        ['name' => '2 tbsp onion'],
                        ['name' => '2 tsp garlic'],
                        ['name' => '1/4 cup celery'],
                        ['name' => '2 tbsp oyster sauce'],
                        ['name' => '1 tsp spring onions'],
                        ['name' => '1 tbsp shaoxing wine'],
                        ['name' => '2 tbsp dark soy sauce'],
                    ],
                    'instructions' => [
                        'Heat the pan with oil and saute onion, celery, and garlic.',
                        'Add chicken thighs, then light soy sauce and oyster sauce. Stir-fry and season with white pepper and salt.',
                        'Cook for a minute, then add dark soy sauce.',
                        'Add King Chef shiitake mushroom and shrimp, then season with sugar.',
                        'Add shaoxing wine, shredded cabbage, and cornstarch slurry. Stir-fry until softened.',
                        'Place around 2 spoons of filling in the wrapper center. Tuck sides and roll, sealing edges with flour mixture.',
                        'Deep-fry until golden and crispy. Drain and serve.',
                    ],
                ],
                [
                    'image' => 'images/RECIPE/new version/5.jpg',
                    'title' => 'Longevity Noodles with Chicken and Mushroom',
                    'videoEmbed' => asset('videos/Recipes/LongevityNoodles.mp4'),
                    'ingredients' => [
                        ['name' => '16 oz fresh noodles'],
                        ['name' => '6 oz boneless chicken breast'],
                        ['name' => '12 pcs King Chef shiitake mushroom'],
                        ['name' => '3/4 cup Chinese chives, chopped'],
                        ['name' => '1 carrot, julienned'],
                        ['name' => '1/4 cup scallions, chopped'],
                        ['name' => '5 tbsp oyster sauce'],
                        ['name' => '6 cups water'],
                        ['name' => '1/4 cup shaoxing cooking wine'],
                        ['name' => '3 tbsp King Chef canola oil'],
                        ['name' => '1/8 tsp ground black pepper'],
                        ['name' => '1 tbsp dark soy sauce'],
                        ['name' => '1/2 cup chicken broth'],
                    ],
                    'instructions' => [
                        'Over medium-high heat, add oil in a wok. Add chicken and stir-fry for 3 minutes or until cooked. Set aside.',
                        'Add shrimp, season with salt and pepper, and stir-fry for 3 minutes. Set aside.',
                        'In the same wok, saute onion and garlic. Add dark soy sauce and shaoxing wine.',
                        'Add cooked chicken, carrots, and shiitake mushroom. Pour in chicken broth and mix.',
                        'Add noodles and toss gently for 1 to 2 minutes until evenly coated.',
                        'Add chives, spring onions, and cooked shrimp. Plate and serve.',
                    ],
                ],
                [
                    'image' => 'images/RECIPE/new version/6.jpg',
                    'title' => 'Pad Thai',
                    'videoEmbed' => asset('videos/Recipes/PadThai.mp4'),
                    'ingredients' => [
                        ['name' => '4 tbsp King Chef canola oil'],
                        ['name' => '8 pcs Sea Chef shrimp'],
                        ['name' => '4 pcs chicken thigh fillet, diced'],
                        ['name' => '2 tbsp garlic, chopped finely'],
                        ['name' => '3 tbsp onions, chopped finely'],
                        ['name' => '2 squares firm tofu, diced'],
                        ['name' => '1 pack Lami Rice Noodle 200g (soaked in warm water for 10 minutes)'],
                        ['name' => '1 cup Thai Dancer Pad Thai Stir-Fry Sauce'],
                        ['name' => '2 to 3 eggs'],
                        ['name' => '2 cups bean sprouts'],
                        ['name' => '1/2 cup chives, cut into 3-inch strips'],
                    ],
                    'instructions' => [
                        'Heat oil in a wok and add some garlic.',
                        'Cook shrimp until pink, then remove.',
                        'Brown chicken until half-cooked.',
                        'Add remaining garlic and onions.',
                        'Add tofu and noodles, then saute.',
                        'Add Pad Thai sauce and toss evenly.',
                        'Push noodles aside and add eggs. Cook and combine.',
                        'Return cooked shrimp to the pan.',
                        'Add bean sprouts and some chives, then toss.',
                        'Remove from heat and garnish with remaining chives.',
                    ],
                ],
                [
                    'image' => 'images/RECIPE/new version/8.jpg',
                    'title' => 'Cantonese Wonton Soup',
                    'videoEmbed' => asset('videos/Recipes/ChineseWontonSoup.mp4'),
                    'ingredients' => [
                        ['name' => '1 pack wonton wrappers (around 50)'],
                        ['name' => '2 lbs shell-on medium shrimp (or 1 lb 10 oz deshelled)'],
                        ['name' => '2 tbsp shaoxing wine'],
                        ['name' => '2 tbsp cornstarch'],
                        ['name' => '1 tsp salt'],
                        ['name' => '1 tsp sugar'],
                        ['name' => '1 tsp sesame oil'],
                        ['name' => '1 tsp white pepper powder'],
                        ['name' => '1 egg white'],
                    ],
                    'instructions' => [
                        'In a bowl, mix Sea Chef shrimp with shaoxing wine.',
                        'Add cornstarch, salt, sugar, sesame oil, and white pepper.',
                        'Add egg white and combine well. Set aside.',
                        'Place 1 tablespoon of filling on a wrapper and fold to seal.',
                        'Repeat until all filling or wrappers are used.',
                        'Boil broth, cook wontons, and serve hot.',
                    ],
                ],
                [
                    'image' => 'images/RECIPE/new version/4.jpg',
                    'title' => 'Coconut Milk Shake',
                    'videoEmbed' => asset('videos/Recipes/CoconutMilkShake.mp4'),
                    'ingredients' => [
                        ['name' => '2 cups vanilla ice cream'],
                        ['name' => 'Coconut flakes (optional)'],
                        ['name' => '1 cup crushed ice'],
                        ['name' => '2/3 cup Vico Rich Coconut Milk'],
                        ['name' => '2/3 cup Vico Fresh Natural Coconut Water'],
                    ],
                    'instructions' => [
                        'Add all ingredients to a blender.',
                        'Blend until smooth and creamy.',
                        'Pour into a chilled glass and top with coconut flakes if desired.',
                    ],
                ],
                [
                    'image' => 'images/RECIPE/new version/3.jpg',
                    'title' => 'Bubble Milk Tea',
                    'videoEmbed' => asset('videos/Recipes/MeetUCoffeeMilkTea.mp4'),
                    'ingredients' => [
                        ['name' => '500ml hot water'],
                        ['name' => '1000ml cold water'],
                        ['name' => '1 pack MEET U Milk White Tea 3-in-1'],
                        ['name' => 'Cooked tapioca pearls'],
                    ],
                    'instructions' => [
                        'Pour hot water to dissolve the milk tea powder.',
                        'Stir until fully dissolved.',
                        'Add cold water and stir.',
                        'Add tapioca pearls.',
                        'Pour in a glass and enjoy.',
                    ],
                ],
            ];
        @endphp

        <div class="flex items-center justify-between mb-6 sm:mb-8">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Recipes</h2>
            <a href="#" onclick="history.back(); return false;" class="inline-flex items-center gap-2 text-sm sm:text-base text-gray-700 hover:text-red-600 transition-colors">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach($recipes as $recipe)
                <button type="button" class="recipe-card rounded-xl overflow-hidden text-left"
                    @click="setRecipe({{ json_encode($recipe) }})">
                    <img src="{{ $recipe['image'] }}" class="w-full h-56 sm:h-60 object-cover" alt="{{ $recipe['title'] }}">
                    <div class="p-4 sm:p-5">
                        <h3 class="font-bold text-lg sm:text-xl text-red-600">{{ $recipe['title'] }}</h3>
                    </div>
                </button>
            @endforeach
        </div>

        <div x-show="open" x-cloak x-transition.opacity.duration.250ms class="modal-shell fixed inset-0 flex items-center justify-center z-[9999] p-3 sm:p-4" @keydown.escape.window="closeModal()">
            <div x-show="open" x-transition:enter="transition ease-out duration-250" x-transition:enter-start="opacity-0 translate-y-4 scale-[0.98]" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 translate-y-4 scale-[0.98]"
                class="modal-panel bg-white rounded-2xl w-full max-w-4xl max-h-[92vh] overflow-y-auto" @click.away="closeModal()">
                <div class="flex justify-between items-center p-4 sm:p-5 border-b sticky top-0 bg-white/95 backdrop-blur-sm z-10">
                    <div>
                        <p class="text-xs sm:text-sm uppercase tracking-wider text-gray-500">Recipe Details</p>
                        <h2 class="text-xl sm:text-2xl font-bold text-black" x-text="recipe?.title"></h2>
                    </div>
                    <button @click="closeModal()" class="h-9 w-9 inline-flex items-center justify-center rounded-full border border-gray-200 text-gray-600 hover:text-black hover:bg-gray-100 text-xl leading-none" aria-label="Close">&times;</button>
                </div>

                <div class="p-4 sm:p-6 space-y-6 sm:space-y-8">
                    <div>
                        <template x-if="recipe?.videoEmbed && recipe.videoEmbed !== ''">
                            <div :key="videoSrc">
                                <video class="w-full rounded-lg" autoplay playsinline controls>
                                    <source :src="videoSrc" type="video/mp4">
                                </video>
                            </div>
                        </template>

                        <template x-if="!recipe?.videoEmbed || recipe.videoEmbed === ''">
                            <img :src="recipe?.image" class="w-full h-72 sm:h-96 object-cover rounded-lg" alt="Recipe image">
                        </template>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
                        <div>
                            <h3 class="text-lg sm:text-xl font-semibold mb-4 text-black">Ingredients</h3>
                            <ul class="space-y-2.5 text-gray-700">
                                <template x-for="ingredient in recipe?.ingredients" :key="ingredient.name">
                                    <li class="recipe-pill rounded-lg px-3 py-2 text-sm sm:text-base" x-text="ingredient.name"></li>
                                </template>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-lg sm:text-xl font-semibold mb-4 text-black">Instructions</h3>
                            <ol class="space-y-2.5 text-gray-700">
                                <template x-for="step in recipe?.instructions" :key="step">
                                    <li class="flex items-start gap-3 text-sm sm:text-base">
                                        <span class="mt-0.5 h-6 w-6 shrink-0 inline-flex items-center justify-center rounded-full bg-red-50 text-red-600 text-xs font-bold" x-text="$index + 1"></span>
                                        <span x-text="step"></span>
                                    </li>
                                </template>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
</main>
@endsection

@push('scripts')
@vite('resources/js/consumer_products.js')
@endpush
