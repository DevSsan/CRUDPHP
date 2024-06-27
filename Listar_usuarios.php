<?php
session_start();

if(isset($_SESSION['acesso'])) {
    if(($_SESSION['acesso'] === 1)) {

    } else {
        $_SESSION['erro'] = 'Erro de acesso!';
        header('Location: login.php');
    }
} else { 
    $_SESSION['erro'] = 'Acesso Inválido!';
    header('Location : login.php');
}

include("conexao.php");
$select_usuarios = mysqli_query($conn, "SELECT * FROM usuarios");
?>

<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<div class="container-fluid">
<h1>Listagem de Usuários</h1>
<hr>

<div class="row">
<table class="table">
<thead>
<tr>
<th scope="col">Id</th>
<th scope="col">Nome</th>
<th scope="col">Email</th>
<th scope="col">Nível de Acesso</th>
<th scope="col"></th>
</tr>
</thead>
<tbody>

<?php   
    while($usuarios = mysqli_fetch_assoc($select_usuarios)) { ?>
    
<tr>
<th scope="row">
<?php echo $usuarios['id']?></th>
<td><?php echo $usuarios['nome']?></td>
<td><?php echo $usuarios['email']?></td>
<td>
<?php
    if($usuarios['acesso'] == 1) {
        echo '<span class="badge rounded-pill bg-primary">Administrador</span>';
    }
    if($usuarios['acesso'] == 2) {
        echo '<span class="badge rounded-pill bg-danger">Usuário</span>'; 
    }
    if($usuarios['acesso'] == 3) {
        echo '<span class="badge rounded-pill bg-info">Cliente</span>';
    }  
 ?>
</td>

<td>
<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#edit_usuarios" 
data-id="<?php echo $usuarios['id']?>"
data-nome="<?php echo $usuarios['nome']?>"
data-email="<?php echo $usuarios['email']?>"
data-usuario="<?php echo $usuarios['usuario']?>"
data-senha="<?php echo $usuarios['senha']?>"
data-acesso="<?php echo $usuarios['acesso']?>"><i class="bi bi-pencil"></i></button>
<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#deleteUsuario" data-id="<?php echo $usuarios['id']?>"><i class="bi bi-trash"></i></button>
<button type="button" class="btn btn-outline-dark"><i class="bi bi-info-circle"></i></button>
</td>

<?php
 }
?>

</tbody>
</table>
</div>
</div>

    <!-- Modal Editar Usuário-->
    <div class="modal fade" id="edit_usuarios" tabindex="-1" aria-labelledby="editingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-info">
                   <h5 class="modal-title" id="editarusuarioModalLabel">Editar Usuario</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="actions/Edit_usuario.php" method="POST">
                    <div class="form-floating mb-3">
                            <input type="hidden" class="form-control input1" id="input_id" name="id" required>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control input1" id="input_nome" name="nome" required>
                            <label for="floatingInputName"> Nome Completo: </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control input1" id="input_email" name="email" required>
                            <label for="floatingInputEmail"> E-mail: </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control input1" id="input_usuario" name="usuario" required>
                            <label for="floatingInputUsuario"> Nome de usuário: </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control input1" id="input_senha" name="senha" required>
                            <label for="floatingSenha1"> Senha: </label>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text-black"> Acesso: </label>
                        </div>
                        <select class="form-select input1" aria-label="Default select example" id = "select_acesso" name="acesso" required>
                            <option selected value="">Selecione:</option>
                            <option value="1">Administrador</option>
                            <option value="2">Usuário</option>
                            <option value="3">Cliente</option>
                        </select>
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

        <!-- Modal Excluir-->
        <div class="modal fade" id="deleteUsuario" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-info" id="exitModalLabel">Deseja excluir este usuário?</h5>
                </div>
                <div class="modal-body">
                <form method="POST" action="actions/Del_usuario.php">
                <input type="hidden" class="form-control input1" id="input_delete" name="id" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Excluir</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    // função para mostrar os dados do usuario preenchido no modal editar
    var exampleModal = document.getElementById("edit_usuarios");
    exampleModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget 
        var id = button.getAttribute('data-id');
        var nome = button.getAttribute('data-nome');
        var email = button.getAttribute('data-email');
        var usuario = button.getAttribute('data-usuario');
        var senha = button.getAttribute('data-senha');
        var acesso = button.getAttribute('data-acesso');

        var modalTitle = exampleModal.querySelector('.modal-title');
        modalTitle.textContent = "Editar Usuário: " + nome
        document.getElementById("input_id").value = id;
        document.getElementById("input_nome").value = nome;
        document.getElementById("input_email").value = email;
        document.getElementById("input_usuario").value = usuario;
        document.getElementById("input_senha").value = senha;
        document.getElementById("select_acesso").value = acesso;

    })

    </script>
    
    <script>
         var exampleModal2 = document.getElementById("deleteUsuario");
    exampleModal2.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget 
        var id = button.getAttribute('data-id');
        document.getElementById("input_delete").value = id;

    })
    </script>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>