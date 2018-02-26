
<?php
include('header.php');
require 'connect_db.php';
$pertype_id = @$_SESSION['pertype_id'];
$id = $_GET['id'];
$query = mysql_query("SELECT * FROM `student`
        INNER JOIN classroom ON student.room_id = classroom.room_id
        INNER JOIN class ON student.class_id = class.class_id
        WHERE student.st_id = '$id'");
    $result = mysql_fetch_assoc($query);
    $birth = str_replace('-', '/', $result['st_birth']);
    $birth = date('d/m/Y',strtotime($birth));
?>
<br>
                    <div class="con1">
                        <?php
                        if ($result['st_img']!="") {
                          ?>
                          <img src="<?=$result['st_img']?>">
                          <?php
                        }else{
                            $img = "img/default_child.jpg";
                        ?>
                          <img src="<?=$img?>">
                        <?php
                        }
                        if (@$_SESSION['pertype_id']==2) {
                        ?>
                        <form method="post" action="edit_img_st.php?id=<?=$id?>"  enctype="multipart/form-data" style="position:absolute;">
                          <label for="edit_img">
                          <div class="edit_img_st">
                             แก้ไขรูป
                             
                          </div>
                          </label>
                          <input id="edit_img" type="file" name="fileToUpload" id="fileToUpload" class="btn_edit_img" style="display:none;" required>
                          
                          <button style="display:none;" id="subimg" type="submit"></button>
                        </form>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="con2">
                        <h2>ด.ช.<?=$result['st_name']?> <?=$result['st_lastname']?></h2>
                        <hr>
                        <p>วัน/เดือน/ปี เกิด : <?=$birth?></p>
                        <p>ชื่อบิดา : <?=$result['st_father']?></p>
                        <p>ชื่อมารดา : <?=$result['st_mother']?></p>
                        <p>ที่อยู่ : <?=$result['st_address']?></p>
                        <p>ชั้นเรียน : <?=$result['class_name']?></p>
                        <p>ห้องเรียน : <?=$result['room_name']?></p>

                        <?php 
                        $query_grow = mysql_query("SELECT * FROM `growth` WHERE st_id = '$id' ORDER BY growth_id DESC");
                        if (mysql_num_rows($query_grow)>0) {
                            $result_grow = mysql_fetch_assoc($query_grow);
                        }else{
                          $result_grow['growth_weight'] = 0;
                          $result_grow['growth_height'] = 0;
                        }
                         ?>
                        <fieldset>
                            <legend>การเจริญเติบโต </legend>
                            <a style="float:right" href="dev_growth.php?id=<?=$id?>">ประวัติการเจริญเติบโต</a>
                            <p>น้ำหนัก : <?=$result_grow['growth_weight']?> กิโลกรัม</p>
                            <p>ส่วนสูง : <?=$result_grow['growth_height']?> เซนติเมตร</p>
                        </fieldset>
                        <fieldset class="dev_field">
                            <legend>ข้อมูลพัฒนาการ</legend>
                            <?php
                                for ($i=1; $i <=4 ; $i++) { 
                                    $query_dev[$i] = mysql_query("SELECT * FROM development where dev_cata = '$i'");
                                    
                                      $query_succ[$i] = mysql_query("SELECT ssd_score FROM st_succ_dev where dev_cata = '$i' and st_id = '".$result['st_id']."'");
                                      $score[$i]=0;
                                    if (mysql_num_rows($query_succ[$i])>0) {
                                      $dev_sco[$i] = mysql_num_rows($query_succ[$i])*3;
                                      while ($reuslt_succ[$i] = mysql_fetch_array($query_succ[$i])) {
                                          $score[$i] = $score[$i] + $reuslt_succ[$i]['ssd_score'];
                                      }
                                      $score[$i] = $score[$i]*100/$dev_sco[$i];
                                      
                                    }else{
                                      $score[$i] = 0;
                                    }
                                }
                            ?>
                            <label>ด้านอารมณ์ : </label>
                            <div class="w3-light-grey">
                                  <div id="pro_1" class="progress progress_1" style="width:0%">0%</div>
                            </div>
                            <a href="dev_student_dev_detail.php?cata=1&id=<?=$id?>">รายละเอียด</a>
                            <br>
                            <label>ด้านร่างกาย : </label>
                            <div class="w3-light-grey">
                                  <div id="pro_2" class="progress progress_2" style="width:0%">0%</div>
                            </div>
                            <a href="dev_student_dev_detail.php?cata=2&id=<?=$id?>">รายละเอียด</a>
                            <br>
                            <label>ด้านสติ : </label>
                            <div class="w3-light-grey">
                                  <div id="pro_3" class="progress progress_3" style="width:0%">0%</div>
                            </div>
                            <a href="dev_student_dev_detail.php?cata=3&id=<?=$id?>">รายละเอียด</a>
                            <br>
                            <label>ด้านสังคม : </label>
                            <div class="w3-light-grey">
                                  <div id="pro_4" class="progress progress_4" style="width:0%">0%</div>
                            </div>
                            <a href="dev_student_dev_detail.php?cata=4&id=<?=$id?>">รายละเอียด</a>
                        </fieldset>
                         <br>
                        <fieldset>
                            <legend>รูปภาพ</legend>
                            <?php
                            $query_st_img = mysql_query("SELECT * FROM student_img where st_id = '".$result['st_id']."'");
                            if(mysql_num_rows($query_st_img)>0){
                                while ($result_st_img = mysql_fetch_array($query_st_img)) {
                                ?>
                                <div class="article_img">
                                    <img src="<?=$result_st_img['stimg_img']?>">
                                    <p>รายละเอียด : <?=$result_st_img['stimg_detail']?></p>
                                </div>
                                <?php 
                                }
                            }else{
                                ?>
                                <h2 style="text-align:center;">ไม่มีข้อมูลรูป</h2>
                                <?php
                            }
                                 ?>
                                 <br>
                                 <br>
                        </fieldset>
</div>
    <a href="javascript:history.go(-1)"> < กลับ </a>
<br>

<?php 
    require 'footer.php';
?>



<script>
var elem1 = document.getElementById("pro_1");   
  var width1 = 0;
  var id1 = setInterval(function() {
    if (width1 >= <?=$score[1]?>) {
      clearInterval(id1);
    } else {
      width1++; 
      elem1.style.width = width1 + '%'; 
      elem1.innerHTML = width1 * 1  + '%';
    }
  } , 10);
var elem2 = document.getElementById("pro_2");   
  var width2 = 0;
  var id2 = setInterval(function() {
    if (width2 >= <?=$score[2]?>) {
      clearInterval(id2);
    } else {
      width2++; 
      elem2.style.width = width2 + '%'; 
      elem2.innerHTML = width2 * 1  + '%';
    }
  } , 10);
var elem3 = document.getElementById("pro_3");   
  var width3 = 0;
  var id3 = setInterval(function() {
    if (width3 >= <?=$score[3]?>) {
      clearInterval(id3);
    } else {
      width3++; 
      elem3.style.width = width3 + '%'; 
      elem3.innerHTML = width3 * 1  + '%';
    }
  } , 10);

var elem4 = document.getElementById("pro_4");   
  var width4 = 0;
  var id4 = setInterval(function() {
    if (width4 >= <?=$score[4]?>) {
      clearInterval(id4);
    } else {
      width4++; 
      elem4.style.width = width4 + '%'; 
      elem4.innerHTML = width4 * 1  + '%';
    }
  } , 10);

if (<?=$pertype_id?>==2) {
  setInterval(function () {
  var inputImg = document.getElementById("edit_img").value;
  if (inputImg && inputImg.value!="") {
    document.getElementById("subimg").click();
  }
},1000);
};

</script>


