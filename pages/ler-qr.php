<?php include '../includes/head.php'?>
    <title>Ler Qr</title>
    <link rel="stylesheet" href="../assets/css/lerQr.css">
</head>
<body>

    <?php include '../includes/header.php'?>

    <div id="reader" width="600px"></div>
    <div id="div-informacoes">
        <img id="fotoImg" src="" alt="Foto">
        <p id="nomeP"></p>
    </div>
</body>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>

    let qrLido = false;
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: {width: 500, height: 500} },
        /* verbose= */ false);

    async function onScanSuccess(decodedText, decodedResult) {
        
            if(!qrLido){
                qrLido = true;
                let nomeP = document.getElementById('nomeP')
                let fotoImg = document.getElementById('fotoImg')

                let form = new FormData();
                form.append('id', decodedText)

                try{
                    let response = await fetch('../actions/buscaQr.php', {
                        method: 'POST',
                        body: form
                    })
                    dados = await response.json();
                    console.log(dados.foto)
                    nomeP.innerText = dados.nome
                    fotoImg.src = `../${dados.foto}`
                    document.getElementById('div-informacoes').style.display = 'block'
                    setTimeout(()=>{qrLido = false}, 2000)

                }catch(error){

                }
            
            }
       
        
    }
    
    function onScanFailure(error) {
        
        
    }
    
    
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);

  


</script>
</html>