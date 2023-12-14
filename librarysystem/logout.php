<?php
require_once 'include/initialize.php';
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
@session_start();

// 2. Unset all the session variables
unset( $_SESSION['BorrowerId'] );
unset( $_SESSION['Name'] );
unset( $_SESSION['BUsername'] );
unset( $_SESSION['BPassword'] ); 
// unset($_SESSION['fixnmix_cart']);
// unset($_SESSION['fixnmix_carttwo']);
// unset($_SESSION['FIRSTNAME']);
// unset($_SESSION['LASTNAME']);
// unset($_SESSION['ADDRESS']);
// unset($_SESSION['CONTACTNUMBER']);
 	
// 4. Destroy the session
// session_destroy();
redirect(web_root."index.php?logout=1");

?>