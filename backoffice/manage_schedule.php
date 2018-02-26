<?php
	session_start();
	require '../connect_db.php';
	if (isset($_GET['de'])) {
		$query = mysql_query("DELETE FROM schedule WHERE sch_id = '".$_GET['sch_id']."'");
		if ($query) {
			echo "<script type=\"text/javascript\">alert('เรียบร้อย') </script>";
		}else{
			echo "<script type=\"text/javascript\">alert('ล้มเหลว') </script>";
		}
	}
	if (isset($_GET['class_id'])) {
		$class_id = $_GET['class_id'];
		$room_id = $_GET['room_id'];
		$query_r = mysql_query("SELECT * FROM `classroom` WHERE class_id = '$class_id' and room_name = 'อ.$class_id/$room_id'");
		$result_r = mysql_fetch_assoc($query_r);

				$query = mysql_query("SELECT * FROM `schedule` where room_id = '".$result_r['room_id']."'");
	}else{
				$query = mysql_query("SELECT * FROM `schedule`");
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
				<a href="insert/ins_schedule.php">
					<div class="btn_plus">เพิ่ม</div>
				</a>
			</div>
			<select id="class" onchange="search_schedule()">
				<option value="">เลือกระดับชั้น</option>
				<option value="1">อนุบาล 1</option>
				<option value="2">อนุบาล 2</option>
				<option value="3">อนุบาล 3</option>
			</select>
			<select id="room" onchange="search_schedule()">
				<option value="">เลือกห้อง</option>
				<option value="1"> 1</option>
				<option value="2"> 2</option>
				<option value="3"> 3</option>
			</select>
			<br>
			<br>
			<br>
			<div class="overflo">
			<table class="table_back">
				<thead>
					<tr>
						<th>กิจกรรม</th>
						<th>วัน</th>
						<th>เวลา</th>
						<th>ระดับชั้น</th>
						<th></th>
					</tr>
				</thead>
			<?php
				while ($result =mysql_fetch_array($query)) {
					$query_room = mysql_query("SELECT * FROM `classroom` WHERE room_id = '".$result['room_id']."'");
					$re_room = mysql_fetch_assoc($query_room);
			?>
				<tbody>
					<tr>
						<td><?=$result['sch_detail']?></td>
						<td><?=$result['sch_date']?></td>
						<td><?=$result['sch_timestart']?> - <?=$result['sch_timeend']?></td>
						<td><?=$re_room['room_name']?></td>
						<td><a onClick="javascript:return confirm('ต้องการลบ ?');" href="manage_schedule.php?de=de&sch_id=<?=$result['sch_id']?>">ลบ
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
</body>
</html>
<script type="text/javascript">
  function search_schedule () {
      var class_id = document.getElementById("class").value;
      var room_id = document.getElementById("room").value;
      if (class_id != "" && room_id !="") {
          window.location.replace('manage_schedule.php?class_id='+class_id+'&room_id='+room_id);
      };
    }
</script>