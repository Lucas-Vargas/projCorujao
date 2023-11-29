<?php
include_once('../crud/config.php');
include_once('../crud/Crud.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style-index.css">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        //Ativar pagina login
        $(document).ready(function() {
            $("#btnLogin").click(function() {
                $("#pagLogin").toggleClass("ativo");

                var loginElement = document.getElementById("btnLogin");

                function onUserLogin(username) {
                    loginElement.textContent = username;
                }
            });
            $("#btnLogin2").click(function() {
                $("#pagLogin").toggleClass("ativo");
            });

            //Olho de mostar a senha
            var input = document.querySelector('#input input');
            var img = document.querySelector('#input img');
            img.addEventListener('click', function() {
                input.type = input.type == 'text' ? 'password' : 'text';
            });

            //Quando clica no botão "Login" o mesmo some e quando clica no H1 "Login" ele volta ao home
            //Quando clica no botão "Cadastro" o mesmo some e quando clica no H1 "Cadastro" ele volta ao home

            document.getElementById("btnLogin").addEventListener("click", function() {
                document.getElementById("btnLogin").style.display = "none";
                document.getElementById("btnCadastro").style.display = "block";
            });

            document.getElementById("aLogin").addEventListener("click", function() {
                document.getElementById("btnLogin").style.display = "block";
            });

            document.getElementById("h1Cadastro").addEventListener("click", function() {
                document.getElementById("btnCadastro").style.display = "block";
            });
        });
    </script>
    </script>

</head>

<body>
    <header>
        <img src="../img/logo.png" id="logoImg">

        <div id="btns">
            <button id="btnLogin" class="btn">Login</button>
            <button id="btnCadastro" class="btn"><a href="./cadastro.php" id="aCadastro">Cadastro</a></button>
        </div>
    </header>
    <div id="pagLogin">
        <form action="" method="post">
            <div id="mainSection">
                <div id="top">
                    <h1 class="title">Login</h1>
                    <a href="" id="aLogin"><img src="../img/Close.png" alt="" id="imgClose"></a>
                </div>
                <div id="email">
                    <h1>E-mail:</h1>
                    <input type="text" name="email" class="cxTexto" id="emailText">
                </div>

                <div id="senha">
                    <h1>Senha:</h1>
                    <div id="input">
                        <input class="cxTexto" type="password" value="" name="senha" />
                        <img id="olho" src="https://i.stack.imgur.com/H9Sb2.png" alt="">
                    </div>

                </div>

                <input class="btnLoginAtivo" type="submit" value="Enviar" name="enviarIndex">
                <input class="btnLoginAtivo" type="submit" value="Recuperar Senha" name="btnTrocaSenha">
                <input class="btnLoginAtivo" type="submit" value="Cadastrar" name="btnCadastrar">

            </div>
        </form>
    </div>

    <main>
        <div id="img_index">
            <div id="imagem1">
                <img src="../img/Imagem1.png" alt="Imagem 1">
            </div>

            <div id="imagem2">
                <img src="../img/Imagem2.png" alt="Imagem 2">
            </div>
        </div>
    </main>

    <footer>
        <div id="footer">
            <p>© 2023 - Todos os direitos reservados</p>
            <p>Entre em contato pelo e-mail: contato@exemplo.com</p>
            <nav>
                <div id="imgFooter">
                    <img src="../img/LogoFacebook.png" alt="Logo do Facebook">
                    <img src="../img/LogoInstagram.png" alt="Logo do Instagram">
                    <img src="../img/LogoTwitter.png" alt="Logo do Twitter">
                </div>
            </nav>
        </div>
    </footer>
    <?php
    try {
        $crud = new Crud($db);
    } catch (Exception $e) {
        echo '';
    }
    if (isset($_POST['btnCadastrar'])) {
        echo '<script type="text/javascript"> window.location.href="cadastro.php"; </script>';
    }
    if (isset($_POST['btnTrocaSenha'])) {
        echo '<script type="text/javascript"> window.location.href="alterarSenha.php"; </script>';
    }

    if (isset($_POST['enviarIndex'])) {
        session_start();



        $user = new Crud($db);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['email'];
            $password = $_POST['senha'];
            $result = $crud->read();
            if ($user->validate($username, $password)) {
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $username;

                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

                    $tempEmail = $row['EmailUsu'];
                    if ($tempEmail == $username) {
                        $_SESSION['id'] = $row['idUsu'];
                        $id = $_SESSION['id'];
                        break;
                    }
                } //cabo o loop
                echo '<script type="text/javascript"> window.location.href="home.php"; </script>';
                exit();
            } else {
                echo '<script>alert("Verifique suas credenciais e tente novamente");</script>';
            }
        }
    }
    ?>
</body>

</html>