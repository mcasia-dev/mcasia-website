# Sales Avenue Documentation

## 1. Introduction

The `Sales Avenue` page is one of the public business presentation pages of the McAsia website. Its main purpose is to present the company’s sales channels, market segments, and business avenue categories in a structured and visually organized format. This page helps users understand how McAsia products are distributed, presented, or positioned across different sales environments.

From a technical perspective, the `Sales Avenue` page is not a single static page. It is a dynamic page structure that uses a category slug to determine which content should be loaded. This means one route can support multiple sales avenue pages, each with its own title, content, images, and SEO settings.

The implementation follows Laravel’s MVC structure:

- the route receives the request
- the controller handles the request and loads the correct category and related records
- the models represent the category and sales avenue data
- the Blade view renders the final page
- the Filament admin panel manages the content

Because of this design, the `Sales Avenue` section is scalable. Additional sales avenue categories can be created without needing to define new routes or duplicate Blade files.

## 2. Route Definition

The route for this module is defined in `routes/web.php`.

```php
Route::get('/sales-avenue/{slug}', 'salesAvenue')->name('sales-avenue');
```

This route means:

- URL pattern: `/sales-avenue/{slug}`
- HTTP method: `GET`
- controller method: `PublicPageController::salesAvenue()`
- route name: `sales-avenue`

The `{slug}` parameter is important because it identifies which sales avenue category should be shown. For example, different sales avenue categories may be displayed depending on the slug used in the URL.

## 3. Purpose of the Sales Avenue Page

The purpose of the `Sales Avenue` page is to show category-based business content related to McAsia’s sales channels and commercial presence. It serves both informational and navigational purposes.

On the user side, the page helps visitors:

- understand a specific sales avenue category
- view related business content
- browse supporting images and banners
- interact with visual grids that may contain product or channel-related materials

On the system side, the page demonstrates:

- slug-based content loading
- category-to-content relationship mapping
- media gallery rendering
- optional clickable image grid handling
- admin-managed content through Filament

## 4. Step-by-Step Page Flow

### Step 1: User opens a sales avenue URL

The browser requests a URL such as:

`/sales-avenue/{slug}`

At this point, Laravel reads the route parameter and prepares to locate the correct category.

### Step 2: Laravel matches the route

Laravel checks `routes/web.php` and finds the dynamic route for `sales-avenue`.

Because the route belongs to the `PublicPageController` route group, Laravel forwards the request to:

`PublicPageController::salesAvenue(string $slug)`

### Step 3: Controller loads the category and related content

Inside `app/Http/Controllers/PublicPageController.php`, the `salesAvenue()` method performs the main logic.

The method first queries the `SalesAvenueCategory` model. It retrieves the category that matches the given slug and only allows active records to be loaded. It also eager-loads several relationships:

- SEO relation
- related `salesAvenues`
- SEO for each sales avenue
- media for each sales avenue

The query is also configured so that:

- only published sales avenue items are included
- primary items are prioritized first
- titles are sorted alphabetically after primary ordering

If the slug does not match any active category, Laravel automatically returns a `404` page through `firstOrFail()`.

### Step 4: Controller prepares SEO fallback values

After retrieving the category, the controller builds SEO data using the same helper approach used in the other public pages.

The fallback values use:

- category name as title source
- a default descriptive sentence when no custom SEO description is available
- a fallback image when needed

This ensures the page still has SEO metadata even if custom SEO fields are incomplete.

### Step 5: Blade view is rendered

After loading the category and its related sales avenue items, the controller returns:

`resources/views/sales-venue.blade.php`

The view receives:

- `$salesAvenue` as the selected category
- SEO metadata and fallback values

The Blade view then renders all sales avenue items connected to that category.

## 5. Controller Explanation

The `Sales Avenue` page is handled by the `salesAvenue()` method in:

- `app/Http/Controllers/PublicPageController.php`

Its responsibilities are:

1. find the active sales avenue category using the URL slug
2. eager-load related sales avenue records
3. eager-load media and SEO relations
4. sort related sales avenue entries
5. pass the record to the Blade view
6. provide SEO fallback values

This controller method is important because it acts as the bridge between the route parameter and the business content shown to the visitor.

The method also makes use of Eloquent relationship loading to reduce repeated database queries. This is a good practice because it improves efficiency and avoids unnecessary query execution inside the Blade view.

## 6. Main Models Used

The `Sales Avenue` module uses two main models:

- `SalesAvenueCategory`
- `SalesAvenue`

These two models work together to support the page structure.

## 7. SalesAvenueCategory Model

