<?php
require 'connect_db.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM personal WHERE per_username = '$username' and per_password = '$password' ";
$query = mysqli_query($conn,$sql) or die (mysql_error());
if($query && mysqli_num_rows($query)>0) {
    session_start();
    // ดึงข้อมูลมาเกบทีละตัวแปร
    // ดึงข้อมูลในตาราง
        $rs_Login = mysqli_fetch_array($query);
    $_SESSION['per_id'] = $rs_Login['per_id'];
    $_SESSION['pertype_id'] = $rs_Login['pertype_id'];
    $_SESSION['per_name'] = $rs_Login['per_name'];
    $_SESSION['per_lastname'] = $rs_Login['per_lastname']; //จำค่าที่เราดึงมา
    $_SESSION['room_id'] = $rs_Login['room_id'];
    
    if ($_SESSION['pertype_id']==2) {
        echo "<script type=\"text/javascript\">alert('Welcome') </script>";
        header("Refresh:0; student.php");
    }
    if ($_SESSION['pertype_id']==1) {
       echo "<script type=\"text/javascript\">alert('Welcome') </script>";
        header("Refresh:0; techer.php");
    }

       
} else {
    echo "<script>  alert('username or password incorrect'); 
             window.location='log_in.php';  
            </script>";
       
}
?>