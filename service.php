<!-- sistema e Visual do pagina onde apresenta tudo sobre a service   -->

<?php
date_default_timezone_set('America/Fortaleza');
session_start();
include_once('conexaoDB.php');
if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha'])== true))
{
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:login.php');    
}

$logado = $_SESSION['usuario'];
$sqli = "SELECT nome FROM usuarios where usuario ='$logado'";
$resNome = $conexao->query($sqli);



?>


<?php
 $service = $_GET['service'];

 include('conexaoDB.php');
 $sqli = "SELECT * FROM ordemservico WHERE  ordem = '$service' ORDER BY id DESC";
 $resServico = $conexao->query($sqli);

 $sqli1 = "SELECT * FROM ordemservico WHERE  ordem = '$service' ORDER BY id DESC LIMIT 1";
 $resServico1 = $conexao->query($sqli1);

 $sqli2 = "SELECT * FROM ordemservico WHERE  ordem = '$service' ORDER BY id LIMIT 1";
 $resServico2 = $conexao->query($sqli2);

 $sqli3 = "SELECT * FROM ordemservico WHERE  ordem = '$service' ORDER BY id desc LIMIT 1";
 $resServico3 = $conexao->query($sqli3);

 $sqli4 = "SELECT * FROM acessorios WHERE  ordem = '$service'";
 $resAcessorios= $conexao->query($sqli4);


while($primeiro = mysqli_fetch_assoc($resServico2)){
   while($ultimo = mysqli_fetch_assoc($resServico3)) {

    $formato = 'd/m/Y';
    $data_inicio = $primeiro['data'];
    $data_fim = $ultimo['data'];
    $inicio =DateTime::createFromFormat($formato,$data_inicio );
    
    $fim =DateTime::createFromFormat($formato,$data_fim );
    $dateInterval = $fim->diff($inicio);
      
    $data = date('d/m/Y');
    $real = DateTime::createFromFormat($formato, $data);
    $dateIntervalReal  = $real->diff($inicio);

    

       
   }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Aparelhos</title>
    <link rel="stylesheet" href="./CSS/service.css">
    <link rel="stylesheet" href="./CSS/navbar.css">
</head>
<body >
<header>
            <div class="navbar">
                <a href="./pesquisar.php">Pesquisa</a>
                <a href="./cadastro.php?vai=Entrada">Entrada</a>
                <a href="./cadastro.php?vai=Saida">Saida</a>
            </div>
            <div class="navbarLogin">
            <?php while($nome = mysqli_fetch_assoc($resNome)){echo "<h3>".$nome['nome']."</h3>";} ?>
            <a href="./sairLogin.php">Sair</a>
                </div>
    </header><br>
 
    <?php
      

        echo"<div class='boxInf'><h1 style='margin-left:1%'> Ordem de Serviço: ".$service."</h1><br><br><br><br>     <div class='boxSerial'>   <p>Evidencias:</p>   <img onclick='ampliar()' class='imagem' src= './uploads/".$service."/".$service."_Serial"."' alt=''><img onclick='ampliar()' class='imagem' src= './uploads/".$service."/".$service."_Evidencia1"."' alt=''><img onclick='ampliar()' class='imagem' src= './uploads/".$service."/".$service."_Evidencia2"."' alt=''>   </div>
        <div class='amplia'> <img  src= './uploads/".$service."/".$service."_Serial"."' alt=''><button onclick='ampliarFecha()'>fechar</button> </div></div>";
    ?>
    
    <div class="acessorisBox">
    <?php
        while($acessorios = mysqli_fetch_assoc($resAcessorios)){
            if($acessorios['cabo']== 'on'){
                echo"<label  for='cabo'>Cabo:</label>
                <input id= 'cabo'type='checkbox'  disabled='disabled' checked>";
            }else{
                echo"<label  for='cabo'>Cabo:</label>
                <input id= 'cabo'type='checkbox'  disabled='disabled'>";
            }
    
            if($acessorios['fonte']== 'on'){
                echo"<label for='fonte'>Fonte:</label>
                <input id='fonte' type='checkbox' disabled='disabled' checked>";
            }else{
                echo"<label for='fonte'>Fonte:</label>
                <input id='fonte' type='checkbox' disabled='disabled' >";
            }
           }
           ?>
           </div>
           <?php
        while($os1 = mysqli_fetch_assoc($resServico1)){

        echo"<span style='margin-left:1%; font-weight: 900;font-size: 30px;'>Local Atual:</span> <span style='color:#1eff00; font-weight: 900;font-size: 30px;'>".$os1['setor']."</span><br><br> 
            <p style='margin-left:1%';> Dias na autorizada: ".$dateIntervalReal-> days."<br>"."</p><br><br>";
        }

        while($os = mysqli_fetch_assoc($resServico)){

            echo "<div style=' border-radius: 5px;border: 3px solid black; margin-left:1%;margin-right:1%;padding: 1%;'>
                    <h3>".$os['status']." ".$os['setor']."</h3>
                    <p>".$os['usuario']."</p>
                    <p>".$os['data']." as ".$os['hora']."</p>
                    <h4>Serial: ".$os['autentica']."</h4>
                    ";
                    if($os['status'] == 'Produto Entregue'){
                        echo"<br><div id='final'>Service Finalizada</div>";
                    }
                    
                   echo"</div><br>";
            
            
            
        }


    ?>
</body>
<style>
    #final{
   border-radius: 10px;
   font-weight: 900;
   width: 11%;
   background: green;
   color: white;
   display: flex;
   justify-content: center;

}
</style>
<script src="./JS/service.js"></script>
</html>