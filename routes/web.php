<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AfiliateController;

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
    //return view('welcome');
    return view('planes');
})->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/add-afiliate', [AfiliateController::class, 'create'])->name('add-afiliate');
Route::post('/store-afiliate', [AfiliateController::class, 'store'])->name('store-afiliate');
//Route::patch('/store-plan-afiliate/{id}', [AfiliateController::class, 'addPlanToAfiliate'])->name('store-plan-afiliate');
Route::get('/store-plan-afiliate/{id}', [AfiliateController::class, 'addPlanToAfiliate'])->name('store-plan-afiliate');
Route::get('/afiliate/show/{id}', [AfiliateController::class, 'show'])->name('afiliate-show');
Route::patch('/afiliate', [AfiliateController::class, 'addPlanToAfiliate'])->name('afiliate-update');


Route::middleware(['empleado', 'admin'])->group(function(){
   // return 'hola';
});


/*
Route::middleware(['afiiado'])->group(function(){
    Route::get('/add-afiliate', [AfiliateController::class, 'show'])->name('add-afiliate');
});*/
require __DIR__.'/auth.php';