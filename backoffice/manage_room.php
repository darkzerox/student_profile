<?php
	session_start();
	require '../connect_db.php';
	if (isset($_GET['ins'])) {
		$class_id = $_POST['class_id'];
		for ($i=1; $i < 50; $i++) { 
			$query_check = mysqli_query($conn,"SELECT * FROM `classroom` WHERE room_name = 'อ.$class_id/$i'");
			if (mysqli_num_rows($query_check)<1) {
				$room_ins = $i;
				$i= 51;
				$check = true;
			}else{
				$check = false;
			}
		}
		if ($check) {
			$room_name = "อ.".$class_id."/".$room_ins;
			$query_ins = mysqli_query($conn,"INSERT INTO `classroom`( `room_name`, `class_id`, `room_max`) VALUES ('$room_name','$class_id','0')");
		}else{
			$query_ins = false;
		}
		if ($query_ins) {
			echo "<script type=\"text/javascript\">alert('เรียบร้อย') </script>";
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
	require 'header.php';
	?>
	<div class="wrap" style="position: relative;top: 120px;">
		<div class="wrap_inner">
			<div class="plus">
				<a href="#plus_room">
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
						<th>ระดับชั้น</th>
						<th></th>
					</tr>
				</thead>
			<?php
				$num=0;
				$sql = "SELECT * FROM `class`";
				$query = mysqli_query($conn,$sql);
				while ($result = mysqli_fetch_array($query)) {
				$num++;
					
			?>
				<tbody>
					<tr>
						<td><?=$result['class_name']?></td>
						<td><a href="manage_room_class.php?id=<?=$result['class_id']?>">รายละเอียด</a></td>
					</tr>
				</tbody>
				
			<?php
				}
			?>
			</table>

			</div>
		</div>
	</div>
					<div id="plus_room" class="overlay light">
                        <a class="cancel" href="#"></a>
                        <div class="popup">
                        	<div style="width: 400px;margin: 0 auto;text-align: center;">
                        		<h1 style="text-align: center;font-size: 24px;font-weight: bold;">เพิ่มห้องเรียน</h1>
                        		<form method="post" action="manage_room.php?ins=1">
                            	ระดับชั้น : 
                            	<select name="class_id" required>
                            		<option>เลือก</option>
                            		<option value="1">อนุบาล 1</option>
                            		<option value="2">อนุบาล 2</option>
                            		<option value="3">อนุบาล 3</option>
                            	</select>
                            	<button>ยืนยัน</button>
                            	</form>
                        	</div>
                        </div>
                  	</div>
	
</body>
</html>

