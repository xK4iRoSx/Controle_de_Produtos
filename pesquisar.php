<!-- Sistema E Visual da pagina de pesquisa -->

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

<?php

include('conexaoDB.php');
$sql = "SELECT * FROM service ORDER BY id DESC";
$resService = $conexao->query($sql);








?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/navbar.css">
    <link rel="stylesheet" href="./CSS/pesquisar.css">
    <link rel="stylesheet" href="./CSS2/navbarResponsivo.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <title>Controle de Aparelhos</title>
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

<?php

?>

<div class="boxPesq">
    <input type="search" id="pesquisa"  onkeypress="digitar(event)" placeholder="Buscar">
</div><br><br>


<div class='filter' style="display: none;">
        <?php
       
            
        
        while($os = mysqli_fetch_assoc($resService)){
            echo"

                <div class='servicos'>

                        <a href='./service.php?service=".$os['ordem']."'><h1>".$os['ordem']."</h1> </a>
                       

                </div><br><br>
            
            
            
            ";
        }
    
?>
</div>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="./JS/pesquisar.js">
       
</script>
<script>
    document.getElementById('pesquisa').focus();
</script>
<script src="./JS/navbarMo.js"></script>
</html>



