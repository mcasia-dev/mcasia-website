# Static and Viewer Pages Documentation

## 1. Introduction

Some public pages in the website are not driven by database records or controller query logic. Instead, they are returned directly from route closures or contain mostly fixed legal or viewer content.

This document covers:

- Privacy Policy
- Terms and Conditions
- Product Catalog
- Product Catalog Mobile
- Menu Ideas with Products
- Menu Ideas with Products Mobile

## 2. Legal Pages

### Privacy Policy

Route:

```php
Route::get('/privacy_policy', 'privacyPolicy')->name('privacy_policy');
```

Controller:

- `PublicPageController::privacyPolicy()`

View:

- `resources/views/privacy_policy.blade.php`

Purpose:

- displays the company data privacy clause
- uses the shared layout
- includes footer

### Terms and Conditions

Route:

```php
Route::get('/terms-and-conditions', 'termsAndConditions')->name('terms-and-conditions');
```

Controller:

- `PublicPageController::termsAndConditions()`

View:

- `resources/views/termsandcondition.blade.php`

Purpose:

- displays the website legal terms
- uses the shared layout
- includes footer

## 3. Route-Closure Viewer Pages

These pages are returned directly by route closures:

```php
Route::get('/product_catalog', fn() => view('product_catalog.product_catalog'))->name('product_catalog');
Route::get('/product_catalog_mobile', fn() => view('product_catalog.product_catalog_mobile'))->name('product_catalog_mobile');
Route::get('/menu_ideas_with_products', fn() => view('menu_ideas.menu_ideas_with_products'))->name('menu_ideas_with_products');
Route::get('/menu_ideas_with_products_mobile', fn() => view('menu_ideas.menu_ideas_with_products_mobile'))->name('menu_ideas_with_products_mobile');
```

## 4. Product Catalog

Desktop view:

- `resources/views/product_catalog/product_catalog.blade.php`

Mobile view:

- `resources/views/product_catalog/product_catalog_mobile.blade.php`

These pages are standalone viewers. They do not extend the normal public layout. They use flipbook-style JavaScript, page image loading, zoom controls, and back navigation.

## 5. Menu Ideas

Desktop view:

- `resources/views/menu_ideas/menu_ideas_with_products.blade.php`

Mobile view:

- `resources/views/menu_ideas/menu_ideas_with_products_mobile.blade.php`

These pages follow the same viewer idea as the product catalog, but they display menu-idea image pages instead.

## 6. Architectural Notes

These pages are different from the rest of the website because:

- they are self-contained documents
- they do not use database models
- they do not rely on public page admin resources
- some of them bypass `layouts.app`

## 7. Conclusion

These static and viewer pages extend the website beyond standard content pages. The legal pages support compliance and transparency, while the catalog and menu viewer pages provide an interactive way to browse visual materials.
