<?PHP
	abstract class cFunciones{
		
		public static function formatoFecha($cFecha){
			if(!empty($cFecha)){
				if(strstr($cFecha,'-')){
					$cCaracterContrario="/";
					$cCaracter='-';
				}else if(strstr($cFecha,'/')){
					$cCaracterContrario="-";
					$cCaracter='/';			
				}
				$aFecha=explode($cCaracter,$cFecha);
				$cFecha=$aFecha[2].$cCaracterContrario.$aFecha[1].$cCaracterContrario.$aFecha[0];
			}
			return $cFecha;
		}
		
		public static function url_amigable($url) {
			// Tranformamos todo a minusculas			
			$url = utf8_decode(strtolower($url));
						
			//Rememplazamos caracteres especiales latinos			
			$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');			
			$repl = array('a', 'e', 'i', 'o', 'u', 'n');			
			$url = str_replace ($find, $repl, $url);
						
			// Añaadimos los guiones			
			$find = array(' ', '&', '\r\n', '\n', '+');
			$url = str_replace ($find, '-', $url);
			
			// Eliminamos y Reemplazamos demás caracteres especiales			
			$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');			
			$repl = array('', '-', '');
						
			$url = preg_replace ($find, $repl, $url).'/';			
			return $url;		
		}
		
		function cortarTextoCaracteres($cTexto, $nTamano){
			// Inicializamos las variables
			//$nTamano = 50; // tamaño máximo
			$nContador = 0;
			//$cTexto = 'Este es el texto que se cortará para que no ocupe más de 50 carácteres';
			 
			// Cortamos la cadena por los espacios
			//$cTexto=strip_tags($cTexto);
			$aTexto = split(' ', $cTexto);
			$cTexto = '';
			 
			// Reconstruimos la cadena
			while($nTamano >= strlen($cTexto) + strlen($aTexto[$nContador])){
				$cTexto.= $aTexto[$nContador].' ';
				$nContador++;
			}

			$cTexto=trim($cTexto);
	
			if($nContador<count($aTexto)){
				$cTexto.='...';
			}

			return $cTexto;
		}
	}
?>