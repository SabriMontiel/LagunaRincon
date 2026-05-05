<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="card shadow p-4">

        <h3 class="mb-4 text-center">Confirmar Reserva</h3>

        <p><strong>Fecha desde:</strong> <?= $fechaEntrada ?></p>
        <p><strong>Fecha hasta:</strong> <?= $fechaSalida ?></p>
        <p><strong>Huéspedes:</strong> <?= $huespedes ?></p>
        <p><strong>Medio de pago:</strong>
            <?php
             switch ($medio_pago) {
                case '1': echo 'Efectivo'; break;
                case '2': echo 'Tarjeta'; break;
                case '3': echo 'Transferencia'; break;
                case '4': echo 'Mercado Pago'; break;
                default: echo 'Desconocido';
             }
            ?>
        </p>
        <form action="<?= site_url('reservar/guardar') ?>" method="post">
            <?= csrf_field() ?>

            <input type="hidden" name="cabana" value="<?= $cabana ?>">
            <input type="hidden" name="fechaEntrada" value="<?= $fechaEntrada ?>">
            <input type="hidden" name="fechaSalida" value="<?= $fechaSalida ?>">
            <input type="hidden" name="huespedes" value="<?= $huespedes ?>">
            <input type="hidden" name="medio_pago" value="<?= $medio_pago ?>">

            <button type="submit" class="btn btn-success w-100">
        Confirmar reserva
            </button>
        </form>

        <a href="<?= site_url('cabanas') ?>" class="btn btn-secondary w-100 mt-2">
            Cancelar
        </a>

    </div>
</div>

<?= $this->endSection() ?>