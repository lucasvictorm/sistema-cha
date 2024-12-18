<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $banco = "sistema_cha";
    $conexao = mysqli_connect($host, $user, $pass, $banco);
    if (!$conexao) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>