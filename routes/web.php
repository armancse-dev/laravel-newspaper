<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\crudController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [frontController::class, 'index']);
Route::get('category', [frontController::class, 'category']);
Route::get('post', [frontController::class, 'post']);

//admin
Route::get('admin', [adminController::class, 'index']);

//category
Route::get('viewcategory', [adminController::class, 'viewcategory']);

Route::POST('addcategory', [crudController::class, 'insertData']);

Route::get('editcategory/{id}', [adminController::class, 'editCategory']);
Route::POST('updatecategory/{id}', [crudController::class, 'updateData']);

Route::POST('multipledelete', [adminController::class, 'multipleDelete']);

//settings
Route::get('settings', [adminController::class, 'settings']);
Route::POST('addsettings', [crudController::class, 'insertData']);
Route::POST('updatesettings/{id}', [crudController::class, 'updateData']);

