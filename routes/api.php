<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;


Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/add_customer', [CustomerController::class, 'addCustomer'])->middleware('auth:sanctum');
Route::get('/view_customer/{id}', [CustomerController::class, 'viewCustomer'])->middleware('auth:sanctum');
Route::post('/view_all_customers', [CustomerController::class, 'viewAllCustomers'])->middleware('auth:sanctum');
Route::put('/update_customer/{id}', [CustomerController::class, 'updateCustomer'])->middleware('auth:sanctum');
Route::delete('/delete_customer/{id}', [CustomerController::class, 'deleteCustomer'])->middleware('auth:sanctum');
