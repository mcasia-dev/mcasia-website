# Product Catalog Documentation

## 1. Introduction

The `Product Catalog` page is a public viewer page of the McAsia website. Its purpose is to present the company product catalog in an interactive flipbook format, allowing visitors to browse catalog pages as if they were turning the pages of a printed booklet.

This page is different from the standard public pages of the website because it is not driven by a database model and does not use a controller method that fetches records from the database. Instead, it is delivered directly through a route closure and rendered using a standalone Blade view designed specifically for the flipbook experience.

There are two versions of the catalog:

- desktop catalog viewer
- mobile catalog viewer

Both versions serve the same overall purpose, but their implementations differ to better match the target device.

## 2. Purpose of the Product Catalog Page

The main purpose of the `Product Catalog` page is to provide users with a visual browsing experience for McAsia product materials.

From a user perspective, the page allows visitors to:

- browse the catalog like a printed booklet
- move from page to page interactively
- zoom into catalog pages
- use desktop or mobile-friendly navigation depending on the device

From a technical perspective, the page demonstrates:

- route-closure based rendering
- standalone Blade page design
- front-end flipbook logic
- image-based page loading
- touch and zoom interaction handling

Unlike the `Our Products` public page, the `Product Catalog` page is not category-driven or database-driven. It is closer to a digital brochure or catalog reader.

## 3. Route Definition

The route is defined in `routes/web.php` as:

```php
Route::get('/product_catalog', fn() => view('product_catalog.product_catalog'))->name('product_catalog');
```

There is also a mobile version:

```php
Route::get('/product_catalog_mobile', fn() => view('product_catalog.product_catalog_mobile'))->name('product_catalog_mobile');
```

This means:

- `/product_catalog` loads the desktop version
- `/product_catalog_mobile` loads the mobile version

Unlike the content-driven pages, these routes do not call a controller method. Instead, they directly return the specified Blade view.

## 4. General Architecture

The `Product Catalog` page uses a different architecture from the rest of the public website.

It does not:

- use Eloquent models
- query database tables
- depend on SEO resource records
- extend the standard public layout in the usual way

Instead, it works as a self-contained viewer page that loads catalog images and front-end libraries directly.

This design is appropriate because the page behaves more like a digital publication reader than a standard informational website page.

## 5. Desktop Product Catalog View

The desktop version is found in:

- `resources/views/product_catalog/product_catalog.blade.php`

This file is a standalone HTML document that includes its own structure, scripts, and styles.

## 6. Structure of the Desktop View

The desktop viewer contains the following major parts:

### 6.1 Standalone HTML document

The file starts as a full HTML document rather than extending `layouts.app`. This means it independently defines:

- `<html>`
- `<head>`
- `<body>`

This gives the page full control over its presentation and behavior.

### 6.2 External dependencies

The page loads external libraries such as:

- Bootstrap
- jQuery
- Modernizr
- `hash.js`

It also loads flipbook-specific assets from:

- `product_catalog_flip_page_assets`

These assets include:

- `turn.js`
- `zoom.min.js`
- `magazine.js`
- `magazine.css`

These libraries are responsible for page turning, zoom behavior, and catalog interaction.

### 6.3 Top bar

At the top of the page, the viewer includes a fixed top bar with:

- Home button
- Back button
- page title

This top bar provides simple navigation controls so users can return to the homepage or the previous page.

### 6.4 Canvas and magazine viewport

The main viewer area is built around:

- `#canvas`
- `.magazine-viewport`
- `.magazine`

These elements act as the container for the interactive flipbook.

### 6.5 Next and Previous buttons

The viewer includes button overlays for:

- next page
- previous page

These are used by the flipbook engine to simulate turning pages.

## 7. Desktop Flipbook Logic

The desktop version uses the `loadApp()` JavaScript function as the main entry point for the flipbook.

This function is responsible for:

1. fading in the canvas
2. checking if the CSS has loaded
3. creating the flipbook using `turn.js`
4. configuring zoom support
5. enabling keyboard navigation
6. enabling hash-based page state
7. handling next and previous button interactions
8. resizing the viewport

### 7.1 Page configuration

The desktop catalog sets:

- width: `922`
- height: `600`
- pages: `40`

This means the viewer expects 40 catalog pages.

### 7.2 Events handled by the flipbook

The `turn.js` setup responds to:

- `turning`
- `turned`
- `missing`

These events allow the page to:

- update the current URI
- manage navigation buttons
- center the flipbook
- load missing pages dynamically

### 7.3 Zoom behavior

The desktop page uses `zoom.js` to support:

- zoom in
- zoom out
- swipe navigation while zoomed
- resizing

