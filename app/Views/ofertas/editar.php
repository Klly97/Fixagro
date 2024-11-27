<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>
<div class="d-flex flex-column align-items-center mt-5">
    <!-- Título centrado -->
    <h1 class="section-title text-center mb-4">Editar Publicación</h1>

    <!-- Tarjeta del formulario -->
    <div class="card p-4 shadow-sm" style="width: 100%; max-width: 600px; border: 1px solid #ddd; border-radius: 10px;">
        <form action="<?= base_url('ofertas/actualizar/' . $oferta['id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?> <!-- Protección CSRF -->

            <!-- Tipo de Máquina -->
            <div class="mb-3">
                <label for="tipo_maquina" class="form-label">Tipo de Máquina</label>
                <input type="text" name="tipo_maquina" id="tipo_maquina" 
                       class="form-control" 
                       value="<?= esc($oferta['tipo_maquina']) ?>" required>
            </div>

            <!-- Modelo -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" id="modelo" 
                       class="form-control" 
                       value="<?= esc($oferta['modelo']) ?>" required>
            </div>

            <!-- Marca -->
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" id="marca" 
                       class="form-control" 
                       value="<?= esc($oferta['marca']) ?>" required>
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" 
                          class="form-control" rows="3" required><?= esc($oferta['descripcion']) ?></textarea>
            </div>

            <!-- Imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen de la Máquina</label>
                <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                <small>Deja este campo vacío para mantener la imagen actual.</small>
            </div>

            <!-- Botón Actualizar -->
            <button type="submit" class="btn btn-green w-100">Actualizar</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
