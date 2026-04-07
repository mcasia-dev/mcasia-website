# Homepage Documentation

## 1. Purpose of the Homepage

The homepage is the public landing page of the McAsia website. Its job is to introduce the company, highlight important business sections, promote products and brands, and direct visitors to recipes and other internal pages.

From a system perspective, the homepage is:

- a Laravel `GET` route
- handled by `PublicPageController`
- populated from the `home_pages` database table
- rendered through Blade templates and reusable Blade components
- partially managed through the Filament admin panel

## 2. Homepage Route

The homepage route is defined in [`routes/web.php`](/C:/laragon/www/mcasia_website/routes/web.php).

```php
Route::get('/', 'home')->name('home');
```

This means:

- URL: `/`
- HTTP method: `GET`
- controller method: `PublicPageController::home()`
- route name: `home`

When a user opens the website root URL, Laravel sends the request to the `home()` method.

## 3. Request Flow Step by Step

### Step 1: User visits `/`

The browser requests the homepage URL.

### Step 2: Laravel matches the route

Laravel checks [`routes/web.php`](/C:/laragon/www/mcasia_website/routes/web.php) and finds the `home` route inside the `PublicPageController` group.

### Step 3: Controller loads homepage content

The main logic is inside [`app/Http/Controllers/PublicPageController.php`](/C:/laragon/www/mcasia_website/app/Http/Controllers/PublicPageController.php).

The `home()` method performs these actions:

1. It loads the latest published `HomePage` record.
2. It eager-loads the related SEO record using `with('seo')`.
3. It reads selected featured brand IDs from the JSON `blocks` field.
4. It loads active brands from the `brands` table with their media.
5. It preserves the brand order if the admin selected a custom order.
6. It decides whether to render the new homepage (`home.blade.php`) or the fallback legacy homepage (`home-legacy.blade.php`).
7. It passes SEO fallback data to the layout.

### Step 4: Blade layout is loaded

The homepage view extends [`resources/views/layouts/app.blade.php`](/C:/laragon/www/mcasia_website/resources/views/layouts/app.blade.php).

This layout provides:

- HTML document structure
- SEO meta rendering
- global header include
- Vite CSS and JavaScript
- external libraries such as AOS, Swiper, Alpine, jQuery, Tailwind CDN
- Google Tag Manager setup

### Step 5: Homepage sections are rendered

The main page view is [`resources/views/home.blade.php`](/C:/laragon/www/mcasia_website/resources/views/home.blade.php).

It reads:

```php
$sections = $homePage->blocks ?? [];
```

This means the page content is driven by the JSON `blocks` column from the `home_pages` table.

Then it renders these section components in order:

1. `x-home.banner`
2. `x-home.home-to-your-asian-cravings`
3. `x-home.our-products`
4. `x-home.our-recipes`
5. footer include

## 4. Files Involved in the Homepage

### Route File

- [`routes/web.php`](/C:/laragon/www/mcasia_website/routes/web.php)

Purpose:
Defines that `/` uses `PublicPageController::home()`.

### Controller

- [`app/Http/Controllers/PublicPageController.php`](/C:/laragon/www/mcasia_website/app/Http/Controllers/PublicPageController.php)

Purpose:
Contains the business logic for collecting homepage content, featured brands, and SEO fallback values.

### Main Model

- [`app/Models/PublicPage/HomePage.php`](/C:/laragon/www/mcasia_website/app/Models/PublicPage/HomePage.php)

Purpose:
Represents the `home_pages` table and casts the `blocks` field into an array.

Important details:

- `blocks` is cast as `array`
- `is_published` is cast as `boolean`
- `scopeIsPublished()` filters published homepage entries

### Supporting Model for Brands

- [`app/Models/Brand.php`](/C:/laragon/www/mcasia_website/app/Models/Brand.php)

Purpose:
Provides the featured brand data shown in the homepage brand section.

Important details:

- uses Spatie Media Library
- loads logo and banner collections
- filters only active brands through `scopeIsActive()`

### Database Migration

- [`database/migrations/2026_03_17_100000_create_home_pages_table.php`](/C:/laragon/www/mcasia_website/database/migrations/2026_03_17_100000_create_home_pages_table.php)

Purpose:
Creates the `home_pages` table.

Main columns:

- `id`
- `name`
- `slug`
- `blocks` as JSON
- `is_published`
- timestamps

### Main Homepage View

