<?php
session_start();
//var_dump($_POST);
include("../conexao.php");

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];

$update_produtos = mysqli_query($conn, "UPDATE produtos set 
codigo = '$codigo',
nome = '$nome', 
categoria = '$categoria', 
preco = '$preco', 
quantidade = '$quantidade' WHERE id = '$id'");

if(mysqli_affected_rows($conn)) { ?>
<script>
alert("Produto editado com sucesso!");
</script>
<?php
} else { ?>
    <script>
        alert("Erro ao editar o produto!");
        </script>
        
<?php
}
?>