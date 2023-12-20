<?php
include_once '../config/config.php';
include_once '../classes/Tarefa.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $tarefa = new Tarefa($conn);
        $tarefa->delete($id);
        header('Location: ../view/dashboard-adm.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/form/form-delete.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação</title>
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
        <form action="" method="post">
            <h2 class="form__title">Tem certeza que deseja excluir?</h2>

            <div class="containerBotoes">
                <a><button class="btn" value="Registrar">Deletar</button></a>
                <a href="../view/dashboard-adm.php" class="voltar">
                    <img src="../img/voltar.png" alt="">
                    <h1 class="textVoltar">Voltar</h1>
                </a>
            </div>
    </section>
</body>

</html>