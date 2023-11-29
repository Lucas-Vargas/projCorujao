<?php
include_once('../crud/config.php');
include_once('../crud/Crud.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style-home.css">
    <title>Página principal</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<header>
    <img src="../img/logo.png" id="logoImg">

    <div id="btns">
        <button class="btn" id="btnHome"><a href="./home.php" id="txtHome">Home</a></button>
        <button class="btn"><a href="./desafios.php">Desafios</a></button>
        <button class="btn"><a href="./equipe.php">Equipe</a></button>
        <button class="btn"><a href="./perfil.php" id="aPerfil">Perfil</a></button>
    </div>
</header>
<body>
    <p id="textHome">Bem-vindo ao nosso site! Este espaço foi criado com o objetivo de desafiar o conhecimento dos participantes e, ao mesmo tempo, proporcionar momentos de diversão. Aqui, acreditamos que aprender pode ser uma experiência empolgante e gratificante. Nosso site é mais do que apenas uma plataforma, é um ambiente onde os usuários podem testar seus conhecimentos, aprender coisas novas e se divertir no processo. Queremos que cada visita ao nosso site seja uma aventura, um desafio e uma oportunidade para crescer. Então, prepare-se para explorar, descobrir e se divertir. Estamos ansiosos para embarcar nesta jornada de aprendizado com você!
</p>
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
</body>

</html>