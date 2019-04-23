<?php

class Professor {

    private $codigo;
    private $nome;
    private $dataDeNasc;
    private $email;
    private $user;
    private $senha;
    private $genero;
    private $numeroBI;
    private $endereco;
    private $foto;
    private $estado = "activo";

    function getFoto() {
        return $this->foto;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNome() {
        return $this->nome;
    }

    function getDataDeNasc() {
        return $this->dataDeNasc;
    }

    function getEmail() {
        return $this->email;
    }

    function getUser() {
        return $this->user;
    }

    function getSenha() {
        return $this->senha;
    }

    function getGenero() {
        return $this->genero;
    }

    function getNumeroBI() {
        return $this->numeroBI;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDataDeNasc($dataDeNasc) {
        $this->dataDeNasc = $dataDeNasc;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setNumeroBI($numeroBI) {
        $this->numeroBI = $numeroBI;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    public static function gravar(Professor $prof) {
        require_once '../controller/conexao.php';
        require_once '../modelo/Usuario.php';
        $conexao = conectar();
        $senha = strtoupper(substr((md5(date("YmdHis"))), 1, 7));
        $gravar = $conexao->prepare("INSERT INTO professor(codigo,nome,estado,nascimento,user,bi,endereco,senha,genero,email,foto) VALUES(:codigo,:nome,:estado,:data,:user,:bi,:endereco,:senha,:genero,:email,:foto)");
        $gravar->bindValue(":codigo", $senha);
        $gravar->bindValue(":nome", $prof->getNome());
        $gravar->bindValue(":estado", $prof->getEstado());
        $gravar->bindValue(":data", $prof->getDataDeNasc());
        $gravar->bindValue(":endereco", $prof->getEndereco());
        $gravar->bindValue(":email", $prof->getEmail());
        $gravar->bindValue(":user", $prof->getEmail());
        $gravar->bindValue(":senha", $senha);
        $gravar->bindValue(":bi", $prof->getNumeroBI());
        $gravar->bindValue(":genero", $prof->getGenero());
        $gravar->bindValue(":foto", $prof->getFoto());
        $usuario = new Usuario();
        $usuario->setPainel("prof");
        $usuario->setUsuario($prof->getEmail());
        $usuario->setSenha($senha);
        $usuario->setStatus($prof->getEstado());
        $usuario->setCodUs($senha);
        if (Usuario::gravar($usuario)==true){
            if ($gravar->execute()) {
                $us = $prof->getUser();
                $resultado = $conexao->prepare("SELECT codigo FROM professor WHERE user=$us");
                while ($lin = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $prof->setCodigo($lin['codigo']);
                }
                echo "<script>alert('Salvo com Sucesso!')</script>";
                header("../paginas/professores.php");
                return $prof;
            } else {
                echo "<script>alert('Não foi possível efectuar a gravação!')</script>";
                header("../paginas/professores.php");
            }
        } else {
            echo "<script>alert('Não foi possível efectuar a gravação, Usuário já existente!')</script>"; 
        }
    }

    public static $profes = 0;

    public static function profDisc($disc) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $ano = date("Y");
        $professores = $conexao->prepare("SELECT * FROM professor");
        $professores->execute();
        $profs = $professores->fetchAll(PDO::FETCH_ASSOC);
        $gravar = $conexao->prepare("INSERT INTO professor_disciplina(cod_prof,cod_disc,ano) VALUES(:prof,:disc,:ano)");
        $gravar->bindValue(":prof", $profs[count($profs) - 1]['codigo']);
        $gravar->bindValue(":disc", $disc);
        $gravar->bindValue(":ano", $ano);
        if ($gravar->execute()) {
            echo "<script>alert('Salvo com Sucesso!')</script>";
            header("../paginas/professores.php");
        } else {
            echo "<script>alert('Não foi possível efectuar a gravação!')</script>";
            header("../paginas/professores.php");
        }
    }

    public function __toString() {
        return $this->nome . " " . $this->numeroBI;
    }

}
