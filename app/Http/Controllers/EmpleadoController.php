<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\AfiliateRequest;
use App\Http\Requests\Auth\PlanRequest;
use App\Http\Requests\Auth\sRequest;
use App\Models\Afiliate;
use App\Models\Plan;
use App\Models\Solicitud;
use s as Globals;

class EmpleadoController extends Controller
{

    public function gestionSolicitud(){
        $solicitud = Solicitud::all();
        

        return view('empleado.gestion_solicitudes')->with('solicitud', $solicitud);
    }

    public function show($id){
        $solicitud = Solicitud::findOrFail($id);
        return view('empleado.show')->with('solicitud', $solicitud);
    }

    public function aprobar($id){
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->estado= "Aprobada";
        $solicitud->save();
        return redirect('gestion');
    }
    public function desaprobar($id){
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->estado= "Desaprobada";
        $solicitud->save();
        return redirect('gestion');
    }




}