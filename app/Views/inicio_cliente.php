<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>

<!-- Sección del perfil -->
<section style="background-color: #e7e4e4;">
    <div class="container">
        <div class="row py-5">
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

            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Mis máquinas</h3>
                    <a href="<?= site_url('ofertas/crear') ?>" class="btn btn-primary btn-sm">Agregar máquina</a>
                </div>
                <div class="row g-3">
                    <?php if (!empty($ofertas) && is_array($ofertas)): ?>
                        <?php foreach ($ofertas as $oferta): ?>
                            <div class="col-md-6">
                                <div class="card h-100 shadow-lg" style="background-color: white; border: 1px solid #ddd; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
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
                                    <div class="card-footer d-flex justify-content-center gap-2" style="background-color: white;">
                                        <a href="<?= site_url('ofertas/editar/' . $oferta['id']) ?>" class="btn btn-success btn-sm">Editar</a>
                                        <a href="<?= site_url('ofertas/eliminar/' . $oferta['id']) ?>" 
                                           class="btn btn-danger btn-sm" 
                                           onclick="return confirm('¿Estás seguro de que deseas eliminar esta oferta?')">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>¡No tienes máquinas disponibles!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<!-- Puedes agregar aquí scripts específicos -->
<?php echo $this->endSection(); ?>
