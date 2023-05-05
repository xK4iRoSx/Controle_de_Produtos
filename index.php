
<!-- pagina Visial de Escolha de entra ou saida -->

<?php
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

$sqli2 = "SELECT nome FROM usuarios where usuario ='$logado'";
$resNome2 = $conexao->query($sqli2);

?>


<?php
$saida ='Saida';
$entrada ='Entrada'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/index.css">
    <title>Controle de Aparelhos</title>
</head>
<body>

<header>
            <div class="navbar">
                <a href="./pesquisar.php">Pesquisa</a>
                
            </div>
            <div class="navbarLogin">
            <?php while($nome = mysqli_fetch_assoc($resNome)){echo "<h3>".$nome['nome']."</h3>";} ?>
                    <a href="./sairLogin.php">Sair</a>
                    
                </div>
    </header><br>
    <h1>Escolha o Status:</h1> 
<div class="box">
    
        <form id="entrada" action="./cadastro.php?vai=<?php echo $entrada?>" method='post'>
            <input type="submit" value="Entrada">
        </form>

        <form id="saida" action="./cadastro.php?vai=<?php echo $saida?>" method='post'>
        <input type="submit" value="Saida">

</form>
  </div>  
</body>
</html>