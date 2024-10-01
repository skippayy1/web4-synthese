<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [ApiController::class, "api_login"]);
Route::get('/orders', [ApiController::class, "api_orders"])->middleware("auth:sanctum"); // Test
Route::get('/news', [ApiController::class, "api_news"]); 

Route::post('/add/order', [ApiController::class, "add_order_submit"])->middleware("auth:sanctum"); //ajouter une commande

Route::post('/add/user', [ApiController::class, "add_user_submit"]); 
Route::post('/modify/user', [ApiController::class, "modify_user_submit"])->middleware("auth:sanctum"); 
Route::get('/products', [ApiController::class, "get_products"]);
// Access the reviews of a product
Route::post('/reviews/send', [ApiController::class, "receive_reviews"])->middleware("auth:sanctum");
Route::get('/reviews/{product_id}', [ApiController::class, "get_reviews"]);

Route::get('/user/info', [ApiController::class, "api_user_info"])->middleware("auth:sanctum");
Route::get('/user/id', [ApiController::class, "api_user_id"])->middleware("auth:sanctum");
Route::get('/user/orders', [ApiController::class, "api_user_orders"])->middleware("auth:sanctum");
Route::get('/user/reviews', [ApiController::class, "api_user_reviews"])->middleware("auth:sanctum");

Route::post('/page/view', [ApiController::class, "page_view_submit"]);

Route::get('/progress', [ApiController::class, "api_progress"]);

Route::get('/partners', [ApiController::class, "api_partners"]);
