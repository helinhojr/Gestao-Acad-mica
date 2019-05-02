<!DOCTYPE html>
<html>
    <?php 
    session_start();
    require_once '../modelo/Estudante.php';
    $estudante= Estudante::buscarEst($_SESSION['idUsuario']);
    $turEs;
    foreach ($estudante as $est){
    echo "<script>alert(".$est['nome'].")</script>";    
    $turEs= Estudante::buscarProf($est['codigo']);
    }
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
            <h2>Meus Professores Atuais</h2>
        </div>
        <div class="tab">
            <table class="table" border="0" width="6" cellpadding="4">
                <thead>
                    <tr>
                        <th>Professor(a)</th>
                        <th>Disciplina</th>
                        <th>Número de Avaliações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($turEs as $tures):
                    ?>
                    <tr>
                        <td><?php echo $tures['a']; ?></td>
                        <td><?php echo $tures['b']; ?></td>
                        <td><?php echo $tures['c']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </body>
</html>