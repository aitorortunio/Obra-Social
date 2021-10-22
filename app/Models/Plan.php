<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypePlan;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    public $timestamps=false;
    
    protected $table = "plans";


    public function afiliados(){
        return $this->hasMany(Afiliate::class);
    }

    public function stateValue($id){
        $typePlan = TypePlan::where('plan_id', $id)->first();
        //dd($typePlan->state);
        return $typePlan->state;
    }
}
