<?php
session_start();
include './config/config.php';
include './classes/user.php';
include './classes/Tarefa.php';

$tarefa = new Tarefa($conn);
$data = $tarefa->read();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="./form-inserir.php" type="submit"><button class="btn">inserir tarefa</button></a>
    <a href="./register.php" type="submit"><button class="btn">inserir usuario</button></a>
    <a href="./usuarios.php" type="submit"><button class="btn">usuarios</button></a>


    <table style="border: 1px solid black" class="tabela">
        <thead>
            <tr>
                <th> ID</th>
                <th> Tarefa</th>
                <th> Ação</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $count = 0;
            while ($row = $data->fetch(PDO::FETCH_ASSOC)) { ?>

                <tr>
                    <th>
                        <?php echo $row['id']; ?>
                    </th>
                    <th>
                        <?php echo $row['tarefa']; ?>
                    </th>
                    <th> <a href="update-inserir.php?id=<?php echo $row['id']; ?>">A</a> / <a
                            href="delete-tarefa.php?id=<?php echo $row['id']; ?>">E</a></th>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</body>

<style>
    .tabela,
    th,
    td {
        border: 1px solid black;
    }
</style>

</html>