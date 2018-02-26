<?php
	session_start();
	require '../connect_db.php';
	$id = $_GET['id'];
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
						<th>ชื่อครู</th>
						<th></th>
					</tr>
				</thead>
			<?php
				$num=0;
				$sql = "SELECT * FROM `classroom`  WHERE classroom.class_id = '$id' ";
				$query = mysql_query($sql);
				while ($result = mysql_fetch_array($query)) {
				$num++;
					
			?>
				<tbody>
					 <tr>
                                         <?php
                                         $sql1 = "SELECT * FROM personal per inner join personaltype pt ON per.pertype_id = pt.pertype_id WHERE per.pertype_id = 1 and room_id = '".$result['room_id']."' " ;
                                         $result1 = mysql_query($sql1) or die(mysql_error());
                                         ;
                                         ?>

                                                    <td><?=$result['room_name']?></td>
                                                    <td><?php while ($value1 = mysql_fetch_array($result1)) {
                                                    	echo "ครู &nbsp";
                                                    		echo $value1['per_name'];
                                                    		echo "&nbsp&nbsp&nbsp";
                                                    	}?></td>
                                                    

                                      
						<td><a href="manage_room_detail.php?id=<?=$result['room_id']?>">รายละเอียด</a></td>
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

