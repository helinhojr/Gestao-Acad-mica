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

    public static function gravar(Estudante $est) {
        require_once '../controller/conexao.php';
        require_once '../modelo/Usuario.php';
        $conexao = conectar();
        $codigo = strtoupper(substr((md5(date("YmdHis"))), 1, 7));
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

    public static $ests = "ss";

    public static function enturmar($turma) {
        require_once '../controller/conexao.php';
        $estudantes = $conexao->prepare("SELECT * FROM estudante");
        $estudantes->execute();
        $ests = $estudantes->fetchAll(PDO::FETCH_ASSOC);
        $conexao = conectar();
        $est = $conexao->prepare("update estudante set turma=:turma where codigo=:cond");
        $est->bindValue(":turma", $turma);
        $est->bindValue(":cond", $ests[count($ests) - 1]['codigo']);
        if($est->execute()){
            echo "AWESOME";
        }
    }

}
