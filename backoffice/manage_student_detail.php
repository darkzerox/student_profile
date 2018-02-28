<?php
	session_start();
	require '../connect_db.php';
	$st_id = $_GET['st_id'];

	$query = mysqli_query($conn,"SELECT * FROM `student`
		INNER JOIN classroom ON student.room_id = classroom.room_id
		INNER JOIN class ON student.class_id = class.class_id
		WHERE student.st_id = '$st_id'");
	$result = mysqli_fetch_assoc($query);
	$birth = str_replace('-', '/', $result['st_birth']);
	$birth = date('d/m/Y',strtotime($birth));
?>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	require 'header.php';
	?>
	<div class="wrap" style="position: relative;top: 120px;">
		<div class="wrap_inner">
			<div class="overflo">
			<table>
				<tr>
					<td class="con1">
						<?php
						if ($result['st_img']!="") {
						?>
						<img src="../<?=$result['st_img']?>">
						<?php 
						}else{
							$img = "../img/default_child.jpg";
						?>
						<img src="<?=$img?>">
						<?php 
						} 
						?>
					</td>
					<td class="con2">
						<h2>ด.ช.<?=$result['st_name']?> <?=$result['st_lastname']?></h2>
						<hr>
						<p>วัน/เดือน/ปี เกิด : <?=$birth?></p>
						<p>ชื่อบิดา : <?=$result['st_father']?></p>
						<p>ชื่อมารดา : <?=$result['st_mother']?></p>
						<p>ที่อยู่ : <?=$result['st_address']?></p>
						<p>ชั้นเรียน : <?=$result['class_name']?></p>
						<p>ห้องเรียน : <?=$result['room_name']?></p>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<fieldset>
							<legend>ข้อมูลพัฒนาการ</legend>
							<?php
								for ($i=1; $i <=4 ; $i++) {
									$query_dev[$i] = mysqli_query($conn,"SELECT * FROM development where dev_cata = '$i'");
									if (mysqli_num_rows($query_dev[$i])>0) {
										$dev_sco[$i] = mysqli_num_rows($query_dev[$i])*3;
										$query_succ[$i] = mysqli_query($conn,"SELECT ssd_score FROM st_succ_dev where dev_cata = '$i' and st_id = '".$result['st_id']."'");
										$score[$i]=0;
										while ($reuslt_succ[$i] = mysqli_fetch_array($query_succ[$i])) {
											$score[$i] = $score[$i] + $reuslt_succ[$i]['ssd_score'];
										}
										$score[$i] = $score[$i]*100/$dev_sco[$i];
									}else{
										$score[$i] = 0;
									}
								}
							?>
							<label>ด้านอารมณ์ : </label>
							<div class="w3-light-grey">
								  <div id="pro_1" class="progress progress_1" style="width:0%">0%</div>
							</div>
							<br>
							<label>ด้านร่างกาย : </label>
							<div class="w3-light-grey">
								  <div id="pro_2" class="progress progress_2" style="width:0%">0%</div>
							</div>
							<br>
							<label>ด้านสติ : </label>
							<div class="w3-light-grey">
								  <div id="pro_3" class="progress progress_3" style="width:0%">0%</div>
							</div>
							<br>
							<label>ด้านสังคม : </label>
							<div class="w3-light-grey">
								  <div id="pro_4" class="progress progress_4" style="width:0%">0%</div>
							</div>
							</div>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<fieldset>
							<legend>รูปภาพ</legend>
							<?php
                            $query_st_img = mysqli_query($conn,"SELECT * FROM student_img where st_id = '".$result['st_id']."'");
                            if(mysqli_num_rows($query_st_img)>0){
                                while ($result_st_img = mysqli_fetch_array($query_st_img)) {
                                ?>
                                <div class="article_img">
                                    <img src="../<?=$result_st_img['stimg_img']?>">
                                    <br>
                                    <p>รายละเอียด : <?=$result_st_img['stimg_detail']?></p>
                                </div>
                                <?php 
                                }
                            }else{
                                ?>
                                <h2 style="text-align:center;">ไม่มีข้อมูลรูป</h2>
                                <?php
                            }
                                 ?>
                                 <br>
                                 <br>
                                 <br>
                                 <br>
						</fieldset>
					</td>
				</tr>
			</table>
			</div>
		</div>
	</div>
</body>
</html>
<style type="text/css">
.con1{
	width: 230px;
}
.con1 img{
	width: 200px;
	height: 200px;
	border-radius: 100px;
	border: 1px solid #ccc;
}
.con2{
	width: 600px;
}.w3-light-grey{
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
	padding :15px;
	height: 200px;
	float: left;
}
.article_img img{
    width: 100%;
    height: 180px;
}

</style><script>
var elem1 = document.getElementById("pro_1");   
  var width1 = 0;
  var id1 = setInterval(function() {
    if (width1 >= <?=$score[1]?>) {
      clearInterval(id1);
    } else {
      width1++; 
      elem1.style.width = width1 + '%'; 
      elem1.innerHTML = width1 * 1  + '%';
    }
  }	, 10);
var elem2 = document.getElementById("pro_2");   
  var width2 = 0;
  var id2 = setInterval(function() {
    if (width2 >= <?=$score[2]?>) {
      clearInterval(id2);
    } else {
      width2++; 
      elem2.style.width = width2 + '%'; 
      elem2.innerHTML = width2 * 1  + '%';
    }
  }	, 10);
var elem3 = document.getElementById("pro_3");   
  var width3 = 0;
  var id3 = setInterval(function() {
    if (width3 >= <?=$score[3]?>) {
      clearInterval(id3);
    } else {
      width3++; 
      elem3.style.width = width3 + '%'; 
      elem3.innerHTML = width3 * 1  + '%';
    }
  }	, 10);

var elem4 = document.getElementById("pro_4");   
  var width4 = 0;
  var id4 = setInterval(function() {
    if (width4 >= <?=$score[4]?>) {
      clearInterval(id4);
    } else {
      width4++; 
      elem4.style.width = width4 + '%'; 
      elem4.innerHTML = width4 * 1  + '%';
    }
  }	, 10);

</script>