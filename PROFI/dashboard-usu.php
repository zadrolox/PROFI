<?php
session_start();
include './config/config.php';
include './classes/user.php';
include './classes/Tarefa.php';

$tarefa = new Tarefa($conn);
$data = $tarefa->readEd($_SESSION['id']);

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

    <table style="border: 1px solid black" class="tabela">
        <thead>
            <tr>
                <th> ID</th>
                <th> Tarefa</th>
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
                </tr>

            <?php } ?>
        </tbody>
    </table>

</body>

</html>