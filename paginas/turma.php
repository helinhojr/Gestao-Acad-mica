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
                <input type="text" name="nomeTurma" id="name">
                <label for="classe">Nível</label>
                <select name="nivel">
                    <?php
                    $niv = $conexao->prepare("Select * from nivel");
                    $niv->execute();
                    while ($linha = $niv->fetch(PDO::FETCH_ASSOC)):
                        ?>
                        <option value="<?php echo $linha['nome']; ?>"><?php echo $linha['nome']; ?></option>
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
                    require_once '../modelo/Professor.php';
                    foreach (Professor::buscar() as $linha):
                        ?>
                        <option value="<?php echo $linha['codigo']; ?>"><?php echo $linha['nome']; ?></option>
                    <?php endforeach; ?>
                </select>    
                <button type="submit" name="btTurma"><i class="far fa-save"></i></button>
                <h3>Professores - Turmas</h3>
                <label>Turma</label>
                <select name="ttu">
                    <?php
                    require_once '../modelo/Turma.php';
                    foreach(Turma::buscar() as $linha):
                        ?>
                    <option value="<?php echo $linha['codigo']?>"><?php echo $linha['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label>Professor</label>
                <select name="dirPr">
                    <?php
                    require_once '../modelo/Professor.php';
                    foreach (Professor::buscar() as $linha):
                        ?>
                        <option value="<?php echo $linha['codigo']; ?>"><?php echo $linha['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
                <label>Disciplina</label>
                <select name="discProf">
                    <?php
                    require_once '../modelo/Disciplina.php';
                    foreach (Disciplina::buscar() as $linha):
                        ?>
                        <option value="<?php echo $linha['codigo']; ?>"><?php echo $linha['nome']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="btTDP"><i class="fas fa-plus"></i></button>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (Turma::buscar() as $lee):
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
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>    
        <script src="../js/jss.js"></script>
    </body>
</html>