<?php
session_start();
require '../connect_db.php';
$per_id = $_GET['per_id'];
$room_id = $_POST['room_id'];

$sql = "UPDATE `personal` SET `room_id`= '$room_id' WHERE per_id = '$per_id'";
$query = mysql_query($sql);

if ($query) {
        echo "<script type=\"text/javascript\">alert('เรียบร้อย') </script>";
        header("Refresh:0; manage_techer.php");

} else {
        echo "<script type=\"text/javascript\">alert('ล้มเหลว') </script>";
        header("Refresh:0; manage_techer.php");
}
?>