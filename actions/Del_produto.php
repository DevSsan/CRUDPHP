<?php
session_start();
//var_dump($_POST);
include ("../conexao.php");

$id = $_POST['id'];

$delete_produto = mysqli_query($conn, "DELETE FROM produtos WHERE id = '$id'");

if(mysqli_affected_rows($conn)) { ?>
<script>
alert("produto excluido");
</script>
<?php
} else { ?>
    <script>
        alert("Erro ao apagar o produto");
        </script>
        
<?php
}
?>