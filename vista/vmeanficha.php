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
    <div class="mean-ficha">
        <h1>Ficha Antropométrica</h1>
        <div class="cont-meanf">
            <div class="par-meanf">
                <p>Una ficha antropométrica es un registro o documento que recopila y presenta información detallada sobre las medidas y características físicas de una persona. Estas medidas generalmente se refieren a diferentes aspectos del cuerpo humano, como la estatura, el peso, las dimensiones de diferentes segmentos corporales, la circunferencia de ciertas áreas (como la cintura, la cadera, el brazo, etc.), y en algunos casos también pueden incluir datos sobre características faciales.</p>
                <p>Las fichas antropométricas son utilizadas en diversos campos, como la medicina, la nutrición, la ergonomía, la antropología y la biología, entre otros. Pueden ser útiles para evaluar el crecimiento y desarrollo de los individuos, el estado nutricional, la composición corporal y para diseñar entornos y productos que sean adecuados y seguros para la población en general.</p>
                <p>En resumen, una ficha antropométrica es un recurso importante para recopilar datos cuantitativos sobre las características físicas de las personas, lo que puede ser valioso para la investigación, la planificación y la toma de decisiones en diferentes ámbitos.</p>
            </div>
            <div class="img-meanf">
                <img src="../img/qfa.png" class=""></img>
            </div>
        </div>
    </div>
    <footer>
	    <div class='container-footer'>
			<div class='company-section-footer'>
				<a href="home.php" class="footer-logo"><img id="logo" src="../img/logo.png" alt=""></img></Link>			
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