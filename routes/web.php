<?php

use App\Models\Video;
use App\Livewire\Videos;
use App\Models\Category;
use App\Livewire\Monsigra;
use App\Livewire\Categories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\LaBoutiqueController;
use App\Livewire\SendEmail;

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

Route::get('/', HomeController::class);

Route::get('/videoteque', [AgeController::class, 'index'])->name('ages.index');
Route::get('videoteque/categories/{id:id}', [CategoryController::class, 'index'])->name('categories.index');
Route::get('videoteque/categories/videos/{category_id}/{age_id}', Videos::class)->name('videos.index');
Route::get('videoteque/categories/videos/{category_id}/{age_id}/{video_id}', [VideoController::class, 'show'])->name('videos.show');
Route::get('videoteque/categories/subcategories/{subcategory_id}/{category_id}/{age_id}', [AgeController::class, 'subcategories'])->name('subcategories.index');
Route::get('abonnements', [AbonnementController::class, 'index'])->name('abonnements.index');
Route::get('laboutique', [LaBoutiqueController::class, 'index'])->name('laboutique.index');
Route::get('monsigra', Monsigra::class)->name('monsigra.index');
Route::get('videoteque/categories/videos/{vimeo}', [VideoController::class, 'monsigra'])->name('mon.index');
Route::get('/info/{slug}', [InfoController::class, 'index'])->name('info.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/send-email', SendEmail::class)->name('send-email');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});
