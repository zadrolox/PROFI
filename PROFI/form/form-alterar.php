<?php
include_once '../config/config.php';
include_once '../classes/Tarefa.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tarefas = new Tarefa($conn);
    $id = $_POST['id'];
    $tarefa = $_POST['tarefa'];
    $data = $_POST['data'];
    $tarefas->update($id, $tarefa, $data);
    header('Location: ../view/dashboard-adm.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tarefa = new Tarefa($conn);
    $data = $tarefa->readEdits($id);

    $row = $data->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/form/form-inserir.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Tarefa</title>
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
        <h2 class="form__title">Alterar Tarefa</h2>

        <div class="campos">
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="text" name="tarefa" placeholder="Título da Tarefa" class="input" required><br>
                <input type="date" name="data" type="date" placeholder="Data" class="input" required><br>
        </div>

        <div class="containerBotoes">
            <a href="../view/dashboard-adm.php" type="submit"><button class="btn">Alterar</button></a>
            <a href="../view/dashboard-adm.php" type="submit" class="voltar">
                <img src="../img/voltar.png" alt="">
                <h1 class="textVoltar">Voltar</h1>
            </a>
        </div>
    </section>
</body>

</html>