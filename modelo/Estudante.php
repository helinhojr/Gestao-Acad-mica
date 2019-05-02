<?php

/**
 * Description of Estudante
 *
 * @author Helinho
 */
class Estudante {

    private $codigo;
    private $nome;
    private $nomePai;
    private $nomeMae;
    private $email;
    private $contacto;
    private $contactoEnc;
    private $dataDeNascimento;
    private $endereco;
    private $genero;
    private $regime;
    private $foto;
    private $turma = 1;
    private $senha;
    private $user;
    private $bi;
    private $estado = "activo";

    function getUser() {
        return $this->user;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function getBi() {
        return $this->bi;
    }

    function setBi($bi) {
        $this->bi = $bi;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNome() {
        return $this->nome;
    }

    function getNomePai() {
        return $this->nomePai;
    }

    function getNomeMae() {
        return $this->nomeMae;
    }

    function getEmail() {
        return $this->email;
    }

    function getContacto() {
        return $this->contacto;
    }

    function getContactoEnc() {
        return $this->contactoEnc;
    }

    function getDataDeNascimento() {
        return $this->dataDeNascimento;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getGenero() {
        return $this->genero;
    }

    function getRegime() {
        return $this->regime;
    }

    function getFoto() {
        return $this->foto;
    }

    function getSenha() {
        return $this->senha;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setNomePai($nomePai) {
        $this->nomePai = $nomePai;
    }

    function setNomeMae($nomeMae) {
        $this->nomeMae = $nomeMae;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    function setContactoEnc($contactoEnc) {
        $this->contactoEnc = $contactoEnc;
    }

    function setDataDeNascimento($dataDeNascimento) {
        $this->dataDeNascimento = $dataDeNascimento;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setRegime($regime) {
        $this->regime = $regime;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function getTurma() {
        return $this->turma;
    }

    function setTurma($turma) {
        $this->turma = $turma;
    }

    public static function eliminar($cod) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("update estudante set estado=:in where codigo=:cod");
        $busca->bindValue(":cod", $cod);
        $busca->bindValue(":in", "inactivo");
        $buscar = $conexao->prepare("update usuario set status=:in where codigoUs=:cod");
        $buscar->bindValue(":cod", $cod);
        $buscar->bindValue(":in", "inactivo");
        if ($busca->execute() && $buscar->execute()) {
            echo "<script>alert('Eliminado com Sucesso!')</script>";
            echo "<script>window.location='../paginas/estudantes.php'</script>";
        } else {
            echo "<script>alert('Não foi possível eliminar!')</script>";
            header("../paginas/estudantes.php");
        }
    }

    public static function verebuscar($est, $pro, $sec) {
        require_once 'Professor.php';
        require_once 'Secretario.php';
        if ($sec != 0) {
            return Secretario::buscarEst($sec);
        } else if ($est != 0) {
            return Estudante::buscarEst($est);
        } else {
            return Professor::buscarEst($pro);
        }
    }

    public static function buscar() {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("select * from estudante where estado='activo'");
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscarEst($cod) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $busca = $conexao->prepare("select * from estudante where codigo=:cod");
        $busca->bindValue(":cod", $cod);
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function gravar(Estudante $est) {
        require_once '../controller/conexao.php';
        require_once '../modelo/Usuario.php';
        $conexao = conectar();
        $codigo = strtoupper(substr((md5(date("YmdHis"))), 1, 7));
        $_SESSION['estAct']=$codigo;
        $gravar = $conexao->prepare("INSERT INTO estudante(codigo,nome,estado,nascimento,user,bi,endereco,senha,genero,email,pai,mae,contacto,contenc,regime,foto) VALUES(:codigo,:nome,:estado,:data,:user,:bi,:endereco,:senha,:genero,:email,:np,:nm,:cont,:contEn,:regime,:foto)");
        $gravar->bindValue(":codigo", $codigo);
        $gravar->bindValue(":nome", $est->getNome());
        $gravar->bindValue(":estado", $est->getEstado());
        $gravar->bindValue(":data", $est->getDataDeNascimento());
        $gravar->bindValue(":endereco", $est->getEndereco());
        $gravar->bindValue(":email", $est->getEmail());
        $gravar->bindValue(":user", $est->getEmail());
        $gravar->bindValue(":senha", $codigo);
        $gravar->bindValue(":bi", $est->getBi());
        $gravar->bindValue(":genero", $est->getGenero());
        $gravar->bindValue(":foto", $est->getFoto());
        $gravar->bindValue(":regime", $est->getRegime());
        $gravar->bindValue(":np", $est->getNomePai());
        $gravar->bindValue(":nm", $est->getNomeMae());
        $gravar->bindValue(":contEn", $est->getContactoEnc());
        $gravar->bindValue(":cont", $est->getContacto());
        $usuario = new Usuario();
        $usuario->setPainel("est");
        $usuario->setUsuario($est->getEmail());
        $usuario->setSenha($codigo);
        $usuario->setStatus($est->getEstado());
        $usuario->setCodUs($codigo);
        if (Usuario::gravar($usuario) == true) {
            if ($gravar->execute()) {
                echo "<script>alert('Salvo com Sucesso!')</script>";
                header("../paginas/estudantes.php");
            } else {
                echo "<script>alert('Não foi possível efectuar a gravação!')</script>";
                header("../paginas/estudantes.php");
            }
        } else {
            echo "<script>alert('Não foi possível efectuar a gravação, Usuário já existente!')</script>";
        }
    }

    public static function verificar($est, $ano) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $estuda = $conexao->prepare("select * from turma_est where estudante=:cond and ano=:ano");
        $estuda->bindValue(":cond", $est);
        $estuda->bindValue(":ano", $ano);
        $estuda->execute();
        if ($estuda->rowCount() > 0) {
            return 0;
        } else {
            return 1;
        }
    }

    public static function enturmar($turma, $ests) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $ano = date("Y");
        $est = $conexao->prepare("insert into turma_est values(:turma,:cond,:ano)");
        $est->bindValue(":turma", $turma);
        $est->bindValue(":cond", $ests);
        $est->bindValue(":ano", $ano);
        $valor = Estudante::verificar($ests, $ano);
        if ($valor == 1) {
            if ($est->execute()) {
                echo "<script>alert('Salvo com Sucesso!!!')</script>";
            }
        } else {
            echo "<script>alert('Não foi possível efectuar a gravação, este estudante já frequenta uma turma!!!')</script>";
        }
    }

    public static function buscarProf($codigo) {
        require_once '../controller/conexao.php';
        $conexao = conectar();
        $data=date("Y");
        $busca = $conexao->prepare("select professor.nome as a,disciplina.nome as b,disi.testes as c from turma_est join turma on turma_est.turma=codigo join discturmpro on turma_est.turma=discturmpro.turma join professor on discturmpro.professor=professor.codigo join discturmpro as disi on professor.codigo=disi.professor join disciplina on disi.disc=disciplina.codigo where estudante=:est and turma_est.ano=:ano");
        $busca->bindValue(":est", $codigo);
        $busca->bindValue(":ano",$data );
        $busca->execute();
        return $busca->fetchAll(PDO::FETCH_ASSOC);
    }

}
