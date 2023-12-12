<?php
include_once './config/config.php';
include_once './classes/Tarefa.php';
include_once './classes/user.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tarefas = new User($conn);
    $id = $_POST['id'];
    $username = $_POST['username'];
    $sexo = $_POST['sexo'];
    $tarefas->update($id, $username, $sexo);
    header('Location: usuarios.php');
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

        <label for="username">Nome:</label>

        <input type="text" name="username" required>
        <br><br>

        <label for="sexo">Sexo:</label>

        <input type="text" name="sexo" required><br><br>

        <input type="submit" value="Alterar">
    </form>
</body>

</html>