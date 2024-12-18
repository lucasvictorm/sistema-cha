<?php include '../includes/head.php'?>
<link rel="stylesheet" href="../assets/css/cadastrar.css">
</head>
<body>
    
<?php include '../includes/header.php'?>

<main>
<form id="cadastro" action="cadastraParticipante.php">
<div class="mb-3">
    <label for="nome" class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" id="nome" placeholder="Escreva aqui...">
</div>

    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input class="form-control" name="foto" type="file" id="foto">
    </div>

    <div id="submit-div">
    <button type="submit" class="btn btn-success">Cadastrar</button>
    </div>

</form>
<div id="qr-div">
    <div id="qrcode">

    </div>
        <a id="btn-baixar-qr" class="btn btn-success">Baixar QR</a>
    </div>
</main>
    <script src="../src/js/qrcode.js"></script>
    <script>

        


        document.getElementById('cadastro').addEventListener('submit', async (event) => {
            event.preventDefault();

            const id = gerarIdAleatorio();

            let form = event.target
            const formData = new FormData(form)
            
            
            formData.append('id', id)
            
            try{
                const response = await fetch('../actions/cadastraParticipante.php', {
                    method: 'POST',
                    body: formData
                })

                const resultado = await response.json();

                if(resultado.resposta){
                    await new QRCode(document.getElementById("qrcode"), id);
                   
                    setTimeout(()=> {
                        document.getElementById('qr-div').style.display = 'block';
                    let qr_div = document.getElementById('qrcode');
                    let imagem_qr = qr_div.querySelector('img');
                    let imagemSrc = imagem_qr.src;
                    
                    document.getElementById('btn-baixar-qr').href=imagemSrc
                    document.getElementById('btn-baixar-qr').download=document.getElementById('nome').value+'.jpg'

                    }, 500)

                    
                    
                }else{
                    console.log('falha');
                }

            }catch(error){
                console.log(error)
            }
            
        })

        function gerarIdAleatorio() {
            const timestamp = Date.now().toString(36); // Conversão do timestamp para base 36
            const random = Math.random().toString(36).substring(2, 8); // Número aleatório em base 36
            return `${timestamp}-${random}`; // Combinação do timestamp e número aleatório
        }

    </script>

</body>
</html>

