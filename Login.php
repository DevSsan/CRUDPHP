<?php
session_start();
?>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>login</title>
</head>

<body  class="p-3 mb-2 bg-primary text-dark">
  </br>
  </br>
  </br>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="card">

          <center><img src="imagens/imgbanner.png" class="img-fluid" alt="erro"></center>

          <center>
            <div class="card-body">

              <h5 class="card-title">Acesso ao sistema</h5>
              <form action="valida_login.php" method="POST">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="input_usuario" name="usuario" placeholder="Usuário">
                  <label for="floatingInput">Usuário</label>
                </div>

                <div class="form-floating">
                  <input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="password">
                  <label for="floatingPassword"> Senha </label>
                </div>
            </p>
                <input type="submit" class="btn btn-primary" value="Entrar">
                </p>
                <a href="Cadastro.php">Não tem uma conta? Faça seu cadastro! </a>
              </form>
            </div>
          </center>

          <!-- Optional JavaScript; choose one of the two! -->

          <!-- Option 1: Bootstrap Bundle with Popper -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

          <!-- Option 2: Separate Popper and Bootstrap JS -->
          <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <?php
          if (isset($_SESSION['erro'])) {
            echo $_SESSION['erro'];
              session_destroy();
            echo
            '<script>
              setInterval(Refresh, 2000);
              function Refresh() {
                window.location = "Login.php";
              }
            </script>';
          } else {

          }

          session_destroy();
    ?>
</body>

</html>