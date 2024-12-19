<?php 
include '../db/conexao.php';


$sql = mysqli_query($conexao, "select id, nome, foto from participantes where scaneado = 1");

if(mysqli_num_rows($sql) > 0){
    $dados = mysqli_fetch_assoc($sql);
    echo(json_encode(['status' => 'sucesso', 'id' => $dados['id'], 'nome' => $dados['nome'], 'foto' => $dados['foto']]));
}else{
    echo(json_encode(['status' => 'vazio' ]));
}


?>