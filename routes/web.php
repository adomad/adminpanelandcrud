<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SpotController;




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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin'],function(){
    Route::group(['middleware'=>'admin.guest'],function(){
        Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
        Route::get('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');




 
    });

    Route::group(['middleware'=>'admin.auth'],function(){
        Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');
        
        Route::get('/employees/{employee}/downloadPDF', [EmployeeController::class, 'downloadPDF'])->name('download.pdf');
        Route::get('/employees',[EmployeeController::class,'index'])->name('employees.index');
        Route::get('/employees/create',[EmployeeController::class,'create'])->name('employees.create');
        Route::post('/employees',[EmployeeController::class,'store'])->name('employees.store');
        Route::get('/employees/{employee}/edit',[EmployeeController::class,'edit'])->name('employees.edit');
        Route::get('/employees/{employee}/format',[EmployeeController::class,'format'])->name('employees.format');


        
        Route::post('/employees/{employee}',[EmployeeController::class,'update'])->name('employees.update');
        Route::delete('/employees/{employee}',[EmployeeController::class,'destroy'])->name('employees.destroy');;

        


       



        

        



 

    });


});
Route::resource('spots', 'SpotController');

       

Route::get('/spots', [SpotController::class, 'index'])->name('spots.index');
Route::get('/spots/create', [SpotController::class, 'create'])->name('spots.create');
Route::post('/spots', [SpotController::class, 'store'])->name('spots.store');
Route::get('/spots/{spot}/edit', [SpotController::class, 'edit'])->name('spots.edit');
Route::put('/spots/{spot}', [SpotController::class, 'update'])->name('spots.update');
Route::delete('/spots/{spot}', [SpotController::class, 'destroy'])->name('spots.destroy');




Route::get('/spots/{spot}/book', [SpotController::class, 'book'])->name('spots.book');



Route::get('/spots/{spot}/book', [SpotController::class, 'bookForm'])->name('spots.booking-form');





