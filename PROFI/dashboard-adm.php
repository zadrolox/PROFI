<?php
session_start();
include './config/config.php';
include './classes/Tarefa.php';

$tarefa = new Tarefa($conn);
$data = $tarefa->readEd();

$cid = 'BRXX3553'; // CID da sua cidade, encontre a sua em http://hgbrasil.com/weather
$dados = json_decode(file_get_contents('http://api.hgbrasil.com/weather/?cid='
    . $cid . '&format=json'), true); // Recebe os dados da API
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Adm</title>
</head>

<body>
    <a href="./form-inserir.php" type="submit"><button class="btn">inserir tarefa</button></a>
    <a href="./registerAdm.php" type="submit"><button class="btn">inserir usuario</button></a>
    <a href="./usuarios.php" type="submit"><button class="btn">usuarios</button></a>
    <a href="./logout.php" type="submit"><button class="btn">logout</button></a>


    <table style="border: 1px solid black">
        <thead>
            <tr>
                <th> ID</th>
                <th> Nome do encarregado</th>
                <th> Tarefa</th>
                <th> Ação</th>
            </tr>
        </thead>

        <tbody>

            <?php while ($row = $data->fetch(PDO::FETCH_ASSOC)) { ?>

                <tr>
                    <th> <?php echo $row['id']; ?> </th>

                    <th> <?php echo $row['username']; ?> </th>

                    <th> <?php echo $row['tarefa']; ?> </th>

                    <th> <a href="update-inserir.php?id=<?php echo $row['id']; ?>">A</a> / 
                    <a href="delete-tarefa.php?id=<?php echo $row['id']; ?>">E</a></th>

                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Clima de Sapucaia do sul</h2>
    <?php echo $dados['results']['city']; ?>
    <?php echo $dados['results']['temp']; ?> ºC<br>
    <?php echo $dados['results']['description']; ?><br>
    Nascer do Sol:
    <?php echo $dados['results']['sunrise']; ?> - Pôr do Sol:
    <?php echo $dados['results']['sunset']; ?><br>
    <img src="imagens/<?php echo $dados['results']['img_id']; ?>.png" class="imagem-do-tempo"><br>
</body>

<style>
    .tabela,
    th,
    td {
        border: 1px solid black;
    }
</style>

</html>