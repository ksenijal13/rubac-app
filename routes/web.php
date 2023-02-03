<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
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
Route::get('/', function(){
   return view('pages.login'); 
});
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'doLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware(["isLoggedIn"]);

Route::prefix('/admin')->middleware(['isLoggedIn', 'admin'])->group(function(){
    Route::get('/', function(){
        dd("cao");
        return view("pages.users");
    });
    Route::get('/users', function(Request $request){
        if($request->expectsJson()) {
            return json_encode(1); 
        }
        return view("pages.users");
    });
    Route::get('/settings', function(Request $request){
        if($request->expectsJson()) {
            return json_encode(1); 
        }
        return view("pages.settings");
    });
});            
