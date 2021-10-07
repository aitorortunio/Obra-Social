<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AfiliateController;
use App\Http\Controllers\UserController;

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
Route::get('/add-plan-afiliate/{dni}', [AfiliateController::class, 'addPlanToAfiliate'])->name('add-plan-afiliate');
Route::patch('/store-plan-afiliate/{dni}', [AfiliateController::class, 'storePlanToAfiliate'])->name('store-plan-afiliate');

//Registrar usuario
Route::get('/registrar/{afiliado}', [UserController::class, 'create'])->name('registrar');
Route::post('/registrar/{dni}', [UserController::class, 'store'])->name('registrarPost');





Route::middleware(['empleado', 'admin'])->group(function(){
   // return 'hola';
});


/*
Route::middleware(['afiiado'])->group(function(){
    Route::get('/add-afiliate', [AfiliateController::class, 'show'])->name('add-afiliate');
});*/
require __DIR__.'/auth.php';