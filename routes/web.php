<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AfiliateController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlanController;
use App\Models\Plan;
use App\Models\PlanPrestation;
use App\Models\Prestation;

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
        $planes = Plan::all();
        //id, nombre
        //En el lugar del plan id, tengo porcentaje, plan_id, prestation_id
        $planConPrestaciones = array();
        //En el lugar del plan id, tengo el nombre de una prestacion
        $prestacionesDelPlan = array();
        foreach($planes as $plan){
            $prestaciones = PlanPrestation::where('plan_id', '=', $plan->id)->get();
            $planConPrestaciones[$plan->id] = $prestaciones;
            
            $prest = array();
            foreach($prestaciones as $p){
                $nombrep = Prestation::findOrFail($p->prestation_id);
                $prest[] = $nombrep;

            }
            $prestacionesDelPlan[$plan->id] = $prest;
            
        }
    return view('planes')->with(['planP'=>$planConPrestaciones, 'prestP'=>$prestacionesDelPlan, 'planes'=>$planes]);
})->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/index', [AfiliateController::class, 'index'])->name('index');
Route::get('/delete/{id}', [AfiliateController::class, 'delete'])->name('afiliado-delete');
Route::get('/add-afiliate', [AfiliateController::class, 'create'])->name('add-afiliate');
Route::post('/store-afiliate', [AfiliateController::class, 'store'])->name('store-afiliate');
Route::get('/add-plan-afiliate/{dni}', [AfiliateController::class, 'addPlanToAfiliate'])->name('add-plan-afiliate');
Route::patch('/store-plan-afiliate/{dni}', [AfiliateController::class, 'storePlanToAfiliate'])->name('store-plan-afiliate');

Route::patch('/afiliate/update/{id}', [AfiliateController::class, 'update'])->name('afiliate-update');
Route::get('/afiliate/show/{dni}', [AfiliateController::class, 'show'])->name('afiliate-show');
Route::get('/afiliate/edit/{dni}', [AfiliateController::class, 'editAfiliado'])->name('afiliate-edit');


Route::get('/solicitud/{dni}', [AfiliateController::class, 'solicitud'])->name('solicitud');
Route::get('/reintegro/{dni}', [AfiliateController::class, 'reintegro'])->name('reintegro');
Route::get('/prestacion/{dni}', [AfiliateController::class, 'prestacion'])->name('prestacion');
Route::post('/store-reintegro', [AfiliateController::class, 'storeReintegro'])->name('store-reintegro');
Route::post('/store-prestacion', [AfiliateController::class, 'storePrestacion'])->name('store-prestacion');


//Familiares  
Route::get('/add-familiar/{id}', [AfiliateController::class, 'addFamiliar'])->name('add-familiar');
Route::post('/store-miembro/{titularId}', [AfiliateController::class, 'storeMiembro'])->name('store-miembro');
Route::get('/eliminar-miembro/{dni}', [AfiliateController::class, 'eliminarMiembro'])->name('eliminar-miembro');


//Registrar usuario
Route::get('/registrar/{afiliado}', [UserController::class, 'create'])->name('registrar');
Route::post('/registrar/{dni}', [UserController::class, 'store'])->name('registrarPost');
Route::post('/registrarMiembro/{dni}', [UserController::class, 'storeMiembro'])->name('registrarMiembro');


//Planes
Route::get('/planes', [PlanController::class, 'show'])->name('planes-show');
Route::get('/plan', [PlanController::class, 'index'])->name('plan');//Vista de gestion de planes
Route::post('/plan-store', [PlanController::class, 'store'])->name('plan-store');
Route::get('/planes-create', [PlanController::class, 'create'])->name('planes-create');
Route::patch('/planes-update/{id}', [PlanController::class, 'update'])->name('planes-update');
Route::get('/planes-edit/{id}', [PlanController::class, 'edit'])->name('planes-edit');
Route::get('/planes-delete/{id}', [PlanController::class, 'destroyPlan'])->name('planes-delete');
Route::get('/planes-changeValue/{id}', [PlanController::class, 'changeValue'])->name('planes-changeValue');

//Empleado
Route::get('/empleado-index', [UserController::class, 'index_empleado'])->name('empleado-index');
Route::post('/empleado-store', [UserController::class, 'storeEmpleado'])->name('empleado-store');
Route::get('/empleado-create', [UserController::class, 'createEmpleado'])->name('empleado-create');
Route::get('/empleado-edit/{id}', [UserController::class, 'editEmpleado'])->name('empleado-edit');
Route::patch('/empleado-update/{id}', [UserController::class, 'updateEmpleado'])->name('empleado-update');
Route::get('/empleado-delete/{id}', [UserController::class, 'destroyEmpleado'])->name('empleado-delete');
Route::get('/user-show/{id}', [UserController::class, 'show'])->name('user-show');

Route::get('/gestion', [EmpleadoController::class, 'gestionSolicitud'])->name('gestion');
Route::get('/show-soli/{id}', [EmpleadoController::class, 'show'])->name('solicitud.show');
Route::patch('/aprobar/{id}', [EmpleadoController::class, 'aprobar'])->name('aprobar');
Route::patch('/desaprobar/{id}', [EmpleadoController::class, 'desaprobar'])->name('desaprobar');


Route::get('/cupon_de_pago', [AfiliateController::class, 'index_cupon_pago'])->name('index_cupon');





Route::middleware(['empleado', 'admin'])->group(function(){
   // return 'hola';

});



Route::middleware(['admin'])->group(function(){    
 });

/*
Route::middleware(['afiiado'])->group(function(){
    Route::get('/add-afiliate', [AfiliateController::class, 'show'])->name('add-afiliate');
});*/
require __DIR__.'/auth.php';