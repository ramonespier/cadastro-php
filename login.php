<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $logEmail = $_POST['logEmail'];
    $logSenha = $_POST['logSenha'];
    $loginSucesso = false;

    if (isset($_SESSION['cadastro'])) {
        foreach ($_SESSION['cadastro'] as $usuario) {
            if ($usuario['email'] === $logEmail && $usuario['senha'] === $logSenha) {
                $loginSucesso = true;
                break;
            }
        }
    }

    if ($loginSucesso) {
        echo "Login realizado com sucesso!";
    } else {
        echo "Email ou senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <input type="email" name="logEmail" placeholder="E-mail" required><br>
        <input type="password" name="logSenha" placeholder="Senha" required><br>
        <input type="submit" value="Logar">
    </form>

    <a href="./cadastro.php">cadastro</a>
</body>

</html>