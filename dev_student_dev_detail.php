<?php
include('header.php');
require 'connect_db.php';
$id = $_GET['id'];
$cata = $_GET['cata'];
$query = mysqli_query($conn,"SELECT * FROM `student`
        INNER JOIN classroom ON student.room_id = classroom.room_id
        INNER JOIN class ON student.class_id = class.class_id
        WHERE student.st_id = '$id'");
    $result = mysqli_fetch_assoc($query);
    $birth = str_replace('-', '/', $result['st_birth']);
    $birth = date('d/m/Y',strtotime($birth));
    if (isset($_GET['search_week'])) {
        
        switch ($_GET['search_week']) {
          case '1':
              $date_search1 = date("Y-".$_GET['search_month']."-1");
              $date_search2 = date("Y-".$_GET['search_month']."-8");
            break;
          case '2':
              $date_search1 = date("Y-".$_GET['search_month']."-9");
              $date_search2 = date("Y-".$_GET['search_month']."-14");
            break;
          case '3':
              $date_search1 = date("Y-".$_GET['search_month']."-15");
              $date_search2 = date("Y-".$_GET['search_month']."-23");
            break;
          case '4':
              $date_search1 = date("Y-".$_GET['search_month']."-24");
              $date_search2 = date("Y-".$_GET['search_month']."-31");
            break;
        }
    }else{
      $date_search1 = date("Y-m-1");
      $date_search2 = date("Y-m-31");
    }
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
                        <fieldset class="dev_field">
                            <legend>ข้อมูลพัฒนาการ <?php 
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
                             ?></legend>
                             เลือกอาทิตแสดงคะแนน : 
                             <select id="search_week" name="search_week" onchange="search_date()">
                                <option value="">เลือก</option>
                                <option value="1">อาทิตที่ 1</option>
                                <option value="2">อาทิตที่ 2</option>
                                <option value="3">อาทิตที่ 3</option>
                                <option value="4">อาทิตที่ 4</option>
                              </select>
                               เดือน : <select id="search_month" name="search_month" onchange="search_date()">
                                <option value="">เลือก</option>
                                <option value="1">มกราคม</option>
                                <option value="2">กุมภาพันธ์</option>
                                <option value="3">มีนาคม</option>
                                <option value="4">เมษายน</option>
                                <option value="5">พฤษภาคม</option>
                                <option value="6">มิถุนายน</option>
                                <option value="7">กรกฏาคม</option>
                                <option value="8">สิงหาคม</option>
                                <option value="9">กันยายน</option>
                                <option value="10">ตุลาคม</option>
                                <option value="11">พฤศจิกายน</option>
                                <option value="12">ธันวาคม</option>
                              </select>
                           วันที่ <?=$date_search1?> ถึง <?=$date_search2?>

                             <br>
                             <br>
                            <?php
                                    $sql_dev = "SELECT * FROM development where dev_cata = '$cata'";
                                    $query_dev = mysqli_query($conn,$sql_dev);
                                    if (mysqli_num_rows($query_dev)>0) {
                                      $num = 0;
                                    while ($result_dev = mysqli_fetch_array($query_dev)) {
                                      $num++;
                                      $query_ssd = mysqli_query($conn,"SELECT * FROM st_succ_dev Where st_id = '$id' and dev_id = '".$result_dev['dev_id']."' and ssd_date between ('$date_search1') and ('$date_search2')");
                                       
                                        if (mysqli_num_rows($query_ssd)>0) {
                                          $dev_sco = mysqli_num_rows($query_ssd)*3;
                                          $score = 0;
                                          while ($reuslt_succ = mysqli_fetch_array($query_ssd)) {
                                              $score = $score + $reuslt_succ['ssd_score'];
                                          }
                                          $scores[$num] = $score*100/$dev_sco;
                                        }
                            ?>
                            
                            <label><?=$result_dev['dev_name']?> : </label>
                            <p>คำอธิบาย : <?=$result_dev['dev_detail']?></p>
                            <div class="w3-light-grey">
                                  <div id="pro_<?=$num?>" class="progress progress_<?=$cata?>" style="width:0%">0%</div>
                            </div>
                            <br>

                            <script type="text/javascript">
                            var elem<?=$num?> = document.getElementById("pro_<?=$num?>");   
                              var width<?=$num?> = 0;
                              var id<?=$num?> = setInterval(function() {
                                if (width<?=$num?> >= <?=$scores[$num]?>) {
                                  clearInterval(id<?=$num?>);
                                } else {
                                  width<?=$num?>++; 
                                  elem<?=$num?>.style.width = width<?=$num?> + '%'; 
                                  elem<?=$num?>.innerHTML = width<?=$num?> * 1  + '%';
                                }
                              } , 10);
                            </script>
                            <?php 
                                    }
                                  }else{
                                      ?>
                                      <h2 style="text-align:center">ไม่มีข้อมูล</h2>
                                      <?php
                                    }
                             ?>
                            
                        </fieldset>
                         <br>
                        </fieldset>
</div>
    <a href="javascript:history.go(-1)"> < กลับ </a>
<br>

<?php 
    require 'footer.php';
?>




<style type="text/css">
.page-content{
  min-height: 500px;
}
.w3-light-grey{
    width: 30px;
    background: #ccc;
}
.progress{
  width: 30px;
    text-align: center;
    color: #fff;
}
.progress_1{
  width: 30px;
    text-align: center;
    color: #fff;
}
</style>
<script>



setInterval(function () {
  var inputImg = document.getElementById("edit_img").value;
  if (inputImg && inputImg.value!="") {
    document.getElementById("subimg").click();
  }
},1000);

    function search_date () {
      var search_month = document.getElementById("search_month").value;
      var search_week = document.getElementById("search_week").value;
      if (search_month != "" && search_week !="") {
          window.location.replace('dev_student_dev_detail.php?id=<?=$id?>&cata=<?=$cata?>&search_week='+search_week+'&search_month='+search_month);
      };
    }
  </script>
