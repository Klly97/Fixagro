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
                <form class="vh-90 px-md-5" id="form_guardar" method="post" action="#">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nombre" class="form-label text-light">Nombre</label>
                            <input type="text" class="form-control text-capitalize" id="nombre" placeholder="Nombre" name="nombre">
                        </div>
                        <div class="col">
                            <label for="apellido" class="form-label text-light">Apellido</label>
                            <input type="text" class="form-control text-capitalize" id="apellido" placeholder="Apellido" name="apellido">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="telefono" class="form-label text-light">Teléfono</label>
                            <input type="text" class="form-control text-capitalize" id="telefono" placeholder="Teléfono" name="telefono">
                        </div>
                        <div class="col">
                            <label for="correo" class="form-label text-light">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" placeholder="Correo Electrónico" name="correo">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="departamento" class="form-label text-light">Departamento</label>
                            <input type="text" class="form-control text-capitalize" id="departamento" placeholder="Departamento" name="departamento">
                        </div>
                        <div class="col">
                            <label for="municipio" class="form-label text-light">Municipio</label>
                            <input type="text" class="form-control text-capitalize" id="municipio" placeholder="Municipio" name="municipio">
                        </div>
                    </div>
                    <?php if ($opcion == "cliente") { ?>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="direccion" class="form-label text-light">Dirección</label>
                                <input type="text" class="form-control text-capitalize" id="direccion" placeholder="Dirección" name="direccion">
                            </div>
                            <div class="col">
                                <label for="contrasena" class="form-label text-light">Contraseña</label>
                                <input type="password" class="form-control text-capitalize" id="contrasena" placeholder="Contraseña" name="contrasena">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="confirmar-contrasena" class="form-label text-light">Confirmar Contraseña</label>
                                <input type="password" class="form-control text-capitalize" id="confirmar-contrasena-confirma" placeholder="Confirmar Contraseña">
                            </div>
                        </div>
                    <?php }; ?>

                    <?php if ($opcion == "tecnico") { ?>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="contrasena" class="form-label text-light">¿Cuentas con Taller Fisico?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="marcaTallerFisico" placeholder="Taller Fisico" name="tmarcaTallerFisicoallerFisico">
                                </div>
                            </div>
                            <div class="col">
                                <label for="confirmar-contrasena" class="form-label text-light">Dirección del Taller</label>
                                <input type="text" class="form-control text-capitalize" id="direccion_taller" placeholder="Ingresa dirección" name="direccion">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="contrasena" class="form-label text-light">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" placeholder="Contraseña" name="contrasena">
                            </div>
                            <div class="col-6">
                                <label for="confirmar-contrasena" class="form-label text-light">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="confirmar-contrasena" placeholder="Confirmar Contraseña" name="confirmar-contrasena">
                            </div>
                        </div>
                    <?php }; ?>
                    <div class="row mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success text-light btn-lg m-3 " style="width: 45%;">Registrarse</button>
                    </div>
                    <input type="hidden" class="form-control" id="tipo_persona" value="<?php echo $opcion ;?>" name="tipo_persona">
                </form>
                <div class="text-center mt-5">
                    <a class="text-light h5" href="#">¿Ya tienes una cuenta?</a> | <a class="text-light h5" href="<?php echo base_url('/login'); ?>">Inicia Sesión</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(iniciar);

        function iniciar() {

            $("#form_guardar").submit(formRegistrar);
        }

        function formRegistrar(e) {
            e.preventDefault();
            guardar_datos();
        }

        function guardar_datos() {

            let formulario = $("#form_guardar").serialize();

            $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('../crear_persona'); ?>',
                    data: formulario,
                })
                .done(function(data) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Exitoso!',
                        text: 'Los datos han sido registrados. RESPUESTA SERVIDOR =>' + data,
                        type: "success"
                    }).then(okay => {
                        if (okay) {
                            window.location.href = '<?php echo base_url('/login'); ?>'; 
                        }
                    });
                })
                .fail(function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ocurrio algo!',
                        text: 'Ha ocurrido un error en el servidor, no se pudo registrar la información.'
                    })
                    console.log(data);
                })
        }
    </script>
</body>

</html>