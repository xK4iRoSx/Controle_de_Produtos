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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/index.css">
    <link rel="stylesheet" href="./CSS/pesquisar.css">
    <title>Controle de Aparelhos</title>
</head>
<body>

<header>
            <div class="navbar">
                <a href="./cadastro.php?vai=Entrada">Entrada</a>
                <a href="./cadastro.php?vai=Saida">Saida</a>
            </div>
            <div class="navbarLogin">
                <?php while($nome = mysqli_fetch_assoc($resNome)){echo "<h3>".$nome['nome']."</h3>";} ?>
            <a href="./sairLogin.php">Sair</a>
                </div>
    </header><br>



<div class="boxPesq">
    <input type="search" id="pesquisa"  onkeypress="digitar(event)" placeholder="Buscar">
</div><br>


<div class='filter' style="display: none;">
        <?php
        while($os = mysqli_fetch_assoc($resService)){
            echo"

                <div class='servicos'>

                        <a href='./service.php?service=".$os['ordem']."'><h1>Service: ".$os['ordem']."</h1></a>
                       

                </div>
            
            
            
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
</html>


