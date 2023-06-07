
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadrastro de Usuario</title>
</head>

<body>


    <?php

    include "header.html";

    ?>

    <div class="container-principal">

        <div class='box-fundo'>
            <div class='wave -one'></div>
            <div class='wave -two'></div>
            <div class='wave -three'></div>
        </div>
        <div class="box">
            <div class="form-box">
                <h2>Criar Conta</h2>
                <p> Já é um membro? <a href="login.page.php"> Login </a> </p>
                
                <form action="metodos/cadastra_user.php" method="post">
                    <div class="linhas-forms">
                        <div class="input-group">
                            <label for="nome"> Nome Completo</label>
                            <input type="text" id="nome" name="nome" required>
                        </div>
                        <div class="input-group">
                            <label for="turma"> Turma</label>
                            <input type="text" id="turma" name="turma" required>
                        </div>
                    </div>
                    <div class="linhas-forms">

                        <div class="input-group">
                            <label for="numero-matricula"> Matricula</label>
                            <input type="text" id="numero-matricula" name="numero_matricula" required>
                        </div>

                        <div class="input-group">
                            <label for="materia-preferida"> Materia preferida </label>
                            <select class="input-group" type="text" id="materia-preferida" name="materia_preferida">
                                <option value=""></option>
                                <option value="PSW">PSW</option>
                                <option value="ASW">ASW</option>
                                <option value="PI">PI</option>
                                <option value="BD">BD</option>
                                <option value="REDES">REDES</option>
                            </select>
                        </div>

                        <div class="input-group">
                            <label for="cpf"> CPF </label>
                            <input type="number" id="cpf" name="cpf" placeholder="Digite o seu CPF" required>
                        </div>

                    </div>

                    <div class="linhas-forms">

                        <div class="input-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" placeholder="Digite o seu email" required>
                        </div>

                        <div class="input-group w50">
                            <label for="senha">Senha</label>
                            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                        </div>

                    </div>

                    <div class="input-group">
                        <button type="submit">Cadastrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php

    include "footer.html";

    ?>

</body>

</html>