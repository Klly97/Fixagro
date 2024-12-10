<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>

<div class="contenedor_principal">
    <div class="contenedor_maquina bg-light m-4 d-block">
        <div class="parte_superior d-flex">
            <!-- Mostrar la imagen de la máquina -->
            <img src="<?php echo base_url('./public/img/maquina/') . $maquina['img']; ?>" style="max-width: 35%; padding: 20px;" alt="maquina">

            <div class="col-md-9 mt-3" style="width: 50%;">
                <p><strong>Tipo de Máquina:</strong> <?= $maquina['tipo_maquina']; ?></p>
                <p><strong>Modelo:</strong> <?= $maquina['modelo']; ?></p>
                <p><strong>Marca:</strong> <?= $maquina['marca']; ?></p>
            </div>

            <button type="button" class="btn btn-success ms-5 mt-3" style="width: 100px; height: 40px;">Historial</button>
        </div>

        <div class="informacion m-3">
            <h2 class="fs-5 pt-3">Problema:</h2>
            <input type="text" class="form-control rounded mt-3 ms-2" disabled style="width: 90%; height:30px;" value="<?= $publicacion['descripcion']; ?>" aria-label="Search">

            <form action="<?= base_url('trabajo/guardarSolucion/' . $trabajo['id_trabajo']); ?>" method="post">
                <h2 class="fs-5 pt-3">Problema solucionado:</h2>
                <input type="text" name="problema_solucionado" class="form-control rounded mt-3 ms-2" style="width: 90%; height:40px;" placeholder="Ingrese el Problema solucionado" required>

                <h2 class="fs-5 pt-3">Descripcion:</h2>
                <input type="text" name="descripcion" class="form-control rounded mt-3 ms-2" style="width: 90%; height:50px;" placeholder="Ingrese la Descripción del trabajo" required>

                <button type="submit" class="btn btn-warning ms-1 mt-3 mb-3" style="width: 30%; height: 40px; font-size: 20px;">Finalizar Servicio</button>
            </form>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>
