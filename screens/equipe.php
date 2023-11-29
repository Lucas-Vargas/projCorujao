<?php
include_once('../crud/config.php');
include_once('../crud/Crud.php');
session_start();
$crud = new Crud($db);

$result = $crud->readTime();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style-equipe.css">
    <title>Equipes</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<header>
    <img src="../img/logo.png" id="logoImg">

    <div id="btns">
        <button class="btn"><a href="./home.php">Home</a></button>
        <button class="btn"><a href="./desafios.php">Desafios</a></button>
        <button id="btnEquipe"><a href="./equipe.php" id="aEquipe">Equipe</a></button>
        <button class="btn"><a href="./perfil.php">Perfil</a></button>
    </div>
</header>

<body>
<div id="master">
    <table id="tabelaTime">
        <tr>
            <th>Colocação</th>
            <th>Nome do Time</th>
            <th>Líder do Time</th>
            <th>Ação</th>
        </tr>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $nomeTime = $row['NomeTime'];
            $idUsu = $row['idUsu'];
            $idTime = $row['idTime'];
            $resultNome = $crud->readNameTime($idUsu);

            while ($row2 = $resultNome->fetch(PDO::FETCH_ASSOC)) {
                $nomeUsu = $row2['NomeUsu'];
            }
        ?>
        <tr>
            <td><p><?php if($nomeTime == "Rensga"){ echo "1º";}else{echo"2º";} ?></p></td>
            <td><p><?php echo $nomeTime; ?></p></td>
            <td><p><?php echo $nomeUsu; ?></p></td>
            <td>
                <form method="post">
                    <input type="hidden" name="idTime" value="<?php echo $idTime; ?>">
                    <input type="submit" value="Entrar" name="alterarTime">
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php 

        if (isset($_POST["alterarTime"])) {
            $id = $_POST['idTime'];
            $crud->updateForTime($id, $_SESSION['id']);
            echo "<script>alert('Entrou no time com sucesso');</script>";
        }
?>
</body>



</html>