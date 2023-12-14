<?php
require_once ("../../include/initialize.php");

$category = $_POST['category'];

$sql = "SELECT * FROM `tblcategory` WHERE `Category`='{$category}'";
$mydb->setQuery($sql);
$res = $mydb->loadSingleResult();

echo $res->DDecimal;

?>