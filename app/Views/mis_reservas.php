<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">

    <h2 class="text-center mb-4">
        Mis Reservas 
    </h2>

    <?php if (empty($reservas)): ?>
        <div class="alert alert-info text-center">
            No tenés reservas todavía 
        </div>
    <?php else: ?>

    <div class="card shadow p-3">
        <table class="table table-hover text-center align-middle">
            
            <thead class="table-dark">
                <tr>
                    <th>📅 Entrada</th>
                    <th>📅 Salida</th>
                    <th>👥 Huéspedes</th>
                    <th>💲 Monto</th>
                    <th>🏡 Cabaña</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($reservas as $r): ?>
                <tr>
                    <td><?= date('d/m/Y', strtotime($r['fecha_entrada'])) ?></td>
                    <td><?= date('d/m/Y', strtotime($r['fecha_salida'])) ?></td>
                    <td><?= $r['cantHuesped'] ?></td>
                    <td class="text-success fw-bold">
                        $<?= number_format($r['monto'], 0, ',', '.') ?>
                    </td>
                    <td>
                        <span class="badge bg-primary">
                            Cabaña #<?= $r['cabana_id'] ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

    <?php endif; ?>

</div>

<?= $this->endSection() ?>