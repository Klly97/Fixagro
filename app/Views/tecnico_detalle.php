<?php echo $this->extend('plantilla/layout'); ?>
<?php echo $this->section('contenido'); ?>

<div class="contenedor bg-light m-4 rounded p-3">
    <!-- Información del técnico -->
    <div class="d-flex">
        <div class="perfil bg-white rounded p-3 shadow" style="width: 40%;">
            <div class="text-center">
            <img src="https://as1.ftcdn.net/v2/jpg/09/65/01/78/1000_F_965017857_17LYzOToXwVcwZXXpqRrVjDZRQBKxcQw.jpg" alt="avatar"
            class="rounded-circle img-fluid" style="width: 150px;">                <h2 class="mt-3"> <?= esc($persona['nombre']) ?> <?= esc($persona['apellido']) ?></h2>
                <p class="text-muted"><i class="fas fa-map-marker-alt"></i> <?= esc($persona['municipio']) ?>, <?= esc($persona['departamento']) ?></p>
                <div class="d-flex justify-content-center">
                    <div class="me-1">
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star-half-alt text-warning"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trabajos o máquinas asociadas -->
        <div class="trabajos bg-white rounded p-3 ms-4 shadow" style="width: 60%;">
            <div class="d-flex justify-content-between align-items-center">
                <h3>Mis Trabajos</h3>
                <a href="#" class="btn btn-success">Historial</a>
            </div>
            <div class="row mt-3">
                <?php if (!empty($persona['trabajos'])): ?>
                    <?php foreach ($persona['trabajos'] as $trabajo): ?>
                        <div class="col-4 mb-3">
                            <div class="card">
                                <img src="<?= base_url('uploads/' . esc($trabajo['imagen'])) ?>" alt="Imagen del trabajo" class="card-img-top" style="height: 150px; object-fit: cover;">
                                <div class="card-body">
                                    <p class="card-text text-center"> <?= esc($trabajo['descripcion']) ?> </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">Este técnico aún no tiene trabajos registrados.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Botón para volver a la página anterior -->
    <div class="text-end mt-3">
        <a href="<?= base_url('inicio') ?>" class="btn btn-outline-success">Volver</a>
    </div>
</div>

<?php echo $this->endSection(); ?>