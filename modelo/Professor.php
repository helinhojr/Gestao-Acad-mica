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
    private $estado="activo";
            
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
            $conexao = conectar();
            $gravar = $conexao->prepare("INSERT INTO professor(nome,estado,nascimento,user,bi,endereco,senha,genero,email) VALUES(:nome,:estado,:data,:user,:bi,:endereco,:senha,:genero,:email)");
            $gravar->bindValue(":nome", $prof->getNome());
            $gravar->bindValue(":estado",$prof->getEstado());
            $gravar->bindValue(":data",$prof->getDataDeNasc());
            $gravar->bindValue(":endereco",$prof->getEndereco());
            $gravar->bindValue(":email",$prof->getEmail());
            $gravar->bindValue(":user",$prof->getUser());
            $gravar->bindValue(":senha",$prof->getSenha());
            $gravar->bindValue(":bi",$prof->getNumeroBI());
            $gravar->bindValue(":genero",$prof->getGenero());
            if ($gravar->execute()) {
                $us=$prof->getUser();
                $resultado=$conexao->prepare("SELECT codigo FROM professor WHERE user=$us");
                while ($lin=$resultado->fetch(PDO::FETCH_ASSOC)){
                   $prof->setCodigo($lin['codigo']); 
                }
                echo "<script>alert('Salvo com Sucesso!')</script>";
                header("../paginas/professores.php");
                return $prof;
            }else{
                echo "<script>alert('Não foi possível efectuar a gravação!')</script>";
                header("../paginas/professores.php");
            }
        }
    public static function profDisc(Professor $prof, Disciplina $disc) {
            require_once '../controller/conexao.php';
            $conexao = conectar();
            $ano= date("y");
            $gravar = $conexao->prepare("INSERT INTO professor_disciplina VALUES(:prof,:disc,:ano)");
            $gravar->bindValue(":prof", $prof->getCodigo());
            $gravar->bindValue(":disc",$disc->getCodigo());
            $gravar->bindValue(":ano",$ano);
            if ($gravar->execute()) {
                echo "<script>alert('Salvo com Sucesso!')</script>";
                header("../paginas/professores.php");
            }else{
                echo "<script>alert('Não foi possível efectuar a gravação!')</script>";
                header("../paginas/professores.php");
            }
        }
        public function __toString() {
            return $this->nome." ".$this->numeroBI;
        }

}
