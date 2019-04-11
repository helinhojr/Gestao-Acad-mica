<!DOCTYPE html>
<html>
    <head>
        <title>Gestão Académica - Disciplinas</title>
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="icon" href="../img/notebook.png" >
        <link rel="stylesheet" href="../css/iframe.css">
    </head>
    <body class="corpo1">
        <div class="perfil1">
            <div class="form">
                <form  name="disciplinas" action="../controller/config.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Cadastro de Disciplinas</legend>
                        <label for="nomes">Nome</label>
                        <input type="text" name="nome" id="nomes">
                        <input type="button" id="btDisc" name="enviar" value="Enviar">
                    </fieldset>
                </form>
                <form  name="níveis" action="../controller/config.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Cadastro de Níveis</legend>
                        <label for="nomes">Nome</label>
                        <input type="text" name="nome" id="nome">
                        <label for="disciplinas">Disciplinas</label>
                        <select id="disciplinas">

                        </select>
                        <input type="button" name="add" value="adicionar">
                        <input type="button" name="enviar" value="enviar">
                    </fieldset>
                </form>
            </div>
            <div class="tabela2">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Disciplina</th>
                            <th>Data de Cadastro</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button type="button" class="btn btn-default"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-default"><i class="fas fa-trash"></i></button></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nível</th>
                            <th>Data de Cadastro</th>
                            <th>Disciplinas</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button type="button" class="btn btn-default"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-default"><i class="fas fa-trash"></i></button></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>    
        <div class="roda">

        </div>
        <script src="../js/jss.js"></script>
    </body>
</html>