The category model is found in:

- `app/Models/SalesAvenueCategory.php`

This model represents the `sales_avenue_categories` table.

### Main responsibilities of the model

The model is responsible for:

- storing category information
- supporting parent-child hierarchy
- allowing lookup through slugs
- managing active status
- linking categories to multiple sales avenue records
- storing SEO information

### Important fields

The fillable fields include:

- `parent_id`
- `name`
- `slug`
- `level`
- `sort_order`
- `is_active`

### Important methods

The model defines:

- `scopePageBySlug()` to query a category by slug
- `scopeIsActive()` to filter only active records
- `parent()` for parent category relation
- `children()` for child categories
- `salesAvenues()` for many-to-many relationship with sales avenue entries

### SEO support

This model uses the `HasSeo` trait, which means each category can have:

- SEO title
- meta description
- canonical URL
- Open Graph data
- Twitter card data

This improves discoverability when the page is indexed by search engines or shared on social platforms.

## 8. SalesAvenue Model

The sales avenue item model is found in:

- `app/Models/SalesAvenue.php`

This model represents the `sales_avenues` table.

### Main responsibilities of the model

This model stores the actual content items shown inside a selected sales avenue category.

Each sales avenue record may contain:

- a title
- rich text content
- publish status
- image grid configuration
- image field type
- clickable image data
- media banners and gallery images

### Important fields

The fillable fields include:

- `title`
- `content`
- `is_published`
- `grid_no`
- `image_field_type`
- `image_links`

### Casts

The model casts:

- `is_published` as boolean
- `image_links` as array

### Media collections

The model registers two media collections:

- `sales-avenue-banner`
- `sales-avenue-images`

This means the page can support both:

- rotating banner images
- supporting gallery images

### Scope

The model defines `scopeIsPublished()` to ensure only public records are shown.

### Relationship

The model has a `categories()` many-to-many relation that connects each sales avenue item to one or more categories.

## 9. Database Structure

The `Sales Avenue` page relies on multiple database tables and migrations.

### 9.1 Sales Avenue Categories Table

The table is created by:

- `database/migrations/2026_03_16_051404_create_sales_avenue_categories_table.php`

Important columns:

- `id`
- `parent_id`
- `name`
- `slug`
- `level`
- `sort_order`
- `is_active`
- timestamps

This table stores the category hierarchy and allows nested or grouped channel structures.

### 9.2 Sales Avenues Table

The main content table is created by:

- `database/migrations/2026_03_16_053703_create_sales_avenues_table.php`

Important original columns:

- `id`
- `title`
- `content`
- `is_published`
- timestamps

The model also indicates that additional fields such as `grid_no`, `image_field_type`, and `image_links` are used in the current implementation, meaning later migrations extended the original table structure.

### 9.3 Pivot Table

The many-to-many relationship is created by:

- `database/migrations/2026_03_16_055715_create_sales_avenue_sales_avenue_category_table.php`

Important pivot columns:

- `sales_avenue_id`
- `sales_avenue_category_id`
- `is_primary`
- timestamps

This pivot table is important because:

- one category can contain many sales avenue items
- one sales avenue item can belong to many categories
- `is_primary` helps decide which entries should appear first

## 10. Blade View Explanation

The public page is rendered by:

- `resources/views/sales-venue.blade.php`

This Blade file is the main presentation layer of the sales avenue page.

## 11. Parts of the Blade View

### 11.1 Data Preparation

At the beginning of the view, the file sets:

```php
$items = $salesAvenue->salesAvenues ?? collect();
```

This means the page will loop through every sales avenue item related to the currently selected category.

### 11.2 Page Structure

The page uses a full-width `<main>` wrapper and renders each related sales avenue item in sequence.

For every item, the page shows:

- title
- rich content
- back button
- image banner area

### 11.3 Text Content Area

Each item displays the sales avenue title and rich content on the left side of the layout.

The content is rendered using:

```php
{!! $item->content !!}
```

This indicates that the content supports formatted HTML entered through the admin editor.

### 11.4 Back Button

Each item includes a back button using:

```javascript
history.back();
```

This improves navigation and makes it easier for users to return to the previous page.

### 11.5 Banner Slideshow

On the right side of each item, the page renders a slideshow area.

The banner images are collected from:

- `sales-avenue-banner` media collection

If no banner images exist, the page uses a fallback image:

- `images/retail_product/1.jpg`

The view creates a simple JavaScript-driven slideshow that fades between banner images at a fixed interval.

### 11.6 Optional Image Grid

