<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript">
       function ValidaCadastro(){
      var User2 = document.getElementById("floatingUser").value;
      var Email2 = document.getElementById("floatingEmail").value;
      var Password1 = document.getElementById("floatingPassword1").value;
      var Password2 = document.getElementById("floatingPassword2").value;

      if( User2 == "" || Email2 == "" || Password1 == "" || Password2 == "") {
       alert("preencha os campos");
      }
      else {
        Password1 = document.getElementById("floatingPassword1").value;
        Password2 = document.getElementById("floatingPassword2").value;

        if (Password1 == Password2){
          
        }else{
          alert("as senhas não conferem");                                 
          document.getElementById("floatingPassword1").value = "";
          document.getElementById("floatingPassword2").value = "";
        }
      }
    }
    </script>

    <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <title>Cadastre-se!</title>
    <link href="css/Cadastro.css" rel="stylesheet">
  </head>
  <body class="p-3 mb-2 bg-color text-dark">

    <div class="container">
      <div class="row justify-content-center">
       <div class="col-sm-6">
         <div class="card">

              <center><img src="imagens/imgbanner.png" class="img-fluid" alt="erro"></center>

              <center>
               <div class="card-body">

                 <h5 class="card-title title">Cadastro</h5>

                 <div class="form-floating mb-3">
                   <input type="text" class="form-control" id="floatingUser" placeholder="usuario">
                   <label for="floatingInput"> Usuário: </label>
                 </div>

                 <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
                  <label for="floatingInput"> Email: </label>
                </div>

                 <div class="form-floating mb-3">
                   <input type="password" class="form-control" id="floatingPassword1" placeholder="password">
                   <label for="floatingPassword1"> Senha: </label>
                 </div>
              
                 <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword2" placeholder="password">
                  <label for="floatingPassword2"> Confirmar Senha: </label>
                </div>

                </p>
                <div>
                  <input type="checkbox" class="f" id="markbox" name="cb">
                  <label for="markbox">Concordo com os <a href="#"><b>termos de uso</b></a> e as <a href="#"><b>políticas de privacidade</b></a> da Aeroswift.</label>
                </div>
                </p>

              </p>
                 <a href="#" onclick="ValidaCadastro()" class="btn btn-primary">Cadastrar</a>
              </p>
                 <a href="Login.php">já tem uma conta? Faça Login!</a>
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
  </body>
</html>