<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\TypePlan;
use App\Models\PlanPrestation;
use App\Models\Prestation;
use Illuminate\Http\Request;

use Exception;

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




    public function create(){
        try{
            return view('plan.CreatePlan');
        }
        catch(Exception $ex){
            return redirect()->back()->with('error', 'Nombre de plan ya existente');
        }
     }

    public function store(Request $request){
        try{
            $plan = new Plan();
            $plan->name = $request->name;

            $plan->save();
            return redirect()->route('plan')->with('success','Se creo con exito el nuevo plan');
        }
        catch(Exception $ex){
            return redirect()->back()->with('error', 'Nombre de plan ya existente');
        }
    }

    public function index(){
        $planes = Plan::all()->sortBy('name');
        return view('plan.IndexPlan')->with('planes', $planes);
    }

    public function update(Request $request, $id){
        try{
            $plan = Plan::findOrfail($id);
            $plan->name = $request->name;

            $plan->save();
            return redirect()->route('plan')->with('success','Se guardaron los cambios del plan');
        }
        catch(Exception $ex){
            return redirect()->back()->with('error', 'Nombre de plan ya existente');
        }
    }

    public function edit($id){
        $plan = Plan::findOrfail($id);
        return view('plan.EditPlan')->with('plan', $plan);
    }


    public function changeValue($id){
        $typePlan = TypePlan::where('plan_id', $id)->first();
        $typePlan->state = ($typePlan->state +1 % 2);
        $typePlan->save();

        return redirect()->route('plan');
    }

    public function destroyPlan($id){
        $plan = Plan::findOrfail($id);
        $plan->delete();

        return redirect()->route('plan')->with('success', 'Se elimino con exito el plan');
    }

}
