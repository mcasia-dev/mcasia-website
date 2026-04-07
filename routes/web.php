<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Route;


Route::controller(PublicPageController::class)
    ->group(function () {
        Route::get('/', 'home')->name('home');
        Route::get('/our-story', 'ourStory')->name('our-story');
        Route::get('/our-edge/{slug}', 'ourEdge')->name('our-edge');
        Route::get('/recipes', 'recipes')->name('recipes');
        Route::get('/recipes/{slug}', 'recipeShow')->name('recipes.show');
        Route::get('/news_event', 'newsEvents')->name('news_event');
        Route::get('/sales-avenue/{slug}', 'salesAvenue')->name('sales-avenue');
        Route::get('/reach-us', 'reachUs')->name('reach-us');
        Route::get('/our_channel', 'ourChannel')->name('our_channel');
        Route::get('/our_impact', 'ourImpact')->name('our_impact');
        Route::get('/brands/{slug}', 'showBrands')->name('show-brands');
        Route::get('/privacy_policy', 'privacyPolicy')->name('privacy_policy');
        Route::get('/terms-and-conditions', 'termsAndConditions')->name('terms-and-conditions');
    });

Route::get('/product_catalog', fn() => view('product_catalog.product_catalog'))->name('product_catalog');
Route::get('/product_catalog_mobile', fn() => view('product_catalog.product_catalog_mobile'))->name('product_catalog_mobile');

Route::get('/menu_ideas_with_products', fn() => view('menu_ideas.menu_ideas_with_products'))->name('menu_ideas_with_products');
Route::get('/menu_ideas_with_products_mobile', fn() => view('menu_ideas.menu_ideas_with_products_mobile'))->name('menu_ideas_with_products_mobile');


#------------------------PARTNERSHIP INSERT DATABASE-----------------------
Route::controller(MailController::class)
    ->group(function () {
        Route::get('/partnership', 'partnership')->name('partnership');
        Route::post('/send-mail', 'sendReachUs');
        Route::post('/partnership/submit', 'sendPartnership');
    });


#------------------------PRODUCTS------------------------------------------
Route::controller(\App\Http\Controllers\ProductPageController::class)
    ->group(function () {
        Route::get('/products/{categorySlug}/images', 'images')->name('products.images');
        Route::get('/products/{categorySlug}/{subcategorySlug}/images', 'images')->name('products.images.subcategory');
        Route::get('/products/{categorySlug}/{subcategorySlug?}', 'show')->name('products.show');
    });
