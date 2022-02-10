<?php

use App\Http\Controllers\LinksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


require __DIR__.'/auth.php';


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::prefix('dashboard')
    ->as('dashboard.')
    ->middleware('auth')
//    ->controller(LinkController::class)
    ->group(function() {
        route::get('/links', [LinksController::class, 'index'])->name('index');
        route::get('/links/new', [LinksController::class, 'create'])->name('create');
        route::post('/links/new', [LinksController::class, 'store'])->name('store');
        route::get('/links/{link}', [LinksController::class, 'edit'])->name('edit');
        route::post('/links/{link}', [LinksController::class, 'update'])->name('update');
        route::delete('/links/{link}', [LinksController::class, 'destroy'])->name('destroy');

        route::get('/settings', [UserController::class, 'edit'])->name('editSettings');
        route::post('/settings', [UserController::class, 'update'])->name('updateSettings');
    });


Route::post('/visit/{link}', [VisitController::class, 'store']);
// linktree username
Route::get('/{user:username}', [UserController::class, 'show']); 


























