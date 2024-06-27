<?php
 $servername = "localhost";
 $database = "san2022";
 $username = "root";
 $password = "";
 // Criar conexão
 $conn = mysqli_connect("localhost", "root", "", "san2022");
 // Checkar conexão
 if (!$conn) {
 die("Erro na conexão!: " . mysqli_connect_error());
 }
 //echo "Conectado!";
?>