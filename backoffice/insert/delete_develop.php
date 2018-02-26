<?php
	session_start();
	require '../../connect_db.php';
	$dev_id = $_GET['dev_id'];
	$cata = $_GET['cata'];

	$query_dev = mysql_query("DELETE FROM `development` WHERE dev_id = '$dev_id'");
	$query_succ = mysql_query("DELETE FROM `st_succ_dev` WHERE dev_id = '$dev_id'");
	if ($query_dev && $query_succ) {
        echo "<script type=\"text/javascript\">alert('เรียบร้อย') </script>";
	}else{
        echo "<script type=\"text/javascript\">alert('ล้มเหลว') </script>";
	}
        header("Refresh:0; ../manage_develop.php?cata=$cata");
?>