<?PHP
	ob_start();
	
	$cfgProgDir = 'secure/';
	require_once($cfgProgDir."secure.php");
			
	require_once("../clases/cConexion.php");
	require_once("../clases/cProductos.php");
	require_once("../clases/cImgalerias.php");
	require_once("../clases/cCategorias.php");
	//require_once("../clases/cSubcategorias.php");
	
	$conn = new cConexion();
	$dblink = $conn -> iniciar();
	
	$oRegistros = new cProductos($dblink);
	$oRegistrosC = new cCategorias($dblink);
	$oRegistrosI = new cImgalerias($dblink);
	//$oRegistrosSC = new cSubcategorias($dblink);
	
	if($_POST['hidMovimiento'] == 3){//Eliminacion 
		$bResult = $oRegistros -> eliminarProducto(
													$_POST['hidValorReg']
												);
		if($bResult){
			$aDatosI = $oRegistrosI -> busquedaFiltradaImgaleria(false, $_POST['hidValorReg'], false, 1);
			
			if(count($aDatosI)  >0){
				for($nContareg = 0; $nContareg < count($aDatosI); $nContareg++){
					
					$bResult = $oRegistrosI -> eliminarImgaleria($aDatosI[$nContareg]['IDIMGALERIA']);
					
					if($bResult)
						unlink('../imgProductos/'.$aDatosI[$nContareg]['SRC']);
				}
			}			 
		}		
	}
	
	$nNumeroRegistros = 20;
	
	$aPaginado = explode('-', $_POST['cmbPaginado']);

	$aDatos = $oRegistros -> busquedaFiltradaProducto(false, $_POST['cmbSearchCategoria'], false, false, false, $_POST['txtSearch'], $aPaginado[0], $nNumeroRegistros);
	
	if(count($aDatos) == 0 && isset($_POST['cmbPaginado']) && !(isset($_POST['cmbSearchCategoria'])) && !(isset($_POST['txtSearch'])) ){ //CHECAR EL PAGINADO
		$aDatos = $oRegistros -> busquedaFiltradaProducto(false, $_POST['cmbSearchCategoria'], false, false, false, $_POST['txtSearch'], ($aPaginado[0] - $nNumeroRegistros), $nNumeroRegistros);
	}
	
	$aDatosPaginado = $oRegistros -> totalRegistrosProducto(false, $_POST['cmbSearchCategoria'], false, false, false, $_POST['txtSearch']); //devuelve total de todos los registros
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

	<head>
		<title>Panel de Control</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />		
		<link rel="stylesheet" type="text/css" media="screen" href="css/ControlPanel.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="css/default.css" />
		
		<script type="text/javascript" src="javascript/jLoaderAjax.js"></script>
		<script type="text/javascript" src="javascript/jsFunciones.js"></script>
		<script type="text/javascript" src="javascript/JawsAjax/JawsResponse.js"></script>
		<script type="text/javascript" src="javascript/prototype.js"></script>
		<script type="text/javascript" src="javascript/scriptaculous.js"></script>
	</head>
    
	<body>
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
                    
                    <span id="menu-option-ListEntries" class="jaws-menuoption-active">
                        <img alt="LISTAR PRODUCTOS" src="img/list.png" width="16" height="16" />
                        <a>LISTAR PRODUCTOS</a>                    
                    </span>
                </div>
                
                <div id="workarea">
                    <form id="frmPrincipal" name="frmPrincipal" method="post" action="<?PHP $PHP_SELF ?>">
                        <input type="hidden" name="hidValorReg" id="hidValorReg" />						
                        <input type="hidden" name="hidMovimiento" id="hidMovimiento" />

						<table style="width: 100%;">
                            <tr>
                                <td height="84">
                                	<table style="width: 100%;">
                                        <tr>
                                        	<td height="60" valign="top">
                                        		<table width="39%" style="vertical-align: top;">
                                                	<tr>
                                                    	<td width="164" valign="bottom" nowrap="nowrap" style="padding-bottom: 3px;">
                                                        	<div class="blog_field">
                                                                <label for="title">CATEGOR&Iacute;A</label><br />
                                                                
                                                                <select name="cmbSearchCategoria" id="cmbSearchCategoria" onchange="javascript:busquedas();" style="border:1px solid #000; background-color:#F0F8FF; color:#333333; font-size:12px">
                                                                    <option value=""></option>									       	    
                                                                    <?PHP
                                                                        $aDatosC = $oRegistrosC -> busquedaFiltradaCategoria();
                                                                        
                                                                        if(count($aDatosC) > 0){										
                                                                            for($nContareg = 0; $nContareg < count($aDatosC); $nContareg++){
																				echo '	<option value="'.$aDatosC[$nContareg]['IDCATEGORIA'].'"'; if($_POST['cmbSearchCategoria'] == $aDatosC[$nContareg]['IDCATEGORIA']) echo 'selected="selected"'; echo '>'.$aDatosC[$nContareg]['DESCRIPCION'].'</option>';
																			}
                                                                        }
                                                                    ?>
                                                                </select>
                                                      		</div>
                                                        </td>
                                                        
														<td width="546" valign="bottom" nowrap="nowrap" style="padding-bottom: 3px;">
															<div class="blog_field">
																<label for="title">DESCRIPCI&Oacute;N</label><br />
																
                                                                <input type="text" name="txtSearch" id="txtSearch" value="<?php if($_POST['txtSearch']) echo $_POST['txtSearch']; ?>" style="width: 290px" />
                                                                
                                                                <button type="button" name="searchButton" id="searchButton" value="Buscar" onclick="javascript:busquedas();">
                                                                    <img id="searchButton_stockimage" src="css/images/system-search.png" border="0" alt="" height="16" width="16" />&nbsp;Buscar
                                                                </button>
															</div>
                                        				</td>
													</tr>
                                           		</table>
                                        	</td>
                                        </tr>
                                    </table>
                                
                                    <table width="46%" id="pagerTableStatusOf_posts_datagrid" style="border: 0px; width: 100%; text-align: right;">
                                        <tr>
                                            <td height="25">
                                             <?PHP echo 'Total de resultados: <b>'.$aDatosPaginado[0]['TOTALREGISTROS'].'</b> - Página: ';	?>																												
                                                <select name="cmbPaginado" id="cmbPaginado" tabindex="2" onchange="javascript:ver()">
                                                    <?PHP
                                                        $nTotalPage=ceil($aDatosPaginado[0]['TOTALREGISTROS']/$nNumeroRegistros);
                                                        if($aPaginado[1]>$nTotalPage){
                                                            $aPaginado[1]-=1;
                                                        }
                                                        $nPosicion=0;															
                                                        for($nConta=1;$nConta<=$nTotalPage;$nConta++){
                                                            echo '<option value="'.($nPosicion.'-'.$nConta).'"'; if($nConta==$aPaginado[1]){echo 'selected="selected"';} echo'>'.$nConta.'</option>';
                                                            $nPosicion+=$nNumeroRegistros;
                                                        }
                                                    ?>
                                                </select><?PHP echo ' de <b>'.$nTotalPage.'</b>'; ?>
                                            </td>
                                        </tr>
									</table>
                                    
                                	<table id="posts_datagrid" class="jawsDatagrid" style="width: 100%;">
                                    	<thead>
                                            <tr>
                                            	<td>T&Iacute;TULO</td>
                                                <td>CATEGOR&Iacute;A</td>                                                
                                                <td>IMG</td>
                                                <td>ACCIONES</td>
                                            </tr>
                                        </thead>
                                        
                                        <tbody id="body_posts_datagrid">
                                            <?PHP												
                                                if(count($aDatos) > 0){
                                                    for($nContareg = 0; $nContareg < count($aDatos); $nContareg++){
														$aDatosI = $oRegistrosI -> totalRegistrosImgaleria(false, $aDatos[$nContareg]['IDPRODUCTO']);
														$aDatosC = $oRegistrosC -> busquedaFiltradaCategoria($aDatos[$nContareg]['IDCATEGORIA'], false, 1);
														//$aDatosSC = $oRegistrosSC -> busquedaFiltradaSubcategoria($aDatos[$nContareg]['IDSUBCATEGORIA'], false, false, 1);
														
														echo '	<tr>
																	<td>'.$aDatos[$nContareg]['TITULO'].'</td>																	
																	<td>'.$aDatosC[0]['DESCRIPCION'].'</td>																	
																	<td>
																		<a onclick="javascript: abrirContenido(\'hid_id'.$nContareg.'\',\'iProductos_imagenes.php\');" style="cursor:pointer; font-weight:normal" alt="Fotos" title="Fotos">('.$aDatosI[0]['TOTALREGISTROS'].' fotos) <b>Agregar/Eliminar</b></a>
																	</td>																	
																	<td>
                                                                        <input type="hidden" name="hid_id'.$nContareg.'" id="hid_id'.$nContareg.'" value="'.$aDatos[$nContareg]['IDPRODUCTO'].'" />                                                                       
                                                                        <a href="#" onclick="eliminarRegistro(\'hid_id'.$nContareg.'\');" style="cursor:pointer; text-decoration:none"><img src="img/delete.png" alt="Borrar" title="Borrar" border="0" height="16" width="16" /></a> &nbsp;
                                                                        <a href="#" onclick="javascript:abrirContenido(\'hid_id'.$nContareg.'\',\'iProductos_formulario.php\');" style="cursor:pointer;text-decoration:none"><img src="img/edit.png" alt="Editar" title="Editar" border="0" height="16" width="16" /></a>
                                                                    </td>
                                                                </tr>';
                                                    }
                                                }else{
                                                    echo '<tr><td class="textolistado" align="center" colspan="4">NO SE ENCONTRARON REGISTROS</td></tr>';		
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