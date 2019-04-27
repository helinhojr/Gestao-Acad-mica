<!DOCTYPE html>
<html>
    <?php
    session_start();
    require_once '../modelo/Turma.php';
    $turmas = Turma::buscarPrT($_SESSION['idPr']);
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
            <table class="table" border="0" width="6" cellpadding="4">
                <thead>
                    <tr>
                        <th>Turma</th>
                        <th>Disciplina</th>
                        <th>Estudante</th>
                        <th>Notas</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <form class="formulario" method="post">
                <label>Turma</label>
                <select class="pesq">
                    <?php foreach ($turmas as $turma): ?>
                        <option value="<?php echo $turma['turma'] ?>"><?php echo $turma['a'] ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" ><i class="fas fa-sync-alt"></i></button>

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