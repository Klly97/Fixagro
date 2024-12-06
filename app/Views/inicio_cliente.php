<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>

<!-- Profile Section -->
<section style="background-color: #e7e4e4;">
    <div class="container">
        <div class="row py-5">
            <div class="col-lg-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="https://as1.ftcdn.net/v2/jpg/09/65/01/78/1000_F_965017857_17LYzOToXwVcwZXXpqRrVjDZRQBKxcQw.jpg" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-2"><?php echo session('nombre') . ' ' . session('apellido') ?></h5>
                        <div class="rating mb-1">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="far fa-star text-warning"></i>
                            <i class="far fa-star text-warning"></i>
                        </div>
                        <p class="text-muted mb-0">Ubicación</p>
                        <p class="text-muted mb-4"><?php echo session('municipio') . ', ' . session('departamento') ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <p class="lead fw-normal mb-0">Mis Maquinas</p>
                        <button type="button" class="btn btn-success me-2 mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar maquinas</button>
                    </div>

                    <div class="card-body">
                        <div class="row g-2">
                            <?php foreach ($maquinas as $maquina): ?>
                                <div class="col-sm-6 col-lg-4">
                                    <a href="<?php echo base_url('/publicacion_historial_maquina/' . $maquina['id_maquina']); ?>">
                                        <img src="<?php echo base_url('./public/img/maquina/') . $maquina['img'] ?>" alt="Machine 1"
                                            class="w-100 rounded-3" width="400" height="350">
                                    </a>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <!-- Modal crear maquina -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Maquinas</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body container mt-3">
                                <!-- Formulario de Entrada -->
                                <form enctype="multipart/form-data" method="post" id="registrar_maquina">

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-text">Tipo de máquina:</span>
                                                <input type="text" class="form-control text-capitalize" placeholder="Especificar tipo" id="tipo" name="tipo">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-text">Modelo:</span>
                                                <input type="text" class="form-control text-capitalize" placeholder="Especificar modelo" id="modelo" name="modelo">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-text">Marca:</span>
                                                <input type="text" class="form-control text-capitalize" placeholder="Especificar marca" id="marca" name="marca">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Área de carga de archivos -->
                                    <div class="upload-area mt-3 flex-column d-flex justify-content-center" style="height: 100%; width:100%">

                                        <div class="d-flex justify-content-center" style="height: 100%; width:100%">
                                            <div class="d-flex justify-content-center">
                                                <i class="bi bi-images"></i>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center" style="height: 100%; width:100%">
                                            <div class="d-flex justify-content-center">
                                                <input id="foto" type="file" name="foto" accept="image/*" class="form-control form-control-sm mb-0 me-2 " style="max-width: 450px; font-size: 0.8rem;">
                                            </div>
                                        </div>
                                        <br>
                                        <div id="dvPreview">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<?php echo $this->endSection(); ?>

<?php echo $this->section('script'); ?>

<script language="javascript" type="text/javascript">
    $(function() {
        $("#fotos").change(function() {
            if (typeof(FileReader) != "undefined") {
                var dvPreview = $("#dvPreview");
                dvPreview.html("");
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                $($(this)[0].files).each(function() {
                    var file = $(this);
                    if (regex.test(file[0].name.toLowerCase())) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var img = $("<img class='rounded img-fluid mr-5' />");
                            img.attr("style", "height:100px;width: 100px");
                            img.attr("src", e.target.result);
                            dvPreview.append(img);
                        }
                        reader.readAsDataURL(file[0]);
                    } else {
                        alert(file[0].name + " is not a valid image file.");
                        dvPreview.html("");
                        return false;
                    }
                });
            } else {
                alert("This browser does not support HTML5 FileReader.");
            }
        });
    });
</script>


<script>
    $(document).ready(iniciar);

    function iniciar() {

        $("#registrar_maquina").submit(formRegistrarPublicacion);
    }

    function formRegistrarPublicacion(e) {
        e.preventDefault();
        console.log("entroooo");
        marca = $("#marca").val();
        modelo = $("#modelo").val();
        tipo = $("#tipo").val();

        if (marca != "" && modelo != "" && tipo != "") {
            var datos_formulario = new FormData($('#registrar_maquina')[0]);

            $.ajax({
                    url: '<?php echo base_url('/crear_maquina'); ?>',
                    type: "POST",
                    dataType: "text",
                    data: datos_formulario,
                    contentType: false,
                    processData: false
                })
                .done(function(respuesta) {
                    console.log("entra 1" + respuesta);

                    if (respuesta == "OK#INSERT") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Exitoso!',
                            text: 'La publicacion ha sido registrada con exito.'
                        }).then(okay => {
                            if (okay) {
                                $("#mAgregarUsuario").modal('hide');
                                location.reload();
                            }
                        });

                    } else if (respuesta == "ERROR#INSERT") {
                        alert("OCURRIO UN ERROR AL INSERTAR LA PUBLICACION");
                    } else {
                        alert("entra 2" + respuesta);
                    }
                })
                .fail(function(respuesta) {
                    alert("error en el proceso");
                    console.log("entra 3" + respuesta);
                });
        } else {
            alert('todos los campos son oblicatorios');
        }
    }
</script>

<?php echo $this->endSection(); ?>