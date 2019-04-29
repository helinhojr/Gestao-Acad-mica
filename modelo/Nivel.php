<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nivel
 *
 * @author Helinho
 */
class Nivel {

    private $nome;
    private $status = "activo";
    private $data;

    function getStatus() {
        return $this->status;
    }

    function getData() {
        return $this->data;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setData($data) {
        $this->data = $data;
    }

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    public static function verificar($nome) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $niveis = $conexao->prepare("select nome from nivel");
        $niveis->execute();
        $resultado = 0;
        while ($nomes = $niveis->fetch(PDO::FETCH_ASSOC)) {
            if (strcmp($nome, $nomes['nome']) == 0)
                $resultado++;
        }
        if ($resultado == 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function buscar() {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("select * from nivel where estado='activo'");
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function gravar(Nivel $nivel) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $data = date("d/m/Y");
        $gravar = $conexao->prepare("INSERT INTO nivel(nome,estado,data) VALUES(:nome,:estado,:data)");
        $gravar->bindValue(":nome", $nivel->getNome());
        $gravar->bindValue(":estado", $nivel->getStatus());
        $gravar->bindValue(":data", $data);
        $valor = Nivel::verificar($nivel->getNome());
        if ($valor == 0) {
            echo "<script>alert('Impossível fazer a gravação, nível já cadastrado!')</script>";
        } else {
            if ($gravar->execute()) {
                echo "<script>alert('Salvo com Sucesso!')</script>";
                header("../paginas/disciplinas.php");
            } else {
                echo "<script>alert('Não foi possível efectuar a gravação!')</script>";
                header("../paginas/disciplinas.php");
            }
        }
    }

    public static function veriND($disc, $nivel) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $gravar=$conexao->prepare("select * from nivel_disciplina where disc=:disc and nivel=:niv");
        $gravar->bindValue(":disc", $disc);
        $gravar->bindValue(":niv", $nivel);
        if($gravar->rowCount()>0){
            return 0;
        }else{
            return 1;
        }
    }

    public static function nivDisc($disc, $nivel) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $valor= Nivel::veriND($disc, $nivel);
        if ($valor == 0) {
            echo "<script>alert('Impossível adicionar, essa disciplina já foi associada ao nível')</script>";
        } else {
            $gravar = $conexao->prepare("INSERT INTO nivel_disciplina VALUES(:disc,:niv)");
            $gravar->bindValue(":disc", $disc);
            $gravar->bindValue(":niv", $nivel);
            if ($gravar->execute()) {
                echo "<script>alert('Salvo com Sucesso!')</script>";
                header("../paginas/professores.php");
            } else {
                echo "<script>alert('Não foi possível efectuar a gravação!')</script>";
                header("../paginas/professores.php");
            }
        }
    }

}
