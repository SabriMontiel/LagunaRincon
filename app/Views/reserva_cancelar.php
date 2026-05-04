<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="card p-4 shadow text-center">

        <h3 class="text-danger">⚠️ Cancelar Reserva</h3>

        <p>¿Realmente desea cancelar la reserva?</p>

        <form action="<?= site_url('cancelar-reserva-confirmar') ?>" method="post">
            <?= csrf_field() ?>

            <input type="hidden" name="reserva_id" value="<?= $reserva['reserva_id'] ?>">

            <button type="submit" class="btn btn-danger">
                Sí, cancelar
            </button>
        </form>

        <a href="<?= site_url('mis-reservas') ?>" class="btn btn-secondary mt-2">
            Volver
        </a>

    </div>
</div>

<?= $this->endSection() ?>