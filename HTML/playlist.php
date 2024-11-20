<?php 
session_start();
if (!isset($_SESSION['id']))
{
    header("Location: /HTML/Login.php");  
} 
include "../PHP/conexion.php";
if (isset($_POST['like_id'])) {
    $planId = (int) $_POST['like_id'];
    $sql = "UPDATE planes SET likes = likes + 1 WHERE id = $planId";
    $cnx->query($sql);
    header("Location: playlist.php");
    exit();
}
$sql = "SELECT * FROM planes";
$result = $cnx->query($sql); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio Web</title>
    <link rel="stylesheet" href="/CSS/StylePlaylist.css">
    <script src="/JS/playlist.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/intro.js/minified/intro.min.js"></script>
    <script src="/JS/Index.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intro.js/minified/introjs.min.css">
  
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
                        <a class="nav-link" href="/HTML/planes.php">Ejercicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#planes">Planes</a>
                    </li>
                </ul>
                <div class="btn">
            </button>
                </div>
                <nav class="NavBar">
    <button class="dropdown-btn" onclick="toggleMenu()"><img src="/src/menu-tres-barras-delineadas.png" alt=""></button>
    <ul class="dropdown-menu" id="dropdownMenu">
        <li><a href="/HTML/misEjercicios.php">Mis Ejercicios</a></li>
        <li><a href="/HTML/entrenadores.html">Sobre Nosotros</a></li>
        <li><button id="startTour">Iniciar Tour</button></li>
        <div class="btn">
                <button class="btn-login"><a href="/PHP/cerrarSesion.php" data-intro='Cerrar sesion' data-step='1'>Cerrar Sesion</a></button>      
            </div>
    </ul>
</nav>    
            </nav>
        </div>
    </header>
    <section class="planes" id="planes">
        <div class="container">
            <h2>Planes de Entrenamiento</h2>
            <div class="card-container">
                <?php if ($result->num_rows > 0):
                    $T=false;
                    ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <div class="card">
                            <div class="card-content">
                                <h3><a download="Hola" href="/HTML/entrenadores.html"><?php echo $row['nombre']; ?></a></h3>
                                <p><?php echo $row['descripcion']; ?></p>
                                <form method="post" onsubmit="likePlan(event, <?php echo $row['like_id']; ?>)">
                                <input type="hidden" name="like_id" data value="<?php echo $row['like_id']; ?>">
                                <button type="submit" class="like-btn"<?php if($T==false)echo "data-intro='Boton de me gusta' data-step='2'"; $T=true; ?>>
                                <img src="/src/like.png" alt="Like">    
                                </button>
                                </form>
                                <span id="like-count-<?php echo $row['like_id']; ?>"><?php echo $row['likes']; ?> likes</span>

                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No hay planes disponibles en este momento.</p>
                <?php endif; ?>
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