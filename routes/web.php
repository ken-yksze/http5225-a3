<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\ManageAllocationController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Auth;

// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/classes', [FrontendController::class, 'classes'])->name('classes');
Route::get('/class-members', [FrontendController::class, 'classMembers'])->name('class-members');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendController::class, 'submitContact'])->name('contact.submit');

// Authentication Routes
Auth::routes(['home' => false]);

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Classes Routes
    Route::get('/classes', [ClassesController::class, 'index'])->name('admin.classes');
    Route::get('/classes/create', [ClassesController::class, 'create'])->name('admin.classes.create');
    Route::post('/classes', [ClassesController::class, 'store'])->name('admin.classes.store');
    Route::get('/classes/{class}/edit', [ClassesController::class, 'edit'])->name('admin.classes.edit');
    Route::put('/classes/{class}', [ClassesController::class, 'update'])->name('admin.classes.update');
    Route::delete('/classes/{class}', [ClassesController::class, 'destroy'])->name('admin.classes.destroy');

    // Members Routes
    Route::get('/members', [MembersController::class, 'index'])->name('admin.members');
    Route::get('/members/create', [MembersController::class, 'create'])->name('admin.members.create');
    Route::post('/members', [MembersController::class, 'store'])->name('admin.members.store');
    Route::get('/members/{member}/edit', [MembersController::class, 'edit'])->name('admin.members.edit');
    Route::put('/members/{member}', [MembersController::class, 'update'])->name('admin.members.update');
    Route::delete('/members/{member}', [MembersController::class, 'destroy'])->name('admin.members.destroy');

    // Allocations Routes
    Route::get('/allocations', [ManageAllocationController::class, 'index'])->name('admin.allocations');
    Route::get('/allocations/create', [ManageAllocationController::class, 'create'])->name('admin.allocations.create');
    Route::post('/allocations', [ManageAllocationController::class, 'store'])->name('admin.allocations.store');
    Route::get('/allocations/{member}/edit', [ManageAllocationController::class, 'edit'])->name('admin.allocations.edit');
    Route::put('/allocations/{member}', [ManageAllocationController::class, 'update'])->name('admin.allocations.update');
    Route::delete('/allocations/{member}', [ManageAllocationController::class, 'destroy'])->name('admin.allocations.destroy');
});