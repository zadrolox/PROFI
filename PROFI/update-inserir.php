<?php
include_once './config/config.php';
include_once './classes/Tarefa.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tarefas = new Tarefa($conn);
    $id = $_POST['id'];
    $tarefa = $_POST['tarefa'];
    $data = $_POST['data'];

    if (empty($tarefa) or !strstr($tarefa, '') or is_numeric($tarefa)) {
        echo "Favor digitar uma tarefa corretamente sem ser apenas numeros";
        header("refresh:2;");
        exit();
    }

    $tarefas->update($id, $tarefa, $data);
    header('Location: dashboard-adm.php');
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
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Inserir</title>
</head>

<body>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="tarefa">Nome:</label>
        <input type="text" name="tarefa" required>
        <br><br>

        <label for="data">Data:</label>
        <input type="date" name="data" required><br><br>

        <input type="submit" value="Alterar">
    </form>
    <a href="dashboard-adm.php"><button>Voltar</button></a>
</body>

</html>