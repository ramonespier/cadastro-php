<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white
            flex justify-center items-center
            h-screen w-screen">

    <div class="w-96 h-auto
            flex flex-col
            justify-center items-center
            border-4 border-white
            bg-black">

        <form action="cadastro.php" method="POST" class="grid grid-cols-1 grid-rows-5 gap-3 w-10/12 h-auto">
            <h2 class="text-3xl font-bold underline m-2 flex justify-center">Cadastro</h2>
            <input type="email" name="email" placeholder="E-mail" required class="p-2 text-black">
            <input type="password" name="senha" placeholder="Senha" required class="p-2 text-black">
            <input type="password" name="confirma" placeholder="Confirme a Senha" required class="p-2 text-black">
            <input type="submit" value="Cadastrar" class="p-2 bg-blue-700 border-2">

            <?php
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
                    echo "<span class='bg-green-400 flex justify-center items-center font-bold border'>Cadastro realizado com sucesso!</span>";
                } else {
                    echo "<span class='bg-red-600 flex justify-center items-center font-bold border'>As senhas não conferem!</span>";
                }
            }
            ?>
        </form>

        <a href="./login.php" class="m-3 bg-blue-500
        border p-2 hover:scale-125">
        Faça login!
    </a>

    </div>
</body>

</html>