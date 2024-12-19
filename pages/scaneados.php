<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            text-align: center;
            align-items: center;
        }
        #div-informacoes{
            display: none;
        }


        #div-informacoes{
        text-align: center;
        display: none;
        }

        #div-informacoes img{
            width: 300px;
        }

        h2{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 id="aguardando">Aguardando...</h2>
    <div id="div-informacoes">
        <img id="fotoImg" src="" alt="Foto">
        <p id="nomeP"></p>
    </div>
</body>

<script>
    let nomeP = document.getElementById('nomeP')
    let fotoImg = document.getElementById('fotoImg')
    let aguardando = document.getElementById('aguardando')

    try{
       setInterval(async()=>{
        
       
        let response = await fetch('../api/buscarScan.php')

        
        dados = await response.json();

        if(dados.status == 'sucesso'){
            aguardando.style.display = 'none'
            nomeP.innerText = dados.nome
            fotoImg.src = `../${dados.foto}`
            document.getElementById('div-informacoes').style.display = 'block'
            setTimeout(async ()=>{
                document.getElementById('div-informacoes').style.display = 'none' 
                await fetch(`../api/removerScan.php?id=${dados.id}`)
            },5000)
        }
        else{
            
            aguardando.style.display = 'block'
        }
    },500)

    }catch(error){

    }

</script>
</html>