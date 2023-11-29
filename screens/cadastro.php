<?php
include_once('../crud/config.php');
include_once('../crud/Crud.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style-cadastro.css">
    <title>Cadastro</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <header>
        <img src="../img/logo.png" id="logoImg">

        <div id="btns">
            <button id="btnLogin" class="btn"><a href="./index.php" id="aVoltar">Voltar</a></button>
        </div>
    </header>
    <div id="pagCadastro">
        <form action="" method="post">
            <div id="mainSection">
                <h1 class="title">Cadastro</h1>
                    <div id="nome">
                        <h1>Seu nome:</h1>
                        <input type="text" name="nome" id="nomeText">
                    </div>
                    <div id="email">
                        <h1>E-mail:</h1>
                        <input type="text" name="email" id="emailText">
                    </div>
                    <div id="senha">
                        <h1 id="senha">Senha:</h1>
                        <input type="text" name="senha" id="senhaText">
                    </div>
                    <div id="confSenha">
                        <h1 id="senha2">Confirmar Senha:</h1>
                        <input type="password" name="confSenha" id="confSenha">
                    </div>

                    <input class="btnCadastroAtivo" type="submit" value="Enviar" name="Enviar">
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

    if (isset($_POST["Enviar"])) {
        
        if (
            $_POST["email"] != null && $_POST["senha"] != null && $_POST["nome"] != null
            && $_POST["confSenha"] != null
        ) {
            
            $crud = new Crud($db);
            if ($_POST['senha'] == $_POST['confSenha'] && $crud->validateEmail($_POST['email'])) {
                
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $senha = $_POST["senha"];
                echo $nome;
                $crud->insert($nome, $email, $senha);
                
            }
        } else {
            echo "<script>alert('Por favor preencha todos os campos');</script>";
        }
    }
    ?>

</body>

</html>