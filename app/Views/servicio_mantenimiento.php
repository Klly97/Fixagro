<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>

<!-- Profile Section -->
<section style="background-color: #e7e4e4;">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="https://as1.ftcdn.net/v2/jpg/09/65/01/78/1000_F_965017857_17LYzOToXwVcwZXXpqRrVjDZRQBKxcQw.jpg" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-2"><?php echo session('nombre') . ' ' . session('apellido') ?></h5>
                        <div class="rating mb-1">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="far fa-star text-warning"></i>
                            <i class="far fa-star text-warning"></i>
                        </div>
                        <p class="text-muted mb-0">Ubicación</p>
                        <p class="text-muted mb-4"><?php echo session('municipio') . ', ' . session('departamento') ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <p class="lead fw-normal mb-0">Mis Trabajos</p>
                    </div>

                    <div class="card-body">
                        <div class="row g-2">
                            <!-- Iterar sobre los trabajos -->
                            <?php if (!empty($trabajos) && is_array($trabajos)): ?>
                                <?php foreach ($trabajos as $trabajo): ?>
                                    <div class="col-12 col-md-4 mb-3">
                                        <div class="card" style="text-align: center;">
                                            <img src="<?php echo base_url('./public/img/maquina/') . $trabajo['maquina']['img'] ?>" alt="Machine 1"
                                                class="rounded-3" style="object-fit: cover; width: 100%; height: 100%;">
                                            <div class="card-body">
                                                <h5 class="card-title"><strong>Maquina:</strong><?= $trabajo['maquina']['tipo_maquina']; ?></h5>
                                                <p><strong>Estado:</strong><?= $trabajo['estado']; ?></p>
                                                <p class="card-title"><strong>Modelo:</strong><?= $trabajo['maquina']['modelo']; ?></p>
                                                <p class="card-title"><strong>Marca:</strong><?= $trabajo['maquina']['marca']; ?></p>

                                                <!-- Agregar un botón para realizar una acción (Ej. Marcar como completado) -->
                                                <a href="<?= base_url('trabajo/completar/'.$trabajo['id_trabajo']); ?>" class="btn btn-success">Completar Trabajo</a>
                                                <a href="<?= base_url('trabajo/completar/'.$trabajo['id_trabajo']); ?>" class="btn btn-danger">Cancelar Trabajo</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-muted">No tienes trabajos asignados.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <button type="button" class="btn btn-success me-2 mt-2">Historial</button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $this->endSection(); ?>
