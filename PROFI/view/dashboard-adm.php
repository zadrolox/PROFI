<?php
session_start();
include '../config/config.php';
include '../classes/user.php';
include '../classes/Tarefa.php';

$tarefa = new Tarefa($conn);
$data = $tarefa->readEd();// CID da sua cidade, encontre a sua em http://hgbrasil.com/weather


$chave = '81140443';
$ip = $_SERVER["REMOTE_ADDR"];

$dados = hg_request(array(
    'cid' => 'BRXX3553', // CID da sua cidade, encontre a sua em http://hgbrasil.com/weather
), $chave);
if (!isset($dados)) {
    echo 'Descomente um dos exemplos para visualizar.';
    die();
}

function hg_request($parametros, $chave = null, $endpoint = 'weather')
{
    $url = 'http://api.hgbrasil.com/' . $endpoint . '/?format=json&';

    if (is_array($parametros)) {

        if (!empty($chave))
            $parametros = array_merge($parametros, array('key' => $chave));

        foreach ($parametros as $key => $value) {
            if (empty($value))
                continue;
            $url .= $key . '=' . urlencode($value) . '&';
        }

        $resposta = file_get_contents(substr($url, 0, -1));

        return json_decode($resposta, true);
    } else {
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/dashboard-adm.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas</title>
</head>

<body>
    <header class="nav">
        <a href="#"><img src="../img/logo1.png" alt="" class="logo"></a>
        <a href="../config/logout.php" type="submit" class="exit"><img src="../img/exit4.png" alt=""></a>
        <nav>
            <ul>
            </ul>
        </nav>
    </header>

    <section class="container">
        <div class="containerTabelaClima">
            <div>
                <h2>Clima de Sapucaia do sul</h2>
                <?php echo $dados['results']['city']; ?> <?php echo $dados['results']['temp']; ?> ºC<br>
                <?php echo $dados['results']['description']; ?><br>
                Nascer do Sol: <?php echo $dados['results']['sunrise']; ?> - Pôr do Sol: <?php echo $dados['results']['sunset']; ?><br>
                <img src="../imagens/<?php echo $dados['results']['img_id']; ?>.png" class="imagem-do-tempo"><br>
            </div>
        </div>

        <div class="containerTabela">
            <h2 class="form__title">TAREFAS</h2>
            <div class="botoes">
                <a href="../view/usuario.php"><button class="btn2">Usuários<img src="../img/olho.png" alt=""></button></a>
                <a href="../form/form-inserir.php"><button class="btn2">Inserir Tarefa <img src="../img/inserir.png" alt=""></button></a>
            </div>


            <table border="1" class="tabela">
                <thead>
                    <tr>
                        <th width="6%"  class="wid">ID</th>
                        <th width="43%" class="wid">Nome do encarregado</th>
                        <th width="38%" class="wid">Tarefas</th>
                        <th width="20%" class="wid">Ação</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <?php
                        $count = 0;
                        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {  ?>

                    <tr>
                        <th>
                            <?php echo $row['id']; ?>
                        </th>
                        <th>
                            <?php echo $row['username']; ?>
                        </th>
                        <th>
                            <?php echo $row['tarefa']; ?>
                        </th>
                        <th> <a href="../form/form-alterar.php?id=<?php echo $row['id']; ?>"><img src="../img/lapis.png" alt=""></a>
                            <a href="../form/form-delete.php?id=<?php echo $row['id']; ?>"><img src="../img/excluir.png" alt=""></a>
                        </th>
                    </tr>

                <?php } ?>

                </tr>
                </tbody>
            </table>
        </div>

    </section>
    
</body>

</html>