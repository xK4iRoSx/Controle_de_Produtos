Sistema que destroi as sessões existente no momento

<?php
session_start();
unset($_SESSION['usuario']);
unset($_SESSION['senha']);
header('location:login.php');