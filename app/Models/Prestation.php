<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
   
    protected $fillable = [
        'name'
    ];

    protected $table = "prestation";
}