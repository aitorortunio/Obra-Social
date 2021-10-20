<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
