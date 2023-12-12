<?php
include './config/config.php';
include './classes/user.php';
include './classes/Tarefa.php';
session_start();

$tarefa = new Tarefa($conn);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tarefe = $_POST['tarefa'];
    $data = $_POST['data'];
    $fk_idusu = $_SESSION['id'];


    $tarefa->create($tarefe, $data, $fk_idusu);
    if ($_SESSION['adm'] == 1){
    header("refresh:0.1;url=dashboard-adm.php");
    } else {
        header("refresh:0.1;url=dashboard-usu.php");
    }
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
    <div class="containerTabela">

        <h2 class="form__title">Inserir a tabela</h2>

        <form method="post" action="">
            <input type="text" name="tarefa" placeholder="Tarefa" class="input" required><br>
            <input type="date" name="data" placeholder="data" class="input" required><br>
            <button class="btn" value="Registrar">Registrar</button></a>
        </form>

    </div>
</body>

</html>