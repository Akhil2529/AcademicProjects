<?php
require_once("../include/initialize.php");
if(!isset($_SESSION['BorrowerId'])){
	redirect(web_root."index.php");
}

 
 $content    = 'profile.php';		
 
require_once ("../theme/templates.php");
?>
  
