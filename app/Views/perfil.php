<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- ignoren este script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


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
        <h1 style="text-align: center; margin-bottom: 1rem;">Editar Persona</h1>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="<?= $persona['nombre'] ?>"
                required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>
            <input type="text" id="apellido" name="apellido" class="form-control" value="<?= $persona['apellido'] ?>"
                required>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" id="direccion" name="direccion" class="form-control"
                value="<?= $persona['direccion'] ?>">
        </div>

        <div class="mb-3">
            <label for="municipio" class="form-label">Municipio:</label>
            <input type="text" id="municipio" name="municipio" class="form-control"
                value="<?= $persona['municipio'] ?>">
        </div>

        <div class="mb-3">
            <label for="departamento" class="form-label">Departamento:</label>
            <input type="text" id="departamento" name="departamento" class="form-control"
                value="<?= $persona['departamento'] ?>">
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" class="form-control" value="<?= $persona['telefono'] ?>">
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

        document.getElementById('formActualizarPersona').addEventListener('submit', function (e) {
            const inputs = document.querySelectorAll('#formActualizarPersona input');
            let formValid = true;

            inputs.forEach(input => {
                if (input.value.trim() === '') {
                    alert(`El campo "${input.previousElementSibling.textContent}" no puede estar vacío.`);
                    formValid = false;
                    input.focus();
                    e.preventDefault();
                    return false; // Detener la iteración
                }
            });



            return formValid;
        });
        document.getElementById('formularioEscondido').addEventListener('submit', function (e) {
            const inputs = document.querySelectorAll('#formularioEscondido input');
            let formValid = true;

            inputs.forEach(input => {
                if (input.value.trim() === '') {
                    alert(`El campo "${input.previousElementSibling.textContent}" no puede estar vacío.`);
                    formValid = false;
                    input.focus();
                    e.preventDefault();
                    return false; // Detener la iteración
                }
            });



            return formValid;
        });


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