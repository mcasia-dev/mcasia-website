# Be Our Partners Documentation

## 1. Introduction

The `Be Our Partners` page, implemented in the project as the `Partnership` page, is a public inquiry and lead-capture page of the McAsia website. Its main purpose is to allow potential business partners to submit their personal and business information to the company for evaluation or follow-up.

Unlike a simple informational page, this module combines:

- a public form interface
- request validation
- email delivery
- user feedback through success or error messages

Because of this, the page is an important functional business workflow rather than just a content display page.

From a technical perspective, the `Be Our Partners` page demonstrates:

- Laravel `GET` and `POST` route handling
- form-based data capture
- request validation through a Form Request
- mail sending using a Mailable class
- front-end AJAX support for country loading
- user feedback messages after submission

This makes it a strong example of a transactional public-facing page in the website.

## 2. Purpose of the Page

The `Be Our Partners` page is designed to gather partnership-related information from website visitors who may want to work with McAsia.

From the user’s perspective, the page allows potential partners to:

- provide personal information
- submit contact details
- enter business information
- express partnership interest through a structured form

From the system’s perspective, the page is useful because it:

- standardizes the partner inquiry process
- validates incoming data
- sends the submission to the proper contact email
- provides immediate success or error feedback to the user

This makes it useful as a business development and lead intake feature.

## 3. Route Definitions

The routes are defined in `routes/web.php`.

```php
Route::get('/partnership', 'partnership')->name('partnership');
Route::post('/partnership/submit', 'sendPartnership');
```

These routes mean:

- `/partnership` displays the partnership page
- `/partnership/submit` processes the submitted partnership form

The `GET` route is used for the public form page, while the `POST` route is used for form processing.

## 4. Step-by-Step Page Flow

The `Be Our Partners` module has two main flows:

- page display flow
- form submission flow

## 5. Page Display Flow

### Step 1: User visits `/partnership`

The browser requests the public partnership page.

### Step 2: Laravel matches the route

Laravel checks `routes/web.php` and matches the request to:

- `MailController::partnership()`

### Step 3: Controller returns the view

The `partnership()` method simply returns:

- `resources/views/partnership.blade.php`

This means the display page does not depend on a database model. Its content is currently defined directly in the Blade file.

### Step 4: Blade view renders the form

The page displays:

- hero banner
- page title
- partner information form
- back button
- footer

## 6. Form Submission Flow

### Step 1: User fills out the form

The user enters personal and business details into the partnership form.

### Step 2: Form submits to `/partnership/submit`

The form sends a `POST` request to:

- `/partnership/submit`

Laravel matches this route to:

- `MailController::sendPartnership()`

### Step 3: Request validation

Before the controller continues, Laravel validates the input using:

- `app/Http/Requests/PartnershipRequest.php`

If validation fails, the page redirects back with validation messages.

### Step 4: Controller prepares the mail payload

If validation succeeds, the controller builds a data array containing all submitted values, including:

- personal identity data
- residential address data
- business details
- business contact information

### Step 5: Email is sent

The controller sends the data using:

- `PartnershipMail`

The message is sent to the configured contact address from:

- `config('mail.contact.partnership')`

### Step 6: Error handling

The controller wraps the mail sending process inside a `try-catch` block.

If sending fails:

- the user is redirected back with an error message

If sending succeeds:

- the user is redirected back with a success message

This creates a complete form-to-email workflow.

## 7. Controller Explanation

The controller used for this module is:

- `app/Http/Controllers/MailController.php`

It contains two relevant methods:

- `partnership()`
- `sendPartnership()`

## 8. `partnership()` Method

This method is responsible only for returning the public page view.

Its role is simple:

- serve the form page to the browser

Because no database query is involved here, the page behaves like a static functional form page.

## 9. `sendPartnership()` Method

This method is responsible for the main business workflow.

Its tasks are:

1. receive the validated form request
2. collect all submitted fields into one structured array
3. send an email using `PartnershipMail`
4. catch failures during sending
5. return a success or error response

This method is important because it converts a public website form into a usable internal communication process.

## 10. Validation Layer

The validation rules are defined in:

- `app/Http/Requests/PartnershipRequest.php`

Using a dedicated Form Request is a good Laravel practice because it keeps validation logic separate from the controller.

## 11. Validation Rules

The request validates the following fields:

- `name`
- `blk_no`
- `street`
- `barangay`
- `subdivision`
- `country`
- `zip_code`
- `mobile_number`
- `landline_number`
- `business_name`
- `business_address`
- `business_number`
- `business_website`
- `business_email`

### Required fields

The required fields include:

- `name`
- `street`
- `barangay`
- `country`
- `zip_code`
- `mobile_number`
- `business_name`
- `business_address`
- `business_email`

### Optional fields

Optional fields include:

