<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\UserController;
use App\Models\seller;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/login',function()
// {
//     return view('login');
// });
Route::post('/search',[ProductController::class,'search']);
Route::get('/login',[UserController::class,'loginIndex']);
Route::post('/loginuser',[UserController::class,'login']);
Route::get('/',[ProductController::class,'index']);
Route::get('/logout',[UserController::class,'logout']);
Route::get('/detail/{id}',[ProductController::class,'detail']);
Route::post('/addToCart',[ProductController::class,'addToCart']);
Route::get('/cartlist',[ProductController::class,'cartList']);
Route::get('/removeCart/{id}',[ProductController::class,'deleteCart']);
Route::get('/orderNow',[ProductController::class,'orderNow']);
Route::post('/buyNow',[ProductController::class,'buyNow']);
Route::post('/orderPlace',[ProductController::class,'orderPlace']);
Route::get('/myOrder',[ProductController::class,'myOrder']);
Route::get('/register',[UserController::class,'register']);
Route::post('/save_user',[UserController::class,'save_user']);
// Route::get('/registersel',[sellerController::class,'seller']);
// Route::post('/save_seller',[sellerController::class,'save_seller']);
// Route::get('/selerLogin',[sellerController::class,'selerLogin']);
// Route::post('/login',[sellerController::class,'login']);
// Route::get('/addProduct', 'App\Http\Controllers\ProductController@index');
Route::get('/registersel',[ProductController::class,'seller']);
Route::post('/save_seller',[ProductController::class,'save_seller']);
Route::get('/selerLogin',[ProductController::class,'selerLogin']);
Route::post('/login',[ProductController::class,'login']);
Route::get('/addProduct',[ProductController::class,'addProduct']);
Route::post('/saveProduct',[ProductController::class,'saveProduct']);
Route::get('/logoutSeller',[ProductController::class,'logoutSeller']);
Route::get('/ordersforsale',[ProductController::class,'ordersforsale']);


