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
    <link rel="stylesheet" href="/CSS/StylesPlanes.css">
    <script src="/JS/Index.js"></script>
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
                <button class="btn-login"><a href="/PHP/cerrarSesion.php">Cerrar Sesion</a></button>
                </div>                
            </nav>
        </div>
    </header>
    <section class="ejercicios" id="ejercicios">
        <div class="container">
            <h2>Ejercicios de Gimnasio</h2>
            <div class="card-container">
                <div class="card">
                    <img src="/src/barbell-calf-raise-400.jpg">
                    <div class="card-content">
                        <h3>Sentadilla</h3>
                        <p>Ejercicio para trabajar los músculos de las piernas y glúteos.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/bench-press-400.jpg">
                    <div class="card-content">
                        <h3>Press de Banca</h3>
                        <p>Ejercicio que se enfoca en el pecho, tríceps y hombros.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/cable-crunch-400.jpg">
                    <div class="card-content">
                        <h3>Dominadas</h3>
                        <p>Ejercicio para desarrollar la fuerza en la espalda y bíceps.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/cable-lateral-raise-800.jpg">
                    <div class="card-content">
                        <h3>Press Militar</h3>
                        <p>Ejercicio que se enfoca en los hombros y los tríceps.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/dips-400.jpg">
                    <div class="card-content">
                        <h3>Remo con Barra</h3>
                        <p>Ejercicio para fortalecer los músculos de la espalda.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/dumbbell-bulgarian-split-squat-800.jpg">
                    <div class="card-content">
                        <h3>Peso Muerto</h3>
                        <p>Ejercicio compuesto para la parte inferior del cuerpo y espalda.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/hammer-curl-400.jpg">
                    <div class="card-content">
                        <h3>Curl de Bíceps</h3>
                        <p>Ejercicio para fortalecer los músculos del bíceps.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/hanging-knee-raise-400.jpg">
                    <div class="card-content">
                        <h3>Extensión de Tríceps</h3>
                        <p>Ejercicio que se enfoca en los tríceps.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/hip-adduction-800.jpg">
                    <div class="card-content">
                        <h3>Abdominales</h3>
                        <p>Ejercicio para fortalecer la zona media del cuerpo.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/incline-dumbbell-bench-press-400.jpg">
                    <div class="card-content">
                        <h3>Plancha</h3>
                        <p>Ejercicio isométrico para fortalecer el core.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/incline-dumbbell-curl-400.jpg">
                    <div class="card-content">
                        <h3>Step-up</h3>
                        <p>Ejercicio para trabajar piernas y glúteos.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/leg-extension-800.jpg">
                    <div class="card-content">
                        <h3>Fondos de Tríceps</h3>
                        <p>Ejercicio para el desarrollo del tríceps y pecho.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/lying-dumbbell-tricep-extension-400.jpg">
                    <div class="card-content">
                        <h3>Press de Piernas</h3>
                        <p>Ejercicio para fortalecer los músculos de las piernas.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/lying-leg-curl-400.jpg">
                    <div class="card-content">
                        <h3>Burpees</h3>
                        <p>Ejercicio cardiovascular que trabaja todo el cuerpo.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/machine-chest-fly-400.jpg">
                    <div class="card-content">
                        <h3>Elevación Lateral</h3>
                        <p>Ejercicio para los hombros.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/one-arm-seated-cable-row-800.jpg">
                    <div class="card-content">
                        <h3>Sentadilla Hack</h3>
                        <p>Variante de la sentadilla que enfatiza las piernas.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/pull-ups-400.jpg">
                    <div class="card-content">
                        <h3>Hip Thrust</h3>
                        <p>Ejercicio para fortalecer glúteos y parte baja de la espalda.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/romanian-deadlift-800.jpg">
                    <div class="card-content">
                        <h3>Crunch Abdominal</h3>
                        <p>Ejercicio clásico para la zona abdominal.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/seated-dumbbell-shoulder-press-800.jpg">
                    <div class="card-content">
                        <h3>Crunch Abdominal</h3>
                        <p>Ejercicio clásico para la zona abdominal.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/smith-machine-squat-800.jpg">
                    <div class="card-content">
                        <h3>Crunch Abdominal</h3>
                        <p>Ejercicio clásico para la zona abdominal.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="/src/tricep-rope-pushdown-400.jpg">
                    <div class="card-content">
                        <h3>Crunch Abdominal</h3>
                        <p>Ejercicio clásico para la zona abdominal.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Mi Sitio Web. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>