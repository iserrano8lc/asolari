<?PHP
	ob_start();

	$cfgProgDir = 'secure/';
	require_once($cfgProgDir . "secure.php");
	
	if(empty($_POST['hidIdProducto']) && empty($_POST['hidValorReg']))
		header("location:iProductos_listado.php");

	require_once("../clases/cConexion.php");
	require_once("../clases/cProductos.php");
	require_once("../clases/cImgalerias.php");
		
	$conn = new cConexion();
	$dblink = $conn -> iniciar();
	
	$oRegistros = new cImgalerias($dblink);
	$oRegistrosP = new cProductos($dblink);
	
	if(empty($_POST['hidIdProducto']))
		$nIdProducto = $_POST['hidValorReg'];				
	else
		$nIdProducto = $_POST['hidIdProducto'];
		
	$aDatosP = $oRegistrosP -> busquedaFiltradaProducto($nIdProducto, false, false, false, false, false, false, false, 1);
	
	if($_POST['hidMovimiento'] == 2){//Operación de Insertar
		
		$aDatos = $oRegistros -> busquedaFiltradaImgaleria(false, $nIdProducto);
		
		if(count($aDatos) > 0){
			for($nContareg = 0; $nContareg < count($aDatos); $nContareg++){
				$bResult = $oRegistros -> editarImgaleria(
															$aDatos[$nContareg]['IDIMGALERIA'],																
															$_POST['txtPie'.$aDatos[$nContareg]['IDIMGALERIA']]
														 );								
			}
		}
	}
		
	if($_POST['hidMovimiento'] == 3){ //ELIMINAR
		
		$aDatos = $oRegistros -> busquedaFiltradaImgaleria($_POST['hidValorReg']);				
		
		$bResult = $oRegistros -> eliminarImgaleria(
													$_POST['hidValorReg']
												);
		if($bResult){
			unlink('../imgProductos/'.$aDatos[0]['SRC']);
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Panel de Control</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ControlPanel.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/default.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
		
		<script type="text/javascript" src="javascript/jquery-pack.js"></script>
        <script type="text/javascript" src="javascript/jquery.ocupload-packed.js"></script>
		<script type="text/javascript" src="javascript/jquery.imgareaselect.min.js"></script>

		<script type="text/javascript" src="javascript/jsFunciones.js"></script>	
		<script type="text/javascript" src="javascript/jLoaderAjax.js"></script>

		<script type="text/javascript">
		
			/*function statuRegistro(nIdImg){	
				var aObjects = new Array(										
					new Array("nIdImg", nIdImg),
					new Array("nIdGaleria", document.getElementById('hidIdProducto').value)
				);					
				statusVideo('ajx/ajxStatusimg.php', aObjects);				
			}*/
						
			function imagenesRegistradas(nIdProducto){				
				var aObjects = new Array(											
											new Array("nIdProducto", nIdProducto)																																		
										);								
				peticion('ajx/ajxImagenes.php', aObjects, 'datagrid');
			}
			
			//show and hide the loading message
			function loadingmessage(msg, show_hide){
				if(show_hide == "show"){						
					$('#loader').show(); //Para visualizar				
					//$('#upload_link').hide(); //Oculteee			
					$('#progress').show().text(msg);
					$('#uploaded_image').html('');
				}else if(show_hide=="hide"){
					$('#loader').hide();
					$('#progress').text('').hide();
				}else{
					$('#loader').hide();
					$('#progress').text('').hide();
					$('#uploaded_image').html('');
				}
			}
			
			$(document).ready(function () {
				$('#loader').hide();
				$('#progress').hide();
				$('#upload_link').upload({					
						name: 'image',                       
						autoSubmit: true,
						params: {upload:'Upload'},						
						enctype: 'multipart/form-data',
						action: 'iFile_imgproductos.php',
						
						onSubmit: function() {
							$('#divPie').hide();
							$('#upload_link').hide();
							$('#upload_status').html('').hide();							
							loadingmessage('Por favor espere, cargando el archivo...', 'show');
						},
						
						onComplete: function(response) {
							loadingmessage('', 'hide');
							response = unescape(response);
							var response = response.split("|");
							var responseType = response[0];
							var responseMsg = response[1];
				
							if(responseType=="success"){                            
								//display message that the file has been uploaded								
								var aObjects = new Array(															
															new Array("nAccion", 1),
															new Array("src", response[2]),
															new Array("pie", document.getElementById('txtPie').value),
															new Array("nIdProducto", document.getElementById('hidIdProducto').value)																																		
														);
								$('#divPie').show();
							
								$('#upload_link').show();
							
								document.getElementById('txtPie').value = '';
							
								peticion('ajx/ajxImagenes.php', aObjects, 'datagrid');						
							
								$('#upload_status').show().html('<h1>Exito</h1><p>El archivo se ha registrado!!</p>');															                                
							
							}else if(responseType == "error"){
								$('#upload_status').show().html('<h1>Error</h1><p>'+responseMsg+'</p>');
								$('#uploaded_image').html('');                            
							}else{
								$('#upload_status').show().html('<h1>Error inesperado</h1><p>Por favor, int&eacute;ntelo de nuevo</p>'+response);
								$('#uploaded_image').html('');                                
							}
					   }
				});
			});
		</script>
	</head>
<body onload="javascript:imagenesRegistradas(<?PHP echo $nIdProducto ?>)">

	<?PHP
		$nSeccion = 1;
		include("header.php")		
	?>
    
    <div class="clearfix" style="margin-bottom: 8px;"></div>
    
	<div id="container" class="clearfix">
		<div id="main-section" class="clearfix">
        	
            <div id="control-panel-title" align="left">
                <span>
                    <img alt="Blog" style="vertical-align: middle;" src="css/images/clientes.png" />                    
                    <a>M&Oacute;DULO &rarr; PRODUCTOS</a>		
                    <span id="cpsubtitle"></span>				
                </span>
            </div>
                
            <div id="msgbox-wrapper">
                <div id="msgbox" class="" style="display: none;"></div>
            </div>
            
            <div id="jaws-menubar-menu" class="jaws-menubar">
                <span id="menu-option-ListEntries" class="jaws-menuoption">
                    <img alt="NUEVO PRODUCTO" src="img/new.png" width="16" height="16" />
                    <a href="iProductos_formulario.php">NUEVO PRODUCTO</a>
                </span>
                
                <span id="menu-option-ListEntries" class="jaws-menuoption">
                    <img alt="LISTAR PRODUCTOS" src="img/list.png" width="16" height="16" />
                    <a href="iProductos_listado.php">LISTAR PRODUCTOS</a>                    
                </span>
                
                <span id="menu-option-ListEntries" class="jaws-menuoption-active">
                    <img alt="IM&Aacute;GENES" src="img/new.png" width="16" height="16" />
                    <a>IM&Aacute;GENES</a>
                </span>
            </div>
            
            <form name="frmPrincipal" id="frmPrincipal" method="post">
            	<input type="hidden" name="hidValorReg" id="hidValorReg" />
				<input type="hidden" name="hidMovimiento" id="hidMovimiento" value="2" />			
                <input type="hidden" name="hidIdProducto" id="hidIdProducto" value="<?PHP echo $nIdProducto ?>" />

				<div class="blog_field"><label for="title">PRODUCTO</label><br /><?PHP echo $aDatosP[0]['TITULO'] ?></div>
                
                <div class="blog_field" id="divPie"><label for="title">PIE DE IM&Aacute;GEN</label><br /><input type="text" name="txtPie" id="txtPie" maxlength="900" tabindex="2" class="required" style="width: 99%" /></div>
                				
				<div class="blog_field"><input type="file" tabindex="2" id="upload_link" name="upload_link" /></div>
                

                <div id="upload_status" style="font-size:12px; width:80%; margin:10px; padding:5px; display:none; border:1px #999 dotted; background:#eee;"></div>
                <span id="loader" style="display:none;"><img src="css/images/loader.gif" alt="Loading..."/></span>
                <span id="progress"></span><br />
                <div id="uploaded_image"></div>
                <div style="width: 100%;" id="datagrid"></div>
                
                <div style="text-align: right; border-top: 1px solid #ddd; margin: 5px; padding: 5px;">
					<input type="submit" value="ACTUALIZAR" />
				</div>
         	</form>
            
		</div>
	</div>
</body>
</html>
<?PHP
	$conn->cerrar($dblink);
	
	ob_end_flush();
?>