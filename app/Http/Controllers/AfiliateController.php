<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\AfiliateRequest;
use App\Models\Afiliate;
use App\Models\Plan;

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
        return redirect()->route('register', ['afiliado'=> $afiliado]);
    }

    public function addPlanToAfiliate (){
       // $afiliado = Afiliate ::findOrFail($id);
        //$afiliado->plan_id = $request->plan_id;
        //$afiliado->save();
        //return redirect()->route('dashboard');
        $plans = Plan::all();
        dd($plans);
        return view('afiliate.plan')->with('plans', $plans);
        //return "hola";
    }

    //Devuelve la vista de todas las recetas asociadas a una categoria
    public function show(){
       return view('afiliate.home');
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


    public function update (){
       
    }
}
