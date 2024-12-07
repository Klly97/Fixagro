<?php echo $this->extend('plantilla/layout'); ?>
<?php echo $this->section('contenido'); ?>

<!-- Sección del Perfil -->
<div class="py-4 container bg-white rounded my-3 shadow" style="min-height: 650px;">
    <div class="row g-4">

        <?php foreach ($maquina as $maquina): ?>
            <!-- Columna izquierda: Imagen y botón -->
            <div class="col-md-6 text-center py-5">
                <img src="<?php echo base_url('./public/img/maquina/') . $maquina['img'] ?>" alt="Machine 1"
                    class="rounded-3" width="500" height="400">

                <div class="d-flex justify-content-center mt-3 py-4">
                    <button type="button" class="btn btn-success px-4 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Crear Publicación
                    </button>
                </div>
            </div>

            <!-- Columna derecha: Detalles y Publicaciones -->
            <div class="col-md-6 py-5">
                <!-- Detalles de la máquina -->
                <div class="row">
                    <!-- Primera columna: Detalles de la máquina -->
                    <div class="col-md-6">
                        <div class="mb-4">
                            <p class="mb-2"><strong>Tipo de Máquina:</strong> <?php echo $maquina['tipo_maquina']; ?></p>
                            <p class="mb-2"><strong>Modelo:</strong> <?php echo $maquina['modelo']; ?></p>
                            <p class="mb-4"><strong>Marca:</strong> <?php echo $maquina['marca']; ?></p>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> ¿Deseas eliminar máquina?
                            </button>
                        </div>
                    </div>

                    <!-- Segunda columna: Botones adicionales -->
                    <div class="col-md-6">
                        <div class="d-flex gap-2 mb-3">
                            <button class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Editar
                            </button>
                        </div>
                        <div class="d-flex gap-2">
                            <a class="btn btn-success" href="<?php echo base_url('historial'); ?>">
                                Historial
                            </a>
                        </div>
                    </div>
                </div>


                <!-- Publicación en curso -->
                <div class="card shadow-sm p-3 mt-4">
                    <h5 class="mb-3">Publicación en curso</h5>
                    <div class="d-flex align-items-center">
                    <img src="<?php echo base_url('./public/img/maquina/') . $maquina['img'] ?>" alt="Machine 1"
                    class="rounded-3" width="150" height="150">
                        <div class="mx-auto t-auto">
                            <p class="mb-2"><strong>Tipo de Máquina:</strong> <?php echo $maquina['tipo_maquina']; ?></p>
                            <p class="mb-2"><strong>Modelo:</strong> <?php echo $maquina['modelo']; ?></p>
                            <p class="mb-4"><strong>Marca:</strong> <?php echo $maquina['marca']; ?></p>
                        </div>
                        <div class="ms-auto">
                            <textarea class="form-control mb-2" rows="2" readonly>Se dañó el motor</textarea>
                            <div class="d-flex gap-2">
                                <button class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
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

                        <!-- Ajusta el layout con clases Bootstrap -->
                        <div class="d-flex align-items-center p-4">
                        <img src="<?php echo base_url('./public/img/maquina/') . $maquina['img'] ?>" alt="Machine 1"
                        class="rounded-3" width="150" height="150">
                            <div class="ms-3">
                                <p class="mb-2"><strong>Tipo de Máquina:</strong> <?php echo $maquina['tipo_maquina']; ?></p>
                                <p class="mb-2"><strong>Modelo:</strong> <?php echo $maquina['modelo']; ?></p>
                                <p class="mb-4"><strong>Marca:</strong> <?php echo $maquina['marca']; ?></p>
                            </div>
                        </div>

                        <!-- Reducir el modal-body -->
                        <div class="modal-body py-2 px-3">
                            <form>
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
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