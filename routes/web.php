<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;

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

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/create-assig', [App\Http\Controllers\AssignmentController::class, 'storeAssig'])->name('create-assig');
Route::post('/create-assg', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/view-assg', [App\Http\Controllers\AssignmentController::class, 'view'])->name('view');
Route::get('/create-form', [App\Http\Controllers\AssignmentController::class, 'index'])->name('create-assig');
Route::post('/get-info-option', [App\Http\Controllers\AssignmentController::class, 'fetchInfoOption'])->name('get-info-option');
Route::post('/get-condition-option', [App\Http\Controllers\AssignmentController::class, 'fetchConditionOption'])->name('get-condition-option');
Route::post('/get-extra-option', [App\Http\Controllers\AssignmentController::class, 'fetchExtraOption'])->name('get-extra-option');
Route::post('/get-disposition-detail', [App\Http\Controllers\ResponseController::class, 'fetchDispositionDetail'])->name('get-disposition-detail');


