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
	<div class="bg" style="background:url(img/bgpic5.jpg) bottom center no-repeat">
    	<?PHP
        	$nMenu = 7;
			include("header.php")
		?>    
    	              		
	</div>
    
	
    
    
    <div class="contenedor">
    	<div class="contenido">                	                      
            <div class="middle">
                <a name="porquecontratar"></a>
                   
                 <div class="divisoria">
                    <div class="special" style="margin-left:25px; width:440px">
                        <h1>Amortización y Financiamiento</h1>
                        <p>
                        	Cómo hemos visto, la instalación de sistemas fotovoltaicos resultan en ahorros millonarios a través de los años pero requieren de una inversión inicial sustancial. Es por eso que ASI se distingue de los demás proveedores e instaladores de equipos ya que hemos buscado y mantenido relación con muchas instituciones de crédito que ofrecen a nuestros clientes financiamientos competitivos que permiten pagos razonables que no se alejan mucho de lo que ya se está obligado a pagar a la CFE por su servicio de luz sin el sistema fotovoltaico.<br /><br />
                            <b>Ejemplo:</b><br /><br />

Las tarifas de CFE se pueden dividir de muchas maneras, por regiones, por consumo, por tensión, etc. En esta sección las dividiremos en residenciales y comerciales. Empecemos con las residenciales.
 
</p>
							<img src="img/recibo.jpg" class="pico pico2" />
                            <p>Como podemos ver esta persona estaba en tarifa DAC y pagaba casi once mil pesos mensuales de su recibo de luz. ¡Necesitaba urgentemente reducir ese gasto!
<br /><br />
Este es un ejemplo del cálculo para diseñar el sistema requerido. En este caso el cliente quiso el sistema que le redujera al mínimo sus pagos. 
</p>
							<img src="img/sistema-cfe.jpg" class="pico pico2" />
                            <p>
<b>Escenario 1 (contado)</b><br />
Inversión: $210,000  <br />   
Amortización: 35 Meses <br />
Recibo Actual: $10,448<br />
Recibo con Fotoceldas: $688 <br />
Ahorro en Recibo 88%<br />
Aumento Anual Proyectado en energía CFE: 8%<br />
Ahorro en 25 años (Vida útil de paneles): $4,548,453.95
<br /><br />


<b>Escenario 2 (financiamiento)</b><br />
Plazo: 36 Meses y una  Tasa de interés del 15%. <br />
El Costo del Financiamiento sería de 52,069.88<br />
El Ahorro aproximado en 25 Años sería de: $4,048,140.89. <br />
 La Amortización es de 43 Meses  con una Erogación Mensual: que consiste en un Pago a CFE 688 + Pago Crédito 7279.72 =  que dan un total de 7620.78 el primer año.<br /> 
Durante la vida del crédito el cliente paga un promedio de 27% más de lo que paga de su recibo.<br />
Después Pagará el 12.7% de lo que facture en consumo
<br /><br />

<b>Escenario 3 ( financiamiento)</b><br />
Monto: 210,000   <br />
Plazo: 60 Meses   <br />
Tasa: 15% <br />
Costo de Financiamiento: $89,753.12  <br />
Ahorro 25 Años: 3,853,792.69 <br />
Amortización: 49 Meses<br />
Pago Crédito 1er Año + CFE 1er Año = $5683,89 = 4.7% Más que su Recibo Actual<br />
Pago Crédito Años 2 – 5 = ¡13% Menos que el Recibo Actualizado!<br />
A Partir del Año 6 = 12.67% de los Recibos Actualizados
</p>
                    </div>
                    <div class="special" style="margin-right:25px; width:440px">
                        
                        
                        <p><b>Revisemos ahora un caso para sistemas para comercio:</b>
<br /><br />
En este caso se trata de una oficina en la que paga tarifa comercial 02 pero los sistemas pueden instalarse en tiendas, restaurantes y demás comercios abiertos al público.
						</p>
                        <img src="img/recibo2.jpg" class="pico pico2" />
                        <img src="img/analisis.jpg" class="pico pico2" />
                        <p>
                        Determinamos la capacidad del sistema junto con nuestro cliente al fijar el objetivo de reducción de demanda a la CFE. En este caso nuestro cliente decidió reducir su demanda para consumo de 948 Kwh a 200 KWh es decir un sistema que genere 748 Kwh al mes.
<br /><br />
<b>Caso 1 Pago de Contado Comercial</b><br />
Monto $195,000.00<br />
Ahorro en 25 años: $2,871,568.23<br />
Amortización: 50 Meses<br />
Ahorro C/Sistema FV: 87% del monto de sus recibos futuros.
<br /><br />

<b>Caso 2</b><br />	
Inversión	$195,000.00<br />
Costo de Financiamiento	$83,342.18<br />
Plazo	5 años<br />
Amortización	69 Meses<br />
Ahorro 25 Años	$2,019,895.75<br />
Ahorro en Recibo	87%<br />
Este mes se consumieron 1038 KWH. Anteriormente en Tarifa DAC el recibo Mensual era de $4488.94. Como se puede ver, una vez instalado el sistema el recibo llegó por ¡$119!

                        </p>
                        <img src="img/recibo3.jpg" class="pico pico2" />
                        <p>Haz una cita para visitar nuestra casa muestra en donde te mostraremos el equipo, la instalación y contestaremos cualquier pregunta para que puedas tomar la mejor decisión.<br /><br />
Llámanos al <b>(229) 365 55 11</b>
</p>
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
