<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitud extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $table = "solicitud";
    protected $primaryKey= "id";
    protected $id = "id";
    protected $fillable = [
        'tipo',
        'institucion',
        'descripcion',
        'estado',
        'fecha',
        'orden_medica',
        'comprobante',
        'afiliate'
    ];

   
}
