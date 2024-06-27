<?php
session_start();
//var_dump($_POST);
include("../conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$acesso = $_POST['acesso'];

$insert_usuarios = mysqli_query($conn, "INSERT  INTO usuarios
(
nome,
email,
usuario,
senha,
acesso,
criado
)

VALUES
(
'$nome',
'$email',
'$usuario',
'$senha',
'$acesso',
NOW()
)");

if(mysqli_insert_id($conn)){?>
     <script>
        alert("Usuário cadastrado com sucesso!");
        location.href = "../Dashboard.php";
     </script>

<?php
}else { ?>
 <script>
     alert("Usuário cadastrado com sucesso!");
        location.href = "../Dasboard.php";
 </script>
<?php
}
?>