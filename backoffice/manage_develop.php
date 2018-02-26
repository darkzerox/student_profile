<?php
	session_start();
	require '../connect_db.php';
	$cata = $_GET['cata'];
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
				<a href="insert/ins_dev.php">
					<div class="btn_plus">เพิ่ม</div>
				</a>
			</div>
			<br>
			<h2>
				<?php
				switch ($cata) {
					case '1':
						echo "ด้านอารมณ์";
						break;
					case '2':
						echo "ด้านร่างกาย";
						break;
					case '3':
						echo "ด้านสติ";
						break;
					case '4':
						echo "ด้านสังคม";
						break;
				}
				?>
				</h2>
			<div class="overflo">
			<table class="table_back">
				<thead>
					<tr>
						<th>ชื่อประเภท</th>
						<th>ข้อมูล</th>
						<th></th>
					</tr>
				</thead>
			<?php
			$query = mysql_query("SELECT * FROM `development` where dev_cata = '".$cata."'");
			if (mysql_num_rows($query)>0) {
				while ($result =mysql_fetch_array($query)) {
			?>
				<tbody>
					<tr>
						<td><?=$result['dev_name']?></td>
						<td><?=$result['dev_detail']?></td>
						<td><a onClick="javascript:return confirm('ต้องการลบ ?');" href="insert/delete_develop.php?dev_id=<?=$result['dev_id']?>&cata=<?=$cata?>">ลบ</a></td>
					</tr>
				</tbody>
			<?php
				}
			}else{
				?>
				<tbody>
					<tr>
						<td colspan="10">ไม่มีข้อมูล</td>
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