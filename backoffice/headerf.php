<header>
	<div class="wrap">
		<div class="logo">
			<a href="../index.php">
				<img src="../../img/logo01.png">
			</a>
		</div>
		<nav>
			<ul>
				<li>
						<div class="dropdown">
							  <a href="../manage_techer.php">การจัดการข้อมูล</a>
							  <div class="dropdown-content">
							    <a href="../manage_techer.php">ครู</a>
							    <a href="../manage_student.php">นักเรียน</a>
							    <a href="../manage_parent.php">ผู้ปกครอง</a>
							  </div>
						</div>
				</li>
				<li>
					<a href="../manage_schedule.php">จัดการกิจกรรม</a>		  
				</li>
				<li>
					<a href="../manage_room.php">ห้องเรียน</a>		  
				</li>
				<li>
					<div class="dropdown">
							  <a href="../manage_develop.php?cata=1">จัดการระบบพัฒนา</a>
							  <div class="dropdown-content">
							    <a href="../manage_develop.php?cata=1">ด้านอารมณ์</a>
							    <a href="../manage_develop.php?cata=2">ด้านร่างกาย</a>
							    <a href="../manage_develop.php?cata=3">ด้านสติ</a>
							    <a href="../manage_develop.php?cata=4">ด้านสังคม</a>
							  </div>
						</div>
				</li>
			</ul>
		</nav>
		<div class="box_user">
			asd | 
				<a href="../logout.php">
					ออกจากระบบ
				</a>
		</div>
	</div>
</header>

<style type="text/css">
@charset 'utf-8';

body{
	padding: 0;
	margin: 0;
}
.wrap{
	width: 1200px;
	margin: 0 auto;
}
.wrap_logb{
	margin: 200px auto;
	width: 300px;
	height: 230px;
	padding: 20px;
	box-shadow: 2px 2px 2px #444;
	background: #66cdaa;
}
.wrap_logb h2{
	text-align: center;
}
.wrap_logb input{
	height: 40px;
	font-size: 18px;
	padding: 10px;
	width: 100%;
	margin: 10px 0;
}
.wrap_logb button{
	height: 40px;
	width: 100%;
	text-align: center;
}

header{
	width: 96%;
	background: #66cdaa;
	height: 40px;
	padding: 20px 2%;
	position: absolute;
    z-index: 99;
}
header .logo{
	width: 200px;
	float: left;
}
header .logo img{
	width: 100%;
}
header nav{
	width: 600px;
	float: left;
}
header nav ul{
	list-style: none;
}
header nav ul li{
	float: left;
	margin: 0 20px;
}
header nav ul li a{
	text-decoration: none;
	color: #000;
}
header .box_user{
	padding: 10px 0;
	width: 200px;
	float: right;
}
header .box_user a{
	text-decoration: none;
	color: #000;
}



.overflo{
	height: 460px;
	overflow: auto;
}
.wrap_inner{
	width: 920px;
	margin: 0 auto;
	height: 500px;
	border-radius: 20px;
	border: 1px solid #ccc;
	box-shadow: 5px 5px 5px #444;
	padding: 40px;
}
.wrap_inner a{
	text-decoration: none;
}
.plus{
	float: right;
}
.plus a{
	text-decoration: none;
	color: #fff;
}
.btn_plus{
	background: #66cdaa;
	padding: 10px 40px;
	border-radius: 10px;
	border-bottom: 2px solid #1b6379;
}

table{
	width: 100%;
}
.table_back thead{
	background: #2e9e78;
	color: #fff;
	text-align: center;
}
.table_back thead th{
	height: 40px;
	border-bottom: 3px solid #196f52;
}
.table_back tbody{
	text-align: center;
	background: #eaeaea;
}
.table_back tbody td{
	height: 40px;
}
.table_back tbody td a{
	text-decoration: none;
	color: #333;
}
.table_back{
	margin-bottom: 20px;
}
.table_back tbody:hover{
	background: #196f52;
	color: #fff;
}
.ins table{
	width: 600px;
	margin: 0 auto
}
.ins table tr td:nth-child(even){
	width: 300px;
	text-align: left;
}
.ins table tr td{
	height: 45px;
}
.ins table tr td:nth-child(odd){
	width: 250px;
	text-align: right;
}
.ins h2{
	text-align: center;
}
.ins table tr td input,.ins table tr td textarea{
	width: 100%;
	height: 80%;
}
/*------------------- drop btn --------------------------*/


.dropbtn {
	color: #222;
	font-weight: bold;
    padding: 15px;
    font-size: 16px;
    cursor: pointer;
    border: 0;
    z-index: 999;
    color: #222;
	text-decoration: none;
}


.dropdown {
    position: relative;
    display: inline-block;
    cursor: pointer;
    color: #222;
}
.dropdown a{
	text-decoration: none;
    color: #222;
}

.dropdown-content {
    display: none;
    position: absolute;
    right: -20px;
    top: 20px;
    background-color: #f9f9f9;
    min-width: 120px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: 14px;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
}


/*------------ pop up ------------------------*/

.button {
  font-family: Helvetica, Arial, sans-serif;
  font-size: 13px;
  padding: 5px 10px;
  border: 1px solid #aaa;
  background-color: #eee;
  background-image: linear-gradient(top, #fff, #f0f0f0);
  border-radius: 2px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
  color: #666;
  text-decoration: none;
  text-shadow: 0 1px 0 #fff;
  cursor: pointer;
  transition: all 0.2s ease-out;
}
.button:hover {
  border-color: #999;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
}
.button:active {
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25) inset;
}

.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.5);
  transition: opacity 200ms;
  visibility: hidden;
  opacity: 0;
  z-index: 999;
}
.overlay.light {
  background: rgba(255, 255, 255, 0.5);
}
.overlay .cancel {
  position: absolute;
  width: 100%;
  height: 100%;
  cursor: default;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 15% auto 0;
  padding: 20px;
  background: #fff;
  border: 1px solid #666;
  box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
  position: relative;
}
.light .popup {
  border-color: #aaa;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.25);
}
.popup h2 {
  margin-top: 0;
  color: #666;
}
.popup .close {
  position: absolute;
  width: 20px;
  height: 20px;
  top: 20px;
  right: 20px;
  opacity: 0.8;
  transition: all 200ms;
  font-size: 24px;
  font-weight: bold;
  text-decoration: none;
  color: #666;
}
.popup .close:hover {
  opacity: 1;
}
.popup .content {
  max-height: 400px;
  overflow: auto;
}
.popup p {
  margin: 0 0 1em;
}
.popup p:last-child {
  margin: 0;
}

.input_unit{
	width: 50px;
}
</style>