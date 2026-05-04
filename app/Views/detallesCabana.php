<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">

    <div class="card shadow p-4">

        <h2><?= $cabana['nombre'] ?></h2>

        <img src="<?= base_url('assets/img/' . $cabana['imagen']) ?>" 
             class="img-fluid mb-3">

        <p><?= $cabana['descripcion'] ?></p>

        <p><strong>Capacidad:</strong> <?= $cabana['capacidad_nombre'] ?></p>
        <p><strong>Estado:</strong> <?= $cabana['estado_nombre'] ?></p>

        <p class="text-success fs-4">
            $<?= $cabana['precio'] ?> por noche
        </p>

        <?php if (session()->get('usuario_id')): ?>

            <a href="<?= site_url('reservar/' . $cabana['cabana_id'] 
                . '?desde=' . $fechaEntrada 
                . '&hasta=' . $fechaSalida) ?>" 
                class="btn btn-success">
                Reservar
            </a>

        <?php else: ?>

            <a href="<?= site_url('login') ?>" class="btn btn-secondary">
                Iniciar sesión para reservar
            </a>

        <?php endif; ?>

    </div>

</div>

<?= $this->endSection() ?>