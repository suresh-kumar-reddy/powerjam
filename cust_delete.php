<?php
	include "database.php";
	session_start();
	$s1="INSERT INTO archive_customers SELECT * FROM customer WHERE ID={$_GET["ID"]}";
	$s="delete from customer where ID={$_GET["ID"]}";
	$db->query($s);
	echo "<script>window.open('view_customers.php?mes=Data Deleted..','_self');</script>";
?>