<?php

use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Module\Kegiatan\CanvasKegiatan;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/testing' , function() {
    return view('modules.test');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // Route::get('/form/{idKegiatan?}',CanvasKegiatan::class)->name('form.kegiatan');


});


Route::controller(FrontEndController::class)->group(function(){
    Route::get('/','index')->name('home');
    Route::get('/kegiatan-akademik','akademik')->name('kegiatan-akademik');
    Route::get('/prestasi','prestasi')->name('prestasi');
    Route::get('/fasilitas','fasilitas')->name('fasilitas');
    Route::get('/pengumuman','pengumuman')->name('pengumuman');
    Route::get('/profile','profile')->name('profile');
    Route::get('/pendaftaran', 'pendaftaran')->name('pendaftaran');
    Route::get('article/{slug}','article')->name('article');
});

Route::post('image-upload/ckeditor', [HelperController::class, 'ckeditorUploadImage'])->name('image.upload');



require __DIR__.'/livewire.php';
require __DIR__.'/auth.php';
