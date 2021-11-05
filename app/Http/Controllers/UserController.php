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
            $afiliado = Afiliate::findOrFail($dni); 
            $user = new User(); 
            $user->name = $r->name;
            $user->last_name= $afiliado->last_name;
            $user->documento = $dni;
            $user->dni_type=$afiliado->dni_type;
            $user->email = $r->email;
            $user->password = bcrypt($r->password);
            //$user->password = '78787877878';
            $user->role_id = 3; //3-->Es el id del afiliado.
            $user->save();

            
            $afiliado->password = $r->password;
            $afiliado->save();

            return redirect()->route('add-plan-afiliate', ['dni' => $dni]); 
    }

    function storeMiembro(Request $r, $dni){   
        $afiliado = Afiliate::findOrFail($dni); 
        $user = new User(); 
        $user->name = $dni;
        $user->last_name= $afiliado->last_name;
        $user->documento=$dni;
        $user->dni_type=$afiliado->dni_type;
        $user->email = $r->email;
        $user->password = bcrypt($r->password);
        //$user->password = '78787877878';
        $user->role_id = 3; //3-->Es el id del afiliado.
        $user->save();

        
        $afiliado->password = $r->password;
        $afiliado->save();

        return redirect()->route('afiliate-show', ['dni' => $afiliado->titular_id])->with('success', 'Se agrego un miembro a la familia'); 
}

    public function index_empleado(){
        $empleados = User::all();
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
        return redirect()->route('empleado-index')->with('success', 'Se creó con éxito el empleado');
    }

    public function updateEmpleado(Request $r, $id){
        $empleado = User::findOrFail($id);
        $empleado->name=$r->name;
        $empleado->last_name=$r->last_name;
        if($r->dni_type != NULL){
            $empleado->dni_type=$r->dni_type;
        }
        
        if($r->role_id === 'admin'){
            $empleado->role_id = 1;
        }elseif($r->role_id === 'empleado'){
            $empleado->role_id = 2;
        }else{
            $empleado->role_id = 3;
        }

        $empleado->documento=$r->documento;

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

        return redirect()->route('empleado-index')->with('success', 'Se eliminó con éxito el empleado');
    }

    public function show($id) {
        $user = User::findOrFail($id);
        return view('showUser')->with('user' , $user);
    }

}
