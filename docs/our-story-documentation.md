# Our Story Documentation

## 1. Introduction

The `Our Story` page explains the background, journey, mission, vision, and core values of McAsia Foodtrade Corporation. It is one of the main informational pages of the website because it introduces the company to visitors and presents the company history in a timeline-based format.

From a technical point of view, the `Our Story` page is:

- a Laravel public `GET` route
- handled by `PublicPageController`
- powered by the `our_stories` database table
- rendered using a Blade view
- managed through a Filament admin resource
- enhanced by SEO metadata and media uploads

## 2. Route Definition

The route for the `Our Story` page is defined in `routes/web.php`.

```php
Route::get('/our-story', 'ourStory')->name('our-story');
```

This means:

- URL: `/our-story`
- HTTP method: `GET`
- controller method: `PublicPageController::ourStory()`
- route name: `our-story`

When a user opens the `Our Story` page, Laravel directs the request to the `ourStory()` method of `PublicPageController`.

## 3. Step-by-Step Request Flow

### Step 1: User visits `/our-story`

The browser requests the page URL.

### Step 2: Laravel matches the route

Laravel checks `routes/web.php` and matches the URL `/our-story` to `PublicPageController::ourStory()`.

### Step 3: Controller retrieves page content

Inside `app/Http/Controllers/PublicPageController.php`, the `ourStory()` method performs the following:

1. Retrieves the first published `OurStory` record.
2. Eager-loads the related media and SEO data.
3. Passes the `OurStory` record to the `our_story.blade.php` view.
4. Sends SEO fallback values to the layout.

The method used is conceptually:

```php
$ourStory = OurStory::with(['media', 'seo'])->isPublished()->first();
```

This means only published story records are shown publicly.

### Step 4: Layout is loaded

The `our_story.blade.php` file extends the shared public layout in `resources/views/layouts/app.blade.php`.

This layout provides:

- HTML structure
- SEO metadata
- global header
- global CSS and JavaScript assets
- third-party libraries such as AOS, Swiper, Alpine, jQuery, and Tailwind CDN

### Step 5: Blade view renders the page

The `our_story.blade.php` file renders:

- banner image
- page title
- subtitle
- company description
- historical timeline
- mission, vision, and core values cards
- footer

## 4. Controller Explanation

The `Our Story` page is handled by `PublicPageController::ourStory()` in `app/Http/Controllers/PublicPageController.php`.

Its main responsibilities are:

- loading the `OurStory` record
- including media and SEO relationships
- sending the record to the view
- preparing fallback SEO values

The controller uses:

- `titleField: 'title'`
- `descriptionField: 'subtitle'`
- `imageCollection: 'our-story-image'`

This ensures that the page title, subtitle, and banner image can also support search engine optimization and social sharing metadata.

## 5. Model Explanation

The model used by this page is `app/Models/PublicPage/OurStory.php`.

This model represents the `our_stories` database table.

Important features of the model:

- uses `InteractsWithMedia` from Spatie Media Library
- uses the `HasSeo` trait
- casts `timeline_items` as an array
- casts `is_published` as a boolean
- defines a media collection named `our-story-image`
- includes `scopeIsPublished()` for filtering published records

The fillable fields are:

- `title`
- `subtitle`
- `description`
- `content`
- `timeline_items`
- `is_published`

This model is responsible for storing both the written story content and the structured timeline entries.

## 6. Database Structure

The `Our Story` page uses the `our_stories` table.

This table is created and updated by the following migration files:

- `database/migrations/2026_03_11_010940_create_our_stories_table.php`
- `database/migrations/2026_03_11_120000_add_timeline_items_to_our_stories_table.php`

### Main columns in `our_stories`

- `id`
- `title`
- `subtitle`
- `description`
- `content`
- `timeline_items`
- `is_published`
- `created_at`
- `updated_at`

### Purpose of important columns

`title`
: stores the main page heading

`subtitle`
: stores the supporting text below the title

`description`
: stores the introductory company background

`content`
: stores rich content that may be parsed into timeline entries if `timeline_items` is empty

`timeline_items`
: stores a JSON array of milestone entries for the company journey

`is_published`
: determines whether the record is visible on the public website

## 7. View File Explanation

The main view file for this page is `resources/views/our_story.blade.php`.

This file contains the page presentation and front-end behavior. It is larger than the homepage section files because the entire page structure is built inside one Blade file.

The page can be divided into the following parts:

### 7.1 Inline Styling

At the top of the file, the page defines custom CSS for:

- page background
- banner frame
- introduction card
- timeline layout
- timeline cards
- animations
- responsive design adjustments

This styling gives the page a unique design without creating a separate CSS file.

### 7.2 Timeline Preparation Logic

Inside the Blade file, a PHP block prepares the timeline data.

The logic works as follows:

1. It starts with an empty `$timelineEntries` array.
2. It checks `timeline_items` from the database.
3. If structured timeline items exist, it formats them into displayable entries.
4. If no structured timeline items exist but `content` exists, it parses the HTML content using `DOMDocument`.
5. It detects headings such as `h2` and `h3` as timeline titles.
6. It groups the following HTML content under each heading.
7. It then converts them into timeline entries for display.

