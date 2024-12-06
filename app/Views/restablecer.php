<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center" style="background-image: url('<?php echo base_url('/public/img/seleccionInc.jpg'); ?>'); background-position: center;">
    <div class="container vh-100 mt-5">
        <div class="row">
            <div class="col-my-3 p-4 h-100   px-md-5">
                <form class="vh-90 px-md-5" id="form_restablecer" method="post" action="#">
                    <div class="colunm mb-3">
                        <div class="col">
                            <label for="nombre" class="form-label text-light">Correo electrónico</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>      
                        <div class="col">
                            <label for="nombre" class="form-label text-light">Nueva contraseña</label>
                            <input type="text" class="form-control" id="new_password" name="new_password">
                        </div>
                        <div class="col">
                            <label for="apellido" class="form-label text-light">Confirmar nueva contraseña</label>
                            <input type="text" class="form-control" id="confirm_new_password" name="confirm_new_password">
                        </div>
                    </div>
                    <div class="row mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success text-light btn-lg m-3 ">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(iniciar);

    function iniciar() {
        
        $("#form_restablecer").submit(restablecer);
    }

    </script>