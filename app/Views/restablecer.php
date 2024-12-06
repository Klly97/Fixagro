<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="d-flex justify-content-center align-items-center" style="background-image: url('<?php echo base_url('/public/img/seleccionInc.jpg'); ?>'); background-position: center;">
    <div class="container vh-100 mt-5">
        <div class="row">
            <div class="col-my-3 p-4 h-100 px-md-5">
                <form class="vh-90 px-md-5" id="form_restablecer" method="post" action="#">
                    <div class="column mb-3">
                        <div class="col">
                            <label for="email" class="form-label text-light">Correo electrónico</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="col">
                            <label for="new_password" class="form-label text-light">Nueva contraseña</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                        </div>
                        <div class="col">
                            <label for="confirm_new_password" class="form-label text-light">Confirmar nueva contraseña</label>
                            <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password">
                        </div>
                    </div>
                    <div class="row mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success text-light btn-lg m-3">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <script>
        document.getElementById('form_restablecer').addEventListener('submit', function (e) {
            const email = document.getElementById('email').value.trim();
            const newPassword = document.getElementById('new_password').value.trim();
            const confirmPassword = document.getElementById('confirm_new_password').value.trim();

            let errors = [];

            // Validar email
            if (!email) {
                errors.push("El correo electrónico es obligatorio.");
            } else if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(email)) {
                errors.push("El correo electrónico no es válido.");
            }

            // Validar nueva contraseña
            if (!newPassword) {
                errors.push("La nueva contraseña es obligatoria.");
            } else if (newPassword.length < 6) {
                errors.push("La nueva contraseña debe tener al menos 6 caracteres.");
            }

            // Validar confirmación de contraseña
            if (newPassword !== confirmPassword) {
                errors.push("Las contraseñas no coinciden.");
            }

            // Si hay errores, mostrar con Swal.fire
            if (errors.length > 0) {
                e.preventDefault(); // Evitar el envío del formulario
                Swal.fire({
                    icon: 'error',
                    title: '¡Oops!',
                    text: errors.join("\n"),
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    </script>
</body>

</html>


<script>
    $(document).ready(iniciar);

    function iniciar() {
        Swal.fire({
            icon: 'Success',
            title: 'Se Restablecio su contraeña con exito',
        });
        $("#form_restablecer").submit(restablecer);
    }

    </script>