<?php 
// Obter o protocolo (http ou https)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

// Obter o domínio (exemplo: localhost, example.com)
$host = $_SERVER['HTTP_HOST'];  // Pode ser 'localhost:8080' ou 'example.com'

// Obter o caminho do script (exemplo: /sistema-cha)
$path = dirname($_SERVER['SCRIPT_NAME']); // Retorna o diretório onde o script está sendo executado

// Definir a BASE_URL automaticamente
$baseUrl = $protocol . '://' . $host . $path . '/';

// Exibir a BASE_URL

define('BASE_URL', $baseUrl);
define('INDEX_URL', $protocol. '://' . $host . '/');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=INDEX_URL?>sistema-cha/assets/css/header.css">
    </head>
    
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
    