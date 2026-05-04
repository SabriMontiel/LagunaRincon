<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')): ?>

<!-- MODAL -->
<div class="modal fade" id="modalExito" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4">

        <h3 class="text-success">✅ ¡Reserva realizada!</h3>
        <p><?= session()->getFlashdata('success') ?></p>

    </div>
  </div>
</div>

<script>
    window.onload = function() {
        var modal = new bootstrap.Modal(document.getElementById('modalExito'));
        modal.show();
    }
</script>

<?php endif; ?>
<h2 class="text-center mb-4"> Nuestras Cabañas</h2>

<form method="get" action="<?= site_url('cabanas') ?>" class="mb-4">
    <div class="row g-2">

        <div class="col-md-4">
            <label>Fecha entrada</label>
            <input type="date" name="fechaEntrada" class="form-control"
                   min="<?= date('Y-m-d') ?>"
                   value="<?= $_GET['fechaEntrada'] ?? '' ?>" required>
        </div>

        <div class="col-md-4">
            <label>Fecha salida</label>
            <input type="date" name="fechaSalida" class="form-control"
                   min="<?= date('Y-m-d') ?>"
                   value="<?= $_GET['fechaSalida'] ?? '' ?>" required>
        </div>

        <div class="col-md-4 d-flex align-items-end">
            <button class="btn btn-success w-100">
                Buscar disponibilidad
            </button>
        </div>

    </div>
</form>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-warning text-center">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<?php if (!$busco): ?>
    <div class="alert alert-info text-center">
        Seleccioná fechas para ver cabañas disponibles
    </div>
<?php endif; ?>

<?php if ($busco): ?>

    <?php if (empty($cabanas)): ?>

        <div class="alert alert-danger text-center">
            No hay cabañas disponibles en esas fechas
        </div>

    <?php else: ?>

        <div class="row g-4">

            <?php foreach ($cabanas as $cabana): ?>

                <div class="col-md-4 d-flex">
                    <div class="card shadow w-100 h-100">

                        <img src="<?= base_url('assets/img/' . $cabana['imagen']) ?>" 
                             class="card-img-top img-cabana">

                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title"><?= $cabana['nombre'] ?></h5>

                            <p class="card-text flex-grow-1">
                                <?= $cabana['descripcion'] ?>
                            </p>

                            <p class="fw-bold text-success fs-5">
                                $<?= $cabana['precio'] ?> / noche
                            </p>

                            <p class="text-muted mb-1">
                                Estado: <?= $cabana['estado_nombre'] ?>
                            </p>

                            <p class="text-muted">
                                Capacidad: <?= $cabana['capacidad_nombre'] ?>
                            </p>

                            <a href="<?= site_url('cabana/' . $cabana['cabana_id'] 
                                . '?fechaEntrada=' . ($_GET['fechaEntrada'] ?? '') 
                                . '&fechaSalida=' . ($_GET['fechaSalida'] ?? '')
                            ) ?>" 
                            class="btn btn-primary w-100 mt-2">
                              Ver detalle
                            </a>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

<?php endif; ?>

<?= $this->endSection() ?>