<!DOCTYPE html>
<html>
    <?php
    session_start();
    require_once '../modelo/Turma.php';
    $turmas= Turma::buscarPrT($_SESSION['idPr']);
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
            <h2>Disciplinas leccionadas</h2>
        </div>
        <div class="tabb">
            <table class="table1" border="0" width="6" cellpadding="4">
                <thead>
                    <tr>
                        <th>Disciplina</th>
                        <th>Turma</th>
                        <th>Classe</th>
                        <th>Número de estudantes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($turmas as $turma): ?>
                    <tr>
                        <td><?php echo $turma['c']; ?></td>
                        <td><?php echo $turma['a']; ?></td>
                        <td><?php echo $turma['nivel']; ?></td>
                        <td><?php echo Turma::buscarNumero($turma['tr']);?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </body>
</html>