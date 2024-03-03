<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialMediaController;
use App\Livewire\Module\Kegiatan\Kegiatan;
use App\Livewire\Module\User\Users;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('/user',Users::class)->name('user.dashboard');

    Route::prefix('categories')->group(function(){
        Route::get('/' , [CategoryController::class , 'index'])->name('category.list');
    });
    Route::prefix('kegiatan')->group(function(){
        Route::get('/',Kegiatan::class)->name('kegiatan');
    });
    
    Route::prefix('registrations')->group(function(){
        Route::get('/' ,function(){
            return view('modules.registration.registration-list');
        })->name('registration.list');
    });

    Route::prefix('company')->group(function(){
        Route::get('/', [CompanyController::class, 'index'])->name('company.form');
    });

    Route::prefix('social-media')->group(function(){
        Route::get('/', [SocialMediaController::class, 'index'])->name('social-media.form');
    });
});
