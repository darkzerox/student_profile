<?php
require '../../connect_db.php';
	if (isset($_POST['per_name'])) {
		$per_id = $_GET['per_id'];
		$query = mysql_query("UPDATE `personal` SET `per_name`='".$_POST['per_name']."',`per_lastname`='".$_POST['per_lastname']."',`per_address`='".$_POST['per_address']."',`per_tel`='".$_POST['per_tel']."',`per_email`='".$_POST['per_email']."',`room_id`= '0' WHERE per_id = '$per_id'");
		if ($query) {
        	echo "<script type=\"text/javascript\">alert('เรียบร้อย') </script>";
		}else{
        	echo "<script type=\"text/javascript\">alert('ล้มเหลว') </script>";
		}
        header("Refresh:0; ../manage_techer.php");
	}
?>