<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {

    Route::name('post.')->group(function () {

        Route::get('/post', [AdminPostController::class, 'index'])->name('index');
    });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/about.blade.php', [AboutController::class, 'index'])->name('about.blade.php.index');

Route::prefix('posts')->name('post.')->group(function() {

    Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');
    Route::get('/create', [\App\Http\Controllers\CreateController::class, 'create'])->name('create');
    Route::post('/', [\App\Http\Controllers\StoreController::class, 'store'])->name('store');
    Route::get('/{post}', [\App\Http\Controllers\ShowController::class, 'show'])->name('show');
    Route::get('/{post}/edit', [\App\Http\Controllers\EditController::class, 'edit'])->name('edit');
    Route::patch('/{post}', [\App\Http\Controllers\UpdateController::class, 'update'])->name('update');
    Route::delete('/{post}/delete', [\App\Http\Controllers\DestroyController::class, 'destroy'])->name('delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

