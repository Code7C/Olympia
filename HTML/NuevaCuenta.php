<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nueva cuenta</title>
  <link rel="stylesheet" href="/CSS/StyleNewC.css">
</head>
<body>  
  <form onsubmit="return validarForm()" action="/PHP/Register.php" method="post">
    <div class="form-group">
      <label for="n">Nombre: </label><br>
      <input type="text" class="field" name="nom" id="n" oninput="Corregir('n', 'nom-error')"><br>
      <span id="nom-error"></span>
    </div>
    <div class="form-group">
      <label for="a">Apellido: </label><br>
      <input type="text" class="field" name="ape" id="a" oninput="Corregir('a', 'ape-error')"><br>
      <span id="ape-error"></span>
    </div>
    <div class="form-group">
      <label for="mail">Email: </label><br>
      <input type="text" class="field" name="email" id="mail" oninput="Corregir('mail', 'mail-error')"><br>
      <span id="mail-error"></span>
    </div>
    <div class="form-group">
      <label for="c">Contraseña: </label><br>
      <input type="password" class="field" name="con" id="c" oninput="Corregir('c', 'con-error')"><br>
      <span id="con-error"></span>
    </div>
    <div class="form-group">
      <label for="c2">Confirmar Contraseña: </label><br>
      <input type="password" class="field" name="con2" id="c2" oninput="Corregir('c2', 'con2-error')"><br>
      <span id="con2-error"></span>
    </div>
    <input type="submit" class="boton" value="Crear Cuenta">
  </form>
  <script src="/JS/NuevaCuenta.js"></script>
</body>
</body>
</html>