<?php
include_once './config/config.php';
include_once './classes/Tarefa.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tarefas = new Tarefa($conn);
    $id = $_POST['id'];
    $tarefa = $_POST['tarefa'];
    $data = $_POST['data'];
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
<html>

<head>
    <title>Add Entry</title>
</head>

<body>
    <h1>Add Entry</h1>
    <form method="POST">

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="tarefa">Name:</label>

        <input type="text" name="tarefa" required>
        <br><br>

        <label for="data">Age:</label>

        <input type="date" name="data" required><br><br>

        <input type="submit" value="Alterar">
    </form>
</body>

</html>