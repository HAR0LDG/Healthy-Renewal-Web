<?PHP
    require_once('modelo/mseguridad.php');
    require_once('modelo/conexion.php');
    require_once('modelo/musuario.php');
    $musuario = new musuario();
    $rutaFoto = $musuario->obtenerFoto();
    $perfil = isset($_SESSION["idperf"]) ? $_SESSION["idperf"] : NULL;
?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <title>Healthy Renewal</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="icon" type="image/x-icon" href="img/login.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie-edge"> 
    <script src="https://kit.fontawesome.com/aa17e7849d.js" crossorigin="anonymous"></script> 
</head>
<body> 
<header>
    <div class="container">
		<nav class="">
            <div class="header-index nav-group-perfil">
                <div class="aqui">
                    <li class="two-nav"><a class="two-nav"><img src="<?php echo $rutaFoto; ?>" class="two-nav"></img></a>
                    <ul class="menu-user-option">
                        <li><a href="home.php?pg=105">Actualizar datos</a></li>
                        <?php
                            // Agregar condición para mostrar u ocultar el elemento según el perfil
                            if ($perfil === 1) {
                            echo '<li><a href="home.php?pg=110">Usuarios</a></li>';
                            echo '<li><a href="home.php?pg=111">Páginas</a></li>';
                            }
                        ?>
                        <li><a href="home.php?pg=150">Cerrar sesión</a></li>
                    </ul>
                    </li>
                </div>
                <div class="nav-group ">    
                    <a href="home.php" class="log-user"><img src="img/logo.png"></img></a>    
                    <label for="clic-menu" class="three-nav" href="meni"><i class="fa-solid fa-bars"></i></label>
                    <input type="checkbox" id="clic-menu"></input>
                    <div class="items" > 
                        <a href="home.php?pg=102" class="crear">Crear Ficha antropometrica</a>
                        <a href="home.php?pg=101"  class="five-nav item">Ver ficha antropométrica</a>
                        <a href="home.php?pg=103" class="six-nav item">Ver planes</a>                     
                    </div>
                </div>
            </div>
            <div class='items-tablet'>
                <div class="inside-tablet" >
                    <a href="home.php?pg=102" class="creardos item-tablet ">Crear Ficha antropometrica</a>
                    <a href="home.php?pg=101"  class=" item-tablet position-one">Ver ficha antropométrica</a>
                    <a href="home.php?pg=103" class=" item-tablet position-two">Ver planes</a>					
                </div>
            </div>
        </nav>
    </div>	
</header>
<main>
    <div class="container-home">
			<?PHP 
            require_once("home.php");
	        $pg = isset($_GET["pg"]) ? $_GET["pg"]:NULL;
            if(!$pg) 
            require_once("vista/vconthome.php");
            if($pg=="101") 
                require_once("vista/vfichantropometrica.php");
            if($pg=="102") 
                require_once("vista/vnuevaficha.php");
            if($pg=="103") 
                require_once("vista/vverplanes.php"); 
            if($pg=="104") 
                require_once("vista/vactualizarficha.php"); 
            if($pg=="105") 
                require_once("vista/vactualizardatos.php"); 
            if($pg=="106") 
                require_once("vista/vtrainer.php"); 
            if($pg=="107") 
                require_once("vista/vplanutri.php"); 
            if($pg=="108") 
                require_once("vista/vmeanficha.php"); 
            if($pg=="109")
                require_once("vista/veliminarcuenta.php");
            if($pg=="150") 
                require_once("vista/vsalir.php"); 
            if($perfil===3 && $pg=="110")
                echo "<script type='text/javascript'>window.location='home.php';</script>";
            if($perfil===1 && $pg=="110")
                require_once("vista/vusu.php");
            if($perfil===3 && $pg=="111")
                echo "<script type='text/javascript'>window.location='home.php';</script>";
            if($perfil===1 && $pg=="111")
                require_once("vista/vpag.php");
            ?>
    |</div>
</main>
<footer>
    <div class='container-footer'>
        <div class='company-section-footer'>
            <a href="/hr-home" class="footer-logo"><img src="img/logo.png" alt=""></img></Link>
            <div class='list-company-footer'>
                <a href='mailto:correo@correo.com'><i><FontAwesomeIcon icon={faEnvelope}/> </i>correo@correo.com</a>
                <p>601-1234567</p>
                <p>Elaborado 2023 ©</p>
            </div>
        </div>
        <div class='information-footer'>
                <h2>Información</h2>
            <ul class='list-information-footer'>
                <li><a href=''>Nosotros</a></li>
                <li><a href=''>Contáctanos</a></li>
                <li><a href=''>Terminos y condiciones</a></li>
                <li><a href=''>Soporte</a></li>
            </ul>
            
        </div>
        <div class='social-networking-footer'>
            <h1 id="tituloSiguenos">Síguenos</h1>
            <div id="siguenosdiv">
                <img class="imgredes" src="img/insta.png" title="@Healthy.Renewal" />                   
                <img class="imgredes" src="img/face.png" title="@Healthy.Renewal"/>                    
                <img class="imgredes" src="img/twit.png" title="#HealthyRenewal"/>                    
                <img class="imgredes" src="img/whats.png" title="HRWhatsapp"/>                    
            </div>
        </div>
    </div>
</footer>
</body>
</html>