<?php

namespace App\Controllers;

class Cabana extends BaseController
{
    public function index()
    {
      $data['cabanas'] = [
    [
        'id' => 1,
        'nombre' => 'Cabaña Bosque',
        'descripcion' => 'Rodeada de naturaleza, ideal para descansar.',
        'precio' => 15000,
        'imagen' => 'cabana1.jpg'
    ],
    [
        'id' => 2,
        'nombre' => 'Cabaña Lago',
        'descripcion' => 'Vista al lago, perfecta para parejas.',
        'precio' => 20000,
        'imagen' => 'cabana2.jpg'
    ],
    [
        'id' => 3,
        'nombre' => 'Cabaña Montaña',
        'descripcion' => 'Ubicada en altura con vista panorámica.',
        'precio' => 18000,
        'imagen' => 'cabana3.jpg'
    ]
];      

        return view('cabanas', $data);
    }
}