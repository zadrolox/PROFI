<?php
session_start();
include '../config/config.php';
include '../classes/user.php';
include '../classes/Tarefa.php';

$user = new User($conn);
$data = $user->read();

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
    <link rel="stylesheet" href="../css/dashboard-usu.css">
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
            <h2 class="form__title">USUÁRIOS</h2>
            <div class="botoes">
                <a href="../form/form-cadastroAdm.php"><button class="btn2">Inserir Usuário<img src="../img/inserir.png" alt=""></button></a>
                <a href="../view/dashboard-adm.php"><button class="btn2">Voltar <img src="../img/voltar.png" alt=""></button></a>
            </div>


            <table border="1" class="tabela">
                <thead>
                    <tr>
                        <th width="6%" class="wid">ID</th>
                        <th width="60%" class="wid">Nome</th>
                        <th width="21%" class="wid">Gênero</th>
                        <th width="20%" class="wid">Ação</th>
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
                            <th>
                                <a href="../form/form-alterarUsu.php?id=<?php echo $row['id']; ?>"><img src="../img/lapis.png" alt=""></a>
                                <a href="../form/form-deleteUsu.php?id=<?php echo $row['id']; ?>"><img src="../img/excluir.png" alt=""></a>
                            </th>
                        </tr>

                    <?php } ?>
                </tbody>
                </tfoot>
            </table>
        </div>
    </section>
</body>

</html>