<!DOCTYPE html>
<html lang="pt">
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
                margin-top: 30px;
                font-weight: bold;
                font-size: 20px;
                color: #fff;
            }
        </style>
    </head>
    <body>
        <div class="form-area">
            <div class="image-area">
                <img src="ct2.png" >
            </div>
            <h2>Início de Sessão</h2>
            <p>Usuário</p>
            <input type="text">
            <p>Senha</p>
            <input type="password">
            <a href="#" class="btn">
                <span class="btn-text"> Entrar</span>
                <span class="btn-text"> Log in</span>
            </a>
            <a href="#" class="for-pass"> Esqueceu password?</a>

        </div>

    </body>
</html>