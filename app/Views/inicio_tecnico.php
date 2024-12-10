<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>


<style>
    .profile-sidebar {
        background: #f8f9fa;
        border-right: 1px solid #ddd;
        min-height: 100vh;
    }

    .profile-sidebar .profile-info {
        text-align: center;
        padding: 20px;
    }

    .profile-sidebar .profile-info img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
    }

    .suggestions,
    .top-jobs {
        background: #ffffff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .post-container {
        background: #ffffff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .post-container .tags span {
        margin-right: 10px;
        font-size: 12px;
        padding: 5px 10px;
        background: #e9ecef;
        border-radius: 20px;
        display: inline-block;
    }

    .top-profiles .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
</style>

<section class="mt-3 mb-3">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <!-- Sidebar -->
            <div class="col-md-3 profile-sidebar">
                <div class="profile-info">
                    <img src="https://via.placeholder.com/100" alt="User Profile Picture">
                    <h5 class="my-2"><?php echo session('nombre') . ' ' . session('apellido') ?></h5>
                    <div class="rating mb-1">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="far fa-star text-warning"></i>
                            <i class="far fa-star text-warning"></i>
                        </div>
                    <div class="mt-3">
                    <p class="text-muted mb-0">Ubicación</p>
                    <p class="text-muted mb-4"><?php echo session('municipio') . ', ' . session('departamento') ?></p>
                        <a href="#" class="btn btn-primary btn-sm">Mis Trabajos</a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-5">
                <!-- Aca se iteran las publicaciones -->
                <?php foreach ($publicaciones as $publicacion): ?>
                    <div class="post-container">
                        <div class="card">
                            <div class="card-body">
                                <!-- Data -->
                                <div class="d-flex mb-3">
                                    <a href="">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrODtSNaRcRlFgK_vW9k3sgYhtHnyzDhtang&s" class="border rounded-circle me-2"
                                            alt="Avatar" style="height: 40px" />                                    </a>
                                    <div>
                                        <a href="" class="text-dark mb-0">
                                            <strong><?php echo $publicacion['nombre_persona']; ?></strong>
                                        </a>
                                        <a href="" class="text-muted d-block" style="margin-top: -6px">
                                            <small><?php
                                                    date_default_timezone_set('America/Bogota');

                                                    $fecha1 = new DateTime();
                                                    $fecha2 = new DateTime($publicacion['fecha_creacion']); //fecha de cierre

                                                    $intervalo = $fecha1->diff($fecha2);

                                                    $minutos = $intervalo->format('%i');
                                                    $segundos = $intervalo->format('%s');
                                                    $horas = $intervalo->format('%H');
                                                    $dias = $intervalo->format('%d');
                                                    $meses = $intervalo->format('%m');
                                                    $anios = $intervalo->format('%Y');

                                                    if ($anios > 0) {
                                                        echo "Hace " . $intervalo->format('%i año');
                                                    } elseif ($meses > 0) {
                                                        if ($meses == 1) {
                                                            echo "Hace " . $intervalo->format('%m mes');
                                                        } else {
                                                            echo "Hace " . $intervalo->format('%m meses');
                                                        }
                                                    } elseif ($dias < 31 &&  $dias != 0) {
                                                        if ($dias == 1) {
                                                            echo "Hace " . $intervalo->format('%d dia');
                                                        } else {
                                                            echo "Hace " . $intervalo->format('%d dias');
                                                        }
                                                    } else {
                                                        if ($minutos < 1 && $horas < 1 && $dias < 1) {
                                                            echo "Hace un momento";
                                                        } elseif ($horas < 1 && $dias < 1) {
                                                            if ($minutos == 1) {
                                                                echo "Hace " . $intervalo->format('%i minuto');
                                                            } else {
                                                                echo "Hace " . $intervalo->format('%i minutos');
                                                            }
                                                        } elseif ($dias < 1) {
                                                            if ($horas == 1) {
                                                                echo "Hace " . $intervalo->format('%H hora');
                                                            } else {
                                                                echo "Hace " . $intervalo->format('%H horas');
                                                            }
                                                        }
                                                    }
                                                    // echo $intervalo->format('%Y años %m meses %d days %H horas %i minutos %s segundos'); //00 años 0 meses 0 días 08 horas 0 minutos 0 segundos 
                                                    ?></small>
                                        </a>
                                    </div>
                                </div>
                                <!-- Description -->
                                <div>
                                    <p>
                                        <?php echo $publicacion['descripcion']; ?>
                                    </p>
                                </div>
                            </div>
                            <!-- Media -->
                            <div class="bg-image hover-overlay ripple rounded-0 d-flex justify-content-center pe-2 ps-2" data-mdb-ripple-color="light">
                                <img src="<?php echo base_url('./public/img/maquina/') . $publicacion['img'] ?>" width="400" height="350" class="w-100" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                </a>
                            </div>
                            <!-- Media -->
                            <!-- Interactions -->
                            <div class="card-body">

                                <!-- Buttons -->
                                <div class="d-flex justify-content-between text-center border-top border-bottom mb-4">
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-lg" data-mdb-ripple-color="dark">
                                        <i class="fas fa-share me-2"></i>Enviar Oferta
                                    </button>
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-lg" data-mdb-ripple-color="dark">
                                        <i class="fas fa-thumbs-up me-2"></i>Enviar Mensaje
                                    </button>
                                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-lg" data-mdb-ripple-color="dark">
                                        <i class="fas fa-comment-alt me-2"></i>Guardar
                                    </button>

                                </div>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>

<?php echo $this->endSection(); ?>