<?PHP
	ob_start();
	
	require_once("../../clases/cConexion.php");	
	require_once("../../clases/cImgalerias.php");	

	$conn = new cConexion();
	$dblink = $conn -> iniciar();

	$oRegistros = new cImgalerias($dblink);

	if($_POST['nAccion'] == 1){
		$bResult = $oRegistros -> insertarImgaleria(
														$_POST['src'],
														$_POST['nIdProducto'],
														$_POST['pie']
													);
	}else{
		$bResult = true;
	}
	
	if($bResult){
		
		$aDatos = $oRegistros -> busquedaFiltradaImgaleria(false, $_POST['nIdProducto']);

		if(count($aDatos) > 0){
			echo'	<table style="width: 100%;">
						<tr>
							<td height="53">
								<table id="posts_datagrid" class="jawsDatagrid" style="width: 100%;">
									<thead>
										<tr>
											<td>IMAGENES</td>
											<td>PIE</td>																						
											<td>ACCIONES</td>
										</tr>
									</thead>
									<tbody id="body_posts_datagrid">';
			for($nContareg = 0; $nContareg < count($aDatos); $nContareg++){
				echo '					<tr>
											<td>
												<!--<img src="../phpThumb/phpThumb.php?src=../imgProductos/'.$aDatos[$nContareg]['SRC'].'&h=65&w=65&zc=1&q=90" />-->
												<img src="../imgProductos/'.$aDatos[$nContareg]['SRC'].'" style="width:60px; height:60px" />
											</td>
											
											<td>
												<div class="blog_field">
													<label for="title">Pie Imagen</label><br/>
													<input type="text" name="txtPie'.$aDatos[$nContareg]['IDIMGALERIA'].'" id="txtPie'.$aDatos[$nContareg]['IDIMGALERIA'].'" value="'.$aDatos[$nContareg]['PIEIMG'].'" maxlength="900" tabindex="2" class="required" style="width: 99%" />
												</div>																																						
											</td>
											
											<td>
												<input type="hidden" name="hid_id'.$aDatos[$nContareg]['IDIMGALERIA'].'" id="hid_id'.$aDatos[$nContareg]['IDIMGALERIA'].'" value="'.$aDatos[$nContareg]['IDIMGALERIA'].'" />																				
												<img src="css/images/delete.png" onclick="eliminarRegistro(\'hid_id'.$aDatos[$nContareg]['IDIMGALERIA'].'\');" style="cursor:pointer" alt="Borrar" title="Borrar" border="0" height="16" width="16" />
											</td>
										</tr>';
			}																				
			echo '					</tbody>
								</table>
							</td>
						</tr>
					</table>';
		}
	}

	$conn -> cerrar($dblink);
	
	ob_end_flush();
?>