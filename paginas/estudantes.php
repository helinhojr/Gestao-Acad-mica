<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Gestão Académica - Matrículas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="icon" href="../img/notebook.png" >
        <link rel="stylesheet" href="../css/iframe.css">
        <link rel="stylesheet" href="../css/forms.css">
    </head>
    <body>
        <div class="tit">
            <h2>Matrículas dos estudantes</h2>
        </div>
        <div class="perfil1">
            <form class="form" name="professores" action="" method="POST" enctype="multipart/form-data">
                <h3>Passo 1</h3>
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
                <button type="button">enviar</button>
            </form>
            <div class="tabela">
                <h3>Passo 2</h3>
                <label>Estudante</label>
                <select disabled>
                    <option></option>
                </select>
                <label>Turma</label>
                <select >
                    <option></option>
                </select>
                <button type="button">enviar</button>
                <h3>Passo 3</h3>
                <label>Nível</label>
                <select >
                    <option></option>
                </select>
                <label>Semestre</label>
                <select disabled>
                    <option></option>
                </select>
                <button type="button">Finalizar</button>

            </div>
        </div>
        <div class="roda">

        </div>
    </body>
</html>