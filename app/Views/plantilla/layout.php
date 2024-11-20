<?php
$id_usuario = session('id');
if (!isset($id_usuario)) {
    header("Location: " . base_url('login'));
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fixagro</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url('public/img/logo.png'); ?>" />

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url('/public/lib/lightbox/css/lightbox.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('/public/lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url('/public/css/bootstrap.min.css'); ?>" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url('/public/css/style.css'); ?>" rel="stylesheet">
</head>

<style>
    body {
        background-color: #e3e3e3;
    }

    .input-group-text {
        background-color: #e3e3e3;
        border: none;
    }

    .upload-area {
        background-color: #4A90E2;
        border: 2px dashed #FFFFFF;
        padding: 50px;
        text-align: center;
        color: #FFFFFF;
    }

    .upload-area i {
        font-size: 3rem;
    }

    .btn-save {
        background-color: #A2C619;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 15px;
        width: 15%;
    }

    .btn-save:hover {
        background-color: #8FB517;
    }

    .btnGuardar {
        display: flex;
        justify-content: end;
    }
</style>

<body class="d-flex flex-column min-vh-100">

    <?php echo $this->include('plantilla/navbar'); ?>

    <?php echo $this->renderSection("contenido"); ?>

    <?php echo $this->include('plantilla/footer'); ?>

    <?php echo $this->renderSection("script"); ?>

</body>


</html>