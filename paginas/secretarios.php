<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Gestão Académica - Secretário</title>
        <link rel="stylesheet" href="../css/forms.css">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="icon" href="../img/notebook.png" >
        <link rel="stylesheet" href="../css/iframe.css">
        <!--<link rel="stylesheet" href="../css/bootstrap.css">-->
    </head> 
    <body>
        <div class="tit">
            <h2>Secretários</h2>
        </div>
        <div class="perfil1">
            <form class="form" name="professores" action="" method="POST" enctype="multipart/form-data">
                <label class="lbl">Nome Completo</label>
                <input type="text" name="nomecompleto" id="nomecompleto" placeholder="nome">
                <label class="lbl">Data de Nascimento</label>
                <input type="date" name="datanascimento" id="datanascimento" placeholder="--/--/----">
                <label class="lbl">E-mail</label>
                <input type="email" name="email" id="email">
                <label>Género</label>
                <select>
                    <option>Masculino</option>
                    <option>Feminino</option>
                </select>
                <label class="lbl">Número do B.I.</label>
                <input type="text" name="turma" id="turma" placeholder="turma">
                <label class="lbl">Endereço</label>
                <input type="text" name="morada" id="morada">
                <h3>Dados Para Acesso</h3>
                <label class="lbl">Nome Usuário</label>
                <input type="text" name="user" id="user">
                <label class="lbl">Senha</label>
                <input type="password" name="pass" id="pass">
                <button type="button">gravar</button>
            </form>     
            <div class="tabela">
                <table class="table" >
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Sala</th>
                            <th>Director da Turma</th>
                            <th>Nível</th>
                            <th>Ano</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><button><i class="fas fa-edit"></i></button></td>
                            <td><button><i class="fas fa-trash"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>s