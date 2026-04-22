<!DOCTYPE html>
<link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LagunaRincon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="<?= site_url('/') ?>">
        Laguna Rincon
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-center">

        <?php if (session()->get('usuario_id')): ?>

            <li class="nav-item me-2">
                <span class="nav-link text-light">
                 <?= session()->get('nombre') ?>
                </span>
            </li>

            <li class="nav-item">
                <a href="<?= site_url('mis-reservas') ?>" class="nav-link">Mis Reservas</a>
            </li>

            <li class="nav-item">
                <a href="<?= site_url('logout') ?>" class="btn btn-danger ms-3">
                    Cerrar sesión
                </a>
            </li>

        <?php else: ?>

            <li class="nav-item">
                <a href="<?= site_url('login') ?>" class="nav-link">Iniciar sesión</a>
            </li>

            <li class="nav-item">
                <a href="<?= site_url('registro') ?>" class="btn btn-success ms-3">
                    Registrarse
                </a>
            </li>

        <?php endif; ?>

        </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">