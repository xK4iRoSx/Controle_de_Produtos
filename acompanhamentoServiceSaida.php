<?php


session_start();
include_once('conexaoDB.php');
if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha'])== true))
{
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location:login.php');    
}
$logado = $_SESSION['usuario'];
$sqli = "SELECT nome FROM usuarios where usuario ='$logado'";
$resNome = $conexao->query($sqli);



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/navbar.css">
    <link rel="stylesheet" href="./CSS2/navbarResponsivo.css">
    <link rel="stylesheet" href="./CSS/acompanhamentoServiceSaida.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <title>Acompalhamento de Saida</title>
</head>
<body>
    

 <div style="height: 100px;">
    <header>
            <div class="navbar">
            <div class="menu">
                    <i id="fechar" onclick="fecharMenu()"class="fi fi-br-cross"></i>
                    <i id="abrir" onclick="abrirMenu()" class="fi fi-rr-menu-burger"></i>
                </div>
                <a href="./cadastro.php?vai=Entrada">Entrada</a>
                <a href="./cadastro.php?vai=Saida">Saida</a>
            </div>
            <div class="navbarLogin">
                <?php while($nome = mysqli_fetch_assoc($resNome)){echo "<h3>".$nome['nome']."</h3>";} ?>
            <a href="./sairLogin.php">Sair</a>
                </div>
    </header>
</div>

    <div class="navbarMo">
                <a href="./pesquisar.php">Pesquisa</a>
                <a href="./cadastro.php?vai=Entrada">Entrada</a>
                <a href="./cadastro.php?vai=Saida">Saida</a>
                <a href="./sairLogin.php">Sair</a>
            </div><br>


<div class="titulo">
    <h1> APARELHO EM MOVIMENTO ENTRE SETORES</h1>
</div><br>

<div class="infor"></div>




    
</body>
<script  type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script> 


setInterval( function pesquisar(){
       $.post("./MODULOS/acompanhamentoServiceSaidaModulo.php", function(x) { $(".infor").html(x); } );
       
},1000)
</script>
<script src="./JS/navbarMo.js"></script>

</html>