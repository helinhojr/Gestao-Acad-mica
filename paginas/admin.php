<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html" charset="iso-8859-1">
        <title>Gestao Académica - Admin</title>
        <link rel="icon" href="../icones/school.png" >
        <link type="text/css" rel="stylesheet" href="../css/estilopag.css">
        <link type="text/css" rel="stylesheet" href="../css/iframe.css">
        <link type="text/css" rel="stylesheet" href="../css/all.css">
    </head>
    <body>
        <div class="cima">
            <img class="imagem" src="../icones/334.jpg">
            <h1><span>S</span>istema de <span>G</span>estão <span>A</span>cadémica</h1>
            <a href="#"><img src="../img/adam-kool-11868-unsplash.jpg"></a>
            <h2>Hélio José Zandamela</h2>
            <div class="btn-toolbar">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="baixo1">
            <div class="esquerda1">
                <ul>
                    <li><i class="fas fa-user"></i><a href="#">Estudantes</a></li>
                    <li><i class="fas fa-user"></i><a href="#">Professores</a></li>
                    <li><i class="fas fa-user"></i><a href="#">Secretários</a></li>
                    <li><i class="fas fa-user"></i><a href="#">Turmas</a></li>
                    <li><i class="fas fa-user"></i><a href="#">Disciplinas</a></li>
                    <li><i class="fas fa-user"></i><a href="#">Níveis</a></li>
                </ul>
            </div>
            <div class="direita">
                <iframe src="../paginas/turma.php" name="janela" id="frame-j"></iframe>
            </div>
        </div>
        <script>
            var baixo = document.querySelector(".baixo1");
            var esquerda = document.querySelector(".esquerda1");
            var btn = document.querySelector(".btn-toolbar");
            var i = 0;
            btn.addEventListener("click", function () {
                if (i == 0) {
                    baixo.className = "baixo";
                    esquerda.className = "esquerda";
                    i = 1;
                } else {
                    baixo.className = "baixo1";
                    esquerda.className = "esquerda1";
                    i = 0;
                }
            });
        </script>
    </body>
</html>