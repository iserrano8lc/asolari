<?PHP
	ob_start();
	
	$cfgProgDir = 'secure/';
	require_once($cfgProgDir."secure.php");
			
	require_once("../clases/cConexion.php");
	require_once("../clases/cCategorias.php");
	
	$conn = new cConexion();
	$dblink = $conn -> iniciar();
	
	$oRegistros = new cCategorias($dblink);
	
	if($_POST['hidMovimiento'] == 3){//Eliminacion 
		$bResult = $oRegistros -> eliminarCategoria(
														$_POST['hidValorReg']
													);	
	}
	
	$aDatos = $oRegistros -> busquedaFiltradaCategoria();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

	<head>
		<title>Panel de Control</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
		<link rel="stylesheet" type="text/css" media="screen" href="css/ControlPanel.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/default.css" />

		<script type="text/javascript" src="javascript/jsFunciones.js"></script>
		<script type="text/javascript" src="javascript/JawsAjax/JawsResponse.js"></script>
		<script type="text/javascript" src="javascript/prototype.js"></script>
		<script type="text/javascript" src="javascript/scriptaculous.js"></script>
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
                    <span id="menu-option-ListEntries" class="jaws-menuoption">
                        <img alt="NUEVA CATEGOR&Iacute;A" src="img/new.png" width="16" height="16" />
                        <a href="iCategorias_formulario.php">NUEVA CATEGOR&Iacute;A</a>
                    </span>
                    
                    <span id="menu-option-ListEntries" class="jaws-menuoption-active">
                        <img alt="LISTAR CATEGOR&Iacute;AS" src="img/list.png" width="16" height="16" />
                        <a>LISTAR CATEGOR&Iacute;AS</a>                    
                    </span>
                </div>
                
                <div id="workarea">
                    <form id="frmPrincipal" name="frmPrincipal" method="post" action="<?PHP $PHP_SELF ?>">
                        <input type="hidden" name="hidValorReg" id="hidValorReg" />						
                        <input type="hidden" name="hidMovimiento" id="hidMovimiento" />

						<table style="width: 100%;">
                            <tr>
                                <td height="84">
                                	<table id="posts_datagrid" class="jawsDatagrid" style="width: 100%;">
                                    	<thead>
                                            <tr>
                                            	<td>DESCRIPCI&Oacute;N</td>
                                                <td>ACCIONES</td>
                                            </tr>
                                        </thead>
                                        
                                        <tbody id="body_posts_datagrid">
                                            <?PHP												
                                                if(count($aDatos) > 0){
                                                    for($nContareg = 0; $nContareg < count($aDatos); $nContareg++){
														echo '	<tr>
																	<td>'.$aDatos[$nContareg]['DESCRIPCION'].'</td>
																	
																	<td>
                                                                        <input type="hidden" name="hid_id'.$nContareg.'" id="hid_id'.$nContareg.'" value="'.$aDatos[$nContareg]['IDCATEGORIA'].'" />                                                                       
                                                                        <a href="#" onclick="eliminarRegistro(\'hid_id'.$nContareg.'\');" style="cursor:pointer; text-decoration:none"><img src="img/delete.png" alt="Borrar" title="Borrar" border="0" height="16" width="16" /> Borrar</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                        <a href="#" onclick="javascript:abrirContenido(\'hid_id'.$nContareg.'\',\'iCategorias_formulario.php\');" style="cursor:pointer;text-decoration:none"><img src="img/edit.png" alt="Editar" title="Editar" border="0" height="16" width="16" /> Modificar</a>
                                                                    </td>
                                                                </tr>';
                                                    }
                                                }else{
                                                    echo '<tr><td class="textolistado" align="center" colspan="2">NO SE ENCONTRARON REGISTROS</td></tr>';		
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
			</div>
		</div>
	</body>
</html>
<?PHP
	if($_POST['hidMovimiento'] == 3 && $bResult){
		echo '<script>Mensaje("Registro Eliminado");</script>';
	}

	mysql_close($dblink);

	ob_end_flush();
?>