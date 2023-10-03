<?php require_once "validador_acesso.php" ?>

<?php

  //print_r($_SESSION);

  //array contendo os chamados
  $chamados = array();

  //abrir o arquivo.hd
  $arquivo = fopen('../../app_help_desk/arquivo.hd', 'r');
  //Abre somente para leitura; coloca o ponteiro do arquivo no começo do arquivo.

  //enquanto houver registros (linhas) a serem recuperados
  while(!feof($arquivo)){ //Testa pelo fim-do-arquivo
    //linhas
    $registro = fgets($arquivo); //Retorna uma linha do ponteiro do arquivo.
    //echo $registro .'<br />';
    $chamados[] = $registro;
  }

  //....
  fclose ($arquivo);//fecha o arquivo

  //echo '<pre>';
    //print_r($chamados);
  //echo '</pre>'

?>
<!--
  Quando usamos esse sufixo, garantimos que o arquivo desejado 
  será importado apenas uma vez em nossa aplicação. Isso é muito interessante pois 
  pode ser que, sem perceber, realizemos a importação do mesmo arquivo duas vezes.
-->

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">
            <img src="sair.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Sair
          </a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <!-- bloco PHP -->
              <?php foreach($chamados as $chamado) { ?>

                <?php

                  $chamado_dados = explode('#', $chamado);

                  //CRIAÇÃO DA REGRA DE NEGÓCIO COM USUÁRIO
                  //print_r($chamado_dados);
                  //identificar o perfil do usuário
                  if ($_SESSION['perfil_id'] == 2){
                    //será exibido o chamado se for criado pelo usuário
                    if($_SESSION['id'] != $chamado_dados[0]){
                      continue;
                    }
                  }

                  if(count($chamado_dados) < 3){
                    continue;
                  }
                  //echo '<pre>';
                    //print_r($chamado_dados);
                  //echo '</pre>';

                ?>
                 
                <!-- habilitando a impressão das informações enviadas através do abrir_chamado.php -->
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $chamado_dados[1]?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2]?></h6>
                    <h6 class="card-subtitle mb-2 text-muted">ID Responsável: <?= $chamado_dados[0]?></h6>
                    <p class="card-text"><?= $chamado_dados[3]?></p>

                  </div>
                </div>

              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>