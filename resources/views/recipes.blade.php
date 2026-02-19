@extends('layouts.app')
@section('content')


<style>
  [x-cloak] { display: none !important; }

  </style>

<div class="h-26"></div>

<!------------------------------------------Slideshow--------------------------------------------------->
<div class="relative w-full h-64 md:h-[500px] overflow-hidden rounded-lg shadow-lg mb-10 bg-black">
  <div id="slideshow" class="w-full h-full relative">
    <img src="{{ asset('images/EXPLORE NEW RECEIPES/1.png') }}"
         class="absolute top-0 left-0 w-full h-full object-cover opacity-100 transition-opacity duration-1000" />
    <img src="{{ asset('images/EXPLORE NEW RECEIPES/2.png') }}"
         class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
    <img src="{{ asset('images/EXPLORE NEW RECEIPES/3.png') }}"
         class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
    <img src="{{ asset('images/EXPLORE NEW RECEIPES/4.png') }}"
         class="absolute top-0 left-0 w-full h-full object-cover opacity-0 transition-opacity duration-1000" />
  </div>
</div>
<!------------------------------------------------------------------------------------------------------------------>















<!----------------------------------------------------------------------RECIPE SECTION---------------------------------------------->
<div id="recipesSection" class="px-6">

  <!-- Section 4: Recipes Showcase -->
  <div id="section4" 
       x-data="{
          open: false,
          recipe: null,
          videoSrc: null,

          setRecipe(data) {
              this.recipe = data;
              this.videoSrc = data.videoEmbed ?? null;
          },

          closeModal() {
              this.open = false;
              this.recipe = null;
              this.videoSrc = null;
          }
       }">

      <!-- Title -->
      <h2 class="text-2xl font-bold mb-5 ml-8">Recipes</h2>


    @php
      $recipes = [
        [



          'image' => 'images/RECIPE/new version/1.jpg',
          'title' => 'Mixed Seafood',
          'videoEmbed' => asset('videos/Recipes/MixedSeaFood.mp4'),
          'ingredients' => [
            ['name' => '1 Pack of Lobo Chinese Five Spice Blend Powder'],
            ['name' => '1 kl. Marble Potatoes'],
            ['name' => '1 Pack Hungarian Sausage'],
            ['name' => '3 Pcs. Fresh Corn, cut in three'],
            ['name' => '4 pcs crabs, cut into 2'],
            ['name' => '500g Sea Chef Shrimp, Peeled and Deveined'],
            ['name' => '1/4 Cup Garlic'],
            ['name' => '1 lemon/lime'],
            ['name' => '1 Onion'],
            ['name' => 'Salt and pepper to taste'],
          ],
          'instructions' => [
            'Boil 5L of water over medium high heat and add the Lobo Chinese Five Spice blend powder',
            'Add salt, pepper, marble potatoes, Hungarian sausage, lemon, onions and garlic. Cover and boil for 10 minutes',
            'Add corn and cook for 5 minutes',
            'Add crab and cook for 5 minutes',
            'Add Sea Chef Shrimp, cook for another 3 to 4 minutes',
            'Drain off water and pour the contents in a serving tray.'
          ]
        ],



        [
          'image' => 'images/RECIPE/new version/2.jpg',
          'title' => 'Pork Adobo',
          'videoEmbed' => asset('videos/Recipes/PorkAdobo.mp4'),
          'ingredients' => [
            ['name' => '2 Lbs Pork Belly'],
            ['name' => '2 tbsp garlic (minced or crushed)'],
            ['name' => '2 pcs bay leaf'],
            ['name' => '4 tbsp vinegar'],
            ['name' => '1/2 cup Kikkoman Soy Sauce Koikuchi'],
            ['name' => '1 tbsp peppercorn'],
            ['name' => '2 cups water'],
            ['name' => '1 cup stock'],
            ['name' => 'Salt to taste'],
          ],
          'instructions' => [
            'Mix pork belly with soy sauce, vinegar, bay leaves, peppercorn and garlic',
            'Sear the marinated pork until brown on all sides, then set aside',
            'In the same pan, sauté garlic until fragrant',
            'Put back the pork into the pan, cover and bring to a boil',
            'Once boiling, add the stock',
            'Simmer for 20–25 minutes or until the pork is tender',
            'Transfer onto a platter and serve hot'
          ]
        ],


         [
          'image' => 'images/RECIPE/new version/7.jpg',
          'title' => 'Spring Rolls',
          'videoEmbed' => asset('videos/Recipes/SpringRolls.mp4'),
          'ingredients' => [
            ['name' => '20 Spring roll wrappers'],
            ['name' => '6 King Chef Canned Shiitake Mushrooms'],
            ['name' => '230g skinless, boneless chicken thighs'],
            ['name' => '110g raw Sea Chef Shrimp, deveined'],
            ['name' => '600g cabbage shredded'],
            ['name' => '1 teaspoon sea salt'],
            ['name' => '1 1/2 tablespoons cornstarch mixed with 3 tablespoons of mushroom soaking liquid'],
            ['name' => '1 egg'],
            ['name' => '2 tablespoons onion'],
            ['name' => '2 teaspoon garlic'],
            ['name' => '1/4 cup celery'],
            ['name' => '2 tablespoons oyster sauce'],
            ['name' => '1 teaspoon spring onions'],
            ['name' => '1 tablespoon shaoxing wine'],
            ['name' => '2 tablespoon of dark soy sauce'],

          ],


          'instructions' => [
            'Heat the pan with some oil and put 2 tbsp of onion. Add 1/4 cup of celery and 2 tsp. of garlic.',
            'Add the chicken thighs, then pour the 1 tbsp of light soy sauce and oyster sauce , stir fry and season with white pepper and salt.',
            'Cook for a minute, and add 2 tbsp of dark soy sauce.',
            'When it turns into brown, add the King Chef Shitake Mushroom, shrimp and season with sugar.',
            'Pour 1tbsp. of shaoxing wine, put the shredded cabbage and gently pour cornstarch slurry and stir fry until softens. Add 1/4 cup spring onions, onions leaks and stir again.',
            'Place around 2 spoon of filling into the center of the spring roll. Tuck in the sides and roll it up, sealing the edges wit flour mixture.',
            'Pour enough oil into the pot, and throw spring roll until the skin is golden and crispy. Drain on a paper towel and serve.',
          ]
        ],





        [
          'image' => 'images/RECIPE/new version/5.jpg',
          'title' => 'Longevity Noodles With Chicken And Mushroom',
          'videoEmbed' => asset('videos/Recipes/LongevityNoodles.mp4'),
          'ingredients' => [
            ['name' => '16 ounces fresh noodles'],
            ['name' => '6 ounces of boneless chicken breast'],
            ['name' => '12 pieces King Chef Shiitake Mushroom'],
            ['name' => '3/4 cup Chinese chive chopped'],
            ['name' => '1 piece carrot julienne'],
            ['name' => '1/4 cup scallions chopped'],
            ['name' => '5 tablespoons oyster sauce'],
            ['name' => '6 cups water'],
            ['name' => '1/4 cup Shaoxing cooking wine'],
            ['name' => '3 tablespoons of King Chef Canola Oil'],
            ['name' => '1/8 teaspoon ground black pepper'],
            ['name' => '1 tablespoon dark soy sauce'],
            ['name' => '1/2 cup of chicken broth'],
          ],
          'instructions' => [
            'Over medium high heat, add 3 tbsp of king chef canola oil in a wok. Add in the chicken and stir-fry for 3 minutes or until cooked. Transfer into a bowl and set aside',
            'Add in the shrimp. Season it with salt and pepper. Stir-fry for 3 minutes. Transfer into a separate bowl and set aside.',
            'In the same wok, sauté onion and garlic. Pour in the dark soy sauce and shaoxing wine. Add in the cooked chicken, carrots, and shiitake mushroom. Pour in the chicken broth and mix everything.',
            'Transfer the noodles into the wok. then toss gently for a minute or two, just enough to combine everything well and ensure an even color. Add the chives, spring onions, and cooked shrimp. Transfer on plate.',
          ]
        ],



        [
          'image' => 'images/RECIPE/new version/6.jpg',
          'title' => 'Pad Thai',
          'videoEmbed' => asset('videos/Recipes/PadThai.mp4'),
          'ingredients' => [
            ['name' => '4 tbsp. King Chef Canola Oil'],
            ['name' => 'About 8 pcs Sea Chef Shrimp'],
            ['name' => '4 pcs chicken thigh fillet, diced'],
            ['name' => '2 tbsp. garlic, chopped finely'],
            ['name' => '3 tbsp. onions, chopped finely'],
            ['name' => '2 square firm tofu, diced'],
            ['name' => '1 pack Lami Rice Noodle 200g (soaked in warm water for 10 minutes)'],
            ['name' => '1 cup Thai Dancer Pad Thai Stir-Fry Sauce'],
            ['name' => '2-3 pcs eggs'],
            ['name' => '2 cups bean sprouts'],
            ['name' => '1/2 cup chives, cut into 3” strips'],
          ],
          'instructions' => [
            'In a work over medium heat, pour King Chef Canola Oil and add some of the garlic.',
            'Cook Sea Chef Shrimp until pink. Remove from pan.',
            'Brown chicken pieces until half cooked.',
            'Add the rest of the garlic and onions',
            'Add tofu, Lami Rice Noodle 200g, and sauté.',
            'Add Thai Dancer Pad Thai Stir-Fry Sauce. Sauté to coat noodles evenly.',
            'Push noodles to the side to add in unbeaten eggs. Sauté with the rest of the ingredients.',
            'Add cooked shrimp back the pan.',
            'Sauté in bean sprouts and some of the chive.',
            'Remove from heat and add remaining chives for garnish.',
            'Best consumed immediately.',

          ]
        ],







        [
            'image' => 'images/RECIPE/new version/8.jpg',
            'title' => 'Cantonese Wonton Soup',
            'videoEmbed' => asset('videos/Recipes/ChineseWontonSoup.mp4'),
            'ingredients' => [
            ['name' => '1 pack of wonton wrappers, around 50'],
            ['name' => '2 lb shell-on medium shrimp (0r 1lb 10oz deshelled)'],
            ['name' => '4 pcs chicken thigh fillet, diced'],
            ['name' => '2 tbsp. garlic, chopped finely'],
            ['name' => '3 tbsp. onions, chopped finely'],
            ['name' => '2 square firm tofu, diced'],
            ['name' => '1 pack Lami Rice Noodle 200g (soaked in warm water for 10 minutes)'],
            ['name' => '1 cup Thai Dancer Pad Thai Stir-Fry Sauce'],
            ['name' => '2-3 pcs eggs'],
            ['name' => '2 cups bean sprouts'],
            ['name' => '1/2 cup chives, cut into 3” strips'],

          ],

          
          'instructions' => [
            'On a mixing bowl, pour Sea Chef Shrimp and mix the 2 tbsp. of Shaoxing Wine',
            'Gently add 2 tbsp. corn starch, 1 tsp. salt, sugar, and sesame oil. Add also the 1 tsp. of white pepper powder',
            'Pour the egg white in the mixture and combine all the ingredients then set aside',
            'Prepare a wrapper and place 1 tbsp. of the shrimp mixture. Flip the corner of the wrapper inward to wrap, the fold the two sides.',
            'Repeat these steps until you finish the filling or wonton wrapper',
            'Bring a medium pot of broth to boil and cook the wonton,  then serve the hot soup!',
          ]
    ],


          [
          'image' => 'images/RECIPE/new version/4.jpg',
          'title' => 'Coconut Milk Shake',
          'videoEmbed' => asset('videos/Recipes/CoconutMilkShake.mp4'),
          'ingredients' => [
            ['name' => '2 cups vanilla ice cream'],
            ['name' => 'coconut flakes (optional)'],
            ['name' => '1 cup crushed iced'],
            ['name' => '2/3 cups Vico Rich Coconut Milk'],
            ['name' => '2/3 cups Vico Fresh Natural Coconut Water'],
          ],
          'instructions' => [
            'Add all ingredients to a large blender.',
            'Blend until smooth and creamy.',
            'Pour into a chilled glass and top with coconut flakes if desired.',
          ]
        ],


         [
          'image' => 'images/RECIPE/new version/3.jpg',
          'title' => 'Bubble Milk Tea',
          'videoEmbed' => asset('videos/Recipes/MeetUCoffeeMilkTea.mp4'),
          'ingredients' => [
            ['name' => '500ml of hot water'],
            ['name' => '1000ml of cold water'],
            ['name' => '1 pack MEET U Milk White Tea 3-in-1'],
            ['name' => 'Tapioca pearls (cooked)'],
          ],
          'instructions' => [
            'Pour hot water to dissolve the milk tea powder',
            'Mix and stir until fully dissolved',
            'Add in cold water and stir',
            'Add tapioca pearls',
            'Pour the milk tea mixture in a glass and enjoy'
          ]
        ]


      ];
    @endphp

      <!-- Recipe Thumbnails -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
          @foreach($recipes as $recipe)
              <div class="bg-white rounded-xl shadow-xl overflow-hidden cursor-pointer hover:scale-105 transition-transform duration-300"
                   @click="setRecipe({{ json_encode($recipe) }}); open = true;">
                  <img src="{{ $recipe['image'] }}" class="w-full h-64 object-cover" alt="{{ $recipe['title'] }}">
                  <div class="p-4">
                      <h3 class="font-bold text-xl text-red-600">{{ $recipe['title'] }}</h3>
                  </div>
              </div>
          @endforeach


          
      </div>
