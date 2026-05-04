<?php

namespace App\Controllers;

use App\Models\ReservaModel;
use App\Models\CabanaModel;


class Reserva extends BaseController
{
    public function realizarReserva($cabana_id)
{
    $model = new CabanaModel();

    $cabana = $model->find($cabana_id);

    if (!$cabana) {
        return redirect()->to('cabanas');
    }

    return view('reserva_form', [
        'cabana' => $cabana
    ]);
}

public function confirmarReserva()
{
    $data = $this->request->getPost([
        'cabana',
        'fechaEntrada',
        'fechaSalida',
        'huespedes',
        'medio_pago'
    ]);

    if (
        empty($data['cabana']) ||
        empty($data['fechaEntrada']) ||
        empty($data['fechaSalida']) ||
        empty($data['huespedes']) ||
        empty($data['medio_pago'])
    ) {
        return redirect()->back()->with('error', 'Faltan completar datos');
    }

    $hoy = date('Y-m-d');

    if ($data['fechaEntrada'] < $hoy) {
        return redirect()->back()->with('error', 'No podés seleccionar fechas pasadas');
    }

    if ($data['fechaSalida'] <= $data['fechaEntrada']) {
        return redirect()->back()->with('error', 'La fecha de salida debe ser posterior');
    }

    $precio = $this->obtenerPrecioCabana($data['cabana']);

    $data['monto'] = $this->calcularMonto(
        $data['fechaEntrada'],
        $data['fechaSalida'],
        $precio
    );

    session()->set('reserva_temp', $data);

    return view('reserva_confirmacion', [
    'cabana' => $data['cabana'],
    'fechaEntrada' => $data['fechaEntrada'],
    'fechaSalida' => $data['fechaSalida'],
    'huespedes' => $data['huespedes'],
    'medio_pago' => $data['medio_pago'],
    'monto' => $data['monto']
]);
}

public function guardarReserva()
{
    $model = new ReservaModel();

    $data = $this->request->getPost([
        'cabana',
        'fechaEntrada',
        'fechaSalida',
        'huespedes',
        'medio_pago'
    ]);

    $usuario_id = session()->get('usuario_id');

    $dataInsert = [
        'cabana_id' => $data['cabana'],
        'fecha_entrada' => $data['fechaEntrada'],
        'fecha_salida' => $data['fechaSalida'],
        'cantHuesped' => $data['huespedes'],
        'usuario_id' => $usuario_id,
        'mediosPago_id' => $data['medio_pago'],
        'monto' => 0
    ];

    $model->insert($dataInsert);

    return redirect()->to('cabanas')
        ->with('success', 'Reserva realizada con éxito');
}

    private function calcularMonto($fechaEntrada, $fechaSalida, $precio)
    {
        $f1 = new \DateTime($fechaEntrada);
        $f2 = new \DateTime($fechaSalida);

        $dias = $f1->diff($f2)->days;

        return $dias * $precio;
    }

    private function obtenerPrecioCabana($cabana_id)
    {
        $model = new CabanaModel();

        $cabana = $model->find($cabana_id);

        return $cabana ? $cabana['precio'] : 0;
    }

    public function misReservas()
    {
        $model = new ReservaModel();

        $usuario_id = session()->get('usuario_id');

        if (!$usuario_id) {
            return redirect()->to('login');
        }

        $reservas = $model
            ->where('usuario_id', $usuario_id)
            ->findAll();

        return view('mis_reservas', [
            'reservas' => $reservas
        ]);
    }

    public function cancelarReserva($id)
{
    $model = new ReservaModel();
    $reserva = $model->find($id);

    if (!$reserva) {
        return redirect()->to('mis-reservas');
    }

    return view('reserva_cancelar', [
        'reserva' => $reserva
    ]);
}

public function confirmarCancelacion()
{
    $id = $this->request->getPost('reserva_id');

    $model = new ReservaModel();

    $model->delete($id); // eliminación directa

    return redirect()->to('mis-reservas')
        ->with('success', 'Se ha cancelado la reserva');
}
}