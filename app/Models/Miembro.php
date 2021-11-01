<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    use HasFactory;   

    protected $table = "miembros";
    public $timestamps=false;
    
    protected $fillable = [
        'name',
        'last_name',
        'titular_id'
    ];

    public function miTitular(){
        return $this->hasOne(Afiliate::class);
    }
}
