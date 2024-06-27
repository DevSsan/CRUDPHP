<?php
session_start();
//var_dump($_POST);
include ("../conexao.php");

$id = $_POST['id'];

$delete_usuario = mysqli_query($conn, "DELETE FROM usuarios WHERE id = '$id'");

if(mysqli_affected_rows($conn)) { ?>
<script>
alert("Usuário excluido");
</script>
<?php
} else { ?>
    <script>
        alert("Erro ao apagar o usuario");
        </script>
        
<?php
}
?>