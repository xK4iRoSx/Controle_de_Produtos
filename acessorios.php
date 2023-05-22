
<?php

session_start();
include_once('conexaoDB.php');
if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha'])== true))
{
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:login.php');    
}

    include_once('conexaoDB.php');
if(isset($_GET['service'])){
    $serviceid = $_GET['service'];
    $vai = $_GET['vai'];
}
    



    if(isset($_POST['submit'])){

        $cabo = $_POST['cabo'];
        $fonte = $_POST['fonte'];
        $service = $_POST['service'];
        $vai = $_POST['vai'];
        


$resutado = mysqli_query($conexao, "INSERT INTO acessorios (ordem,cabo,fonte)

     VALUES('$service','$cabo','$fonte')");

    header("location:cadastro.php?vai=$vai");
    }




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/acessorios.css">
    <link rel="stylesheet" href="./CSS2/acessoriosResponsivo.css">
    <title>Acessorios</title>
</head>
<body> 
    <h1>Acessorios</h1>
    <form action="./acessorios.php?vai=<?php echo $vai ?>&service=<?php echo $serviceid ?>" method="post">
       
        <p>seleciona os acessorios:</p>
<div>
        <label for="cabo">Cabo</label>
        <input id ="cabo" name="cabo" type="checkbox">
        <label for="fonte">Fonte</label>
        <input id="fonte" name="fonte"type="checkbox">
</div>
        <input type="hidden"  name="service"value="<?php echo $serviceid ?>">
        <input type="hidden"  name="vai"value="<?php echo $vai ?>">
        <input type="submit" name="submit">
       
     
    </form><br><br>
    <h6>caso não tenha acessorios não marque nada</h6>
</body>
</html>