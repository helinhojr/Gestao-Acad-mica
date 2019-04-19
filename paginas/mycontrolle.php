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
    $professor = new Professor();
    $nome = $_POST['nomeProf'];
    $nasc = $_POST['dataProf'];
    $gen = $_POST['generoProf'];
    $mor = $_POST['moradaProf'];
    $us = $_POST['userProf'];
    $pass = $_POST['passProf'];
    $email = $_POST['emailProf'];
    $bi = $_POST['biProf'];
    $professor->setDataDeNasc($nasc);
    $professor->setEmail($email);
    $professor->setEndereco($mor);
    $professor->setGenero($gen);
    $professor->setNumeroBI($bi);
    $professor->setNome($nome);
    $professor->setSenha($pass);
    $professor->setUser($us);
    $professor = Professor::gravar($professor);
}
if (isset($_POST['btSec'])) {
    require_once '../modelo/Secretario.php';
    $secretario = new Secretario();
    $nome = $_POST['nomeSec'];
    $nasc = $_POST['dataSec'];
    $gen = $_POST['generoSec'];
    $mor = $_POST['moradaSec'];
    $us = $_POST['userSec'];
    $pass = $_POST['passSec'];
    $email = $_POST['emailSec'];
    $bi = $_POST['biSec'];
    $secretario->setDataDeNasc($nasc);
    $secretario->setEmail($email);
    $secretario->setEndereco($mor);
    $secretario->setGenero($gen);
    $secretario->setNumeroBI($bi);
    $secretario->setNome($nome);
    $secretario->setSenha($pass);
    $secretario->setUser($us);
    $secretario = Secretario::gravar($secretario);
}
if (isset($_POST['btSala'])) {
    $nomeSala = $_POST['nrsala'];
    $gravar = $conexao->prepare("INSERT INTO sala(nome) VALUES(:nome)");
    $gravar->bindValue(":nome", $nomeSala);
    if ($gravar->execute()) {
        echo "<script>alert('Salvo com Sucesso!')</script>";
        header("definicoes.php");
    }else{
        echo "<script>alert('Não foi possivel efectuar a gravação!')</script>";
        header("definicoes.php");
    }
}