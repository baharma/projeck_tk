<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Module\Kegiatan\CanvasKegiatan;
use App\Http\Controllers\SocialMediaController;
use App\Livewire\Module\Kegiatan\Kegiatan;
use App\Livewire\Module\User\Users;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth'])->prefix('admin')->group(function(){
    Route::get('/user',Users::class)->name('user.dashboard');

    Route::prefix('categories')->group(function(){
        Route::get('/' , [CategoryController::class , 'index'])->name('category.list');
    });
    Route::prefix('post')->group(function(){
        Route::get('/{category}',Kegiatan::class)->name('post');
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

    Route::prefix('gallery')->group(function(){
        Route::get('/', [GalleryController::class, 'index'])->name('gallery.list');
    });


    Route::controller(PostController::class)->group(function(){
        Route::get('/post/form/{category}','PostForm')->name('post-form');
        Route::get('/post/edit-form/{post}','PostEditForm')->name('post-edit.form');
    });
});
