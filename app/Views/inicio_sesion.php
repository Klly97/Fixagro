<?php
$usuario = session('id');
if (isset($usuario)) {
    header("Location: " . base_url('inicio'));
    die();
}
?>
<!DOCTYPE html>
<html lang="es">

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

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url('/public/css/bootstrap.min.css'); ?>" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url('/public/css/style.css'); ?>" rel="stylesheet">
</head>

<body class="d-flex justify-content-center align-items-center" style="background-image: url('<?php echo base_url('/public/img/seleccionInc.jpg'); ?>'); background-position: center;">
    <section class="vh-100">
        <div class="h-100">
            <div class="row g-0 h-100">
                <div class="col-md-8 col-lg-7 d-flex justify-content-center align-items-center">
                    <img src="<?php echo base_url('/public/img/logo.png'); ?>"
                        alt="login form" class="img-fluid h-60" style="border-radius: 1rem 0 0 1rem;" />
                </div>
                <div class="col-md-4 col-lg-5 d-flex align-items-center justify-content-center">
                    <form class="w-100" id="form_login" method="post" action="#">
                        <h5 class="fw-normal pb-5 text-center" style="letter-spacing: 1px; color:#ffffff;">Inicio de Sesión</h5>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="correo" style="color:#ffffff;">Correo Electronico</label>
                            <input type="email" id="correo" class="form-control form-control-lg" name="correo" />
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4 pb-3 ">
                            <label class="form-label" style="color: #ffffff;" for="form2Example27">Contraseña</label>
                            <input type="password" id="contrasena" class="form-control form-control-lg" name="contrasena" />
                        </div>

                        <div class="pt-1 mb-5  d-flex justify-content-center align-items-center">
                            <button class="btn btn-dark text-dark  btn-lg btn-block" type="submit" style="background-color:#ffffff; width: 50%;">Ingresar</button>
                        </div>

                        <a class="small  mb-3 text-light d-flex justify-content-center align-items-center" href="#!">Olvidaste tu contraseña</a>
                        <p class="mb-8 pb-lg-2 d-flex justify-content-center align-items-center" style="color: #393f81;"><a href="<?php echo base_url('selec_registro') ?>"
                                style="color: #ffffff;">Registrarse</a></p>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Template Javascript -->
    


    <script>
        $(document).ready(iniciar);

        function iniciar() {

            $("#form_login").submit(forminiciarSesion);
        }

        function forminiciarSesion(e) {
            e.preventDefault();
            validarDatosLogin();
        }

        function validarDatosLogin() {

            correo = $("#correo").val();
            contrasena = $("#contrasena").val();

            if (correo != "" || contrasena != "") {

                $.ajax({
                        url: "<?php echo base_url('validarCredencialesLogin'); ?>",
                        type: 'POST',
                        dataType: 'text',
                        data: {
                            correo: correo,
                            contrasena: contrasena
                        },
                    })
                    .done(function(respuesta) {

                        if (respuesta == "DATOS_CORRECTOS") {
                            window.location = "<?php echo base_url('inicio'); ?>";
                        } else if (respuesta == "DATOS_INCORRECTOS") {
                            $("#contrasena").val("");
                            Swal.fire({
                                icon: 'error',
                                title: 'Datos Invalidos',
                                text: 'El usuario o contraseña que haz ingresado no son correctas.',
                            })

                        } else if (respuesta == "USUARIO_INACTIVO") {
                            $("#contrasena").val("");
                            Swal.fire({
                                icon: 'error',
                                title: 'Has sido inactivado del sistema!',
                                text: 'Tu usuario ahora mismo se encuentra inactivo en el sistema, no podrás ingresar.',
                            })
                        } else {
                            $("#contrasena").val("");
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'No se pudo encontrar el usuario',
                            })
                            console.log(respuesta);
                        }

                    })
                    .fail(function(respuesta) {
                        console.log("error");
                        console.log(respuesta);
                    });

            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Campos vacios!',
                    text: 'Debes llenar todos los campos.'
                })
            }
        }
    </script>
</body>

</html>