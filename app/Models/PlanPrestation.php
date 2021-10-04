<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanPrestation extends Model
{
    

    protected $fillable = [
        'name',
        'plan_id',
        'prestation_id'
    ];


    public function plan(){
        return $this->hasOne(Plan::class);
    }

    public function prestation(){
        return $this->hasOne(Prestation::class);
    }

}