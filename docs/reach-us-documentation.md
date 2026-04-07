# Reach Us Documentation

## 1. Introduction

The `Reach Us` page is the main public contact page of the McAsia website. Its primary purpose is to provide users with a direct communication channel to the company. It introduces the contact section, displays supporting page content, shows the office location through an embedded map, and includes a contact form that allows visitors to send inquiries or concerns.

Unlike a purely informational page, the `Reach Us` page combines both:

- public page presentation
- form submission and email handling

Because of this, the page is both a content page and an interactive communication feature of the website.

From a system perspective, the `Reach Us` module demonstrates:

- Laravel route handling for display and form submission
- database-driven public page content
- request validation
- email sending through a controller
- component-based view structure
- SEO integration
- admin-side management through Filament

This makes it one of the more complete workflow pages in the website because it connects front-end presentation with backend form processing.

## 2. Purpose of the Reach Us Page

The `Reach Us` page exists to help website visitors connect directly with McAsia.

From the user’s perspective, the page allows visitors to:

- read a short contact introduction
- view the office location on an embedded map
- fill out a contact form
- send a concern or inquiry directly to the company

From the technical perspective, the page is useful because it:

- stores page content in the database
- validates user input before processing
- sends email using Laravel mail functionality
- keeps form display and validation logic organized
- uses reusable Blade components for the map and form sections

This makes the page both practical and maintainable.

## 3. Route Definitions

The `Reach Us` module uses both display routes and a submission route.

The routes are defined in `routes/web.php` as:

```php
Route::get('/reach-us', 'reachUs')->name('reach-us');
Route::get('/reach_us', 'reachUs')->name('reach_us');
Route::post('/send-mail', 'sendReachUs');
```

These routes mean:

- `/reach-us` displays the contact page
- `/reach_us` also displays the same page
- `/send-mail` processes the form submission

The two `GET` routes point to the same controller method, which allows the page to be accessed using either URL variation.

The `POST` route is responsible for receiving form input and sending the inquiry email.

## 4. Step-by-Step Page Flow

The `Reach Us` module has two main flows:

- public page display flow
- form submission flow

## 5. Public Page Display Flow

### Step 1: User visits `/reach-us` or `/reach_us`

The browser sends a request to one of the two public contact URLs.

### Step 2: Laravel matches the route

Laravel checks `routes/web.php` and matches the request to:

- `PublicPageController::reachUs()`

### Step 3: Controller loads contact page data

Inside `app/Http/Controllers/PublicPageController.php`, the `reachUs()` method performs the main display logic.

The method:

1. loads the first published `ReachUs` record
2. includes related media
3. includes related SEO
4. passes the record to the Blade view
5. sends SEO fallback values to the layout

This means the contact page content is controlled through the database rather than hardcoded directly in the Blade file.

### Step 4: Blade view renders the page

The controller returns:

- `resources/views/reach_us.blade.php`

This view renders the banner, title, description, map, form, and footer.

## 6. Form Submission Flow

### Step 1: User fills out the form

The public contact form is shown inside a Blade component on the `Reach Us` page.

The user enters:

- first name
- middle name
- last name
- email
- phone
- message

### Step 2: Form submits to `/send-mail`

The form sends a `POST` request to:

- `/send-mail`

Laravel matches this route to:

- `MailController::sendReachUs()`

### Step 3: Request validation

Before the controller processes the form, Laravel validates the request using:

- `app/Http/Requests/ReachUsRequest.php`

If the validation fails, the request returns to the same page and shows validation errors.

### Step 4: Controller prepares the mail data

Inside `MailController::sendReachUs()`, the controller combines:

- first name
- middle name
- last name

into one `full_name` value.

It then builds a data array containing:

- full name
- email
- phone
- message

### Step 5: Email is sent

The controller sends the message using:

- `ReachUsMail`

The email is sent to the configured contact address using:

- `config('mail.contact.reach_us')`

### Step 6: User is redirected back

After the email is sent successfully, the user is redirected back to the same page with a success message.

