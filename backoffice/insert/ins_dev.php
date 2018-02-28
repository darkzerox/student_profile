<?php
	session_start();
	require '../../connect_db.php';
	if (isset($_POST['name'])) {
		
			$sql = "INSERT INTO `development`( `dev_name`, `dev_detail`, `dev_cata`) VALUES ('".$_POST['name']."','".$_POST['detail']."','".$_POST['cata']."')";
			$query = mysqli_query($conn,$sql);
		
		if ($query) {
			echo "<script type=\"text/javascript\">alert('เรียบร้อย') </script>";
        	header("Refresh:0; ../manage_develop.php?cata=".$_POST['cata']."");
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
				<h2>เพิ่มข้อมูลการพัฒนาการ</h2>
				<form method="post" action="ins_dev.php">
					<table>
						<tr>
							<td>ชื่อ : </td>
							<td><input type="" name="name" required></td>
						</tr>
						<tr>
							<td>ข้อมูล : </td>
							<td>
								<textarea name="detail" required></textarea>
							</td>
						</tr>
						<tr>
							<td>ประเภท : </td>
							<td>
								<select name="cata" required>
									<option>เลือกประเภท</option>
									<option value="1">ด้านอารมณ์</option>
									<option value="2">ด้านร่างกาย</option>
									<option value="3">ด้านสติ</option>
									<option value="4">ด้านสังคม</option>
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
