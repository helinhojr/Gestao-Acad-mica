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
            <form class="form" name="turma" action="../controller/config.php" method="POST" enctype="multipart/form-data">
                <label for="nomes">Nome</label>
                <input type="text" name="nome" id="name">
                <label for="classe">Nível</label>
                <select name="nivel">
                    
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
                    
                </select>    
                <button>enviar</button>
                <h3>Professores - Turmas</h3>
                <label>Turmas</label>
                <select>
                </select>
                <label>Professor</label>
                <select>
                </select>
                <label>Disciplina</label>
                <select>
                </select>
                <button><i class="fas fa-plus"></i></button>
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
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
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