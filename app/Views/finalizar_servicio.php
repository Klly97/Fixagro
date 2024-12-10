<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>

<div class="contenedor_principal ">
    <div class="contenedor_maquina bg-light m-4 d-block ">
        <div class="parte_superior d-flex">
            <img src="https://th.bing.com/th/id/OIP.QC0SXWJi9XiC3Q1dz2tK4AHaEO?w=1400&h=800&rs=1&pid=ImgDetMain" style="max-width: 35%; padding: 20px;" alt="maquina">
            <div class="col-md-9 mt-3" style="width: 50%;">
                <p><strong>Tipo de Máquina:</strong> Secadora de Silo Sc</p>
                <p><strong>Modelo:</strong> 2014</p>
                <p><strong>Marca:</strong> Honda</p>
            </div>
            <button type="button" class="btn btn-success ms-5 mt-3 "  style="width: 100px; height: 40px;">Historial</button>
        </div>
        <div class="informacion m-3">
            <h2 class="fs-5 pt-3">Problema:</h2>
            <input type="text" class="form-control rounded mt-3 ms-2" disabled style="width: 90%; height:30px;" value="Falla electrica, falla en el motor, no sirve esta madre no le prenden las luces mejor dicho hpta tiesto viejo" aria-label="Search">
        
            <form action="">
            <h2 class="fs-5 pt-3">Problema solucionado:</h2>
            <input type="text" class="form-control rounded mt-3 ms-2"  style="width: 90%; height:40px;" placeholder="Ingrese el Problema solucionado"  >
        
            <h2 class="fs-5 pt-3">Descripcion:</h2>
            <input type="text" class="form-control rounded mt-3 ms-2"  style="width: 90%; height:50px;" placeholder="Ingrese el Problema solucionado"  >
            
            <button type="submit" class="btn btn-warning ms-1 mt-3 mb-3"  style="width: 30%; height: 40px; font-size: 20px;">Finalizar Servicio</button>

        </form>
        </div>
    </div>

</div>

<?php echo $this->endSection(); ?>