<!DOCTYPE html>
<html>
    <?php
    session_start();
    require_once '../modelo/Turma.php';
    $turmas = Turma::buscarPrTE($_SESSION['idPr']);
    ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html" charset="iso-8859-1">
        <title>Gestao Académica - Professor</title>
        <link rel="icon" href="../img/notebook.png" >
        <link type="text/css" rel="stylesheet" href="../css/iframe.css">
        <link type="text/css" rel="stylesheet" href="../css/forms.css">
        <link type="text/css" rel="stylesheet" href="../css/all.css">
    </head>
    <body>
        <div class="tit">
            <h2>Dísponibilizando as notas</h2>
        </div>
        <div class="tab">
            <table class="table1" border="0" width="6" cellpadding="4">
                <thead>
                    <tr>
                        <th>Estudante</th>
                        <th>Turma</th>
                        <th>Disciplina</th>
                        <th>Media</th>
                        <th>Estado</th>
                        <th>Classe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($turmas as $tr): ?>
                        <tr>
                            <td><?php echo $tr['d'] ?></td>
                            <td><?php echo $tr['a'] ?></td>
                            <td><?php echo $tr['c'] ?></td>
                            <td><?php echo $tr['a'] ?></td>
                            <td><?php echo $tr['a'] ?></td>
                            <td><?php echo $tr['nivel'] ?></td>
                            <td><a href="mycontrolle.php?bteditarN=<?php echo $linha['e']; ?>" class="verde"><i class="fas fa-edit"></i></a></td>
                            <td><a href="mycontrolle.php?bteliminarN=<?php echo $linha['e']; ?>" class="vermelho"><i class="fas fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form class="formulario" method="post">
                <label>Nome do Estudante</label>
                <input class="pesq" type="text" name="nome" id="nome">
                <label>Nota</label>
                <select class="pesq">
                </select>
                <label>Valor</label>
                <input class="pesq" type="number" max="2" name="nome" id="nome">
                <button type="submit" ><i class="fas fa-sync-alt"></i></button>
            </form>
        </div>
    </body>
</html>