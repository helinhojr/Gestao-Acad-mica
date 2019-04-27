<!DOCTYPE html>
<html>
    <head>
        <title>Gestão Académica - Disciplinas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="icon" href="../img/notebook.png" >
        <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="../css/iframe.css">
    </head>
    <body>
        <div class="tit">
            <h2>Turmas</h2>
        </div>
        <div class="perfil1">
            <form class="form" name="disciplinas" method="POST" enctype="multipart/form-data">
                <h3>Cadastro de Disciplinas</h3>
                <label for="nomes">Nome</label>
                <input type="text" name="nomeDisc" id="nomes">
                <button type="submit" name="btDisc"><i class="far fa-save"></i></button>
            </form>
            <div class="tabela">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Disciplina</th>
                            <th>Data de Cadastro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../modelo/Disciplina.php';
                        foreach (Disciplina::buscar() as $linha):
                            ?>
                            <tr>
                                <td><?php echo $linha['codigo'] ?></td>
                                <td><?php echo $linha['nome'] ?></td>
                                <td><?php echo $linha['data'] ?></td>
                                <td><button type="button" class="verde"><i class="fas fa-edit"></i></button><button type="button" class="vermelho"><i class="fas fa-trash"></i></button></td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>    
        <script src="../js/jss.js"></script>
    </body>
</html>
