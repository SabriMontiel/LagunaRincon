<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="card shadow p-4 text-center">

        <h2 class="text-success mb-3">✅ Reserva realizada con éxito</h2>

        <p><strong>Nombre:</strong> <?= $reserva['nombre'] ?></p>
        <p><strong>Cabaña ID:</strong> <?= $reserva['cabana'] ?></p>
        <p><strong>Desde:</strong> <?= $reserva['fecha_desde'] ?></p>
        <p><strong>Hasta:</strong> <?= $reserva['fecha_hasta'] ?></p>

        <a href="<?= site_url('cabanas') ?>" class="btn btn-primary mt-3">
            Volver a cabañas
        </a>

    </div>
</div>

<?= $this->endSection() ?>
