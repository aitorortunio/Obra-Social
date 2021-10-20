<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanPrestation;
use App\Models\Prestation;
use Illuminate\Http\Request;


class PlanController extends Controller
{
    //
    public function show(){
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

        

        return view('afiliate.miplan')->with(['planP'=>$planConPrestaciones, 'prestP'=>$prestacionesDelPlan, 'planes'=>$planes]);
    }


}
