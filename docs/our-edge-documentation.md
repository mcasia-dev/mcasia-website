# Our Edge Documentation

## 1. Introduction

The `Our Edge` page is one of the key public information pages of the McAsia website. Its main purpose is to explain the company’s strengths, competitive advantages, and special capabilities that make the business stand out. It helps communicate the company’s value proposition to website visitors, clients, and potential business partners.

Unlike a single fixed static page, the `Our Edge` feature is implemented as a dynamic public page system. It uses a slug in the URL so that multiple edge pages can be displayed using the same route, the same controller method, and the same Blade view. This makes the implementation scalable and easier to maintain.

From a technical perspective, the `Our Edge` page is:

- a Laravel `GET` route
- handled by `PublicPageController`
- backed by the `our_edges` database table
- rendered using a Blade view
- supported by SEO metadata
- managed through a Filament admin resource

Because of this design, the admin can create and manage different `Our Edge` content pages without writing new routes or creating duplicate view files.

## 2. Route Definition

The route for the `Our Edge` page is defined in `routes/web.php`.

```php
Route::get('/our-edge/{slug}', 'ourEdge')->name('our-edge');
```

This route means:

- URL pattern: `/our-edge/{slug}`
- HTTP method: `GET`
- controller method: `PublicPageController::ourEdge()`
- route name: `our-edge`

The `{slug}` parameter is important because it identifies which `Our Edge` record should be shown. For example, different slugs can point to different pages about innovation, quality, safety, or distribution strengths.

## 3. Purpose of the Our Edge Page

The `Our Edge` page exists to present the strengths of the company in a focused and well-structured format. It is intended to support branding, corporate storytelling, and business communication.

On the user side, the page helps visitors:

- learn what makes McAsia different
- understand specific operational strengths
- view supporting visuals
- navigate back easily after reading the content

On the system side, the page demonstrates:

- dynamic routing through slugs
- database-driven public content
- SEO integration
- media handling through Spatie Media Library
- reusable page architecture

## 4. Step-by-Step Page Flow

### Step 1: User visits an `Our Edge` URL

The browser requests a URL such as:

`/our-edge/{slug}`

At this stage, Laravel receives the slug and prepares to resolve it into a database record.

### Step 2: Laravel matches the route

Laravel checks `routes/web.php` and finds the dynamic route assigned to `PublicPageController::ourEdge()`.

Because the route includes a slug parameter, the controller method receives the slug as a function argument.

### Step 3: Controller queries the database

Inside `app/Http/Controllers/PublicPageController.php`, the `ourEdge(string $slug)` method performs the main logic.

It queries the `OurEdge` model and:

1. loads the page by slug
2. includes related media
3. includes related SEO data
4. filters only published records

The query uses:

- `with(['media', 'seo'])`
- `pageBySlug($slug)`
- `isPublished()`

This means the public website only shows edge pages that are explicitly published and matched by the correct slug.

### Step 4: Controller prepares SEO values

After the record is loaded, the controller builds SEO fallback data. It uses:

- `title` as the main title source
- `description` as the fallback description source
- `our-edge-image` as the media collection for SEO image fallback

This makes the page more search-engine-friendly and ensures that a default title, description, and image still exist even if custom SEO values are missing.

### Step 5: Blade view is rendered

The controller returns:

- `resources/views/our-edge.blade.php`

The view receives:

- the selected `OurEdge` record
- SEO values

The view then displays the page banner, title, description, main content, featured brands carousel, and footer.

## 5. Controller Explanation

The controller method used for this page is located in:

- `app/Http/Controllers/PublicPageController.php`

The `ourEdge()` method is responsible for:

- finding the correct edge page using the slug
- filtering only published content
- eager-loading media and SEO relationships
- sending the data to the Blade view
- preparing fallback SEO values

This method is important because it connects the URL structure to the database content and ensures that the correct page is displayed.

It also improves efficiency by eager-loading relationships instead of querying them repeatedly in the Blade file.

