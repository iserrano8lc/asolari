<?PHP
	error_reporting (E_ALL ^ E_NOTICE);

	abstract class cUpload{

		public static function imagenes($userfile_name, $userfile_size, $userfile_type, $userfile_tmp, $userfile_error, $cPath, $nNumero){ 

			$max_file = "3"; // Maximum file size in MB

			//$upload_path = "../productos/";	// The path to where the image will be saved
			
			$upload_path = $cPath;	// The path to where the image will be saved
		
			//$image_handling_file = "image_handling.php"; // The location of the file that will handle the upload and resizing (RELATIVE PATH ONLY!)
			$large_image_name = strtotime(date('Y-m-d H:i:s')).$nNumero;
			
			// Only one of these image types should be allowed for upload                  
			$allowed_image_types = array('image/pjpeg' => "jpg", 'image/jpeg' => "jpeg", 'image/jpg' => "jpg", 'image/png' => "png", 'image/x-png' => "png", 'image/gif' => "gif");

			$allowed_image_ext = array_unique($allowed_image_types); // Do not change this
		
			foreach ($allowed_image_ext as $mime_type => $ext) {
				$image_ext .= strtoupper($ext)." ";
			}
					
			$large_image_location = $upload_path.$large_image_name;								
			
			//if ($_POST["upload"]=="Upload") {
 
				//Get the file information

				/*$userfile_name = $_FILES['image']['name'];	
				$userfile_size = $_FILES['image']['size'];
				$userfile_type = $_FILES['image']['type'];
				$userfile_tmp = $_FILES['image']['tmp_name'];

				$filename = basename($_FILES['image']['name']);*/

				$filename = basename($userfile_name);

				$file_ext = strtolower(substr($filename, strrpos($filename, '.') + 1));
				
				//Only process if the file is a JPG and below the allowed limit
				//if((!empty($_FILES["image"])) && ($_FILES['image']['error'] == 0)) {
				if((!empty($userfile_name)) && ($userfile_error == 0)) {			
					foreach ($allowed_image_types as $mime_type => $ext) {
						//loop through the specified image types and if they match the extension then break out
						//everything is ok so go and check file size
						//if($file_ext == $ext && $userfile_type == $mime_type){
						if($file_ext == $ext){
							$error = "";
							break;
						}else{
							$error = "Solo <strong>".$image_ext."</strong> aceptamos archivos para subir<br />";
						}
					}
					//check if the file size is above the allowed limit
					if ($userfile_size > ($max_file * 1048576)) {
						$error .= "Los archivos deben estar bajo ".$max_file."MB de tamaño";
					}			
				}else{
					$error = "Por favor, seleccione un archivo para subir";
				}

				//Everything is ok, so we can upload the image.
				if (strlen($error) == 0){			
					//if (isset($_FILES['image']['name'])){
					if (isset($userfile_name)){			
					
						$large_image_location .= ".".$file_ext;

						move_uploaded_file($userfile_tmp, $large_image_location);
						
						$bResult = "success|".$large_image_location."|".($large_image_name.".".$file_ext)."|".$userfile_name;
					}
				}else{
					$bResult = "error|".$error;
				}
			//}
			return $bResult;
		}
	}
?>