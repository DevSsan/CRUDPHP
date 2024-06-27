<?php
session_start();

if (isset($_SESSION['acesso'])) {

  if ($_SESSION['acesso'] !== 1) {
    $_SESSION['erro'] = 'Erro de Acesso!';
    header('Location: carregamento.php');
  }
  
} else {
  $_SESSION['erro'] = 'Acesso Inválido!';
  header('Location: carregamento.php');
}

?>

<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <title>Site principal</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <div class="container-fluid">
      <a class="navbar-brand" href="Dashboard.php"> Painel Administrador </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Usuários
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#Cadastrousuarios"> Cadastrar </a></li>
              <li><a class="dropdown-item" onclick="Listar_usuarios()"> Listar </a></li>
            </ul>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Produtos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ProductModal"> Cadastrar </a></li>
              <li><a class="dropdown-item" onclick="Listar_produtos()"> Listar </a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> Sair </button>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Sair do sistema</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Deseja sair do sistema?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-success" onclick="Return()">Confirmar</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </nav>
 
 </p>

    <!-- Modal para o cadastro de usuario no dashboard -->
    <div class="modal fade" id="Cadastrousuarios" tabindex="-1" aria-labelledby="#CadastrousuariosLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="#CadastrousuariosLabel">Cadastro de Usuários</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

        <div class="modal-body">
          <form  action="actions/Cad_usuario.php" method="POST">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingUser" placeholder="usuario" name="nome" required>
              <label for="floatingInput">Nome:</label>
            </div>
            
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingEmaill" placeholder="name@example.com" name="email" required>
              <label for="floatingInput">Email:</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingUserr" placeholder="usuario" name="usuario" required>
              <label for="floatingInput">Usuário:</label>
             </div>
             <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword1" placeholder="password" name="senha" required>
              <label for="floatingPassword1">Senha:</label>
             </div>
             <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingComfirmPassword" placeholder="password" name="senha" required>
              <label for="floatingPassword1">Confirmar Senha:</label>
             </div>
             <div class="">
            <label class="col-sm-2 col-form-label">Nível de acesso:</label>
             <div class="col sm-3">
             <select class="form-select input1" aria-label="Default select example" id = "select_acesso" name="acesso" required>
                 <option selected>Selecione</option>
                 <option value="1">Administrador</option>
                 <option value="2">Usuário</option>
                 <option value="3">Cliente</option>
               </select>
             </div>
             </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
             </div>
           </form>
          </div>
        </div>
      </div>
    </div>



    <!-- Modal para o cadastro de produtos no dashboard -->
    <div class="modal fade" id="ProductModal" tabindex="-1" aria-labelledby="singupUserLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="singupUserLabel">Cadastro de produtos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
                    <form action="actions/Cad_produto.php" method="POST">
                    <div class="form-floating mb-3">
                            <input type="hidden" class="form-control input1" id="input_id" name="id" required>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" step="any" class="form-control input1" id="input_codigo" name="codigo" required>
                            <label for="floatingInputName"> Código: </label>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="text" class="form-control input1" id="input_nome" name="nome" required>
                            <label for="floatingInputText">Nome:</label>
                        </div>
        
                        <div class="">
                          <label class="col-sm-2 col-form-label">Categoria:</label>
                        <div class="col sm-3">
                        <select class="form-select input1" aria-label="Default select example" id = "select_categoria" name="categoria" required>
                            <option selected>Selecione:</option>
                            <option value="1">Eletrônicos</option>
                            <option value="2">Eletrodomesticos</option>
                            <option value="3">Periféricos</option>
                         </select>
                       </div>
                      </p>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" step="any" class="form-control input1" id="input_preco" name="preco" required>
                            <label for="floatingInputPreco"> Preço: </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control input1" id="input_qtd" name="qtd" required>
                            <label for="floatingqtd"> Quantidade: </label>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Cancelar </button>
                            <button type="submit" class="btn btn-success"> Salvar </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <div class="container-fluid"> 
      <span id="iframe"></span>
    </div>

    <script>
    const Amogus = document.getElementById("iframe");
    Amogus.innerHTML ='<iframe scrolling="no" width="100%" height="100%" src="Cards.php" name="cards"></iframe>';
   
      function Listar_usuarios() {
        document.getElementById("iframe").innerHTML = '<iframe scrolling="no" width="100%" height="100%" src="Listar_usuarios.php" name="cards"></iframe>';
      }
      function Listar_produtos() {
        document.getElementById("iframe").innerHTML = '<iframe scrolling="no" width="100%" height="100%" src="Listar_produtos.php" name="cards"></iframe>';
      }

      function Return() {
        window.location = "Login.php";
      }
    </script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>-->
</body>

</html>