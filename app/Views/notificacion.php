<?php echo $this->extend('plantilla/layout'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container">
    <h2>Notificaciones de ofertas</h2>
    <?php if (!empty($notificaciones) && is_array($notificaciones)): ?>
        <div class="list-group">
            <?php foreach ($notificaciones as $notificacion): ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <p><strong>Técnico:</strong> <?= $notificacion['id_tecnico']; ?></p>
                        <p><strong>Mensaje:</strong> <?= $notificacion['mensaje']; ?></p>
                    </div>
                    <div>
                        <a href="<?= base_url('notificaciones/aceptar/' . $notificacion['id']); ?>" class="btn btn-success">Aceptar</a>
                        <a href="<?= base_url('notificaciones/rechazar/' . $notificacion['id']); ?>" class="btn btn-danger">Rechazar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-muted">No tienes notificaciones pendientes.</p>
    <?php endif; ?>
</div>

<?php echo $this->endSection(); ?>
