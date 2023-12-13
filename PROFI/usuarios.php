<?php
session_start();
include './config/config.php';
include './classes/user.php';
include './classes/Tarefa.php';

$user = new User($conn);
$data = $user->read();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table style="border: 1px solid black" class="tabela">
        <thead>
            <tr>
                <th> ID</th>
                <th> Nome</th>
                <th> Sexo</th>
                <th> Alterar</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $count = 0;
            while ($row = $data->fetch(PDO::FETCH_ASSOC)) { ?>

                <tr>
                    <th> <?php echo $row['id']; ?> </th>
                    <th> <?php echo $row['username']; ?> </th>
                    <th> <?php echo $row['sexo']; ?> </th>
                    <th> <a href="update-usuario.php?id=<?php echo $row['id']; ?>">A</a> / <a
                            href="delete-usuario.php?id=<?php echo $row['id']; ?>">E</a></th>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</body>

</html>