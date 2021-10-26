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

    public function cantAfiliados(){
        //dd(Afiliate::where('typePlan_id', $this->id)->count());
        $count = Afiliate::where('typePlan_id', $this->id)->count();
        return $count;
    }

    public function stateValue($id){
        $typePlan = TypePlan::where('plan_id', $id)->first();
        //dd($typePlan->state);
        return $typePlan->state;
    }
}