<div class="h-20"></div>

    <a href="#" onclick="history.back(); return false;"
   class="btn btn-outline-light d-inline-flex align-items-center gap-2 px-4 py-20 mt-30"
   style="font-size: 20px;">

    <i class="fa-solid fa-arrow-left"></i>
    <span>Back</span>
</a>

      

      <!-- Modal -->
<div x-show.transition.opacity="open" x-cloak
     class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-[9999]">
          <div class="bg-white rounded-xl shadow-2xl w-11/12 md:w-4/5 lg:w-2/3 max-h-[95vh] overflow-y-auto flex flex-col"
               @click.away="closeModal()">

              <!-- Header -->
              <div class="flex justify-between items-center p-5 border-b sticky top-0 bg-white z-10">
                  <h2 class="text-2xl font-bold text-black" x-text="recipe?.title"></h2>
                  <button @click="closeModal()" class="text-gray-600 hover:text-black text-1xl">X</button>
              </div>

              <!-- Content -->
              <div class="p-6 space-y-8">

                  <!-- Video or Image -->
                  <div>
                      <!-- If has video -->
                      <template x-if="recipe?.videoEmbed && recipe.videoEmbed !== ''">
                          <div :key="videoSrc">
                              <video 
                                  class="w-full rounded-lg"
                                  autoplay
                                  playsinline
                                  controls
                              >
                                  <source :src="videoSrc" type="video/mp4">
                              </video>
                          </div>
                      </template>

                      <!-- If image only -->
                      <template x-if="!recipe?.videoEmbed || recipe.videoEmbed === ''">
                          <img :src="recipe?.image" class="w-full h-80 md:h-96 object-cover rounded-lg">
                      </template>
                  </div>

                  <!-- Side by Side Layout -->
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                      <!-- Ingredients -->
                      <div>
                          <h3 class="text-xl font-semibold mb-4 text-black">🧂 Ingredients</h3>
                          <ul class="space-y-3 text-gray-700">
                              <template x-for="ingredient in recipe?.ingredients" :key="ingredient.name">
                                  <li class="flex items-center space-x-3">
                                      <span x-text="ingredient.name"></span>
                                  </li>
                              </template>
                          </ul>
                      </div>

                      <!-- Instructions -->
                      <div>
                          <h3 class="text-xl font-semibold mb-4 text-black">👨‍🍳 Instructions</h3>
                          <ol class="list-decimal list-inside space-y-3 text-gray-700">
                              <template x-for="step in recipe?.instructions" :key="step">
                                  <li x-text="step"></li>
                              </template>
                          </ol>
                      </div>
                  </div>

              </div>
          </div>
      </div>

  </div>
</div>






<div class="h-20"></div>


<!--------------------------------------------------------------END OF CODE-------------------------------------------->











@include('components.footer')

@endsection


@push('scripts')
@vite('resources/js/consumer_products.js')
@endpush