## 6. OurEdge Model

The main model used by this page is:

- `app/Models/PublicPage/OurEdge.php`

This model represents the `our_edges` table.

## 7. Main Responsibilities of the Model

The model is responsible for:

- storing edge page content
- storing the slug used by the route
- managing publish status
- supporting SEO
- handling the banner image through media uploads

## 8. Important Fields

The fillable fields of the model are:

- `title`
- `slug`
- `description`
- `content`
- `sort_order`
- `is_published`

These fields provide both the structural and presentation data for the page.

## 9. Media Handling

The model uses Spatie Media Library and defines this media collection:

- `our-edge-image`

This collection is used for the hero image shown at the top of the page.

If no uploaded image exists, the public Blade view uses a fallback image from the project assets.

## 10. SEO Support

The model uses the `HasSeo` trait.

This means every `Our Edge` page can have:

- custom SEO title
- meta description
- canonical URL
- Open Graph metadata
- Twitter metadata
- optional schema markup

This is useful because different `Our Edge` pages may focus on different business capabilities and keywords.

## 11. Query Scopes

The model defines two important query scopes:

### 11.1 `scopeIsPublished()`

This filters the records so that only published pages appear publicly.

### 11.2 `scopePageBySlug()`

This filters the record by slug so the correct edge page is loaded from the route parameter.

These scopes make the controller code cleaner and easier to understand.

## 12. Database Structure

The `our_edges` table is created by:

- `database/migrations/2026_03_11_024818_create_our_edges_table.php`

## 13. Main Table Columns

Important columns include:

- `id`
- `title`
- `slug`
- `description`
- `content`
- `sort_order`
- `is_published`
- `created_at`
- `updated_at`

## 14. Purpose of the Columns

`title`
: stores the page title

`slug`
: stores the unique URL identifier used by the route

`description`
: stores the summary or introductory rich-text content

`content`
: stores the main body content of the page

`sort_order`
: supports ordering in admin listings or navigation logic

`is_published`
: determines whether the page is visible publicly

This structure keeps the model simple while still providing all the data needed for a dynamic content page.

## 15. Blade View Explanation

The public view used by the page is:

- `resources/views/our-edge.blade.php`

This file is responsible for presenting the selected edge page to the user.

The file contains:

- inline CSS for layout and page design
- a hero image section
- title and description area
- main content area
- back button
- featured brands carousel
- footer

## 16. Parts of the View

### 16.1 Inline CSS Styling

At the beginning of the file, the page defines custom CSS for:

- page colors
- typography
- content cards
- fade animation
- back button style

This creates a unique presentation style for the page without using a dedicated external CSS file.

### 16.2 Hero Banner

The top section of the page displays the main image.

The image source is:

- uploaded `our-edge-image` media when available
- fallback asset `images/driven_innovation/1.jpg` when media is missing

This makes the page visually strong and ensures it remains presentable even when no custom media is uploaded.

### 16.3 Content Card for Title and Description

The first content card displays:

- the page title
- the page description

The title uses:

```php
{{ $ourEdge->title ?? '' }}
```

The description uses:

```php
{!! $ourEdge->description ?? '' !!}
```

Because the description is rendered as HTML, the admin can use a rich text editor to format it.

### 16.4 Main Rich Content Section

The second major content card displays the main body of the page:

```php
{!! $ourEdge->content ?? '' !!}
```

This allows detailed formatted content such as:

- paragraphs
- headings
- lists
- emphasized text

### 16.5 Back Button

The page includes a back button that uses:

```javascript
history.back();
```

This improves navigation usability for users who came from a previous page such as a menu or feature listing.

### 16.6 Featured Brands Carousel

Below the main content, the page includes:

```php
<x-featured-brands-carousel title=\"Featured Brands\" />
```

This adds a brand showcase section and helps connect the informational page with the broader catalog or brand content of the site.

### 16.7 Footer

