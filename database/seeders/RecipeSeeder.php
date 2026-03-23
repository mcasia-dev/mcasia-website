<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = [
            [
                'recipe_name' => 'Mixed Seafood',
                'slug' => 'mixed-seafood',
                'description' => 'Mixed seafood, also known as a seafood medley or frutti di mare, is a combination of various types of seafood, often sold together as a convenient mix. Common ingredients include shrimp, squid (calamari rings), mussels, scallops, and sometimes chunks of white fish.',
                'ingredients' => '[{"item": "Lobo Chinese Five Spice Blend Powder", "unit": "pack", "amount": "1"}, {"item": "marble potatoes", "unit": "kg", "amount": "1"}, {"item": "Hungarian sausage", "unit": "pack", "amount": "1"}, {"item": "fresh corn, cut in three", "unit": "pcs", "amount": "3"}, {"item": "Crabs, cut into 2", "unit": "pcs", "amount": "4"}, {"item": "Sea Chef shrimp, peeled and deveined", "unit": "g", "amount": "500"}, {"item": "Garlic", "unit": "cup", "amount": "1/4"}, {"item": "Lemon or lime", "unit": "pc", "amount": "1"}, {"item": "Onion", "unit": "pc", "amount": "1 "}, {"item": "Salt and pepper to taste", "unit": null, "amount": null}]',
                'instructions' => '<ul><li>&nbsp;Boil 5L of water over medium-high heat and add the Lobo Chinese Five Spice blend powder.&nbsp;</li><li>&nbsp;Add salt, pepper, marble potatoes, Hungarian sausage, lemon, onions, and garlic. Cover and boil for 10 minutes.</li><li>&nbsp;Add corn and cook for 5 minutes.</li><li>&nbsp;Add crab and cook for 5 minutes.&nbsp;</li><li>&nbsp;Add Sea Chef shrimp and cook for another 3 to 4 minutes.&nbsp;</li><li>&nbsp;Drain off water and pour the contents into a serving tray.&nbsp;</li></ul>',
                'is_published' => true,
            ],
            [
                'recipe_name' => 'Pork Adobo',
                'slug' => 'pork-adobo',
                'description' => null,
                'ingredients' => '[{"item": "Pork belly", "unit": "lbs", "amount": "2"}, {"item": "garlic (minced or crushed)", "unit": "tbsp", "amount": "2"}, {"item": "bay leaves", "unit": "pcs", "amount": "2"}, {"item": "vinegar", "unit": "tbsp ", "amount": "4"}, {"item": "Kikkoman Soy Sauce Koikuchi", "unit": "cup ", "amount": "1/2 "}, {"item": " peppercorn", "unit": "tbsp ", "amount": "1"}, {"item": "water", "unit": "cups ", "amount": "2"}, {"item": "stock", "unit": "cup ", "amount": "1"}, {"item": "Salt to taste", "unit": null, "amount": null}]',
                'instructions' => '<ul><li>Mix pork belly with soy sauce, vinegar, bay leaves, peppercorn, and garlic.</li><li>Sear the marinated pork until brown on all sides, then set aside.</li><li>In the same pan, saute garlic until fragrant.</li><li>Put back the pork into the pan, cover, and bring to a boil.</li><li>Once boiling, add the stock.</li><li>Simmer for 20 to 25 minutes or until the pork is tender.</li><li>Transfer to a platter and serve hot.</li></ul>',
                'is_published' => true,
            ],
            [
                'recipe_name' => 'Spring Rolls',
                'slug' => 'spring-rolls',
                'description' => null,
                'ingredients' => '[{"item": "spring roll wrappers", "unit": null, "amount": "20"}, {"item": "King Chef canned shiitake mushrooms", "unit": null, "amount": "6 "}, {"item": "skinless, boneless chicken thighs", "unit": "g ", "amount": "230"}, {"item": "raw Sea Chef shrimp, deveined", "unit": "g", "amount": "110"}, {"item": "cabbage, shredded", "unit": "g ", "amount": "600"}, {"item": "sea salt", "unit": "tsp ", "amount": "1 "}, {"item": "cornstarch mixed with 3 tbsp mushroom soaking liquid", "unit": "tbsp ", "amount": "1 1/2 "}, {"item": "egg", "unit": null, "amount": "1"}, {"item": "onion", "unit": "tbsp ", "amount": "2 "}, {"item": " garlic", "unit": "tsp ", "amount": "2"}, {"item": "celery", "unit": "cup", "amount": "1/4 "}, {"item": "oyster sauce", "unit": "tbsp", "amount": "2 "}, {"item": "spring onions", "unit": "tsp ", "amount": "1"}, {"item": "shaoxing wine", "unit": "tbsp ", "amount": "1 "}, {"item": "dark soy sauce", "unit": "tbsp", "amount": "2 "}]',
                'instructions' => '<ul><li>Heat the pan with oil and saute onion, celery, and garlic.</li><li>Add chicken thighs, then light soy sauce and oyster sauce. Stir-fry and season with white pepper and salt.</li><li>Cook for a minute, then add dark soy sauce.</li><li>Add King Chef shiitake mushroom and shrimp, then season with sugar.</li><li>Add shaoxing wine, shredded cabbage, and cornstarch slurry. Stir-fry until softened.</li><li>Place around 2 spoons of filling in the wrapper center. Tuck sides and roll, sealing edges with flour mixture.</li><li>Deep-fry until golden and crispy. Drain and serve.</li></ul>',
                'is_published' => true,
            ],
            [
                'recipe_name' => 'Longevity Noodles with Chicken and Mushroom',
                'slug' => 'longevity-noodles-with-chicken-and-mushroom',
                'description' => null,
                'ingredients' => '[{"item": "fresh noodles", "unit": "oz", "amount": "16 "}, {"item": "boneless chicken breast", "unit": "oz", "amount": "6 "}, {"item": "King Chef shiitake mushroom", "unit": "pcs ", "amount": "12 "}, {"item": "Chinese chives, chopped", "unit": " cup ", "amount": "3/4"}, {"item": "carrot, julienned", "unit": null, "amount": "1"}, {"item": "scallions, chopped", "unit": "cup", "amount": "1/4 "}, {"item": "oyster sauce", "unit": "tbsp", "amount": "5 "}, {"item": "water", "unit": "cups", "amount": "6 "}, {"item": "shaoxing cooking wine", "unit": "cup", "amount": "1/4"}, {"item": "King Chef canola oil", "unit": "tbsp", "amount": "3"}, {"item": "ground black pepper", "unit": "tsp", "amount": "1/8 "}, {"item": "dark soy sauce", "unit": "tbsp ", "amount": "1 "}, {"item": "chicken broth", "unit": "cup", "amount": "1/2"}]',
                'instructions' => '<ul><li>Over medium-high heat, add oil in a wok. Add chicken and stir-fry for 3 minutes or until cooked. Set aside.</li><li>Add shrimp, season with salt and pepper, and stir-fry for 3 minutes. Set aside.</li><li>In the same wok, saute onion and garlic. Add dark soy sauce and shaoxing wine.</li><li>Add cooked chicken, carrots, and shiitake mushroom. Pour in chicken broth and mix.</li><li>Add noodles and toss gently for 1 to 2 minutes until evenly coated.</li><li>Add chives, spring onions, and cooked shrimp. Plate and serve.</li></ul>',
                'is_published' => true,
            ],
            [
                'recipe_name' => 'Pad Thai',
                'slug' => 'pad-thai',
                'description' => null,
                'ingredients' => '[{"item": "King Chef canola oil", "unit": "tbsp", "amount": "4 "}, {"item": "Sea Chef shrimp", "unit": "pcs ", "amount": "8 "}, {"item": "chicken thigh fillet, diced", "unit": "pcs ", "amount": "4 "}, {"item": "garlic, chopped finely", "unit": "tbsp ", "amount": "2 "}, {"item": "onions, chopped finely", "unit": "tbsp ", "amount": "3 "}, {"item": "firm tofu, diced", "unit": "squares ", "amount": "2 "}, {"item": "Lami Rice Noodle 200g (soaked in warm water for 10 minutes)", "unit": "pack ", "amount": "1 "}, {"item": "Thai Dancer Pad Thai Stir-Fry Sauce", "unit": "cup ", "amount": "1 "}, {"item": "eggs", "unit": "pcs", "amount": "2 to 3 "}, {"item": "bean sprouts", "unit": "cups ", "amount": "2 "}, {"item": "chives, cut into 3-inch strips", "unit": "cup ", "amount": "1/2"}]',
                'instructions' => '<ul><li>Heat oil in a wok and add some garlic.</li><li>Cook shrimp until pink, then remove.</li><li>Brown chicken until half-cooked.</li><li>Add remaining garlic and onions.</li><li>Add tofu and noodles, then saute.</li><li>Add Pad Thai sauce and toss evenly.</li><li>Push noodles aside and add eggs. Cook and combine.</li><li>Return cooked shrimp to the pan.</li><li>Add bean sprouts and some chives, then toss.</li><li>Remove from heat and garnish with remaining chives.</li></ul>',
                'is_published' => true,
            ],
            [
                'recipe_name' => 'Cantonese Wonton Soup',
                'slug' => 'cantonese-wonton-soup',
                'description' => null,
                'ingredients' => '[{"item": "wonton wrappers (around 50)", "unit": "pack ", "amount": "1 "}, {"item": "shell-on medium shrimp (or 1 lb 10 oz deshelled)", "unit": " lbs", "amount": "2"}, {"item": "shaoxing wine", "unit": "tbsp ", "amount": "2 "}, {"item": "cornstarch", "unit": "tbsp ", "amount": "2 "}, {"item": "salt", "unit": "tsp ", "amount": "1 "}, {"item": "sugar", "unit": "tsp ", "amount": "1 "}, {"item": "sesame oil", "unit": "tsp", "amount": "1"}, {"item": "white pepper powder", "unit": "tsp", "amount": "1"}, {"item": "egg white", "unit": "pc", "amount": "1 "}]',
                'instructions' => '<ul><li>In a bowl, mix Sea Chef shrimp with shaoxing wine.</li><li>Add cornstarch, salt, sugar, sesame oil, and white pepper.</li><li>Add egg white and combine well. Set aside.</li><li>Place 1 tablespoon of filling on a wrapper and fold to seal.</li><li>Repeat until all filling or wrappers are used.</li><li>Boil broth, cook wontons, and serve hot.</li></ul>',
                'is_published' => true,
            ],
            [
                'recipe_name' => 'Coconut Milk Shake',
                'slug' => 'coconut-milk-shake',
                'description' => null,
                'ingredients' => '[{"item": "vanilla ice cream", "unit": "cups", "amount": "2 "}, {"item": "Coconut flakes (optional)", "unit": null, "amount": null}, {"item": "crushed ice", "unit": "cup ", "amount": "1 "}, {"item": "Vico Rich Coconut Milk", "unit": "cup ", "amount": "2/3 "}, {"item": "Vico Fresh Natural Coconut Water", "unit": "cup ", "amount": "2/3"}]',
                'instructions' => '<ul><li>Add all ingredients to a blender.</li><li>Blend until smooth and creamy.</li><li>Pour into a chilled glass and top with coconut flakes if desired.</li></ul>',
                'is_published' => true,
            ],
            [
                'recipe_name' => 'Bubble Milk Tea',
                'slug' => 'bubble-milk-tea',
                'description' => null,
                'ingredients' => '[{"item": "hot water", "unit": "ml ", "amount": "500"}, {"item": "cold water", "unit": "ml ", "amount": "1000"}, {"item": "MEET U Milk White Tea 3-in-1", "unit": "pack ", "amount": "1 "}, {"item": "Cooked tapioca pearls", "unit": null, "amount": null}]',
                'instructions' => '<ul><li>Pour hot water to dissolve the milk tea powder.</li><li>Stir until fully dissolved.</li><li>Add cold water and stir.</li><li>Add tapioca pearls.</li><li>Pour in a glass and enjoy.</li></ul>',
                'is_published' => true,
            ],
        ];

        foreach ($recipes as $recipe) {
            DB::table('recipes')->updateOrInsert(['slug' => $recipe['slug']], $recipe);
        }
    }
}
