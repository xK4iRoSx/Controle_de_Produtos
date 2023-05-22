
<!-- Parte Visual do cadastro de service -->

<?php
session_start();

$vai = $_GET['vai'];


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

$sqli3 = "SELECT setor FROM usuarios where usuario ='$logado'";
$resNome3 = $conexao->query($sqli3);

$sqli4 = "SELECT setor FROM usuarios where usuario ='$logado'";
$resNome4 = $conexao->query($sqli4);

while($resSetor = mysqli_fetch_assoc($resNome4)){

    $setorRes = $resSetor['setor'];
}



?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/cadastro.css">
    <link rel="stylesheet" href="./CSS/navbar.css">
    <link rel="stylesheet" href="./CSS2/navbarResponsivo.css">
    <link rel="stylesheet" href="./CSS2/cadastroResponsivo.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <title>Controle de Aparelhos</title>
</head>
<body>
    <header>
            <div class="navbar">
            
                <div class="menu">
                    <i id="fechar" onclick="fecharMenu()"class="fi fi-br-cross"></i>
                    <i id="abrir" onclick="abrirMenu()" class="fi fi-rr-menu-burger"></i>
                </div>
                <a href="./pesquisar.php">Pesquisa</a>
                <a href="./cadastro.php?vai=Entrada">Entrada</a>
                <a href="./cadastro.php?vai=Saida">Saida</a>
                
            </div>
            <div class="navbarLogin">
            <?php while($nome = mysqli_fetch_assoc($resNome)){echo "<h3>".$nome['nome']."</h3>";} ?>
                    <a href="./sairLogin.php">Sair</a>
                    
                </div>
    </header>
    <div class="navbarMo">
    <a href="./pesquisar.php">Pesquisa</a>
                <a href="./cadastro.php?vai=Entrada">Entrada</a>
                <a href="./cadastro.php?vai=Saida">Saida</a>
                <a href="./sairLogin.php">Sair</a>
            </div><br>

   

        <form name='form'   id='cadastroService' action="./cadastraOrdem.php?vai=<?php echo $vai ?>" method="post" >
         
                <h1>Digite a Service de  <span class='setor'> <?php  echo $vai.' '. $setorRes ?></span> </h1>
                <input type="hidden" name='usuario' value="<?php while($nome2 = mysqli_fetch_assoc($resNome2)) echo $nome2['nome'] ?>">
                <input type="number" onkeyup="submitform(event)" name='service' id='service' placeholder="Digite a Service" >
                <input type="hidden" name = "setor" value="<?php while($nome3 = mysqli_fetch_assoc($resNome3)) echo $nome3['setor'] ?>">
                <input type="hidden" name='status' value="<?php  echo $vai ?>">
               

        </form>
</body>
<script type="text/javascript">
    document.getElementById('service').focus();
    function submitform(event) {
   
        let digita = document.querySelector('#service').value
    
if(digita.length  == 10){

    document.form.submit();
}
        
    }
</script>
<script src="./JS/navbarMo.js"></script>
</html>