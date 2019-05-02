<!DOCTYPE html>
<html>
    <?php
    require_once '../modelo/Estudante.php';
    session_start();
    $estuda=$_SESSION['idUsuario'];
    $prof=$_SESSION['idPr'];
    $sec=$_SESSION['idSc'];
    $resultado= Estudante::verebuscar($estuda, $prof, $sec);
    ?>
    <head>
        <title>Gestão Académica - Perfil</title>
        <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="../css/iframe.css">
        <link rel="stylesheet" href="../css/forms.css">
    </head>
    <body>
        <div class="tit">
            <h2>O Meu Perfil</h2>
        </div>
        <div class="perfil">
            <div class="info">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Dados do Utilizador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($resultado as $res):
                        ?>
                        <tr>
                            <td>Código:</td>
                            <td><?php echo $res['codigo'] ?></td>
                        </tr>
                        <tr>
                            <td>Nome Completo: </td>
                            <td><?php echo $res['nome'] ?></td>
                        </tr>
                        <tr>
                            <td>Data de Nascimento:</td>
                            <td><?php echo $res['nascimento'] ?></td>
                        </tr>
                        <tr>
                            <td>Usuário</td>
                            <td><?php echo $res['user'] ?></td>
                        </tr>
                        <tr>
                            <td>Senha</td>
                            <td><?php echo $res['senha'] ?></td>
                        </tr>
                        <tr>
                            <td>Género:</td>
                            <td><?php echo $res['genero'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="foto">
                <div class="escopo-img">
                    <img class="fotodeperfil" src="<?php echo $res['foto'] ?>">
                </div>
                <?php endforeach;?>
                <div class="escopo-bt">
                    <button type="button">Editar Perfil</button>
                </div>
            </div>
        </div>
        <script src="../js/jss.js"></script>
    </body>
</html>
