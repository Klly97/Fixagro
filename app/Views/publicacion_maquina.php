<?php echo $this->extend('plantilla/layout'); ?>
<?php echo $this->section('contenido'); ?>

<!-- Sección del Perfil -->
<div class="py-4 container bg-white rounded my-3 shadow" style="min-height: 650px;">
    <div class="row g-5"> <!-- Espaciado adecuado entre columnas -->
        <?php foreach ($maquina as $maquina): ?>
            <!-- Primera columna: Imagen y Detalles -->
            <div class="col-md-6 d-flex flex-column align-items-center py-3">
                <!-- Imagen de la máquina -->
                <img src="<?php echo base_url('./public/img/maquina/') . $maquina['img'] ?>" alt="Machine 1"
                    class="rounded-3 mb-4" width="400" height="300">

                <!-- Detalles y acciones -->
                <div class="w-100">
                    <div class="text-start mb-3">
                        <p class="mb-2"><strong>Tipo de Máquina:</strong> <?php echo $maquina['tipo_maquina']; ?></p>
                        <p class="mb-2"><strong>Modelo:</strong> <?php echo $maquina['modelo']; ?></p>
                        <p class="mb-4"><strong>Marca:</strong> <?php echo $maquina['marca']; ?></p>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> ¿Deseas eliminar máquina?
                        </button>
                    </div>
                </div>
            </div>

            <!-- Segunda columna: Publicaciones y Modal -->
            <div class="col-md-6">
                <!-- Botón para crear publicación -->
                <div class="d-flex justify-content-center mb-4">
                    <button type="button" class="btn btn-success px-4 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Crear Publicación
                    </button>
                    <!-- Botón duvan -->
                    <a href="<?= site_url('ofertas/crear') ?>" class="btn btn-primary btn-sm">Crear Publicacion 2</a>
                    <!-- boton duvan -->
                </div>

                <!-- Publicación en curso -->
                <div class="card h-100 shadow-lg mb-4 row g-3">
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
                        <p>¡No tienes publicaciones Disponibles!</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitud de Servicio</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="d-flex align-items-center p-4">
                            <img src="<?php echo base_url('./public/img/maquina/') . $maquina['img'] ?>" alt="Machine 1"
                                class="rounded-3" width="150" height="150">
                            <div class="ms-3">
                                <p class="mb-2"><strong>Tipo de Máquina:</strong> <?php echo $maquina['tipo_maquina']; ?></p>
                                <p class="mb-2"><strong>Modelo:</strong> <?php echo $maquina['modelo']; ?></p>
                                <p class="mb-4"><strong>Marca:</strong> <?php echo $maquina['marca']; ?></p>
                            </div>
                        </div>

                        <div class="modal-body py-2 px-3">
                            <form>
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
                                        placeholder="¿Deseas publicar una solicitud de servicio?"></textarea>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Publicar</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php echo $this->endSection(); ?>