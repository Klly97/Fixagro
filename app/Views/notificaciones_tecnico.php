<?php echo $this->extend('plantilla/layout'); ?>
<?php echo $this->section('contenido'); ?>

<!-- Section for notifications -->
<section style="background-color: #e7e4e4;">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <p class="lead fw-normal mb-0">Mis Notificaciones</p>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($notificaciones) && is_array($notificaciones)): ?>
                            <?php foreach ($notificaciones as $notificacion): ?>
                                <div class="alert alert-info">
                                    <p><strong>Notificación:</strong> <?php echo $notificacion['mensaje']; ?></p>
                                    <p><strong>Estado:</strong> 
                                        <?php if ($notificacion['estado'] == 'pendiente'): ?>
                                            <span class="text-warning">Pendiente</span>
                                        <?php elseif ($notificacion['estado'] == 'aceptada'): ?>
                                            <span class="text-success">Aceptada</span>
                                        <?php elseif ($notificacion['estado'] == 'rechazada'): ?>
                                            <span class="text-danger">Rechazada</span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-muted">No tienes notificaciones pendientes.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $this->endSection(); ?>
