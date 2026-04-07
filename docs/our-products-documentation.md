# Our Products Documentation

## 1. Introduction

The `Our Products` page is the public product catalog page of the McAsia website. Its purpose is to let visitors browse product categories, select subcategories, and view product images associated with the chosen category.

Unlike a full ecommerce page, this module is designed mainly as a visual product gallery. It focuses on category navigation and image presentation rather than pricing, cart functions, or detailed item purchasing.

## 2. Routes

The `Our Products` module uses the following routes from `routes/web.php`:

```php
Route::get('/products/{categorySlug}/images', 'images')->name('products.images');
Route::get('/products/{categorySlug}/{subcategorySlug}/images', 'images')->name('products.images.subcategory');
Route::get('/products/{categorySlug}/{subcategorySlug?}', 'show')->name('products.show');
```

These routes mean:

- `/products/{categorySlug}/{subcategorySlug?}` displays the main public product page
- `/products/{categorySlug}/images` returns category images as JSON
- `/products/{categorySlug}/{subcategorySlug}/images` returns subcategory images as JSON

## 3. Controller Used

The module is handled by `app/Http/Controllers/ProductPageController.php`.

### 3.1 `show()` Method

The `show()` method is the main controller method for rendering the public page.

Its responsibilities are:

1. load top-level product categories
2. load active child categories
3. identify the selected top category from the route slug
4. identify the selected subcategory when present
5. collect the relevant category IDs
6. retrieve active products assigned to those categories
7. load product media and category relations
8. collect product image URLs
9. paginate the images
10. return the public Blade view

If the top category or subcategory does not exist, Laravel returns a `404` error using `abort_if()`.

### 3.2 `images()` Method

The `images()` method is the API-style endpoint for retrieving product images in JSON format.

Its responsibilities are:

1. load the selected category and optional subcategory
2. retrieve matching active products
3. extract product image URLs
4. paginate the image list manually
5. return a JSON response with metadata such as:
   - `images`
   - `has_more`
   - `current_page`
   - `per_page`
   - `last_page`
   - `next_page`
   - `total`

This method is useful when the front end needs to fetch additional product images asynchronously.

## 4. Models Used

The `Our Products` page relies mainly on two models:

- `app/Models/ProductCategory.php`
- `app/Models/Product.php`

### 4.1 ProductCategory Model

The `ProductCategory` model represents the `product_categories` table.

Important features:

- supports parent-child relationships
- stores `name`, `slug`, `level`, `sort_order`, and `is_active`
- uses `HasSeo`
- uses Spatie Media Library
- registers the `category-icons` media collection
- defines:
  - `parent()`
  - `children()`
  - `products()`

This model is responsible for the category structure shown at the top of the product page.

### 4.2 Product Model

The `Product` model represents the `products` table.

Important features:

- stores product information such as `name`, `description`, `sku`, `brand_id`, and `is_active`
- uses Spatie Media Library
- registers the `products` media collection
- defines:
  - `categories()`
  - `brand()`

This model provides the actual product images shown on the public page.

## 5. Database Structure

The `Our Products` module depends on these migrations:

- `database/migrations/2026_02_27_013858_create_product_categories_table.php`
- `database/migrations/2026_02_27_014615_create_products_table.php`
- `database/migrations/2026_02_27_100000_create_product_product_category_table.php`

### 5.1 `product_categories` Table

Main columns:

- `id`
- `parent_id`
- `name`
- `slug`
- `level`
- `sort_order`
- `is_active`
- timestamps

This table supports hierarchical product categories.

### 5.2 `products` Table

Main columns:

- `id`
- `sku`
- `name`
- `description`
- `brand`
- `unit`
- `pack_size`
- `is_active`
- timestamps

### 5.3 Pivot Table

The `product_product_category` table links products to categories.

Main columns:

- `product_id`
- `product_category_id`
- `is_primary`

This many-to-many relationship allows one product to belong to multiple categories.

## 6. Public View File

The public page is rendered by:

- `resources/views/products/show.blade.php`

This view is responsible for displaying the complete `Our Products` page.

## 7. Parts of the Public View

### 7.1 Hero Section

The page begins with a large hero section using a fixed background image:

- `images/our-products/banner.jpg`

Inside the hero area, the page displays the top-level product categories as clickable category cards.

Each category card includes:

- category icon
- category name
- active-state styling

When the user clicks a category, the page navigates to the proper `products.show` route.

### 7.2 Subcategory Navigation

If the active top-level category has children, the page displays them as chip-style links.

This allows users to refine the product listing into a more specific product group.

### 7.3 Page Header and Product Count

Below the category navigation, the page shows:

- selected category or subcategory title
- product image count
- current pagination page

This gives the user clear context about what is being viewed.

### 7.4 Product Image Grid

The main content area is a grid of product images. Each image is loaded from the media collection attached to the `Product` model.

The view loops through the paginated image list and displays each image in a card-like container.

If there are no product images, the page displays a fallback message:

- `No images found.`

### 7.5 Pagination

If product images exist, the view renders Laravel pagination links at the bottom of the page.

### 7.6 Footer

The page ends by including the shared footer:

```php
@include('components.footer')
```

## 8. SEO Handling

The controller also prepares SEO data for the page using a helper method named `buildSeoViewData()`.

This method:

- loads SEO data from the selected category or subcategory
- builds fallback title and description values
- provides a fallback image

Because `ProductCategory` uses the `HasSeo` trait, the selected category can have its own SEO configuration.

## 9. Admin Management

The `Our Products` module is managed through two Filament resources:

- `app/Filament/Resources/ProductCategoryResource.php`
- `app/Filament/Resources/ProductResource.php`

### 9.1 Product Category Resource

This admin resource allows administrators to manage:

- parent category
- category name
- slug
- hierarchy level
- sort order
- active status
- category icon
- SEO data

### 9.2 Product Resource

This admin resource allows administrators to manage:

- product image
- linked brand
- product name
- description
- assigned categories
- active status

This means the public product page can be updated through the admin panel without editing the view code directly.

## 10. Relationships and Data Flow

The `Our Products` module follows this data flow:

1. the route receives the category slug and optional subcategory slug
2. `ProductPageController::show()` loads the active category structure
3. the controller resolves the selected category IDs
4. matching active products are loaded
5. product images are extracted from media
6. the paginated image list is sent to the Blade view
7. the Blade view renders category navigation and image grid

This structure keeps the controller responsible for data retrieval while the view handles presentation.

## 11. Strengths of the Implementation

The `Our Products` page has several strengths:

- supports hierarchical categories
- uses slug-based routing
- separates top-level and subcategory navigation clearly
- uses media-based product image handling
- includes JSON image endpoints
- supports SEO per category
- is manageable through Filament admin resources

## 12. Observations

Some practical observations about the current implementation:

- the page is image-focused and does not show full product specifications on the public page
- product browsing is category-driven instead of search-driven
- the JSON image route exists, but the main public page currently uses server-side pagination
- the Blade file contains most of the front-end styling inline

These are useful points for documentation, review, or future enhancement planning.

## 13. Conclusion

The `Our Products` page is a public catalog module built with Laravel, Blade, relational models, and media uploads. It uses category hierarchy, product-to-category mapping, and SEO-aware routing to create a structured and maintainable product gallery.

From a thesis or capstone perspective, this page is a strong example of how database-driven content, category-based navigation, and reusable admin resources can be combined into a practical product presentation system.
