<?php
include '../config/config.php';
include '../classes/user.php';
session_start();

$user = new User($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $sexo = $_POST['sexo'];
    $adm = $_POST['admin'];

    $user->registerAdm($username, $password, $confirm_password, $sexo, $adm);
    header("refresh:0.1;url= ../view/usuario.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../css/form/form-cadastroAdm.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <header class="nav">
        <a href="#"><img src="../img/logo1.png" alt="" class="logo"></a>
        <a href="../config/logout.php" type="submit" class="exit"><img src="../img/exit4.png" alt=""></a>
        <nav>
            <ul>
            </ul>
        </nav>
    </header>

    <section class="containerTabela">
        <h2 class="form__title">Preencha os dados abaixo</h2>

        <div class="campos">
            <form method="post" action="">
                <input type="text" name="username" placeholder="Usuário" class="input" required><br>
                <select type="sexo" name="sexo" placeholder="Sexo" class="input" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select><br>
                <input type="password" name="password" placeholder="Senha" class="input" required><br>
                <input type="password" name="confirm_password" placeholder="Confirme enha" class="input" required><br>
                <p style="color: white; margin-left: 10px; display: flex; flex-direction: row; margin-top: 10px;" >Administrador
                <input style="margin-bottom: 30px;" type="checkbox" name="admin" value="1"></p>
        </div>

        <div class="containerBotoes">
            <a href="../view/usuario.php" type="submit"><button class="btn">Cadastrar</button></a>
            <a href="../view/usuario.php" class="voltar">
                    <img src="../img/voltar.png" alt="">
                    <h1 class="textVoltar">Voltar</h1>
            </a>

        </div>
    </section>
</body>

</html>