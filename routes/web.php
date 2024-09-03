<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


//Auth routesss as guest
Route::group(['middleware'=> ['guest']], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    Route::get('/', [AuthController::class, 'login']);
});


//route group if logged in
Route::group(['middleware'=> ['auth']], function () {
        //auth routes gets ko na haha
        Route::get('/home', [HomeController::class, 'index']);
        Route::delete('/logout', [AuthController::class,'logout'])->name('logout');

        //company routes
        Route::get('/companies', [CompanyController::class, 'index']);
        Route::get('/add/company', [CompanyController::class, 'create']);
        Route::post('/add/company', [CompanyController::class, 'store'])->name('store');
        Route::get('/companies/edit/{id}', [CompanyController::class, 'edit']);
        Route::get('/companies/delete/{id}', [CompanyController::class, 'destroy']);
        Route::post('/edit/company', [CompanyController::class, 'update'])->name('companies.update');

    //sendmail test remarks working
        //Route::get('send', [CompanyController::class, "sendNotification"]);

        //employee routes
        Route::get('/employees', [EmployeeController::class, 'index']);
        Route::get('/add/employee', [EmployeeController::class, 'create']);
        Route::post('/add/employee', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/employees/edit/{id}', [EmployeeController::class, 'edit']);
        Route::get('/employees/delete/{id}', [EmployeeController::class, 'destroy']);
        Route::post('/edit/employee', [EmployeeController::class, 'update'])->name('employees.update');

});
