# Recipes Documentation

## 1. Introduction

The `Recipes` module is one of the main public content sections of the McAsia website. Its purpose is to present recipe ideas that use McAsia products and ingredients, allowing visitors to explore food inspirations, cooking steps, and serving suggestions.

This module is composed of two related public pages:

- the recipes listing page
- the recipe details page

The listing page allows users to browse all published recipes, while the details page allows users to open a specific recipe and view its full content such as ingredients, cooking instructions, image, and optional recipe video.

From a system perspective, the `Recipes` module demonstrates:

- Laravel route grouping
- listing and details page structure
- slug-based page retrieval
- media handling for recipe images and videos
- content formatting through a service class
- pagination
- SEO integration
- admin-side recipe management through Filament

Because of this design, the recipe section is not just a static page. It is a reusable, database-driven content module.

## 2. Purpose of the Recipes Module

The `Recipes` module has both user-facing and system-facing purposes.

From the user’s perspective, the recipes section helps visitors:

- browse available recipes
- open detailed preparation guides
- view supporting recipe images
- watch recipe videos when available
- discover products through food content

From the technical perspective, the module is useful because it:

- separates list and detail concerns properly
- uses a formatter service to clean and normalize content
- supports structured ingredient data
- converts rich text instructions into readable step lists
- uses SEO for better visibility and sharing

This makes the module suitable for both marketing and practical culinary content delivery.

## 3. Route Definitions

The routes are defined in `routes/web.php`.

```php
Route::get('/recipes', 'recipes')->name('recipes');
Route::get('/recipes/{slug}', 'recipeShow')->name('recipes.show');
```

These routes mean:

- `/recipes` loads the recipes listing page
- `/recipes/{slug}` loads one recipe details page

The second route uses a slug parameter to identify a specific recipe record.

## 4. Step-by-Step Request Flow

The recipe module has two main request flows:

- listing flow
- details flow

## 5. Recipes Listing Flow

### Step 1: User visits `/recipes`

The browser sends a request to the recipes URL.

### Step 2: Laravel matches the route

Laravel checks `routes/web.php` and matches the request to:

- `PublicPageController::recipes()`

### Step 3: Controller retrieves recipe records

Inside `app/Http/Controllers/PublicPageController.php`, the `recipes()` method performs the main listing logic.

It:

1. queries the `Recipe` model
2. includes related media
3. filters only published records
4. orders the records
5. paginates them by 15 items
6. formats each record through `RecipeService::formatRecipe()`
7. returns the recipes Blade view

### Step 4: Blade view renders recipe cards

The view receives the paginated, formatted recipes and renders them as clickable recipe cards.

## 6. Recipe Details Flow

### Step 1: User visits `/recipes/{slug}`

The browser sends a request using the recipe slug in the URL.

### Step 2: Laravel matches the route

Laravel checks `routes/web.php` and matches the request to:

- `PublicPageController::recipeShow(string $slug)`

### Step 3: Controller finds the recipe

The controller:

1. loads one published recipe by slug
2. includes media and SEO
3. throws `404` automatically if the recipe does not exist
4. formats the recipe through `RecipeService::formatRecipe()`
5. returns the details view

### Step 4: Blade view renders recipe details

The details view receives a formatted recipe array and renders:

- recipe title
- image or video
- description
- ingredients
- cooking steps
- back link to the listing page

## 7. Controller Explanation

The controller methods are found in:

- `app/Http/Controllers/PublicPageController.php`

## 8. `recipes()` Method

The `recipes()` method is responsible for displaying the public list of recipes.

Its main responsibilities are:

- loading all published recipe records
- eager-loading media
- paginating the collection
- formatting each recipe into a display-friendly structure
- passing the data to the listing view
- building SEO fallback data

This method is important because it handles list rendering without placing content-formatting logic directly into the Blade file.

## 9. `recipeShow()` Method

The `recipeShow()` method is responsible for displaying one recipe details page.

Its main responsibilities are:

- finding the recipe by slug
- loading media and SEO
- formatting the recipe
- passing the result to the detail view
- preparing SEO fallback values

