<?php
$nam = $_REQUEST['nom'];
$ape = $_REQUEST['ape'];
$pass =$_REQUEST['con'];
$email = $_REQUEST['email'];
$pass2 = $_REQUEST['con2'];

include "conexion.php";
$veriCorreo = mysqli_query($cnx, "SELECT * FROM usuario WHERE usr='$email'");

if (mysqli_num_rows($veriCorreo) > 0) {
    echo '<script>  
        alert("El correo ya está registrado");
        window.location="/HTML/Login.php";
        </script>';
    exit();
}
$sql = "INSERT INTO `usuario`(`nom`, `ape`, `pass`, `usr`) VALUES ('$nam','$ape','$pass','$email')";
$conect = mysqli_query($cnx, $sql);

if ($conect) {
    echo '<script>
        alert("Usuario registrado exitosamente");
        window.location="/HTML/Login.php";
        </script>';
} else {
    echo '<script>
        alert("Error al registrar el usuario");
        window.location="/HTML/Login.php";
        </script>';
}

mysqli_close($cnx);
?>
