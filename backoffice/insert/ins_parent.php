<?php
	session_start();
	require '../../connect_db.php';
	if (isset($_POST['per_name'])) {
		if ($_POST['per_password']==$_POST['per_password']) {
		
			$sql = "INSERT INTO `personal`(`per_name`, `per_lastname`, `per_address`, `per_tel`, `per_email`, `per_username`, `per_password`,`pertype_id`) VALUES ('".$_POST['per_name']."','".$_POST['per_lastname']."','".$_POST['per_address']."','".$_POST['per_tel']."','".$_POST['per_email']."','".$_POST['per_username']."','".$_POST['per_password']."','2')";
		
			$query = mysqli_query($conn,$sql);
		}else{
			echo "<script type=\"text/javascript\">alert('รหัสผ่านไม่ตรงกัน') </script>";
		}
		if ($query) {
			echo "<script type=\"text/javascript\">alert('เรียบร้อย') </script>";
        	header("Refresh:0; ../manage_parent.php");
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
				<form method="post" action="ins_parent.php">
					<table>
						<tr>
							<td>ชื่อ : </td>
							<td><input type="" name="per_name" required></td>
						</tr>
						<tr>
							<td>นามสกุล : </td>
							<td><input type="" name="per_lastname" required></td>
						</tr>
						<tr>
							<td>ที่อยู่ : </td>
							<td><textarea name="per_address" required></textarea></td>
						</tr>
						<tr>
							<td>เบอร์โทรศัพท์ : </td>
							<td><input type="" pattern="[0-9]{10}" maxlength="10" name="per_tel" required></td>
						</tr>
						<tr>
							<td>อีเมล : </td>
							<td><input type="email" name="per_email" required></td>
						</tr>
						<tr>
							<td>Username : </td>
							<td><input type="" name="per_username" required></td>
						</tr>
						<tr>
							<td>Password : </td>
							<td><input id="pass1" type="password" name="per_password" required></td>
						</tr><tr>
							<td>Password อีกครั้ง : </td>
							<td><input id="pass2" type="password" name="per_passwords" onchange="check_pass()" required><span id="check"></span></td>
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

<script type="text/javascript">
	function check_pass () {
		var pass1 = document.getElementById('pass1').value;
		var pass2 = document.getElementById('pass2').value;
		if (pass1!=pass2) {
			document.getElementById('check').innerHTML = "รหัสผ่านไม่ตรงกัน";
		};
		if (pass1==pass2) {
			document.getElementById('check').innerHTML = "";
		};
	}
</script>