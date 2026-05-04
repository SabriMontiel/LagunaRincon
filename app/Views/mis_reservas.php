<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">

    <h2 class="text-center mb-4">
        Mis Reservas 
    </h2>

    <?php if (session()->getFlashdata('success')): ?>

    <!-- MODAL ÉXITO -->
    <div class="modal fade" id="modalExito" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center p-4">

            <h3 class="text-success">Cancelación exitosa</h3>
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

    <?php if (empty($reservas)): ?>
        <div class="alert alert-info text-center">
            Aún no tenés reservas realizadas.
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
                    <th>💳 Medio de pago</th>
                    <th>⚙️ Acción</th>
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

                    <td>
                        <?php
                        switch ($r['mediosPago_id']) {
                            case 1: echo 'Efectivo'; break;
                            case 2: echo 'Tarjeta'; break;
                            case 3: echo 'Transferencia'; break;
                            case 4: echo 'Mercado Pago'; break;
                            default: echo 'Desconocido';
                        }
                        ?>
                    </td>

                    <td>
                        <a href="<?= site_url('cancelar-reserva/' . $r['reserva_id']) ?>" 
                           class="btn btn-danger btn-sm">
                           Cancelar
                        </a>
                    </td>

                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

    <?php endif; ?>

</div>

<?= $this->endSection() ?>