<?php

/**
 * Description of Usuario
 *
 * @author Helinho
 */
class Usuario {

    private $codigo;
    private $usuario;
    private $senha;
    private $painel;
    private $status;
    private $codUs;

    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function getPainel() {
        return $this->painel;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setPainel($painel) {
        $this->painel = $painel;
    }

    function getCodUs() {
        return $this->codUs;
    }

    function setCodUs($codUs) {
        $this->codUs = $codUs;
    }

    public static function verificar($nome) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $niveis = $conexao->prepare("select user from usuario");
        $niveis->execute();
        $resultado = 0;
        while ($nomes = $niveis->fetch(PDO::FETCH_ASSOC)) {
            if (strcmp($nome, $nomes['user']) == 0)
                $resultado++;
        }
        if ($resultado == 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public static function validar($user,$senha) {
        define("FICHEIRO", __FILE__);
        require_once FICHEIRO.'../controller/conexao.php';
        $conexao = conectar();
        $niveis = $conexao->prepare("select * from usuario where user=:user and senha=:pass");
        $niveis->bindValue(":user", $user);
        $niveis->bindValue(":pass", $senha);
        $niveis->execute();
        return $niveis->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function gravar(Usuario $usuario) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $gravar = $conexao->prepare("INSERT INTO usuario(user,senha,painel,status,codigoUs) VALUES(:user,:senha,:painel,:estado,:us)");
        $gravar->bindValue(":user", $usuario->getUsuario());
        $gravar->bindValue(":senha", $usuario->getSenha());
        $gravar->bindValue(":painel", $usuario->getPainel());
        $gravar->bindValue(":estado", $usuario->getStatus());
        $gravar->bindValue(":us", $usuario->getCodUs());
        $valor = Usuario::verificar($usuario->getUsuario());
        $valor = Usuario::verificar($usuario->getUsuario());
        if ($valor == 0) {
            return false;
        } else {
            if ($gravar->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function buscar() {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("select * from usuario");
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_ASSOC);
    }

}
