# Our Channel Documentation

## 1. Introduction

The `Our Channel` page is one of the public corporate content pages of the McAsia website. Its purpose is to explain how the company connects products, distribution networks, business partners, and consumers through its channel strategy.

This page is not implemented as a fixed static HTML page. Instead, it is a database-driven public page with a flexible content structure. Its title, subtitle, description, banner, and additional content sections are managed from the admin panel and rendered dynamically through Laravel Blade.

From a technical perspective, the `Our Channel` page demonstrates:

- Laravel route-based rendering
- controller-managed content retrieval
- model-based public page content
- flexible JSON content blocks
- media handling
- SEO support
- Filament-based admin management

Because of this architecture, the page is maintainable and scalable without requiring repeated code edits whenever content changes.

## 2. Purpose of the Our Channel Page

The main purpose of the `Our Channel` page is to describe how McAsia distributes, positions, and connects its products to the market.

From the visitor’s perspective, the page helps users:

- understand McAsia’s channel and distribution approach
- read the company’s explanation of market reach and access
- view supporting images and content sections
- navigate the page in a structured way

From the technical perspective, the page is useful because it:

- uses database-driven content
- supports rich text and image blocks
- supports a banner image
- supports SEO
- can be updated from the admin panel

This makes it both a business communication page and a good example of flexible public page design.

## 3. Route Definition

The route is defined in `routes/web.php`.

```php
Route::get('/our_channel', 'ourChannel')->name('our_channel');
```

This route means:

- URL: `/our_channel`
- HTTP method: `GET`
- controller method: `PublicPageController::ourChannel()`
- route name: `our_channel`

When a user opens the URL, Laravel sends the request to the `ourChannel()` method in the public page controller.

## 4. Step-by-Step Request Flow

### Step 1: User visits `/our_channel`

The browser sends a request to the public `Our Channel` page.

### Step 2: Laravel matches the route

Laravel checks `routes/web.php` and routes the request to:

- `PublicPageController::ourChannel()`

### Step 3: Controller loads the page record

Inside `app/Http/Controllers/PublicPageController.php`, the `ourChannel()` method performs the page retrieval logic.

It:

1. loads the latest published `OurChannel` record
2. includes media
3. includes SEO metadata
4. passes the record to the Blade view
5. prepares fallback SEO values

This means the page content is maintained through the database instead of being fully hardcoded in the Blade file.

### Step 4: Blade view renders the page

The controller returns:

- `resources/views/our_channel.blade.php`

The view then renders:

- banner
- title
- subtitle
- description
- flexible content blocks
- back button
- footer

## 5. Controller Explanation

The `Our Channel` page is handled by the `ourChannel()` method in:

- `app/Http/Controllers/PublicPageController.php`

Its responsibilities are:

- retrieving the latest published record
- eager-loading media and SEO
- passing the record to the public view
- building SEO fallback values

This method acts as the connection point between the public route and the page content stored in the database.

## 6. OurChannel Model

The model used by this page is:

- `app/Models/OurChannel.php`

This model represents the `our_channels` table.

## 7. Responsibilities of the Model

The model is responsible for:

- storing the page title
- storing the subtitle
- storing the introductory description
- storing flexible content blocks
- managing publish state
- handling the banner image
- supporting SEO metadata

## 8. Important Fields

The fillable fields are:

- `title`
- `subtitle`
- `description`
- `content_blocks`
- `is_published`

These fields define both the main page content and the modular content sections below the introduction.

## 9. Casts

The model casts:

- `content_blocks` as an array
- `is_published` as a boolean

Casting `content_blocks` as an array is essential because the page stores multiple block entries in structured JSON format.

## 10. Media Collection

The model uses Spatie Media Library and defines:

- `our-channel-banner`

This collection stores the main banner image shown at the top of the page.

If no media exists, the public view falls back to a default image.

## 11. SEO Support

The model uses the `HasSeo` trait.

This means the page can have:

- custom SEO title
- meta description
- canonical URL
- Open Graph data
- Twitter metadata

This improves search engine visibility and social sharing quality.

## 12. Query Scope

The model defines:

- `scopeIsPublished()`

This ensures only published page records are shown publicly.

## 13. Database Structure

The table is created by:

- `database/migrations/2026_03_18_090000_create_our_channels_table.php`

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
: stores the supporting text below the title

`description`
: stores the introductory page narrative

`content_blocks`
: stores modular content sections such as paragraph blocks and image blocks

`is_published`
: determines whether the page is visible publicly

This structure allows the page to function as a flexible content-managed corporate page.

## 16. Blade View Explanation

The public page view is:

- `resources/views/our_channel.blade.php`

This Blade file is responsible for displaying the `Our Channel` page to the visitor.

It includes:

