<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apicontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




// Route::get("data",[apicontroller::class,'getData']);
// Route::get('/data/{id}',[apicontroller::class,'get']);

// Route::get('edit/{id}',[apicontroller::class,'show']);
// Route::post('edit/{id}',[apicontroller::class,'update']);

// Route::get('delete/{id}',[apicontroller::class,'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', [apicontroller::class,'index']);

Route::post('products', [apicontroller::class,'store']);

Route::get('products/{id}', [apicontroller::class,'show']);

Route::put('products/{id}', [apicontroller::class,'update']);

Route::delete('products/{id}', [apicontroller::class,'destroy']);
