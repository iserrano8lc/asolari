<?PHP
	ob_start();
	
	$cfgProgDir = 'secure/';
	require_once($cfgProgDir . "secure.php");
	
	require_once("../clases/cConexion.php");
	require_once("../clases/cFunciones.php");
	require_once("../clases/cCategorias.php");	
	
	$conn = new cConexion();
	$dblink = $conn -> iniciar();
	
	$oRegistrosC = new cCategorias($dblink);
	
	if($_POST['hidMovimiento'] == 1){//Operación de Insertar
		$bResult = $oRegistrosC ->	insertarCategoria(
														$_POST['txtDescripcion'],
														cFunciones::url_amigable($_POST['txtDescripcion'])
													);
	}
			
	if($_POST['hidMovimiento'] == 2){
		$bResult = $oRegistrosC -> editarCategoria(
													$_POST['hidValorReg'],
													$_POST['txtDescripcion'],
													cFunciones::url_amigable($_POST['txtDescripcion'])
												);
	}
	
	if(isset($_POST['hidValorReg']) && trim($_POST['hidValorReg']) != ''){
		$aDatos = $oRegistrosC -> busquedaFiltradaCategoria($_POST['hidValorReg']);
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

		<script type="text/javascript" src="javascript/jsFunciones.js"></script>				
		<script type="text/javascript" src="javascript/JawsAjax/JawsResponse.js"></script>
		<script type="text/javascript" src="javascript/prototype.js"></script>
		<script type="text/javascript" src="javascript/scriptaculous.js"></script>
		<script type="text/javascript" src="javascript/validation.js"></script>
	</head>
<body>
    <?PHP
		$nSeccion = 2;
		include("header.php")		
	?>
            
	<div class="clearfix" style="margin-bottom: 8px;"></div>
    
	<div id="container" class="clearfix">
		<div id="main-section" class="clearfix">
        
			<div id="control-panel-title" align="left">
                <span>
                    <img alt="Blog" style="vertical-align: middle;" src="css/images/clientes.png" />                    
                    <a>M&Oacute;DULO &rarr; CATEGOR&Iacute;AS</a>		
                    <span id="cpsubtitle"></span>				
                </span>
            </div>
                
            <div id="msgbox-wrapper">
                <div id="msgbox" class="" style="display: none;"></div>
            </div>
            
            <div id="jaws-menubar-menu" class="jaws-menubar">
                <span id="menu-option-ListEntries" class="jaws-menuoption-active">
                    <img alt="NUEVA CATEGOR&Iacute;A" src="img/new.png" width="16" height="16" />
                    <a>NUEVA CATEGOR&Iacute;A</a>
                </span>
                
                <span id="menu-option-ListEntries" class="jaws-menuoption">
                    <img alt="LISTAR CATEGOR&Iacute;AS" src="img/list.png" width="16" height="16" />
                    <a href="iCategorias_listado.php">LISTAR CATEGOR&Iacute;AS</a>                    
                </span>
            </div>
            
			<form name="frmPrincipal" id="frmPrincipal" method="post" action="<?PHP $PHP_SELF ?>">
            	<input type="hidden" name="hidValorReg" id="hidValorReg" value="<?PHP echo $_POST['hidValorReg'] ?>" />		
				<input type="hidden" name="hidMovimiento" id="hidMovimiento" value="<?PHP if(count($aDatos) > 0) echo '2'; else echo '1'; ?>"  />
                                
				<div class="divi">                
					<fieldset>
                        <legend>
                        	INFORMACI&Oacute;N
                        </legend>
                        
                        <div class="cajagrande">
                            <div class="cajachica8">
                                <label>
                                	NOMBRE / DESCRIPCI&Oacute;N <b>*</b>
                                </label>
                                
                                <input type="text" name="txtDescripcion" id="txtDescripcion" value="<?PHP echo $aDatos[0]['DESCRIPCION']; ?>" maxlength="300" tabindex="1" class="required cajona" />
                            </div>
                        </div>
               		</fieldset>
				</div>
                
				<div class="clearfix"></div>
                
				<div style="text-align: right">
	                <span class="requ">Los campos marcados con <b>*</b> son requeridos</span>					
                    <input type="submit" value="<?PHP if(count($aDatos) > 0) echo 'ACTUALIZAR'; else echo 'GUARDAR'; ?>" tabindex="5" />
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