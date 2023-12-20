<?php
include '../config/config.php';
include '../classes/user.php';
include '../classes/Tarefa.php';
session_start();

$tarefa = new Tarefa($conn);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tarefe = $_POST['tarefa'];
    $data = $_POST['data'];
    $fk_idusu = $_SESSION['id'];

    if (empty($tarefe) or !strstr($tarefe, '')) {
        echo "Favor digitar uma tarefa";
        header("refresh:2;");
        exit();
    }


    $tarefa->create($tarefe, $data, $fk_idusu);
    if ($_SESSION['adm'] == 1) {
        header("refresh:0.1;url= ../view/dashboard-adm.php");
    } else {
        header("refresh:0.1;url= ../view/dashboard-usu.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/form/form-inserir.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Tarefa</title>
</head>

<body>
    <header class="nav">
        <a href="#"><img src="../img/logo1.png" alt="" class="logo"></a>
        <nav>
            <ul>
            </ul>
        </nav>
    </header>

    <section class="containerTabela">
        <h2 class="form__title">Inserir Tarefa</h2>

        <div class="campos">
            <form method="post" action="">
                <input type="text" name="tarefa" placeholder="Título" class="input" required><br>
                <input type="date" name="data" placeholder="Data" class="input" required><br>
        </div>

        <div class="containerBotoes">
            <a href="../view/dashboard-adm.php type="submit"><button class="btn">Inserir</button></a>
            <a href="../view/dashboard-adm.php" class="voltar">
                    <img src="../img/voltar.png" alt="">
                    <h1 class="textVoltar">Voltar</h1>
            </a>
        </div>
    </section>
</body>

</html>