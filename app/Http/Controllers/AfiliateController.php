<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\AfiliateRequest;
use App\Http\Requests\Auth\PlanRequest;
use App\Http\Requests\Auth\SolicitudRequest;
use App\Models\Afiliate;
use App\Models\Miembro;
use App\Models\Plan;
use App\Models\PlanPrestation;
use App\Models\solicitud;
use Solicitud as GlobalSolicitud;
use App\Models\Type;
use App\Models\TypePlan;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

use App\Models\User;
use Illuminate\Http\Request;

class AfiliateController extends Controller
{
    public function index(){
        $afiliados = Afiliate::all();
        return view('empleado.afiliados')->with('afiliados', $afiliados);
    }

    //Crear una nueva categoria
    public function create(){
        return view('afiliate.create');
    }

    public function editAfiliado($dni)
    {
        $afiliado = Afiliate::findOrFail($dni);
        return view('afiliate.edit')->with('afiliado', $afiliado);
    }

    public function store (AfiliateRequest $request){
        $afiliado = Afiliate::create($request->all());
        return redirect()->route('registrar', ['afiliado'=> $afiliado]);
    }

    public function storeMiembro(Request $request, $titularId){
        $miembro = new Miembro();
        $miembro->name = $request->name;
        $miembro->last_name = $request->last_name;
        $miembro->titular_id = $titularId;
        $miembro->save();
        return redirect()->route('afiliate-show', ['dni'=> $titularId])->with('success', 'El miembro se creo exitosamente');
    }

    public function storeMiembroAdmin(Request $request, $titularId){
        $miembro = new Miembro();
        $miembro->name = $request->name;
        $miembro->last_name = $request->last_name;
        $miembro->titular_id = $titularId;
        $miembro->save();
        return redirect()->route('afiliate-showAfiliado', ['dni'=> $titularId])->with('success', 'El miembro se creo exitosamente');
    }

    public function addPlanToAfiliate($dni){
        $afiliado = Afiliate::findOrFail($dni);
        $plans = Plan::all();
        $tipos = Type::all();
        return view('afiliate.plan')->with('plans', $plans)->with('afiliado', $afiliado)->with('tipos', $tipos);
    }

    public function storePlanToAfiliate(PlanRequest $req, $dni){
        $afiliado = Afiliate::findOrFail($dni);
        $tipePlan = TypePlan::where('plan_id', $req->plan)->where('type_id', $req->tipo)->first();
        $afiliado->typePlan_id = $tipePlan->id;
        $afiliado->save();

        return redirect('dashboard')->with('success', 'Se afilió con éxito, por favor ingrese sus datos de login');
    }


    //Devuelve la vista de todas las recetas asociadas a una categoria
    public function show($id){
        $afiliado = Afiliate::findOrFail($id);
        $tipePlan = TypePlan::findOrFail($afiliado->typePlan_id);
        $plan = Plan::findOrFail($tipePlan->plan_id);
        $type = Type::findOrFail($tipePlan->type_id);
        $cantMiembros = Miembro::where('titular_id', $id)->count();
        $miembros = Miembro::where('titular_id', $id)->get();
        $planes = Plan::all();
        $tipos = Type::all();
       return view('afiliate.misdatos')->with('afiliado', $afiliado)->with('tipo', $type)->with('plan', $plan)->with('cantMiembros', $cantMiembros)->with('miembros', $miembros)->with('tipos', $tipos)->with('planes', $planes);
    }

    public function showAfiliado($id){
        $afiliado = Afiliate::findOrFail($id);
        $tipePlan = TypePlan::findOrFail($afiliado->typePlan_id);
        $plan = Plan::findOrFail($tipePlan->plan_id);
        $type = Type::findOrFail($tipePlan->type_id);
        $cantMiembros = Miembro::where('titular_id', $id)->count();
        $miembros = Miembro::where('titular_id', $id)->get();
       // dd($cantMiembros);
        $planes = Plan::all();
        $tipos = Type::all();
       return view('afiliate.edit')->with('afiliado', $afiliado)->with('tipo', $type)->with('plan', $plan)->with('cantMiembros', $cantMiembros)->with('miembros', $miembros)->with('tipos', $tipos)->with('planes', $planes);
    }

    public function showAfiliate($id){
        return view('afiliate.plan');
    }

    
    public function edit(){
        //$afiliate = Afiliate::findOrFail($id);
        $plan = Plan::all();
        return view('afiliate.plan')->with('plan', $plan);  
    }

    public function delete($id){
        $afilitate = Afiliate::findOrFail($id);
        $miembros = Miembro::where('titular_id', $id)->get();
        foreach($miembros as $miembro){
            $miembro->delete();
        }

        $user = User::where('name', $id)->first();
        $user->delete();
        $afilitate->delete();

        return redirect()->route('/')->with('success', 'Se eliminó con éxito el afiliado');
    }


