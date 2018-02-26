<?php
session_start();
require 'connect_db.php';
$id = $_GET['id'];
    $query = mysql_query("INSERT INTO `growth`(`growth_weight`, `growth_height`, `growth_date`, `st_id`) VALUES ('".$_POST['growth_weight']."','".$_POST['growth_height']."',CURDATE(),'$id')");
    
    if ($query) {
        echo "<script type=\"text/javascript\">alert('เรียบร้อย') </script>";
    }else{
        echo "<script type=\"text/javascript\">alert('ล้มเหลว') </script>";
    }
    header("Refresh:0; dev.php?id=$id");
?>