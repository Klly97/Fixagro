<?php echo $this->extend('plantilla/layout'); ?>
<?php echo $this->section('contenido'); ?>

<!-- Profile Section -->
<div class="container bg-white rounded my-3" style="min-height: 650px;">
    <div class="my-5">
        <!-- Imagen y datos de la máquina -->
        <div class="row align-items-center gy-4">
            <div class="col-6 col-md-6 text-center">
                <img src="https://th.bing.com/th/id/OIP.QC0SXWJi9XiC3Q1dz2tK4AHaEO?w=1400&h=800&rs=1&pid=ImgDetMain"
                    class="img-fluid rounded" style="max-height: 300px; width: 90%; object-fit: cover;" alt="Máquina" />
            </div>

            <div class="col-6 col-md-6 text-center text-md-start bg-white  py-5 px-4" style="height: 300px;">
                <p class="mb-1">Tipo de Maquina:</p>
                <p class="mb-1">Modelo:</p>
                <p class="mb-3">Marca:</p>
                <div class="py-4">
                    <button type="button" class="btn btn-success me-2 mt-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Crear Publicación</button>
                    <a  class="btn btn-success mt-2" href="<?php echo base_url('historial') ?>">Historial</a>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Solicitud de Servicio</h1>
                        <hr style="color: #198754;" />
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="¿Deseas publicar una solicitud de servicio?"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Sección de Publicación en curso y Solicitudes de técnicos -->
        <div class="row mt-4 bg-dark rounded">

            <!-- Publicación en curso -->
            <div class="col-12 col-md-6 mb-4 p-3">
                <div class="bg-white text-white p-4 rounded shadow">
                    <h5 class="text-black">Publicación en curso</h5>
                    <p class="text-black">14/06/2024</p>
                    <p class="text-black">Se dañó la cadena a la guadaña, la cambié y no encendió más.</p>
                    <button class="btn btn-dark me-2"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-dark"><i class="bi bi-journal-text"></i></button>
                </div>
            </div>

            <!-- Solicitudes de técnicos -->
            <div class="col-12 col-md-6 mb-4 p-3">
                <div class="bg-white text-white p-4 rounded shadow">
                    <h5 class="text-black">Solicitudes de técnicos</h5>
                    <p class="text-black">Chats</p>
                    <p class="text-black">Tienes x notificaciones</p>
                    <button class="btn btn-success">Ir a chats</button>
                </div>
            </div>

        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>