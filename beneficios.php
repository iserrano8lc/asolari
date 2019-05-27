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
	<div class="bg" style="background:url(img/bgpic3.jpg) top center no-repeat">
    	<?PHP
        	$nMenu = 3;
			include("header.php")
		?>    
    	              		
	</div>
    
	<div class="contenedor">
    	<div class="contenido">
                	                        
            <div class="middle">
            
            	<div class="cline" style="background:none; height:auto">
                    
                    <!--                    
                    <div style="width: 450px; height: 323px; float: left; margin-top: 10px; overflow: hidden; border-radius: 10px; margin-right:30px; margin-left:20px">
                    	<iframe width="450" height="323" src="//www.youtube.com/embed/tqmtOPBFEoA?rel=0&controls=0&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
                    </div>-->
                    
                    <h1 class="fulanito">Beneficios</h1>                                        
                    
                    <div class="fux">
                        <div class="bullets">
                            <div class="bullet">
                                <span class="bgbullet"></span>
                                <span>
                                    <h4>Buena inversión</h4>
                                    <p>Una buena inversión en ahorro de energía representa una autentica protección contra aumentos inflacionarios de la economía y precios de energía.</p>                                
                                 </span>
                            </div>
                            <div class="bullet">
                                <span class="bgbullet"></span>
                                <span>
                                    <h4>Plusvalía a tu propiedad</h4>
                                    <p>Instalar estos sistemas le dan plusvalía a tu propiedad para venta o renta porque puedes ofrecer una propiedad que tiene un consumo mínimo de energía.</p>                                
                                 </span>
                            </div>
                            <div class="bullet">
                                <span class="bgbullet"></span>
                                <span>
                                    <h4>Ahorros de miles hasta millones de pesos</h4>
                                    <p>Durante la vida de tu equipo tus ahorros podrán desde cientos de miles hasta millones de pesos.</p>                                
                                 </span>
                            </div>
                        </div>
                        <div class="bullets">
                            <div class="bullet">
                                <span class="bgbullet"></span>
                                <span>
                                    <h4>Reduces contaminación</h4>
                                    <p>Reduces tu huella de carbón y ayudas a tu comunidad y a tu planeta.</p>                                
                                 </span>
                            </div>                            
                            <div class="bullet">
                                <span class="bgbullet"></span>
                                <span>
                                    <h4>Servicio, mantenimiento y garantía</h4>
                                    <p>Confiabilidad de proveedores e instaladores locales. Nosotros estamos aquí en tu ciudad para darte servicio, mantenimiento y garantía.</p>                               
                                 </span>
                            </div>
                            <div class="bullet">
                                <span class="bgbullet"></span>
                                <span>
                                    <h4>Deducir impuestos</h4>
                                    <p>Las empresas, empresarios, profesionistas independientes y personas físicas con actividad empresarial pueden deducir la compra de sus equipos completamente y de inmediato del pago de impuestos de ISR ante el SAT.</p>                                
                                 </span>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>                            
        </div>
    </div>
    
    
    <div class="contenedor">
    	<div class="contenido">                	                      
            <div class="middle">
                <a name="porquecontratar"></a>
                   
                 <div class="divisoria">
                    <div class="special" style="margin-left:25px; width:440px">
                        <h1>¿Quiénes somos?</h1>
                        <p>
                        	Aprovechamiento Solar Integral S.A. de C.V. es una empresa mexicana que surgió por la necesidad de reducir los altísimos costos de energía que los mexicanos nos vemos obligados a erogar en el presente para que en el futuro nuestros clientes puedan invertir los ahorros que se obtendrán a través de nuestro diseño, instalación y mantenimiento de sistemas de energía renovable en aquellos objetivos realmente importantes de sus planes de vida. 
                        </p>
                        <h2 style="margin-top:35px">Filosofía</h2>
                        <p>Apoyar la economía de nuestros clientes y reducir el impacto ambiental a través del diseño de soluciones integrales para la generación de energía eléctrica y térmica utilizando los recursos renovables que la naturaleza nos proporciona gratuitamente y en abundancia.</p>
                        <h2 style="margin-top:35px">Misión</h2>
                        <p>Cuidar los recursos económicos de nuestros clientes como si fueran propios diseñando los sistemas de generación y conservación de energía que proporcionen mayor ahorro con menor inversión.</p>
                        <h2 style="margin-top:35px">Visión</h2>
                        <p>Convertirnos una empresa a nivel nacional que diseñe, instale y mantenga toda la gama de productos y servicios para el ahorro económico a través del uso eficiente de tecnologías de energía renovable.</p>
                    </div>
                    <div class="special" style="margin-right:25px; width:440px">
                        
                        <h1>¿Por qué contratar Aprovechamiento Solar Integral?</h1>
                        <p>ASI se refiere a una solución integral, esto significa que  hacemos un proyecto a tu medida con el propósito de  cuidar tu presupuesto. No es nuestra intención vender  lo más caro que podamos proyectar para tener mayores utilidades. La combinación de los equipos que vendemos busca obtener el máximo ahorro con el mínimo de presupuesto. Por ello es posible que primero introduzcamos soluciones con el equipo que requiere menor inversión, como lo son los optimizadores de energía y lámparas ahorradoras,  para poder maximizar los ahorros, después revisamos  junto con el cliente el consumo de energía resultante, y así podemos proyectar el equipo más conveniente con un sistema de paneles solares. Si nosotros logramos instalarle a un cliente el sistema más eficiente con el mejor precio ese mismo cliente nos recomendará. 
