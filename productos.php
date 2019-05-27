<?PHP
	require_once("clases/cConexion.php");
	require_once("clases/cFunciones.php");
	require_once("clases/cProductos.php");
	require_once("clases/cCategorias.php");
	require_once("clases/cImgalerias.php");
		
	$conn = new cConexion();
	$dblink = $conn -> iniciar();
	
	$oRegistros = new cProductos($dblink);
	$oRegistrosC = new cCategorias($dblink);
	$oRegistrosI = new cImgalerias($dblink);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Grupo Asolari | Paneles solares</title>
    <link href="css/reset.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/estilo.css" media="screen" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> 
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>     
</head>

<body id="int">
	<div class="bg" style="background:url(img/bgpic6.jpg) top center no-repeat">
    	<?PHP
        	$nMenu = 4;
			include("header.php")
		?>    
    	<!--<div class="topnav">
        	<div class="insider">
                <a href="index.html" class="logo"><img src="img/logo.png" /></a>
                
                <a href="#" class="twitter"></a>
                <a href="#" class="facebook"></a>
                <ul class="principal">
                    <li><a href="index.html">Home</a></li>                
                    <li><a href="como-funciona.html">Como funciona</a></li>
                    <li><a href="beneficios.html">Beneficios</a></li>
                    <li><a href="productos.html" class="selected">Productos</a></li>
                    
                    <li><a href="comprar.html" class="comprar">Comprar<span></span></a></li>
                </ul>
                <h1>PRODUCTOS</h1>                  
            </div>
        </div>-->		
	</div>
    
	<div class="contenedor">
    	<div class="contenido">
        	<div class="middle">
            	<div class="catalogo">
                	<?PHP
                    	$aDatosC = $oRegistrosC -> busquedaFiltradaCategoria();
						
						if(count($aDatosC) > 0){
							for($nContareg = 0; $nContareg < count($aDatosC); $nContareg++){
								if($nContareg > 0)
									echo '<hr />';
																	
								echo '<h1>'.$aDatosC[$nContareg]['DESCRIPCION'].'</h1>';
								
								if($nContareg == 0){
									echo '<p class="choro">Los paneles solares, que estos a su vez se conforman de celdas solares (echas de silicio, un material abundante en la tierra) que al entrar en contacto con la irradiación solar, producen energía eléctrica que puede ser utilizada en el hogar con electrodomésticos tales como televisores, lámparas, refrigeradores, climas, etc. y en el comercio o industria con computadoras, máquinas, motores, etc.</p>';
								
								}elseif($nContareg == 1){
									echo '<p class="choro">Los calentadores solares se usan generalmente para calentar el agua para bañarse y también para calentar el agua de las albercas. Se estima que un calentador solar genera ahorros de entre el 50% y el 80% del consumo de gas. Es decir que si usted paga $500 pesos mensuales de gas, podría ahorrarse hasta $400 pesos mensuales. De acuerdo con su funcionamiento los calentadores solares se clasifican en dos tipos:<br><br>
									<b>Activos</b><br>
									Los calentadores solares activos son aquellos que utilizan una bomba o algún tipo de energía externa para mover el agua dentro de su ciclo.<br><br>
									<b>Pasivos</b><br>
									Los generadores solares pasivos no requieren de energía externa para funcionar. Utilizan el principio de convección para mover el agua dentro del sistema.</p>';
								
								}elseif($nContareg == 2){
									echo '<p class="choro"><b>¿Para qué sirven los controladores, optimizadores o supresores de picos ?.</b><br />
												Hay muchos tipos de perturbaciones eléctricas. Esto incluye las harmónica, sobretensiones, altas y bajas de voltaje, entre otras. Lo que preocupa a mucha gente son los picos de voltaje que con frecuencia, pueden dañar o reducir la vida útil de los equipos electrónicos.<br /><br />
												<b>¿Cómo funciona el controlador de energía?</b><br />
												Nuestros equipos almacenan y reciclan la energía reactiva. Con esto, ya no hay necesidad de que se le suministre por la compañía eléctrica. Ahora la corriente ya es suministrada a través del sistema eléctrico, reduciendo las pérdidas dentro de las instalaciones.<br /><br />
												Nuestros equipos son unos Controladores de Energia y principalmente tienen 3 funciones.<br />
												&nbsp;&nbsp;1.- Banco de capacitores - Reciclan y reutilizan la energía reactiva, logrando ahorros garantizados entre un 8-12%<br />
												&nbsp;&nbsp;2.- Supresor de picos hasta 2,000 Jouls<br />
												&nbsp;&nbsp;3.- Regulador - Te acondiciona la luz al momento de entrar a la casa y/o motor.<br /><br />
												Nuestros productos reducen el consumo eléctrico utilizable en los sectores residencial, comercial e industrial, para todos los consumidores de servicios eléctricos de hasta 600 voltios. Los resultados tangibles de utilizar nuestros productos son:<br />
												&nbsp;&nbsp;a.	Un verdadero ahorro en el recibo de energía.<br />
												&nbsp;&nbsp;b.	La disminución de pérdidas de potencia y emisiones de carbono.<br />
												&nbsp;&nbsp;c.	Menores pérdidas de energía<br />
												&nbsp;&nbsp;d.	Una mejor regulación de voltaje<br />
												&nbsp;&nbsp;e.	Capacidad liberada del sistema.<br><br>
												<b>Comercial</b><br>Los ahorros podrán variar entre un 6% y un 17% en tu consumo (kWh) de tu recibo de energía. La mayoría de nuestros proyectos tienen un retorno de inversión (ROI) entre 6 y 24 meses. Compresores, bombas de agua, aire acondicionado, son algunos de los equipos donde las unidades mejor funcionan.<br><br>
												Es importante señalar que somos los únicos distribuidores de este producto en Veracruz.
											</p>';
											
								}elseif($nContareg == 3){
									echo '	<p class="choro">
												Los climas inverter son grandes ahorradores de energía. Su tecnología implementada trabaja en ciclos continuos evitando los picos de encendido y apagado, reduciendo el consumo de aire acondicionado hasta un 50%, dependiendo del uso. Gracias a esta nueva tecnología en los MiniSplit podemos reducir substancialmente el número de paneles necesarios en la instalación que requiere un sistema de ahorro integral resultando un menor gasto teniendo un mayor beneficio. Los precios de nuestros equipos son muy accesibles y son una gran inversión.
												<br/><br/>
												<img src="imgProductos/tablaClimas.png" />
											</p>';
											
								}elseif($nContareg == 4){
									echo '	<p class="choro">
												A menudo hay espacios que se quedan en la oscuridad porque los costos del cableado y de la misma electricidad son prohibitivos y esto se traduce en peligro e inseguridad. Las lámparas solares son grandes ahorradoras de energía porque cargan y almacenan electricidad durante el día y se encienden automáticamente durante la noche sin ocupar electricidad externa en ningún momento. Entre las grandes ventajas de estas lámparas está el hecho de que proveen luz aun durante apagones y que no requieren gasto en infraestructura como zanjas, cableado, etc. Nuestras lámparas y luminarias son una gran inversión.
											</p>';
								}
								
								$aDatos = $oRegistros -> busquedaFiltradaProducto(false, $aDatosC[$nContareg]['IDCATEGORIA']);
								
								for($nConta = 0; $nConta < count($aDatos); $nConta++){
									$aDatosI = $oRegistrosI -> busquedaFiltradaImgaleria(false, $aDatos[$nConta]['IDPRODUCTO'], false, 1);
									if(count($aDatosI) > 0)
										$cSrc = $aDatosI[0]['SRC'];
									else
										$cSrc = 'inexistente.png'; 
									
									echo '	<a href="producto.php?nId='.$aDatos[$nConta]['IDPRODUCTO'].'">
												<span><img src="imgProductos/'.$cSrc.'" width="122" height="122" /><b></b></span>
												<p><b>'.$aDatos[$nConta]['TITULO'].'</b></p>
											</a>';
								}
							}
						}
					?>                   
                	<!--<h1>Nombre de categoría</h1>
                    <a href="producto.html">
                    	<span><img src="img/alberquita.jpg" /><b></b></span>
                        <p><b>Producto especial</b><br />Lorem ipsum dolor sit amet, consecte adipiscing elit. </p>
                    </a>
                    <a href="producto.html">
                    	<span><img src="img/alberquita.jpg" /><b></b></span>
                        <p><b>Producto especial</b><br />Lorem ipsum dolor sit amet, consecte adipiscing elit. </p>
                    </a>
                    <a href="producto.html">
                    	<span><img src="img/alberquita.jpg" /><b></b></span>
                        <p><b>Producto especial</b><br />Lorem ipsum dolor sit amet, consecte adipiscing elit. </p>
                    </a>
                    <a href="producto.html">
                    	<span><img src="img/alberquita.jpg" /><b></b></span>
                        <p><b>Producto especial</b><br />Lorem ipsum dolor sit amet, consecte adipiscing elit. </p>
                    </a>
                    
                    
                    <hr />                   
                    <h1>Nombre de categoría</h1>
                    <a href="producto.html">
                    	<span><img src="img/alberquita.jpg" /><b></b></span>
                        <p><b>Producto especial</b><br />Lorem ipsum dolor sit amet, consecte adipiscing elit. </p>
                    </a>
                    <a href="producto.html">
                    	<span><img src="img/alberquita.jpg" /><b></b></span>
                        <p><b>Producto especial</b><br />Lorem ipsum dolor sit amet, consecte adipiscing elit. </p>
                    </a>-->
                </div>
            	
            </div>                            
        </div>
    </div>
    <?PHP
    	include("footer.php")
	?>    
    <!--<div class="footer">
        <div class="legend">
        	<p class="warrow"></p>
            <p>Grupo Asolari</p><span>Copyright © 2015 Todos los derechos reservados.  |  Contactanos al 01800 123 45 67 - Diseño por 
            <a href="http://www.arkanmedia.com" class="arkanmedia">Arkanmedia</a></span>                    	
        </div>                        
    </div>-->

</body>
</html>
<?PHP	
	$conn -> cerrar($dblink);
?>