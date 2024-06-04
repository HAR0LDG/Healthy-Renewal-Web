<!DOCTYPE html>
<html lang="es-ES">
<head>
        <meta charset="UTF-8">
        <title>Healthy Renewal</title>
        <link rel="icon" type="image/x-icon" href="../img/login.png">
        <link rel="stylesheet" type="text/css" href="http://localhost/hr/css/main.css">
        <link href="https://fonts.googleapis.com/css2?family=Antic+Slab&family=Suez+One&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie-edge">
        <script src="https://kit.fontawesome.com/aa17e7849d.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="header-index">                                
            <div class="nav-group">                                    
                <a href="../index.php" class="one-nav"><img src="../img/logo.png"></img></a>
                <label for="clic-menu" class="three-nav" href="meni" ><i class="fa-solid fa-bars"></i></label>
                <input type="checkbox" id="clic-menu"></input>
                <div class="items" >
                    <div class='seven-nav item search-home'>
                        <input  type='text' placeholder='__' name='buscar' id='buscar'></input>
                        <button for='buscar'><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <a href="vmeanficha.php"  class="five-nav item">¿Qué es una ficha antropométrica?</a>
                    <a href="vinfoplanes.php" class="six-nav item">Información planes</a>                                    
                    <div class='seven-nav item search-home search-hidden'>
                        <input  type='text' placeholder='__' name='buscar' id='buscar'></input>
                        <button for='buscar'><FontAwesomeIcon icon={faMagnifyingGlass}/></button>
                    </div>
                </div>
            </div>
            <div class='buttons-tablet'>
                <div class='styleButtonTablet'>
                    <a href="vsignIn.php" class='sign In'>Iniciar Sesión</a>
                    <a href="../registro.php" class='sign Up'>Registrarse</a>                                        
                </div>
            </div>
        </div>
        <div class='buttons-mobile'>
            <a href="vsignIn.php" class='sign In'>Iniciar Sesión</a>
            <a href="../registro.php" class='sign Up'>Registrarse</a>
        </div>
        <div class='items-tablet'>
            <div class="inside-tablet" >
                <a href="vmeanficha.php"  class=" item-tablet position-one">¿Qué es una ficha antropométrica?</a>
                <a href="vinfoplanes.php" class=" item-tablet position-two">Información planes</a>
                <div class='item search-hidden'>
                    <input  type='text' placeholder='__' name='buscar' id='buscar'></input>
                    <button for='buscar'><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </div>
    </header>
    <div class="info-planes">
        <h1>Información planes</h1>
        <div class="if-continf">
            <div class="if-text">
            <p>Nuestros planes están basados en la toma o creación de la ficha antropométrica. A través de la que se realiza una extracción de datos sobre ti, para determinar el estado actual de tu salud y poder indicarte el mejor plan.</p> 
            <p>Partiendo de un plan de actividad física, con el que se te asignará un plan nutricional , no solamente tendrás los entrenamientos diarios sino que también te indicáremos cuál es la alimentación que más te favorece para sacar el mayor potencial de tu salud.</p>
            <p>Cuando inicies uno de nuestros planes, podrás conocer tu gasto y  consumo calórico, adicional a ello podrás conocer la cantidad de calorías que tiene cada alimento y su procedencia, como dato curioso.</p>
            </div>
            <div class="if-imgs">
                <div class="img-one-if">
                    <img src="../img/info-one.png" class=""></img>
                </div>
                <div class="img-two-if">
                    <img src="../img/info-two.png" class=""></img>
                </div>
            </div>
        </div>
    </div>
    <footer>
    	<div class='container-footer'>
			<div class='company-section-footer'>				
				<a href="home.php" class="footer-logo"><img src="../img/logo.png" alt=""></img></Link>
				<div class='list-company-footer'>
					<a href='mailto:correo@correo.com'><i><FontAwesomeIcon icon={faEnvelope}/> </i>correo@correo.com</a>
					<p>601-1234567</p>
					<p>Elaborado 2023 ©</p>
				</div>
			</div>
			<div class='information-footer'>
				<h2 id="informacion">Información</h2>
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
					<img class="imgredes" src="../img/insta.png" title="@Healthy.Renewal" />                   
					<img class="imgredes" src="../img/face.png" title="@Healthy.Renewal"/>                    
					<img class="imgredes" src="../img/twit.png" title="#HealthyRenewal"/>                    
					<img class="imgredes" src="../img/whats.png"title="HRWhatsapp"/>                    
				</div>
			</div>
   		</div>
    </footer>
</body>
</html>