This creates a clean separation between routing, data retrieval, and view rendering.

## 10. Recipe Model

The main model used by this module is:

- `app/Models/PublicPage/Recipe.php`

This model represents the `recipes` table in the database.

## 11. Main Responsibilities of the Model

The model is responsible for:

- storing recipe information
- storing the recipe slug
- storing ingredients
- storing cooking instructions
- handling publish status
- handling recipe image and video uploads
- storing SEO metadata

## 12. Important Fields

The fillable fields include:

- `recipe_name`
- `slug`
- `description`
- `ingredients`
- `instructions`
- `is_published`

These fields contain both the text and structured content needed by the recipe pages.

## 13. Casts

The model casts:

- `ingredients` as an array
- `is_published` as a boolean

Casting `ingredients` as an array is especially important because it allows the application to store structured ingredient data in JSON form while still using it conveniently in PHP.

## 14. Media Collections

The model uses Spatie Media Library and defines:

- `recipe-image`
- `recipe-video`

This allows the admin to upload:

- a thumbnail or main recipe image
- an optional recipe video

These media files are then used by the public recipe pages.

## 15. Query Scope

The model defines:

- `scopeIsPublished()`

This ensures only published recipes are shown on the public website.

## 16. Database Structure

The `recipes` table is created by:

- `database/migrations/2026_03_16_013025_create_recipes_table.php`

## 17. Main Columns in the Table

Important columns include:

- `id`
- `recipe_name`
- `slug`
- `description`
- `ingredients`
- `instructions`
- `is_published`
- `created_at`
- `updated_at`

## 18. Purpose of the Columns

`recipe_name`
: stores the title of the recipe

`slug`
: stores the unique URL identifier

`description`
: stores the short recipe explanation or introduction

`ingredients`
: stores ingredient data in JSON form

`instructions`
: stores the recipe preparation content, usually as rich HTML

`is_published`
: determines whether the recipe is visible publicly

This table design is simple but effective for recipe-based content.

## 19. Recipe Service

One of the most important parts of the module is the formatter service:

- `app/Services/RecipeService.php`

This service is used to convert raw recipe records into clean display-ready arrays.

## 20. Purpose of the Recipe Service

The service exists because recipe content requires additional formatting before it can be displayed well.

It handles:

- ingredient normalization
- instruction parsing
- media URL preparation
- title and description formatting

This keeps the controller cleaner and avoids putting transformation logic directly in the Blade views.

## 21. Ingredient Formatting

The service reads the `ingredients` field and transforms each item into a normalized string.

For each ingredient, it combines:

- amount
- unit
- ingredient name

This is important because ingredient data can be stored as a structured array rather than one long text block.

## 22. Instruction Parsing

The service also converts rich instruction HTML into a list of plain instruction steps.

It does this by:

1. loading the HTML into `DOMDocument`
2. looking for list items first
3. falling back to paragraphs when needed
4. stripping and normalizing text
5. returning a clean step array

This improves the recipe details page because it displays instructions as a structured numbered list instead of raw HTML blocks.

## 23. Media Formatting

The service also prepares:

- recipe image URL
- recipe video URL

It uses fallback image values when necessary, which ensures the listing page still looks complete even when a record is missing its main media.

## 24. Recipes Listing View

The public listing view is:

- `resources/views/recipes.blade.php`

This page displays all published recipes in a card-based layout.

## 25. Parts of the Listing View

### 25.1 Banner Slideshow

At the top of the listing page, the view displays a slideshow area using multiple static images.

This acts as the visual hero of the recipes page and creates a stronger promotional presentation.

### 25.2 Section Header

The page includes a header area showing:

- a small section kicker
- the page title `Recipes`
- the total recipe count

This gives the user context about how many items are available.

### 25.3 Recipe Card Grid

The main body of the page renders each recipe as a card containing:

- recipe image
- title
- shortened description
- “View details” prompt

Each card links to the details route using the recipe slug.

### 25.4 Empty State

If there are no recipes, the page shows a fallback message:

- `No recipes available yet.`

### 25.5 Pagination

If the paginated result contains multiple pages, the view renders Laravel pagination links.

