
<?php
include('header.php');
$id = $_GET['id'];
?>

    <div class="select-dev">
        <div class="row">
            <a href="dev_detail.php?cata=1&id=<?=$id?>">
                <div class="col-md-3">
                    <div class="box-dev">
                        <div class="img">
                            <img src="img/ch01.jpg" width="250" height="200">
                        </div>
                        <div class="detail">
                            พัฒนาการด้านอารมณ์
                        </div>
                    </div>
                </div>
            </a>
            <a href="dev_detail.php?cata=2&id=<?=$id?>">
                <div class="col-md-3">
                    <div class="box-dev">
                        <div class="img">
                            <img src="img/ch01.jpg" width="250" height="200">
                        </div>
                        <div class="detail">
                            พัฒนาการด้านร่างกาย
                        </div>
                    </div>
                </div>
            </a>
            <a href="dev_detail.php?cata=3&id=<?=$id?>">
                <div class="col-md-3">
                    <div class="box-dev">
                        <div class="img">
                            <img src="img/ch01.jpg" width="250" height="200">
                        </div>
                        <div class="detail">
                            พัฒนาการด้านสติ
                        </div>
                    </div>
                </div>
            </a>
            <a href="dev_detail.php?cata=4&id=<?=$id?>">
                <div class="col-md-3">
                    <div class="box-dev">
                        <div class="img">
                            <img src="img/ch01.jpg" width="250" height="200">
                        </div>
                        <div class="detail">
                            พัฒนาการด้านสังคม
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <a href="#img">
            <div>+ ข้อมูลรูป</div>
        </a><br>

        <a href="#ins_body">
            <div>+ ข้อมูลร่างกาย</div>
        </a>
    </div>

<div id="img" class="overlay light">
                        <a class="cancel" href="#"></a>
                        <div class="popup">
                            <div style="width: 500px;margin: 0 auto;">
                                <h1 style="text-align: center;font-size: 24px;font-weight: bold;">เพิ่มข้อมูลรูป</h1>
                                <form method="post" action="ins_dev_img.php?id=<?=$id?>"  enctype="multipart/form-data">
                                    <input type="file" name="fileToUpload" id="fileToUpload" style="width:100%;" required><br>
                                    <textarea name="stimg_detail" style="width:100%;"  required></textarea>
                                    <input id="submit" type="submit" value="ยืนยัน" name="submit">
                                <br>
                                <br>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="ins_body" class="overlay light">
                        <a class="cancel" href="#"></a>
                        <div class="popup">
                            <div style="width: 500px;margin: 0 auto;">
                                <h1 style="text-align: center;font-size: 24px;font-weight: bold;">เพิ่มข้อมูลรูป</h1>
                                <form method="post" action="ins_dev_body.php?id=<?=$id?>"  enctype="multipart/form-data">
                                    น้ำหนัก : <input step="0.01" type="number" name="growth_weight" id="" style="width:60%;" required> กิโลกรัม<br><br>
                                    ส่วนสูง : <input type="number" name="growth_height" id="" style="width:60%;" required> เซนติเมตร<br><br>
                                    <input id="submit" type="submit" value="ยืนยัน" name="submit">
                                <br>
                                <br>
                                </form>
                            </div>
                        </div>
                    </div>


<div class="">
    <a href="techer.php" class="">< กลับ </a>
</div>
<?php
include('footer.php');
?>
