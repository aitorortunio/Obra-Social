<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\AfiliateRequest;
use App\Http\Requests\Auth\PlanRequest;
use App\Models\Afiliate;
use App\Models\Plan;
use App\Models\Role;



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
        return redirect('/dashboard')->with('success', 'Se afilio con exito, por favor ingrese sus datos de loggeo');
    }


    //Devuelve la vista de todas las recetas asociadas a una categoria
    public function show($id){
        $afiliado = Afiliate::findOrFail($id);
       return view('afiliate.home')->with('afiliado', $afiliado);
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
        $afiliado->plan_id = $request->plan_id;

        $afiliado->save();
        dd($afiliado);
        return redirect()->route('dashboard');

    }
}
