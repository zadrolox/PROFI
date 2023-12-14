<?php
include './config/config.php';
include './classes/user.php';


$user = new User($conn);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $sexo = $_POST['sexo'];


    $user->register($username, $password, $confirm_password, $sexo);
    header("refresh:1;url=index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="registerMedia.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <div class="containerTabela">
        <div class="container">
            <h2 class="form__title">Faça seu cadastro abaixo</h2>

            <div class="campos">
                <form method="post" action="">
                    <input type="text" name="username" placeholder="Usuário" class="input" required><br>
                    <input type="password" name="password" placeholder="Senha" class="input" required><br>
                    <input type="password" name="confirm_password" placeholder="Confirme senha" class="input" required><br>
                    <input type="sexo" name="sexo" placeholder="Sexo" class="input" required><br>
            </div>


            <div class="containerBotoes">
                <a  type="submit"><button class="btn" value="Registrar">Registrar</button></a>
            </div>
        </div>
        </form>

    </div>
</body>

</html>