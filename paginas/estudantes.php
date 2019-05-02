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
    <?php
    require_once './mycontrolle.php';
    ?>
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
                <input required type="text" name="nomepai" id="nomepai">
                <label class="lbl">Número do BI</label>
                <input required type="text" name="nrBI" id="bi">
                <label class="lbl">Nome da mãe</label>
                <input type="text" name="nomemae" id="nomepai">
                <label required class="lbl">Email</label>
                <input type="email" name="email" id="email">
                <label class="lbl">Contacto do Aluno</label>
                <input type="tel" name="contactoAl" id="cont">
                <label class="lbl">Contacto do Encarregado</label>
                <input type="tel" name="contactoEn" id="contEn">
                <label class="lbl">Data de Nascimento</label>
                <input type="date" name="datanascimento" id="datanascimento" placeholder="--/--/----">
                <label class="lbl">Endereço</label>
                <input type="text" name="morada" id="morada">
                <label class="lbl">Género</label>
                <select name="generoEs">
                    <option>Masculino</option>
                    <option>Feminino</option>
                </select>
                <label class="lbl">Regime</label>
                <select name="regime">
                    <option>Laboral</option>
                    <option>Pós - Laboral</option>
                </select>
                <label>Foto</label>
                <input type="file" name="fotoEstu" id="foto">
                <button type="submit" name="saveEst"><i class="far fa-save"></i></button>
            </form>
            <form method="POST" class="tabela" enctype="multipart/form-data">
                <h3>Passo 2</h3>
                <label>Estudante</label>
                <select name="estuda">
                    <?php
                    require_once '../modelo/Estudante.php';
                    if (isset($_SESSION['estAct'])):
                        $profs = Estudante::buscarEst($_SESSION['estAct']);
                    ?>
                    <option value="<?php echo $profs[0]['codigo']; ?>"> <?php
                        echo $profs[0]['nome'];
                        ?></option>
                    <?php endif; ?>
                </select>
                <label>Turma</label>
                <select name="turmaEs">
                    <?php
                    require_once '../modelo/Turma.php';
                    foreach (Turma::buscar() as $row):
                        ?>
                        <option value="<?php echo $row['codigo']; ?>"><?php echo $row['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="btTurmas"><i class="far fa-save"></i></button>
                <h3>Passo 3</h3>
                <label>Trimestre</label>
                <select  name="sem" disabled="">
                    <?php
                    require_once '../modelo/Semestre.php';
                    foreach (Semestre::buscar() as $row):
                        ?>
                        <option value="<?php echo $row['codigo']; ?>"><?php echo $row['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="btFinalizar"><i class="fas fa-chevron-right"></i></button>

            </form>
        </div>
    </body>
</html>