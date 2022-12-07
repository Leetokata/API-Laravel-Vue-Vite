<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\FormController;

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

  Route::get('lista/getlist/{id}', [ListaController::class, 'getlist']);
  Route::apiResource('lista', ListaController::class);

  Route::get('nac', [FormController::class, 'getNoc'] );
  Route::get('expertise', [FormController::class, 'getExpertise'] );
  Route::get('cultural', [FormController::class, 'getCultural'] );


//  Route::get('test', function(){
//     return 'Listo';
//  });



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
