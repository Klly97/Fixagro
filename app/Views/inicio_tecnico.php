<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>

<section style="background-color: #e7e4e4;">
    <div class="container">
        <div class="row py-5">
            <!-- Columna del perfil -->
            <div class="col-lg-4 mb-4">
                <div class="card text-center" style="background-color: white; border: 1px solid #ddd; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
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

            <!-- Columna de publicaciones -->
            <div class="col-lg-8">
                <!-- Publicaciones de tu zona -->
                <div class="mb-5">
                    <h3 class="mb-4">Publicaciones de tu zona</h3>
                    <div class="row g-3">
                        <?php if (!empty($ofertas_locales)): ?>
                            <?php foreach ($ofertas_locales as $oferta): ?>
                                <div class="col-md-6">
                                    <div class="card h-100 shadow-lg border-success">
                                        <div style="height: 200px; overflow: hidden;" class="d-flex align-items-center justify-content-center bg-light">
                                            <img src="<?= base_url('uploads/' . (file_exists(FCPATH . 'uploads/' . $oferta['imagen']) ? esc($oferta['imagen']) : 'default-placeholder.png')) ?>" 
                                                 class="img-fluid" 
                                                 alt="Imagen de la máquina" 
                                                 style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-uppercase text-success"><?= esc($oferta['tipo_maquina']) ?></h5>
                                            <p class="card-text mb-2">
                                                <strong>Modelo:</strong> <?= esc($oferta['modelo']) ?> |
                                                <strong>Marca:</strong> <?= esc($oferta['marca']) ?>
                                            </p>
                                            <p class="card-text"><?= esc($oferta['descripcion']) ?></p>
                                        </div>
                                        <div class="card-footer text-center bg-success text-white">
                                            <p>Ubicación: <?= esc($oferta['municipio']) ?>, <?= esc($oferta['departamento']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No hay publicaciones locales.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Otras publicaciones -->
                <div>
                    <h3 class="mb-4">Otras publicaciones</h3>
                    <div class="row g-3">
                        <?php if (!empty($ofertas_otros)): ?>
                            <?php foreach ($ofertas_otros as $oferta): ?>
                                <div class="col-md-6">
                                    <div class="card h-100 shadow-lg">
                                        <div style="height: 200px; overflow: hidden;" class="d-flex align-items-center justify-content-center bg-light">
                                            <img src="<?= base_url('uploads/' . (file_exists(FCPATH . 'uploads/' . $oferta['imagen']) ? esc($oferta['imagen']) : 'default-placeholder.png')) ?>" 
                                                 class="img-fluid" 
                                                 alt="Imagen de la máquina" 
                                                 style="max-height: 100%; max-width: 100%; object-fit: contain;">
                                        </div>
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-uppercase text-primary"><?= esc($oferta['tipo_maquina']) ?></h5>
                                            <p class="card-text mb-2">
                                                <strong>Modelo:</strong> <?= esc($oferta['modelo']) ?> |
                                                <strong>Marca:</strong> <?= esc($oferta['marca']) ?>
                                            </p>
                                            <p class="card-text"><?= esc($oferta['descripcion']) ?></p>
                                        </div>
                                        <div class="card-footer text-center bg-light text-muted">
                                            <p>Ubicación: <?= esc($oferta['municipio']) ?>, <?= esc($oferta['departamento']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No hay otras publicaciones.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $this->endSection(); ?>
