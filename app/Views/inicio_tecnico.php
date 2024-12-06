<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>

<section style="background-color: #e7e4e4;">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-4 mb-4">
                <div class="card text-center" style="height: 400px;">
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
                        <div  class="py-4">
                            <a class="btn btn-success" href="<?php echo base_url('servicio_mantenimiento') ?>">Mis trabajos</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4">


                    <div class="card-body">
                        <div class="row g-2">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo $this->endSection(); ?>