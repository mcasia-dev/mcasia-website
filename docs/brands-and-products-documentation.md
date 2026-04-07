# Brands and Products Documentation

## 1. Introduction

The public catalog area of the website includes:

- brand detail pages
- product category pages
- product image API support

These pages help users browse McAsia offerings by brand and by product category.

## 2. Brand Route

The brand route is defined in `routes/web.php`:

```php
Route::get('/brands/{slug}', 'showBrands')->name('show-brands');
```

Handled by `PublicPageController::showBrands(string $slug)`, which loads the brand by slug together with media, related products and their media, and SEO, then returns `resources/views/show-brand.blade.php`.

## 3. Brand Model and Admin Resource

The model is `app/Models/Brand.php`.

Important features:

- stores name, slug, description, and active status
- uses `HasSeo`
- uses Spatie Media Library
- registers `brand-logo` and `brand-banner`
- relates to many products

The admin resource is `app/Filament/Resources/BrandResource.php`.

It manages:

- brand name
- slug
- description
- logo
- banner
- active status
- SEO settings

## 4. Products Routes

The product module uses routes from `ProductPageController`:

```php
Route::get('/products/{categorySlug}/images', 'images')->name('products.images');
Route::get('/products/{categorySlug}/{subcategorySlug}/images', 'images')->name('products.images.subcategory');
Route::get('/products/{categorySlug}/{subcategorySlug?}', 'show')->name('products.show');
```

This means:

- `/products/{categorySlug}/{subcategorySlug?}` renders the public product page
- `/images` routes return JSON image lists

## 5. Product Controller Logic

The public product logic is in `app/Http/Controllers/ProductPageController.php`.

The `show()` method loads active top-level categories, resolves the active category and optional subcategory, retrieves matching active products, extracts their media URLs, paginates the image list, and renders `resources/views/products/show.blade.php`.

The `images()` method performs a similar category resolution process but returns paginated image data as JSON.

## 6. Product Models and Database

### ProductCategory

File: `app/Models/ProductCategory.php`

Features:

- self-referencing parent and child categories
- active status and sort order
- category icon media collection
- SEO support
- many-to-many relation with products

### Product

File: `app/Models/Product.php`

Features:

- brand relation
- many-to-many category relation
- active status
- media collection `products`

Relevant migrations:

- `2026_02_27_013858_create_product_categories_table.php`
- `2026_02_27_014615_create_products_table.php`
- `2026_02_27_100000_create_product_product_category_table.php`
- `2026_03_23_072959_create_brands_table.php`

## 7. Product View

The public product page is `resources/views/products/show.blade.php`.

It renders:

- hero section
- top-level category cards
- child-category chips
- product image grid
- product count and pagination
- footer

The page behaves as a public visual catalog rather than a full ecommerce page.

## 8. Product Admin Resources

The catalog is managed through:

- `app/Filament/Resources/ProductCategoryResource.php`
- `app/Filament/Resources/ProductResource.php`

The category resource handles hierarchy, slug, level, sort order, active state, icon, and SEO.

The product resource handles image upload, assigned brand, name, description, categories, and active state.

## 9. Conclusion

The brand and product modules form the website’s public catalog architecture. They use relational data, media collections, slug-based routing, and admin-maintained records to present product information in a structured, scalable way.
