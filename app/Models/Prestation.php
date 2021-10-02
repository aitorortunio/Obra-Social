<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
   

    protected $fillable = [
        'name',
        'percentage'
    ];

    public function plan(){
        return $this->hasMany(Plan::class);
    }

    
}