<?php
require_once 'conexao.php';

if(isset($_POST['entrar']) && !empty($_POST['email']) && !empty($_POST['senha']))
{

  $email = ($_POST['email']);
  $senha = ($_POST['senha']);

  $sql = "SELECT * FROM  gmail WHERE senha WHERE nome_completo = '$email' and '$senha'";
  $result = $con->query($sql);

  if (mysqli_num_rows($result) < 1) {
    echo "<script>alert('Senha ou Email inccorretos')
    window.location.href = '../index.php'</script>";
  } else {  
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['status'] = true;
    header("location:../pagina_inicial.php");
  }       
}
 

?>