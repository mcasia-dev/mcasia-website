# Our Impact Documentation

## 1. Introduction

The `Our Impact` page is one of the public corporate information pages of the McAsia website. Its purpose is to explain the value that the company creates through its operations, partnerships, product quality, and contribution to the market and community.

This page is designed as a dynamic content page rather than a fixed static HTML page. Its title, subtitle, description, banner image, and content sections are stored in the database and rendered through Laravel Blade.

From a technical perspective, the `Our Impact` page demonstrates:

- Laravel route-based page rendering
- controller-driven content retrieval
- database-backed public page content
- flexible content blocks
- media handling
- SEO integration
- admin-side page management using Filament

Because of this structure, the page can be maintained and updated through the admin panel without editing the Blade file directly.

## 2. Purpose of the Our Impact Page

The purpose of the `Our Impact` page is to communicate how McAsia creates value beyond simply selling products.

From the visitor’s perspective, the page helps users:

- understand the company’s business impact
- read the company’s broader contribution narrative
- view visual materials related to that message
- explore structured content in a clear page layout

From the system perspective, the page is useful because it:

- stores content in a reusable structured format
- uses a banner and content-block architecture
- supports image and paragraph sections
- supports SEO per page
- allows admin-side maintenance

This makes the page suitable for a corporate website that needs flexible, professional public content.

## 3. Route Definition

The route is defined in `routes/web.php`.

```php
Route::get('/our_impact', 'ourImpact')->name('our_impact');
```

This route means:

- URL: `/our_impact`
- HTTP method: `GET`
- controller method: `PublicPageController::ourImpact()`
- route name: `our_impact`

When the user opens the page URL, Laravel forwards the request to the `ourImpact()` method of `PublicPageController`.

## 4. Step-by-Step Request Flow

### Step 1: User visits `/our_impact`

The browser sends a request to the public `Our Impact` page.

### Step 2: Laravel matches the route

Laravel checks `routes/web.php` and matches the request to:

- `PublicPageController::ourImpact()`

### Step 3: Controller loads the page record

Inside `app/Http/Controllers/PublicPageController.php`, the `ourImpact()` method performs the page-loading logic.

It:

1. loads the latest published `OurImpact` record
2. eager-loads related media
3. eager-loads related SEO data
4. passes the record to the Blade view
5. prepares SEO fallback values

This means the page content is not hardcoded. It comes from the latest published database record.

### Step 4: Blade view renders the page

The controller returns:

- `resources/views/our_impact.blade.php`

The view then displays:

- banner image
- title
- subtitle
- description
- content blocks
- back button
- footer

## 5. Controller Explanation

The page is handled by the `ourImpact()` method in:

- `app/Http/Controllers/PublicPageController.php`

Its responsibilities are:

- loading the latest published `OurImpact` record
- including media and SEO relationships
- providing fallback SEO values
- returning the public Blade view

This controller method is simple but important because it connects the route to the dynamic page content.

## 6. OurImpact Model

The model used by this page is:

- `app/Models/OurImpact.php`

This model represents the `our_impacts` table in the database.

## 7. Responsibilities of the Model

The model is responsible for:

- storing the main page title
- storing the subtitle
- storing the description
- storing structured content blocks
- managing publish status
- handling the page banner image
- supporting SEO metadata

## 8. Important Fields

The fillable fields are:

- `title`
- `subtitle`
- `description`
- `content_blocks`
- `is_published`

These fields contain both the main introductory content and the flexible block-based content of the page.

## 9. Casts

The model casts:

- `content_blocks` as an array
- `is_published` as a boolean

Casting `content_blocks` as an array is very important because it allows the page to store multiple structured sections in JSON form while still accessing them easily in PHP and Blade.

## 10. Media Collection

The model uses Spatie Media Library and defines:

- `our-impact-banner`

This collection stores the banner image shown at the top of the public page.

If no banner is uploaded, the public view uses a fallback image.

## 11. SEO Support

The model uses the `HasSeo` trait.

This means the page can have:

- custom SEO title
- meta description
- canonical URL
- Open Graph metadata
- Twitter metadata

This improves the page’s visibility in search engines and makes shared links appear more complete.

## 12. Query Scope

The model defines:

- `scopeIsPublished()`

This ensures that only published records are shown publicly.

## 13. Database Structure

The table is created by:

- `database/migrations/2026_03_18_090100_create_our_impacts_table.php`

## 14. Main Table Columns

Important columns include:

- `id`
- `title`
- `subtitle`
- `description`
- `content_blocks`
- `is_published`
- `created_at`
- `updated_at`

## 15. Purpose of the Columns

`title`
: stores the page heading

`subtitle`
: stores the supporting introductory text

`description`
: stores the initial descriptive section of the page

`content_blocks`
: stores additional structured content blocks

`is_published`
: determines whether the record is publicly visible

This design allows both fixed introductory data and flexible modular page content.

## 16. Blade View Explanation

The public page view is:

- `resources/views/our_impact.blade.php`

