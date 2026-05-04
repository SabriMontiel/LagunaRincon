<?php

namespace App\Models;

use CodeIgniter\Model;

class CabanaModel extends Model
{
    protected $table = 'cabanas';
    protected $primaryKey = 'cabana_id';

    protected $allowedFields = [
        'nombre',
        'descripcion',
        'imagen',
        'precio',
        'estado_id',
        'capacidad_id'
    ];
}