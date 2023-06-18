<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

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
Route::group(['middleware'=>'api'],function($routes){
Route::post('/register',[UserController::class,'register']);
Route::post('/login',[UserController::class,'login']);
Route::post('/create', [UserController::class, 'create']);
Route::post('/edit', [UserController::class, 'edit']);
Route::post('/delete', [UserController::class, 'delete']);
Route::post('/create', [UserController::class, 'create']);
Route::post('/delete', [UserController::class, 'delete']);
Route::post('/admin', [UserController::class, 'admin']);



// // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// //    return $request->user();
});