The page ends with:

```php
@include('components.footer')
```

This keeps the page consistent with the overall public website structure.

## 17. Supporting Component: Featured Brands Carousel

The page uses:

- `resources/views/components/featured-brands-carousel.blade.php`

This component:

- tries to load active brands from the database
- loads media for each brand
- falls back to a hardcoded list of brand visuals when needed
- presents brands inside a sliding carousel-like layout

This is important because it links the content page to brand discovery, which improves both user engagement and internal navigation.

## 18. Front-End Behavior

The page includes JavaScript at the bottom of the Blade file.

### 18.1 Fade-In Effect

The page applies a `fade-section` class to major sections and uses a scroll event listener to add a `visible` class when the section enters the viewport.

This creates a smooth reveal animation for page content.

### 18.2 Page Load Transition

When the page finishes loading, JavaScript adds a `fade-in` class to the body. This gives the page a softer appearance on entry.

### 18.3 AOS Initialization

If AOS is available globally, the page initializes it with:

- `duration: 1000`
- `once: true`

This adds additional animation support to the page.

## 19. SEO Handling

The `Our Edge` page uses the shared SEO structure of the public site.

The SEO-related files involved are:

- `app/Traits/HasSeo.php`
- `resources/views/components/seo/seo-head.blade.php`
- `resources/views/layouts/app.blade.php`

The flow works like this:

1. the model loads the related SEO record
2. the controller passes SEO and fallback values to the view
3. the layout renders the SEO component
4. the SEO component outputs title, meta description, Open Graph tags, Twitter tags, and optional schema

This improves visibility in search engines and enhances page previews when shared on social media.

## 20. Admin Management

The `Our Edge` page is managed in the Filament admin panel through:

- `app/Filament/Resources/OurEdgeResource.php`

This resource provides the content management interface for administrators.

## 21. Fields in the Admin Panel

The admin resource allows the following fields to be edited:

- title
- slug
- description
- rich content
- image upload
- sort order
- publish status
- SEO settings

### Slug generation

The resource automatically generates the slug from the title using `Str::slug()`. This improves consistency and reduces manual errors.

### Media upload

The image upload field stores the banner in the `our-edge-image` collection and supports:

- image editor
- WebP optimization
- accepted file type restrictions
- upload size limits

## 22. Data Flow Summary

The complete flow of the `Our Edge` page is:

1. the user visits `/our-edge/{slug}`
2. Laravel matches the route
3. `PublicPageController::ourEdge()` is called
4. the controller finds the published `OurEdge` record by slug
5. media and SEO are eager-loaded
6. SEO fallback data is prepared
7. the Blade view renders the hero image, title, description, and content
8. the featured brands carousel is displayed
9. the footer is shown

## 23. Strengths of the Implementation

The `Our Edge` page has several strong design features:

- uses dynamic slug-based routing
- supports multiple edge pages through one structure
- stores content in the database
- includes publish control
- supports SEO per page
- supports media uploads
- integrates with a brand carousel
- is manageable through Filament without editing code

These are good characteristics for a maintainable public content system.

## 24. Observations

There are also useful observations about the implementation:

- most styling is embedded directly in the Blade file
- the page depends on media availability for the hero image, but fallback behavior is included
- the page is rich-content oriented and can support long-form formatted explanations
- the same structure can be reused for multiple edge pages without creating separate files

These points can be mentioned in a thesis under maintainability, scalability, or design decisions.

## 25. Conclusion

The `Our Edge` page is a dynamic Laravel content page that combines route parameters, database-driven page records, rich-text content, image handling, SEO support, and admin management. It is a strong example of how one reusable page structure can support multiple public information pages efficiently.

From a thesis or capstone perspective, the `Our Edge` module demonstrates practical use of:

- dynamic routes
- slug-based retrieval
- publish control
- media management
- SEO integration
- reusable page architecture

This makes it both a functional business page and a good architectural example within the website.
