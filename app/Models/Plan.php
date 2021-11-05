<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypePlan;

use function PHPUnit\Framework\countOf;

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

    public function cantAfiliados($id){
        $typePlan = TypePlan::all()->where('plan_id', $id);
        $count = 0;
        foreach($typePlan as $tp){
            $count += Afiliate::where('typePlan_id', $tp->id)->count();
        }
       
        return $count;
    }

    public function stateValue($id){
        $typePlan = TypePlan::where('plan_id', $id)->first();
        return $typePlan->state;
    }
}
