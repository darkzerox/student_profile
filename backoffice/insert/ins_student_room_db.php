<?php
require '../../connect_db.php';
echo $id = $_GET['id'];
echo $id_student = $_GET['id_student'];


echo $sql = "INSERT INTO `group_student`( `room_id`, `st_id`) VALUES ('$id','$id_student')";


$query = mysqli_query($conn,$sql) or die (mysql_error());
if (!$query) {
	echo "<script>  alert('Insert error'); ";
}else{
	header("location:../manage_room_detail.php?id=".$id);
}
?>