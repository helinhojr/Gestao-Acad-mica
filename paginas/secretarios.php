<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Gestão Académica - Secretário</title>
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="icon" href="../img/notebook.png" >
        <link rel="stylesheet" href="../css/iframe.css">
        <!--<link rel="stylesheet" href="../css/bootstrap.css">-->
    </head> 
    <?php
    require_once './mycontrolle.php';
    ?>
    <body>
        <div class="tit">
            <h2>Secretários</h2>
        </div>
        <div class="perfil1">
            <form class="form" name="professores" action="" method="POST" enctype="multipart/form-data">
                <label class="lbl">Nome Completo</label>
                <input type="text" name="nomeSec" id="nomecompleto" placeholder="Nome Completo">
                <label class="lbl">Data de Nascimento</label>
                <input type="date" name="dataSec" id="datanascimento">
                <label class="lbl">E-mail</label>
                <input type="email" name="emailSec" id="email">
                <label>Género</label>
                <select name="generoSec">
                    <option>Masculino</option>
                    <option>Feminino</option>
                </select>
                <label class="lbl">Número do B.I.</label>
                <input type="text" name="biSec" id="turma" placeholder="Número do BI">
                <label class="lbl">Endereço</label>
                <input type="text" name="moradaSec" id="morada">
                <label>Foto</label>
                <input type="file" name="fotoSec" id="foto">
                <button type="submit" name="btSec"><i class="far fa-save"></i></button>
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
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                           require_once '../modelo/Secretario.php';
                           foreach(Secretario::buscar() as $linha):
                            ?>
                            <tr>
                                <td><?php echo $linha['codigo'] ?></td>
                                <td><?php echo $linha['nome'] ?></td>
                                <td><?php echo $linha['email'] ?></td>
                                <td><?php echo $linha['nascimento'] ?></td>
                                <td><?php echo $linha['bi'] ?></td>
                                <td><?php echo $linha['user'] ?></td>
                                <td><?php echo $linha['senha'] ?></td>
                                <td><button class="verde"><i class="fas fa-edit"></i></button></td>
                                <td><button class="vermelho"><i class="fas fa-trash"></i></button></td>
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