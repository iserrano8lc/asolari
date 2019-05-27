<?PHP
	require_once("cRecordSet.php");
		
	class cImgalerias{
		/////////////////////////////////////////////////////////ATRIBUTOS DE LA CLASE////////////////////////////////////////////////////////////
		public $data;

		/////////////////////////////////////////////////////////CONSTRUCTOR//////////////////////////////////////////////////////////////////////		
		public function cImgalerias($data){		
			$this -> data = $data;
		}
		
		/////////////////////////////////////////////////////////TRANSACCIONES BASICAS////////////////////////////////////////////////////////////
		function insertarImgaleria($cSrc, $nIdProducto, $cPie){
			$sSql="INSERT INTO
							IMGALERIAS(
											SRC,
											PIEIMG,
											IDPRODUCTO
									) 
							VALUES (
										'$cSrc',
										'$cPie',
										$nIdProducto
									)";
			//echo "$sSql<br /><br />";
			if(!$result = mysql_query($sSql, $this -> data)){						
				echo "SE PRODUJO ERROR DE INSERCION";					
			}
			return $result;
		}
		
		function editarImgaleria($nIdImgaleria, $cPie){
			$sSql = "	UPDATE
							IMGALERIAS
						SET
							PIEIMG = '$cPie'
						WHERE
							IDIMGALERIA = $nIdImgaleria";
			//echo $sSql;								
			if(!$result = mysql_query($sSql, $this -> data)){						
				echo "SE PRODUJO ERROR DE EDICION";					
			}
				
			return $result;
		}
		
		function eliminarImgaleria($nIdImgaleria){
			$sSql="DELETE 
				   FROM
				   		IMGALERIAS
				   WHERE
				   		IDIMGALERIA = $nIdImgaleria";
			if(!$result = mysql_query($sSql, $this -> data)){						
				echo "SE PRODUJO ERROR DE ELIMINACION";					
			}
			return $result;
		}
		
		/////////////////////////////////////////////////////////METODOS DE BUSQUEDA/////////////////////////////////////////////////////////////
		public function busquedaFiltradaImgaleria($nIdImgaleria = false, $nIdProducto = false, $nInicio = false, $nFin = false){
			if($nIdImgaleria){
				$cWhere .= " WHERE IDIMGALERIA = $nIdImgaleria";
			}

			if($nIdProducto){
				if($nIdImgaleria){
					$cWhere.=' AND ';
				}else{
					$cWhere.=' WHERE ';
				}
				$cWhere .= "IDPRODUCTO = $nIdProducto";
			}
			
			if($nFin){
				if($nInicio){
					$sSqlAgregados = "LIMIT $nInicio, $nFin";
				}else{
					$sSqlAgregados = "LIMIT $nFin";
				}
			}
												
			$sSql="SELECT
						SRC,
						PIEIMG,						
						IDPRODUCTO,						
						IDIMGALERIA						
				   FROM 
				   		IMGALERIAS
				   $cWhere
				   ORDER BY
						IDIMGALERIA DESC $sSqlAgregados";
			//echo $sSql;
			$oRegistros = new cRecordSet($sSql,$this->data);
			return $oRegistros->aFields;
		}
				
		/////////////////////////////////////////////////////////FUNCIONES COMPLEMENTARIAS DE LA CLASE////////////////////////////////////////////
		public function totalRegistrosImgaleria($nIdImgaleria = false, $nIdProducto = false){
			if($nIdImgaleria){
				$cWhere .= " WHERE IDIMGALERIA = $nIdImgaleria";
			}

			if($nIdProducto){
				if($nIdImgaleria){
					$cWhere.=' AND ';
				}else{
					$cWhere.=' WHERE ';
				}
				$cWhere .= "IDPRODUCTO = $nIdProducto";
			}
												
			$sSql="SELECT
						COUNT(*) AS TOTALREGISTROS
				   FROM 
				   		IMGALERIAS
				   $cWhere";
			$oRegistros = new cRecordSet($sSql,$this->data);
			return $oRegistros->aFields;
		}
	}
?>