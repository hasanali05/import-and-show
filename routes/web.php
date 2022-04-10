<?php

use App\Http\Controllers\Api\WorkController;
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
    return view('home');
});
Route::get('/reports', function () {
    return view('reports');
});
Route::get('/import', function () {
    return view('import');
});
Route::get('/pdf', [WorkController::class, 'pdf']);
