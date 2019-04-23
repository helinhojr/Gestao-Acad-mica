<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PeriodoLectivo
 *
 * @author Helinho
 */
class PeriodoLectivo {
    private $ano;
    private $datainicio;
    private $datafinal;
    private $estado="activo";
    
    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

        function __construct() {
        
    }
    function getAno() {
        return $this->ano;
    }

    function setAno($ano) {
        $this->ano = $ano;
    }

        function getDatainicio() {
        return $this->datainicio;
    }

    function getDatafinal() {
        return $this->datafinal;
    }


    function setDatainicio($datainicio) {
        $this->datainicio = $datainicio;
    }

    function setDatafinal($datafinal) {
        $this->datafinal = $datafinal;
    }

    public static function verificar($nome) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $niveis = $conexao->prepare("select ano from Periodo");
        $niveis->execute();
        $resultado = 0;
        while ($nomes = $niveis->fetch(PDO::FETCH_ASSOC)) {
            if (strcmp($nome, $nomes['ano'])==0)
                $resultado++;
        }
        if ($resultado == 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function gravar(PeriodoLectivo $pl) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $data = date("Y");
        $gravar = $conexao->prepare("INSERT INTO periodo(ano,dataInicio,dataFim,estado) VALUES(:ano,:final,:inicio,:estado)");
        $gravar->bindValue(":ano", $data);
        $gravar->bindValue(":final", $pl->getDatafinal());
        $gravar->bindValue(":inicio", $pl->getDatainicio());
        $gravar->bindValue(":estado", $pl->getEstado());
        $valor = PeriodoLectivo::verificar($data);
        if ($valor == 0) {
            echo "<script>alert('Impossível fazer a gravação, período lectivo já cadastrado!')</script>";
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
