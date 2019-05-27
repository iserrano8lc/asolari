<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Grupo Asolari | Paneles solares</title>
    <link href="css/reset.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/estilo.css" media="screen" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> 
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>     
    <script type="text/javascript" language="javascript">
	$(document).ready(function() {
		
		$('#slider').nivoSlider({
			effect:'fade' ,
			directionNav:false,
			directionNavHide:true,
			controlNav:true,
			controlNavThumbs:false,
			controlNavThumbsFromRel:false,				
			captionOpacity:0,
			animSpeed:700,
			pauseOnHover:false,				
			pauseTime:3000
		});	
		
		$(".crumb a").click(function(){	
			var $liga=$(this).attr("href");
			$(".crumb a").removeClass("selected");
			$(this).addClass("selected");
			$(".paso").animate({"opacity":"0"},350);
			$("#"+$liga).animate({"opacity":"1"},450);			
			return false;
		});
		$(".crumb a:first").click();
	});
	</script>
    <style type="text/css">
	.slide{float:left; width:590px; height:374px;position:absolute; bottom:0px; right:0px}
	.nivoSlider img {
		position:absolute;
		top:0px; right:0px;
		right:0px; width:590px
	}
	.nivoSlider {
	position:relative; margin:0px; top:0px; left:0px;
    width:100%;
    height:374px;
	}
	.nivo-controlNav a {
	background-image:url(img/bullet-mini.png)
	}

	</style>
</head>

<body id="int">
	<div class="bg" style="background:url(img/bgpic7.jpg) top center no-repeat">
    	<?PHP
        	$nMenu = 2;
			include("header.php")
		?>    
    	<!--<div class="topnav">
        	<div class="insider">
                <a href="index.html" class="logo"><img src="img/logo.png" /></a>
                
                <a href="#" class="twitter"></a>
                <a href="#" class="facebook"></a>
                <ul class="principal">
                    <li><a href="index.html">Home</a></li>                
                    <li><a href="como-funciona.html" class="selected">Como funciona</a></li>
                    <li><a href="beneficios.html">Beneficios</a></li>
                    <li><a href="productos.html">Productos</a></li>
                    
                    <li><a href="comprar.html" class="comprar">Comprar<span></span></a></li>
                </ul>
                <h1>Como funciona</h1>                  
            </div>
        </div>-->               		
	</div>
    
	<div class="contenedor">
    	<div class="contenido">
                	                        
            <div class="middle">
            
            	<div class="cline">
                    
                    <div class="crumb"><a href="paso1">Paso 1</a><a href="paso2">Paso 2</a><a href="paso3">Pasos 3 & 4</a><a href="paso4">Paso 5</a><a href="paso5">Paso 6</a></div>
                    
                    <div id="paso1" class="paso">
                        <h1><span></span>Paneles Fotovoltaicos</h1>
                        <p>
                        	Cuando algunos materiales están expuestos a la luz solar, liberan pequeñas cantidades de electricidad que emiten creando lo que se conoce como el “efecto fotovoltaico”.
                        </p>
                        <img src="img/paso1.jpg" />
                    </div>
                    <div id="paso2" class="paso">
                        <h1><span></span>Inversor</h1>
                        <p>
                        	El panel solar o arreglo de módulos transforma una parte de la luz solar en corriente directa a un voltaje variable entre 200 y 400 volts. Esta corriente es convertida por el inversor en corriente alterna de la misma frecuencia y voltaje  que la de la red a la que está conectada la casa. 
                        </p>
                        <img src="img/paso2.jpg" />                        
                    </div>
                    <div id="paso3" class="paso">
                        <h1><span></span>Tablero Eléctrico & Medidor Bidireccional de Energía</h1>
                        <p>
                        	El sistema fotovoltáico inyecta la energía producida a la red de CFE a través del medidor de la casa, por lo que los kw producidos se restan de los consumidos de la red de CFE, por consiguiente el recibo se reduce en gran proporción.
                        </p>
                        <img src="img/paso3.jpg" />
                    </div>
                    <div id="paso4" class="paso">
                        <h1><span></span>Red Eléctrica</h1>
                        <p>
                        	Es el sistema de cableado donde nos llega la energía eléctrica proveniente de CFE y a ésta se conecta el sistema fotovoltaico para almacenar la energía excedente de los paneles solares.
                        </p>
                        <img src="img/paso5.jpg" />
                    </div>
                    <div id="paso5" class="paso">
                        <h1><span></span>Sistema de Monitoreo</h1>
                        <p>
                        	El sistema fotovoltaico puede ser monitoreado vía Internet para llevar un registro de la producción diaria de energía, verificando su correcto funcionamiento, contabilizando la cantidad de CO2 que deja de emitirse al ambiente y, lo más importante, ¡el dinero que se está ahorrando!
                        </p>
                        <img src="img/paso6.jpg" />
                    </div>
                    
                </div>
            </div>                            
        </div>
    </div>
    
    <div class="contenedor">
    	<div class="contenido">                	                      
            <div class="middle">
                <!--
                <div class="sline2" style="border-top:1px solid #DCDCDC">                 	
                    <a href="beneficios.php" class="sbeneficios">
                    	<b></b>
                    	<h2>Duradero</h2>
                        <p>Instalar estos sistemas le dan plusvalía a tu propiedad para venta o renta porque puedes ofrecer una propiedad que tiene un consumo mínimo de energía.</p>
                        <span>Leer más</span>
                    </a>
                    <a href="beneficios.php" class="scomprar">
                    	<b></b>
                    	<h2>Para Hogar & Oficina</h2>
                        <p>Es una realidad que los costos de energía eléctrica y gas seguirán incrementando. Es una realidad que los costos de energía eléctrica y gas seguirán incrementando. También es una realidad que la energía solar te puede proveer de luz eléctrica.</p>
                        <span>Leer más</span>
                    </a>
                    <a href="beneficios.php" class="sdonde">
                    	<b></b>
                    	<h2>Cuida al Medio Ambiente</h2>
                        <p>Reduce tu huella de carbón y ayuda a tu comunidad y planeta.</p>
                        <span>Leer más</span>
                    </a>
                    <a href="beneficios.php"  class="sllamar">
                    	<b></b>
                    	<h2>Ahorro que se refleja</h2>
                        <p>Durante la vida de tu equipo tus ahorros podrán ser desde cientos de miles hasta millones de pesos.</p>
                        <span>Leer más</span>
                    </a>                                 
                 </div>   
                 
                 <div class="convencido">
                    <h1>¿Te convenciste?</h1>
                    <a href="comprar.php">COMPRAR AHORA</a>
          		</div> 
                -->
                <div class="fux2"><a name="costosistema"></a>
                     <div class="divisoria">
                        <div class="special" style="margin-left:25px; width:440px">
                            <h1>¿Cómo funcionan los sistemas fotovoltaicos?</h1>
                            <p>Los sistemas fotovoltaícos aprovechan la fuente de energía más abundante sobre el planeta: la luz solar, para transformarla en electricidad utilizando paneles fotovoltáicos. Esto se lleva a cabo mediante un proceso no contaminante, ya que no emite gases nocivos ni se generan molestos ruidos. La tecnología fotovoltaíca es la única energía renovable totalmente confiable, disponible en cualquier ubicación y sin limitaciones para su instalación.<br /><br />
                              La corriente que producen los paneles solares es directa y para poder utilizarla en nuestras casas o negocios es necesario transformarla en corriente alterna. Para hacer esa transformación de corriente directa a corriente alterna se utilizan equipos conocidos como inversores o Microinversores.<br /><br />
