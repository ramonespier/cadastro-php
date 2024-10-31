<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<form action="./login.php">
    <input type="text" name="email" placeholder="email">
    <input type="text" name="senha" placeholder="senha">
    <input type="submit" value="Logar">
</form>

<a href="./cadastro.php">cadastro</a>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if  (isset($_POST['email']) && isset($_POST['senha'])) {
        // $email = $_POST['email'];
        // $senha = $_POST['senha'];
        echo 'Login bem-sucedido';

    } else {
        echo 'Email ou senha incorretos';
    }

}
?>


    
</body>
</html>