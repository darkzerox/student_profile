<?php
   session_start();
require '../connect_db.php';
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM personal WHERE per_username = '$username' and per_password = '$password' and pertype_id = '0'";
$query = mysqli_query($conn,$sql) or die (mysql_error());
$rs_Login = mysqli_fetch_array($query);
$pertype = $rs_Login['pertype_id'];
if(mysqli_num_rows($query)>0) {
 
    // ดึงข้อมูลมาเกบทีละตัวแปร
    // ดึงข้อมูลในตาราง
    $_SESSION['per_id'] = $rs_Login['per_id'];
    $_SESSION['pertype_id'] = $rs_Login['pertype_id'];
    $_SESSION['per_name'] = $rs_Login['per_name'];
    $_SESSION['per_lastname'] = $rs_Login['per_lastname']; //จำค่าที่เราดึงมา
    $_SESSION['room'] = $rs_Login['room_id'];
    

        echo "<script type=\"text/javascript\">alert('Welcome') 
        
        window.location='manage_techer.php';
        </script>";
        // header("Refresh:0; manage_techer.php");
} else {
    echo "<script>  alert('username or password incorrect'); 
             window.location='index.php';  

            </script>";
}
?>