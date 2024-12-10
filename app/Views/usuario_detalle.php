<?php echo $this->extend('plantilla/layout'); ?>
<?php echo $this->section('contenido'); ?>

<div class="contenedor bg-light m-4 rounded p-3">

    <!-- Información del persona -->
    <div class="d-flex">
        <div class="perfil bg-white rounded p-3 shadow" style="width: 40%;">
            <div class="text-center">
            <img src="https://as1.ftcdn.net/v2/jpg/09/65/01/78/1000_F_965017857_17LYzOToXwVcwZXXpqRrVjDZRQBKxcQw.jpg" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                <h2 class="mt-3"><?= esc($persona['nombre']) ?> <?= esc($persona['apellido']) ?></h2>
                <p class="text-muted"><i class="fas fa-map-marker-alt"></i> <?= esc($persona['municipio']) ?>, <?= esc($persona['departamento']) ?></p>
                <div class="d-flex justify-content-center">
                    <div class="me-1">
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de "Mis Máquinas" -->
        <div class="ms-4 bg-white rounded p-3 shadow flex-grow-1 container-fluid">
            <h3 class="text-center">Mis Máquinas</h3>
               <!-- Mostrar las publicaciones -->
               <div class="row">
                <?php if (!empty($publicaciones)): ?>
                    <?php foreach ($publicaciones as $publicacion): ?>
                        <div class="col-md-6 col-sm-12 mb-4 d-flex justify-content-center ">
                        <a href="<?= base_url('maquina/detalle/' . esc($publicacion['id_maquina'])) ?>" class="d-block">
                       
                        <div class="card " style="width: 18rem; height: 18rem;">
                                <!-- Aquí se muestra la imagen de la publicación -->
                               
                                <?php if ($publicacion['maquina_img']): ?>
                                    
                                    <img src="<?php echo base_url('./public/img/maquina/') . $publicacion['maquina_img'] ?>" alt="Machine 1"
                                            class="rounded-3" style="object-fit: cover; width: 100%; height: 100%;">
                                    <?php else: ?>
                                        <img src="default-image.jpg" alt="Imagen no disponible" class="img-fluid rounded">
                                    <?php endif; ?>                                
                            </div>
                        </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No tienes publicaciones disponibles.</p>
                <?php endif; ?>
            </div>
            
        </div>
    </div>

    <!-- Enlace para volver -->
    <div class="text-end mt-3">
        <a href="<?= base_url('inicio') ?>" class="btn btn-outline-success">Volver</a>
    </div>

</div>

<?php echo $this->endSection(); ?>
