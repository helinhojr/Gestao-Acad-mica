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

    public static function buscarEst($cod) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("select * from professor where codigo=:cod");
        $busca->bindValue(":cod", $cod);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function eliminar($cod) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("update professor set estado=:in where codigo=:cod");
        $busca->bindValue(":cod", $cod);
        $busca->bindValue(":in", "inactivo");
        $buscar = $conexao->prepare("update usuario set status=:in where codigoUs=:cod");
        $buscar->bindValue(":cod", $cod);
        $buscar->bindValue(":in", "inactivo");
        if ($busca->execute() && $buscar->execute()) {
            echo "<script>alert('Eliminado com Sucesso!')</script>";
            echo "<script>window.location='../paginas/professores.php'</script>";
        } else {
            echo "<script>alert('Não foi possível eliminar!')</script>";
            header("../paginas/professores.php");
        }
    }

    public static function buscarDisc($cod) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("select * from professor_disciplina where codigo=:cod");
        $busca->bindValue(":cod", $cod);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_ASSOC);
    }

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

    public static function buscar() {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("select * from professor where estado='activo'");
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_ASSOC);
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
        if (Usuario::gravar($usuario) == true) {
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

    public static function verificar($cod_disc, $cod_prof) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("select * from professor_disciplina where cod_prof=:pr and cod_disc=:dis");
        $busca->bindValue(":pr", $cod_prof);
        $busca->bindValue(":dis", $cod_disc);
        $busca->execute();
        if ($busca->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function profDisc($disc, $prof) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $ano = date("Y");
        $gravar = $conexao->prepare("INSERT INTO professor_disciplina(cod_prof,cod_disc,ano) VALUES(:prof,:disc,:ano)");
        $gravar->bindValue(":prof", $prof);
        $gravar->bindValue(":disc", $disc);
        $gravar->bindValue(":ano", $ano);
        if (Professor::verificar($disc, $prof)) {
            if ($gravar->execute()) {
                echo "<script>alert('Salvo com Sucesso!')</script>";
                header("../paginas/professores.php");
            } else {
                echo "<script>alert('Não foi possível efectuar a gravação!')</script>";
                header("../paginas/professores.php");
            }
        } else {
            echo "<script>alert('Não foi possível efectuar a gravação, o professor já dá a mesma disciplina!')</script>";
            header("../paginas/professores.php");
        }
    }

    public function __toString() {
        return $this->nome . " " . $this->numeroBI;
    }

    public static function verEnturm($disc, $prof, $turma) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $discs = $conexao->prepare("select * from discturmpro where disc=:ds and professor=:pro and turma=:tr");
        $discs->bindValue(":pro", $prof);
        $discs->bindValue(":ds", $disc);
        $discs->bindValue(":tr", $turma);
        $discs->execute();
        $disT = $conexao->prepare("select disc from discturmpro where disc=:ds and turma=:tr");
        $disT->bindValue(":tr", $turma);
        $disT->bindValue(":ds", $disc);
        $disT->execute();
        $turm = $conexao->prepare("select * from discturmpro where turma=:tr and professor=:pro and ano=:ano");
        $turm->bindValue(":pro", $prof);
        $turm->bindValue(":tr", $turma);
        $turm->bindValue(":ano", date("Y"));
        $turm->execute();
        if ($discs->rowCount() > 0) {
            return 0;
        } else if ($turm->rowCount() == 2) {
            return 1;
        } else if ($disT->rowCount() > 0) {
            return 3;
        } else {
            return 2;
        }
    }

    public static function enturmar($disc, $prof, $turma, $numero) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $turm = $conexao->prepare("insert into discturmpro values(:pro,:tr,:ds,:ano,:num)");
        $turm->bindValue(":pro", $prof);
        $turm->bindValue(":tr", $turma);
        $turm->bindValue(":ds", $disc);
        $turm->bindValue(":ano", date("Y"));
        $turm->bindValue(":num", $numero);
        $valor = Professor::verEnturm($disc, $prof, $turma);
        if ($valor == 0) {
            echo "<script>alert('Não foi possível efectuar a gravação, o professor já dá a mesma disciplina nesta turma!')</script>";
            header("../paginas/turma.php");
        } else if ($valor == 1) {
            echo "<script>alert('Não foi possível efectuar a gravação, o professor não pode dar mais de duas disciplinas na mesma turma!')</script>";
            header("../paginas/turma.php");
        } else if ($valor == 3) {
            echo "<script>alert('Não foi possível efectuar a gravação, já existe um professor dando esta disciplina!')</script>";
            header("../paginas/turma.php");
        } else {
            if ($turm->execute()) {
                echo "<script>alert('Salvo com Sucesso!')</script>";
                header("../paginas/turma.php");
            } else {
                echo "<script>alert('Não foi possível efectuar a gravação!')</script>";
                header("../paginas/turma.php");
            }
        }
    }

}
