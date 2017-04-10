<?php
require_once("class/Customer.php");


$c = new Customer();
if($customer = $c->searchLoginPassword($_POST["login"],$_POST["password"])){
	session_start();
	$_SESSION['customer'] = serialize($customer);
	header("Location: dashboard.php");
}
else{
	header("Location: index.php");
}




?>