# News and Events Documentation

## 1. Introduction

The `News & Events` page is one of the public content pages of the McAsia website. Its purpose is to present company events, announcements, campaigns, and public activities in a visually engaging format. It allows users to browse event entries, open event media in a modal gallery, and read supporting descriptions and dates.

From a technical perspective, the `News & Events` page is a dynamic, database-driven public page. It loads published event records from the database, formats them for front-end display, and renders them inside a grid layout with interactive modal behavior.

This page demonstrates several important parts of the system:

- route-based page rendering
- controller-managed event retrieval
- event sorting and pagination
- media loading through Spatie Media Library
- modal image gallery behavior
- Alpine.js interaction
- admin-side event management through Filament
- SEO integration

Because of this structure, the `News & Events` page is not simply a static announcement page. It is a reusable event management module.

## 2. Purpose of the News and Events Page

The `News & Events` page exists to help website visitors stay informed about McAsia activities.

From the user side, the page allows visitors to:

- browse recent events
- open images in a larger event modal
- read event descriptions
- view event dates
- browse multiple event photos

From the system side, the page is useful because it:

- stores event content in the database
- supports multiple uploaded images per event
- sorts events according to business priority
- paginates results
- allows content to be maintained from the admin panel

This makes it appropriate for both corporate communication and public engagement.

## 3. Route Definition

The route is defined in `routes/web.php`.

```php
Route::get('/news_event', 'newsEvents')->name('news_event');
```

This means:

- URL: `/news_event`
- HTTP method: `GET`
- controller method: `PublicPageController::newsEvents()`
- route name: `news_event`

When a user opens the page, Laravel forwards the request to the `newsEvents()` method of `PublicPageController`.

## 4. Step-by-Step Request Flow

### Step 1: User visits `/news_event`

The browser requests the public events page URL.

### Step 2: Laravel matches the route

Laravel checks `routes/web.php` and matches the request to:

- `PublicPageController::newsEvents()`

### Step 3: Controller determines sorting logic

Inside `app/Http/Controllers/PublicPageController.php`, the `newsEvents()` method first checks whether there are published event records with a `sort_no` greater than zero.

This is important because the page uses a dual sorting strategy:

- if at least one event has a positive `sort_no`, sorting is based on `sort_no`
- otherwise, sorting falls back to `event_date`

This design allows administrators to manually prioritize events when needed.

### Step 4: Controller loads event records

After choosing the sort field, the controller queries the `Event` model and:

1. loads media
2. filters only published records
3. applies ordering
4. paginates results by 15 records
5. transforms each event into a simplified array for the front end

### Step 5: Controller formats event data

Each event record is converted into an array containing:

- title
- formatted date
- stripped description
- image URLs

This transformation is useful because the Blade view does not need to handle raw model formatting directly.

### Step 6: Blade view is returned

The controller returns:

- `resources/views/news_event.blade.php`

The paginated event collection and SEO values are passed to the view.

## 5. Controller Explanation

The page logic is contained in:

- `app/Http/Controllers/PublicPageController.php`

The `newsEvents()` method is responsible for:

- deciding which field should be used for sorting
- retrieving published events
- loading event media
- paginating the results
- formatting each event entry
- sending the final dataset to the Blade view
- building SEO fallback values

This method is a good example of controller-side preparation for a media-heavy public listing page.

## 6. Event Model

The main model used by the page is:

- `app/Models/PublicPage/Event.php`

This model represents the `events` table.

## 7. Responsibilities of the Event Model

The model is responsible for:

- storing event information
- storing event date
- storing publish status
- supporting manual sorting
- handling multiple event images
- supporting SEO metadata

## 8. Important Fields

The fillable fields of the model include:

- `event_name`
- `event_description`
- `event_date`
- `sort_no`
- `is_published`

These fields define both the textual and display-related behavior of event records.

## 9. Casts

The model casts:

- `event_date` as a date
- `is_published` as a boolean

Casting the date field is useful because the controller can format event dates cleanly for display.

## 10. Media Collection

The model uses Spatie Media Library and defines:

- `event-images`

This media collection stores one or more images for each event.

Because the page supports galleries and modal slideshows, the ability to upload multiple images is essential to the design.

## 11. Query Scope

The model defines:

- `scopeIsPublished()`

This ensures only published events are shown to the public.

## 12. Database Structure

The events table is created by:

- `database/migrations/2026_03_16_031325_create_events_table.php`

The project also includes a later migration that adds `sort_no`, which is already used in the current implementation.

## 13. Main Table Columns

Important columns include:

- `id`
- `event_name`
- `event_description`
- `event_date`
- `is_published`
- timestamps

The current implementation also uses:

- `sort_no`

This field supports custom event ordering.

## 14. Purpose of the Columns

`event_name`
: stores the event title

`event_description`
: stores the event body or event summary

`event_date`
: stores the date associated with the event

`sort_no`
: stores manual display priority

`is_published`
: determines whether the event is visible on the website

This design supports both chronological and manually prioritized event display.

## 15. Blade View Explanation

The public page is rendered through:

- `resources/views/news_event.blade.php`