Existen 2 tipos de Sistema Fotovoltaico: Sistema Interconectado a la Red y Sistema Aislado que requiere de baterías para almacenar la energía que producen las celdas.
</p>
    						
                        </div>
                        <div class="special" style="margin-right:25px; width:440px">                        	                                                   
                            <p>
<b>Sistemas aislados:</b> Son característicos de comunidades rurales o zonas aisladas, en las cuales no es económicamente viable construir una red eléctrica para su interconexión con la red de la CFE.<br /><br /><b>Sistema de conexión a red:</b> Este sistema genera electricidad y la envía a la red eléctrica de la CFE. La cantidad de energía que el sistema produce se resta a la cantidad que se consume. Si la producción del sistema es mayor que el consumo se genera un saldo a favor con la CFE llamado "Banco de energía" que se puede usar en los meses en que el consumo es mayor que la producción hasta un año después de que se produce dicho saldo.<br /><br />
Cabe mencionar que con los sistemas fotovoltaicos interconectados a la red se instala un medidor bidireccional que lleva el registro de la electricidad que produce el sistema fotovoltaico y al mismo tiempo contabiliza la energía que se consume de la red de CFE
</p>
							<a href="comprar.php" class="cotizar">COTIZAR AHORA</a>
                        </div>
                     </div>       
            	</div>  
                
                
                <div class="sline2" style="margin-bottom:40px; border-top:1px solid #ddd; margin-top:0px">                 	
                    <a href="beneficios.php#porquecontratar" class="sbeneficios">
                    	<b></b>
                    	<h2 style="font-size:15px; line-height:22px">¿Porque contratar a la empresa Aprovechamiento Solar Integral?</h2>
                        <!--<p>Instalar estos sistemas le dan plusvalía a tu propiedad para venta o renta porque puedes ofrecer una propiedad que tiene un consumo mínimo de energía.</p>-->
                        <span>Leer más</span>
                    </a>
                    <a href="beneficios.php#objetivosistema" class="scomprar">
                    	<b></b>
                    	<h2>Objetivo del<br />Sistema</h2>
                        <!--<p>Es una realidad que los costos de energía eléctrica y gas seguirán incrementando. Es una realidad que los costos de energía eléctrica y gas seguirán incrementando. También es una realidad que la energía solar te puede proveer de luz eléctrica.</p>-->
                        <span>Leer más</span>
                    </a>
                    <a href="beneficios.php#costosistema" class="sdonde">
                    	<b></b>
                    	<h2>Costo del<br />Sistema</h2>
                        <!--<p>Reduce tu huella de carbón y ayuda a tu comunidad y planeta.</p>-->
                        <span>Leer más</span>
                    </a>
                    <a href="amortizacion-y-financiamiento.php"  class="sllamar">
                    	<b></b>
                    	<h2>Amortización y Financiamiento</h2>
                        <!--<p>Durante la vida de tu equipo tus ahorros podrán ser desde cientos de miles hasta millones de pesos</p>-->
                        <span>Leer más</span>
                    </a>                               
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
