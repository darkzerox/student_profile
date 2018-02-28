<?php
include('header.php');
require 'connect_db.php';
$id = $_GET['id'];
$query_st = mysqli_query($conn,"SELECT * FROM `student` where st_id = '$id'");
$result_st = mysqli_fetch_assoc($query_st);
$limit_hight = 200;
?>
<br>
                    <div class="con1">
                        <?php
                        if ($result_st['st_img']!="") {
                          ?>
                          <img src="<?=$result_st['st_img']?>">
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
                         ?><
                    </div>
                    <div class="con2">
                        <fieldset class="dev_field">
                            <legend>ข้อมูลการเจริญเติบโตของร่างกาย</legend>
                            <div class="wrap_graph">
                              <?php 
                              $num=0;
                              $query_gro = mysqli_query($conn,"SELECT * FROM `growth` where st_id = '$id'");
                              while ($result_gro = mysqli_fetch_array($query_gro)) {
                              $num++;
                               ?>
                               <div class="w3-light-grey"><div class="con_graph_w"><?=$result_gro['growth_date']?></div>
                                  <div id="hi_<?=$result_gro['growth_id']?>" class="progress progress_1" style="height:0%"><div style="-ms-transform:rotate(180deg);-webkit-transform:rotate(180deg); transform:rotate(180deg);"><?=$result_gro['growth_height']?></div></div>
                              </div>
                              <div class="w3-light-grey">
                                  <div id="we_<?=$result_gro['growth_id']?>" class="progress progress_2" style="height:0%"><div style="-ms-transform:rotate(180deg);-webkit-transform:rotate(180deg); transform:rotate(180deg);"><?=$result_gro['growth_weight']?></div></div>
                              </div>
                              
                              <script>
                                var elem<?=$result_gro['growth_id']?> = document.getElementById("hi_<?=$result_gro['growth_id']?>");   
                                var height<?=$result_gro['growth_id']?> = 1;
                                var id<?=$result_gro['growth_id']?> = setInterval(function () {
                                  if (height<?=$result_gro['growth_id']?> >= <?=$result_gro['growth_height']?>*100/<?=$limit_hight?>) {
                                    clearInterval(id<?=$result_gro['growth_id']?>);
                                  } else {
                                    height<?=$result_gro['growth_id']?>++; 
                                    elem<?=$result_gro['growth_id']?>.style.height = height<?=$result_gro['growth_id']?> + '%';
                                  }
                                }, 10);
                                var eleme<?=$result_gro['growth_id']?> = document.getElementById("we_<?=$result_gro['growth_id']?>");   
                                var heightt<?=$result_gro['growth_id']?> = 1;
                                var ide<?=$result_gro['growth_id']?> = setInterval(function () {
                                  if (heightt<?=$result_gro['growth_id']?> >= <?=$result_gro['growth_weight']?>) {
                                    clearInterval(ide<?=$result_gro['growth_id']?>);
                                  } else {
                                    heightt<?=$result_gro['growth_id']?>++; 
                                    eleme<?=$result_gro['growth_id']?>.style.height = heightt<?=$result_gro['growth_id']?> + '%';
                                  }
                                }, 10);
                              </script>
                               <?php 
                               }
                                ?>
                            </div>
                         <br>
                            <div class="p1">ความสูง (เซนติเมตร) <br> [เต็ม 200 เซนติเมตร]</div>
                            <br>
                            <div class="p2">น้ำหนัก (กิโลกรัม) <br> [เต็ม 100 กิโลกรัม]</div>
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
.con_graph_w{
  font-size: 8px;
  position: absolute;
  left: -25px;
    top: -26px;
    -webkit-transform: rotate(180deg); /* Safari */
    transform: rotate(180deg);
}
.p1{
  width: 150px;
  height: 40px;
  background: green;
  color: #fff;
  text-align: center;
}
.p2{
  width: 150px;
  height: 40px;
  background: orange;
  color: #fff;
  text-align: center;
}
.wrap_graph{
  width: 100%;
  height: 300px;
  overflow: auto;
}

.w3-light-grey{
  margin: 0 5px;
  height: 90%;
    width: 30px;
    background: rgba(0,0,0,.1);
    -webkit-transform: rotate(180deg); /* Safari */
    transform: rotate(180deg);
    float: left;
}
.progress{
  width: 30px;
    text-align: center;
    color: #fff;
    position: relative;bottom: 0;
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