This Blade file is the main presentation layer of the page and contains both page structure and front-end interaction logic.

## 16. Main Parts of the View

### 16.1 Video Hero Section

At the top of the page, the view displays a full-screen background video:

- `videos/videos.mp4`

This section also contains:

- “More Events” text
- a downward arrow button

The down arrow smoothly scrolls the page to the event list section.

This hero area creates a stronger visual introduction compared to a plain banner image.

### 16.2 Event Listing Section

The main event section is identified by:

- `#news-events`

This section displays the title:

- `McAsia Flavourful Happenings`

Below it, the page renders all events in a grid layout.

### 16.3 Event Cards

Each event is displayed as a card containing:

- thumbnail image
- event title

Clicking the card opens the event modal.

If an event has no images, the page uses a fallback image:

- `images/EXPLORE NEW RECEIPES/1.png`

This ensures the layout remains complete even when event media is incomplete.

### 16.4 Modal Gallery

Each event card includes an Alpine.js-powered modal system.

The modal supports:

- opening and closing the event details
- image slideshow rotation
- next and previous image controls
- image count display
- thumbnail selection
- enlarged full-image display

This makes the page more interactive and visually rich than a standard announcement list.

### 16.5 Event Description Area

Inside the modal, the page displays:

- event title
- event date
- event description

If the event has no description, the page displays:

- `No description available.`

### 16.6 Pagination

If multiple pages of events exist, the view renders Laravel pagination links inside a styled container.

### 16.7 Back Button

At the bottom of the listing section, the page includes a back button using:

```javascript
history.back();
```

### 16.8 Footer

The page ends with:

```php
@include('components.footer')
```

This keeps the page visually consistent with the rest of the public website.

## 17. Front-End Interaction

One of the strongest parts of this page is its use of front-end interactivity.

## 18. Alpine.js Modal Behavior

Each event card uses an inline Alpine.js data object to manage:

- modal state
- current image index
- slideshow timer
- image navigation
- full image preview state

This allows every event card to behave independently without requiring a separate global modal script.

## 19. Slideshow Logic

When the modal opens:

1. it starts from the first image
2. it starts an interval slideshow
3. the slideshow rotates every few seconds

When the user interacts manually:

- the slideshow can be restarted
- the selected image index is updated

This provides a smooth media gallery experience.

## 20. Full Image Preview

When the user clicks the large modal image, the page opens another fullscreen layer for image enlargement.

This improves usability when event images need to be inspected more closely.

## 21. SEO Handling

The `News & Events` page uses the shared SEO system of the website.

The relevant shared files include:

- `app/Traits/HasSeo.php`
- `resources/views/components/seo/seo-head.blade.php`
- `resources/views/layouts/app.blade.php`

For the events listing page, the controller provides fallback SEO values such as:

- page title
- page description
- fallback image

Unlike the recipe detail pages, this events page is a listing page rather than an individual event detail route, so the SEO is section-based rather than record-specific in the public route structure.

## 22. Admin Management

The event content is managed in the Filament admin panel through:

- `app/Filament/Resources/EventResource.php`

This resource allows administrators to create, edit, and maintain event records.

## 23. Fields in the Admin Panel

The event admin resource supports:

- event name
- event date
- event description
- sort number
- publish status
- multiple event image uploads
- SEO settings

### Multiple images

The image upload field is configured to:

- accept multiple images
- support ordering
- optimize images

This directly supports the public modal gallery feature of the page.

### Sort number

The `sort_no` field is especially important because it allows manual prioritization of events. This means administrators are not forced to rely only on event date ordering.

## 24. Data Flow Summary

The complete execution flow of the `News & Events` page is:

1. the user opens `/news_event`
2. Laravel routes the request to `PublicPageController::newsEvents()`
3. the controller determines the event sorting rule
4. published events are loaded with media
5. events are paginated and transformed
6. the Blade view renders the event cards
7. the user opens a modal to view event details and images
8. pagination allows browsing more event records

## 25. Strengths of the Implementation

The `News & Events` page has several strengths:

- uses database-driven event records
- supports multiple images per event
- supports manual sorting with `sort_no`
- includes pagination
- includes interactive modals
- provides image slideshow behavior
- uses shared SEO structure
- is manageable from the Filament admin panel

These features make it both functional and visually engaging.

## 26. Observations

Some practical observations about the implementation are:

- the page uses a listing-only route rather than individual event detail pages
- most interaction logic is written directly inside the Blade file
- event descriptions are simplified in the controller before being rendered
- the video hero is static rather than database-managed

These are useful points to mention in a thesis or capstone discussion under design decisions or future improvements.

## 27. Conclusion

The `News & Events` page is a dynamic Laravel content module that combines event listing, image galleries, modal interaction, pagination, and admin-side management. It is a strong example of how public media-rich content can be delivered through a database-driven structure while still providing a visually interactive user experience.

From a thesis or capstone perspective, this page demonstrates practical use of:

- Laravel routing
- Eloquent models
- media collections
- conditional sorting
- paginated content
- interactive front-end display
- admin-managed event publishing

This makes the `News & Events` page both a functional communication tool and a good architectural example within the website.
