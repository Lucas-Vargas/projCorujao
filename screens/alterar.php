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
    <title>Modificar Usuário</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<header>
    <img src="../img/logo.png" id="logoImg">

    <div id="btns">
        <button id="btnLogin" class="btn"><a href="./home.php">Home</a></button>
        <button id="btnCadastro" class="btn"><a href="./desafios.php">Desafios</a></button>
        <button id="btnCadastro" class="btn"><a href="./equipe.php">Equipe</a></button>
        <button id="btnCadastro" class="btn"><a href="./perfil.php">Perfil</a></button>
    </div>
</header>

<body>
    <form action="./alterar.php" method="post">
        <div id="mainSection">
            <div id="nome">
                <h1>Nome</h1>
                <input type="text" name="nome" id="nomeText" value="<?php echo $tempNome ?>">
            </div>
            <div id="email">
                <h1>E-mail</h1>
                <input type="email" name="email" id="emailText" value="<?php echo $tempEmail ?>">
            </div>
            <div id="senha">
                <h1 id="senha">Senha</h1>
                <input type="password" name="senha" id="senhaText" value="<?php echo $tempSenha ?>">
            </div>

            <input type="submit" value="alterar" name="alterarAA" id="alterar">
        </div>
    </form>


    <?php
    if(isset($_POST['alterarAA'])) {
        echo"xD";
        
        if($_POST['nome'] != null && $_POST['email'] != null && $_POST['senha'] != null){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $crud->update($nome, $email, $senha, $tempId);

        echo "<script>alert('atualizado com sucesso.');</script>";
        header("Location: perfil.php");

    }else{
        echo "<script>alert('Por favor, não deixe as caixas de texto vazias.');</script>";
    }
}
?>


</body>

</html>