<?php
	session_start();
	require '../connect_db.php';
	if (isset($_GET['de'])) {
		$query = mysql_query("DELETE FROM personal WHERE per_id = '".$_GET['per_id']."'");
		if ($query) {
			echo "<script type=\"text/javascript\">alert('เรียบร้อย') </script>";
		}else{
			echo "<script type=\"text/javascript\">alert('ล้มเหลว') </script>";
		}
	}
	if (isset($_POST['per_name'])) {
		$per_id = $_GET['per_id'];
		$query = mysql_query("UPDATE `personal` SET `per_name`='".$_POST['per_name']."',`per_lastname`='".$_POST['per_lastname']."',`per_address`='".$_POST['per_address']."',`per_tel`='".$_POST['per_tel']."',`per_email`='".$_POST['per_email']."',`room_id`= '0' WHERE per_id = '$per_id'");
		if ($query) {
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
				<a href="insert/ins_parent.php">
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
						<th>เบอร์โทร</th>
						<th>อีเมล</th>
						<th>ชื่อผู้ใช้</th>
						<th></th>
					</tr>
				</thead>
			<?php
				$num=0;
				$query = mysql_query("SELECT * FROM `personal` WHERE pertype_id = '2'");
				while ($result =mysql_fetch_array($query)) {
				$num++;
					$query_room = mysql_query("SELECT * FROM `classroom` WHERE room_id = '".$result['room_id']."'");
					$re_room = mysql_fetch_assoc($query_room);
			?>
				<tbody>
					<tr>
						<td><?=$num?></td>
						<td><?=$result['per_name']?> <?=$result['per_lastname']?></td>
						<td><?=$result['per_address']?></td>
						<td><?=$result['per_tel']?></td>
						<td><?=$result['per_email']?></td>
						<td><?=$result['per_username']?></td>
						<td><a href="#edit<?=$result['per_id']?>">แก้ไข</a> | <a onClick="javascript:return confirm('ต้องการลบ ?');" href="manage_parent.php?de=de&per_id=<?=$result['per_id']?>">ลบ
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
	$query = mysql_query("SELECT * FROM `personal` WHERE pertype_id = '2'");
				while ($result =mysql_fetch_array($query)) {
					?>
					<div id="edit<?=$result['per_id']?>" class="overlay light">
                        <a class="cancel" href="#"></a>
                        <div class="popup">
                        	<div style="width: 400px;margin: 0 auto;text-align: center;">
                        		<h1 style="text-align: center;font-size: 24px;font-weight: bold;">แก้ไข</h1>
                        		<form method="post" action="manage_parent.php?per_id=<?=$result['per_id']?>">
                            	ชื่อ : <input type="" name="per_name" value="<?=$result['per_name']?>" required><br><br>
                            	นามสกุล : <input type="" name="per_lastname" value="<?=$result['per_lastname']?>" required><br><br>
                            	ที่อยุ่ : <textarea name="per_address" required><?=$result['per_address']?></textarea><br><br>
                            	เบอร์โทร : <input pattern="[0-9]{10}" maxlength="10" name="per_tel" value="<?=$result['per_tel']?>" required><br><br>
                            	อีเมล : <input type="email" name="per_email" value="<?=$result['per_email']?>" required><br><br>
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


