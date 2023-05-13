
<!-- Sistema para cadastro da service nodia que foi inserida ou auterada -->

<?php


session_start();
include_once('conexaoDB.php');
if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha'])== true))
{
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:login.php');    
}
session_start();
include('conexaoDB.php');
$vai = $_GET['vai'];
$service = $_POST['service'];
print_r($service);
$sqli2 = "SELECT * FROM ordemservico WHERE  ordem = '$service' ORDER BY id DESC LIMIT 1";
$resServico2 = $conexao->query($sqli2);



print_r($vai);
date_default_timezone_set('America/Fortaleza');


    $usuario = $_POST['usuario'];

    $setor = $_POST['setor'];

    $service = $_POST['service'];

    $status = $_POST['status'];

    $data = date('d/m/Y');

    $hora = date('H:i:s');

    $sqli = "SELECT * FROM service WHERE ordem = '$service'";
    $resServico = $conexao->query($sqli);

    


 
    if(mysqli_num_rows($resServico) == 1){
        while($verifica = mysqli_fetch_assoc($resServico2)){
            print_r($verifica['status']);
                if($verifica['status'] == "Produto Entregue"){
                    echo" <script>
                    alert('Essa Service ja esta finalizada no sistema')
                    window.location.href='cadastro.php?vai=$vai'
                </script>";
                }else{
                    header("location:cadastreService.php?usuario=$usuario&setor=$setor&status=$status&service=$service&data=$data&hora=$hora&vai=$vai"); 
                }
            }
         
    }else{
        $autentica = "Verificado";
        $resutado = mysqli_query($conexao, "INSERT INTO ordemservico (usuario,setor,status,ordem,data,hora,autentica)
        VALUES('$usuario','$setor','$status','$service','$data','$hora','$autentica')");
        header("location:cadastreService.php?service=$service&vai=$vai");  
    }

    

    





