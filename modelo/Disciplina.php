<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Disciplina
 *
 * @author Helinho
 */
class Disciplina {

    private $nome;
    private $codigo;
    private $dataCadastro;
    private $status;

    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getNome() {
        return $this->nome;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function verificar($nome) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $niveis = $conexao->prepare("select nome from disciplina");
        $niveis->execute();
        $resultado = 0;
        while ($nomes = $niveis->fetch(PDO::FETCH_ASSOC)) {
            if (strcmp($nome, $nomes['nome']))
                $resultado++;
        }
        if ($resultado == 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function gravar(Disciplina $disciplina) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $data = date("d/m/y");
        $gravar = $conexao->prepare("INSERT INTO disciplina(nome,estado,data) VALUES(:nome,:estado,:data)");
        $gravar->bindValue(":nome", $disciplina->getNome());
        $gravar->bindValue(":estado", $disciplina->getStatus());
        $gravar->bindValue(":data", $data);
        $valor = verificar($disciplina->getNome());
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

}
