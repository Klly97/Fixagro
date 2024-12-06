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
                        <strong class="ms-2"><?php echo session('nombre') ?></strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a href="<?php echo base_url('perfil') ?>" class="dropdown-item">Perfil</a></li>
                        <li><a href="<?php echo base_url('cerrar_sesion'); ?>" class="dropdown-item">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->