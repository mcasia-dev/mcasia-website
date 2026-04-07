# Terms and Conditions Documentation

## 1. Introduction

The `Terms and Conditions` page is one of the legal public pages of the McAsia website. Its purpose is to define the legal rules, conditions, limitations, and responsibilities that apply to users who access and use the website and its related services.

Like the `Privacy Policy` page, this page is primarily legal and compliance-oriented. It is not designed to market products or present corporate storytelling. Instead, it provides legal protection, operational clarity, and a formal statement of the company’s service conditions.

From a technical perspective, the page is simpler than the dynamic content pages because it does not retrieve database records. However, it is still an important part of the website because it supports legal transparency and user governance.

This page demonstrates:

- Laravel route-based rendering
- controller-returned static legal content
- Blade-based legal page presentation
- shared public layout integration
- footer-based legal navigation consistency

## 2. Purpose of the Terms and Conditions Page

The main purpose of the `Terms and Conditions` page is to communicate the rules that govern use of the website and its services.

From the user’s perspective, the page helps visitors:

- understand the legal basis for using the website
- know their responsibilities while using the services
- read limits on liability and legal disclaimers
- understand the governing law and legal procedures

From the system perspective, the page serves:

- legal disclosure
- terms of use communication
- website governance
- corporate risk reduction

Although not interactive, it is an essential page in a business website because it defines the legal relationship between the company and the user.

## 3. Route Definition

The route is defined in `routes/web.php`.

```php
Route::get('/terms-and-conditions', 'termsAndConditions')->name('terms-and-conditions');
```

This route means:

- URL: `/terms-and-conditions`
- HTTP method: `GET`
- controller method: `PublicPageController::termsAndConditions()`
- route name: `terms-and-conditions`

When the user opens the URL, Laravel routes the request to the corresponding controller method.

## 4. Step-by-Step Request Flow

### Step 1: User visits `/terms-and-conditions`

The browser sends a request to the legal terms page.

### Step 2: Laravel matches the route

Laravel checks `routes/web.php` and matches the request to:

- `PublicPageController::termsAndConditions()`

### Step 3: Controller returns the Blade view

Inside `app/Http/Controllers/PublicPageController.php`, the method is:

```php
public function termsAndConditions()
{
    return view('termsandcondition');
}
```

This means:

- no database query is performed
- no Eloquent model is used
- the controller simply returns the legal page view

### Step 4: Blade view renders the page

Laravel renders:

- `resources/views/termsandcondition.blade.php`

The shared layout provides the page shell, and the footer is included at the bottom.

## 5. Controller Explanation

The controller used is:

- `app/Http/Controllers/PublicPageController.php`

The `termsAndConditions()` method has one main responsibility:

- return the terms and conditions Blade view

This minimal implementation is appropriate because the page content is static and legal in nature.

## 6. Nature of the Page

The `Terms and Conditions` page is a static legal page.

This means:

- its content is defined directly in the Blade file
- no database table is used to store the page content
- no page-specific model is involved
- no admin resource currently manages the content

This is a practical approach for a legal page whose content is usually updated less frequently than the main marketing or corporate content pages.

## 7. Blade View Explanation

The main view used by the page is:

- `resources/views/termsandcondition.blade.php`

This file contains the entire public legal content of the page.

## 8. Structure of the Blade View

The view starts with:

```php
@extends('layouts.app')
@section('title', 'Terms and Conditions')
```

This means the page uses the shared site layout and sets its browser title appropriately.

The content is placed inside a centered card-based layout with:

- page heading
- introduction
- table of contents
- multiple legal sections
- footer

This layout is suitable for large legal text because it keeps the content readable and visually organized.

## 9. Header Section

At the top of the page, the view shows the heading:

- `Terms and Conditions`

This clearly identifies the legal purpose of the page.

## 10. Introductory Content

The introduction explains:

- the legal agreement between the company and the user
- the website identity
- the company name and address
- the user’s obligation to agree before continuing to use the services

This is important because it establishes the contractual and legal context of the page.

## 11. Table of Contents

