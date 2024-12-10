<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixagro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- ignoren este script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="shortcut icon" href="<?php echo base_url('public/img/logo.png'); ?>" />


</head>

<body>

    <!-- Mostrar mensajes de error o éxito -->
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>


    <!-- Formulario de Actualización de Persona -->

    <form action="/fixagro/actualizar_persona" method="post" class="p-4 border rounded bg-light mt-4"
        style="width: 50%; margin: auto;" id="formActualizarPersona">
        <input type="hidden" name="id" value="<?= $persona['id'] ?>">
        <div class="d-flex justify-content-center">
            <img src="<?php echo base_url('public/img/avatar.png'); ?>" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
        </div>
        <h5 class="my-2 d-flex justify-content-center"><?php echo session('nombre') . ' ' . session('apellido') ?></h5>
        <h1 style="text-align: center; margin-bottom: 1rem; margin:2;">Editar Persona</h1>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?= $persona['nombre'] ?>" pattern="^[a-zA-Z0-9]{3,10}$" title="El nombre debe tener minimo 3 caracteres " required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" id="apellido" name="apellido" class="form-control" value="<?= $persona['apellido'] ?>"
                pattern="^[a-zA-Z0-9]{3,10}$" title="El apellido debe tener minimo 3 caracteres " required>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" id="direccion" name="direccion" class="form-control" value="<?= $persona['direccion'] ?>"
                pattern="^.{7,15}$" title="La dirección debe tener entre 7 y 15 caracteres" required>
        </div>

        <div class="mb-3">
            <label for="municipio" class="form-label">Municipio:</label>
            <input type="text" id="municipio" name="municipio" class="form-control" value="<?= $persona['municipio'] ?>"
                required>
        </div>

        <div class="mb-3">
            <label for="departamento" class="form-label">Departamento:</label>
            <input type="text" id="departamento" name="departamento" class="form-control"
                value="<?= $persona['departamento'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" class="form-control" value="<?= $persona['telefono'] ?>"
                pattern="^\d{7,15}$" title="El teléfono debe tener entre 7 y 15 dígitos" required>
        </div>

        <button type="submit" class="btn btn-primary ">Guardar Cambios</button>
    </form>

    <!-- Botón para Mostrar Formulario de Cambio de Contraseña -->
    <button id="mostrarFormulario" class="btn btn-secondary mt-3" style="display: block; margin: 0 auto;">Cambiar
        contraseña</button>

    <!-- Formulario de Cambio de Contraseña -->
    <form action="/fixagro/perfil/cambiarContrasena" method="post" id="formularioEscondido"
        class="p-4 border rounded bg-light mt-3" style="display: none; width: 50%; margin: auto;">
        <div class="mb-3">
            <label for="old_password" class="form-label">Contraseña actual:</label>
            <input type="password" id="old_password" name="old_password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label">Nueva contraseña:</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Actualizar Contraseña</button>
            <button id="cancelarCambio" type="button" class="btn btn-outline-danger">Cancelar</button>
        </div>
    </form>

    <!-- Formulario de Eliminación de Persona -->
    <form method="post" action="/fixagro/perfil/eliminarPersona" class="mt-3" id="formularioEliminar">
        <input type="hidden" name="id" value="<?= $persona['id']; ?>">
        <button type="button" class="btn btn-danger" style="display: block; margin: 0 auto;" id="btnEliminar">Eliminar
            Persona</button>
    </form>


    <script>
        const newPasswordInput = document.getElementById('new_password');
        const mostrarFormulario = document.getElementById('mostrarFormulario');
        const formulario = document.getElementById('formularioEscondido');
        const cancelarCambio = document.getElementById('cancelarCambio');

        mostrarFormulario.addEventListener('click', () => {
            formulario.style.display = 'block'; //mostrar formulario
            mostrarFormulario.style.display = 'none'; //ocultar boton cambiar contra
            cancelarCambio.style.display = 'inline-block'; //mostrar boton cancelar
        });

        cancelarCambio.addEventListener('click', () => {
            formulario.style.display = 'none';
            mostrarFormulario.style.display = 'block';
            cancelarCambio.style.display = 'none';
        })




        //validacion contraseña
        const form = document.getElementById('formularioEscondido');

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Detener el envío predeterminado del formulario

            const oldPassword = document.getElementById('old_password').value.trim();
            const newPassword = document.getElementById('new_password').value.trim();

            // Validar si los campos están vacíos
            if (!oldPassword || !newPassword) {
                Swal.fire({
                    title: 'Error',
                    text: 'Por favor, completa todos los campos.',
                    icon: 'warning',
                    confirmButtonText: 'Aceptar'
                });
                return;
            }

            // Validar si la nueva contraseña tiene entre 4 y 8 caracteres
            if (newPassword.length < 4 || newPassword.length > 8) {
                Swal.fire({
                    title: 'Error',
                    text: 'La nueva contraseña debe tener entre 4 y 8 caracteres.',
                    icon: 'error',
                    confirmButtonText: 'Reintentar'
                });
                return;
            }

            // Si los campos no están vacíos, enviar al servidor
            const formData = new FormData(form);

            fetch('/fixagro/perfil/cambiarContrasena', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json()) // Suponiendo que el servidor devuelve JSON
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: '¡Éxito!',
                            text: 'Contraseña actualizada correctamente.',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        }).then(() => {
                            window.location.href = '/fixagro/login'; // Redirigir al login después del éxito
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: data.message || 'La contraseña actual es incorrecta.',
                            icon: 'error',
                            confirmButtonText: 'Reintentar'
                        });
                    }
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error del servidor',
                        text: 'Hubo un problema al procesar tu solicitud.',
                        icon: 'error',
                        confirmButtonText: 'Reintentar'
                    });
                    console.error('Error:', error);
                });
        });

        //validacion boton eliminar
        const btnEliminar = document.getElementById('btnEliminar');
        const formularioEliminar = document.getElementById('formularioEliminar');

        btnEliminar.addEventListener('click', () => {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    formularioEliminar.submit(); // Envía el formulario
                }
            });
        });
    </script>
</body>

</html>