After the main banner section, the view checks whether the sales avenue item contains supporting images.

There are two possible modes:

#### Plain Image Mode

If the `image_field_type` is `plain`, the page loads images from the `sales-avenue-images` media collection and displays them in a responsive grid.

#### Clickable Image Mode

If the `image_field_type` is `clickable`, the page reads image data from the `image_links` array and creates a grid where each image opens a related link when clicked.

This makes the page more flexible because the image area can function either as:

- a simple visual gallery
- a linked navigation or promotional grid

### 11.7 Grid Layout

The number of image columns is determined by:

- `$item->grid_no`

This means the admin can control how many columns appear in the image grid.

### 11.8 Footer

The page ends with:

```php
@include('components.footer')
```

This ensures visual consistency with the rest of the public website.

## 12. Front-End Behavior

The `sales-venue.blade.php` file includes custom JavaScript at the bottom.

### 12.1 Fade-In Scroll Effect

The page uses a `fade-section` class and a scroll listener to apply a `visible` class when sections enter the viewport.

This creates a smoother user experience and makes the content appear progressively.

### 12.2 Banner Rotation

The page also looks for elements marked with:

- `data-sales-carousel`

For each carousel:

1. it collects all slides
2. checks if there is more than one image
3. cycles through them at the configured interval
4. fades images by switching `opacity-100` and `opacity-0`

This gives the page a lightweight slideshow behavior without requiring an external slider library.

## 13. SEO Handling

The `Sales Avenue` page uses the shared SEO pattern found throughout the public site.

The selected `SalesAvenueCategory` is passed into the SEO helper logic, which prepares:

- SEO model data
- fallback title
- fallback description
- fallback image

Since the category model uses the `HasSeo` trait, each sales avenue category can have unique metadata configured in the admin panel.

This is useful because different sales avenues may target different audiences or search keywords.

## 14. Admin Panel Management

The `Sales Avenue` page is managed through two Filament resources:

- `app/Filament/Resources/SalesAvenueCategoryResource.php`
- `app/Filament/Resources/SalesAvenueResource.php`

These resources work together to control the public page structure.

## 15. Sales Avenue Category Admin Resource

The category resource is responsible for managing the category records.

It allows administrators to edit:

- parent category
- category name
- slug
- level
- sort order
- active status
- SEO settings

This resource makes it possible to define the navigational or structural layer of the Sales Avenue module.

## 16. Sales Avenue Admin Resource

The sales avenue item resource manages the content entries shown inside a category.

It allows administrators to manage:

- related categories
- title
- publish status
- grid count
- rich content
- banner images
- image field type
- plain image gallery
- clickable image repeater
- SEO settings

### Flexible image field system

One important feature of this resource is the `image_field_type` selector.

This allows administrators to choose whether the record should use:

- plain uploaded images only
- clickable images with a link assigned to each image

This adds flexibility to the content model without needing different Blade templates for each page type.

## 17. Data Flow Summary

The complete data flow of the `Sales Avenue` page is:

1. the user visits `/sales-avenue/{slug}`
2. Laravel matches the route
3. `PublicPageController::salesAvenue()` is called
4. the controller loads the active category by slug
5. related published sales avenue items are loaded
6. media and SEO data are eager-loaded
7. the category and related items are sent to the Blade view
8. the Blade view renders content, banners, and image grids
9. the footer is displayed

## 18. Strengths of the Implementation

The `Sales Avenue` module has several strengths:

- supports dynamic page loading through slugs
- uses category-to-item relationship mapping
- allows one category to display multiple content items
- supports banners and galleries
- supports clickable images
- includes SEO per category
- is fully manageable through Filament
- uses a scalable structure without duplicate views

## 19. Observations and Notes

There are also some useful observations about the implementation:

- the page content relies heavily on media availability, so banner and grid uploads should be managed carefully
- the Blade file includes both content layout and front-end JavaScript behavior
- the module is category-driven rather than menu-hardcoded, which improves scalability
- the relationship-based design makes it easy to reuse one sales avenue record across multiple categories if needed

These are good discussion points for a thesis chapter under maintainability, extensibility, or system design.

## 20. Conclusion

The `Sales Avenue` page is a dynamic Laravel module that combines category-based routing, relational data modeling, flexible image presentation, SEO handling, and admin-side content management. It is a strong example of how a business information page can be built in a scalable and maintainable way using Laravel, Blade, Spatie Media Library, and Filament.

From a capstone or thesis perspective, this module demonstrates practical use of:

- dynamic routing
- many-to-many relationships
- media management
- content flexibility
- reusable public page architecture
