<!DOCTYPE html>
<html>
    <?php
    require_once '../modelo/Estudante.php';
    session_start();
    $estuda = $_SESSION['idUsuario'];
    foreach (Estudante::buscarEst($estuda) as $est):
        ?>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="Content-Type" content="text/html" charset="iso-8859-1">
            <title>Gestao Académica - Estudante</title>
            <link type="text/css" rel="stylesheet" href="../css/estilo.css">
            <link type="text/css" rel="stylesheet" href="../css/iframe.css">
            <link rel="icon" href="../img/notebook.png" >
            <link type="text/css" rel="stylesheet" href="../css/all.css">
        </head>
        <body>
            <div class="cima">
                <img class="imagem" src="../img/notebook.png">
                <h1><span>S</span>istema de <span>G</span>estão <span>A</span>cadémica</h1>
                <a href="mycontrolle.php?encerrar=a"><img src="<?php echo $est['foto']; ?>"></a>
                <h2><?php echo $est['nome']; ?></h2>
                <div class="btbotao">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            <?php endforeach; ?>    
        </div>
        <div class="baixo1">
            <div class="esquerda1">
                <ul>
                    <li><i class="fas fa-home"></i><a href="#">Início</a></li>
                    <li><i class="fas fa-handshake"></i><a href="#">Aproveitamento</a></li>
                    <li><i class="fas fa-list-alt"></i><a href="#">Professores Atuais</a></li>
                </ul>
            </div>
            <div class="direita">
                <iframe src="perfil.php" name="janela" id="frame-j"></iframe>
            </div>
        </div>
        <script>
            //Funcao do Menu
            var baixo = document.querySelector(".baixo1");
            var esquerda = document.querySelector(".esquerda1");
            esquerda.className += " tamanho";
            var btn = document.querySelector(".btbotao");
            var i = 0;
            btn.addEventListener("click", function () {
                if (i == 0) {
                    baixo.className = "baixo";
                    esquerda.className = "esquerda";
                    i = 1;
                } else {
                    baixo.className = "baixo1";
                    esquerda.className = "esquerda1";
                    esquerda.className += " tamanho";
                    i = 0;
                }
            });
            var frame = document.querySelector("iframe");
            var icones = document.querySelectorAll("ul i");
            var lga = document.querySelectorAll("ul a");
            icones[0].addEventListener("click", function () {
                frame.src = "perfil.php";
            });
            lga[0].addEventListener("click", function () {
                frame.src = "perfil.php";
            });
            icones[2].addEventListener("click", function () {
                frame.src = "estudantes_professores.php";
            });
            lga[2].addEventListener("click", function () {
                frame.src = "estudantes_professores.php";
            });
            icones[1].addEventListener("click", function () {
                frame.src = "estudantes_aproveitamento.php";
            });
            lga[1].addEventListener("click", function () {
                frame.src = "estudantes_aproveitamento.php";
            });
        </script>
    </body>
</html>