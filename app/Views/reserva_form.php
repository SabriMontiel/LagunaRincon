<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<h2>Reservar <?= $cabana['nombre'] ?></h2>

<?php helper('form'); ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>
<form action="<?= site_url('reservar/confirmar') ?>" method="post">

    <?= csrf_field() ?>
    <input type="hidden" name="cabana" value="<?= $cabana['cabana_id']
     ?>">

    <div class="mb-3">
        <label>Nombre y Apellido</label>
        <input type="text" name="nombre" class="form-control"
        value="<?= ($usuario['nombre'] ?? '') . ' ' . ($usuario['apellido'] ?? '') ?>" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control"
        value="<?= $usuario['email'] ?? '' ?>" required>
    </div>

    <div class="mb-3">
        <label>Fecha desde</label>
        <input type="date" name="fechaEntrada" class="form-control"
        value="<?= $fechaEntrada ?? '' ?>" required>
    </div>

    <div class="mb-3">
        <label>Fecha hasta</label>
        <input type="date" name="fechaSalida" class="form-control"
        value="<?= $fechaSalida ?? '' ?>" required>
    </div>

    <div class="mb-3">
        <label>Cantidad de huéspedes</label>
        <input type="number" name="huespedes" class="form-control" required>
    </div>

    <div class="mb-3">
    <label>Medio de pago</label>
    <select name="medio_pago" class="form-control" required>
        <option value="">Seleccionar...</option>
        <option value="1">Efectivo</option>
        <option value="2">Tarjeta</option>
        <option value="3">Transferencia</option>
        <option value="4">Mercado Pago</option>
    </select>
</div>

    <button type="submit" class="btn btn-success">Confirmar Reserva</button>
</form>

<?= $this->endSection() ?>