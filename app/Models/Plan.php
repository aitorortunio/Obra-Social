<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    

    protected $fillable = [
        'name',
        'price',
        'state'
    ];


    public function prestation(){
        return $this->hasMany(Prestation::class);
    }
    

}