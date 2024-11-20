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
                        <button type="button" class="btn btn-success me-2 mt-2">Historial</button>
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
            </div>
        </div>
</section>

<?php echo $this->endSection(); ?>