<?php
include_once 'config/config.php';
include_once 'classes/Tarefa.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $tarefa = new Tarefa($conn);
        $tarefa->delete($id);
        header('Location: dashboard-adm.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Tarefa</title>
</head>

<body>
    <form action="" method="post">
        <h1>Tem Certeza que deseja Excluir?</h1>

        <input type="submit" value="Excluir">
    </form>
    
    <a href="./dashboard-adm.php"><button>Voltar</button></a>

</body>

</html>