<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// HOME
$routes->get('/', 'Home::index');

// CABAÑAS 
$routes->get('cabanas', 'Cabana::consultarCabanas');
$routes->get('cabana/(:num)', 'Cabana::detallesCabana/$1');

// RESERVAS 
$routes->get('reservar/(:num)', 'Reserva::realizarReserva/$1'); 
$routes->post('reservar/confirmar', 'Reserva::confirmarReserva');
$routes->post('reservar/guardar', 'Reserva::guardarReserva');
$routes->get('mis-reservas', 'Reserva::misReservas');;

$routes->get('cancelar-reserva/(:num)', 'Reserva::cancelarReserva/$1');
$routes->post('cancelar-reserva-confirmar', 'Reserva::confirmarCancelacion');

// AUTH
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::validarDatos');
$routes->get('logout', 'Auth::logout');
$routes->get('registro', 'Auth::registro');
$routes->post('registro', 'Auth::guardarUsuario');