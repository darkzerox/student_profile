<?php
	session_start();
	require '../../connect_db.php';
	if (isset($_POST['st_name'])) {
			$check = true;
			for ($i=1; $i <100 ; $i++) { 
				$query_class = mysqli_query($conn,"SELECT * FROM `classroom` WHERE room_id = '$i' and class_id = '".$_POST['class_id']."'");
				$result_class = mysqli_fetch_assoc($query_class);
				if (mysqli_num_rows($query_class)>0) {
					if ($result_class['room_max']>20) {
						$check = false;
					}else{
						$room_id = $i;
						$room_max = $result_class['room_max']+1;
						$i = 101;
					}
				}
			}

			if ($check == true) {
				$query_per = mysqli_query($conn,"SELECT per_id FROM personal where per_name = '".$_POST['per_name']."' and per_lastname = '".$_POST['per_lastname']."'");
				echo "SELECT per_id FROM personal where per_name = '".$_POST['per_name']."' and per_lastname = '".$_POST['per_lastname']."'";
				if (mysqli_num_rows($query_per)>0) {
					$query_ins = mysqli_query($conn,"UPDATE `classroom` SET `room_max`= '$room_max' WHERE room_id='$i'");
					$result_per = mysqli_fetch_assoc($query_per);
					$sql = "INSERT INTO `student`(`st_name`, `st_lastname`, `st_birth`, `st_address`, `st_father`, `st_mother`, `class_id`,`per_id`,`room_id`) VALUES ('".$_POST['st_name']."','".$_POST['st_lastname']."','".$_POST['st_birth']."','".$_POST['st_address']."','".$_POST['st_father']."','".$_POST['st_mother']."','".$_POST['class_id']."','".$result_per['per_id']."','$room_id')";
					echo $sql;
					$query = mysqli_query($conn,$sql);
					if ($query) {
						echo "<script type=\"text/javascript\">alert('เรียบร้อย') </script>";
			        	header("Refresh:0; ../manage_student.php");
					}else{
						echo "<script type=\"text/javascript\">alert('ล้มเหลว') </script>";
					}

				}else{
					echo "<script type=\"text/javascript\">alert('กรอกชื่อนามากุลผู้ปกครงให้ถูกต้อง') </script>";
				}
			}
	}
?>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	require '../headerf.php';
	?>
	<div class="wrap" style="position: relative;top: 120px;">
		<div class="wrap_inner">
			<div class="overflo ins">
				<h2>เพิ่มข้อมูลนักเรียน</h2>
				<form method="post" action="ins_student.php">
					<table>
						<tr>
							<td>ชื่อ : </td>
							<td><input type="" name="st_name" required></td>
						</tr>
						<tr>
							<td>นามสกุล : </td>
							<td><input type="" name="st_lastname" required></td>
						</tr>
						<tr>
							<td>ที่อยู่ : </td>
							<td><textarea name="st_address" required></textarea></td>
						</tr>
						<tr>
							<td>วันเกิด : </td>
							<td><input name="st_birth" type="date"></td>
						</tr>
						<tr>
							<td>บิดา : </td>
							<td><input type="" name="st_father" required></td>
						</tr>
						<tr>
							<td>มารดา : </td>
							<td><input type="" name="st_mother" required></td>
						</tr>
						<tr>
							<td>ชื่อผู้ปกครอง : </td>
							<td><input type="" name="per_name" required></td>
						</tr>
						<tr>
							<td>นามสกุลผู้ปกครอง : </td>
							<td><input type="" name="per_lastname" required></td>
						</tr>
						<tr>
							<td>ชั้นเรียน : </td>
							<td>
								<select name="class_id">
									<option value=""></option>
									<?php
									$query = mysqli_query($conn,"SELECT * FROM `class`");
									while ($result=mysqli_fetch_array($query)) {
										echo "<option value=".$result['class_id'].">".$result['class_name']."</option>";
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td><button type="reset">ล้างข้อมูล</button></td>
							<td><button type="submit">ยืนยัน</button></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
