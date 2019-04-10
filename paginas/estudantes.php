<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Gestão Académica - Estudantes</title>
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="icon" href="../img/notebook.png" >
        <link rel="stylesheet" href="../css/iframe.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
    </head>
    <body>
        <div class="tit">
            <h2>Estudantes</h2>
        </div>
        <div class="perfil1">
            <form class="form" name="professores" action="" method="POST" enctype="multipart/form-data">
                <label class="lbl">Nome Completo</label>
                <input type="text" name="nomecompleto" id="nomecompleto">
                <label class="lbl">Nome do Pai</label>
                <input type="text" name="nomepai" id="nomepai">
                <label class="lbl">Nome da mãe</label>
                <input type="text" name="nomepai" id="nomepai">
                <label class="lbl">Data de Nascimento</label>
                <input type="date" name="datanascimento" id="datanascimento" placeholder="--/--/----">
                <label class="lbl">Endereço</label>
                <input type="text" name="morada" id="morada">
                <label class="lbl">Nível</label>
                <select>
                    <option></option>
                </select>
                <label class="lbl">Género</label>
                <select>
                    <option>Masculino</option>
                    <option>Feminino</option>
                </select>
                <label class="lbl">Regime</label>
                <select>
                    <option>Laboral</option>
                    <option>Pós - Laboral</option>
                </select>
                <label>Foto</label>
                <input type="file" name="foto" id="foto">
                <input type="button" value="enviar" id="enviar">
            </form>
            <div class="tabela">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Nível</th>
                            <th>Pai</th>
                            <th>Mãe</th>
                            <th>Género</th>
                            <th>Regime</th>
                            <th>Foto</th>
                            <th></th>
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