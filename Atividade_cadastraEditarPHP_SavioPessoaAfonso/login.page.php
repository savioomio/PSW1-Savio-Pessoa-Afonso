<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login do Usuario</title>
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
                <h2>Fazendo login na Conta</h2>
                <p> Ainda não possui uma conta? <a href="index.php"> cadastre-se </a> </p>

                <form action="" method="post">
                    <div class="linhas-forms">

                        <div class="input-group">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" placeholder="Digite o seu email" required>
                        </div>

                        <div class="input-group w50">
                            <label for="senha">Senha</label>
                            <input type="password" name="password" id="senha" placeholder="Digite sua senha" required>
                        </div>
                    </div>
                    <div class="linhas-forms">

                        <div class="input-group">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" placeholder="Digite o seu Nome" required>
                        </div>

                    </div>

                    <div class="input-group">
                        <button type="submit">Entrar</button>
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