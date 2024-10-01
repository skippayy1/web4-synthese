<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'admin_home'])->middleware('auth');

//Zone admin - pages
Route::get('/cms/index', [UserController::class, 'admin_home'])->name('admin.home')->middleware('auth');

Route::get('/cms/news', [UserController::class, 'admin_news'])->middleware("auth")->name('admin.news');
Route::get('/cms/news/add', [UserController::class, 'add_news'])->middleware("auth");
Route::post('/cms/news/add_submit', [UserController::class, 'add_news_submit'])->middleware("auth");
Route::get('/cms/news/modify{id}', [UserController::class, 'modify_news'])->middleware("auth");
Route::post('/cms/news/modify_submit', [UserController::class, 'modify_news_submit'])->middleware("auth");
Route::get('/cms/news/delete_submit{id}', [UserController::class, 'delete_news_submit'])->name('news.delete.submit');

Route::get('/cms/partners', [UserController::class, 'admin_partners'])->middleware("auth")->name('admin.partners');
Route::get('/cms/partners/add', [UserController::class, 'add_partner'])->middleware("auth");
Route::post('/cms/partner/add_submit', [UserController::class, 'add_partner_submit'])->middleware("auth");
Route::get('/cms/partner/modify{id}', [UserController::class, 'modify_partner'])->middleware("auth");
Route::post('/cms/partner/modify_submit', [UserController::class, 'modify_partner_submit'])->middleware("auth");
Route::get('/cms/partner/delete_submit{id}', [UserController::class, 'delete_partner_submit'])->name('partners.delete.submit');

//Zone admin - authentification
Route::get('/cms/login', [UserController::class, "cms_login"]);
Route::post('/cms/login_submit', [UserController::class, "cms_login_submit"]);
Route::post('/cms/logout', [UserController::class, 'cms_logout'])->middleware("auth")->name('admin.logout');

//Zone admin - produits
Route::get('/cms/products', [UserController::class, 'admin_products'])->name('admin.products')->middleware('auth');
Route::get('/cms/products/modify{id}', [UserController::class, 'modify_product'])->middleware('auth');
Route::post('/cms/products/modify_submit', [UserController::class, 'modify_product_submit'])->middleware('auth');

// Zone admin - reviews
Route::get('/cms/reviews/delete', [UserController::class, 'review_delete_submit'])->name('reviews.delete.submit')->middleware('auth');

// Zone admin - commandes
Route::get('/cms/orders/delete', [UserController::class, 'order_delete_submit'])->name('admin.orders.delete')->middleware('auth');