<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SpotController;
use App\Http\Controllers\BookingController;




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
    
    Route::get('/register', function(){
        return view('register');
});
Route::post('/login', function(){
    return view('login'); 
});
Route::get('/profile', function(){
    return view('profile'); 
});
Route::group(['prefix'=>'admin'],function(){
    Route::group(['middleware'=>'admin.guest'],function(){
        Route::post('/login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
        Route::get('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');




 
    });

    Route::group(['middleware'=>'admin.auth'],function(){
        Route::get('/dashboard',[HomeController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[HomeController::class,'logout'])->name('admin.logout');
        
        Route::get('/employees/downloadPDF', [EmployeeController::class, 'downloadPDF'])->name('download.pdf');
        Route::get('/employees',[EmployeeController::class,'index'])->name('employees.index');
        Route::get('/employees/create',[EmployeeController::class,'create'])->name('employees.create');
        Route::post('/employees',[EmployeeController::class,'store'])->name('employees.store');
        Route::get('/employees/{employee}/edit',[EmployeeController::class,'edit'])->name('employees.edit');
        Route::get('/employees/{employee}/format',[EmployeeController::class,'format'])->name('employees.format');


        
        Route::post('/employees/{employee}',[EmployeeController::class,'update'])->name('employees.update');
        Route::delete('/employees/{employee}',[EmployeeController::class,'destroy'])->name('employees.destroy');;





        Route::resource('spots', 'SpotController');

       

Route::get('/spots', [SpotController::class, 'index'])->name('spots.index');
Route::get('/spots/create', [SpotController::class, 'create'])->name('spots.create');
Route::post('/spots', [SpotController::class, 'store'])->name('spots.store');
Route::get('/spots/{spot}/edit', [SpotController::class, 'edit'])->name('spots.edit');
Route::put('/spots/{spot}', [SpotController::class, 'update'])->name('spots.update');
Route::delete('/spots/{spot}', [SpotController::class, 'destroy'])->name('spots.destroy');




Route::get('/spots/{spot}/book', [SpotController::class, 'book'])->name('spots.book');



Route::get('/spots/{spot}/book', [SpotController::class, 'bookForm'])->name('spots.booking-form');







// Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
// Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
// Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
// Route::get('/bookings/{bookings}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
// Route::put('/bookings/{bookings}', [BookingController::class, 'update'])->name('bookings.update');
// Route::delete('/bookings/{bookings}', [BookingController::class, 'destroy'])->name('bookings.destroy');





       



        

        



 

    });


});
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{bookings}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::put('/bookings/{bookings}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/{bookings}', [BookingController::class, 'destroy'])->name('bookings.destroy');





Route::get('/loginform', [AdminController::class, 'login'])->name('login');
Route::get('/register', [AdminController::class, 'register'])->name('register');
route::get('/AdminHome' , [AdminController::class , 'index'])->name('home'); 