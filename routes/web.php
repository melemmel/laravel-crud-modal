<?php

use App\Http\Controllers\StudentController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::put('/student/update{student}', [StudentController::class, 'update'])->name('student.update');
Route::patch('/student/{id}/restore', [StudentController::class, 'restore'])->name('student.restore');
Route::delete('/student/delete{student}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::get('/student/archive', [StudentController::class, 'archive'])->name('student.archive');