### 25.6 Footer

The page ends with the shared footer using:

```php
@include('components.footer')
```

### 25.7 Additional Script

The listing page pushes:

- `resources/js/consumer_products.js`

This indicates that front-end recipe listing behavior can be extended through the site’s JavaScript assets.

## 26. Recipe Details View

The detailed recipe page is:

- `resources/views/recipe-details.blade.php`

This view shows one complete recipe.

## 27. Parts of the Details View

### 27.1 Media Area

At the top of the page, the view displays:

- the recipe video if available
- otherwise the recipe image

This allows multimedia support for recipe presentation.

### 27.2 Title and Description

The page then displays:

- a section kicker
- the recipe title
- optional description text

### 27.3 Back Link

The details page includes a back button linking to:

- `route('recipes')`

This returns the user to the recipe list.

### 27.4 Ingredients Section

The ingredients area loops through the formatted ingredients array and shows each ingredient in a card-like row.

If no ingredients are available, the page displays:

- `No ingredients listed.`

### 27.5 Cooking Instructions Section

The cooking instructions area loops through the parsed instruction steps and shows them as numbered steps.

If no instructions are available, the page displays:

- `No instructions listed.`

### 27.6 Footer

The page ends with the shared footer.

## 28. SEO Handling

The recipes module uses the shared SEO structure of the website.

Relevant files include:

- `app/Traits/HasSeo.php`
- `resources/views/components/seo/seo-head.blade.php`
- `resources/views/layouts/app.blade.php`

For the listing page, the controller provides fallback SEO values for the recipes section as a whole.

For the recipe details page, the controller uses:

- recipe name
- recipe description
- `recipe-image` media collection

This allows each individual recipe page to have its own SEO metadata.

## 29. Admin Management

The recipe content is managed through:

- `app/Filament/Resources/RecipeResource.php`

This resource allows administrators to create and edit recipes from the Filament admin panel.

## 30. Fields in the Admin Panel

The resource allows administrators to manage:

- recipe name
- slug
- description
- ingredients repeater
- instructions rich editor
- thumbnail image
- recipe video
- publish status
- SEO settings

### Automatic slug generation

The slug is automatically generated from the recipe name using `Str::slug()`. This improves consistency in public URLs.

### Ingredients repeater

The ingredients are managed through a repeater with fields for:

- ingredient item
- amount
- unit

This supports structured storage and cleaner formatting.

### Instructions editor

The cooking instructions are entered through a rich editor, which allows formatting while still being parsed later by the service.

## 31. Data Flow Summary

The complete data flow of the module is:

1. the user opens `/recipes`
2. Laravel routes the request to `PublicPageController::recipes()`
3. the controller loads published recipes
4. `RecipeService` formats the records
5. the listing view renders recipe cards
6. the user clicks one card
7. the browser opens `/recipes/{slug}`
8. the controller loads the selected recipe
9. `RecipeService` formats the record again
10. the details view renders the full recipe

## 32. Strengths of the Implementation

The `Recipes` module has several strengths:

- clear separation of listing and details pages
- slug-based detail routing
- structured ingredient storage
- media support for image and video
- rich instruction parsing
- SEO support
- pagination
- admin-side content management through Filament

These features make the module scalable and maintainable.

## 33. Observations

Some practical observations about the implementation are:

- recipe formatting is handled well through a dedicated service
- the views remain relatively clean because the service prepares display-ready arrays
- the module is suitable for future expansion such as categories, featured recipes, or search
- the listing page hero slideshow uses static images rather than dynamically linked recipe records

These are useful points for discussion in a capstone or thesis report.

## 34. Conclusion

The `Recipes` module is a well-structured Laravel content module that combines public listing and details pages, slug-based routing, database-driven content, media handling, structured ingredient storage, rich instruction parsing, and SEO integration.

From a thesis or capstone perspective, it is a strong example of how a content-focused feature can be designed in a modular and maintainable way using:

- Laravel routing
- Eloquent models
- Blade views
- service-based formatting
- Filament admin management

This makes the recipes section both user-friendly for visitors and practical for administrators to maintain.
