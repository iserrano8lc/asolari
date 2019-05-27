<?php
/**************************************************************/
/*         phpSecurePages version 0.43 beta (05/01/13)        */
/*              Copyright 2013 Circlex.com, Inc.              */
/*                                                            */
/*          ALWAYS CHECK FOR THE LATEST RELEASE AT            */
/*              http://www.phpSecurePages.com                 */
/*                                                            */
/*              Free for non-commercial use only.             */
/*               If you are using commercially,               */
/*         or using to secure your clients' web sites,        */
/*   please purchase a license at http://phpsecurepages.com   */
/*                                                            */
/**************************************************************/
/*           Start of phpSecurePages Configuration            */
/**************************************************************/


/****** Installation ******/
$cfgIndexpage = '/index.php';
  // page to go to, if login is cancelled
  // Example: if your main page is http://www.mydomain.com/index.php
  // the value would be $cfgIndexpage = '/index.php'

/****** Admin Email ******/
$admEmail = '';
  // E-mail address of the site administrator
  // (This is being showed to the users on an error, so you can be notified by the users)
  // May be left blank

/****** Error Messages ******/
$noDetailedMessages = false;
  // Show detailed error messages (false) or give one single message for all errors (true).
  // If set to 'false', the error messages shown to the user describe what went wrong.
  // This is more user-friendly, but less secure, because it could allow someone to probe
  // the system for existing users.

/****** Password Encryption ******/
$passwordEncryptedWithMD5 = false;          // Set this to true if the passwords are encrypted with the MD5 algorithm

/****** Choose Language ******/
$languageFile = 'lng_spanish-LA.php';        // Choose from one of the 40 language files in the /lng directory

/****** IP-Restricted Access ******/
$use_IP_restricted_access=false;             // Set this to true if you need to additionally restrict access by IP address or by an IP address range
                                             // If set to 'false', IP checks will not be performed.

// $allowed_addr[0] = array ("22", "23", "123");
// $allowed_addr[1] = array ("128", "223");

// Examples:
// $allowed_addr[0] = array ("12", "15", "12", "1");  // Limits logins to a single IP: 12.15.12.1
// $allowed_addr[1] = array ("191", "12", "12"); // Limits logins to IP addresses in the range of 191.12.12.1 to 192.12.12.255
// $allowed_addr[2] = array ("216", "200"); // Limits logins to IP addresses in the range of  216.200.0.1 to 216.200.255.255.
//
// Declare as many $allowed_addr[$i] lines as you require! Start $i at zero, and just make sure you increase $i as you add IP's!

/****** Base de datos ******/
$useDatabase = false; // elegir entre usar una base de datos o como entrada de datos
/* estos datos son necesarios si se utiliza una base de datos  */
$cfgServerHost = '';	// MySQL hostname
$cfgServerPort = '';                      // MySQL port - leave blank for default port
$cfgServerUser = '';                  // MySQL user
$cfgServerPassword = '';                  // MySQL password
$cfgDbDatabase = '';     // MySQL database name containing phpSecurePages table
$cfgDbTableUsers = '';         // MySQL table name containing phpSecurePages user fields
$cfgDbLoginfield = '';                // MySQL field name containing login word
$cfgDbPasswordfield = '';         // MySQL field name containing password
$cfgDbUserLevelfield = '';       // MySQL field name containing user level
  // Choose a number which represents the category of this users authorization level.
  // Leave empty if authorization levels are not used.
  // See readme.txt for more info.
$cfgDbUserIDfield = '';	// MySQL field name containing user identification
  // enter a distinct ID if you want to be able to identify the current user
  // Leave empty if no ID is necessary.
  // See readme.txt for more info.

/****** Datos ******/
$useData = true;                          // elegir entre usar una base de datos o como entrada de datos
/* estos datos es necesario si no se utiliza la base de datos */
$cfgLogin[1] = 'pruebas';            // login word
$cfgPassword[1] = 'pruebas'; // password
$cfgUserLevel[1] = '1';            // user level
  // Elija un número que representa la categoría de usuarios de este nivel de autorización.
  // Dejar vacío niveles de autorización si no se utilizan.
  // Ver readme.txt para más información.
$cfgUserID[1] = '1';                       // identificación de usuario
  // enter a distinct ID if you want to be able to identify the current user
  // Leave empty if no ID is necessary.
  // See readme.txt for more info.

/*$cfgLogin[2] = '';
$cfgPassword[2] = '';
$cfgUserLevel[2] = '';
$cfgUserID[2] = '';

$cfgLogin[3] = '';
$cfgPassword[3] = '';
$cfgUserLevel[3] = '';
$cfgUserID[3] = '';*/


/**************************************************************/
/*             End of phpSecurePages Configuration            */
/**************************************************************/
?>
