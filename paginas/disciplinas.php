<!DOCTYPE html>
<html>
    <head>
        <title>Gestão Académica - Disciplinas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="icon" href="../img/notebook.png" >
        <link rel="stylesheet" href="../css/iframe.css">
        <link rel="stylesheet" href="../css/forms.css">
    </head>
    <body>
        <div class="perfil1">
            <div class="form">
                <form  name="disciplinas" action="../controller/config.php" method="POST" enctype="multipart/form-data">
                        <h3>Cadastro de Disciplinas</h3>
                        <label for="nomes">Nome</label>
                        <input type="text" name="nome" id="nomes">
                        <button type="button"><i class="far fa-save"></i></button>
                </form>
                <form  name="níveis" action="../controller/config.php" method="POST" enctype="multipart/form-data">
                        <h3>Cadastro de Níveis</h3>
                        <label for="nomes">Nome</label>
                        <input type="text" name="nome" id="nome">
                        <label for="disciplinas">Disciplinas</label>
                        <select id="disciplinas">

                        </select>
                        <button type="button"><i class="fas fa-plus"></i></button>
                        <button type="button"><i class="far fa-save"></i></button>
                </form>
            </div>
            <div class="tabela">
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
                <table class="tabela2">
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
        <script src="../js/jss.js"></script>
    </body>
</html>
