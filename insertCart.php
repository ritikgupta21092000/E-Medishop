<?php
	session_start();
	$med_type=$_POST['med_type'];
	$med_name=$_POST['med_name'];
	$price=$_POST['price'];
	$medicine=array($med_type, $med_name, $price);
	$_SESSION[$med_name]=$medicine;
	header('location:index.php');
?>
