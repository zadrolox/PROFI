<?php
include_once './config/config.php';
include_once './classes/user.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User($conn);
    $id = $_POST['id'];
    $username = $_POST['username'];
    $sexo = $_POST['sexo'];
    $user->update($id, $username, $sexo);
    header('Location: usuarios.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = new User($conn);
    $data = $user->readEdits($id);

    $row = $data->fetch(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Usuario</title>
</head>

<body>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label>Nome:</label>
        <input type="text" name="username" required>
        <br><br>

        <label>Sexo:</label>
        <input type="text" name="sexo" required><br><br>

        <input type="submit" value="Alterar">
    </form>
    <a href="usuarios.php"><button>Voltar</button></a>
</body>

</html>