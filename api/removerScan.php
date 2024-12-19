<?php 
include '../db/conexao.php';
$id = $_GET['id'];
echo $id;
$sql = mysqli_query($conexao, "update participantes set scaneado = 0 where id = '$id'");




?>