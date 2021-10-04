<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\AfiliateRequest;
use App\Models\Afiliate;

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
        return redirect()->route('register', ['afiliado' => $afiliado]);
       
       
    }

    //Devuelve la vista de todas las recetas asociadas a una categoria
    public function show(){
       return view('afiliate.home');
    }

    public function showAfiliate($id){
        return view('afiliate.home');
    }

    
    public function edit($id){
        
    }

    public function delete($id){
        

    }


    public function update (){
       
    }
}
