<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class, 'showDataInHome'])->name('home');
Route::get('/blog',[UserController::class, 'showDataInBlog'])->name('blog');
Route::get('/category/{category}', [UserController::class, 'byCategory'])->name('category');
Route::get('/fullpost/{id}',[UserController::class, 'showFullPost'])->name('fullpost');
Route::get('/dashboard',[UserController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/search', [UserController::class, 'search'])->name('search');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::post('/contact/send', [UserController::class, 'send'])->name('contact.send');



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function(){
    Route::get('/dashboard', [UserController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/addpost',[AdminController::class, 'addpost'])->name('admin.addpost');
    Route::post('/dashboard/addpost',[AdminController::class, 'createpost'])->name('admin.createpost');
    Route::get('/dashboard/allpost',[AdminController::class, 'allpost'])->name('admin.allpost');
    Route::get('/dashboard/allpost/{id}',[AdminController::class, 'updatePost'])->name('admin.update');
    Route::post('/dashboard/allpost/{id}',[AdminController::class, 'postupdate'])->name('admin.postupdate');
    Route::get('/dashboard/deletepost/{id}',[AdminController::class, 'deletePost'])->name('admin.deletepost');
    Route::post('/dashboard/deletepost/{id}',[AdminController::class, 'postDelete'])->name('admin.postdelete');
    Route::get('/admin/dashboard', [AdminController::class, 'allMessages'])
    ->name('admin.messages');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
