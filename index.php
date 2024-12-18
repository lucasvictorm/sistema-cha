<?php include './includes/head.php'?>
    <title>Chá</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <?php include __DIR__.'/includes/header.php';?>

    <main>
        <div id="ausentes-presentes-div">
            <p class="btn btn-danger">Ausentes: </p>
            <p class="btn btn-success">Presentes: </p>
        </div>
    <table class="table table table-striped">
  <thead>
    <tr>
      
      <th scope="col">Nome</th>
      <th scope="col">Presença</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Nome</th>
      <td>Otto</td>
    </tr>
    
  </tbody>
</table>

    </main>
</body>
</html>