<?php
session_start();
//var_dump($_POST);
include ("../conexao.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$acesso = $_POST['acesso'];

$update_usuario = mysqli_query($conn, "UPDATE usuarios set 
nome = '$nome', 
email = '$email', 
usuario = '$usuario', 
senha = '$senha',
acesso = '$acesso', 
modificado = NOW() WHERE id = '$id'");

if(mysqli_affected_rows($conn)) { ?>
<script>
alert("Usuário editado com sucesso!");
</script>
<?php
} else { ?>
    <script>
        alert("Erro ao editar o usuário!");
        </script>
        
<?php
}
?>