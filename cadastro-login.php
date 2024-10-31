<?php
session_start()
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
</head>

<body>

    <form action="./cadastro-login.php" method="POST">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="senha" placeholder="senha">
        <input type="text" name="confirma" placeholder="confirma">
        <input type="submit" value="Cadastrar">
    </form>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <form action="./cadastro-login.php" method="POST">
        <input type="text" name="logEmail" placeholder="Email">
        <input type="text" name="logSenha" placeholder="Senha">
        <input type="submit" value="Logar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confirma = $_POST['confirma'];

        if ($senha !== $confirma) {
            echo "Senhas não conferem";

        } else {
            if (!isset($_SESSION['email'])) {
                $_SESSION['email'] = $email;

            } else {
                echo "Email já cadastrado";
            }

            if (!isset($_SESSION['senha'])) {
                $_SESSION['senha'] = $senha;
            }

            $logEmail = $_POST['logEmail'];
            $logSenha = $_POST['logSenha'];
            $logEmail = $_SESSION['email'];
            $logSenha = $_SESSION['senha'];

            if ($logEmail === $_SESSION['email'] && $logSenha === $_SESSION['senha']) {
                echo 'Bem vindo, seu login foi bem-sucedido!';
                
            } else if ($logEmail !==  $_SESSION['email'] || $logSenha !== $_SESSION['senha']) {
                echo 'Email ou senha incorretos';

            } else {
                echo 'Erro ao realizar login';
            }
        }
    }
    ?>

    <?php
    // unset($_SESSION['email']);
    // unset($_SESSION['senha']);
    ?>

</body>

</html>