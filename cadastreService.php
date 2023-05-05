<!-- Sistema que cadastra a service para a pagina de pesquisa -->

<?php 
 $service = $_GET['service'];
 $vai = $_GET['vai'];
 print_r($vai);
include('conexaoDB.php');
$sqli = "SELECT * FROM service WHERE ordem = '$service'";
$resServico = $conexao->query($sqli);


if(mysqli_num_rows($resServico) == 1){
    header("location:cadastro.php?vai=$vai ");
}else{
   

    $resutadoSercive = mysqli_query($conexao, "INSERT INTO service (ordem)

    VALUES('$service')");
    
  header("location:cadastro.php?vai=$vai");
    
}


   