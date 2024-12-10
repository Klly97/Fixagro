<?php
$id_usuario = session('id');
if (!isset($id_usuario)) {
    header("Location: " . base_url('login'));
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fixagro</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('public/img/logo.png'); ?>" />

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url('/public/lib/lightbox/css/lightbox.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/public/lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url('/public/css/bootstrap.min.css'); ?>" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url('/public/css/style.css'); ?>" rel="stylesheet">
</head>

<body>
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-#ffffff bg-light">
        <div class="container-fluid">
            <!-- Brand / Logo -->
            <a class="navbar-brand d-flex align-items-center col-lg-3" href="#">
                <div id="video-container" class="w-100" style="height: 7vh;">
                    <video autoplay loop muted style="width: 100%; height: 100%;">
                        <source src="<?php echo base_url('public/img/fixLogo.mp4'); ?>">
                    </video>
                </div>
            </a>

            <!-- Toggler button for mobile view -->
            <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar content wrapper for collapse functionality on smaller screens -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Centered Search form for desktop, full width on mobile -->
                <form class="d-flex col-12 col-lg-6 mx-lg-auto my-2 my-lg-0">
                    <input type="search" class="form-control rounded" placeholder="Busqueda de tecnicos" aria-label="Search" style="min-width: 125px;">
                    <button class="btn btn-outline-primary ms-2 rounded-circle" data-bs-toggle="modal" data-bs-target="#searchModal" type="button">
                        <i class="fas fa-search text-primary"></i>
                    </button>
                </form>

                <!-- Right-side elements: Links and Profile -->
                <ul class="navbar-nav ms-lg-auto align-items-center">
                    <li class="nav-item me-3">
                        <a class="nav-link" href="#">
                            <span><i class="fas fa-home fa-2x"></i></span>
                        </a>
                    </li>
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link position-relative" href="#" id="commentsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-comments fa-2x"></i>
                            <span class="position-absolute top-0 start-70 translate-middle badge rounded-pill bg-danger">6</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown me-3">
                        <a class="nav-link position-relative" href="#" id="notificationsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell fa-2x"></i>
                            <span class="position-absolute top-0 start-70 translate-middle badge rounded-pill bg-danger">12</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://as1.ftcdn.net/v2/jpg/09/65/01/78/1000_F_965017857_17LYzOToXwVcwZXXpqRrVjDZRQBKxcQw.jpg" class="rounded-circle" height="40" alt="Avatar">
                            <strong class="ms-2"><?php echo session('nombre')?></strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a href="cart.html" class="dropdown-item">Perfil</a></li>
                            <li><a href="<?php echo base_url('cerrar_sesion'); ?>" class="dropdown-item">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->


    <!-- Profile Section -->
    <section style="background-color: #e7e4e4;">
        <div class="container">
            <div class="row py-5">
                <div class="col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="https://as1.ftcdn.net/v2/jpg/09/65/01/78/1000_F_965017857_17LYzOToXwVcwZXXpqRrVjDZRQBKxcQw.jpg" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3"><?php echo session('nombre') .' '. session('apellido')?></h5>
                            <p class="text-muted mb-1">Ubicación</p>
                            <p class="text-muted mb-4"><?php echo session('municipio') .', '. session('departamento')?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <p class="lead fw-normal mb-0">Mis Maquinas</p>
                            <a class="btn btn-success" data-bs-toggle="pill" href="<?php echo base_url('agregarMaquinas')?>">Agregar Maquinas</a>
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
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white-50 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h1 class="text-primary">Fixagro</h1>
                    <p>Maquinas listas, Cosechas seguras</p>
                </div>
                <div class="col-lg-4">
                    <form class="input-group">
                        <input type="email" class="form-control" placeholder="Your Email">
                        <button class="btn btn-primary">Subscribe</button>
                    </form>
                </div>
                <div class="col-lg-4 text-center text-lg-center pt-4">
                    <a class="btn btn-outline-secondary rounded-circle" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-secondary rounded-circle" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-secondary rounded-circle" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-secondary rounded-circle" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="text-center text-white py-4">
            &copy; 2024 Your Site Name. All rights reserved. Designed by <a href="https://htmlcodex.com" class="text-light">HTML Codex</a>.
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="btn btn-primary border-3 rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('/public/js/main.js'); ?>"></script>
</body>


</html>