# Our Channel and Our Impact Documentation

## 1. Introduction

The `Our Channel` and `Our Impact` pages are closely related public content pages. Both use a similar structure:

- a banner image
- title and subtitle
- introductory description
- flexible block-based content
- footer

They are powered by separate models and admin resources, but they share the same architectural pattern.

## 2. Routes

The routes are defined in `routes/web.php`:

```php
Route::get('/our_channel', 'ourChannel')->name('our_channel');
Route::get('/our_impact', 'ourImpact')->name('our_impact');
```

## 3. Controller Logic

Both pages are handled by `PublicPageController`.

`ourChannel()` loads the latest published `OurChannel` record with media and SEO and returns `resources/views/our_channel.blade.php`.

`ourImpact()` loads the latest published `OurImpact` record with media and SEO and returns `resources/views/our_impact.blade.php`.

## 4. Models and Database

The models are:

- `app/Models/OurChannel.php`
- `app/Models/OurImpact.php`

Both:

- use `HasSeo`
- use Spatie Media Library
- cast `content_blocks` as an array
- store `title`, `subtitle`, `description`, `content_blocks`, and `is_published`

Relevant migrations:

- `2026_03_18_090000_create_our_channels_table.php`
- `2026_03_18_090100_create_our_impacts_table.php`

## 5. View Logic

The views are:

- `resources/views/our_channel.blade.php`
- `resources/views/our_impact.blade.php`

Both views:

- compute page title, subtitle, description, and banner
- collect `content_blocks`
- render paragraph blocks and image blocks
- show fallback descriptive text when the blocks are empty
- include a back button
- include the shared footer

## 6. Content Block System

The most important design feature is the `content_blocks` JSON field.

Each block can be:

- `paragraph`
- `image`

This allows the page to behave like a simple content builder rather than a fixed static layout.

## 7. Admin Management

The admin resources are:

- `app/Filament/Resources/OurChannelResource.php`
- `app/Filament/Resources/OurImpactResource.php`

Both resources use Filament `Builder` blocks to let administrators add:

- paragraph blocks with heading and body
- image blocks with file upload and caption

They also provide title, subtitle, description, banner upload, publish status, and SEO settings.

## 8. Conclusion

`Our Channel` and `Our Impact` are flexible public information pages implemented with the same content-builder pattern. Their design is useful because administrators can add mixed content blocks without requiring new templates for every content variation.
