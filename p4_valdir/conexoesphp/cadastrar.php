<?php
session_start();
require_once 'conexao.php';



if(isset(($_POST['cadastro']))){

    $nome = trim($_POST['nome']);
    $cpf = trim($_POST['cpf']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);


    $sql = "INSERT INTO  cadastro (nome_completo, cpf, gmail, senha) VALUES ('$nome','$cpf','$email','$senha')";

    mysqli_query($conn, $sql);
    header('Location:../index.php?status=ok');


    $result = $con->query($sql);

  $resultado = mysqli_fetch_array($result);
  $nome = $resultado[2];
  var_dump($resultado);   
  $_SESSION['nome_completo'] = $nome;
}



?>