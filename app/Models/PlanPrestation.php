<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanPrestation extends Model
{
    public $timestamps= false;

    protected $fillable = [
        'percentage',
        'plan_id',
        'prestation_id'
    ];

    protected $table = "planprestation";

    public function plan(){
        return $this->hasOne(Plan::class);
    }

    public function prestation(){
        return $this->hasOne(Prestation::class);
    }

}