<?php
	session_start();
	require '../connect_db.php';
	if (isset($_GET['de'])) {
		$query = mysqli_query($conn,"SELECT room_id FROM student WHERE st_id = '".$_GET['st_id']."'");
		if (mysqli_num_rows($query)>0) {
			$result = mysqli_fetch_assoc($query);
			$query_room = mysqli_query($conn,"SELECT room_max FROM classroom WHERE room_id = '".$result['room_id']."'");
			$result_room = mysqli_fetch_assoc($query_room);
			$room_max = $result_room['room_max']-1;
			if ($room_max<0) {
				$room_max = 0;
			}
			$query_up = mysqli_query($conn,"UPDATE `classroom` SET `room_max`= '$room_max' WHERE room_id = '".$result['room_id']."'");

			$query = mysqli_query($conn,"DELETE FROM student WHERE st_id = '".$_GET['st_id']."'");
			if ($query && $query_up) {
				echo "<script type=\"text/javascript\">alert('เรียบร้อย') </script>";
			}else{
				echo "<script type=\"text/javascript\">alert('ล้มเหลว') </script>";
			}
		}else{
				echo "<script type=\"text/javascript\">alert('ไม่มีรหัสนักเรียนนี้') </script>";
		}
	}
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
			<div class="plus">
				<a href="insert/ins_student.php">
					<div class="btn_plus">เพิ่ม</div>
				</a>
			</div>
			<br>
			<br>
			<br>
			<div class="overflo">
			<table class="table_back">
				<thead>
					<tr>
						<th>อันดับ</th>
						<th>ชื่อ นามสกุล</th>
						<th>ที่อยู่</th>
						<th>บิดา</th>
						<th>มารดา</th>
						<th>วันเกิด</th>
						<th>ชั้นเรียน</th>
						<th>ห้องเรียน</th>
						<th>รายละเอียด</th>
						<th></th>
					</tr>
				</thead>
			<?php
				$num=0;
				$sql = "SELECT * FROM `student`";
				$query = mysqli_query($conn,$sql);
				while ($result = mysqli_fetch_array($query)) {
				$num++;
					$query_class = mysqli_query($conn,"SELECT * FROM `class` WHERE class_id = '".$result['class_id']."'");
					$re_class = mysqli_fetch_assoc($query_class);
					$query_room = mysqli_query($conn,"SELECT * FROM `classroom` WHERE room_id = '".$result['room_id']."'");
					$re_room = mysqli_fetch_assoc($query_room);
			?>
				<tbody>
					<tr>
						<td><?=$num?></td>
						<td>ด.ช.<?=$result['st_name']?> <?=$result['st_lastname']?></td>
						<td><?=$result['st_address']?></td>
						<td><?=$result['st_father']?></td>
						<td><?=$result['st_mother']?></td>
						<td><?=$result['st_birth']?></td>
						<td><?=$re_class['class_name']?></td>
						<td><?=$re_room['room_name']?></td>
						<td><a href="manage_student_detail.php?st_id=<?=$result['st_id']?>">รายละเอียด</a></td>
						<td><a href="#edit<?=$result['st_id']?>">แก้ไข</a> | <a onClick="javascript:return confirm('ต้องการลบ ?');" href="manage_student.php?de=de&st_id=<?=$result['st_id']?>">ลบ
								</a></td>
					</tr>
				</tbody>
				
			<?php
				}
			?>
			</table>

			</div>
		</div>
	</div>
	<?php 
	$query = mysqli_query($conn,"SELECT * FROM `student`");
	while ($result = mysqli_fetch_array($query)) {
		?>
					<div id="edit<?=$result['st_id']?>" class="overlay light">
                        <a class="cancel" href="#"></a>
                        <div class="popup">
                        	<div style="width: 400px;margin: 0 auto;text-align: center;">
                        		<h1 style="text-align: center;font-size: 24px;font-weight: bold;">แก้ไข</h1>
                        		<form method="post" action="select_room.php?per_id=<?=$result['per_id']?>">
                            	ชื่อ : <input type="" name="st_name" value="<?=$result['st_name']?>" required><br><br>
                            	นามสกุล : <input type="" name="st_lastname" value="<?=$result['st_lastname']?>" required><br><br>วันเกิด : <input type="date" name="st_birth"><br><br>
                            	ที่อยุ่ : <textarea name="st_address" required><?=$result['st_address']?></textarea><br><br>
                            	ชื่อบิดา : <input type="" name="st_father" value="<?=$result['st_father']?>" required><br><br>
                            	ชื่อมารดา : <input type="" name="st_mother" value="<?=$result['st_mother']?>" required><br><br>
                            	ผู้ปกครอง : <select name="per_id">
									<option value=""></option>
									<?php
									$queryp = mysqli_query($conn,"SELECT * FROM `personal` where pertype_id = '2'");
									while ($resultp=mysqli_fetch_array($queryp)) {
										echo "<option value=".$resultp['per_id'].">".$resultp['per_name']." ".$resultp['per_name']."</option>";
									}
									?>
								</select><br><br>
								ชั้นเรียน : <select name="class_id">
									<option value=""></option>
									<?php
									$querys = mysqli_query($conn,"SELECT * FROM `class`");
									while ($results=mysqli_fetch_array($querys)) {
										echo "<option value=".$results['class_id'].">".$results['class_name']."</option>";
									}
									?>
								</select><br><br>
                            	<button>ยืนยัน</button>
                            	</form>
                        	</div>
                        </div>
                  	</div>
		<?php
	}
	 ?>
</body>
</html>

