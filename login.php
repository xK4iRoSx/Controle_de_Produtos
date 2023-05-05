
<!-- Visual da pagina de login -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/login.css">
    <title>Login</title>
</head>
<body>
    
    <form action="./verificaLogin.php" method="post">
                <h1>Login</h1>
                <input type="text" name='usuario' placeholder="login">
                <input type="password" name='senha' placeholder="senha">
                <input type="submit" name='submit' value="login">


    </form>
</body>
</html>