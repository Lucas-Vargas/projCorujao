<?php
$output = "";
$input = "print('Hello World!')";
if (isset($_POST['enviar']) && isset($_POST['textAreaResp'])) {

    if ($_POST['textAreaResp'] != null) {
        $input = $_POST['textAreaResp'];
    }
    $code = $_POST["textAreaResp"];
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://online-code-compiler.p.rapidapi.com/v1/",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'language' => 'python3',
            'version' => 'latest',
            'code' => $code,
            'input' => null
        ]),
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: online-code-compiler.p.rapidapi.com",
            "X-RapidAPI-Key: 99c6d9504cmsh305df9797cbda71p1ec9d6jsn061ff2a2161f",
            "content-type: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        $output = "cURL Error #:" . $err;
        echo $output;
    } else {
        $json = $response;
        $data = json_decode($json, true);
        $output = $data['output'];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../style/style-desafios.css">
    <title>Desafios</title>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/split.js"></script>
</head>

<body>
    <header>
        <img src="../img/logo.png" id="logoImg">

        <div id="btns">
            <button class="btn"><a href="./home.php">Home</a></button>
            <button id="btnDesafio"><a href="./desafios.php" id="aDesafio">Desafios</a></button>
            <button class="btn"><a href="./equipe.php">Equipe</a></button>
            <button class="btn"><a href="./perfil.php">Perfil</a></button>
        </div>
    </header>
    <form method="post">
        <div id="master">

            <div id="enunciado">
                <textarea name="" id="textAreaEnun" cols="30" rows="10" style="color: black;" disabled></textarea>
            </div>

            <div id="resposta">
                <div id="resp1" style="border: 2px solid black;">
                    <textarea name="textAreaResp" id="textAreaResp" cols="30" rows="10" style="color: black;"><?php echo $input; ?></textarea>
                </div>
                <div id="resp2" style="border: 2px solid black;">
                    <textarea name="textAreaResp2" id="textAreaResp2" disabled cols="30" rows="10" style="color: black;"><?php echo $output; ?></textarea>
                </div>
            </div>

            
        </div>
        <input class="btnCadastroAtivo" type="submit" value="Enviar" name="enviar">
    </form>
    

    <script>
        Split(['#enunciado', '#resposta'], {
            sizes: [50, 50],
            minSize: 0,
            gutterSize: 15,
            cursor: 'col-resize'
        });
        Split(['#resp1', '#resp2'], {
            sizes: [50, 50],
            minSize: 0,
            maxSize: "100%",
            gutterSize: 15,
            direction: "vertical",
            cursor: 'row-resize',
            border: '2px black solid'
        });
    </script>
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