<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

// Country
Route::resource('country', CountryController::class);

// User
Route::resource('user', UserController::class);

// Person
Route::resource('person', PersonController::class);

// Company
Route::resource('company', CompanyController::class);

// Role
Route::resource('role', RoleController::class);

// Department
Route::resource('department', DepartmentController::class);

// Project
Route::resource('project', ProjectController::class);
Route::get('/companies/{company}/persons', [ProjectController::class, 'getPersonsByCompany']);

// Task
Route::resource('task', TaskController::class);


