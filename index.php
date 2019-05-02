<!DOCTYPE html>
<html lang="pt">
    <?php
    $dbname = "escola";
    $host = "localhost";
    $user = "root";
    $pass = "";
    try {
        $conexao = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    ?>
    <head>
        <meta charset="UTF-8">
        <title>Gestão Académica - Login</title>
        <meta charset="UTF-8">
        <link rel="icon" href="../img/notebook.png" >
        <meta http-equiv="Content-Type" content="text/html" charset="iso-8859-1">
        <style>
            body{
                background-image: url(fundo.jpeg);
                -webkit-background-size:cover ;
                background-size:cover;
                background-position:center center;
            }
            .form-area{
                width: 350px;
                height: 450px;
                margin: 60px auto 0;
                position: relative;
                background: rgba(0,0,0,0.4);
                text-align: center;
                pedding:35px;
                border: 3px solid #fff;
                -webkit-border-radius:70px 0 70px 0 ;
                -moz-border-radius: 70px 0 70px 0;
                border-radius: 70px 0 70px 0;
            }
            .form-area h2{
                margin-bottom: 45px;
                color: #fff;
            }
            .image-area{
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background: #1E90FF;
                position: absolute;
                top:-5%;
                left: 45%;

            }
            .image-area img{
                width: 60%;
                padding: 10px;
            }
            input{
                width: 95%;
                height: 50px;
                border-radius: 15px 0 15px 0;
                border: 2px solid #fff;
                margin-bottom: 15px;
                background-color: transparent;
                color: #fff;
            }
            .form-area p{
                text-align: left;
                color:#fff;
                font-weight: bold;
            }
            .btn{
                display: inline-block;
                height: 40px;
                width: 150px;
                line-height: 40px;
                overflow: hidden;
                position: relative;
                text-align: center;
                background: #1E90FF;
                border-radius: 25px;
                color: #fff;
                text-transform: uppercase;
                margin-top: 20px;
                cursor: pointer;
                text-decoration: none;
            }
            .btn-text{
                display:block ;
                height: 100%;
                position: relative;
                top: 0;
                -webkit-transition: top  0.6s;
                -moz-transition: top 0.6s;
                -ms-transition: top 0.6s;
                -o-transition: top 0.6s;
                transition: top 0.6s;
                width: 100%;


            }
            .btn:hover .btn-text{
                top: 100%;
            }
            .for-pass{
                text-decoration: none;
                display: block;
                margin-top: 3px;
                font-weight: bold;
                font-size: 20px;
                color: #fff;
            }
            .h2{
                background: #1E90FF;
                color: red;
                width: 80%;
                font-size: 1em;
            }
        </style>
    </head>

    <body>
        <form method="POST" class="form-area">
            <div class="image-area">
                <img src="ct2.png" >

            </div>
            <h2>Início de Sessão</h2>

            <p>Usuário</p>
            <input type="text" name="user">
            <p>Senha</p>
            <input type="password" name="pass">
            <button name="entraLogin" type="submit" class="btn">
                <span class="btn-text"> Entrar</span>
                <span class="btn-text"> Log in</span>
            </button>
            <?php
            session_start();
            $_SESSION['idUsuario']=0;
            $_SESSION['idPr']=0;
            $_SESSION['idSc']=0;
            if (isset($_POST['entraLogin'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                if (empty($user) || empty($pass)) {
                    echo "<h2 class='h2'>Campos da senha ou Usuario não preenchidos!!!</h2>";
                } else {
                    $usuario = $conexao->prepare("select * from usuario where user=:user and senha=:pass");
                    $usuario->bindValue(":user", $user);
                    $usuario->bindValue(":pass", $pass);
                    $usuario->execute();
                    $users = $usuario->fetchAll(PDO::FETCH_ASSOC);
                    if (empty($users)) {
                        echo "<h2 class='h2'>Dados incorrectos, tente novamente!!!</h2>";
                    } else {
                        foreach ($users as $us) {
                            if ($us['status'] == "inactivo") {
                                echo "<h2 class='h2'>Usuário Inactivo, contacte os responsáveis!!!</h2>";
                            }else{
                                switch ($us['painel']){
                                    case "est": $_SESSION['logado']=true;
                                        $_SESSION['idUsuario']=$us['codigoUs'];
                                        echo "<script>window.location='paginas/est.php'</script>";
                                        break;
                                    case "prof":$_SESSION['logado']=true;
                                        $_SESSION['idPr']=$us['codigoUs'];
                                        echo "<script>window.location='paginas/prof.php'</script>";
                                        break;
                                    case "prof":$_SESSION['logado']=true;
                                        $_SESSION['idSc']=$us['codigoUs'];
                                        echo "<script>window.location='paginas/sec.php'</script>";
                                        break;
                                    case "admin":$_SESSION['logado']=true;
                                        $_SESSION['idA']=$us['codigoUs'];
                                        echo "<script>window.location='paginas/admin.php'</script>";
                                        break;
                                }
                            }
                        }
                    }
                }
            }
            ?>
            <a href="#" class="for-pass"> Esqueceu password?</a>

        </form>

    </body>

</html>
