<?php
session_start();
include("conexao.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$select_usuarios = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'");
$row = mysqli_fetch_array($select_usuarios);

if(is_array($row)){
  $_SESSION['acesso'] = 1;
  header('Location: Dashboard.php');
}else{
  $_SESSION['erro'] = 'Usuario ou Senha Inválidos!';
  header('Location: Login.php');
}
?>