This Blade file is responsible for presenting the `Our Impact` page to the user.

It contains:

- inline CSS
- page banner section
- title and subtitle section
- description area
- flexible content block rendering
- back button
- footer

## 17. Parts of the Blade View

### 17.1 Page Variables

At the top of the Blade file, the page prepares several variables:

- `$pageTitle`
- `$pageSubtitle`
- `$pageDescription`
- `$bannerImage`
- `$blocks`

These variables are derived from the loaded database record, with fallback values when data is missing.

### 17.2 Banner Section

The page begins with a banner container that displays:

- uploaded `our-impact-banner` image when available
- fallback image `images/Everyday Moments/2.png` when needed

This gives the page a visually strong introduction.

### 17.3 Introductory Card

The first main content card displays:

- page title
- page subtitle
- page description

If the description is missing and the page has no content blocks, the view renders fallback text directly in the Blade file. This ensures the page still has meaningful content even if the database record is incomplete.

### 17.4 Dynamic Content Blocks

The page loops through:

- `$blocks = collect($data->content_blocks ?? [])`

Each block can be rendered differently depending on its type.

#### Paragraph block

If the block type is `paragraph`, the page shows:

- optional heading
- rich body text

#### Image block

If the block type is `image`, the page shows:

- uploaded image
- optional caption

This allows the page to support flexible content structure without requiring different templates for each variation.

### 17.5 Back Button

The page includes a back button that uses:

```javascript
history.back();
```

This improves navigation by allowing the user to return to the previous page easily.

### 17.6 Footer

The page ends with the shared footer:

```php
@include('components.footer')
```

This keeps the page consistent with the rest of the public site.

## 18. Front-End Behavior

The `Our Impact` page includes custom JavaScript at the bottom of the Blade file.

## 19. Fade-In Effects

The page uses a `fade-section` class and JavaScript logic to apply the `visible` class when sections enter the viewport.

This creates a smooth reveal effect for the content cards.

## 20. Page Load Transition

The page also adds a `fade-in` class to the body after the window finishes loading, which gives the page a softer initial visual appearance.

## 21. AOS Initialization

The page initializes AOS using:

- `duration: 1000`
- `once: true`

This provides animation support for page elements.

## 22. SEO Handling

The `Our Impact` page uses the shared SEO structure of the public website.

The relevant shared files include:

- `app/Traits/HasSeo.php`
- `resources/views/components/seo/seo-head.blade.php`
- `resources/views/layouts/app.blade.php`

The controller provides:

- the related SEO record
- fallback title
- fallback description
- fallback image

Since the `OurImpact` model uses `HasSeo`, the SEO fields can be managed directly from the admin panel.

## 23. Admin Management

The page is managed through:

- `app/Filament/Resources/OurImpactResource.php`

This resource allows administrators to maintain the content of the public page.

## 24. Fields in the Admin Resource

The resource allows administrators to manage:

- title
- subtitle
- description
- content blocks
- banner upload
- publish status
- SEO settings

## 25. Builder-Based Content Blocks

One of the most important features of the admin resource is the Filament `Builder` field used for `content_blocks`.

The builder supports:

- paragraph blocks
- image blocks

### Paragraph block

A paragraph block can contain:

- heading
- rich text body

### Image block

An image block can contain:

- image upload
- caption

This design gives administrators flexibility in building content sections without editing Blade code.

## 26. Data Flow Summary

The complete `Our Impact` page flow can be summarized as follows:

1. the user opens `/our_impact`
2. Laravel routes the request to `PublicPageController::ourImpact()`
3. the controller loads the latest published `OurImpact` record
4. media and SEO are eager-loaded
5. the Blade view renders the banner, title, subtitle, description, and content blocks
6. animations and front-end effects are initialized
7. the footer is displayed

## 27. Strengths of the Implementation

The `Our Impact` page has several strengths:

- content is database-driven
- supports page-level SEO
- uses a reusable block-based architecture
- supports banner uploads
- uses fallback content for incomplete records
- is manageable through Filament
- provides a clean public presentation structure

These qualities make it scalable and maintainable.

## 28. Observations

Some practical observations about the implementation are:

- the page styling is embedded in the Blade file rather than a separate CSS file
- the `content_blocks` structure provides flexibility but also requires consistent admin input
- the page shares a similar architecture with `Our Channel`, which suggests a reusable page pattern across the site
- fallback content ensures the page still displays meaningful text even when database content is incomplete

These are useful discussion points for a thesis or capstone paper under design decisions and maintainability.

## 29. Conclusion

The `Our Impact` page is a dynamic Laravel public page built with database-driven content, flexible content blocks, media handling, SEO integration, and admin-side management. It is a strong example of how a business website can present structured corporate information without relying on hardcoded static content.

From a thesis or capstone perspective, the page demonstrates practical use of:

- Laravel route handling
- model-based content retrieval
- JSON-based block structures
- Blade rendering
- admin-driven page management
- SEO-aware public page architecture

This makes the `Our Impact` page both functionally useful and architecturally significant within the website.
