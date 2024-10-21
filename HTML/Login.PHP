<?php 
session_start();
include "../PHP/conexion.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $usu=$_REQUEST['email'];
  $pass=$_REQUEST['pass'];
  $sql="SELECT id FROM usuario WHERE usr='$usu' and pass='$pass'";
  $resu=mysqli_query($cnx,$sql);
  while ($fila=mysqli_fetch_array($resu)) 
  {
    $_SESSION['id'] = $fila['id'];
    $_SESSION['email'] = $usu; 
}
  if (mysqli_num_rows($resu)>0)
  {
      header("Location: ../Index.php");
  }
  else
  {
      echo '<script>  
        alert("El usuario no esta registrado");
        window.location="/HTML/Login.php";
        </script>';
  }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de sesion</title>
  <link rel="stylesheet" href="/CSS/Stylelogin.css">
  <script src="/JS/Index.js"></script>
</head>
<body>
  <div class="form">
    <h1>Bienvenido</h1>
    <form onsubmit="return validarForm()" action="" method="post">
      <div class="user">
        <label><img src="/src/icons-usuario.png" height="30px"></label>
        <input type="text" name="email" id="email" onclick="Corregir('email','msjEmail')">
        <span id="msjEmail"></span>
       </div>
      <div class="pass">
        <label><img src="/src/icons-candado.png" height="24px"></label>
        <input type="password" name="pass" id="pass" onclick="Corregir('pass','msjPass')">
        <span id="msjPass"></span>
      </div>
      <div class="text">
        <p><a href="/HTML/NuevaCuenta.php">¿No tienes cuenta?</a></p>
      </div>
        <input type="submit" value="Iniciar">
    </form>
    </div>
</body>
</html>