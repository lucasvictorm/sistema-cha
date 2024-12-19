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
    <?php 
      include './db/conexao.php';

      $sql = mysqli_query($conexao, 'select nome, presente from participantes');

      while($dados = mysqli_fetch_assoc($sql)){
        echo"<tr>
      <td scope='row'>".$dados['nome']."</th>
      <td>".($dados['presente'] == 0 ? 'Não' : 'Sim')."</td>
    </tr>";
      }
    
    
    ?>

    
  
  
    
    
  </tbody>
</table>

    </main>
</body>
</html>