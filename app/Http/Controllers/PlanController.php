<?php

namespace App\Http\Controllers;

use App\Models\Afiliate;
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
            $individualJoven = 0;
            $individualSenior = 0;
            $parejaJoven = 0;
            $familia2Hijos = 0;
            $familia3Hijos = 0;
            return view('plan.CreatePlan')->with('tipos', $tipos)->with('individualJoven', $individualJoven)->with('individualSenior', $individualSenior)->with('parejaJoven', $parejaJoven)->with('familia2Hijos', $familia2Hijos)->with('familia3Hijos', $familia3Hijos);
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

            //individualJoven
            $typePlan1 = new TypePlan();
            $typePlan1->price = $request->individualJoven;
            $typePlan1->state = 1;
            $typePlan1->type_id = 1;
            $typePlan1->plan_id = $plan->id;
            $typePlan1->save();
            
            //individualSenior
            $typePlan2 = new TypePlan();
            $typePlan2->price = $request->individualSenior;
            $typePlan2->state = 1;
            $typePlan2->type_id = 2;
            $typePlan2->plan_id = $plan->id;
            $typePlan2->save();

            //parejaJoven
            $typePlan3 = new TypePlan();
            $typePlan3->price = $request->parejaJoven;
            $typePlan3->state = 1;
            $typePlan3->type_id = 3;
            $typePlan3->plan_id = $plan->id;
            $typePlan3->save();

            //familia2Hijos
            $typePlan4 = new TypePlan();
            $typePlan4->price = $request->familia2Hijos;
            $typePlan4->state = 1;
            $typePlan4->type_id = 4;
            $typePlan4->plan_id = $plan->id;
            $typePlan4->save();

            //familia3Hijos
            $typePlan5 = new TypePlan();
            $typePlan5->price = $request->familia3Hijos;
            $typePlan5->state = 1;
            $typePlan5->type_id = 5;
            $typePlan5->plan_id = $plan->id;
            $typePlan5->save();
        
        
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
            //$typePlan = TypePlan::where('plan_id', $id)->where('type_id', $request->type);
            

             //individualJoven
             $typePlan1 = TypePlan::where('plan_id', $id)->where('type_id', 1)->first();
             $typePlan1->price = $request->individualJoven;
             $typePlan1->state = 1;
             $typePlan1->type_id = 1;
             $typePlan1->plan_id = $plan->id;
             $typePlan1->save();
             
             //individualSenior
             $typePlan2 = TypePlan::where('plan_id', $id)->where('type_id', 2)->first();
             $typePlan2->price = $request->individualSenior;
             $typePlan2->state = 1;
             $typePlan2->type_id = 2;
             $typePlan2->plan_id = $plan->id;
             $typePlan2->save();
 
             //parejaJoven
             $typePlan3 = TypePlan::where('plan_id', $id)->where('type_id', 3)->first();
             $typePlan3->price = $request->parejaJoven;
             $typePlan3->state = 1;
             $typePlan3->type_id = 3;
             $typePlan3->plan_id = $plan->id;
             $typePlan3->save();
 
             //familia2Hijos
             $typePlan4 = TypePlan::where('plan_id', $id)->where('type_id', 4)->first();
             $typePlan4->price = $request->familia2Hijos;
             $typePlan4->state = 1;
             $typePlan4->type_id = 4;
             $typePlan4->plan_id = $plan->id;
             $typePlan4->save();
 
             //familia3Hijos
             $typePlan5 = TypePlan::where('plan_id', $id)->where('type_id', 5)->first();
             $typePlan5->price = $request->familia3Hijos;
             $typePlan5->state = 1;
             $typePlan5->type_id = 5;
             $typePlan5->plan_id = $plan->id;
             $typePlan5->save();

            return redirect()->route('plan')->with('success','Se guardaron los cambios del plan');
        }
        catch(Exception $ex){
            return redirect()->back()->with('error', 'Nombre de plan ya existente');
        }
    }

    public function edit($id){
        $plan = Plan::findOrfail($id);
        $tipos = Type::all();
        $individualJoven = TypePlan::where('plan_id', $id)->where('type_id', 1)->first();
        $individualSenior = TypePlan::where('plan_id', $id)->where('type_id', 2)->first();
        $parejaJoven = TypePlan::where('plan_id', $id)->where('type_id', 3)->first();
        $familia2Hijos = TypePlan::where('plan_id', $id)->where('type_id', 4)->first();
        $familia3Hijos = TypePlan::where('plan_id', $id)->where('type_id', 5)->first();

        return view('plan.EditPlan')->with('plan', $plan)->with('tipos', $tipos)->with('individualJoven', $individualJoven)->with('individualSenior', $individualSenior)->with('parejaJoven', $parejaJoven)->with('familia2Hijos', $familia2Hijos)->with('familia3Hijos', $familia3Hijos);
    }


    public function changeValue($id){
        $typePlans = TypePlan::all()->where('plan_id', $id);
        foreach($typePlans as $typePlan){
            $typePlan->state = (($typePlan->state +1) % 2); //Hace toggle del estado del plan (habilitado/deshabililtado)
            $typePlan->save();
        }
        

        return redirect()->route('plan');
    }

    public function destroyPlan($id){
        $plan = Plan::findOrfail($id);
        $plan->delete();

        return redirect()->route('plan')->with('success', 'Se eliminó con éxito el plan');
    }

}
