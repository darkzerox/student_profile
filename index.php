<?php include 'header.php' ?>
    <header>
        <div class="container">
            <div class="intro-text"></div>
        </div>
    </header>
    <?php
    if (@$_SESSION['pertype_id']==1) {
         header("Refresh:1; techer.php");
    }if (@$_SESSION['pertype_id']==2) {
         header("Refresh:0; student.php");
    }if (@$_SESSION['pertype_id']==""){
       ?>
    <div class="index">
        <div class="heading">WellCome CHILDREN</div>
            <a href="log_in.php" class="page-scroll btn btn-default">LOGIN</a>
            <a href="regis.php" class="page-scroll btn btn-default">REGIS</a>
    </div>

<?php  
    }

include 'footer.php' 
?>