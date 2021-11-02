<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\AfiliateRequest;
use App\Http\Requests\Auth\PlanRequest;
use App\Http\Requests\Auth\SolicitudRequest;
use App\Models\Afiliate;
use App\Models\Miembro;
use App\Models\Plan;
use App\Models\PlanPrestation;
use App\Models\solicitud;
use Solicitud as GlobalSolicitud;
use App\Models\Type;
use App\Models\TypePlan;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

use App\Models\User;
use Illuminate\Http\Request;

class PDFController extends Controller
{


//  $now = date('d-m-Y');
//  Habilitar del 1 al 10 de Enero

    public function pdfPrimerBimestre($dni){
        $afiliate = Afiliate::findOrFail($dni);
        $tp = $afiliate->typePlan_id;
        $tipoPlan = TypePlan::findOrFail($tp);
        $precio = ($tipoPlan->price * 6);
        $tipoDePago = "Primer Bimestre";

        $p= $tipoPlan->plan_id;
        $t= $tipoPlan->type_id;

        $plan=Plan::findOrFail($p);
        $type=Type::findOrFail($t);

        $data = [
        'nombre' => $afiliate->name,
        'apellido' => $afiliate->last_name,
        'dni' => $dni,
        'precio' => $precio,
        'tipo' => $tipoDePago,
        'plan' => $plan->name,
        'type' => $type->name
    ];
    $pdf = PDF::loadView('cupon_pago.pdf_view', $data);
    return $pdf->download('cupon_de_pago.pdf');
    

    }

//  $now = date('d-m');
//Chequear que la fecha actual sea menor al 10 de cada mes en el arreglo de meses seleccionados
//día 10 del mes que está generando el cupón entonces van a empezar a correr intereses. 
//5% por cada 15 días posteriores al día 10 del mes correspondiente. 
    public function pdfMensual(PlanRequest $request, $dni){
        $afiliate = Afiliate::findOrFail($dni);
        $tp = $afiliate->typePlan_id;
        $tipoPlan = TypePlan::findOrFail($tp);
        //ano-mes-dia
        $date = Carbon::now();
        $date->toDateString();
        $year = $date->year;
        $diaDelMes = new Carbon();

        $precio = 0;

        foreach($request->meses as $mes){
            $precio = $precio + $tipoPlan->price;
            $diaDelMes = Carbon::createFromDate($year,$mes+1,10);
            $resta = $diaDelMes->diffInDays($date, false);
            
            if($resta < 0 || $resta == 0){
                $precio = $precio;
                
            }
            else{
                $division = $resta / 15;
                $division = floor($division);
                $precio = ($precio + $precio*$division*0.05) ;
            }

        }
        
        

        $tipoDePago = "Mensual";

        $p= $tipoPlan->plan_id;
        $t= $tipoPlan->type_id;

        $plan=Plan::findOrFail($p);
        $type=Type::findOrFail($t);

        $data = [
        'nombre' => $afiliate->name,
        'apellido' => $afiliate->last_name,
        'dni' => $dni,
        'precio' => $precio,
        'tipo' => $tipoDePago,
        'plan' => $plan->name,
        'type' => $type->name
    ];
    $pdf = PDF::loadView('cupon_pago.pdf_view', $data);
    return $pdf->download('cupon_de_pago.pdf');
    

    }
//  $now = date('d-m');
//Habilitada solo del 1 al 10 de enero
    public function pdfAnual( $dni){
       
        $afiliate = Afiliate::findOrFail($dni);
        $tp = $afiliate->typePlan_id;
        $tipoPlan = TypePlan::findOrFail($tp);
        
        $precio = ($tipoPlan->price * 12);
        
        $tipoDePago = "Anual";

        $p= $tipoPlan->plan_id;
        $t= $tipoPlan->type_id;

        $plan=Plan::findOrFail($p);
        $type=Type::findOrFail($t);

        $data = [
        'nombre' => $afiliate->name,
        'apellido' => $afiliate->last_name,
        'dni' => $dni,
        'precio' => $precio,
        'tipo' => $tipoDePago,
        'plan' => $plan->name,
        'type' => $type->name
    ];
    $pdf = PDF::loadView('cupon_pago.pdf_view', $data);
    return $pdf->download('cupon_de_pago.pdf');
    

    }
}