<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/product_catalog', function () {
    return view('product_catalog.product_catalog');
})->name('product_catalog');

Route::get('/product_catalog_mobile', function () {
    return view('product_catalog.product_catalog_mobile');
})->name('product_catalog_mobile');

Route::get('/menu_ideas_with_products', function () {
    return view('menu_ideas.menu_ideas_with_products');
})->name('menu_ideas_with_products');

Route::get('/menu_ideas_with_products_mobile', function () {
    return view('menu_ideas.menu_ideas_with_products_mobile');
})->name('menu_ideas_with_products_mobile');

Route::get('/consumer_products', function () {
    return view('consumer_products');
})->name('consumer_products');

Route::get('/foodservice_solutions', function () {
    return view('foodservice_solutions'); // <-- plural
})->name('foodservice_solutions');    // <-- plural

Route::get('/about_us', function () {
    return view('about_us');
})->name('about_us');

Route::get('/news_event', function () {
    return view('news_event');
})->name('news_event');

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('/view_all_brands', function () {
    return view('view_all_brands');
})->name('view_all_brands');

Route::get('/driven_innovation', function () {
    return view('driven_innovation');
})->name('driven_innovation');

Route::get('/committed_quality_safety', function () {
    return view('committed_quality_safety');
})->name('committed_quality_safety');

Route::get('/reliable_facilities', function () {
    return view('reliable_facilities');
})->name('reliable_facilities');

Route::get('/distribution_network', function () {
    return view('distribution_network');
})->name('distribution_network');

Route::get('/our_channel', function () {
    return view('our_channel');
})->name('our_channel');

Route::get('/our_impact', function () {
    return view('our_impact');
})->name('our_impact');

Route::get('/reach_us', function () {
    return view('reach_us');
})->name('reach_us');

Route::get('/recipes', function () {
    return view('recipes');
})->name('recipes');

Route::get('/retail_product', function () {
    return view('retail_product');
})->name('retail_product');

Route::get('/beverage', function () {
    return view('beverage');
})->name('beverage');

Route::get('/ecommerce', function () {
    return view('ecommerce');
})->name('ecommerce');

Route::get('/privacy_policy', function () {
    return view('privacy_policy');
})->name('privacy_policy');

Route::get('/termsandcondition', function () {
    return view('termsandcondition');
})->name('termsandcondition');

#------------------------PARTNERSHIP INSERT DATABASE-----------------------

Route::get('/partnership', function () {
    return view('partnership');
})->name('partnership');

Route::post('/partnership/submit', [\App\Http\Controllers\InsertDataInformation::class, 'submit_partnership_form']);

#--------------------------------------------------------------------------

Route::post('/send-mail', [MailController::class, 'sendTestEmail']);

#------------------------------BRANDS--------------------------------------
Route::get('/abc', function () {
    return view('brand_page.abc');
})->name('abc');

Route::get('/daisho', function () {
    return view('brand_page.daisho');
})->name('daisho');

Route::get('/oxford', function () {
    return view('brand_page.oxford');
})->name('oxford');

Route::get('/heng', function () {
    return view('brand_page.heng');
})->name('heng');

Route::get('/milcasa', function () {
    return view('brand_page.milcasa');
})->name('milcasa');

Route::get('/otafuku', function () {
    return view('brand_page.otafuku');
})->name('otafuku');

Route::get('/seachef', function () {
    return view('brand_page.seachef');
})->name('seachef');

Route::get('/ummami', function () {
    return view('brand_page.ummami');
})->name('ummami');

Route::get('/kingchef', function () {
    return view('brand_page.king_chef');
})->name('kingchef');

Route::get('/gaban', function () {
    return view('brand_page.gaban');
})->name('gaban');

Route::get('/meetu', function () {
    return view('brand_page.meetu');
})->name('meetu');

Route::get('/ozaki', function () {
    return view('brand_page.ozaki');
})->name('ozaki');

Route::get('/vico', function () {
    return view('brand_page.vico');
})->name('vico');

Route::get('/hamasaen', function () {
    return view('brand_page.hamasaen');
})->name('hamasaen');

Route::get('/longbeach', function () {
    return view('brand_page.longbeach');
})->name('longbeach');

Route::get('/oatdaily', function () {
    return view('brand_page.oatdaily');
})->name('oatdaily');

#--------------------------------------------------------------------------
