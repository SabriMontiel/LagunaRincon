<?php

namespace App\Controllers;

use App\Models\CabanaModel;

class Cabana extends BaseController
{
    public function consultarCabanas()
{
    $model = new \App\Models\CabanaModel();

    $fechaEntrada = $this->request->getGet('fechaEntrada');
    $fechaSalida = $this->request->getGet('fechaSalida');

    $cabanas = [];
    $busco = false;

    if ($fechaEntrada && $fechaSalida) {

        $busco = true;

        $cabanas = $model
            ->select('cabanas.*, estado.estado_nombre, capacidad.capacidad_nombre')
            ->join('estado', 'estado.estado_id = cabanas.estado_id')
            ->join('capacidad', 'capacidad.capacidad_id = cabanas.capacidad_id')
            ->where("cabanas.cabana_id NOT IN (
                SELECT cabana_id FROM reservas 
                WHERE fecha_entrada <= '$fechaSalida' 
                AND fecha_salida >= '$fechaEntrada'
            )")
            ->findAll();
    }

    return view('cabanas', [
        'cabanas' => $cabanas,
        'busco' => $busco
    ]);
}
public function detallesCabana($id)
{
    $model = new \App\Models\CabanaModel();

    $cabana = $model
        ->select('cabanas.*, estado.estado_nombre, capacidad.capacidad_nombre')
        ->join('estado', 'estado.estado_id = cabanas.estado_id')
        ->join('capacidad', 'capacidad.capacidad_id = cabanas.capacidad_id')
        ->find($id);

    $fechaEntrada = $this->request->getGet('fechaEntrada');
    $fechaSalida = $this->request->getGet('fechaSalida');

    return view('detallesCabana', [
        'cabana' => $cabana,
        'fechaEntrada' => $fechaEntrada,
        'fechaSalida' => $fechaSalida
    ]);
}

}
     