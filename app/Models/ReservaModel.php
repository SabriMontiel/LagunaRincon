<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservaModel extends Model
{
    protected $table = 'RESERVAS';
    protected $primaryKey = 'reserva_id';

    protected $allowedFields = [
        'fecha_entrada',
        'fecha_salida',
        'cantHuesped',
        'monto',
        'usuario_id',
        'cabana_id',
        'mediosPago_id'
    ];
}