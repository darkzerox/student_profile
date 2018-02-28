<?php
require 'connect_db.php';
$cata = $_GET['cata'];
$id = $_GET['id'];
$ssd_date = date("Y-m-d");

$dev_id = $_POST['dev_id'];

foreach ($dev_id as $key => $value) {
    $dev_id[$key] = $value;
    $di = $value;
    $score[$key] = $_POST['score'.$di];
}


for ($i=0; $i <=$key ; $i++) { 
    $score_n = $score[$i];
    $dev_id_n = $dev_id[$i];
    $sql = "INSERT INTO `st_succ_dev`( `dev_id`, `st_id`, `ssd_score`, `dev_cata`, `ssd_date`) VALUES ('$dev_id_n','$id','$score_n','$cata','$ssd_date')";
    $query = mysqli_query($conn,$sql);
}
     
if ($query) {
    echo "<script>  alert('เรียบร้อย');    
    window.location='/techer.php';    
    </script>";
            // header("Refresh:0; techer.php");
            
} else {
    echo "<script>  alert('ล้มเหลว');</script>";
            //header("Refresh:0; dev_detail.php?cata=$cata&id=$id");
}
?>