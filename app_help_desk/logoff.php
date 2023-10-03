<?php

    session_start();

    //echo '<pre>';
        //print_r($_SESSION);
    //echo '</pre>';

    //remover índices do array de sessão
    //unset(); remover índice de qualquer array GET ou POST
    //remove o índice apenas se existir


    //destruir a variável de sessão completamente
    //session_destroy(); remove todos os indices da super global session
    //forçar um redirecionamento

    session_destroy();
    header('Location: index.php');

?>