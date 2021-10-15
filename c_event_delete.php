<?php
	include "database.php";
	session_start();
	$s1="INSERT INTO archive_c_events SELECT * FROM c_events WHERE id={$_GET["id"]}";
	$db->query($s1);
	
	$s="delete from c_events where id={$_GET["id"]}";
	$db->query($s);
	echo "<script>window.open('preview_c_events.php?mes=Data Deleted..','_self');</script>";
?>