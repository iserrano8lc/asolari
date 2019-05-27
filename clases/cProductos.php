<?PHP
	require_once("cRecordSet.php");
			
	class cProductos{
		/////////////////////////////////////////////////////////ATRIBUTOS DE LA CLASE////////////////////////////////////////////////////////////
		public $data;

		/////////////////////////////////////////////////////////CONSTRUCTOR//////////////////////////////////////////////////////////////////////		
		public function cProductos($data){	
			$this -> data = $data;		
		}
		
		/////////////////////////////////////////////////////////TRANSACCIONES BASICAS////////////////////////////////////////////////////////////
		function insertarProducto($cSrcficha, $cSerie, $cModelo, $cTitulo, $nIdSubcategoria, $nIdCategoria, $cDescripcion, $cUrlamigable, $dPrecio){
			$sSql="INSERT INTO
							PRODUCTOS(
										SERIE,
										MODELO,
										TITULO,
										PRECIO,										
										SRCFICHA,
										DESCRIPCION,
										URLAMIGABLE,
										IDCATEGORIA,
										IDSUBCATEGORIA
									) 
							VALUES (	
										'".mysql_real_escape_string($cSerie)."',
										'".mysql_real_escape_string($cModelo)."',
										'".mysql_real_escape_string($cTitulo)."',
										$dPrecio,										
										'$cSrcficha',
										'".mysql_real_escape_string($cDescripcion)."',
										'$cUrlamigable',
										$nIdCategoria,
										$nIdSubcategoria
									)";
			//echo $sSql;
			if(!$result = mysql_query($sSql, $this -> data)){						
				echo "SE PRODUJO ERROR DE INSERCION";					
			}
			return $result;
		}
		
		function obtenerIdProducto(){		
			return mysql_insert_id();	
		}
		
		function editarProducto($nIdProducto, $cSrcficha = false, $cSerie, $cModelo, $cTitulo, $nIdSubcategoria, $nIdCategoria, $cDescripcion, $cUrlamigable , $dPrecio){
			
			if($cSrcficha)
				$cSet = " SRCFICHA = '$cSrcficha', ";
				
			$sSql = "	UPDATE
							PRODUCTOS
						SET
							$cSet
							PRECIO = $dPrecio,													
							IDCATEGORIA = $nIdCategoria,
							URLAMIGABLE = '$cUrlamigable',
							IDSUBCATEGORIA = $nIdSubcategoria,
							SERIE = '".mysql_real_escape_string($cSerie)."',
							MODELO = '".mysql_real_escape_string($cModelo)."',
							TITULO = '".mysql_real_escape_string($cTitulo)."',
							DESCRIPCION = '".mysql_real_escape_string($cDescripcion)."'
						WHERE
							IDPRODUCTO = $nIdProducto";
			//echo $sSql;		
			if(!$result = mysql_query($sSql, $this -> data)){						
				echo "SE PRODUJO ERROR DE EDICION";					
			}
			return $result;
		}
				
		function eliminarProducto($nIdProducto){
			$sSql="DELETE 
				   FROM 
				   		PRODUCTOS
				   WHERE 
				   		IDPRODUCTO = $nIdProducto";
			if(!$result = mysql_query($sSql, $this -> data)){						
				echo "SE PRODUJO ERROR DE ELIMINACION";					
			}
			return $result;
		}
		
		/*function editarStatusofertaProducto($nIdProducto, $nStatusoferta){
			$sSql="UPDATE
						PRODUCTOS
				   SET						
						OFERTA = $nStatusoferta									   					
				   WHERE 
				   		IDPRODUCTO = $nIdProducto";				
			if(!$result = mysql_query($sSql, $this -> data)){						
				echo "SE PRODUJO ERROR DE EDICION $sSql";					
			}			
			return $result;
		}*/
		
		/////////////////////////////////////////////////////////METODOS DE BUSQUEDA/////////////////////////////////////////////////////////////
		public function busquedaFiltradaProducto($nIdProducto = false, $nIdCategoria = false, $nIdSubcategoria = false, $cSerie = false, $cModelo = false, $cSearch = false, $nInicio = false, $nFin = false, $cNotIdProducto = false){
			if($nIdProducto){
				$cWhere .= " WHERE IDPRODUCTO = $nIdProducto";
			}
			
			if($nIdCategoria){
				if($nIdProducto){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "IDCATEGORIA = $nIdCategoria";
			}
			
			if($nIdSubcategoria){
				if($nIdProducto || $nIdCategoria){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "IDSUBCATEGORIA = $nIdSubcategoria";
			}
			
			if($cSerie){
				if($nIdProducto || $nIdCategoria || $nIdSubcategoria){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "SERIE LIKE '$cSerie'";
			}
			
			if($cModelo){
				if($nIdProducto || $nIdCategoria || $nIdSubcategoria || $cSerie){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "MODELO LIKE '$cModelo'";
			}
			
			if($cSearch){
				if($nIdProducto || $nIdCategoria || $nIdSubcategoria || $cSerie || $cModelo){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "(TITULO LIKE '%$cSearch%' OR DESCRIPCION LIKE '%$cSearch%')";
			}
			
			if($cNotIdProducto){
				if($nIdProducto || $nIdCategoria || $nIdSubcategoria || $cSerie || $cModelo || $cSearch){
					$cWhere.=' AND ';
				}else{
					$cWhere.=' WHERE ';
				}				
				$cWhere .= "IDPRODUCTO NOT IN ($cNotIdProducto)";
			}
			
			if($nFin){
				if($nInicio){
					$sSqlAgregados = "LIMIT $nInicio, $nFin";
				}else{
					$sSqlAgregados = "LIMIT $nFin";
				}
			}
			
			$sSql = "	SELECT
							SERIE,
							MODELO,
							TITULO,
							PRECIO,														
							SRCFICHA,
							IDPRODUCTO,
							DESCRIPCION,
							URLAMIGABLE,
							IDCATEGORIA,
							IDSUBCATEGORIA
						FROM
							PRODUCTOS
						$cWhere
						ORDER BY
							IDPRODUCTO ASC $sSqlAgregados";
			//echo $sSql;		
			$oRegistros = new cRecordSet($sSql, $this -> data);
			return $oRegistros -> aFields;
		}
		
		public function busquedaFiltradaProductoSQL($nIdProducto = false, $nIdCategoria = false, $nIdSubcategoria = false, $cSerie = false, $cModelo = false, $cSearch = false, $cNotIdProducto = false){
			if($nIdProducto){
				$cWhere .= " WHERE IDPRODUCTO = $nIdProducto";
			}
			
			if($nIdCategoria){
				if($nIdProducto){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "IDCATEGORIA = $nIdCategoria";
			}
			
			if($nIdSubcategoria){
				if($nIdProducto || $nIdCategoria){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "IDSUBCATEGORIA = $nIdSubcategoria";
			}
			
			if($cSerie){
				if($nIdProducto || $nIdCategoria || $nIdSubcategoria){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "SERIE LIKE '$cSerie'";
			}
			
			if($cModelo){
				if($nIdProducto || $nIdCategoria || $nIdSubcategoria || $cSerie){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "MODELO LIKE '$cModelo'";
			}
			
			if($cSearch){
				if($nIdProducto || $nIdCategoria || $nIdSubcategoria || $cSerie || $cModelo){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "(TITULO LIKE '%$cSearch%' OR DESCRIPCION LIKE '%$cSearch%')";
			}
			
			if($cNotIdProducto){
				if($nIdProducto || $nIdCategoria || $nIdSubcategoria || $cSerie || $cModelo || $cSearch){
					$cWhere.=' AND ';
				}else{
					$cWhere.=' WHERE ';
				}				
				$cWhere .= "IDPRODUCTO NOT IN ($cNotIdProducto)";
			}
			
			$sSql = "	SELECT
							SERIE,
							MODELO,
							TITULO,
							PRECIO,
							SRCFICHA,
							IDPRODUCTO,
							DESCRIPCION,
							URLAMIGABLE,
							IDCATEGORIA,
							IDSUBCATEGORIA
						FROM
							PRODUCTOS
						$cWhere
						ORDER BY
							IDPRODUCTO ASC";
			
			return $sSql;
		}
		
		/////////////////////////////////////////////////////////FUNCIONES COMPLEMENTARIAS DE LA CLASE////////////////////////////////////////////
		public function totalRegistrosProducto($nIdProducto = false, $nIdCategoria = false, $nIdSubcategoria = false, $cSerie = false, $cModelo = false, $cSearch = false, $cNotIdProducto = false){
			if($nIdProducto){
				$cWhere .= " WHERE IDPRODUCTO = $nIdProducto";
			}
			
			if($nIdCategoria){
				if($nIdProducto){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "IDCATEGORIA = $nIdCategoria";
			}
			
			if($nIdSubcategoria){
				if($nIdProducto || $nIdCategoria){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "IDSUBCATEGORIA = $nIdSubcategoria";
			}
			
			if($cSerie){
				if($nIdProducto || $nIdCategoria || $nIdSubcategoria){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "SERIE LIKE '$cSerie'";
			}
			
			if($cModelo){
				if($nIdProducto || $nIdCategoria || $nIdSubcategoria || $cSerie){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "MODELO LIKE '$cModelo'";
			}
			
			if($cSearch){
				if($nIdProducto || $nIdCategoria || $nIdSubcategoria || $cSerie || $cModelo){
					$cWhere .= ' AND ';
				}else{
					$cWhere .= ' WHERE ';
				}
				$cWhere .= "(TITULO LIKE '%$cSearch%' OR DESCRIPCION LIKE '%$cSearch%')";
			}
			
			if($cNotIdProducto){
				if($nIdProducto || $nIdCategoria || $nIdSubcategoria || $cSerie || $cModelo || $cSearch){
					$cWhere.=' AND ';
				}else{
					$cWhere.=' WHERE ';
				}				
				$cWhere .= "IDPRODUCTO NOT IN ($cNotIdProducto)";
			}
			
			$sSql="SELECT
						COUNT(*) AS TOTALREGISTROS
				   FROM 
				   		PRODUCTOS
				   $cWhere";
			$oRegistros = new cRecordSet($sSql, $this -> data);
			return $oRegistros -> aFields;
		}
	}
?>