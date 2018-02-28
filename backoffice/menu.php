<?php
	require '../connect_db.php';
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
				<a href="order_purchase.php">
					<div class="btn_plus">asdas</div>
				</a>
			</div>
			<br>
			<br>
			<br>
			<table class="table_back">
				<thead>
					<tr>
						<th>ชื่อ นามสกุล</th>
						<th>ที่อยู่</th>
						<th>เบอร์โทร</th>
						<th>อีเมล</th>
						<th>ชื่อผู้ใช้</th>
						<th>ประจำชั้น</th>
					</tr>
				</thead>
			<?php
				$query = mysqli_query($conn,"SELECT * FROM `personal` WHERE pertype_id = '1'");
				while ($result =mysqli_fetch_array($query)) {
					$query_room = mysqli_query($conn,"SELECT * FROM `classroom` WHERE room_id = '".$result['room_id']."'");
					$re_room = mysqli_fetch_assoc($query_room);
			?>
				<tbody>
					<tr>
						<td><?=$result['per_name']?> <?=$result['per_lastname']?></td>
						<td><?=$result['per_address']?></td>
						<td><?=$result['per_tel']?></td>
						<td><?=$result['per_email']?></td>
						<td><?=$result['per_username']?></td>
						<td><?=$re_room['room_name']?></td>
					</tr>
				</tbody>
			<?php
				}
			?>
			</table>
		</div>
	</div>
</body>
</html>