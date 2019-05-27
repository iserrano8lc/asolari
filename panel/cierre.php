<?PHP

if (phpversion() >= 4) {

	// phpversion = 4

	session_start();

	// session hack to make sessions on old php4 versions work

	if (phpversion() > 4.0) {

//		unset($HTTP_SESSION_VARS['login']);

		unset($HTTP_SESSION_VARS['pass']);

	} else {

//		session_unregister("login");

		session_unregister("pass");

	}

	session_destroy();

	$sessionPath = session_get_cookie_params(); 

	setcookie(session_name(), "", 0, $sessionPath["path"], $sessionPath["domain"]);

	header("location:index.php");
} else {

	// phpversion = 3

	session_destroy_php3();

   setcookie($cookieName, "", 0);

}

?>