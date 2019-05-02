<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Semestre
 *
 * @author Helinho
 */
class Semestre {

    private $codigo;
    private $numero;
    private $periodo;
    private $dataInicio;
    private $datafim;
    private $estado="activo";

    function getCodigo() {
        return $this->codigo;
    }

    function getNumero() {
        return $this->numero;
    }

    function getPeriodo() {
        return $this->periodo;
    }

    function getDataInicio() {
        return $this->dataInicio;
    }

    function getDatafim() {
        return $this->datafim;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
    }

    function setDatafim($datafim) {
        $this->datafim = $datafim;
    }

    public static function verificar($nome,$ano,$df) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $niveis = $conexao->prepare("select nome,periodo from semestre where nome=:nom and periodo=:per and dataFinal<:df");
        $niveis->bindValue(":nom", $nome);
        $niveis->bindValue(":per", $ano);
        $niveis->bindValue(":df", $df);
        $niveis->execute();
        if ($niveis->rowCount()>0) {
            return 0;
        } else {
            return 1;
        }
    }
    public static function buscar(){
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca=$conexao->prepare("select * from semestre where estado='activo'");
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function gravar(Semestre $sm) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $gravar = $conexao->prepare("INSERT INTO semestre(nome,dataInicio,dataFinal,estado,periodo) VALUES(:nome,:final,:inicio,:estado,:per)");
        $gravar->bindValue(":nome", $sm->getNumero());
        $gravar->bindValue(":final", $sm->getDatafim());
        $gravar->bindValue(":inicio", $sm->getDatainicio());
        $gravar->bindValue(":estado", $sm->getEstado());
        $gravar->bindValue(":per", $sm->getPeriodo());
        $valor = Semestre::verificar($sm->getNumero(),$sm->getPeriodo(),$sm->getDataInicio());
        if ($valor == 0) {
            echo "<script>alert('Impossível fazer a gravação, semestre já cadastrado!')</script>";
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

}