- [`resources/views/home.blade.php`](/C:/laragon/www/mcasia_website/resources/views/home.blade.php)

Purpose:
Assembles the homepage sections and passes data to the Blade components.

### Fallback Homepage View

- [`resources/views/home-legacy.blade.php`](/C:/laragon/www/mcasia_website/resources/views/home-legacy.blade.php)

Purpose:
Used only when no published structured homepage record exists or when `blocks` is empty.

### Layout

- [`resources/views/layouts/app.blade.php`](/C:/laragon/www/mcasia_website/resources/views/layouts/app.blade.php)

Purpose:
Shared page shell for public pages.

### Header

- [`resources/views/components/header.blade.php`](/C:/laragon/www/mcasia_website/resources/views/components/header.blade.php)

Purpose:
Builds the navigation dynamically from database-backed product categories, our edge pages, and sales avenue categories when tables are available.

Subcomponents used by the header:

- [`resources/views/components/header/desktop.blade.php`](/C:/laragon/www/mcasia_website/resources/views/components/header/desktop.blade.php)
- [`resources/views/components/header/mobile.blade.php`](/C:/laragon/www/mcasia_website/resources/views/components/header/mobile.blade.php)
- [`resources/views/components/header/search-modal.blade.php`](/C:/laragon/www/mcasia_website/resources/views/components/header/search-modal.blade.php)
- [`resources/views/components/header/styles.blade.php`](/C:/laragon/www/mcasia_website/resources/views/components/header/styles.blade.php)
- [`resources/views/components/header/scripts.blade.php`](/C:/laragon/www/mcasia_website/resources/views/components/header/scripts.blade.php)

### Footer

- [`resources/views/components/footer.blade.php`](/C:/laragon/www/mcasia_website/resources/views/components/footer.blade.php)
- [`app/View/Components/Footer.php`](/C:/laragon/www/mcasia_website/app/View/Components/Footer.php)

Purpose:
Displays company contact details, legal links, email addresses, and social links.

Note:
In the current homepage implementation, the footer is included with `@include('components.footer')` instead of the component tag `<x-footer />`, even though a component class exists.

## 5. Homepage Blade Components

## 5.1 Banner Section

- [`resources/views/components/home/banner.blade.php`](/C:/laragon/www/mcasia_website/resources/views/components/home/banner.blade.php)

Purpose:
Displays the full-screen hero banner at the top of the homepage.

What it does:

- reads `blocks.banner`
- loads banner images from storage
- falls back to default static images if no custom images exist
- shows eyebrow text, title, and CTA button
- rotates hero images automatically with JavaScript
- allows manual slide selection through dot buttons

Expected data inside `blocks.banner`:

- `eyebrow`
- `title`
- `button_label`
- `button_url`
- `images`

## 5.2 Home To Your Asian Cravings Section

- [`resources/views/components/home/home-to-your-asian-cravings.blade.php`](/C:/laragon/www/mcasia_website/resources/views/components/home/home-to-your-asian-cravings.blade.php)

Purpose:
Shows four informational cards that guide users to key areas of the website.

What it does:

- reads `blocks.home_to_your_asian_cravings.items`
- pads the array to exactly four cards
- applies default fallback card content if items are missing
- renders title, description, image, and CTA per card

Default card targets:

- About Us
- Our Impact
- Our Channel
- Reach Us

## 5.3 Our Products Section

- [`resources/views/components/home/our-products.blade.php`](/C:/laragon/www/mcasia_website/resources/views/components/home/our-products.blade.php)

Purpose:
Introduces the company product portfolio and leads users to the products pages.

What it does:

- reads `blocks.our_products`
- shows a rotating product highlight image
- renders section title, description, and CTA button
- includes the featured brands subsection

Expected data inside `blocks.our_products`:

- `title`
- `description`
- `button_label`
- `button_url`
- `highlights`
- `brand_ids`

## 5.4 Our Brands Subsection

- [`resources/views/components/home/our-brands.blade.php`](/C:/laragon/www/mcasia_website/resources/views/components/home/our-brands.blade.php)

Purpose:
Displays featured brand logos below the product section.

What it does:

- receives `$brands` from the controller
- prefers database-driven brands if available
- falls back to a hardcoded logo list when database brands are empty
- links to `/brands/{slug}` when a brand slug exists

Observation:
This component directly accesses `$brand->media[0]->original_url`, so it assumes each featured brand already has media attached.

