<?php 
session_start();
if (!isset($_SESSION['id']))
{
    header("Location: /HTML/Login.php");  
}
include "../PHP/conexion.php";
$sql = "SELECT * FROM ejercicios_gimnasio";
$result = $cnx->query($sql); 

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio Web</title>
    <link rel="stylesheet" href="/CSS/StylesPlanes.css">
    <link rel="stylesheet" href="/CSS/StylesAgregarEjercicio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intro.js/minified/introjs.min.css">
    <script src="/JS/Index.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/intro.js/minified/intro.min.js"></script>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <a class="navbar-brand" href="#">
                <img src="/src/heracles.png" alt="Logo">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../Index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ejercicios">Ejercicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/HTML/playlist.php">Planes</a>
                    </li>
                </ul>            
                <div class="btn">
                    <button class="btn-login"><a href="/PHP/cerrarSesion.php" data-intro='Cerrar sesion' data-step='1'>Cerrar Sesion</a></button>
                    <button class="btn-add" onclick="openModal()" data-intro='Cargar ejercicios' data-step='2'>+</button> 
                    <button id="startTour">Iniciar Tour</button>
                </div>        
            </nav>
        </div>
    </header>
    <section class="ejercicios" id="ejercicios">
        <div class="container">
            <h2>Ejercicios de Gimnasio</h2>
            <div class="card-container">
            <?php if ($result->num_rows > 0):
                    $T=false;
                    ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="card">
                            <div class="card-content">
                            <img src="<?php echo $row['imagen_url']; ?>">
                                <h3><?php echo $row['nombre']; ?></h3>
                                <p><?php echo $row['descripcion']; ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No hay ejercicios disponibles en este momento.</p>
                <?php endif; ?>
            </div>
    </section>
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Mi Sitio Web. Todos los derechos reservados.</p>
        </div>
    </footer>
<dialog id="exerciseDialog">
    <div class="modal-overlay" id="modal-overlay" style="display: none;">
        <div class="modal">
            <button class="close-button" onclick="closeModal()">✖</button>
            <h1>Agregar un Ejercicio</h1>
            <form action="/PHP/agregarEjercicio.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombre del ejercicio:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción del ejercicio:</label>
                    <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="imagen">Subir imagen:</label>
                    <input type="file" id="imagen" name="imagen" accept="image/*" required>
                </div>
                <input type="submit" value="Cargar Ejercicio" class="btn">
            </form>
        </div>
    </div>
</dialog>
</body>
</html>
