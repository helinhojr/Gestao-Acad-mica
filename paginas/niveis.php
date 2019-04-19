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
    $busca = "select * from disciplina";
    $resultado = $conexao->prepare($busca);
    $resultado->execute();
    ?>
    <body>
        <div class="tit">
            <h2>Níveis</h2>
        </div>
        <div class="perfil1">
            <form class="form" name="níveis" method="POST" enctype="multipart/form-data">
                <h3>Cadastro de Níveis</h3>
                <label for="nomes">Nome</label>
                <input type="text" name="nome" id="nome">
                <label for="disciplinas">Disciplinas</label>
                    <select id="disciplinas">
                        <?php
                        while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)):
                            ?>
                        <option><?php echo $linha['nome']; ?></option>
                            <?php
                        endwhile;
                        ?>
                    </select>
                <button type="submit" name="btadicionarN"><i class="fas fa-plus"></i></button>
                <button type="submit" name="btNivel"><i class="far fa-save"></i></button>
            </form>
            <div class="tabela">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nível</th>
                            <th>Data de Cadastro</th>
                            <th>Disciplinas</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
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
        <script src="../js/jss.js"></script>
    </body>
</html>
