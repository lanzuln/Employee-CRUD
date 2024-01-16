<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(EmployeeController::class)->group(function () {
Route::get('/', 'index')->name('index');
Route::get('/employee', 'create')->name('create');
Route::post('/employee', 'store');
Route::get('/employee/{id}/edit', 'edit')->name('employee.edit');
Route::post('/employee-edit/{id}', 'update')->name('employee.update');
Route::get('/employee/{id}', 'destroy')->name('employee.destroy');
});