This completes the contact submission workflow.

## 7. Display Controller Explanation

The display controller method is located in:

- `app/Http/Controllers/PublicPageController.php`

The `reachUs()` method is responsible for:

- retrieving the published page content
- loading banner media
- loading SEO metadata
- sending the record to the Blade view
- providing fallback SEO values

This method ensures the page behaves like the other public content pages of the website.

## 8. Submission Controller Explanation

The form processing method is located in:

- `app/Http/Controllers/MailController.php`

The `sendReachUs()` method is responsible for:

- receiving validated input
- building the full name field
- preparing mail data
- sending the email
- redirecting back with a success message

This method handles the functional side of the `Reach Us` page.

## 9. ReachUs Model

The page content is represented by:

- `app/Models/ReachUs.php`

This model represents the `reach_us` table.

## 10. Responsibilities of the Model

The model is responsible for:

- storing the page title
- storing the subtitle
- storing the description
- managing publish status
- handling banner media
- handling SEO metadata

## 11. Important Fields

The fillable fields are:

- `title`
- `subtitle`
- `description`
- `is_published`

These fields are enough to manage the public content of the page while leaving the form itself as a functional component.

## 12. Casts

The model casts:

- `is_published` as a boolean

This allows the controller to reliably filter only published contact page records.

## 13. Media Collection

The model uses Spatie Media Library and defines:

- `reach-us-banner`

This collection stores the hero banner image for the contact page.

If no media is uploaded, the Blade view uses a fallback image.

## 14. SEO Support

The model uses the `HasSeo` trait, which allows the page to have:

- SEO title
- meta description
- canonical URL
- Open Graph metadata
- Twitter metadata

This is useful because even the contact page benefits from proper metadata when shared or indexed.

## 15. Query Scope

The model defines:

- `scopeIsPublished()`

This ensures only published `Reach Us` records are visible publicly.

## 16. Database Structure

The `reach_us` table is created by:

- `database/migrations/2026_03_18_013150_create_reach_us_table.php`

## 17. Main Table Columns

Important columns include:

- `id`
- `title`
- `subtitle`
- `description`
- `is_published`
- `created_at`
- `updated_at`

## 18. Purpose of the Columns

`title`
: stores the page heading

`subtitle`
: stores the short supporting text below the heading

`description`
: stores the main descriptive or introductory content

`is_published`
: determines whether the page is publicly visible

This table structure is simple because the actual contact functionality is handled separately by the form and mail controller.

## 19. Request Validation

The request validation is handled by:

- `app/Http/Requests/ReachUsRequest.php`

This class ensures that the contact form receives valid and complete data before any email is sent.

## 20. Validation Rules

The request class validates the following fields:

- `first_name` as required string
- `middle_name` as optional string
- `last_name` as required string
- `email` as required valid email
- `phone` as required Philippine mobile format
- `message` as required string

The phone field uses a regular expression to accept Philippine-style mobile numbers.

This validation is important because it prevents malformed or incomplete contact data from being sent through the system.

## 21. Mail Handling

The form submission uses Laravel mail functionality through:

- `app/Mail/ReachUsMail.php`

The controller sends the email using:

```php
Mail::to(config('mail.contact.reach_us'))->send(new ReachUsMail($data));
```

This means the recipient email address is controlled through configuration rather than hardcoded directly in the controller.

This is a good practice because it makes the system easier to update and maintain.

## 22. Blade View Explanation

The main page view is:

- `resources/views/reach_us.blade.php`

This file is responsible for displaying the public `Reach Us` page.

It includes:

- page-level styling
- hero banner section
- title and description area
- map component
- form component
- footer

## 23. Parts of the Main View

### 23.1 Hero Banner

At the top of the page, the view displays a large banner image.

The image source is:

- uploaded `reach-us-banner` media if available
- fallback image `images/HOMEPAGE/4.jpg` otherwise

The hero section also displays:

- page title
- page subtitle

### 23.2 Introductory Content

Below the banner, the page displays the main title and description of the contact section.

The description is rendered using:

