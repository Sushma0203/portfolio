<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('frontend.home');
});
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\ContactInfoController;
use App\Http\Controllers\Backend\AboutPageController;
use App\Http\Controllers\Backend\ContactMapController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\HomeInfoController;
use App\Http\Controllers\Backend\ProjectController;


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', function () {
    return view('auth.login');
})->name('auth.login');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Protected Dashboard Route
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Admin Management Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->middleware(['web', 'admin.auth'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    // Home Info
    Route::get('/home', [\App\Http\Controllers\Admin\HomeInfoController::class, 'edit'])->name('admin.home.edit');
    Route::post('/home', [\App\Http\Controllers\Admin\HomeInfoController::class, 'update'])->name('admin.home.update');

    // About Info
    Route::get('/about', [\App\Http\Controllers\Admin\AboutInfoController::class, 'edit'])->name('admin.about.edit');
    Route::post('/about', [\App\Http\Controllers\Admin\AboutInfoController::class, 'update'])->name('admin.about.update');

    // Gallery
    Route::get('/gallery', [\App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('admin.gallery.index');
    Route::get('/gallery/create', [\App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('/gallery', [\App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::delete('/gallery/{id}', [\App\Http\Controllers\Admin\GalleryController::class, 'destroy'])->name('admin.gallery.destroy');

    // Projects
    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class)->names([
        'index' => 'admin.projects.index',
        'create' => 'admin.projects.create',
        'store' => 'admin.projects.store',
        'edit' => 'admin.projects.edit',
        'update' => 'admin.projects.update',
        'destroy' => 'admin.projects.destroy',
    ]);

    // Messages
    Route::get('/messages', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('admin.messages.index');
    Route::get('/messages/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'show'])->name('admin.messages.show');
    Route::delete('/messages/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('admin.messages.destroy');

    // Chats
    Route::get('/chats', [\App\Http\Controllers\Admin\ChatController::class, 'index'])->name('admin.chats.index');
    Route::get('/chats/{sessionId}', [\App\Http\Controllers\Admin\ChatController::class, 'show'])->name('admin.chats.show');
    Route::post('/chats/{sessionId}/reply', [\App\Http\Controllers\Admin\ChatController::class, 'reply'])->name('admin.chats.reply');
});

/*
|--------------------------------------------------------------------------
| frontend one route
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\FrontendController;

Route::prefix('frontend')->group(function () {
    Route::get('/home', [FrontendController::class, 'home'])->name('frontend.home');
    Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
    Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
    Route::get('/gallery', [FrontendController::class, 'gallery'])->name('frontend.gallery');
    Route::get('/projects', [FrontendController::class, 'projects'])->name('frontend.projects');
});

use App\Http\Controllers\ContactController;

Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

// Frontend Chat Routes
Route::get('/chats', [\App\Http\Controllers\ChatController::class, 'index'])->name('chats.index');
Route::post('/chats', [\App\Http\Controllers\ChatController::class, 'store'])->name('chats.store');
