<!DOCTYPE html>
<html>
    <head>
        <title>Gestão Académica - Níveis</title>
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
            <h2>Níveis</h2>
        </div>
        <div class="perfil1">
            <form class="form" name="níveis" method="POST" enctype="multipart/form-data">
                <h3>Cadastro de Níveis</h3>
                <label for="nomes">Nome</label>
                <input type="text" name="nomeN" id="nome">
                <button type="submit" name="btNivel"><i class="far fa-save"></i></button>
                <label>Nível</label>
                <select name="nivel">
                    <?php
                    require_once '../modelo/Nivel.php';
                    foreach (Nivel::buscar() as $linha):
                    ?>
                    <option><?php echo $linha['nome']; ?></option>
                    <?php endforeach;?>
                </select>
                <label for="disciplinas">Disciplinas</label>
                <select name="discNiv" id="disciplinas">
                    <?php
                    require_once '../modelo/Disciplina.php';
                    foreach (Disciplina::buscar() as $linha):
                        ?>
                        <option value="<?php echo $linha['codigo']; ?>"><?php echo $linha['nome']; ?></option>
                        <?php
                    endforeach;
                    ?>
                </select>
                <button type="submit" name="btaddn"><i class="fas fa-plus"></i></button>
            </form>
            <div class="tabela">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nível</th>
                            <th>Data de Cadastro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (Nivel::buscar() as $linha):
                            ?>
                            <tr>
                                <td><?php echo $linha['nome'] ?></td>
                                <td><?php echo $linha['data'] ?></td>
                                <td></td>
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
