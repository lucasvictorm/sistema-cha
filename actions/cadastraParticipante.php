<?php 

header('Content-Type: application/json');
include '../db/conexao.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$foto = $_FILES['foto'];



$uploadDir = '../imagens/';
$fileTmpPath = $_FILES['foto']['tmp_name'];
/*$fileName = basename($_FILES['image']['name']);
$fileSize = $_FILES['image']['size'];
$fileType = $_FILES['image']['type'];
*/
// Garante um nome único para o arquivo
//$fileNameUnique = uniqid() . '-' . $fileName;
$formato = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));
$caminho = 'imagens/'.$id.'.'.$formato;
$destPath = $uploadDir . $id. '.' .$formato;

// Move o arquivo enviado para o diretório de upload
move_uploaded_file($fileTmpPath, $destPath);

if(mysqli_query($conexao, "INSERT INTO participantes (id, nome, foto) values ('$id', '$nome', '$caminho')")){
    echo json_encode(['resposta' => true]);
}else{
    echo json_encode(['resposta' => false]);
}




?>