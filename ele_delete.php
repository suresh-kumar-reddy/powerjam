<?php
	include "database.php";
	session_start();
	$s1="INSERT INTO archive_electricians SELECT * FROM electrician WHERE ID={$_GET["ID"]}";
	$s="delete from electrician where ID={$_GET["ID"]}";
	$db->query($s);
	echo "<script>window.open('view_electrcians.php?mes=Data Deleted..','_self');</script>";
?>