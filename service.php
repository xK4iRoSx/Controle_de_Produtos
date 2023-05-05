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
    $dateIntervalReal = $real->diff($inicio);



       
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
    <link rel="stylesheet" href="./CSS/index.css">
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
       

        echo"<h1 style='margin-left:1%'> Ordem de Serviço: ".$service."</h1><br>";

        while($os1 = mysqli_fetch_assoc($resServico1)){

        echo"<span style='margin-left:1%; font-weight: 900;font-size: 30px;'>Local Atual:</span> <span style='color:#1eff00; font-weight: 900;font-size: 30px;'>".$os1['setor']."</span><br><br> 
            <p style='margin-left:1%';> dias na autorizada: ".$dateInterval-> days."</p><br><br>";
        }

        while($os = mysqli_fetch_assoc($resServico)){

            echo "<div style='border: 3px solid black; margin-left:1%;margin-right:1%;padding: 1%;'>
                    <h3>".$os['status']." ".$os['setor']."</h3>
                    <p>".$os['usuario']."</p>
                    <p>".$os['data']." as ".$os['hora']."</p>
                    
                    
                    </div><br>"
            
            
            ;
        }


    ?>
</body >
</html>