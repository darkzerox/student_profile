<?php
	session_start();
	require '../../connect_db.php';
	if (isset($_POST['sch_detail'])) {
		
			$sql = "INSERT INTO `schedule`(`sch_detail`, `sch_date`, `sch_timestart`, `sch_timeend`, `room_id`) VALUES ('".$_POST['sch_detail']."','".$_POST['sch_date']."','".$_POST['sch_timestart']."','".$_POST['sch_timeend']."','".$_POST['room_id']."')";
		
			$query = mysqli_query($conn,$sql);
		
		if ($query) {
			echo "<script type=\"text/javascript\">alert('เรียบร้อย') </script>";
        	header("Refresh:0; ../manage_schedule.php");
		}else{
			echo "<script type=\"text/javascript\">alert('ล้มเหลว') </script>";
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
				<h2>เพิ่มข้อมูลผู้ปกครอง</h2>
				<form method="post" action="ins_schedule.php">
					<table>
						<tr>
							<td>กิจกรรม : </td>
							<td><input type="" name="sch_detail" required></td>
						</tr>
						<tr>
							<td>วัน : </td>
							<td>
								<select name="sch_date" required>
									<option></option>
									<option value="วันจันทร์">วันจันทร์</option>
									<option value="วันอังคาร">วันอังคาร</option>
									<option value="วันพุธ">วันพุธ</option>
									<option value="วันพฤหัสบดี">วันพฤหัสบดี</option>
									<option value="วันศุกร์">วันศุกร์</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>เวลา : </td>
							<td>
								<input style="width:120px;" type="time" name="sch_timestart" required> ถึง 
								<input style="width:120px;" type="time" name="sch_timeend" required>
							</td>
						</tr>
						<tr>
							<td>ห้องเรียน : </td>
							<td>
								<select name="room_id" required>
									<option></option>
							<?php
								$query_r = mysqli_query($conn,"SELECT * FROM classroom");
								while ($result_r = mysqli_fetch_array($query_r)) {
								?>
									<option value="<?=$result_r['room_id']?>"><?=$result_r['room_name']?></option>
								<?php
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
