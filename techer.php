<?php
    require 'header.php'; 
    if (@$_SESSION['pertype_id']==1) {
    
 ?>
    <h2>รายชื่อนักเรียน</h2>
    <div class="text-center">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th class="disnone376" style="text-align:center;">รหัสนักเรียน</th>
                    <th style="text-align:center;">ชื่อนักเรียน</th>
                    <th style="text-align:center;">นามสกุล</th>
                    <th style="text-align:center;">พัฒนาการ</th>
                
                </tr>
                <?php
                $sql = "SELECT * FROM student where room_id = '".@$_SESSION['room_id']."'";
                $query = mysqli_query($conn,$sql) or die(mysql_error());
                while($result = mysqli_fetch_array($query)) { 
                ?>
                    <tr>
                        <td class="disnone376" style="text-align:center;"><?= $result['st_id'] ?></td>
                        <td style="text-align:center;"><?= $result['st_name'] ?></td>
                        <td style="text-align:center;"><?= $result['st_lastname'] ?></td>
                        <td style="text-align:center;">
                            <a class= "btn btn-success" href="dev.php?id=<?= $result['st_id'] ?>">เพิ่มพัฒนาการ</a>

                            <a class= "btn btn-success" href="dev_student.php?id=<?= $result['st_id'] ?>">ดูพัฒนาการ</a>


                        </td>
                        
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