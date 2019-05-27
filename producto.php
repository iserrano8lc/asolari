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
	
	if(is_numeric($_GET['nId']))
		$nIdProducto = $_GET['nId'];
		
	$aDatos = $oRegistros -> busquedaFiltradaProducto($nIdProducto, false, false, false, false, false, false, 1);
	
	$nIdProducto = $aDatos[0]['IDPRODUCTO'];
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
    
    <script type="text/javascript" src="js/jquery.cycle.all.js"></script> 
    <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
	<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script> 
   
    <script type="text/javascript" language="javascript">
	$(window).load(function() {   
			$("a[rel^='prettyPhoto']").prettyPhoto();		 						
			$('#slider').nivoSlider({
				effect:'fade' ,
				directionNav:false,
				directionNavHide:true,
				controlNav:false,
				controlNavThumbs:false,
				controlNavThumbsFromRel:false,				
				captionOpacity:0,
				animSpeed:500,
				pauseOnHover:false,				
				pauseTime:5000
			});									
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

<body id="int">
	<div class="bg" style="background:url(img/bgpic.jpg) top center no-repeat">
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
            	<div class="divisoria">
                	<div class="special">
                    	<div class="tecnicos">
                        	<ul id="slideshow">
							<?PHP
                                $aDatosI = $oRegistrosI -> busquedaFiltradaImgaleria(false, $nIdProducto);
                                
                                if(count($aDatosI) > 0){
                                    for($nContareg = 0; $nContareg < count($aDatosI); $nContareg++){
                                        echo '	<li>
                                                    <a href="imgProductos/'.$aDatosI[$nContareg]['SRC'].'" rel="prettyPhoto[proyecto1]">
                                                        <img src="imgProductos/'.$aDatosI[$nContareg]['SRC'].'" alt="'.$aDatos[0]['TITULO'].'" title="'.$aDatos[0]['TITULO'].'" />
                                                        <span>click para hacer zoom</span>
                                                    </a>
                                                </li>';
                                    }
                                }else{
                                    echo '		<li>
                                                    <a href="imgProductos/inexistente.png" rel="prettyPhoto[proyecto1]">
                                                        <img src="imgProductos/inexistente.png" alt="'.$aDatos[0]['TITULO'].'" title="'.$aDatos[0]['TITULO'].'" />
                                                        <span>click para hacer zoom</span>
                                                    </a>
                                                </li>';
                                }
                            ?>
                    		</ul>
                  		<div id="nav"></div>                    
        			</div>
             	</div>
                	<!--<div class="special">
                    	<div class="tecnicos">
                            <ul id="slideshow">
                            	<li>
                                	<a href="img/alberquita.jpg" rel="prettyPhoto[proyecto1]">
                                    	<img src="img/alberquita.jpg" />
                                        <span>click para hacer zoom</span>
                         			</a>
                        		</li>
                                
                                <li>
                                	<a href="img/alberquita.jpg" rel="prettyPhoto[proyecto1]">
                                    	<img src="img/alberquita.jpg" />
                                        <span>click para hacer zoom</span>
                              		</a>
                             	</li>
                                
                                <li>
                                	<a href="img/alberquita.jpg" rel="prettyPhoto[proyecto1]">
                                    	<img src="img/alberquita.jpg"/>
                                        <span>click para hacer zoom</span>
                                 	</a>
                             	</li>
                        	</ul>
                            <div id="nav"></div>                    
                        </div>
             		</div>-->
                                                            
                    <div class="special">
                    	<h1><?PHP echo $aDatos[0]['TITULO'] ?></h1>
                        <p><?PHP echo $aDatos[0]['DESCRIPCION'] ?></p>                                                  
						<h3>¿Te interesó?</h3>
                        <p>Si te interesó este producto, llena los siguientes datos</p>                                       
                        <form id="chirris">
                        	<input type="text" value="" class="nombre" placeholder="Nombre"/>
                            <input type="text" value="" class="email" placeholder="Email"/>
                            <input type="submit" value="Enviar" class="enviar"/>
                        </form>
                        <h3>Videos</h3>
                        <a href="" style="background:url(img/redes.png) -46px 0 no-repeat; height:26px; line-height:26px; padding-left:38px; float:left; text-decoration:none; color:#666; font-size:15px;">Más vídeos de nuestros productos</a>
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
<?PHP	
	$conn -> cerrar($dblink);
?>