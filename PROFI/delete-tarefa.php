<?php
include_once 'config/config.php';
include_once 'classes/Tarefa.php';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$tarefa = new Tarefa($conn);
$tarefa->delete($id);
header('Location: dashboard-adm.php');
exit();
}
?>