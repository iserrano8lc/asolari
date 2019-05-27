<?PHP
	ob_start();
	
	$cfgProgDir = 'secure/';
	require_once($cfgProgDir . "secure.php");
	
	require_once("../clases/cUpload.php");
	require_once("../clases/cUpload2.php");
	require_once("../clases/cConexion.php");
	require_once("../clases/cFunciones.php");
	require_once("../clases/cProductos.php");
	require_once("../clases/cCategorias.php");
	require_once("../clases/cImgalerias.php");
	//require_once("../clases/cSubcategorias.php");
	
	$conn = new cConexion();
	$dblink = $conn -> iniciar();
	
	$oRegistros = new cProductos($dblink);
	$oRegistrosC = new cCategorias($dblink);
	$oRegistrosI = new cImgalerias($dblink);
	//$oRegistrosSC = new cSubcategorias($dblink);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Panel de Control</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/ControlPanel.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/default.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />

		<script type="text/javascript" src="javascript/jsFunciones.js"></script>				
		<script type="text/javascript" src="javascript/JawsAjax/JawsResponse.js"></script>
		<script type="text/javascript" src="javascript/prototype.js"></script>
		<script type="text/javascript" src="javascript/scriptaculous.js"></script>
		<script type="text/javascript" src="javascript/validation.js"></script>
	</head>
    
