<?PHP
	ob_start();

	$cMensaje = '	<html>
						<head><title>Comentario desde la web</title></head>
						<body>
							<div style="width:100%; height:100%; background:#C8D561; padding:10px; margin-top:-40px; margin-left:0px; color:#30180C; font-family:\'Century Gothic\',Tahoma; margin-bottom:10px; font-size:12px">								
								<p style="letter-spacing:-1px; padding:7px; background-color:#2F190B; color:#E5EBA3; border-left:5px solid #510000; font-weight:bold; font-size:15px">Comentario desde la web</p>									
								<p>Nombre: <span style="color:#30180C">'.$_POST['cNombre'].'</span></p>
								<p>E-mail: <span style="color:#30180C">'.$_POST['cEmail'].'</span></p>
								<p>Tel&eacute;fono: <span style="color:#30180C">'.$_POST['cTelefono'].'</span></p>';
								
	if(!empty($_POST['cEmpresa']))
		$cMensaje .= '			<p>Empresa: <span style="color:#30180C">'.$_POST['cEmpresa'].'</span></p>';
																
	$cMensaje .= '				<p>Mensaje: <span style="color:#30180C">'.$_POST['cComentario'].'</span></p><br /><br />									
								<span style="color:#30180C;font-family:\'Century Gothic\',Tahoma,Arial; font-size:10px; padding:10px">&copy; Aprovechamiento Solar Integrado | <a href="http://www.asolari.com" style="color:#30180C; text-decoration:none">www.asolari.com</a></span><br /><br /><br /><br />
							</div>
						</body>
					</html>';
										
	$destinatario = 'ventas@asolari.com';

	$asunto = 'Comentario desde la web [ '.$_POST['cNombre'].' ]';

	//para el envío en formato HTML
	$headers = "MIME-Version: 1.0\r\n";
	
	$headers .= "Content-type: text/html; charset=utf-8\r\n";

	//dirección del remitente
	$headers .= "From: Aprovechamiento Solar Integrado <$destinatario>\r\n";

	//dirección de respuesta, si queremos que sea distinta que la del remitente
	$headers .= "Reply-To: $destinatario\r\n";

	//ruta del mensaje desde origen a destino
	$headers .= "Return-path: ".$_POST['cEmail']."\r\n";

	//direcciones que recibián copia
	/*if(!empty($_POST['cEmailCC']))
		$headers .= "Cc: ".$_POST['cEmailCC']."\r\n";*/

	//direcciones que recibirán copia oculta
	//$headers .= "Bcc: arkangeldigital@hotmail.com\r\n";
	
	$bResult = mail($destinatario, $asunto, $cMensaje, $headers);
	
	if($bResult)
		echo '<h2 style="margin-top:115px; line-height:40px">GRACIAS POR TU COMENTARIO<br/>Nos pondremos en contacto contigo</h2>';

	ob_end_flush(); 
?>
