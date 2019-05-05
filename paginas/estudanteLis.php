<!DOCTYPE html>
<html>
    <?php
    require_once '../modelo/Estudante.php';
    require_once './mycontrolle.php';
    $estudantes = Estudante::buscarDados(date("Y"));
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
        <div class="tabb">
            <table class="table1" border="0" width="6" cellpadding="4">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data de Nascimento</th>
                        <th>Contacto</th>
                        <th>Pai</th>
                        <th>Mãe</th>
                        <th>Contacto Do Encarregado</th>
                        <th>Turma</th>
                        <th>Classe</th>
                        <th>Ano</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($estudantes as $tr): ?>
                        <tr>
                            <td><?php echo $tr['e'] ?></td>
                            <td><?php echo $tr['nascimento'] ?></td>
                            <td><?php echo $tr['contacto'] ?></td>
                            <td><?php echo $tr['pai'] ?></td>
                            <td><?php echo $tr['mae'] ?></td>
                            <td><?php echo $tr['contenc'] ?></td>
                            <td><?php echo $tr['tr'] ?></td>
                            <td><?php echo $tr['nivel'] ?></td>
                            <td><?php echo $tr['a'] ?></td>
                            <td><a href="mycontrolle.php?bteditarEs=<?php echo $tr['cod']; ?>" class="verde"><i class="fas fa-edit"></i></a></td>
                            <td><a href="mycontrolle.php?bteliminarEs=<?php echo $tr['cod']; ?>" class="vermelho"><i class="fas fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>