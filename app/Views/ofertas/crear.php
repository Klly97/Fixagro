<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>
<div class="d-flex flex-column align-items-center mt-5">
    <!-- Título centrado -->
    <h1 class="section-title text-center mb-4">Crear Publicación</h1>

    <!-- Tarjeta del formulario -->
    <div class="card p-4 shadow-sm" style="width: 100%; max-width: 600px; border: 1px solid #ddd; border-radius: 10px;">
        <form action="<?= base_url('ofertas/guardar') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <!-- Tipo de Máquina -->
            <div class="mb-3">
                <label for="tipo_maquina" class="form-label">Tipo de Máquina</label>
                <input type="text" name="tipo_maquina" id="tipo_maquina" class="form-control" placeholder="Ej: Tractor" required>
            </div>

            <!-- Modelo -->
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Ej: SC-2024" required>
            </div>

            <!-- Marca -->
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" id="marca" class="form-control" placeholder="Ej: FixAgro" required>
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Describe la máquina o el problema..." required></textarea>
            </div>

            <!-- Imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen de la Máquina</label>
                <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*" required>
            </div>

            <!-- Botón Publicar -->
            <button type="submit" class="btn btn-green w-100">Publicar</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
