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
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <h2>Faça seu cadastro abaixo</h2>

    <form method="post" action="">
        <input type="text" name="username" placeholder="Usuário" class="input" required><br>
        <input type="password" name="password" placeholder="Senha" class="input" required><br>
        <input type="password" name="confirm_password" placeholder="Confirme senha" class="input" required><br>
        <input type="sexo" name="sexo" placeholder="Sexo" class="input" required><br>
        <input type="submit" value="Registrar">
    </form>
</body>

</html>