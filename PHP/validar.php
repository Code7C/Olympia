<?php
$usu=$_REQUEST['email'];
$pass=md5($_REQUEST['con']);
include "conexion.php";
$sql="SELECT * FROM usuario WHERE USR='$usu' and PASS='$pass'";
$resu=mysqli_query($cnx,$sql);

if (mysqli_num_rows($resu)>0)
{
    header("Location: ../Index.php");
}
else
{
    echo "Usuario o contraseña incorrectos";
}
?>