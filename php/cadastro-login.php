<?php
session_start();
require_once 'lista.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body
    class="bg-gray-900 text-white
            flex justify-center items-center
            h-screen w-screen">

    <main
        class="border-4 w-3/6 h-3/6
                grid grid-rows-1 grid-cols-2
                rounded-md bg-black">

        <section
            class="grid grid-rows-2 grid-cols-1
         justify-items-center items-center">

            <h2
                class="text-3xl text-center flex items-center justify-center size-auto">
                Cadastro</h2>

            <form method="POST"
                class="grid grid-rows-5 grid-cols-1
                    h-5/6 w-5/6 gap-1 text-black">

                <input type="text" name="email" placeholder="Email" class="p-2">
                <input type="text" name="senha" placeholder="Senha" class="p-2">
                <input type="text" name="confirma" placeholder="Confirme sua senha" class="p-2">

                <input type="submit" value="Cadastrar" class="bg-blue-700 border-2 text-white">

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
                            echo "<span class='bg-green-400 flex justify-center items-center font-bold border text-white'>Cadastro realizado com sucesso!</span>";
                        } else {
                            echo "<span class='bg-red-600 flex justify-center items-center font-bold border text-white'>As senhas não conferem!</span>";
                        }
                    }
                }
                ?>

            </form>
        </section>

        <section
            class="grid grid-rows-2 grid-cols-1
            justify-items-center items-center">

            <h2
                class="text-3xl text-center flex justify-center items-center">
                Login</h2>

            <form method="POST"
                class="grid grid-rows-4 grid-cols-1
                h-5/6 w-5/6 text-black gap-1">

                <input type="text" name="logEmail" placeholder="Email" class="p-2">
                <input type="text" name="logSenha" placeholder="Senha" class="p-2">
                <input type="submit" value="Logar" class="p-2 bg-blue-700 border-2 text-white">

                <?php
                if (isset($_POST['logEmail']) && isset($_POST['logSenha'])) {
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
                        echo "<span class='bg-green-400 flex justify-center items-center font-bold border text-white'>Login realizado com sucesso!</span>";
                    } else {
                        echo "<span class='bg-red-600 flex justify-center items-center font-bold border text-white'>Email ou senha inválidos!</span>";
                    }
                }

                ?>

            </form>
        </section>
        <?php
        #### codigo completo {
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     if (isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['confirma'])) {
        //         $email = $_POST['email'];
        //         $senha = $_POST['senha'];
        //         $confirma = $_POST['confirma'];

        //         if ($confirma === $senha) {
        //             $novoCadastro = [
        //                 'email' => $email,
        //                 'senha' => $senha
        //             ];

        //             if (isset($_SESSION['cadastro'])) {
        //                 $_SESSION['cadastro'][] = $novoCadastro;
        //             } else {
        //                 $_SESSION['cadastro'] = [$novoCadastro];
        //             }
        //             echo "Cadastro realizado com sucesso!";
        //         }
        //     } else if (isset($_POST['logEmail']) && isset($_POST['logSenha'])) {
        //         $logEmail = $_POST['logEmail'];
        //         $logSenha = $_POST['logSenha'];
        //         $loginSucesso = false;

        //         if (isset($_SESSION['cadastro'])) {
        //             foreach ($_SESSION['cadastro'] as $usuario) {

        //                 if ($usuario['email'] === $logEmail && $usuario['senha'] === $logSenha) {
        //                     $loginSucesso = true;

        //                     break;
        //                 }
        //             }
        //         }
        //         if ($loginSucesso) {
        //             echo "Login realizado com sucesso!";
        //         } else {
        //             echo "Email ou senha inválidos!";
        //         }
        //     }
        // }
        //}
        ?>
    </main>



</body>

</html>