- `blk_no`
- `subdivision`
- `landline_number`
- `business_number`
- `business_website`

### Special validation

The `mobile_number` field uses a regular expression to accept Philippine mobile number formats.

The `business_email` field must be a valid email address.

These validation rules help prevent incomplete or invalid partnership inquiries.

## 12. Mail Workflow

The `Be Our Partners` page uses Laravel mail functionality for submission processing.

The related mail class is:

- `app/Mail/PartnershipMail.php`

The email is sent using:

```php
Mail::to(config('mail.contact.partnership'))->send(new PartnershipMail($data));
```

This means:

- the mail recipient is controlled through configuration
- the mail body is structured through a Mailable class
- the form data is delivered through email rather than database storage

This is a practical design for an inquiry form where immediate notification is more important than record persistence.

## 13. Blade View Explanation

The public page view is:

- `resources/views/partnership.blade.php`

This file is responsible for rendering the public `Be Our Partners` page.

## 14. Main Parts of the Blade View

### 14.1 Hero Banner

At the top of the page, the view displays a large banner image:

- `images/partnership/banner.jpg`

The hero section also shows the title:

- `Partnership`

This immediately tells the user the purpose of the page.

### 14.2 Main Form Container

The main content area contains a styled form card with:

- page heading
- back button
- session success message
- full form fields

This section acts as the core of the page.

### 14.3 Personal Information Fields

The form collects personal information such as:

- name
- address
- mobile number
- landline number

The address is broken into several fields such as:

- block number
- street
- barangay
- subdivision
- country
- zip code

This provides more detailed and structured contact information.

### 14.4 Business Information Fields

The form also collects business-related fields such as:

- business name
- business address
- business number
- business website
- business email

This is important because the form is intended for business partnership inquiries, not only general concerns.

### 14.5 Validation Error Display

Each important input field uses Blade `@error` blocks to display validation messages.

This improves user experience because the user can immediately see which field must be corrected.

### 14.6 Submit Button

The form ends with a submit button that initiates the partnership submission.

### 14.7 Footer

At the bottom of the page, the shared footer is included:

```php
@include('components.footer')
```

This keeps the page visually aligned with the rest of the website.

## 15. Front-End Behavior

The page includes JavaScript logic at the bottom of the Blade file.

## 16. Country Dropdown Loading

The country select field is populated dynamically through an AJAX call to:

- `https://countriesnow.space/api/v0.1/countries/positions`

This means the country list is loaded dynamically rather than hardcoded into the form.

The script:

1. calls the external API
2. receives the country list
3. sorts the countries alphabetically
4. populates the `<select>` element
5. restores the old selected country value when available

This helps reduce hardcoded maintenance in the view.

## 17. Submission Locking

The page also prevents duplicate submissions by:

- disabling the submit button after submission
- changing the button label to `Submitting...`

This improves reliability and avoids accidental multiple submissions.

## 18. Layout and Content Considerations

Unlike pages such as `Our Story` or `Sales Avenue`, the partnership page does not currently load its text content from a dedicated database model.

Instead, its structure is mostly defined directly in the Blade view.

This means:

- it behaves more like a functional form page than a CMS-managed public page
- it is less dynamic than the other public page modules

However, this is acceptable for a workflow-oriented form page.

## 19. Data Flow Summary

The complete execution flow of the `Be Our Partners` page is:

1. the user opens `/partnership`
2. Laravel routes the request to `MailController::partnership()`
3. the Blade view renders the page and form
4. the user fills out personal and business details
5. the form submits to `/partnership/submit`
6. Laravel validates the request through `PartnershipRequest`
7. `MailController::sendPartnership()` prepares the data
8. the data is sent through `PartnershipMail`
9. the user is redirected back with a success or error message

## 20. Strengths of the Implementation

The `Be Our Partners` page has several strong qualities:

- captures structured business inquiry data
- uses dedicated request validation
- supports user feedback through session messages
- uses configuration-driven email recipients
- prevents duplicate submissions
- loads the country list dynamically

These make the page functional and practical for real business use.

## 21. Observations

Some useful observations about the implementation are:

- the page is not database-driven like the other public content pages
- the form uses an external country API, which adds flexibility but also creates a dependency on an external service
- submissions are sent by email rather than saved in the database
- the page focuses on workflow rather than content modularity

These are useful points to mention in a capstone or thesis discussion under design tradeoffs.

## 22. Conclusion

The `Be Our Partners` page is a functional Laravel form workflow that allows the website to capture partnership inquiries in a structured way. It combines route handling, Blade-based form rendering, validation, email sending, and user feedback into one complete business process.

From a thesis or capstone perspective, this page demonstrates practical use of:

- Laravel route handling
- Form Request validation
- controller-based mail delivery
- front-end form usability improvements
- structured business data capture

This makes the page an important example of how a business website can support direct operational workflows in addition to standard informational content.
