<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 30px 0 0 0;
        width: 350px;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="valida_login.php" method="post"> <!-- action="valida_login.php" fazer a requisão no servidor | method="post" método é usado para transferir dados com segurança usando cabeçalhos HTTP-->
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                  <!-- name = "email" passa a receber o valor contido no campo email -->
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                  <!-- name = "senha" passa a receber o valor contido no campo senha -->
                </div>

                <!-- caso a senha ou login estejam errado, irá mostar ao usuário o erro -->
                <?php if(isset($_GET['login']) && $_GET['login'] == 'erro') { ?> <!-- bloco PHP -->
                  <div class="text-danger">
                    Usuário ou senha inválido(s).
                  </div>
                  <!-- MELHORIA NO CÓDIGO
                  <script>
                      function funcao1(){
                          alert("Usuário ou senha inválido(s)");
                      }
                      funcao1();
                  </script>
                  -->
                <?php } ?> <!-- bloco PHP -->

                <!-- caso a senha ou login estejam errado, irá mostar ao usuário o erro -->
                <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2') { ?> <!-- bloco PHP -->
                  <div class="text-danger">
                    Efetue login antes de acessar o sistema.
                  </div>
                <?php } ?> <!-- bloco PHP -->

                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>