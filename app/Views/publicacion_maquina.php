<?php echo $this->extend('plantilla/layout'); ?>
<?php echo $this->section('contenido'); ?>

<!-- Sección del Perfil -->
<div class="py-4 container bg-white rounded my-3 shadow" style="min-height: 650px;">
    <div class="row g-5"> <!-- Espaciado adecuado entre columnas -->
        <?php foreach ($maquina as $maquina): ?>
            <!-- Primera columna: Imagen y Detalles -->
            <div class="col-md-7 d-flex flex-column align-items-center py-3">
                <div class="row w-100">
                    <!-- Columna 1: Imagen y botón de eliminar -->
                    <div class="col-md-6 d-flex flex-column align-items-center">
                        <div class="mx-2 w-100 d-flex justify-content-center">
                            <!-- Imagen de la máquina -->
                            <img src="<?php echo base_url('./public/img/maquina/') . $maquina['img'] ?>" alt="Machine 1" class="rounded-3 mb-4" width="400" height="350">
                        </div>

                        <!-- Botón de eliminar -->
                        <div class="w-100 d-flex justify-content-center">
                            <a class="btn btn-success btn-sm" href="<?php echo base_url('historial'); ?>">
                                <i class="bi bi-clock-history"></i> Historial
                            </a>

                        </div>
                    </div>

                    <!-- Columna 2: Detalles de la máquina y botones adicionales -->
                    <div class="col-md-5 d-flexalign-items-start justify-content-start">
                        <!-- Detalles de la máquina -->
                        <div class="text-center">
                            <p class="mb-1"><strong>Tipo de Máquina:</strong> <?php echo $maquina['tipo_maquina']; ?></p>
                            <p class="mb-1"><strong>Modelo:</strong> <?php echo $maquina['modelo']; ?></p>
                            <p class="mb-1"><strong>Marca:</strong> <?php echo $maquina['marca']; ?></p>
                        </div>

                        <!-- Botones adicionales -->
                        <div class="d-flex justify-content-center gap-2 py-3">
                            <button class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Editar
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> ¿Deseas eliminar máquina?
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Segunda columna: Publicaciones y Modal -->
            <div class="col-md-5 py-3">
                <!-- Publicación en curso -->
                <div class="card shadow-lg mb-4 row g-3 h-100">
                    <ul class="list-group list-group-light m-2 ">
                        <li class="list-group-item px-3 border-0 rounded-3 list-group-item mb-2">
                            <div class="row">
                                <div class="col-md-5">
                                    <strong>Descripción</strong>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-right">
                                        <strong>Fecha Creacion:</strong>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="float-right">
                                        <strong></strong>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php if (!empty($publicaciones) && is_array($publicaciones)): ?>
                            <?php foreach ($publicaciones as $publicacion): ?>
                                <li class="list-group-item px-3 border-0 rounded-3 list-group-item-secondary mb-2 gasto">
                                    <div class="" href="#"><b></b>
                                        <div class="row">
                                            <div class="col-md-5 text-bold">
                                                <input type="text" class="form-control form-control-sm form-control-plaintext"
                                                    style="background-color:transparent; border: 0;" disabled name="valNomGasto"
                                                    value="<?php echo $publicacion['descripcion'] ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <div class="float-right">
                                                    <?php echo $publicacion['fecha_creacion']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="float-right">
                                                    <!-- ?php echo number_format($gasto['imp_gasto'], 2, ',', '.'); ?> -->
                                                    <button class="btn-danger btn-sm btnEliminar" style="float:right"
                                                        data-id_gasto="<?php echo $publicacion['id_publicacion'] ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>

                                                    <button class="btn-success btn-sm me-1" style="float:right">
                                                        <i aria-atomic="" class="fa fa-edit"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="d-flex justify-content-center">
                                <small>No hay ninguna publicación.</small>
                            </div>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Botón para crear publicación -->
                <div class="d-flex justify-content-end mb-4">
                    <button type="button" class="btn btn-success px-4 py-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Crear Publicación
                    </button>
                </div>

            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form method="POST" action="<?php echo base_url("crear_publicacion") ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitud de Servicio</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <input type="text" hidden name="id_maquina" value="<?php echo $maquina['id_maquina']; ?>">
                            <div class="d-flex align-items-center p-4">
                                <img src="<?php echo base_url('./public/img/maquina/') . $maquina['img'] ?>" alt="Machine 1"
                                    class="rounded-3" width="150" height="150">

                                <div class="ms-3">
                                    <div class="row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Tipo Maquina:</label>
                                        <div class="col-sm-7">
                                            <input type="text" readonly class="form-control-plaintext" name="tipo_maquina" value="<?php echo $maquina['tipo_maquina']; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Modelo:</label>
                                        <div class="col-sm-7">
                                            <input type="text" readonly class="form-control-plaintext" name="modelo" value="<?php echo $maquina['modelo']; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Marca:</label>
                                        <div class="col-sm-7">
                                            <input type="text" readonly class="form-control-plaintext" name="marca" value="<?php echo $maquina['marca']; ?>">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="modal-body py-2 px-3">
                                <div class="form-group">
                                    <textarea class="form-control" id="descripcion" rows="4" name="descripcion"
                                        placeholder="¿Deseas publicar una solicitud de servicio?"></textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Publicar</button>
                            </div>
                        </div>
                    </div>
                    <form>

            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php echo $this->endSection(); ?>