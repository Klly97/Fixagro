<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>

<!-- Profile Section -->
<section style="background-color: #e7e4e4;">
    <div class="container">
        <!-- Historial -->
        <div class="col-12 col-lg-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="history-title py-2 mb-0">Historial</h4>
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Fecha de creación</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Técnico</th>
                                    <th scope="col">Problema Técnico</th>
                                    <th scope="col">Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>20-06-2024</td>
                                    <td><span class="status status-finalizado">Finalizado</span></td>
                                    <td>Andres Bedoya</td>
                                    <td>Eléctrico</td>
                                    <td>Se realizó cambio de botón de encendido.</td>
                                </tr>
                                <tr>
                                    <td>26-06-2024</td>
                                    <td><span class="status status-mantenimiento">Mantenimiento</span></td>
                                    <td>Andres Bedoya</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<style>
    .profile-section {
        width: 250px;
    }

    .profile-image {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        margin-bottom: 15px;
    }

    .profile-name {
        font-size: 1.5em;
        font-weight: bold;
        margin-bottom: 15px;
    }

    .rating {
        color: #FFD700;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .contact-info {
        margin-bottom: 20px;
    }

    .contact-label {
        font-weight: bold;
        color: #666;
        margin-bottom: 5px;
    }

    .contact-value {
        margin-bottom: 15px;
    }

    .history-title {
        font-size: 1.8em;
        margin-bottom: 20px;
    }

    .history-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .history-table th,
    .history-table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    .history-table th {
        background-color: #f8f8f8;
        font-weight: bold;
    }

    .history-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .history-table tr:hover {
        background-color: #f5f5f5;
    }

    .status {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 0.9em;
    }

    .status-finalizado {
        background-color: #E8F5E9;
        color: #2E7D32;
    }

    .status-mantenimiento {
        background-color: #FFF3E0;
        color: #E65100;
    }

    .location-info {
        margin-top: 10px;
    }

    .location-line {
        margin-bottom: 5px;
    }
</style>
<?php echo $this->endSection(); ?>