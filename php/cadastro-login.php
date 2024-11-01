<?php
session_start();
require_once 'lista.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
</head>

<body>

    <form method="POST">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="senha" placeholder="senha">
        <input type="text" name="confirma" placeholder="confirma">
        <input type="submit" value="Cadastrar">
    </form>

    <br>
    <br>
    <br>

    <form method="POST">
        <input type="text" name="logEmail" placeholder="Email">
        <input type="text" name="logSenha" placeholder="Senha">
        <input type="submit" value="Logar">
    </form>

    <?php


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['confirma'])) {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $confirma = $_POST['confirma'];

            if ($confirma === $senha) {
                $novoCadastro = [
                    'email' => $email,
                    'senha' => $senha
                ];

                if (isset($_SESSION['cadastro'])) {
                    $_SESSION['cadastro'][] = $novoCadastro;
                } else {
                    $_SESSION['cadastro'] = [$novoCadastro];
                }
                echo "Cadastro realizado com sucesso!";
            }
        } else if (isset($_POST['logEmail']) && isset($_POST['logSenha'])) {
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
    }
    
    ?>
</body>

</html>