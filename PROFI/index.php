<?php
session_start();
include './config/config.php';
include './classes/user.php';

$user = new User($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->login($username, $password) && $_SESSION['adm'] == true) {
        header("Location: ./dashboard-adm.php");
        exit();
    } else if ($user->login($username, $password) && $_SESSION['adm'] == null) {
        header("Location: ./dashboard-usu.php");
        exit();
    } else {
        echo "Login falhou. Verifique suas credenciais.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <section class="containerTabela">
        <h2>Coloque seu acesso abaixo</h2>

        <form method="post" action="">
            <input type="text" name="username" name="username" placeholder="Usuário" class="input" required><br>
            <input type="password" name="password" type="password" placeholder="Senha" class="input" required><br>
            <input type="submit" value="Login">
        </form>
        
        <a href="register.php" class="esqueciSenha"><button>Nao tem cadastro.Clique aqui!!!!</button></a>
    </section>
</body>

</html>