This is an important feature because the page supports two content strategies:

- structured timeline items from JSON
- fallback parsing from rich HTML content

### 7.3 Banner Section

The top section displays a banner image.

It uses:

- uploaded media from the `our-story-image` collection when available
- fallback image `images/HOMEPAGE/1.jpg` when media is missing

This banner visually introduces the page.

### 7.4 Introduction Section

This section displays:

- page title
- subtitle
- introductory description

If the database fields are empty, fallback text is shown. This ensures the page remains readable even with incomplete records.

### 7.5 Timeline Showcase

The timeline section loops through `$timelineEntries` and displays each milestone as a card with:

- year or label
- title
- body content

The layout is responsive:

- on smaller screens it appears as a vertical timeline
- on larger screens it becomes a staggered left-right timeline

### 7.6 Purpose and Values Section

This section displays three static cards:

- Mission
- Vision
- Core Values

Unlike the timeline section, these values are currently hardcoded in the Blade file instead of being loaded from the database.

### 7.7 Back Button

The page includes a back button using:

```javascript
history.back();
```

This allows users to return to the previous page.

### 7.8 Footer

The file ends by including the shared footer:

```php
@include('components.footer')
```

## 8. SEO Handling

The `Our Story` page uses the same SEO pattern as other public pages.

Related files:

- `app/Traits/HasSeo.php`
- `resources/views/components/seo/seo-head.blade.php`
- `resources/views/layouts/app.blade.php`

How it works:

1. The `OurStory` model uses the `HasSeo` trait.
2. The controller loads the `seo` relation.
3. The controller passes SEO fallback values to the layout.
4. The layout renders the SEO component.
5. The SEO component outputs the page title, description, canonical URL, Open Graph tags, Twitter tags, and optional schema markup.

This improves search engine visibility and social sharing quality.

## 9. Media Handling

The `Our Story` model uses Spatie Media Library.

The media collection registered is:

- `our-story-image`

This collection is used for the page banner image. The uploaded banner is managed through the Filament admin panel and displayed in the public view.

## 10. Admin Panel Management

The `Our Story` page is managed through the Filament resource:

- `app/Filament/Resources/OurStoryResource.php`

This resource provides a form for editing page content.

### Fields available in the admin panel

- title
- subtitle
- description
- timeline items
- banner image
- publish status
- SEO tab

### Timeline repeater

One of the most important features of this resource is the `timeline_items` repeater. Each timeline record includes:

- `year`
- `title`
- `body`

This allows administrators to add milestone entries such as:

- 2012 - The Beginning
- 2015 - Expansion
- Today - Continuing Growth

The repeater supports:

- reordering
- collapsing
- cloning
- multiple entries

This makes the history section easier to maintain from the admin panel.

## 11. Front-End Behavior

The `Our Story` page contains custom JavaScript for visual effects.

### AOS initialization

The page initializes Animate On Scroll using:

- `once: true`
- `duration: 900`
- `easing: 'ease-in-out'`

This makes sections animate smoothly when they appear on screen.

### Fade-in effect

The page also includes a manual scroll-based effect for elements with the class `.fade-section`.

The script:

1. detects all elements with `.fade-section`
2. checks their position relative to the viewport
3. adds the class `.visible` when they enter the visible area

This improves the visual presentation of the timeline and content sections.

## 12. Strengths of the Implementation

The `Our Story` page has several strong design and development features:

- uses Laravel MVC structure
- combines database-driven content with styled Blade rendering
- supports SEO management
- supports banner image upload
- uses a structured timeline system
- provides fallback timeline parsing from `content`
- uses responsive design for mobile and desktop
- supports admin-side content editing through Filament

## 13. Limitations and Observations

There are also some implementation details worth noting:

- the mission, vision, and core values section is hardcoded in the Blade file
- the page styling is embedded directly in the Blade file instead of a separate CSS file
- the timeline parsing logic is inside the view, which mixes display and content-processing responsibilities
- the code uses `$ourStory->media[0]` style access, so media existence should be handled carefully

These are not necessarily errors, but they are useful observations for thesis discussion under maintainability or future improvements.

## 14. Summary of System Flow

The complete execution flow of the `Our Story` page is:

1. The user visits `/our-story`.
2. Laravel matches the route in `routes/web.php`.
3. `PublicPageController::ourStory()` is executed.
4. The controller loads the published `OurStory` record with media and SEO.
5. The shared layout is loaded.
6. The Blade view prepares the timeline data.
7. The banner, introduction, timeline, and values sections are rendered.
8. Animations and visual effects are initialized in the browser.
9. The footer is displayed at the bottom of the page.

## 15. Conclusion

The `Our Story` page is an informational public page built using Laravel, Blade, Spatie Media Library, and Filament. Its purpose is to communicate the company background and development journey in a visually engaging format. The page is supported by a database-driven content structure, SEO integration, media handling, and a timeline system that can be maintained from the admin panel.

From a thesis or capstone perspective, this page is a good example of combining content management, structured data, page rendering, and user-friendly presentation within a Laravel-based web application.
