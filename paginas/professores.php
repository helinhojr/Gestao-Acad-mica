<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Gestão Académica - Professores</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="icon" href="../img/notebook.png" >
        <link rel="stylesheet" href="../css/iframe.css">
    </head>
    <?php
    require_once './mycontrolle.php';
    ?>
    <body>
        <div class="tit">
            <h2>Professores</h2>
        </div>
        <div class="perfil1">
            <form class="form" name="professores" action="" method="POST" enctype="multipart/form-data">
                <label class="lbl">Nome Completo</label>
                <input type="text" name="nomeProf" id="nomecompleto" placeholder="Nome Completo">
                <label class="lbl">Data de Nascimento</label>
                <input type="date" name="dataProf" id="datanascimento">
                <label class="lbl">E-mail</label>
                <input type="email" name="emailProf" id="email">
                <label>Género</label>
                <select name="generoProf">
                    <option>Masculino</option>
                    <option>Feminino</option>
                </select>
                <label class="lbl">Número do B.I.</label>
                <input type="text" name="biProf" id="turma" placeholder="Número do BI">
                <label class="lbl">Endereço</label>
                <input type="text" name="moradaProf" id="morada">
                <label class="lbl">Nome Usuário</label>
                <input type="text" name="userProf" id="user">
                <label class="lbl">Senha</label>
                <input type="password" name="passProf" id="pass">
                <button type="submit" name="btProf"><i class="far fa-save"></i></button>

                <label>Professor</label>
                <select name = "professor" disabled="">
                    <option><?php
                        $professores = $conexao->prepare("SELECT * FROM professor");
                        $professores->execute();
                        $profs = $professores->fetchAll(PDO::FETCH_ASSOC);
                        echo $profs[count($profs) - 1]['nome'] . "  " . $profs[count($profs) - 1]['bi'];
                        ?></option>
                </select>
                <label>Disciplinas</label>
                <select name = "disciplina">
                    <?php
                    $disciplinas = $conexao->prepare("SELECT * FROM disciplina");
                    $disciplinas->execute();
                    while ($row = $disciplinas->fetch(PDO::FETCH_ASSOC)):
                        ?>
                        <option><?php echo $row['nome']; ?></option>
                    <?php endwhile; ?>
                </select>
                <button type="submit">adicionar</button>
            </form>     
            <div class="tabela">
                <table class="table" >
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Data de Nascimento</th>
                            <th>Número do BI</th>
                            <th>User</th>
                            <th>Senha</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $professores = $conexao->prepare("SELECT * FROM professor");
                        $professores->execute();
                        while ($linha = $professores->fetch(PDO::FETCH_ASSOC)):
                            ?>
                            <tr>
                                <td><?php echo $linha['codigo'] ?></td>
                                <td><?php echo $linha['nome'] ?></td>
                                <td><?php echo $linha['email'] ?></td>
                                <td><?php echo $linha['nascimento'] ?></td>
                                <td><?php echo $linha['bi'] ?></td>
                                <td><?php echo $linha['user'] ?></td>
                                <td><?php echo $linha['senha'] ?></td>
                                <td></td>
                                <td><button><i class="fas fa-edit"></i></button></td>
                                <td><button><i class="fas fa-trash"></i></button></td>
                            </tr>
                            <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>