```php
{!! $data->description !!}
```

This means it supports formatted rich text entered from the admin panel.

If the description is missing, the page uses fallback explanatory content.

### 23.3 Two-Column Content Area

The view then displays two major components side by side:

- office map
- contact form

These are rendered using:

- `<x-reach_us.map />`
- `<x-reach_us.form />`

This component-based design keeps the main view cleaner and easier to maintain.

## 24. Map Component

The map component is:

- `resources/views/components/reach_us/map.blade.php`

This component contains:

- a heading
- short helper text
- embedded Google Maps iframe

The map is used to show the physical office location of McAsia.

This improves the practical usefulness of the page because users can locate the company directly.

## 25. Form Component

The form component is:

- `resources/views/components/reach_us/form.blade.php`

This component contains:

- success message display
- CSRF protection
- full contact form fields
- validation error display
- submit button

Each form field is connected to Laravel validation error handling using Blade’s `@error` directive.

This is important because it gives immediate user feedback when form input is invalid.

## 26. Front-End Behavior

The `Reach Us` page includes custom JavaScript in the main Blade file.

## 27. Fade-In Scroll Effect

The page uses a `fade-section` class and a scroll-based script to reveal sections when they enter the viewport.

This improves the visual experience by making the content appear more smoothly as the user scrolls.

## 28. Submission Locking

The page also includes form submission protection using JavaScript.

When the user submits the form:

1. the button is disabled
2. the button text changes to `Submitting...`
3. repeated submissions are prevented

This reduces the chance of duplicate email submissions.

## 29. SEO Handling

The `Reach Us` page uses the shared SEO structure of the public website.

Relevant shared files include:

- `app/Traits/HasSeo.php`
- `resources/views/components/seo/seo-head.blade.php`
- `resources/views/layouts/app.blade.php`

The controller provides:

- the loaded SEO record
- fallback title
- fallback description
- fallback image

Because the `ReachUs` model uses the `HasSeo` trait, the contact page can have custom SEO values configured from the admin side.

## 30. Admin Management

The public content of the `Reach Us` page is managed through:

- `app/Filament/Resources/ReachUsResource.php`

This resource provides a structured admin form for page editing.

## 31. Fields in the Admin Resource

The admin resource allows administrators to manage:

- title
- subtitle
- description
- banner image
- publish status
- SEO settings

This means the visual and written content of the contact page can be updated without editing the Blade files directly.

## 32. Data Flow Summary

The complete `Reach Us` module flow is:

1. user visits `/reach-us`
2. Laravel routes the request to `PublicPageController::reachUs()`
3. the controller loads the published page record
4. the Blade view renders banner, description, map, and form
5. user fills out the contact form
6. form submits to `/send-mail`
7. `ReachUsRequest` validates the input
8. `MailController::sendReachUs()` sends the email
9. user is redirected back with a success message

## 33. Strengths of the Implementation

The `Reach Us` page has several strong qualities:

- combines content and interaction in one module
- uses validation before submission
- sends inquiry emails through Laravel mail
- uses reusable Blade components
- supports page SEO
- supports page banner uploads
- is manageable through Filament

These features make the page practical for real-world communication use.

## 34. Observations

Some useful observations about the implementation are:

- the page content is database-driven but the map is currently embedded as a fixed iframe
- the form fields are hardcoded in the component, which is appropriate for a contact form
- the submission route is shared for all inquiries of this specific type
- the page uses both component-based rendering and page-level scripts effectively

These are useful discussion points for maintainability and future enhancements.

## 35. Conclusion

The `Reach Us` page is a complete Laravel contact workflow that combines public content presentation, embedded location display, request validation, and email-based form processing. It is one of the most functionally complete pages in the website because it connects user interaction directly with backend business communication.

From a thesis or capstone perspective, this page demonstrates practical use of:

- Laravel routing
- model-based content retrieval
- Blade component composition
- request validation
- mail sending
- admin-managed page content

This makes the `Reach Us` page both a useful business feature and a strong example of integrated front-end and back-end website functionality.
