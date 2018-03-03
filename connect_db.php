<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'oil';

//เชื่อต่อ server

	$conn=mysqli_connect($hostname,$username,$password,$database);
		if ($conn) {
			// echo "conect to server";
		} else{
			echo "error".mysql_error();
		}

mysqli_query($conn,"SET NAMES utf8");
mysqli_query($conn,"SET character_set_results=utf8");//ตั้งค่าการดึงข้อมูลออกมาให้เป็น utf8
mysqli_query($conn,"SET character_set_client=utf8");//ตั้งค่าการส่งข้อมุลลงฐานข้อมูลออกมาให้เป็น utf8
mysqli_query($conn,"SET character_set_connection=utf8");//ตั้งค่าการติดต่อฐานข้อมูลให้เป็น utf8

date_default_timezone_set('Asia/Bangkok');
?>