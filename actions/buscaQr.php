<?php 
include '../db/conexao.php';

$id = $_POST['id'];

$sql = mysqli_fetch_assoc(mysqli_query($conexao, "select nome, foto from participantes where id='$id'"));


echo json_encode(['nome' => $sql['nome'], 'foto' => $foto])

?>