<?php
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contacts/{id}', [ContactController::class, 'show']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::delete('/contacts/{id}', [ContactController::class, 'destroy']);
Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('update');
Route::get('/contacts/{id}/view', [ContactController::class, 'view'])->name('view');