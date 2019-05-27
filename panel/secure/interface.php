<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
    	<meta name="description" content="<?php echo $strLoginInterface . ' ' . $strPoweredBy . ' phpSecurePages'; ?>">
		<meta name="keywords" content="phpSecurePages">
		<title><?php echo $strLoginInterface; ?></title>
                
        <link rel="stylesheet" href="css/css.css" type="text/css" media="screen" title="no title" charset="utf-8" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
        <script src="javascript/jquery.validationEngine-es.js" type="text/javascript"></script>
        <script src="javascript/jquery.validationEngine.js" type="text/javascript"></script>
        <SCRIPT LANGUAGE="JavaScript">
		<!--
		//  ------ check form ------
		function checkData() {
				var f1 = document.forms[0];
				var wm = "<?php echo $strJSHello; ?>\n\r\n";
				var noerror = 1;
		
				// --- entered_login ---
				var t1 = f1.entered_login;
				if (t1.value == "" || t1.value == " ") {
						wm += "<?php echo $strLogin; ?>\r\n";
						noerror = 0;
				}
		
				// --- entered_password ---
				var t1 = f1.entered_password;
				if (t1.value == "" || t1.value == " ") {
						wm += "<?php echo $strPassword; ?>\r\n";
						noerror = 0;
				}
		
				// --- check if errors occurred ---
				if (noerror == 0) {
						alert(wm);
						return false;
				}
				else return true;
		}
		//-->
		</SCRIPT>
	</head>
    
	<body>
    	<form class="login" id="entry" action="<?php echo $_SERVER['REQUEST_URI'] ?>" METHOD="post" onSubmit="return checkData()" style="background:#ED4D35">
            <?PHP
				// check for error messages
				if ($phpSP_message) {
					echo '<div id="error">'.$phpSP_message.'</div>';
				}
			?>
            <h1 style="text-shadow:0px 0px 0px rgba(0,0,0,0); border:0px none">ASI<span style="color:#fff; border:0px none">Panel de Control</span></h1>
            <div class="alerta"></div>
            <div class="campos">
            	<fieldset>
                    <label id="user" style="color:#fff">Usuario</label>
                    <input type="text" class="texto validate[required]" onfocus="prende('user');" onblur="apagar('user');" value="" name="entered_login" tabindex="1" id="entered_login" style="border:0px none"/>
                </fieldset>
                <fieldset>
                    <label id="pass" style="color:#fff">Password</label>
                    <input type="password" class="texto validate[required]" onfocus="prende('pass');" onblur="apagar('pass');" value="" name="entered_password" tabindex="2" id="entered_password" style="border:0px none"/>
                </fieldset>                    
            </div>
			<input type="submit" class="boton" value="Entrar"/>
		</form>
        
        <div class="info">
            <span>Se autoriza el uso a personal de ASI<br />
            Copyright &copy; 2015 <a href="http://www.arkanmedia.com">Arkanmedia</a></span>
        </div>
        
    </body>
</html>