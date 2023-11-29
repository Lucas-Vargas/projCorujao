<?php
include_once('../crud/config.php');
include_once('../crud/Crud.php');

$crud = new Crud($db);
try {
    session_start();
} catch (Exception $e) {
    echo '';
}
$id = $_SESSION['id'];


$result = $crud->read();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

    $tempId = $row['idUsu'];
    if ($tempId == $id) {
        $tempEmail = $row['EmailUsu'];
        $tempNome = $row['NomeUsu'];
        $tempSenha = $row['SenhaUsu'];
        $tempTime = $row['Times_idTime'];
        break;
    }
    
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style-perfil.css">
    <title>Perfil</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<header>
    <img src="../img/logo.png" id="logoImg">

    <div id="btns">
        <button class="btn"><a href="./home.php">Home</a></button>
        <button class="btn"><a href="./desafios.php">Desafios</a></button>
        <button class="btn"><a href="./equipe.php">Equipe</a></button>
        <button id="btnPerfil"><a href="./perfil.php" id="aPerfil">Perfil</a></button>
    </div>
</header>

<body>
    <form action="./alterar.php" method="post">
        <div id="mainSection">
            <div id="nome">
                <h1>Nome</h1>
                <input type="text" name="nome" id="nomeText" value="<?php echo $tempNome ?>" disabled>
            </div>
            <div id="time">
                <h1>Time</h1>
                <input type="text" name="time" id="timeText" value="<?php 
                if ($tempTime == null){
                echo "Nenhum";
                }else{
                    $resultNome = $crud->readNomeTime($tempTime);
                    while ($row = $resultNome->fetch(PDO::FETCH_ASSOC)) {
                        $nomeTime = $row['NomeTime'];
                        echo $nomeTime;
                        }
                }?>" disabled>
            </div>
            <div id="email">
                <h1>E-mail</h1>
                <input type="email" name="email" id="nomeText" value="<?php echo $tempEmail ?>" disabled>
            </div>
            <div id="senha">
                <h1 id="senha">Senha</h1>
                <input type="password" name="senha" id="senhaText" value="XDXDXDXDXDXDXDXDXDXDXD" disabled>
            </div>

            <input type="submit" value="alterar" name="alterar" id="alterar">
        </div>
    </form>


    <?php


    ?>

</body>

</html>