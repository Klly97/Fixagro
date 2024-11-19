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

<style>
    body {
        background-color: #e3e3e3;
    }

    .input-group-text {
        background-color: #e3e3e3;
        border: none;
    }

    .upload-area {
        background-color: #4A90E2;
        border: 2px dashed #FFFFFF;
        padding: 50px;
        text-align: center;
        color: #FFFFFF;
    }

    .upload-area i {
        font-size: 3rem;
    }

    .btn-save {
        background-color: #A2C619;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 15px;
        width: 15%;
    }

    .btn-save:hover {
        background-color: #8FB517;
    }

    .btnGuardar{
        display: flex;
        justify-content: end;
    }
</style>

<body class="d-flex flex-column min-vh-100">

<?php echo $this->include('plantilla/navbar');?>

<?php echo $this->renderSection("contenido");?>

 <!-- Footer -->
 <footer class="mt-auto bg-dark text-white-50 pt-4 ">
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