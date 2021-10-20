<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Exception;

class PlanController extends Controller
{
    //
    public function show(){
       return view('afiliate.miplan');
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
            return redirect()->route('plan');
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
            return redirect()->route('plan');
        }
        catch(Exception $ex){
            return redirect()->back()->with('error', 'Nombre de plan ya existente');
        }
    }

    public function edit($id){
        $plan = Plan::findOrfail($id);
        return view('plan.EditPlan')->with('plan', $plan);
    }
}
