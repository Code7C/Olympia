
<?php 
session_start();
if (!isset($_SESSION['id']))
{
    header("Location: /HTML/Login.php");  
}  
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio Web</title>
    <link rel="stylesheet" href="/CSS/StylesIndex.css">
    <script src="/JS/Index.js"></script>
</head>
<body>   
    <header class="header">
        <div class="container">
            <nav class="navbar">
                <a class="navbar-brand" href="#">
                    <img src="src/heracles.png" alt="Logo">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#bienvenida">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/HTML/planes.php">Ejercicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/HTML/playlist.php">Planes</a>
                    </li>
                </ul>
                <nav class="NavBar">
    <button class="dropdown-btn" onclick="toggleMenu()"><img src="/src/menu-tres-barras-delineadas.png" alt=""></button>
    <ul class="dropdown-menu" id="dropdownMenu">
        <li><a href="/HTML/misEjercicios.php">Mis Ejercicios</a></li>
        <li><a href="/HTML/entrenadores.html">Sobre Nosotros</a></li>
        <div class="btn">
                <button class="btn-login"><a href="/PHP/cerrarSesion.php">Cerrar Sesion</a></button>
            </div>
    </ul>
</nav>
            </nav>
        </div>
    </header>
    <section class="Inicio">
        <div class="overlay">
            <div class="intro-text">
                <h1>NO PAIN NO GAIN</h1>
                <p>Tener un cuerpo perfecto requiere mucho entrenamiento. Un cuerpo bonito y un organismo fuerte están interconectados, y podemos ayudarte con ambos.</p>
            </div>
        </div>
    </section> 
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Heracles. Todos los derechos reservados.</p>
        </div>
    </footer>   
</body>
</html>
