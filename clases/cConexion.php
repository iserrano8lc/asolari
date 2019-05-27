<?PHP
	class cConexion{	
		private $sUser;		
		private $sHost;
		private $sPasswd;
		private $sDatabase;
				
		public function cConexion($sDatabase = false, $sUser = false, $sPasswd = false, $sHost = false){
			if ($sDatabase){
				$this -> sDatabase = $sDatabase;
			}else{
				$this -> sDatabase = 'BDASOLARIS';				
			}

			if ($sUser){
				$this -> sUser=$sUser; 
			}else{
				$this -> sUser = 'uwebhosting';				
			}
			
			if ($sPasswd){
				$this -> sPasswd = $sPasswd; 
			}else{				
				$this -> sPasswd = 'asolari';
			}
				
			if ($sHost){
				$this -> sHost = $sHost; 
			}else{
				$this -> sHost = 'localhost';
			}							
		}
						
		public function iniciar(){						
			if (!($link = mysql_connect($this -> sHost, $this -> sUser, $this -> sPasswd))){
				echo "Error conectando a la base de datos.";
				return false; 
			}else{
				mysql_select_db($this -> sDatabase, $link);
				return $link; 
			}	
		}
		
		public function cerrar($dblink){
			mysql_close($dblink);
		}		
	}
	
	/*dbadmin.asolari.com
	Usuario: uwebhosting
	Contraseña: asolari*/
?>