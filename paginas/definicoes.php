<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Gestão Académica - Definições</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="icon" href="../img/notebook.png" >
        <link rel="stylesheet" href="../css/iframe.css">
        <link rel="stylesheet" href="../css/forms.css">
    </head>
    <body>
        <div class="tit">
            <h2>Definições do Administrador</h2>
        </div>
        <div class="perfil1">
            <form class="form" name="def" action="" method="POST" enctype="multipart/form-data">
                <h3>Período Lectivo</h3>
                <label class="lbl">Data de Início</label>
                <input type="date" name="datain" id="datain">
                <label class="lbl">Data de término</label>
                <input type="date" name="datafin" id="datafin">
                <button type="button">enviar</button>
                <h3>Semestre</h3>
                <label class="lbl">Período Lectivo</label>
                <select disabled>
                    <option></option>
                </select>
                <label class="lbl">Número do Semestre</label>
                <select>
                    <option>I</option>
                    <option>II</option>
                    <option>III</option>
                </select>
                <label class="lbl">Data de Início</label>
                <input type="date" name="datains" id="datains">
                <label class="lbl">Data de término</label>
                <input type="date" name="datafins" id="datafins">
                <button type="button">enviar</button>
            </form>
            <div class="tabela">
                <h3>Dados do Administrador</h3>
                <label>Nome do Usuário</label>
                <input type="text" name="nomeus" placeholder="Username" id="usname">
                <label>Senha do Usuário</label>
                <input type="password" name="pass" placeholder="Password" id="usname">
                <button type="button">enviar</button>
                
                <h3>Salas</h3>
                <label>Número</label>
                <input name="sala" type="number" id="sala">
                <button type="button">enviar</button>
            </div>
        </div>
    </body>
</html>