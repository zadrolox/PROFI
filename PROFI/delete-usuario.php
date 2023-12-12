<?php
include_once 'config/config.php';
include_once 'classes/Tarefa.php';
include_once 'classes/user.php';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$tarefa = new User($conn);
$tarefa->delete($id);
header('Location: usuarios.php');
exit();
}
?>