<br /><br />
 A diferencia de otras Empresas, ASI te asesora para conseguir un financiamiento  con las diferentes fuentes disponibles para conseguir las tasas y plazos más convenientes, en algunos casos incluso, hasta 18 meses sin intereses.
<br /><br />
Las empresas, profesionistas independientes y personas físicas con actividad empresarial pueden deducir del pago de impuestos sus equipos.

<br /><br />
Instalar estos sistemas le dan plusvalía a tu propiedad para venta o renta porque puedes ofrecer una propiedad que tiene un consumo mínimo de energía.
<br /><br />
Una buena inversión en ahorro de energía representa una autentica protección contra aumentos inflacionarios de la economía y precios de energía.

<br /><br />
Confiabilidad de ser un proveedor e instalador local. Nosotros nos ubicamos  en la  ciudad de Boca del Rio Veracruz para ofrecerte el mejor servicio posible, mantenimiento y garantía.
<br /><br />

Durante la vida útil de tu sistema fotovoltaico, tus ahorros podrán ser desde cientos de miles hasta millones de pesos.
<br /><br />
Reduces tu huella de carbón y ayudas a tu comunidad y a tu planeta.
</p>
                    </div>
                 </div>
                 
                 <div class="fux2"><a name="objetivosistema"></a>
                     <div class="divisoria">
                        <div class="special" style="margin-left:25px; width:440px">
                            <h1>Objetivo del Sistema</h1>
                            <p>
                                Generalmente el objetivo de un sistema fotovoltaico de interconexión no es la de producir toda la electricidad que se consume sino simplemente producir suficiente para que la energía que se compre a la CFE se pague a las tarifas más reducidas. Si se está en la DAC, el primer objetivo es el de reducir el consumo durante seis bimestres por debajo de los 1700 KWh para volver a acceder a las tarifas subsidiada y excedente. Si por otro lado se consume energía pagada a tarifa excedente, el objetivo es bajar el consumo neto para pagar la energía al costo de las tarifas subsidiadas. 
                                <br /><br />
    En ASI hemos diseñado herramientas para poder diseñar junto con el cliente el sistema que mejor se ajuste a sus necesidades y presupuesto.
    <br /><br />
    Veamos un ejemplo: En este caso el cliente no tiene un sistema instalado y consume 2600 KWh al bimestre o 1300 KWh mensualmente, está en la tarifa DAC y paga cerca de once mil pesos al bimestre.
    </p>
    						<img src="img/consumo.jpg" class="pico"/>      
                        </div>
                        <div class="special" style="margin-right:25px; width:440px">                        	                                                   
                            <p>En este primer ejemplo, el cliente desea reducir su consumo de 1300 KWh a 800 KWh para empezar a tener los consumos necesarios para salir de la tarifa DAC. Requiere entonces un sistema que genere 500 KWh mensuales. Para ello necesita un sistema de 3.5 Kilos con 15 paneles solares. Su pago bimestral se reduce exactamente a la mitad y en un año se habrá ahorrado treinta y ocho mil quinientos noventa y siete pesos. 
<br /><br />
Cuando el cliente vio los ahorros que le podía generar un sistema de 3.5 Kilos nos preguntó por los requerimientos de un sistema capaz de reducir sus consumos de mil trescientos KWh a 300 KWh. El resultado es un sistema de 7 Kilos capaz de generar mil KWh mensuales  Con este sistema su recibo se reduciría de 10, 842.40 a mil trescientos setenta y cinco pesos bimestralmente con ahorros anuales de 56,806.55.
<img src="img/consumo.jpg" class="pico pico2"/>  
En ASI diseñamos soluciones integrales para la reducción  del consumo eléctrico que incluyen pruebas para comprobar que no haya fugas eléctricas, focos ahorradores e iluminación LED, así como optimizadores de energía que aumentan la eficiencia del sistema. Nosotros somos capaces de diseñar sistemas ahorradores para satisfacer a nuestros clientes con recibos mucho más baratos de los que están acostumbrados a pagar. 
    						</p>
                        </div>
                     </div>       
            	</div>
                
                <div class="fux2"><a name="costosistema"></a>
                     <div class="divisoria">
                        <div class="special" style="margin-left:25px; width:440px">
                            <h1>Costo del Sistema</h1>
                            <p>
                                Cuando escuchamos los beneficios de los sistemas solares surgen siempre dos preguntas, ¿Cuántos paneles solares necesito? Y ¿Cuánto me costaría?
                                <br /><br />
Es muy importante enfatizar que cada caso es diferente, para un sistema de una misma capacidad el precio puede variar mucho porque se ocupan diferentes cantidades de cable, tubos, estructuras, conectores y demás. El tamaño o la capacidad del sistema a instalar, depende de la cantidad de KWh que queremos cubrir de nuestro consumo. La mejor guía para saber cuántos KWh se consumen está en el recibo de luz. 
</p>
    						
                        </div>
                        <div class="special" style="margin-right:25px; width:440px">                        	                                                   
                            <p>Cualquiera que sea tu caso te garantizamos el ahorro desde cientos de miles hasta varios millones de pesos durante la vida útil de tu equipo. En general los sistemas fotovoltaicos residenciales se pagan por si solos con los ahorros de entre dos y cinco años y los comerciales entre tres y ocho años.<br /><br />
Para hacerte una cotización aproximada, solo necesitamos el dato de tu consumo.
</p>
							<a href="comprar.php" class="cotizar">COTIZAR AHORA</a>
                        </div>
                     </div>       
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
