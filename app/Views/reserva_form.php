<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>


<h2>Reservar <?= $cabana_nombre ?></h2>

<?php helper('form'); ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<form action="<?= site_url('reservar/guardar') ?>" method="post">

    <?= csrf_field() ?>
    <input type="hidden" name="cabana" value="<?= $cabana_id ?>">

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Fecha desde</label>
        <input type="date" name="fecha_desde" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Fecha hasta</label>
        <input type="date" name="fecha_hasta" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Cantidad de huéspedes</label>
        <input type="number" name="huespedes" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Confirmar Reserva</button>
</form>

<?= $this->endSection() ?>