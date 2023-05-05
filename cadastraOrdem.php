
<!-- Sistema para cadastro da service nodia que foi inserida ou auterada -->

<?php
include('conexaoDB.php');
$vai = $_GET['vai'];
print_r($vai);
date_default_timezone_set('America/Fortaleza');

    $usuario = $_POST['usuario'];

    $setor = $_POST['setor'];

    $service = $_POST['service'];

    $status = $_POST['status'];

    $data = date('d/m/Y');

    $hora = date('H:i:s');

    $resutado = mysqli_query($conexao, "INSERT INTO ordemservico (usuario,setor,status,ordem,data,hora)

     VALUES('$usuario','$setor','$status','$service','$data','$hora')");

    header("location:cadastreService.php?service=$service&vai=$vai");






