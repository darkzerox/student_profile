<?php
    require 'header.php'; 
    if (@$_SESSION['pertype_id']==2) {
 ?>
    <h2>รายชื่อนักเรียน</h2>
    <div class="text-center">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th class="disnone376" style="text-align:center;">รหัสนักเรียน</th>
                    <th style="text-align:center;">ชื่อนักเรียน</th>
                    <th class="disnone376" style="text-align:center;">นามสกุล</th>
                    <th style="text-align:center;">ระดับชั้น</th>
                    <th style="text-align:center;">ห้องเรียน</th>
                    <th class="disnone376" style="text-align:center;">ครูประจำชั้น</th>
                    <th></th>
                </tr>
                <?php
                $sql = "SELECT * FROM student 
                        INNER JOIN classroom ON classroom.room_id = student.room_id
                        INNER JOIN class ON class.class_id = student.class_id
                where student.per_id = '".@$_SESSION['per_id']."'";
                if(isset($_POST['search'])) {
                    $search_term = mysql_real_escape_string($_POST['search']);
                    $sql .= " and member_name = '$search_term'";
                }
                $result = mysqli_query($conn,$sql) or die(mysql_error());
                while($value = mysqli_fetch_array($result)) {
                    $query_tech = mysqli_query($conn,"SELECT per_name,per_lastname FROM personal where room_id = '".$value['room_id']."'");
                    $result_tech = mysqli_fetch_assoc($query_tech); 

                ?>
                    <tr>
                        <td class="disnone376"><?= $value['st_id'] ?></td>
                        <td><?= $value['st_name'] ?></td>
                        <td class="disnone376"><?= $value['st_lastname'] ?></td>
                        <td><?= $value['class_name'] ?></td>
                        <td><?= $value['room_name'] ?></td>
                        <td class="disnone376">
                            <?php 
                            if (mysqli_num_rows($query_tech)>0) {
                                echo $result_tech['per_name']." ".$result_tech['per_lastname'];
                            }else{
                                echo "ยังไม่ระบุ";
                            }
                             ?></td>
                        <td><a href="dev_student.php?id=<?= $value['st_id'] ?>">ข้อมูลนักเรียน</a></td>
                    </tr>
                <?php 
                }
                ?>
            </table>
        </div>
    </div>
<?php 
    }
    require 'footer.php';
?>