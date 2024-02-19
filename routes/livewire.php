<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;

use App\Livewire\Module\User\Users;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('/user',Users::class)->name('user.dashboard');

    Route::prefix('categories')->group(function(){
        Route::get('/' , [CategoryController::class , 'index'])->name('category.list');
    });
});
