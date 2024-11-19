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
                        <p class="lead fw-normal mb-0">Mis Maquinas</p>
                        <button type="button" class="btn btn-success me-2 mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar maquinas</button>
                    </div>

                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-sm-6 col-lg-4">
                                <img src="https://as2.ftcdn.net/v2/jpg/00/11/29/91/1000_F_11299152_oVSLsiERbDYhUhGGBC1z5Ie7IQG3tamX.jpg" alt="Machine 1"
                                    class="w-100 rounded-3">
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <img src="https://as2.ftcdn.net/v2/jpg/00/24/81/65/1000_F_24816515_dvQ5UWkctahKKGprqWxbwl8oY87vHogl.jpg" alt="Machine 2"
                                    class="w-100 rounded-3">
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <img src="https://as2.ftcdn.net/v2/jpg/00/11/29/91/1000_F_11299152_oVSLsiERbDYhUhGGBC1z5Ie7IQG3tamX.jpg" alt="Machine 1"
                                    class="w-100 rounded-3">
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <img src="https://as2.ftcdn.net/v2/jpg/00/24/81/65/1000_F_24816515_dvQ5UWkctahKKGprqWxbwl8oY87vHogl.jpg" alt="Machine 2"
                                    class="w-100 rounded-3">
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <img src="https://as2.ftcdn.net/v2/jpg/00/11/29/91/1000_F_11299152_oVSLsiERbDYhUhGGBC1z5Ie7IQG3tamX.jpg" alt="Machine 1"
                                    class="w-100 rounded-3">
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <img src="https://as2.ftcdn.net/v2/jpg/00/24/81/65/1000_F_24816515_dvQ5UWkctahKKGprqWxbwl8oY87vHogl.jpg" alt="Machine 2"
                                    class="w-100 rounded-3">
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <img src="https://as2.ftcdn.net/v2/jpg/00/11/29/91/1000_F_11299152_oVSLsiERbDYhUhGGBC1z5Ie7IQG3tamX.jpg" alt="Machine 1"
                                    class="w-100 rounded-3">
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <img src="https://as2.ftcdn.net/v2/jpg/00/24/81/65/1000_F_24816515_dvQ5UWkctahKKGprqWxbwl8oY87vHogl.jpg" alt="Machine 2"
                                    class="w-100 rounded-3">
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <img src="https://as2.ftcdn.net/v2/jpg/00/11/29/91/1000_F_11299152_oVSLsiERbDYhUhGGBC1z5Ie7IQG3tamX.jpg" alt="Machine 1"
                                    class="w-100 rounded-3">
                            </div>
                            <!-- Add more images as needed -->
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Maquinas</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body container mt-3">
                                <!-- Formulario de Entrada -->
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-text">Tipo de máquina:</span>
                                            <input type="text" class="form-control text-capitalize" placeholder="Especificar tipo">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-text">Modelo:</span>
                                            <input type="text" class="form-control text-capitalize" placeholder="Especificar modelo">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-text">Marca:</span>
                                            <input type="text" class="form-control text-capitalize" placeholder="Especificar marca">
                                        </div>
                                    </div>
                                </div>

                                <!-- Área de carga de archivos -->
                                <div class="upload-area mt-3 flex-column d-flex justify-content-center" style="height: 100%; width:100%">
                          
                                <div class="d-flex justify-content-center" style="height: 100%; width:100%">
                                        <div class="d-flex justify-content-center">
                                        <i class="bi bi-images"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center" style="height: 100%; width:100%">
                                        <div class="d-flex justify-content-center">
                                            <input type="file" class="form-control form-control-sm mb-0 me-2 " id="customFile" style="max-width: 450px; font-size: 0.8rem;">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
</section>

<?php echo $this->endSection(); ?>