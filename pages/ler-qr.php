<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/lerQr.css">
</head>
<body>
    <div id="reader" width="600px"></div>
    
</body>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>

    let qrLido = false;
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: {width: 400, height: 400} },
        /* verbose= */ false);

    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
            if(!qrLido){
                console.log(`Code matched = ${decodedText}`, decodedResult);
                qrLido = true;
            }
       
        
    }
    
    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        
    }
    
    
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);

  


</script>
</html>