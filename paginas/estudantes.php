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
            <div class="tabela">
                <h3>Passo 2</h3>
                <label>Estudante</label>
                <select disabled>
                    <option><?php
                        include_once '../modelo/Estudante.php';
                        $professores = $conexao->prepare("SELECT * FROM estudante");
                        $professores->execute();
                        $profs = $professores->fetchAll(PDO::FETCH_ASSOC);
                        echo $profs[count($profs) - 1]['nome'] . "  " . $profs[count($profs) - 1]['bi'];
                        ?></option>
                </select>
                <label>Turma</label>
                <select name="turmaEs">
                     <?php
                    $turmas = $conexao->prepare("SELECT * FROM turma");
                    $turmas->execute();
                    while ($row = $turmas->fetch(PDO::FETCH_ASSOC)):
                        ?>
                        <option><?php echo $row['nome']; ?></option>
                    <?php endwhile; ?>
                </select>
                <button type="submit" name="enturm"><i class="far fa-save"></i></button>
                <h3>Passo 3</h3>
                <label>Semestre</label>
                <select name="sesmestre" disabled>
                    <option></option>
                </select>
                <button type="submit"><i class="fas fa-chevron-right"></i></button>

            </div>
        </div>
        <div class="roda">

        </div>
    </body>
</html>