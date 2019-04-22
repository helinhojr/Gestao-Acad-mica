<?php

include '../controller/conexao.php';
$conexao = conectar();
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
if (isset($_POST['btNivel'])) {
    
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
    $gravar = $conexao->prepare("INSERT INTO sala(nome) VALUES(:nome)");
    $gravar->bindValue(":nome", $nomeSala);
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
    $buscarDisciplina = $conexao->prepare("SELECT codigo FROM disciplina WHERE nome='$disc' limit 1");
    $buscarDisciplina->execute();
    $dado = $buscarDisciplina->fetchAll(PDO::FETCH_ASSOC);
    Professor::profDisc($dado[count($dado) - 1]['codigo']);
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
            $estudante->setRegime($regi);
            Estudante::gravar($estudante);
        } catch (Exception $ex) {
            echo "<script>alert(" . $ex->getMessage() . ")</script>";
        }
    } else {
        echo "<script>alert('Extensão do arquivo não permitido!')</script>";
    }
}      
if(isset($_POST['btNivel'])){
    require_once '../modelo/Nivel.php';
    $nivel = new Nivel();
    $nivels=$_POST['nomeN'];
    $nivel->setNome($nivels);
    Nivel::gravar($nivel);
}