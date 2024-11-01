<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    } else {
        echo "As senhas não conferem!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
</head>
<body>
    <h2>Cadastro</h2>
    <form action="cadastro.php" method="POST">
        <input type="email" name="email" placeholder="E-mail" required><br>
        <input type="password" name="senha" placeholder="Senha" required><br>
        <input type="password" name="confirma" placeholder="Confirme a Senha" required><br>
        <input type="submit" value="Cadastrar">
    </form>

    <a href="./login.php">login</a>
</body>
</html>
