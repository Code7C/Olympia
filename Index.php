
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
                <p>Having a perfect body requires a lot of training. Nice-looking body and powerful organism are interconnected – and we can help you with both.</p>
            </div>
        </div>
    </section> 
<section class="news">
    <div class="container">
        <div class="news-item left">
            <img src="ruta/a/imagen1.jpg" alt="Noticia 1">
            <div class="news-content">
                <h3>Nuevo Entrenador Personal</h3>
                <p>¡Tenemos un nuevo entrenador en nuestro equipo! Ven a conocerlo y recibe asesoramiento personalizado para alcanzar tus metas.</p>
                <a href="#" class="read-more">Leer más</a>
            </div>
        </div>
        <div class="news-item right">
            <img src="ruta/a/imagen2.jpg" alt="Noticia 2">
            <div class="news-content">
                <h3>Desafío de 30 Días</h3>
                <p>Únete al desafío de 30 días de acondicionamiento físico y mejora tu salud. ¡Inscríbete ya!</p>
                <a href="#" class="read-more">Leer más</a>
            </div>
        </div>
        <div class="news-item left">
            <img src="ruta/a/imagen3.jpg" alt="Noticia 3">
            <div class="news-content">
                <h3>Actualización de Horarios</h3>
                <p>Ajustamos nuestros horarios para darte más opciones. Consulta el nuevo calendario de clases aquí.</p>
                <a href="#" class="read-more">Leer más</a>
            </div>
        </div>
        <div class="news-item right">
            <img src="ruta/a/imagen4.jpg" alt="Noticia 4">
            <div class="news-content">
                <h3>Consejos de Nutrición</h3>
                <p>Descubre los mejores consejos de nutrición para mantenerte saludable y en forma todo el año.</p>
                <a href="#" class="read-more">Leer más</a>
            </div>
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
