<?php
session_start();
//var_dump($_POST);
include("../conexao.php");

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];

$insert_produto = mysqli_query($conn, "INSERT INTO produtos
(
codigo,
nome,
categoria,
preco,
quantidade,
armazenado
)

VALUES
(
'$codigo',
'$nome',
'$categoria',
'$preco',
'$quantidade',
NOW()
)");

if(mysqli_insert_id($conn)) { ?>
    <script>
        alert("Produto cadastrado com sucesso!");
        location.href="../dashboard.php";
    </script>
<?php
} else { ?>
    <script> 
        alert("Erro ao cadastrar o produto!");
        location.href = "../dashboard.php";
    </script>
<?php
}
?>