
<!-- Sistema e visual de cadastro de Usuarios -->

<?php
session_start();
include_once('conexaoDB.php');
if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha'])== true))
{
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:login.php');   

}


if(isset($_POST['submit'])){
    $setor = $_POST['setor'];
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $resutado = mysqli_query($conexao, "INSERT INTO usuarios (nome,usuario,senha,setor)

     VALUES('$nome','$usuario','$senha','$setor')");
}



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/cadastroUsuario.css">
    <title>Cadastro de Usuarios</title>
</head>
<body>

<header>
            <div class="navbar">
    
                
            </div>
            <div class="navbarLogin">
               
                </div>
    </header><br>
<form action="./cadastroUsuario.php" method="post">
                <h1>Cadastro</h1>
                <select name="setor" id="">
                        <option value="Recepção">Recepção</option>
                        <option value="Lab_mx">Lab_mx</option>
                        <option value="Lab_DTV">Lab_DTV</option>
                        <option value="Colect">Colect</option>
                        <option value="Dev_motoboy">Dev_motoboy</option>
                </select>
                <input type="text" name='nome'placeholder="Nome">
                <input type="text" name='usuario' placeholder="Login">
                <input type="text" name='senha' placeholder="Senha">
                
                
                <input type="submit" name='submit' value="Cadastra">
    </form>
</body>
</html>