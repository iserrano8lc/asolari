<?PHP
	require_once("cRecordSet.php");
		
	class cCategorias{

		/////////////////////////////////////////////////////////ATRIBUTOS DE LA CLASE////////////////////////////////////////////////////////////
		public $data;
		
		/////////////////////////////////////////////////////////CONSTRUCTOR//////////////////////////////////////////////////////////////////////		
		public function cCategorias($data){	
			$this -> data = $data;		
		}
					
		/////////////////////////////////////////////////////////TRANSACCIONES BASICAS////////////////////////////////////////////////////////////
		function insertarCategoria($cDescripcion, $cUrlamigable){
			$sSql = "	INSERT INTO
									CATEGORIAS(
												DESCRIPCION,
												URLAMIGABLE
											) 
						VALUES (
									'$cDescripcion',
									'$cUrlamigable'
								)";
			if(!$result = mysql_query($sSql, $this -> data)){						
				echo "SE PRODUJO ERROR DE INSERCION";					
			}
			return $result;
		}
				
		function editarCategoria($nIdCategoria, $cDescripcion, $cUrlamigable){
			$sSql = "	UPDATE
							CATEGORIAS
						SET
							DESCRIPCION = '$cDescripcion',
							URLAMIGABLE = '$cUrlamigable'							
						WHERE
							IDCATEGORIA = $nIdCategoria";				
			if(!$result = mysql_query($sSql, $this -> data)){						
				echo "SE PRODUJO ERROR DE EDICION";					
			}
			return $result;
		}

		function eliminarCategoria($nIdCategoria){
			$sSql = "	DELETE
						FROM
							CATEGORIAS
						WHERE
							IDCATEGORIA = $nIdCategoria";			
			if(!$result = mysql_query($sSql, $this -> data)){						
				echo "SE PRODUJO ERROR DE ELIMINACION";					
			}
			return $result;
		}

		/////////////////////////////////////////////////////////METODOS DE BUSQUEDA/////////////////////////////////////////////////////////////
		public function busquedaFiltradaCategoria($nIdCategoria = false, $nInicio = false, $nFin = false){
			if($nIdCategoria){
				$cWhere .= " WHERE IDCATEGORIA IN ($nIdCategoria)";
			}
			
			if($nFin){
				if($nInicio){
					$sSqlAgregados = "LIMIT $nInicio, $nFin";
				}else{
					$sSqlAgregados = "LIMIT $nFin";
				}
			}
						
			$sSql = "	SELECT
							IDCATEGORIA,
							DESCRIPCION,
							URLAMIGABLE
						FROM
							CATEGORIAS
						$cWhere
						ORDER BY
							IDCATEGORIA ASC $sSqlAgregados";
			//echo $sSql;
			$oRegistros = new cRecordSet($sSql, $this -> data);
			return $oRegistros -> aFields;
		}
		
		/////////////////////////////////////////////////////////FUNCIONES COMPLEMENTARIAS DE LA CLASE////////////////////////////////////////////
		public function totalRegistrosCategoria($nIdCategoria = false){
			if($nIdCategoria){
				$cWhere .= " WHERE IDCATEGORIA = $nIdCategoria";
			}
			
			$sSql="SELECT
						COUNT(*) AS TOTALREGISTROS
				   FROM 
				   		CATEGORIAS
				   $cWhere";
			$oRegistros = new cRecordSet($sSql, $this -> data);
			return $oRegistros -> aFields;
		}
	}
?>