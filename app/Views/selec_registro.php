<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="d-flex justify-content-center align-items-center" style="background-image: url('<?php echo base_url('/public/img/seleccionInc.jpg'); ?>'); background-position: center;">
    <div class="container vh-100 w-100 row d-flex justify-content-center align-items-center">
        <div class="vh-100 w-100 row d-flex justify-content-center align-items-center" >
            <div class="col-md-12 h-100 w-60 text-center"  style="width: 60%;">
                <!-- Logo -->
                <img src="<?php echo base_url('/public/img/logo.png'); ?>" alt="Logo" class="img-fluid rounded-circle mb-1">
                
                <!-- Texto debajo del logo -
                <h4 style="letter-spacing: 1px; color:#ffffff;">Registrarse</h4>
                <!-- Botones principales -->
                <div class="d-flex justify-content-center mt-3">
                    <a href="<?php echo base_url('registro/cliente') ?>" class="text-dark btn btn-success border border-success border-2 mx-2 btn-lg" style="background-color: #ffffff; width: 50%;">Clientes</a>
                    <a href="<?php echo base_url('registro/tecnico') ?>" class="text-dark btn btn-success border border-success border-2 mx-2 btn-lg" style="background-color: #ffffff; width: 50%;">Técnicos</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
