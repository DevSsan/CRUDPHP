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
$select_produtos = mysqli_query($conn, "SELECT * FROM produtos");
?>

<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<div class="container-fluid">
<h1>Listagem de Produtos</h1>
<hr>

<div class="row">
<table class="table">
<thead>
<tr>
<th scope="col">Id</th>
<th scope="col">Codigo</th>
<th scope="col">Nome</th>
<th scope="col">Categoria</th>
<th scope="col"></th>
</tr>
</thead>
<tbody>

<?php   
    while($produtos = mysqli_fetch_assoc($select_produtos)) { ?>
    
<tr>
<th scope="row"> 
<?php echo $produtos['id']?></th>
<td><?php echo $produtos['codigo']?></td>
<td><?php echo $produtos['nome']?></td>
<td>
<?php
    if($produtos['categoria'] == 1) {
        echo '<span class="badge rounded-pill bg-primary">Eletrônicos</span>';
    }
    if($produtos['categoria'] == 2) {
        echo '<span class="badge rounded-pill bg-danger">Eletrodomésticos</span>'; 
    }
    if($produtos['categoria'] == 3) {
        echo '<span class="badge rounded-pill bg-info">Periféricos</span>';
    }  
 ?>
</td>

<td>
<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#edit_produtos" 
data-id="<?php echo $produtos['id']?>"
data-codigo="<?php echo $produtos['codigo']?>"
data-nome="<?php echo $produtos['nome']?>"
data-categoria="<?php echo $produtos['categoria']?>"
data-preco="<?php echo $produtos['preco']?>"
data-quantidade="<?php echo $produtos['quantidade']?>"><i class="bi bi-pencil"></i></button>
<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#deleteProduto" data-id="<?php echo $produtos['id']?>"><i class="bi bi-trash"></i></button>
<button type="button" class="btn btn-outline-dark"><i class="bi bi-info-circle"></i></button>
</td>

<?php
 }
?>

</tbody>
</table>
</div>
</div>

  <!-- Modal Editar Produtos-->
<div class="modal fade" id="edit_produtos" tabindex="-1" aria-labelledby="editingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-info">
                   <h5 class="modal-title" id="editarprodutoModalLabel">Editar Produto</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="actions/Edit_produto.php" method="POST">
                    <div class="form-floating mb-3">
                            <input type="hidden" class="form-control input1" id="input_id" name="id" required>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" step="any" class="form-control input1" id="input_codigo" name="codigo" required>
                            <label for="floatingInputCodigo"> Código do produto: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control input1" id="input_nome" name="nome" required>
                            <label for="floatingInputName"> Nome do produto: </label>
                        </div>
                      
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text-black"> Categoria: </label>
                        </div>

                        <select class="form-select input1" aria-label="Default select example" id = "select_categoria" name="categoria" required>
                            <option selected value="">Selecione:</option>
                            <option value="1">Eletrônicos</option>
                            <option value="2">Eletrodomésticos</option>
                            <option value="3">Periféricos</option>
                        </select>
                      </p>
                          
                        <div class="form-floating mb-3">
                            <input type="number" step="any" class="form-control input1" id="input_preco" name="preco" required>
                            <label for="floatingInputPreco"> Preço: </label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control input1" id="input_quantidade" name="quantidade" required>
                            <label for="floatingQuantidade"> Quantidade: </label>
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
</div>

        <!-- Modal Excluir-->
        <div class="modal fade" id="deleteProduto" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-info" id="exitModalLabel">Deseja excluir este produto?</h5>
                </div>
                <div class="modal-body">
                <form method="POST" action="actions/Del_produto.php">
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
    // função para mostrar os dados do Produto preenchido no modal editar
    var exampleModal = document.getElementById("edit_produtos");
    exampleModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget 
        var id = button.getAttribute('data-id');
        var codigo = button.getAttribute('data-codigo');
        var nome = button.getAttribute('data-nome');
        var categoria = button.getAttribute('data-categoria');
        var preco = button.getAttribute('data-preco');
        var quantidade = button.getAttribute('data-quantidade');

        var modalTitle = exampleModal.querySelector('.modal-title');
        modalTitle.textContent = "Editar Produto: " + nome
        document.getElementById("input_id").value = id;
        document.getElementById("input_codigo").value = codigo;
        document.getElementById("input_nome").value = nome;
        document.getElementById("select_categoria").value = categoria;
        document.getElementById("input_preco").value = preco;
        document.getElementById("input_quantidade").value = quantidade;

    })

    </script>
    
    <script>
         var exampleModal2 = document.getElementById("deleteProduto");
    exampleModal2.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget 
        var id = button.getAttribute('data-id');
        document.getElementById("input_delete").value = id;

    })
    </script>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>