- inline page styling
- banner section
- title and subtitle card
- description section
- dynamic content block rendering
- back button
- footer

## 17. Parts of the Blade View

### 17.1 Page Variables

At the top of the file, the Blade view prepares:

- `$pageTitle`
- `$pageSubtitle`
- `$pageDescription`
- `$bannerImage`
- `$blocks`

These values come from the loaded record, with fallback defaults when needed.

### 17.2 Banner Section

The page begins with a large banner container showing:

- uploaded `our-channel-banner` image when available
- fallback image `images/HOMEPAGE/3.jpg` otherwise

This creates a strong visual introduction for the page.

### 17.3 Introductory Card

The first main content card shows:

- title
- subtitle
- description

If the record has no description and no content blocks, the page falls back to built-in static explanatory text.

This ensures the page still has a complete message even when the record is not fully populated.

### 17.4 Dynamic Content Blocks

The page loops through:

- `$blocks = collect($data->content_blocks ?? [])`

Each block is rendered depending on its type.

#### Paragraph block

If the block type is `paragraph`, the page displays:

- optional heading
- rich text body

#### Image block

If the block type is `image`, the page displays:

- uploaded image
- optional caption

This flexible block design makes the page modular and easier to maintain from the admin panel.

### 17.5 Back Button

The page includes a back button that uses:

```javascript
history.back();
```

This gives users a quick way to return to the previous page.

### 17.6 Footer

The page ends with:

```php
@include('components.footer')
```

This keeps the page consistent with the rest of the public website.

## 18. Front-End Behavior

The `Our Channel` page includes JavaScript inside the Blade file.

## 19. Fade-In Effect

The page uses a `fade-section` class and JavaScript logic to apply a `visible` class when content enters the viewport.

This creates a smooth reveal effect as the user scrolls down the page.

## 20. Page Load Transition

When the page finishes loading, the script adds a `fade-in` class to the body. This gives the page a softer appearance during the initial load.

## 21. AOS Initialization

The page initializes AOS using:

- `duration: 1000`
- `once: true`

This provides additional motion effects for the page presentation.

## 22. SEO Handling

The `Our Channel` page uses the shared SEO structure of the public site.

Relevant files include:

- `app/Traits/HasSeo.php`
- `resources/views/components/seo/seo-head.blade.php`
- `resources/views/layouts/app.blade.php`

The controller passes:

- the page SEO record
- fallback title
- fallback description
- fallback image

Because the `OurChannel` model uses `HasSeo`, SEO can be managed directly in the admin panel.

## 23. Admin Management

The page is managed through:

- `app/Filament/Resources/OurChannelResource.php`

This Filament resource allows administrators to maintain the content of the page.

## 24. Fields in the Admin Resource

The admin resource supports:

- title
- subtitle
- description
- content blocks
- banner upload
- publish status
- SEO settings

## 25. Builder-Based Content Blocks

The `content_blocks` field is managed using Filament’s `Builder` component.

The builder supports:

- paragraph blocks
- image blocks

### Paragraph block

A paragraph block contains:

- heading
- rich body text

### Image block

An image block contains:

- uploaded image
- caption

This allows administrators to create flexible section-based content without editing the Blade view.

## 26. Data Flow Summary

The complete `Our Channel` page flow is:

1. the user opens `/our_channel`
2. Laravel routes the request to `PublicPageController::ourChannel()`
3. the controller loads the latest published `OurChannel` record
4. media and SEO are eager-loaded
5. the Blade view renders banner, introduction, and content blocks
6. page animation behavior is initialized
7. the footer is displayed

## 27. Strengths of the Implementation

The `Our Channel` page has several strong design qualities:

- content is database-driven
- uses block-based flexible content
- supports banner media uploads
- supports SEO per page
- has fallback text for incomplete records
- is manageable through Filament
- shares a consistent architecture with other corporate pages

These make the page scalable and maintainable.

## 28. Observations

Some useful observations about the implementation are:

- the page uses inline styling rather than a separate CSS file
- the page follows a very similar architecture to `Our Impact`, which suggests a reusable design pattern
- content blocks provide flexibility but require structured admin input
- fallback description content helps maintain public page quality even when content is incomplete

These are useful points for documentation or thesis discussion.

## 29. Conclusion

The `Our Channel` page is a dynamic Laravel public page that combines model-driven content, flexible block rendering, media handling, SEO support, and admin-side management. It is a strong example of a modular corporate information page built in a scalable and maintainable way.

From a thesis or capstone perspective, this page demonstrates practical use of:

- route-based content rendering
- model and migration design
- JSON-based content blocks
- Blade view composition
- Filament-driven page management
- SEO-aware public architecture

This makes the `Our Channel` page both useful for the business and significant from a system design point of view.
