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
    <title>Heracles</title>
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
                    <button class="btn-add" onclick="openModal()" data-intro='Cargar ejercicios' data-step='2'>+</button> 
                </div>        
                <nav class="NavBar">
    <button class="dropdown-btn" onclick="toggleMenu()"><img src="/src/menu-tres-barras-delineadas.png" alt=""></button>
    <ul class="dropdown-menu" id="dropdownMenu">
        <li><a href="/HTML/misEjercicios.php">Mis Ejercicios</a></li>
        <li><a href="/HTML/entrenadores.html">Sobre Nosotros</a></li>
        <li><button id="startTour">Iniciar Tutorial</button></li>
        <div class="btn">
                <button class="btn-login"><a href="/PHP/cerrarSesion.php" data-intro='Cerrar sesion' data-step='1'>Cerrar Sesion</a></button>      
            </div>
    </ul>
</nav>
            </nav>  
        </div>
    </header><br>
    <section class="ejercicios" id="ejercicios">
    <div class="card-container">
    <?php
include '../PHP/conexion.php';
$sql = "SELECT id, nombre, descripcion, imagen_url FROM ejercicios_gimnasio WHERE es_publico = TRUE";
$result = mysqli_query($cnx, $sql);

            if ($result->num_rows > 0): 
                $T = false; 
                ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="card">
                        <a href="/HTML/ejercicios.php?id=<?php echo $row['id']; ?>">
                            <div class="card-content" <?php if (!$T) echo "data-intro='Muestra del ejercicio' data-step='3'"; $T = true; ?>>
                                <img src="<?php echo htmlspecialchars($row['imagen_url']); ?>" alt="<?php echo htmlspecialchars($row['nombre']); ?>">
                                <h3><?php echo htmlspecialchars($row['nombre']); ?></h3>
                                <p><?php echo htmlspecialchars($row['descripcion']); ?></p>
                            </div>
                        </a>
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
