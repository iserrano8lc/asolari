<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Grupo Asolari | Paneles solares</title>
    <link href="css/reset.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="css/estilo.css" media="screen" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jLoaderAjax.js"></script>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> 
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>      
    <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
	<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script> 
    <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>  
    <style type="text/css">
	#int .bg .insider h1{left:auto; right:15px}
	
		#nav{ top:105px; position:absolute; left:45px; z-index:99}
		.tecnicos{margin-top:-150px; margin-bottom:20px; width:400px; height:224px; border:5px solid #fff; margin-left:-5px;border-radius:15px!important; overflow:hidden}
		#slideshow{ width:400px; height:224px; float:left; overflow:hidden}
		#slideshow li{float:left; width:400px; height:224px; position:relative; text-align:center; overflow:hidden;border-radius:12px}
			#slideshow li span{ position:absolute; right:10px; top:10px; bottom:auto; left:auto; background-color:#fff; padding:8px; padding-right:10px; box-shadow:0px 1px 2px #333; border-radius:3px;
			font-size:12px; font-family:HBold; height:auto; padding-left:30px; background-position:7px center}
			#slideshow li span:hover{color:#333}
				#slideshow li img{ max-width:400px; border-radius:0px;}
	</style>
    
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script> 
    <script type="text/javascript" language="javascript">
		$(window).load(function() {   
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});
    	$(function() {
			$('#slideshow').cycle({			
				fx:         'scrollLeft',			
				timeout:     3000,
				speed:       500,				
				pager:      '#nav',								
				fastOnEvent: false			
			});			
		});
	</script>
</head>

<body id="int" onload="initialize();">
	<div class="bg" style="background:url(img/bgpic4.jpg) top center no-repeat">
    	<?PHP
        	$nMenu = 5;
			include("header.php")
		?>	
	</div>
    
	<div class="contenedor">
    	<div class="contenido">
        	<div class="middle">
            	<div class="divisoria">
                	<div class="special">
                    	<div class="tecnicos">
                            <ul id="slideshow">	
                                <li><a href="casamuestra/1.jpg" rel="prettyPhoto[proyecto1]"><img src="casamuestra/1.jpg" /><span>click para hacer zoom</span></a></li>
                                <li><a href="casamuestra/2.jpg" rel="prettyPhoto[proyecto1]"><img src="casamuestra/2.jpg" /><span>click para hacer zoom</span></a></li>
                                <li><a href="casamuestra/3.jpg" rel="prettyPhoto[proyecto1]"><img src="casamuestra/3.jpg"/><span>click para hacer zoom</span></a></li>
                                <li><a href="casamuestra/4.jpg" rel="prettyPhoto[proyecto1]"><img src="casamuestra/4.jpg"/><span>click para hacer zoom</span></a></li>
                                <li><a href="casamuestra/5.jpg" rel="prettyPhoto[proyecto1]"><img src="casamuestra/5.jpg"/><span>click para hacer zoom</span></a></li>
                                <li><a href="casamuestra/6.jpg" rel="prettyPhoto[proyecto1]"><img src="casamuestra/6.jpg"/><span>click para hacer zoom</span></a></li>                                
                                <li><a href="casamuestra/7.jpg" rel="prettyPhoto[proyecto1]"><img src="casamuestra/7.jpg"/><span>click para hacer zoom</span></a></li>
                                <li><a href="casamuestra/8.jpg" rel="prettyPhoto[proyecto1]"><img src="casamuestra/8.jpg"/><span>click para hacer zoom</span></a></li>
                                <li><a href="casamuestra/9.jpg" rel="prettyPhoto[proyecto1]"><img src="casamuestra/9.jpg"/><span>click para hacer zoom</span></a></li>
                                <li><a href="casamuestra/10.jpg" rel="prettyPhoto[proyecto1]"><img src="casamuestra/10.jpg"/><span>click para hacer zoom</span></a></li>
                                <li><a href="casamuestra/11.jpg" rel="prettyPhoto[proyecto1]"><img src="casamuestra/11.jpg"/><span>click para hacer zoom</span></a></li>
                                <li><a href="casamuestra/12.jpg" rel="prettyPhoto[proyecto1]"><img src="casamuestra/12.jpg"/><span>click para hacer zoom</span></a></li>		
                            </ul>
                            <div id="nav"></div>                    
                        </div>
                    	
                        <div class="mapa">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1885.5117878908118!2d-96.07575574211!3d19.062701031897138!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c36ac9be4fd483%3A0x6e6ffe6332a13df4!2sUnnamed+Road%2C+Veracruz!5e0!3m2!1sen!2smx!4v1537291355702" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div> 
                        <div>
                            <p><b style="font-family:HBold; font-weight:normal; font-size:16px">Aprovechamiento Solar Integral</b></p>
                            <br style="clear: both;" />
                            <fieldset style="margin: 1em 0;">
								<legend style="display: block; font-weight: bold;">Matriz</legend>
								Nizuc 5, Parque Capulines<br />
								Cancún, Q.R., C.P. 77505<br />
							</fieldset>
							<fieldset style="margin: 1em 0;">
								<legend style="display: block; font-weight: bold;"">Sucursal</legend>
								Mar Egeo 29, Fracc. Lomas del Mar<br />
								Alvarado, Ver, C.P. 94293<br />
							</fieldset>
							<span style="float: left; margin-right: 0.5em;">Cel. </span><a href="tel:9981955203">(998) 195 52 03</a><br />
							<span style="float: left; margin-right: 0.5em;">Cel. </span><a href="tel:2299608787">(229) 960 87 87</a><br />
							<span style="float: left; margin-right: 0.5em;">Cel. </span><a href="tel:2299608791">(229) 960 87 91</a><br />
                            <p><span style="float: left; margin-right: 0.5em;">Email: </span><a href="mailto:ventasasi@asienergiasolar.com">ventasasi@asienergiasolar.com</a></p><br /><br />
                            <b style="font-family:HBold; font-weight:normal; font-size:16px; color:#D08B00">Visita casa muestra con previa cita</b>
                        </div>
                  	</div>
                    
                    <div class="special">
                    	<h1>Dejanos un mensaje</h1>
                    	<p>Si te interesó algun producto, llena los siguientes datos y te daremos informes</p>
                        <form name="chirris" id="chirris" action="javascript:envioComentarioContacto()">
                        	<input type="text" name="cf_name" id="cf_name" class="nombre" placeholder="Nombre"/>
                            <input type="text" name="cf_mail" id="cf_mail" class="email" placeholder="Email" style="width:232px"/>
                            
                            <input type="text" name="cf_tel" id="cf_tel" class="nombre" placeholder="Teléfono(s)" style="margin-top:18px"/>
                            <input type="text" name="cf_emp" id="cf_emp" class="email" placeholder="Empresa" style="margin-top:18px"/>
                            
                            <input type="submit" value="Enviar" class="enviar" style="margin-top:18px"/>
                            <textarea name="cf_comentario" id="cf_comentario" placeholder="Tu Mensaje"></textarea>
                        </form>
                    </div>
       			</div>            	
            </div>                            
        </div>
    </div>
    <?PHP
    	include("footer.php")
	?>
