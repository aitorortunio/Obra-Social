<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\TypePlan;
use App\Models\PlanPrestation;
use App\Models\Prestation;
use Illuminate\Http\Request;
use App\Models\Type;

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
            $tipos = Type::all();
            return view('plan.CreatePlan')->with('tipos', $tipos);
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
            $type = Type::findOrFail($request->type);
            $typePlan = new TypePlan();
            $typePlan->price = 0;
            $typePlan->state = 1;
            $typePlan->type_id = $type->id;
            $typePlan->plan_id = $plan->id;
            $typePlan->save();
            return redirect()->route('plan')->with('success','Se creó con éxito el nuevo plan');

        }
        catch(Exception $ex){
            return redirect()->back()->with('error', 'Nombre de plan ya existente');
        }
    }

    public function index(){
        $planes = Plan::all()->sortBy('name');
        $typePlan = TypePlan::all();
        return view('plan.IndexPlan')->with('planes', $planes)->with('tiposPlanes', $typePlan);
    }

    public function update(Request $request, $id){
        try{
            $plan = Plan::findOrfail($id);
            $plan->name = $request->name;
            $plan->save();
            $typePlan = TypePlan::where('plan_id', $id)->where('type_id', $request->type);
            
            return redirect()->route('plan')->with('success','Se guardaron los cambios del plan');
        }
        catch(Exception $ex){
            return redirect()->back()->with('error', 'Nombre de plan ya existente');
        }
    }

    public function edit($id){
        $plan = Plan::findOrfail($id);
        $tipos = Type::all();
        
        return view('plan.EditPlan')->with('plan', $plan)->with('tipos', $tipos);
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

        return redirect()->route('plan')->with('success', 'Se eliminó con éxito el plan');
    }

}
