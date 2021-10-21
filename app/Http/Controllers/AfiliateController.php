<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\AfiliateRequest;
use App\Http\Requests\Auth\PlanRequest;
use App\Http\Requests\Auth\SolicitudRequest;
use App\Models\Afiliate;
use App\Models\Plan;
use App\Models\solicitud;
use Solicitud as GlobalSolicitud;

class AfiliateController extends Controller
{
    public function index(){

    }

    //Crear una nueva categoria
    public function create(){
        return view('afiliate.create');
    }

    public function store (AfiliateRequest $request){
        $afiliado = Afiliate::create($request->all());
        return redirect()->route('registrar', ['afiliado'=> $afiliado]);
    }

    public function addPlanToAfiliate($dni){
        $afiliado = Afiliate::findOrFail($dni);
        $plans = Plan::all();
       
        return view('afiliate.plan')->with('plans', $plans)->with('afiliado', $afiliado);
    }

    public function storePlanToAfiliate(PlanRequest $req, $dni){
        $afiliado = Afiliate::findOrFail($dni);
        $afiliado->plan_id = $req->id;
        $afiliado->save();
        return redirect('dashboard')->with('success', 'Se afilio con exito, por favor ingrese sus datos de loggeo');
    }


    //Devuelve la vista de todas las recetas asociadas a una categoria
    public function show($id){
        $afiliado = Afiliate::findOrFail($id);
       return view('afiliate.misdatos')->with('afiliado', $afiliado);
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
        
    }


    public function update (AfiliateRequest $request, $id){
        $afiliado = Afiliate::findOrFail($id);
        $afiliado->province = $request->province;
        $afiliado->city = $request->city;
        $afiliado->street=$request->street;
        $afiliado->email=$request->email;
        $afiliado->tel=$request->tel;
        $afiliado->house_number = $request->house_number;
     
        $afiliado->save();
        
        return redirect('/dashboard');

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
    
}
