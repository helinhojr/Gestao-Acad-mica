<?php

session_start();
include '../controller/conexao.php';
$conexao = conectar();
if (isset($_POST['entraLogin'])) {
    $user = $_POST['user'];
    $pas = $_POST['pass'];
    $usuarios = $conexao->prepare("select * from usuario where user='$user' and senha='$pas'");
    $usuarios->execute();
    $us = $usuarios->fetchAll();
    foreach ($us as $user) {
        $cod = $user['codigoUs'];
        if (strcmp($user['painel'], "prof") == 0) {
            echo "<script>window.location='prof.php'</script>";
        } else if (strcmp($user['painel'], "est") == 0) {
            require_once 'est.php';
            $estudante = $conexao->prepare("select * from estudante where codigo='$cod'");
            $estudante->execute();
            while ($lnha = $estudante->fetch(PDO::FETCH_ASSOC)):
                $novocodigo = $lnha['codigo'];
            endwhile;
            echo "<script>window.location='est.php'</script>";
        }else if (strcmp($user['painel'], "admin") == 0) {
            echo "<script>window.location='paginas/admin.php'</script>";
        } else {
            echo "<script>window.location='paginas/sec.php'</script>";
        }
    }
}
if (isset($_POST['btDisc'])) {
    require_once '../modelo/Disciplina.php';
    $disciplina = new Disciplina();
    $nome = $_POST['nomeDisc'];
    $disciplina->setNome($nome);
    $disciplina->setStatus("activo");
    Disciplina::gravar($disciplina);
}
if (isset($_POST['btadicionarN'])) {
    
}
if (isset($_POST['btaddn'])) {
    require_once '../modelo/Nivel.php';
    $disc = $_POST['discNiv'];
    $nivel = $_POST['nivel'];
    Nivel::nivDisc($disc, $nivel);
}
if (isset($_POST['btProf'])) {
    require_once '../modelo/Professor.php';
    $formatos = array("png", "jpeg", "jpg", "JPEG", "JPG", "PNG");
    $extensao = pathinfo($_FILES['fotoProf']['name'], PATHINFO_EXTENSION);
    if (in_array($extensao, $formatos)) {
        $pasta = "../img/";
        $temp = $_FILES['fotoProf']['tmp_name'];
        $novonome = uniqid() . ".$extensao";
        $arquivo = $pasta . $novonome;
        if (move_uploaded_file($temp, $arquivo)) {
            $professor = new Professor();
            $nome = $_POST['nomeProf'];
            $nasc = $_POST['dataProf'];
            $gen = $_POST['generoProf'];
            $mor = $_POST['moradaProf'];
            $email = $_POST['emailProf'];
            $bi = $_POST['biProf'];
            $professor->setDataDeNasc($nasc);
            $professor->setEmail($email);
            $professor->setEndereco($mor);
            $professor->setGenero($gen);
            $professor->setNumeroBI($bi);
            $professor->setNome($nome);
            $professor->setFoto($arquivo);
            $professor = Professor::gravar($professor);
        } else {
            echo "<script>alert('Não foi possível efectuar a gravação da imagem!')</script>";
        }
    } else {
        echo "<script>alert('Extensão do arquivo não permitido!')</script>";
    }
}
if (isset($_POST['btSec'])) {
    require_once '../modelo/Secretario.php';
    $formatos = array("png", "jpeg", "jpg", "JPEG", "JPG", "PNG");
    $extensao = pathinfo($_FILES['fotoSec']['name'], PATHINFO_EXTENSION);
    if (in_array($extensao, $formatos)) {
        $pasta = "../img/";
        $temp = $_FILES['fotoSec']['tmp_name'];
        $novonome = uniqid() . ".$extensao";
        $arquivo = $pasta . $novonome;
        if (move_uploaded_file($temp, $arquivo)) {
            $secretario = new Secretario();
            $nome = $_POST['nomeSec'];
            $nasc = $_POST['dataSec'];
            $gen = $_POST['generoSec'];
            $mor = $_POST['moradaSec'];
            $email = $_POST['emailSec'];
            $bi = $_POST['biSec'];
            $secretario->setDataDeNasc($nasc);
            $secretario->setEmail($email);
            $secretario->setEndereco($mor);
            $secretario->setGenero($gen);
            $secretario->setNumeroBI($bi);
            $secretario->setNome($nome);
            $secretario->setFoto($arquivo);
            $secretario = Secretario::gravar($secretario);
        } else {
            echo "<script>alert('Não foi possível efectuar a gravação da imagem!')</script>";
        }
    } else {
        echo "<script>alert('Extensão do arquivo não permitido!')</script>";
    }
}
if (isset($_POST['btSala'])) {
    $nomeSala = $_POST['nrsala'];
    $vagas = $_POST['vagas'];
    $gravar = $conexao->prepare("INSERT INTO sala(nome,vagas) VALUES(:nome,:vaga)");
    $gravar->bindValue(":nome", $nomeSala);
    $gravar->bindValue(":vaga", $vagas);
    if ($gravar->execute()) {
        echo "<script>alert('Salvo com Sucesso!')</script>";
        header("definicoes.php");
    } else {
        echo "<script>alert('Não foi possivel efectuar a gravação!')</script>";
        header("definicoes.php");
    }
}
if (isset($_POST['addDisc'])) {
    require_once '../modelo/Professor.php';
    $disc = $_POST['disciplinaS'];
    $profex = $_POST['rep'];
    Professor::profDisc($disc, $profex);
}
if (isset($_POST['saveEst'])) {
    require_once '../modelo/Estudante.php';
    $formatos = array("png", "jpeg", "jpg", "JPEG", "JPG", "PNG");
    $extensao = pathinfo($_FILES['fotoEstu']['name'], PATHINFO_EXTENSION);
    if (in_array($extensao, $formatos)) {
        $pasta = "../img/";
        $temp = $_FILES['fotoEstu']['tmp_name'];
        $novonome = uniqid() . ".$extensao";
        $arquivo = $pasta . $novonome;
        try {
            move_uploaded_file($temp, $arquivo);
            $nomeEs = $_POST['nomecompleto'];
            $pai = $_POST['nomepai'];
            $mae = $_POST['nomemae'];
            $cont = $_POST['contactoAl'];
            $mail = $_POST['email'];
            $contaEn = $_POST['contactoEn'];
            $nasci = $_POST['datanascimento'];
            $morada = $_POST['morada'];
            $gen = $_POST['generoEs'];
            $regi = $_POST['regime'];
            $bi = $_POST['nrBI'];
            $estudante = new Estudante();
            $estudante->setNome($nomeEs);
            $estudante->setContacto($cont);
            $estudante->setContactoEnc($contaEn);
            $estudante->setDataDeNascimento($nasci);
            $estudante->setEmail($mail);
            $estudante->setEndereco($morada);
            $estudante->setFoto($arquivo);
            $estudante->setGenero($gen);
            $estudante->setNomeMae($mae);
            $estudante->setNomePai($pai);
            $estudante->setBi($bi);
            $estudante->setRegime($regi);
            Estudante::gravar($estudante);
        } catch (Exception $ex) {
            echo "<script>alert(" . $ex->getMessage() . ")</script>";
        }
    } else {
        echo "<script>alert('Extensão do arquivo não permitido!')</script>";
    }
}
if (isset($_POST['btNivel'])) {
    require_once '../modelo/Nivel.php';
    $nivel = new Nivel();
    $nivels = $_POST['nomeN'];
    $nivel->setNome($nivels);
    Nivel::gravar($nivel);
}
if (isset($_POST['btTurma'])) {
    require_once '../modelo/Turma.php';
    $nome = $_POST['nomeTurma'];
    $sala = $_POST['sala'];
    $nivel = $_POST['nivel'];
    $director = $_POST['diretor'];
    $turma = new Turma();
    $turma->setNome($nome);
    $turma->setDirector($director);
    $turma->setNivel($nivel);
    $turma->setSala($sala);
    Turma::gravar($turma);
}
if (isset($_POST['btTurmas'])) {
    require_once '../modelo/Estudante.php';
    $turma = $_POST['turmaEs'];
    $ests = $_POST['estuda'];
    $_SESSION['turma'] = $turma;
    $_SESSION['estudante'] = $ests;
    Estudante::enturmar($turma, $ests);
}
if (isset($_POST['btPer'])) {
    require_once '../modelo/PeriodoLectivo.php';
    $datF = $_POST['datafin'];
    $datI = $_POST['datain'];
    $periodo = new PeriodoLectivo();
    $periodo->setDatafinal($datF);
    $periodo->setDatainicio($datI);
    PeriodoLectivo::gravar($periodo);
}
if (isset($_POST['bts'])) {
    require_once '../modelo/Semestre.php';
    $datF = $_POST['datafins'];
    $datI = $_POST['datains'];
    $num = $_POST['num'];
    $pl = $_POST['pel'];
    $semestre = new Semestre();
    $semestre->setDataInicio($datI);
    $semestre->setDatafim($datF);
    $semestre->setNumero($num);
    $semestre->setPeriodo($pl);
    Semestre::gravar($semestre);
}
if (isset($_POST['btTDP'])) {
    require_once '../modelo/Professor.php';
    $turma = $_POST['ttu'];
    $disc = $_POST['discProf'];
    $prof = $_POST['dirPr'];
    $numero = $_POST['aval'];
    Professor::enturmar($disc, $prof, $turma, $numero);
}
if (isset($_GET['bteliminarP'])) {
    require_once '../modelo/Professor.php';
    $codigo = $_GET['bteliminarP'];
    Professor::eliminar($codigo);
}
if (isset($_GET['bteliminarE'])) {
    require_once '../modelo/Professor.php';
    $codigo = $_GET['bteliminarE'];
    Professor::eliminar($codigo);
}
if (isset($_GET['encerrar'])) {
    $_SESSION['logado'];
    $_SESSION['idUsuario'] = null;
    $_SESSION['idPr'] = null;
    $_SESSION['idSc'] = null;
    echo "<script>window.location='../index.php'</script>";
}
if (isset($_GET['bteliminarS'])) {
    require_once '../modelo/Secretario.php';
    $codigo = $_GET['bteliminarS'];
    Secretario::eliminar($codigo);
}
if (isset($_GET['bteliminarN'])) {
    require_once '../modelo/Nivel.php';
    $codigo = $_GET['bteliminarN'];
    Nivel::eliminar($codigo);
}
if (isset($_GET['bteliminarD'])) {
    require_once '../modelo/Disciplina.php';
    $codigo = $_GET['bteliminarD'];
    Disciplina::eliminar($codigo);
}
if (isset($_POST['btFinalizar'])) {
    require_once '../modelo/Nota.php';
    require_once '../modelo/Semestre.php';
    $semestre = Semestre::buscar()[0]['codigo'];
    if (isset($_SESSION['estudante']) && isset($_SESSION['turma'])) {
        $estudante = $_SESSION['estudante'];
        $turma = $_SESSION['turma'];
        Nota::adicionarNota($estudante, $turma, $semestre);
    }
}