    public function update (AfiliateRequest $request, $id){//veniendo de la lista de afiliados con rol admin
        $afiliado = Afiliate::findOrFail($id);
        $afiliado->province = $request->province;
        $afiliado->city = $request->city;
        $afiliado->street=$request->street;
        $afiliado->email=$request->email;
        $afiliado->tel=$request->tel;
        $afiliado->house_number = $request->house_number;
     
        $typePlanActual = TypePlan::findOrFail($afiliado->typePlan_id);
        if($typePlanActual->type_id > 2){//Si el tipo plan actual es un familiar
            if($typePlanActual->type_id != $request->tipo){
                $miembros = Miembro::all()->where('titular_id', $id);
                foreach($miembros as $miembro){
                    $miembro->delete();
                }
            }
        }
        
        $typePlanNuevo = TypePlan::where('plan_id', $request->plan)->where('type_id', $request->tipo)->first();

        $afiliado->typePlan_id = $typePlanNuevo->id;
        $afiliado->save();
        
        return redirect()->route('index')->with('success', 'Se guardaron los cambios en el afiliado');
    }

    public function updateMisDatos(AfiliateRequest $request, $id){//veniendo del boton en dashboard con rol afiliado
        $afiliado = Afiliate::findOrFail($id);
        $afiliado->province = $request->province;
        $afiliado->city = $request->city;
        $afiliado->street=$request->street;
        $afiliado->email=$request->email;
        $afiliado->tel=$request->tel;
        $afiliado->house_number = $request->house_number;
     
        $typePlanActual = TypePlan::findOrFail($afiliado->typePlan_id);
        if($typePlanActual->type_id > 2){//Si el tipo plan actual es un familiar
            if($typePlanActual->type_id != $request->tipo){
                $miembros = Miembro::all()->where('titular_id', $id);
                foreach($miembros as $miembro){
                    $miembro->delete();
                }
            }
        }
        
        $typePlanNuevo = TypePlan::where('plan_id', $request->plan)->where('type_id', $request->tipo)->first();

        $afiliado->typePlan_id = $typePlanNuevo->id;
        $afiliado->save();
        
        return redirect()->route('dashboard')->with('success', 'Los cambios fueron guardados exitosamente');
    }



    public function solicitud($dni){
        $afiliado = Afiliate::findOrFail($dni);
        $solicitud = Solicitud::where('afiliate', '=', $afiliado->dni)->get();
        
        return view('afiliate.solicitud')->with('solicitud', $solicitud);
    }
    public function reintegro(){
        return view('afiliate.solicitud_reintegro');
    }

    public function prestacion(){
        return view('afiliate.solicitud_prestacion');
    }

    public function storePrestacion(SolicitudRequest $request){
        $solicitud = new Solicitud();
        $solicitud->tipo= 'prestacion';
        $solicitud->institucion=$request->institucion;
        $solicitud->descripcion=$request->descripcion;
        $solicitud->estado="activa";
        $solicitud->fecha=$request->fecha;
        $solicitud->afiliate=$request->afiliate;

        
        $solicitud->save();


        $afiliado = Afiliate::findOrFail($request->afiliate);
        $afiliado->solicitud_id = $solicitud->id;

        


        return redirect('dashboard');
    }

    public function storeReintegro(SolicitudRequest $request){
        $solicitud = new Solicitud();
        $solicitud->tipo= "reintegro";
        $solicitud->institucion=$request->institucion;
        $solicitud->descripcion=$request->descripcion;
        $solicitud->estado="activa";
        $solicitud->fecha=$request->fecha;
        $solicitud->afiliate=$request->afiliate;
        $solicitud->save();

        $afiliado = Afiliate::findOrFail($request->afiliate);
        $afiliado->solicitud_id = $solicitud->id;
        return redirect()->route('dashboard');
    }

    public function addFamiliar($titular_id){
        return view('afiliate.createMiembro')->with('titular_id', $titular_id);
    }

    public function addFamiliarAdmin($titular_id){
        return view('afiliate.createMiembroAdmin')->with('titular_id', $titular_id);
    }


    public function index_cupon_pago(){
        return view('cupon_pago.index');
    }

    public function showMiembro($id){
        $miembro = Miembro::findOrFail($id);
        return view('miembro.show')->with('miembro', $miembro);
    }

    public function showMiembroAfiliado($id){
        $miembro = Miembro::findOrFail($id);
        return view('miembro.showMiembro')->with('miembro', $miembro);
    }

    public function eliminarMiembro($id){
        $miembro = Miembro::findOrFail($id);
        $idTitular = $miembro->titular_id;
        $miembro->delete();
        return redirect()->route('afiliate-show', ['dni' => $idTitular])->with('success', 'El miembro se dio de baja con exito');

    }

    public function eliminarMiembroAfiliado($id){
        $miembro = Miembro::findOrFail($id);
        $idTitular = $miembro->titular_id;
        $miembro->delete();
        return redirect()->route('afiliate-showAfiliado', ['dni' => $idTitular])->with('success', 'El miembro se dio de baja con exito');

    }
    
}
