<?php

use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/blog', [IndexController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('post.show');
Route::get('/dakujeme-za-spravu', [IndexController::class, 'submit'])->name('submit');
Route::post('/form-submit',[FormController::class, 'store'])->name('form.submit-new');

Route::get('register',[SessionController::class, 'register'])->name('register');
Route::post('register', [SessionController::class, 'store'])->name('register');
Route::get('login',[SessionController::class, 'login'])->name('login');
Route::post('login',[SessionController::class, 'authenticate'])->name('login');

Route::post('logout', [SessionController::class, 'logout'])->name('logout');

Route::middleware([IsAdmin::class])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/admin/users',AdminController::class);
    Route::resource('/admin/blog',PostController::class)->except(['show'])->parameters(['blog' => 'slug']);
    Route::resource('/admin/categories',CategoryController::class);
    Route::resource('/admin/tags',TagController::class);
    Route::post('/blog/upload_image', [PostController::class, 'uploadImage'])->name('blog.upload_image');
    Route::get('/admin/form-submissions', [FormController::class, 'index'])->name('admin.form-submissions');
    Route::delete('/admin/form-submissions/{submission}', [FormController::class, 'destroy'])->name('admin.form-submissions.destroy');
});
// Comments
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
/* Email Verification */
// Zobrazenie stránky s upozornením na verifikáciu emailu
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Potvrdenie verifikácie emailu
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/'); // Stránka po úspešnej verifikácii
})->middleware(['auth', 'signed'])->name('verification.verify');

// Opätovné odoslanie verifikačného emailu
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

