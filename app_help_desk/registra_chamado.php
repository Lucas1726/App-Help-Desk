<?php

    session_start();

    //implode('#', $_POST); montagem do texto
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    $texto = $_SESSION['id'] .'#'. $titulo .'#'. $categoria .'#'. $descricao . PHP_EOL;

    $arquivo = fopen('../../app_help_desk/arquivo.hd', 'a'); 
    //Abre somente para escrita; coloca o ponteiro do arquivo no final do arquivo. Se o arquivo não existir, tenta criá-lo

    fwrite($arquivo, $texto);
    //escreve o conteúdo da string para o stream de arquivo apontado por handle.

    fclose($arquivo);
    //Fecha um ponteiro de arquivo aberto

    header('Location: abrir_chamado.php');

?>