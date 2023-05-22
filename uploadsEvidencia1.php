<?php

session_start();
include_once('conexaoDB.php');
if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha'])== true))
{
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:login.php');    
}

       if(isset($_GET['service'])){
        $service = $_GET['service'];
        $vai = $_GET['vai'];
       }
       
        if(isset($_POST['submit'])){ 
            $teste ="teste";
            $arquivo = $_FILES['file'];
            $serviceNome = $_POST['service'];
            $vai = $_POST['vai'];
            $canvas = $_FILES['canvas'];

            $arquivoNovo = explode('.',$arquivo['name']);

            if($arquivoNovo[sizeof($arquivoNovo)-1] != 'jpg'){
              echo" <script>
              alert('Arquivo invalido ou nada foi salvo,extenção permitida: .jpg')
              window.location.href='uploadsEvidencia1.php?vai=$vai&service=$serviceNome'
                 </script>";
            }else{
                mkdir(__DIR__.'/uploads/'.$serviceNome.'/', 0777, true);
            move_uploaded_file($arquivo['tmp_name'],'uploads/'.$serviceNome.'/'.$serviceNome."_Evidencia1.jpg");
            header("location:uploadsEvidencia2.php?vai=$vai&service=$serviceNome");
    }
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/uploads.css">
    <link rel="stylesheet" href="./CSS2/uploadsResponsivo.css">
    <title>Document</title>
</head>
<body><br>
    



<form action="./uploadsEvidencia1.php?vai=<?php echo $vai ?>" method="post" enctype="multipart/form-data">
        <h1>Foto de Evidencia 1:</h1>
        <input  type="file" id ="file" name="file">
        <input type="hidden" name='service' value='<?php echo $service ?>'>
        <input type="hidden" name='vai' value='<?php echo $vai ?>'>
        <input type="submit" name="submit" value="Salva Foto">
        
</form><br>

<div class="canvasBox">
    <canvas></canvas><br>
       <button onclick="teste()">Apaga</button>
</div>

<div class="videoBox">
        <video autoplay></video><br>
            <button class="button">Tira Foto</button>
</div>

</body>
<script src="./JS/uploads.js"></script>

</html>