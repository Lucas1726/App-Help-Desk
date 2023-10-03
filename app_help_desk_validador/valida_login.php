<?php

    //executar sempre antes de qualquer instrução que emita pro navegador uma saída
    //cria uma sessão ou resume a sessão atual baseado em um id de sessão passado via GET ou POST, ou passado via cookie
    session_start();
    //print_r($_SESSION);

    //variavel que verifica se a autenticação foi realizada
    $user_authenticated = false;
    $usuario_id = null;
    $usuario_perfil_id = null;

    $perfis = array(1 => 'Administrativo', 2 => 'Usuário');

    //*método de autenticação*
    /* 
    verifica se email e senha correspondem a um usuario valido
    SE NÃO, retorna para index.php e apresenta erro de usuário e ou senha
    SE SIM, informa que usuário está autenticado
    */
    //usuário do sistema
    $usuarios_app = array(
        array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
        array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
    );

    /*
    echo '<pre>';
        print_r($usuarios_app);
    echo '</pre>';
    */
    foreach($usuarios_app as $user){
        //$user['email'],
        //$user['senha'],

        /*
        echo 'Usuário app: ' . $user['email'] . ' Senha: ' . $user['senha'];
        echo '<br />';
        echo 'Usuário form: ' . $_POST['email'] . ' Senha: ' . $_POST['senha'];
        echo '<br />';
        */

        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $user_authenticated = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }

    }

    if($user_authenticated) {
        echo 'Usuário autenticado';
        $_SESSION['authenticated'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: home.php');
        //se houver sucesso, iremos formar o redicionamento para home.php   
    }else {
        $_SESSION['authenticated'] = 'NAO';
        //se der erro, usuário permanecerá na página inicial
        header('Location: index.php?login=erro');
    }
    
    
    //*recuperação dos dados encaminhado na página index.php na requisição HTTP através do método GET, que expõem os parametros na URL*
    //print_r($_POST);
    $_POST['email'];
    $_POST['senha'];
    //é uma variável superglobal do PHP que é usada para coletar dados de formulário após o envio de um formulário HTML com method="post". $_POST também é muito usado para passar variáveis.

    
    

?>