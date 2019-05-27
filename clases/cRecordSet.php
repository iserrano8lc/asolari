<?php
	class cRecordSet{
		var $aFields;
		var $sSqlCmd;
		var $nFieldsCount;
		var $dbConn;
			
		function cRecordSet($sSql,$data){
			$this->sSqlCmd=$sSql;
			$this->dbConn=$data;
			$this->CargarDatos();
		}

		function CargarDatos(){			
			if ($result=mysql_query($this->sSqlCmd,$this->dbConn)){
				$this->aFields=array();
				$i=0;
				while ($aRegistro=mysql_fetch_array($result)){
					foreach ($aRegistro as $sFieldName => $sFieldValue){
						$this->aFields[$i][$sFieldName]=$sFieldValue;
					}
					$i++;
				}
				$this->nFieldsCount=$i;
				return "RecordSet Cargado";
			}
			else{
				echo "SE PRODUJO UN ERROR AL EJECUTAR LA CONSULTA EN RECORDSET";
			}			
		}
	}
?>
