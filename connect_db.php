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
<style type="text/css">
.con1{
    width: 280px;
    float: left;
}
.con1 img{
    width: 280px;
    height: 280px;
    border-radius: 180px;
    border: 1px solid #ccc;
}
.con2{
    width: 800px;
    float: left;
    height: 600px;
    overflow: auto;
    margin-left: 60px;
}
.w3-light-grey{
    width: 100%;
    height: 20px;
    background: #ccc;
}
.progress{
    height: 20px;
    text-align: center;
    color: #fff;
}
.progress_1{
    background: green;
}.progress_2{
    background: orange;
}.progress_3{
    background: blue;
}.progress_4{
    background: purple;
}
.article_img{
    width: 31%;
    margin: 10px 0;
    padding :15px;
    height: 200px;
    float: left;
}
.article_img img{
    width: 100%;
    height: 180px;
}
.article_img p{
  margin-top: 10px;
}
.edit_img_st{
  position: absolute;
  width: 280px;
  height: 280px;
  border-radius: 180px;
  color: rgba(0,0,0,0);
  text-align: center;
  font-size: 40px;
  line-height: 1000%;
  transition:.5s;
    top: -280px;
    cursor: pointer;
}
.edit_img_st:hover{
  background: rgba(0,0,0,.6);
  color: #fff;
}
.btn_edit_img{
  width: 280px;
  height: 280px;
  border-radius: 180px;
  position: absolute;
  top: 0;
  border: 0;
  cursor: pointer;
  
}
.dev_field a{
  float: right;
}
@media screen and (max-width: 376px) {
    .disnone376{
      display: none;
    }
    .con1{
      width: 100%;
    }
    .con1 img{
    width: 340px;
    height: 340px;
}
.con2{
    width: 100%;
    margin-left: 0;
}
.article_img{
  width: 315px;
  height: 400px;
}
.article_img img{
  width: 315px;
  height: 315px;
}

</style>