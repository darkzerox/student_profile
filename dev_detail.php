<?php
include('header.php');
include('connect_db.php');
$cata = $_GET['cata'];
$id = $_GET['id'];
?>
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
                ?></h2>
    <div class="text-center">
        <div class="table-responsive">
            <form action="ins_dev.php?cata=<?=$cata?>&id=<?=$id?>" method="POST">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align:center;">ลำดับ</th>
                        <th style="text-align:center;">พัฒนาการ</th>
                        <th style="text-align:center;">รายละเอียด</th>
                        <th style="text-align:center;min-width: 200px;">คะแนน</th>
                    </tr>
                </thead>
                <tbody> 
                <?php
                $num=0;
                $sql = "SELECT * FROM `development` where dev_cata = '$cata'";
                $query = mysqli_query($conn,$sql) or die(mysql_error());
                while($result = mysqli_fetch_array($query)) {
                    $num++;
                ?>
                              
                    <tr>
                        <td><?= $num ?></td>
                        <td><?= $result['dev_name'] ?></td>
                        <td><?= $result['dev_detail'] ?></td>
                        <td>
                            คะแนน <br> 
                            <label for="score1<?= $result['dev_id']?>" class="btn-score" onclick="adddev(<?= $result['dev_id']?>)">
                                <input id="score1<?= $result['dev_id']?>" type="radio" name="score<?= $result['dev_id']?>" value="1"><p>1</p> 
                            </label>
                           
                            <label for="score2<?= $result['dev_id']?>" class="btn-score" onclick="adddev(<?= $result['dev_id']?>)">
                                <input id="score2<?= $result['dev_id']?>" type="radio" name="score<?= $result['dev_id']?>" value="2"> <p>2</p> 
                            </label>
                        
                            <label for="score3<?= $result['dev_id']?>" class="btn-score" onclick="adddev(<?= $result['dev_id']?>)">
                                <input id="score3<?= $result['dev_id']?>" type="radio" name="score<?= $result['dev_id']?>" value="3"> <p>3</p> 
                            </label>
                            <div id="dev_<?=$result['dev_id']?>"></div>
                            
                        </td>
                    </tr>
                     
                <?php 
                }
                
                ?>
                </tbody>
            </table>
            <div id="btn_sub">
            </div>
            </form>
        </div>
    </div>
    <a class="btn btn-info" href="javascript:history.go(-1)"> < กลับ </a>
<?php include('footer.php'); ?>
<style type="text/css">
.btn_score{
    width: 100px;
    height: 50px;
    padding: 10px 0;
    border: 1px solid #ccc;
    margin: 0 10px;
}
</style>
<script type="text/javascript">
    function adddev (id) {
        document.getElementById("dev_"+id).innerHTML = "<input type='hidden' value="+id+" name='dev_id[]'>";
        document.getElementById("btn_sub").innerHTML = "<button class='btn  btn-success'>ยืนยัน</button>";
    }
</script>

