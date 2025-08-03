<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\SubjectsController;

Route::get('/test', function () {
    return response()->json(['message' => 'Hello from Laravel API']);
});

//roles
Route::post('/add_role', [RolesController::class, 'add'])->name('role.add');
Route::get('/get_roles', [RolesController::class, 'index'])->name('role.get');
Route::post('/update_role', [RolesController::class, 'update'])->name('role.update');
Route::post('/delete_role', [RolesController::class, 'delete'])->name('role.delete');
//users
Route::get('/users', [UsersController::class, 'index']);
Route::post('/users/add', [UsersController::class, 'add']);
Route::post('/users/update', [UsersController::class, 'update']);
Route::post('/users/delete', [UsersController::class, 'delete']);
//departments
Route::get('/departments', [DepartmentsController::class, 'index']);
Route::post('/departments/add', [DepartmentsController::class, 'add']);
Route::post('/departments/update', [DepartmentsController::class, 'update']);
Route::post('/departments/delete', [DepartmentsController::class, 'delete']);
//Teacher
Route::get('/teachers', [TeachersController::class, 'index']);
Route::post('/teachers/add', [TeachersController::class, 'add']);
Route::post('/teachers/update', [TeachersController::class, 'update']);
Route::post('/teachers/delete', [TeachersController::class, 'delete']);
//Parents
Route::get('/parents', [ParentsController::class, 'index']);
Route::post('/parents/add', [ParentsController::class, 'add']);
Route::post('/parents/update', [ParentsController::class, 'update']);
Route::post('/parents/delete', [ParentsController::class, 'delete']);
//Students
Route::get('/students', [StudentsController::class, 'index']);
Route::post('/students/add', [StudentsController::class, 'add']);
Route::post('/students/update', [StudentsController::class, 'update']);
Route::post('/students/delete', [StudentsController::class, 'delete']);
//Classes
Route::get('/classes', [ClassesController::class, 'index']);
Route::post('/classes/add', [ClassesController::class, 'add']);
Route::post('/classes/update', [ClassesController::class, 'update']);
Route::post('/classes/delete', [ClassesController::class, 'delete']);
//Subjects
Route::get('/subjects', [SubjectsController::class, 'index']);
Route::post('/subjects/add', [SubjectsController::class, 'add']);
Route::post('/subjects/update', [SubjectsController::class, 'update']);
Route::post('/subjects/delete', [SubjectsController::class, 'delete']);