<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Gestão Académica - Professores</title>
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="icon" href="../img/notebook.png" >
        <link rel="stylesheet" href="../css/iframe.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
    </head>
    <body class="corpo">
        <div class="tit">
            <h2>Professores</h2>
        </div>
        <div class="perfil1">
            <form class="form" name="professores" action="" method="POST" enctype="multipart/form-data">
                <label class="lbl">Nome Completo</label>
                <input type="text" name="nomecompleto" id="nomecompleto" placeholder="nome">
                <label class="lbl">Data de Nascimento</label>
                <input type="date" name="datanascimento" id="datanascimento" placeholder="--/--/----">
                <label class="lbl">E-mail</label>
                <input type="email" name="email" id="email">
                <label class="lbl">Número do B.I.</label>
                <input type="text" name="turma" id="turma" placeholder="turma">
                <label class="lbl">Endereço</label>
                <input type="text" name="morada" id="morada">
                <label>Disciplinas</label>
                <select id = "nivel">
                </select>
                <input type="button" value="adicionar">
                <input type="button" value="gravar">
            </form>     
            <div class="tabela">
                <table class="table" >
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Sala</th>
                            <th>Director da Turma</th>
                            <th>Nível</th>
                            <th>Ano</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
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
                            <td><button type="button" class="btn btn-default"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-default"><i class="fas fa-trash"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="roda">

        </div>

    </body>
</html>