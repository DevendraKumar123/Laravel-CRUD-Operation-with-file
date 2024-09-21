<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ExportController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[EmployeeController::class,'index'])->name('index');
Route::get('/insert',[EmployeeController::class,'create'])->name('insert');
Route::POST('/store',[EmployeeController::class,'store'])->name('store');
Route::get('/id={employee}/modify',[EmployeeController::class,'modify'])->name('modify');
Route::put('/id={employee}',[EmployeeController::class,'update'])->name('update');
Route::get('status/{id}',[EmployeeController::class,'status'])->name('status');
Route::get('/export-data', [ExportController::class, 'exportData'])->name('exportData');
