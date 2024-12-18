<?php 

header('Content-Type: application/json');
include '../db/conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$foto = $_FILES['foto'];


$caminho = 'imagens/'.$id;

if(mysqli_query($conexao, "INSERT INTO participantes (id, nome, foto) values ('$id', '$nome', '$caminho')")){
    echo json_encode(['resposta' => true]);
}else{
    echo json_encode(['resposta' => false]);
}




?>