The user can also press:

- left arrow to go previous
- right arrow to go next
- `ESC` to exit zoom mode

### 7.4 Hash routing

The desktop version uses `Hash.on()` so that the page number can be stored in the URL hash. This makes it possible to navigate directly to a specific page state.

## 8. Mobile Product Catalog View

The mobile version is found in:

- `resources/views/product_catalog/product_catalog_mobile.blade.php`

Unlike the desktop version, this page does not rely on `turn.js`. Instead, it uses a custom JavaScript-based `Flipbook` class.

## 9. Structure of the Mobile View

The mobile page includes:

- full-screen fixed layout
- page container
- touch areas for previous and next actions
- navigation hints
- back button
- zoom controls
- page indicator

The layout is designed for phones and touch devices.

## 10. Mobile Flipbook Logic

The main logic is implemented in a JavaScript class named:

- `Flipbook`

This class is responsible for:

- loading page images
- rendering page layers
- handling swipe navigation
- handling pinch zoom
- handling panning while zoomed
- managing page state
- updating the page indicator

### 10.1 Page loading

The mobile script generates page image filenames in a loop:

```javascript
for (let i = 1; i <= 40; i++) {
    pageFiles.push(`${i}.png`);
}
```

This means the mobile viewer expects images under:

- `/images/product_catalog/{page}.png`

### 10.2 Touch interaction

The page supports:

- swipe left and right
- pinch zoom
- drag to pan while zoomed

This makes the viewer more suitable for mobile browsing.

### 10.3 Zoom controls

The page includes dedicated buttons for:

- zoom in
- zoom out
- zoom reset

### 10.4 Back button

The back button uses:

```javascript
window.history.back();
```

This is consistent with the behavior used in other public pages.

## 11. Difference Between Desktop and Mobile Versions

Although both versions display the same product catalog concept, they differ in implementation:

### Desktop version

- uses `turn.js`
- uses jQuery-based magazine flipbook behavior
- uses keyboard support
- is optimized for larger screens

### Mobile version

- uses a custom JavaScript class
- loads pages as images directly
- supports touch gestures
- supports pinch zoom and drag
- is optimized for mobile screens

This split approach is a practical design choice because a single viewer implementation would not necessarily perform equally well on both desktop and mobile devices.

## 12. Data Source

The `Product Catalog` page does not fetch data from the database.

Instead, its content comes from image assets and flipbook resources stored in the project. This means the catalog is essentially image-driven rather than model-driven.

The actual displayed pages depend on:

- image files stored under the expected directory
- flipbook asset libraries

Because of this, updating the catalog usually means replacing or updating the underlying page images rather than editing database records.

## 13. Components and Layout Considerations

This page does not use:

- the shared public header
- the shared public footer
- database-driven SEO records
- the standard `layouts.app` layout

That is an intentional design choice because the catalog viewer behaves as a focused standalone experience. Its interface is minimal and centered on page turning.

## 14. Strengths of the Implementation

The `Product Catalog` page has several strengths:

- provides a brochure-like user experience
- supports both desktop and mobile interaction patterns
- avoids unnecessary backend complexity
- works independently from database content
- supports image-based visual presentation
- includes zooming and navigation controls

These qualities make it suitable for product presentation materials that are primarily visual in nature.

## 15. Observations

Some practical observations about the implementation are:

- the page depends on the presence of image files and flipbook assets
- the desktop and mobile versions are implemented separately, which increases maintenance effort but improves usability
- this page is not SEO-structured like the other public pages because it behaves more like an interactive viewer
- updates are likely handled through asset replacement instead of CMS editing

These are good points to discuss in a capstone or thesis chapter under architecture or design tradeoffs.

## 16. Step-by-Step Execution Summary

The `Product Catalog` workflow can be summarized as follows:

1. the user opens `/product_catalog` or `/product_catalog_mobile`
2. Laravel matches the route closure
3. the corresponding Blade view is returned directly
4. the browser loads the viewer interface and front-end scripts
5. the viewer loads catalog page images
6. the user interacts with the catalog using buttons, swipes, zooming, or keyboard controls

## 17. Conclusion

The `Product Catalog` page is a standalone interactive viewer module built for presenting brochure-style product materials. It differs from the database-driven public pages because it relies on image assets and front-end page-turning logic instead of Eloquent records and standard layout templates.

From a thesis or capstone perspective, this page is a strong example of:

- route-closure page rendering
- standalone Blade page implementation
- desktop and mobile UI specialization
- front-end-driven interactive document viewing

It shows how Laravel can also be used to deliver rich interactive static experiences, not only model-based content pages.
