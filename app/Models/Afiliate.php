<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afiliate extends Model
{
    

    protected $fillable = [
        'dni',
        'dni_type',
        'name',
        'last_name',
        'birth_date',
        'province',
        'city',
        'street',
        'house_number',
        'email',
        'tel',
        'password',
        'plan_id'

    ];

    public function plan(){
        return $this->hasOne(Plan::class);
    }

}