The page includes a table of contents section listing the major legal sections.

These include topics such as:

- Our Services
- Intellectual Property Rights
- User Representations
- Products
- Purchases and Payment
- Prohibited Activities
- Privacy Policy
- Termination
- Governing Law
- Disclaimer
- Limitations of Liability
- Contact Us

This makes the legal page easier to scan and more structured for readers.

## 12. Main Legal Sections

The page contains multiple legal sections, each rendered as headings and paragraphs.

The sections cover matters such as:

### 12.1 Our Services

Explains the scope of the services and use restrictions by jurisdiction.

### 12.2 Intellectual Property Rights

Explains ownership of content, trademarks, and usage restrictions.

### 12.3 User Representations

Defines what a user promises or confirms when using the services.

### 12.4 User Registration

Explains possible registration responsibilities and account conduct.

### 12.5 Products

Explains product presentation, availability, and limitations on accuracy or stock.

### 12.6 Purchases and Payment

Explains transaction conditions, pricing, and company rights regarding purchase management.

### 12.7 Prohibited Activities

Defines activities that users are not allowed to perform on or through the website.

### 12.8 Privacy Policy

Links the terms page to the privacy framework of the website.

### 12.9 Term and Termination

Explains how use of the services may be terminated.

### 12.10 Governing Law and Liability

Explains the legal basis, disclaimers, and liability limitations governing service use.

These legal sections protect the company and inform users of the expected legal relationship.

## 13. Shared Layout Usage

The page uses:

- `resources/views/layouts/app.blade.php`

This means the page inherits:

- the site header
- shared CSS and JavaScript
- common metadata handling
- global layout structure

Using the shared layout ensures the legal page remains visually integrated with the rest of the website.

## 14. Footer Usage

At the bottom of the view, the page includes:

```php
@include('components.footer')
```

This keeps the page connected to the company contact information and the legal footer navigation.

## 15. SEO and Metadata Behavior

Even though the page is not backed by a dedicated model with `HasSeo`, it still benefits from the shared layout and page title handling.

The page explicitly sets:

- `@section('title', 'Terms and Conditions')`

This allows:

- correct browser title display
- shared fallback metadata behavior
- proper presentation in the layout structure

The page does not currently use a database-driven SEO record, but it still fits into the broader site metadata system.

## 16. Design Characteristics

The `Terms and Conditions` page is intentionally simple and text-focused.

Its design emphasizes:

- readability
- structured spacing
- clear text hierarchy
- centralized content presentation

This is appropriate because legal documents should prioritize clarity rather than decorative visuals.

## 17. Strengths of the Implementation

The page has several strengths:

- clear and direct legal presentation
- uses the shared website layout
- easy for users to access from the site
- includes organized legal sections
- supports compliance and transparency
- integrates naturally with the footer navigation

These are appropriate strengths for a static legal page.

## 18. Observations

Some practical observations about the implementation are:

- the page content is hardcoded in the Blade file
- updates require editing the source code unless a CMS solution is introduced later
- the page is text-heavy and could benefit from future readability improvements if needed
- this page is best treated as a stable legal reference page rather than a frequently updated content page

These are useful observations for comparison against the dynamic public pages of the website.

## 19. Data Flow Summary

The complete execution flow of the page is:

1. the user opens `/terms-and-conditions`
2. Laravel routes the request to `PublicPageController::termsAndConditions()`
3. the controller returns the `termsandcondition` Blade view
4. the shared layout renders the page shell
5. the legal content is displayed
6. the shared footer is shown

## 20. Conclusion

The `Terms and Conditions` page is a static legal page implemented within the Laravel public website structure. It uses a simple controller method, a dedicated Blade view, and the shared layout to present legal text in a consistent and readable way.

From a thesis or capstone perspective, this page demonstrates:

- static page rendering in Laravel
- legal page integration in a public website
- reuse of shared layout structures
- distinction between compliance pages and database-driven business pages

Although technically simpler than the dynamic corporate pages, the `Terms and Conditions` page remains an important part of the website because it supports legal clarity, user governance, and institutional professionalism.
