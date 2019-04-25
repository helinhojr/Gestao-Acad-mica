<!DOCTYPE html>
<html>
    <head>
        <title>Gestão Académica - Turmas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="icon" href="../img/notebook.png" >
        <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="../css/iframe.css">
    </head>
    <?php
    require_once './mycontrolle.php';
    ?>
    <body>
        <div class="tit">
            <h2>Turmas</h2>
        </div>
        <div class="perfil1">
            <form class="form" name="turma" method="POST" enctype="multipart/form-data">
                <label for="nomes">Nome</label>
                <input type="text" required="" name="nomeTurma" id="name">
                <label for="classe">Nível</label>
                <select name="nivel">
                    <?php
                    $niv = $conexao->prepare("Select * from nivel");
                    $niv->execute();
                    while ($linha = $niv->fetch(PDO::FETCH_ASSOC)):
                    ?>
                    <option><?php echo $linha['nome']; ?></option>
                    <?php endwhile; ?>
                </select>    
                <label for="sala">Sala</label>
                <select name="sala">
                    <?php
                    $salas = $conexao->prepare("Select * from sala");
                    $salas->execute();
                    while ($linha = $salas->fetch(PDO::FETCH_ASSOC)):
                    ?>
                    <option><?php echo $linha['nome']; ?></option>
                    <?php endwhile; ?>
                </select>    
                <label for="diretor">Director de Turma</label>
                <select name="diretor">
                    <?php
                    $profs = $conexao->prepare("Select * from professor");
                    $profs->execute();
                    while ($linha = $profs->fetch(PDO::FETCH_ASSOC)):
                    ?>
                    <option><?php echo $linha['nome']; ?></option>
                    <?php endwhile; ?>
                </select>    
                <button type="submit" name="btTurma"><i class="far fa-save"></i></button>
                <h3>Professores - Turmas</h3>
                <label>Turma</label>
                <select>
                    <?php
                    $turm = $conexao->prepare("Select * from turma");
                    $turm->execute();
                    while ($linha = $turm->fetch(PDO::FETCH_ASSOC)):
                    ?>
                    <option><?php echo $linha['nome']; ?></option>
                    <?php endwhile; ?>
                </select>
                <label>Professor</label>
                <select>
                    <?php
                    $profs = $conexao->prepare("Select * from professor");
                    $profs->execute();
                    while ($linha = $profs->fetch(PDO::FETCH_ASSOC)):
                    ?>
                    <option id="<?php echo $linha['codigo']; ?>"><?php echo $linha['nome']; ?></option>
                    <?php endwhile; ?>
                </select>
                <label>Disciplina</label>
                <select name="discProf">
                    <?php
                    $profs = $conexao->prepare("Select nome,cod_disc from professor_disciplina join disciplina on cod_disc=codigo where cod_prof='AF56616'");
                    $profs->execute();
                    while ($linha = $profs->fetch(PDO::FETCH_ASSOC)):
                    ?>
                    <option id="<?php echo $linha['cod_disc']; ?>"><?php echo $linha['nome']; ?></option>
                    <?php endwhile; ?>
                </select>
                <button type="submit"><i class="fas fa-plus"></i></button>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $turm1 = $conexao->prepare("select * from turma");
                        $turm1->execute();
                        while ($lee = $turm1->fetch(PDO::FETCH_ASSOC)):
                        ?>
                        <tr>
                            <td><?php echo $lee['codigo']; ?></td>
                            <td><?php echo $lee['nome']; ?></td>
                            <td><?php echo $lee['sala']; ?></td>
                            <td><?php echo $lee['director']; ?></td>
                            <td><?php echo $lee['nivel']; ?></td>
                            <td><?php echo $lee['ano']; ?></td>
                            <td><button type="button" class="verde"><i class="fas fa-edit"></i></button><button type="button" class="vermelho"><i class="fas fa-trash"></i></button></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>
        </div>    
        <script src="../js/jss.js"></script>
    </body>
</html>