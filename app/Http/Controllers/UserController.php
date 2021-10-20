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

    function store(Request $r, $dni){        
        try{
            $user = new User(); 
            $user->name = $r->name;
            $user->email = $r->email;
            $user->password = bcrypt($r->password);
            $user->role_id = 3; //3-->Es el id del afiliado.
            
            $user->save();          
            return redirect()->route('add-plan-afiliate', ['dni' => $dni]); 
            
            
        }
        catch(Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with("error", "Error al guardar el nuevo usuario!");
        }
    }

    public function index_empleado(){
        $empleados = User::all()->where('role_id', 2);
        return view('admin.indexEmpleado')->with('empleados', $empleados);
    }


    public function createEmpleado(){
        return view('admin.createEmpleado');
    }

    public function storeEmpleado(Request $r){
        $user = User::create($r->all());
        $user->password = bcrypt($r->password);
        $user->role_id = 2;
        $user->save();
        return redirect()->route('empleado-index')->with('success', 'Se creo con exito el empleado');
    }

    public function updateEmpleado(Request $r, $id){
        $empleado = User::findOrFail($id);
        $empleado->name=$r->name;
        $empleado->last_name=$r->last_name;
        if($r->dni_type != NULL){
            $empleado->dni_type=$r->dni_type;
        }
        
        $empleado->documento=$r->documento;
        $empleado->role_id = 2;

        $empleado->save();
        return redirect('empleado-index')->with('success', 'Se guardaron los cambios del empleado');
    }

    public function editEmpleado($id){
        $empleado = User::findOrFail($id);
        return view('admin.editEmpleado')->with('empleado', $empleado);
    }

    public function destroyEmpleado($id){
        $empleado = User::findOrFail($id);
        $empleado->delete();

        return redirect()->route('empleado-index')->with('success', 'Se elimino con exito el empleado');
    }
}
