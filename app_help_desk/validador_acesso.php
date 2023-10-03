<?php
  session_start();

  //SE NÃO existi, retornará TRUE | OU | for diferente de sim
  if(!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] != 'SIM'){
    //caso o usuário não tenha permissão para acessar a página
    header('Location: index.php?login=erro2');
  }
  
  //echo $_SESSION['authenticated'];

?>