<body>
	<?PHP
    	if($_POST['hidMovimiento'] == 1){//Operación de Insertar
			if((!empty($_FILES['filFile'])) && ($_FILES['filFile']['error'] == 0)) {
				$result = cUpload2::archivos($_FILES['filFile']['name'], $_FILES['filFile']['size'], $_FILES['filFile']['type'], $_FILES['filFile']['tmp_name'], $_FILES['filFile']['error'], '../adjuntos/', 1);
				$aAdjunto = explode('|', $result);
			}
			
			if(empty($_POST['txtPrecio']))
				$dPrecio = 0;
			else
				$dPrecio = preg_replace("%[^0-9\-\. ]%", "", $_POST['txtPrecio']);
			
			$bResult = $oRegistros	->	insertarProducto(
															$aAdjunto[2],														
															$_POST['txtSerie'],
															$_POST['txtModelo'],
															$_POST['txtTitulo'],
															0,			//$_POST['cmbSubcategoria'],
															$_POST['cmbCategoria'],
															nl2br($_POST['txtDescripcion']),
															cFunciones::url_amigable($_POST['txtTitulo']),
															$dPrecio	//preg_replace("%[^0-9\-\. ]%", "", $_POST['txtPrecio'])
														);
			if($bResult){													
				if((!empty($_FILES['filImagen'])) && ($_FILES['filImagen']['error'] == 0)) {							
					$result = cUpload::imagenes($_FILES['filImagen']['name'], $_FILES['filImagen']['size'], $_FILES['filImagen']['type'], $_FILES['filImagen']['tmp_name'], $_FILES['filImagen']['error'], '../imgProductos/', 1);
					$aSrc = explode('|', $result);
					
					if(!empty($aSrc[2])){
						$nIdProducto = $oRegistros -> obtenerIdProducto();
											
						$bResult = $oRegistrosI -> insertarImgaleria(
																		$aSrc[2],
																		$nIdProducto,												
																		$_POST['txtPieimg']
																	);
					}			
				}
			}
		}
				
		if($_POST['hidMovimiento'] == 2){
			if((!empty($_FILES['filFile'])) && ($_FILES['filFile']['error'] == 0)) {
				$result = cUpload2::archivos($_FILES['filFile']['name'], $_FILES['filFile']['size'], $_FILES['filFile']['type'], $_FILES['filFile']['tmp_name'], $_FILES['filFile']['error'], '../adjuntos/', 1);
				$aAdjunto = explode('|', $result);
				
				if(!empty($aAdjunto[0])){
					$aDatos = $oRegistros -> busquedaFiltradaProducto($_POST['hidValorReg'], false, false, false, false, false, false, false, 1);
					if(!empty($aDatos[0]['SRCFICHA'])){					
						unlink('../adjuntos/'.$aDatos[0]['SRCFICHA']);
					}
				}
			}
						
			if(empty($_POST['txtPrecio']))
				$dPrecio = 0;
			else
				$dPrecio = preg_replace("%[^0-9\-\. ]%", "", $_POST['txtPrecio']);
			
			$bResult = $oRegistros -> editarProducto(
														$_POST['hidValorReg'],
														$aAdjunto[2],													
														$_POST['txtSerie'],
														$_POST['txtModelo'],
														$_POST['txtTitulo'],
														0,			//$_POST['cmbSubcategoria'],
														$_POST['cmbCategoria'],
														nl2br($_POST['txtDescripcion']),
														cFunciones::url_amigable($_POST['txtTitulo']),
														$dPrecio	//preg_replace("%[^0-9\-\. ]%", "", $_POST['txtPrecio'])
													);
			if($bResult){													
				if((!empty($_FILES['filImagen'])) && ($_FILES['filImagen']['error'] == 0)) {							
					$result = cUpload::imagenes($_FILES['filImagen']['name'], $_FILES['filImagen']['size'], $_FILES['filImagen']['type'], $_FILES['filImagen']['tmp_name'], $_FILES['filImagen']['error'], '../imgProductos/', 1);
					$aSrc = explode('|', $result);
					
					if(!empty($aSrc[2])){
						$nIdProducto = $oRegistros	-> obtenerIdProducto();
											
						$bResult = $oRegistrosI -> insertarImgaleria(
																		$aSrc[2],
																		$_POST['hidValorReg'],	//IDPRODUCTO
																		$_POST['txtPieimg']
																	);
					}			
				}
			}
		}
		
		if(isset($_POST['hidValorReg']) && trim($_POST['hidValorReg']) != ''){
			$aDatos = $oRegistros -> busquedaFiltradaProducto($_POST['hidValorReg']);
		}
	?>
    
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
                <span id="menu-option-ListEntries" class="jaws-menuoption-active">
                    <img alt="NUEVO PRODUCTO" src="img/new.png" width="16" height="16" />
                    <a>NUEVO PRODUCTO</a>
                </span>
                
                <span id="menu-option-ListEntries" class="jaws-menuoption">
                    <img alt="LISTAR PRODUCTOS" src="img/list.png" width="16" height="16" />
                    <a href="iProductos_listado.php">LISTAR PRODUCTOS</a>                    
                </span>
            </div>
            
            <form name="frmPrincipal" id="frmPrincipal" method="post" action="<?PHP $PHP_SELF ?>" enctype="multipart/form-data">
            	<input type="hidden" name="hidValorReg" id="hidValorReg" value="<?PHP echo $_POST['hidValorReg'] ?>" />		
				<input type="hidden" name="hidMovimiento" id="hidMovimiento" value="<?PHP if(count($aDatos) > 0) echo '2'; else echo '1'; ?>"  />
                                
				<div class="divi">                
					<fieldset>
                        <legend>
                        	INFORMACI&Oacute;N
                        </legend>
                        
                        <div class="cajagrande">
                            <div class="cajachica8">
                            	<label>CATEGOR&Iacute;A <b>*</b></label>
                                
                                <select name="cmbCategoria" id="cmbCategoria" tabindex="1" class="required validate-selection" style="border:1px solid #000; background-color:#F0F8FF; color:#333333; font-size:12px; width:425px">
									<option value=""></option>									       	    
									<?PHP
                                        $aDatosC = $oRegistrosC -> busquedaFiltradaCategoria();
                                        
										if(count($aDatosC) > 0){										
                                            for($nContareg = 0; $nContareg < count($aDatosC); $nContareg++){
												echo '	<option value="'.$aDatosC[$nContareg]['IDCATEGORIA'].'"'; if($aDatosC[$nContareg]['IDCATEGORIA'] == $aDatos[0]['IDCATEGORIA']) echo 'selected="selected"'; echo '>'.$aDatosC[$nContareg]['DESCRIPCION'].'</option>';												
											}
                                        }
                                    ?>
                                </select>
                      		</div>
                        </div>
                        
                        <div class="cajagrande">
                            <div class="cajachica6">
                            	<label>MODELO</label>
                                
                                <input type="text" name="txtModelo" id="txtModelo" value="<?PHP echo $aDatos[0]['MODELO']; ?>" tabindex="3" maxlength="100" class="cajona" />
                            </div>
                            
                            <div class="cajachica6 ml17">
                                <label>SERIE</label>
                                
                                <input type="text" name="txtSerie" id="txtSerie" value="<?PHP echo $aDatos[0]['SERIE']; ?>" tabindex="4" maxlength="100" class="cajona" />
                            </div>
                            
                            <div class="cajachica6 ml17">
                                <label>
                                	PRECIO
                                </label>
                                
                                <input type="text" name="txtPrecio" id="txtPrecio" maxlength="10" class="cajona validate-currency-dollar" value="<?PHP if(!empty($aDatos[0]['PRECIO'])) echo preg_replace("%[^0-9\-\. ]%", "", $aDatos[0]['PRECIO']) ?>" placeholder="0.00" />
                            </div>                        
                        </div>
                        
                        <div class="cajagrande">
                            <div class="cajachica8">
                                <label>
                                	T&Iacute;TULO <b>*</b>
                                </label>
                                
                                <input type="text" name="txtTitulo" id="txtTitulo" value="<?PHP echo $aDatos[0]['TITULO'] ?>" maxlength="400" tabindex="5" class="required cajona" />
                            </div>
                        </div>
                        
                        <div class="cajagrande">
                            <div class="cajachica8">
                                <label>
                                	DESCRIPCI&Oacute;N <b>*</b> 
                                </label>
                                
                                <textarea name="txtDescripcion" id="txtDescripcion" rows="44" cols="46" tabindex="7" style="width: 96%; height:290px" class="required cajona" ><?PHP if(count($aDatos) > 0) echo str_replace('<br />', '', $aDatos[0]['DESCRIPCION']); ?></textarea>
                             </div>
                        </div>
					</fieldset>
				</div>
                
                <div class="divi">
                    <fieldset>
                        <legend>IMAGEN</legend>
                        
                        <div class="cajagrande">
                            <div class="cajachica8">
                                <label><span style="font-size:9px; font-weight:normal">.jpg .jpeg .png .gif .png</span></label>                                    
                                <input type="file" name="filImagen" id="filImagen" class="cajona" tabindex="9" style="width:95%" />                                                                        
                            </div>        	            
                        </div>
                        
                        <div class="cajagrande">
                            <div class="cajachica8">
                                <label>PIE</label>
                                <input type="text" name="txtPieimg" id="txtPieimg" maxlength="300" tabindex="10" style="width:97%" />                                    
                            </div>        	            
                        </div>
               		</fieldset>
                    
                    <fieldset>
                        <legend>FICHA T&Eacute;CNICA</legend>
                        
                        <div class="cajagrande">
                            <div class="cajachica8">
                                <label><span style="font-size:9px; font-weight:normal">.pdf</span></label>                                    
                                <input type="file" name="filFile" id="filFile" class="cajona" tabindex="11" style="width:95%" />                                                                        
                            </div>        	            
                        </div>
                 	</fieldset>
             	</div>
                
				<div class="clearfix"></div>
                
				<div style="text-align: right">
	                <span class="requ">Los campos marcados con <b>(*)</b> son requeridos</span>					
                    <input type="submit" value="<?PHP if(count($aDatos) > 0) echo 'ACTUALIZAR'; else echo 'GUARDAR'; ?>" tabindex="8" />
				</div>				                    			
			</form>
            
			<script type="text/javascript">
				var valid = new Validation('frmPrincipal');
			</script>
		</div>
	</div>
</body>
</html>
<?PHP
	if($_POST['hidMovimiento'] == 1 && $bResult){//Operaci�n de Eliminar
		echo '<script>Mensaje("Registro Insertado");</script>';
	}

	if($_POST['hidMovimiento'] == 2 && $bResult){//Operaci�n de Eliminar
		echo '<script>Mensaje("Registro Editado");</script>';
	}
	
	$conn -> cerrar($dblink);
	
	ob_end_flush();
?>