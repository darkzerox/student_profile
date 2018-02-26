<?php
require 'connect_db.php';
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$query_username = mysql_query("SELECT per_username FROM personal where per_username = '$username'");
if (mysql_num_rows($query_username)<1) {

$sql = "INSERT INTO personal(per_name,per_lastname,per_address,per_tel,per_email,per_username,per_password,pertype_id) values('$name','$lastname','$address','$tel','$email','$username','$password','2')";


$query = mysql_query($sql) or die (mysql_error());
if ($query) {
	echo "<script type=\"text/javascript\">alert('ลงทะเบียนเรียบร้อย') </script>";
       header("Refresh:0; index.php");
}else{
	echo "<script type=\"text/javascript\">alert('ล้มเหลว') </script>";
        header("Refresh:0; regis.php");
}

}else{
	echo "<script type=\"text/javascript\">alert('มี Username นี้แล้ว') </script>";
        header("Refresh:0; regis.php");
}
?>