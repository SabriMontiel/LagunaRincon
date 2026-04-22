<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="hero d-flex align-items-center justify-content-center text-center">

    <div class="text-white">

        <h1 class="display-3 fw-bold mb-3">
            🌿 Greenhouse
        </h1>

        <p class="lead mb-4">
            Reservá tu cabaña ideal en plena naturaleza
        </p>

        <a href="<?= site_url('cabanas') ?>" 
           class="btn btn-success btn-lg px-5 py-3 shadow">
            Ver Cabañas
        </a>

    </div>

</div>

<?= $this->endSection() ?>