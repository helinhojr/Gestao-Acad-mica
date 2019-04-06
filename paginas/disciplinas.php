<!DOCTYPE html>
<html>
    <head>
        <title>Gestão Académica - Disciplinas</title>
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="../css/iframe.css">
    </head>
    <body class="corpo1">
        <div class="perfil1">
            <div class="form">
                <form  name="disciplinas" action="../conexao/config.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Cadastro de Disciplinas</legend>
                        <label for="nomes">Nome</label>
                        <input type="text" name="nome" id="nomes">
                        <input type="button" name="enviar" value="Enviar">
                    </fieldset>
                </form>
                <form  name="níveis" action="../conexao/config.php" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Cadastro de Níveis</legend>
                        <label for="nomes">Nome</label>
                        <input type="text" name="nome" id="nomes">
                        <label for="disciplinas">Disciplinas</label>
                        <select id="disciplinas">
                            
                        </select>
                        <input type="button" name="add" value="adicionar">
                        <input type="button" name="enviar" value="enviar">
                    </fieldset>
                </form>
            </div>
            <div class="tabela2">
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome da Discplina</th>
                            <th>Data de Cadastro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nível</th>
                            <th>Data de Cadastro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>    
        <div class="roda">

        </div>
    </body>
</html>
