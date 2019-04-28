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
    <?php
    require_once './mycontrolle.php';
    ?>
    <body>
        <div class="tit">
            <h2>Definições do Administrador</h2>
        </div>
        <form class="perfil1"name="def" action="" method="POST" enctype="multipart/form-data">
            <div class="form" >
                <h3>Período Lectivo</h3>
                <label class="lbl">Data de Início</label>
                <input type="date" name="datain" id="datain">
                <label class="lbl">Data de término</label>
                <input type="date" name="datafin" id="datafin">
                <button type="submit" name="btPer">enviar</button>
                <h3>Semestre</h3>
                <label class="lbl">Período Lectivo</label>
                <select name="pel">
                    <?php
                    $pers = $conexao->prepare("select * from periodo");
                    $pers->execute();
                    while ($linha = $pers->fetch(PDO::FETCH_ASSOC)):
                        ?>
                        <option><?php echo $linha['ano']; ?></option>
                    <?php endwhile; ?>
                </select>
                <label class="lbl">Número do Trimestre</label>
                <select name="num">
                    <option>I</option>
                    <option>II</option>
                    <option>III</option>
                </select>
                <label class="lbl">Data de Início</label>
                <input type="date" name="datains" id="datains">
                <label class="lbl">Data de término</label>
                <input type="date" name="datafins" id="datafins">
                <button type="submit" name="bts">enviar</button>
            </div>
            <div class="tabela">

                <h3>Dados do Administrador</h3>
                <label>Nome do Usuário</label>
                <input type="text" name="nomeus" placeholder="Username" id="usname">
                <label>Senha do Usuário</label>
                <input type="password" name="pass" placeholder="Password" id="usname">
                <button type="submit">enviar</button>

                <h3>Salas</h3>
                <label>Nome da Sala</label>
                <input name="nrsala" type="text" id="sala">
                <label>Vagas</label>
                <input name="vagas" type="number">
                <button type="submit" name="btSala">enviar</button>
            </div >
        </form>
    </body>
</html>