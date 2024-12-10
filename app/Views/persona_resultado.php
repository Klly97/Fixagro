<?php echo $this->extend('plantilla/layout'); ?>
<?php echo $this->section('contenido'); ?>

<div class="contenedor bg-light m-4 rounded p-3">

    <h1>Resultados de la Búsqueda</h1>

    <!-- Mostrar si hay resultados -->

    <?php if (!empty($resultados)): ?>


        <?php foreach ($resultados as $persona): ?>
            <a href="<?= base_url('persona/detalle/' . esc($persona['id'])) ?>" class="zoom-link" style="text-decoration: none; color: inherit;">
                
            <div class="perfil d-flex m-4 p-2 rounded zoom-card" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; text-align: center;">

                    <h2 style="font-size: 20px; width: 30%;"><?= esc($persona['nombre']) ?> <?= esc($persona['apellido']) ?></h2>
                    <p><strong>Municipio</strong> <?= esc($persona['municipio']) ?></p>
                    <p><strong>Departamento</strong> <?= esc($persona['departamento']) ?></p>
                    <p><strong>Teléfono</strong> <?= esc($persona['telefono']) ?></p>
                    <p><strong>Email</strong> <?= esc($persona['email']) ?></p>
                    <p><strong>Estado</strong> <?= esc($persona['estado']) ?></p>
                    <p><strong>Tipo de Persona</strong> <?= esc($persona['tipo_persona']) ?></p>

                </div>
            <?php endforeach; ?>


        <?php else: ?>
            <p>No se encontraron personas con ese nombre o apellido.</p>
        <?php endif; ?>

        <!-- Enlace para volver a la página anterior -->
        <form action="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/' ?>" method="get">
    <button type="submit" class="btn btn-outline-success ms-4 " style="width: 20%;">Volver</button>
</form>
</div>
<style>
    .zoom-card {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.zoom-card:hover {
    transform: scale(1.05); /* Efecto de zoom */
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; /* Sombra más marcada */
}

.zoom-link {
    display: block;
}

</style>
<?php echo $this->endSection(); ?>