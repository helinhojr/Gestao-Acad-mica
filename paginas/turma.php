<!DOCTYPE html>
<html>
    <head>
        <title>Gestão Académica - Turmas</title>
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="../css/iframe.css">
    </head>
    <body class="corpo">
        <div class="tit">
            <h2>Turmas</h2>
        </div>
        <div class="perfil1">
            <form class="form" name="turma" action="../conexao/config.php" method="POST" enctype="multipart/form-data">
                <label for="nomes">Nome</label>
                <input type="text" name="nome" id="nomes">
                <label for="classe">Nível</label>
                <select id="classe">
                    
                </select>    
                <label for="sala">Sala</label>
                <select id="sala">
                    
                </select>    
                <label for="diretor">Director de Turma</label>
                <select id="diretor">
                    
                </select>    
                <input type="button" name="enviar" value="Enviar">
            </form>
            <div class="tabela">
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Número da Sala</th>
                            <th>Director da Turma</th>
                            <th>Nível</th>
                            <th>Ano</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
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