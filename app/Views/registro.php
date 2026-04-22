<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5" style="max-width: 500px;">

    <h3 class="text-center mb-4">Registrarse 📝</h3>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('registro') ?>">

        <?= csrf_field() ?>

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-success w-100">Registrarse</button>
    </form>

    <p class="text-center mt-3">
        ¿Ya tenés cuenta?
        <a href="<?= site_url('login') ?>">Iniciar sesión</a>
    </p>

</div>

<?= $this->endSection() ?>