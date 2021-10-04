<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypePlan extends Model
{
    

    protected $fillable = [
        'name',
        'plan_id',
        'type_id'
    ];


    public function plan(){
        return $this->hasOne(Plan::class);
    }

    public function type(){
        return $this->hasOne(Type::class);
    }

}