<script> 
	https://www.google.com.mx/maps/@19.0641343,-96.0756182,16z
// <![CDATA[
    var map,image,shadow,myOptions;
	
	function initialize() {
		var latlng = new google.maps.LatLng(19.0641343, -96.0756182, 16);		
		var latlngp= new google.maps.LatLng(19.0641343, -96.0756182, 16);
				
		image = new google.maps.MarkerImage('img/pin.png',
														new google.maps.Size(133, 143),
														new google.maps.Point(0,0),
														new google.maps.Point(0, 51)
											);
      

      myOptions = {
        zoom: 16,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
		backgroundColor: '#0f0e0d',
		panControl: false,
		zoomControl: true,
		mapTypeControl: false,
		scaleControl: false,
		streetViewControl: true,
		overviewMapControl: false
      };

      map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
      
		var styles = [
		  {
			featureType: "road",
			stylers: [
				{ saturation: -100 },
				{ lightness: 36 },
				{ gamma: 0.5 }
			]
		  }/*,{
			stylers: [
			  { invert_lightness: true },
			  { saturation: 0 },
			  { hue: "#000000" },
			  { gamma: 1.5 }
			]
		  }*/
		];
			
		var styledMapType = new google.maps.StyledMapType(styles, { name: 'oriente' });
		map.mapTypes.set('oriente', styledMapType);
		map.setMapTypeId('oriente');	  
	  
      var marker = new google.maps.Marker({
          position: latlngp,
          map: map,
          shadow: shadow,
          icon: image
      });

	google.maps.event.addListener(marker, 'click', function() {
		$("#direccion").animate({top:"50px",opacity: 1}, 500);
	});      
	  


    }
    
  // ]]>
				   
	</script>
</body>
</html>