## 5.5 Our Recipes Section

- [`resources/views/components/home/our-recipes.blade.php`](/C:/laragon/www/mcasia_website/resources/views/components/home/our-recipes.blade.php)

Purpose:
Promotes the recipes area and sends users to `/recipes`.

What it does:

- reads `blocks.our_recipes`
- displays a banner image
- renders eyebrow, title, description, and button
- uses a default recipe banner if no uploaded banner exists

Expected data inside `blocks.our_recipes`:

- `eyebrow`
- `title`
- `description`
- `button_label`
- `button_url`
- `banner_image`

## 6. SEO Flow

The homepage uses reusable SEO support.

Relevant files:

- [`app/Traits/HasSeo.php`](/C:/laragon/www/mcasia_website/app/Traits/HasSeo.php)
- [`resources/views/components/seo/seo-head.blade.php`](/C:/laragon/www/mcasia_website/resources/views/components/seo/seo-head.blade.php)
- [`resources/views/layouts/app.blade.php`](/C:/laragon/www/mcasia_website/resources/views/layouts/app.blade.php)

How it works:

1. `HomePage` uses the `HasSeo` trait.
2. The controller loads the `seo` relation with the homepage record.
3. The controller sends `seoMeta`, `seoFallbackTitle`, `seoFallbackDescription`, and `seoFallbackImage` to the view.
4. The layout renders `<x-seo.seo-head />`.
5. The SEO component outputs title, meta description, canonical URL, Open Graph tags, Twitter tags, and optional schema.

Why this matters:

- SEO can be managed per homepage record.
- If SEO data is missing, the system still generates safe fallback metadata.

## 7. Data Structure of `blocks`

The homepage content is stored in a single JSON column named `blocks`.

The structure currently used by the code is conceptually like this:

```json
{
  "banner": {
    "eyebrow": "Our Story",
    "title": "HOME TO YOUR ASIAN CRAVINGS",
    "button_label": "Read More",
    "button_url": "/our-story",
    "images": []
  },
  "home_to_your_asian_cravings": {
    "items": []
  },
  "our_products": {
    "title": "Our Products",
    "description": "...",
    "button_label": "All Products",
    "button_url": "/products/cooking-essentials/cooking-essentials-canned-goods",
    "highlights": [],
    "brand_ids": []
  },
  "our_recipes": {
    "eyebrow": "Recipes",
    "title": "Cook Like A Chef!",
    "description": "...",
    "button_label": "View Recipes",
    "button_url": "/recipes",
    "banner_image": null,
    "recipe_ids": []
  }
}
```

This JSON-driven design makes the homepage flexible because most text, images, and links can be changed without editing Blade files directly.

## 8. Admin Management of the Homepage

The homepage content is managed in Filament through:

- [`app/Filament/Resources/HomePageResource.php`](/C:/laragon/www/mcasia_website/app/Filament/Resources/HomePageResource.php)

Purpose:
Provides the CMS form for homepage content editing.

Important admin features:

- page details: `name`, `slug`, `is_published`
- Banner section editor
- four fixed homepage cards
- product highlights editor
- featured brands selector
- recipes section editor
- SEO tab

Important implementation detail:

The resource dynamically builds button route options from the current Laravel web routes. This helps admins choose internal links without manually typing URLs.

## 9. Design and Architecture Notes

### Strengths

- clear separation between route, controller, model, view, and reusable components
- homepage content is CMS-driven through JSON blocks
- SEO is reusable and centralized
- brand data is database-backed
- fallback content prevents the page from breaking when records are incomplete

### Practical Notes

- the layout always includes the global header
- the homepage manually includes the footer
- several homepage components include inline `<style>` and `<script>` blocks for section-specific behavior
- animations rely on AOS and custom JavaScript
- image URLs from uploaded files are generated through `Storage::disk('public')->url(...)`
********
## 10. Summary of the Homepage Lifecycle

In simple terms, the homepage works like this:

1. The visitor opens `/`.
2. Laravel routes the request to `PublicPageController::home()`.
3. The controller loads the latest published homepage record plus SEO.
4. The controller loads featured brands based on `blocks.our_products.brand_ids`.
5. Laravel renders `resources/views/home.blade.php`.
6. The layout injects the global header, SEO tags, CSS, and JS.
7. Blade components render each homepage section using the JSON `blocks` data.
8. The footer is appended at the end of the page.
