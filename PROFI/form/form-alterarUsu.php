<?php
include_once '../config/config.php';
include_once '../classes/Tarefa.php';
include_once '../classes/user.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tarefas = new User($conn);
    $id = $_POST['id'];
    $username = $_POST['username'];
    $sexo = $_POST['sexo'];
    $tarefas->update($id, $username, $sexo);
    header('Location: ../view/usuario.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $tarefa = new User($conn);
    $data = $tarefa->readEdits($id);

    $row = $data->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/form/form-alterarUsu.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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
        <h2 class="form__title">Atualize os dados</h2>

        <div class="campos">
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="text" name="username" placeholder="Usuário" class="input" required><br>
                <select type="sexo" name="sexo" placeholder="Sexo" class="input" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select><br>
        </div>

        <div class="containerBotoes">
            <a href="../view/usuarios.php" type="submit"><button class="btn">Alterar</button></a>
            <a href="../view/usuario.php" class="voltar">
                <img src="../img/voltar.png" alt="">
                <h1 class="textVoltar">Voltar</h1>
            </a>

        </div>
    </section>
</body>

</html>