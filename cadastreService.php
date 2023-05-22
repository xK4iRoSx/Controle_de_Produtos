<!-- Sistema que cadastra a service para a pagina de pesquisa -->

<?php 

session_start();
include_once('conexaoDB.php');
if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha'])== true))
{
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:login.php');    
}
 $service = $_GET['service'];
 $vai = $_GET['vai'];
include('conexaoDB.php');
$sqli = "SELECT * FROM service WHERE ordem = '$service'";
$resServico = $conexao->query($sqli);
$status = $_GET['status'];

if(isset($_POST["sim"])){

  $usuario = $_GET['usuario'];

    $setor = $_GET['setor'];

    $service = $_GET['service'];
if($_GET['setor'] =="Dev_motoboy" && $_GET['vai'] =="Saida"){

  $status ="Produto Entregue";
} else if($_GET['setor'] =="Comeia" && $_GET['vai'] =="Saida"){
  $status ="Produto Entregue";
}else{
  $status = $_GET['status'];
}
   
    $data = $_GET['data'];

    $hora = $_GET['hora'];
    
    $autentica = $_POST['autentica'];

    $resutado = mysqli_query($conexao, "INSERT INTO ordemservico (usuario,setor,status,ordem,data,hora,autentica)
    VALUES('$usuario','$setor','$status','$service','$data','$hora','$autentica')");
    header("location:cadastro.php?vai=$vai");
}

if(isset($_POST["nao"])){

  $usuario = $_GET['usuario'];

    $setor = $_GET['setor'];

    $service = $_GET['service'];

    $data = $_GET['data'];

    $hora = $_GET['hora'];
    
    $autentica = $_POST['autentica'];
    
    $resutado = mysqli_query($conexao, "INSERT INTO ordemservico (usuario,setor,ordem,data,hora,autentica)
    VALUES('$usuario','$setor','$service','$data','$hora','$autentica')");
    header("location:cadastro.php?vai=$vai");
}


 
if(mysqli_num_rows($resServico) == 1){

}else{
    $resutadoSercive = mysqli_query($conexao, "INSERT INTO service (ordem)

    VALUES('$service')");
    
  header("location:uploadsSerial.php?vai=$vai&service=$service");
  
    
}

?>

<!DOCTYPE html>
<html lang="pr-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/cadastreService.css">
  <link rel="stylesheet" href="./CSS2/cadastreServiceReponsivo.css">
  <title>Confirme o serial</title>
</head>
<body>
  <?php echo $status ?>
  <h3>O serial esta batendo com o do Aparelho ?</h3>
  <img src="./uploads/<?php echo $service?>/<?php echo $service?>_Serial.jpg" alt="">
 <div class="verificacao">
  <form action="cadastreService.php?usuario=<?php echo $_GET['usuario']?>&setor=<?php echo $_GET['setor']?>&status=<?php echo $_GET['status']?>&service=<?php echo $_GET['service']?>&data=<?php echo $_GET['data']?>&hora=<?php echo $_GET['hora']?>&vai=<?php echo $vai?>" method="post">
        <input type="hidden"  name="autentica" value ="Verificado">
        <input type="submit" name="sim" value="SIM"> <br><br>
       
  </form>
  <form action="cadastreService.php?usuario=<?php echo $_GET['usuario']?>&setor=<?php echo $_GET['setor']?>&service=<?php echo $_GET['service']?>&data=<?php echo $_GET['data']?>&hora=$<?php echo $_GET['hora']?>&vai=<?php echo $vai?>" method="post">
        <input type="hidden" name="autentica" value ="Serial incorreto">
        
        <input type="submit" name="nao" value="NÃO">

  </form>
  </div>
</body>
</html>


   