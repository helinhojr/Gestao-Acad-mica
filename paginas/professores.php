<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Gestão Académica - Professores</title>
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
                <label>Foto</label>
                <input type="file" name="fotoProf" id="foto">
                <button type="submit" name="btProf"><i class="far fa-save"></i></button>
                <label>Professor</label>
                <select name = "rep">
                    <?php
                    include_once '../modelo/Professor.php';
                    $professores = $conexao->prepare("SELECT * FROM professor");
                    $professores->execute();
                    while ($linha = $professores->fetch(PDO::FETCH_ASSOC)):
                        ?>

                        <option value="<?php echo $linha['codigo']; ?>">
                            <?php
                            echo $linha['nome'];
                            ?></option>
                    <?php endwhile; ?>
                </select>
                <label>Disciplinas</label>
                <select name = "disciplinaS">
                    <?php
                    $disciplinas = $conexao->prepare("SELECT * FROM disciplina");
                    $disciplinas->execute();
                    while ($row = $disciplinas->fetch(PDO::FETCH_ASSOC)):
                        ?>
                        <option value="<?php echo $row['codigo']; ?>"><?php echo $row['nome']; ?></option>
                    <?php endwhile; ?>
                </select>
                <button type="submit" name="addDisc"><i class="fas fa-plus"></i></button>
            </form>     
            <div class="tabela">
                <table class="table" >
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Data de Nascimento</th>
                            <th>User</th>
                            <th>Senha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../modelo/Professor.php';
                        foreach (Professor::buscar() as $linha):
                            ?>
                            <tr>
                                <td><?php echo $linha['nome']; ?></td>
                                <td><?php echo $linha['email']; ?></td>
                                <td><?php echo $linha['nascimento']; ?></td>
                                <td><?php echo $linha['user']; ?></td>
                                <td><?php echo $linha['senha']; ?></td>
                                <td><a href="mycontrolle.php?bteditarP=<?php echo $linha['codigo']; ?>" class="verde"><i class="fas fa-edit"></i></a></td>
                                <td><a href="mycontrolle.php?bteliminarP=<?php echo $linha['codigo']; ?>" class="vermelho"><i class="fas fa-trash"></i></a></td>
                            </tr>
                            <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>