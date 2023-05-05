
<!-- Sistema que verifica se o usuario e senha existem -->

<?php
session_start();
if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha']))

{

    include_once('conexaoDB.php');

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

  

    $sql = "SELECT * FROM usuarios WHERE  usuario = '$usuario' and senha = '$senha'";
    $resultado = $conexao->query($sql);






    if (mysqli_num_rows($resultado) < 1) {
       unset ($_SESSION['usuario']);
       unset ($_SESSION['senha']);
        echo" <script>
        alert('Usuario ou senha incorreto')
        window.location.href='login.php'
    </script>";

        
    }
else{
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        header('location:index.php');
}   


}
else
{
   
    header('location:login.php');
    
}