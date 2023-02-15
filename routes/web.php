<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AgenceController;
use App\Http\Controllers\Admin\BonEntreController;
use App\Http\Controllers\Admin\MaterielController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartementController;
use App\Http\Controllers\Admin\FournisseurController;
use App\Http\Controllers\Admin\MaterielSortiController;
use App\Http\Controllers\Admin\MaterielRecupereController;


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
    return redirect()->route('login');
});

Auth::routes();
Route::get('/dashboard',[DashboardController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/materiels',[MaterielController::class, 'index']);
    Route::get('/bonEntre',[BonEntreController::class, 'index']);
    Route::get('/agences',[AgenceController::class, 'index']);
    Route::get('/fournisseurs',[FournisseurController::class, 'index']);
    Route::get('/departements',[DepartementController::class, 'index']);
    Route::get('/materiels-recuperes',[MaterielRecupereController::class, 'index']);
    Route::get('/materiels-sortis',[MaterielSortiController::class, 'index']);
    Route::get('/materiels-sortis/create',[MaterielSortiController::class, 'create']);
    Route::post('/materiels-sortis/create',[MaterielSortiController::class, 'store']);
    Route::get('/materiels-sortis/{id}/edit',[MaterielSortiController::class, 'edit']);
    Route::post('/materiels-sortis/{id}/edit',[MaterielSortiController::class, 'update']);
});
