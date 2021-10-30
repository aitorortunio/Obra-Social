<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\AfiliateRequest;
use App\Http\Requests\Auth\PlanRequest;
use App\Http\Requests\Auth\SolicitudRequest;
use App\Models\Afiliate;
use App\Models\Plan;
use App\Models\PlanPrestation;
use App\Models\solicitud;
use Solicitud as GlobalSolicitud;
use App\Models\Type;
use App\Models\TypePlan;
use Barryvdh\DomPDF\Facade as PDF;


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

    public function storeMiembro(AfiliateRequest $request, $titularId){
        $afiliado = Afiliate::create($request->all());
        $titular = Afiliate::findOrFail($titularId);
        $afiliado->titular_id = $titularId;
        $afiliado->typePlan_id = $titular->typePlan_id;
        $afiliado->save();
        return redirect()->route('registrar', ['afiliado'=> $afiliado]);
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
        $cantMiembros = Afiliate::where('titular_id', $id)->count();
        $miembros = Afiliate::where('titular_id', $id)->get();
        $planes = Plan::all();
        $tipos = Type::all();
       return view('afiliate.misdatos')->with('afiliado', $afiliado)->with('tipo', $type)->with('plan', $plan)->with('cantMiembros', $cantMiembros)->with('miembros', $miembros)->with('tipos', $tipos)->with('planes', $planes);
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
        $afilitate->delete();

        return redirect()->route('afiliate-index')->with('success', 'Se eliminó con éxito el afiliado');
    }


    public function update (AfiliateRequest $request, $id){
        
        dd($request);
        $afiliado = Afiliate::findOrFail($id);
        $afiliado->province = $request->province;
        $afiliado->city = $request->city;
        $afiliado->street=$request->street;
        $afiliado->email=$request->email;
        $afiliado->tel=$request->tel;
        $afiliado->house_number = $request->house_number;

        //$plan = Plan::findOrFail($request->);
        //$typePlan = TypePlan::findOrFail($request->plan);


        $afiliado->save();
        
        return redirect()->route('index')->with('success', 'Se guardaron los cambios en el afiliado');

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


    public function index_cupon_pago(){
        return view('cupon_pago.index');
    }


    public function eliminarMiembro($id){
        $miembro = Afiliate::findOrFail($id);
        $idTitular = $miembro->titular_id;
        $miembro->titular_id = 'null';
        $typePlanDelMiembro = TypePlan::findOrFail($miembro->typePlan_id);
        $typePlanDefault = TypePlan::where('type_id', 1)->where('plan_id', $typePlanDelMiembro->plan_id)->first();
        $miembro->typePlan_id = $typePlanDefault->id;

        $miembro->save();
        return redirect()->route('afiliate-show', ['dni' => $idTitular])->with('success', 'Se dio de baja con exito');

    }
//  $now = date('d-m-Y');
//  Habilitar del 1 al 10 de Enero
    public function pdfPrimerBimestre($dni){
        $afiliate = Afiliate::findOrFail($dni);
        $tp = $afiliate->typePlan_id;
        $tipoPlan = TypePlan::findOrFail($tp);
        $precio = ($tipoPlan->price * 6);
        $tipoDePago = "Primer Bimestre";

        $p= $tipoPlan->plan_id;
        $t= $tipoPlan->type_id;

        $plan=Plan::findOrFail($p);
        $type=Type::fingOrFail($t);

        $data = [
        'nombre' => $afiliate->name,
        'apellido' => $afiliate->last_name,
        'dni' => $dni,
        'precio' => $precio,
        'tipo' => $tipoDePago,
        'plan' => $plan->name,
        'type' => $type->name
    ];
    $pdf = PDF::loadView('cupon_pago.pdf_view', $data);
    return $pdf->download('cupon_de_pago.pdf');
    

    }
//  $now = date('d-m-Y');
//  Habilitar del 1 al 10 de julio
    public function pdfSegundoBimestre($dni){
        $afiliate = Afiliate::findOrFail($dni);
        $tp = $afiliate->typePlan_id;
        $tipoPlan = TypePlan::findOrFail($tp);
        $precio = ($tipoPlan->price * 6);
        $tipoDePago = "Primer Bimestre";

        $p= $tipoPlan->plan_id;
        $t= $tipoPlan->type_id;

        $plan=Plan::findOrFail($p);
        $type=Type::fingOrFail($t);

        $data = [
        'nombre' => $afiliate->name,
        'apellido' => $afiliate->last_name,
        'dni' => $dni,
        'precio' => $precio,
        'tipo' => $tipoDePago,
        'plan' => $plan->name,
        'type' => $type->name
    ];
    $pdf = PDF::loadView('cupon_pago.pdf_view', $data);
    return $pdf->download('cupon_de_pago.pdf');
    

    }
//  $now = date('d-m');
//Chequear que la fecha actual sea menor al 10 de cada mes en el arreglo de meses seleccionados
//día 10 del mes que está generando el cupón entonces van a empezar a correr intereses. 
//5% por cada 15 días posteriores al día 10 del mes correspondiente. 
    public function pdfMensual(PlanRequest $request, $dni){
        $afiliate = Afiliate::findOrFail($dni);
        $tp = $afiliate->typePlan_id;
        $tipoPlan = TypePlan::findOrFail($tp);
        if($request->meses)
            $precio = ($tipoPlan->price * count($request->meses));
        else
            $precio = 0;
        $tipoDePago = "Mensual";

        $p= $tipoPlan->plan_id;
        $t= $tipoPlan->type_id;

        $plan=Plan::findOrFail($p);
        $type=Type::findOrFail($t);

        $data = [
        'nombre' => $afiliate->name,
        'apellido' => $afiliate->last_name,
        'dni' => $dni,
        'precio' => $precio,
        'tipo' => $tipoDePago,
        'plan' => $plan->name,
        'type' => $type->name
    ];
    $pdf = PDF::loadView('cupon_pago.pdf_view', $data);
    return $pdf->download('cupon_de_pago.pdf');
    

    }
//  $now = date('d-m');
//Habilitada solo del 1 al 10 de enero
    public function pdfAnual( $dni){
       
        $afiliate = Afiliate::findOrFail($dni);
        $tp = $afiliate->typePlan_id;
        $tipoPlan = TypePlan::findOrFail($tp);
        
        $precio = ($tipoPlan->price * 12);
        
        $tipoDePago = "Anual";

        $p= $tipoPlan->plan_id;
        $t= $tipoPlan->type_id;

        $plan=Plan::findOrFail($p);
        $type=Type::findOrFail($t);

        $data = [
        'nombre' => $afiliate->name,
        'apellido' => $afiliate->last_name,
        'dni' => $dni,
        'precio' => $precio,
        'tipo' => $tipoDePago,
        'plan' => $plan->name,
        'type' => $type->name
    ];
    $pdf = PDF::loadView('cupon_pago.pdf_view', $data);
    return $pdf->download('cupon_de_pago.pdf');
    

    }
    
}
