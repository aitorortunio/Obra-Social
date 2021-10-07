<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Afiliate;
use Illuminate\Http\Request;
use Exception;


class UserController extends Controller
{

    function create(Afiliate $afiliado) {
        return view('auth.register')->with('afiliado' , $afiliado);
    }

    function store(Request $r){        
        try{
            $user = new User(); 
            $user->name = $r->name;
            $user->email = $r->email;
            $user->password = bcrypt($r->password);
            $user->role_id = 3; //3-->Es el id del afiliado.
            
            $user->save();          
            return redirect()->route('add-plan-afiliate', ['id' => $user->id]); 
            
            
        }
        catch(Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with("error", "Error al guardar el nuevo usuario!");
        }
    }

}
